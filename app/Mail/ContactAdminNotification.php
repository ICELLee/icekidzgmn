<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactAdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public ContactMessage $contact;

    public function __construct(ContactMessage $contact)
    {
        $this->contact = $contact;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Neue Kontaktanfrage: ' . $this->contact->ticket_number,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact.admin',
            with: ['contact' => $this->contact],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
