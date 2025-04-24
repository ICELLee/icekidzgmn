<?php

// app/Http/Controllers/ContactController.php
namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact_type' => 'required',
            'priority' => 'required',
            'message' => 'required',
        ]);

        $contact = ContactMessage::create($validated);

        // Mail an Admin
        Mail::to(config('mail.from.address'))->send(new \App\Mail\ContactAdminNotification($contact));

        // Bestätigung an User
        Mail::to($contact->email)->send(new \App\Mail\ContactUserConfirmation($contact));

        return redirect()->back()->with('success', 'Deine Nachricht wurde erfolgreich gesendet. Ticketnummer: ' . $contact->ticket_number);
    }
}
