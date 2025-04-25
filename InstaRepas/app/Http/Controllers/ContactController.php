<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
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