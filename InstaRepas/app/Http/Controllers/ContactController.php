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
            'subject' => $request->subject,
            'message' => $request->message,
        ];
    
        // send email
        if ($request->subject == 'technical_problem') {
            Mail::to(env('TECH_SUPPORT_EMAIL', 'fallback-email@example.com'))->send(new ContactMail($details));
        } else {
            Mail::to([env('FIRST_EMAIL', 'fallback-email1@example.com'), env('SECOND_EMAIL', 'fallback-email2@example.com')])->send(new ContactMail($details));
        }

    
        // redirect with success message
        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès.');
    
    }
    
}
