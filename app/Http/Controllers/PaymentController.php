<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Contenu;
use FedaPay\FedaPay;
use FedaPay\Transaction;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Configurez FedaPay
        FedaPay::setApiKey(config('services.fedapay.api_key'));
        FedaPay::setEnvironment(config('services.fedapay.mode')); // 'sandbox' ou 'live'
    }

    /**
     * Initialiser un paiement pour un contenu premium
     */
    public function initiate(Request $request)
    {
        $request->validate([
            'contenu_id' => 'required|exists:contenus,id',
            'amount' => 'required|numeric|min:100',
        ]);

        $contenu = Contenu::findOrFail($request->contenu_id);
        $user = Auth::user();

        try {
            // Créer la transaction FedaPay
            $transaction = Transaction::create([
                'description' => 'Accès premium: ' . $contenu->titre,
                'amount' => $request->amount,
                'currency' => ['iso' => 'XOF'],
                'callback_url' => route('payment.callback'),
                'customer' => [
                    'firstname' => $user->prenom,
                    'lastname' => $user->nom,
                    'email' => $user->email,
                    'phone_number' => [
                        'number' => $user->telephone ?? '+22900000000',
                        'country' => 'bj'
                    ]
                ]
            ]);

            // Enregistrer le paiement en base
            $payment = Payment::create([
                'user_id' => $user->id,
                'contenu_id' => $contenu->id,
                'transaction_id' => $transaction->id,
                'reference' => $transaction->reference,
                'amount' => $request->amount,
                'currency' => 'XOF',
                'status' => 'pending',
                'metadata' => [
                    'contenu_titre' => $contenu->titre,
                    'transaction_data' => $transaction->toArray()
                ]
            ]);

            return response()->json([
                'success' => true,
                'token' => $transaction->generateToken(),
                'payment_url' => $transaction->generatePaymentUrl(),
                'reference' => $transaction->reference,
                'message' => 'Paiement initialisé avec succès'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'initialisation du paiement: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Callback de FedaPay
     */
    public function callback(Request $request)
    {
        $reference = $request->input('reference');

        try {
            $payment = Payment::where('reference', $reference)->firstOrFail();
            $transaction = Transaction::retrieve($payment->transaction_id);

            // Mettre à jour le statut
            $payment->update([
                'status' => $transaction->status,
                'payment_method' => $transaction->payment_method,
            ]);

            if ($transaction->status === 'approved') {
                // Paiement réussi - débloquer le contenu
                return redirect()->route('contenu.show', $payment->contenu_id)
                    ->with('success', 'Paiement effectué avec succès ! Vous avez maintenant accès au contenu complet.');
            } else {
                return redirect()->route('contenu.show', $payment->contenu_id)
                    ->with('error', 'Paiement échoué. Veuillez réessayer.');
            }

        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Erreur lors du traitement du paiement.');
        }
    }

    /**
     * Vérifier un paiement
     */
    public function verify($reference)
    {
        try {
            $payment = Payment::where('reference', $reference)->firstOrFail();
            $transaction = Transaction::retrieve($payment->transaction_id);

            return response()->json([
                'success' => true,
                'status' => $transaction->status,
                'payment' => $payment
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 404);
        }
    }
}
