<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use App\Mail\ContactSupport;


class HelpController extends Controller
{
    public function index()
    {
        return view('help.index');
    }

    public function faq()
    {
        $faqs = [
            [
                'question' => 'Comment ajouter un nouveau contenu ?',
                'reponse' => 'Accédez à la section "Contenus" et cliquez sur "Nouveau contenu".'
            ],
            [
                'question' => 'Comment modifier mon profil ?',
                'reponse' => 'Cliquez sur votre avatar en haut à droite, puis sur "Mon profil".'
            ],
            // Ajoutez d'autres FAQs...
        ];

        return view('help.faq', compact('faqs'));
    }

    public function contact()
    {
        return view('help.contact');
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'priority' => 'required|in:low,medium,high',
        ]);

        // Envoyer l'email
        Mail::to('support@culturebenin.bj')->send(new ContactSupport($validated));

        return redirect()->route('help.contact')
            ->with('success', 'Votre message a été envoyé. Nous vous répondrons dans les 24h.');
    }
}
