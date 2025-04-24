<?php

// app/Mail/ContactReply.php
namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactReply extends Mailable
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
            subject: 'Antwort auf dein Ticket ' . $this->contact->ticket_number,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact.reply',
            with: ['contact' => $this->contact],
        );
    }

    public function attachments(): array
    {
        if ($this->contact->attachment) {
            return [
                Attachment::fromPath(storage_path("app/{$this->contact->attachment}"))
                    ->as(basename($this->contact->attachment)),
            ];
        }

        return [];
    }
}
