<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use FedaPay\FedaPay;
use FedaPay\Transaction;
use App\Models\Contenu;
use App\Models\Payment;
use App\Models\Utilisateur;

class PaymentController extends Controller
{
    public function __construct()
    {
        // You can set up FedaPay configuration here if needed, or remove this constructor if not used.
        // Example: FedaPay::setApiKey(env('FEDAPAY_API_KEY'));
        // FedaPay::setEnvironment(env('FEDAPAY_MODE', 'sandbox'));
    }

    public function initiate(Request $request)
    {
        try {
            $request->validate([
                'contenu_id' => 'required|integer|exists:contenus,id',
                'amount' => 'required|integer|min:100|max:100000',
            ]);

            $contenu = Contenu::findOrFail($request->contenu_id);
            $user = Auth::user();

            // Créer une transaction FedaPay
            $transaction = Transaction::create([
                'description' => 'Accès premium: ' . $contenu->titre,
                'amount' => $request->amount,
                'currency' => ['iso' => 'XOF'],
                'callback_url' => route('payment.callback'),
                'customer' => [
                    'firstname' => $user ? $user->prenom : 'Invité',
                    'lastname' => $user ? $user->nom : 'Client',
                    'email' => $user ? $user->email : 'guest_' . time() . '@example.com',
                    'phone_number' => $user ? ($user->phone ?? null) : null
                ],
                'metadata' => [
                    'contenu_id' => $contenu->id,
                    'user_id' => $user ? $user->id : null,
                    'amount' => $request->amount,
                    'type' => 'premium_access'
                ]
            ]);

            // Enregistrer le paiement en base
            $payment = Payment::create([
                'user_id' => $user ? $user->id : null,
                'contenu_id' => $contenu->id,
                'transaction_id' => $transaction->id,
                'amount' => $request->amount,
                'currency' => 'XOF',
                'status' => 'pending',
                'metadata' => [
                    'fedapay_transaction_id' => $transaction->id,
                    'description' => $transaction->description,
                    'contenu_titre' => $contenu->titre
                ]
            ]);

            return response()->json([
                'success' => true,
                'payment_url' => $transaction->generateToken(),
                'transaction_id' => $transaction->id,
                'payment_id' => $payment->id
            ]);

        } catch (\Exception $e) {
            Log::error('Payment initiation failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'initialisation du paiement: ' . $e->getMessage()
            ], 500);
        }
    }

    public function callback(Request $request)
    {
        try {
            $transactionId = $request->input('transaction_id');

            if (!$transactionId) {
                return redirect()->route('payment.cancel')->with('error', 'Transaction ID manquant');
            }

            // Récupérer la transaction FedaPay
            $transaction = Transaction::retrieve($transactionId);

            // Trouver le paiement correspondant
            $payment = Payment::where('transaction_id', $transactionId)->firstOrFail();

            // Mettre à jour le statut
            $payment->status = $transaction->status; // 'approved', 'canceled', 'declined'
            $payment->paid_at = now();
            $payment->save();

            // Si le paiement est réussi, donner l'accès au contenu
            if ($transaction->status === 'approved') {
                // Ajouter l'accès premium à l'utilisateur
                if ($payment->utilisateur_id) {
                    $user = Utilisateur::find($payment->utilisateur_id);
                    $user->premium_accesses()->create([
                        'contenu_id' => $payment->contenu_id,
                        'payment_id' => $payment->id,
                        'expires_at' => now()->addDays(30)
                    ]);
                }

                return redirect()->route('payment.success', ['payment' => $payment->id]);
            }

            return redirect()->route('payment.cancel')->with('error', 'Paiement échoué');

        } catch (\Exception $e) {
            Log::error('Payment callback error: ' . $e->getMessage());
            return redirect()->route('payment.cancel')->with('error', 'Erreur lors du traitement');
        }
    }

    public function success(Request $request, Payment $payment)
    {
        return view('payment.success', compact('payment'));
    }

    public function cancel()
    {
        return view('payment.cancel');
    }
}
