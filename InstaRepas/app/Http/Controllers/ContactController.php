<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\ProtectsAgainstSpam;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    use ProtectsAgainstSpam;

    public function index()
    {
        return view('contact', [
            'formToken' => $this->spamFormToken(),
        ]);
    }

    public function submit(Request $request)
    {
        if ($this->isSpam($request)) {
            // Silently drop the message so bots cannot tell they were detected
            return redirect()->back()->with('success', 'Votre message a été envoyé avec succès.');
        }

        // validation
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'subject' => 'required|in:technical_problem,information,suggestion',
            'message' => 'required|string|max:5000',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $this->getSubjectText($request->subject),
            'message' => $request->message,
        ];

        // Envoi de l'email à hello@instarepas.fr pour tous les cas
        Mail::to('hello@instarepas.fr')->send(new ContactMail($details));

        // Redirection avec message de succès
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès.');
    }

    /**
     * Convertit le code du sujet en texte lisible
     */
    private function getSubjectText($subject)
    {
        $subjects = [
            'technical_problem' => 'Problème technique',
            'information' => 'Demande d\'information',
            'suggestion' => 'Suggestion',
        ];

        return $subjects[$subject] ?? $subject;
    }
}
