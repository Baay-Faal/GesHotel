<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ],
        [
            'name.required' => 'le nom est obligatoire.',
            'email.required' => 'email est obligatoire.',
            'email.email' => 'email non valide.',
            'message.required' => 'vous devez entrer un message.',
            'message.min' => 'le message est trop court.',
        ]);
             Mail::raw(
            "Nouveau message de contact\n\n" .
            "Nom : {$request->name}\n" .
            "Email : {$request->email}\n" .
            ($request->subject ? "Sujet : {$request->subject}\n\n" : "\n") .
            "Message :\n{$request->message}\n\n" .
            "Envoyé le : " . now()->format('d/m/Y à H:i'),
            function ($message) use ($request) {
                $message->to('contact@geshotel.com') // Change avec ton email
                        ->subject('Nouveau message - GesHotel')
                        ->replyTo($request->email, $request->name);
            }
        );


        // Here you can handle the validated data, e.g., send an email or save to the database.

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès !');
    }
}
