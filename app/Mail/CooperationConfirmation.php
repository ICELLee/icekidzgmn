<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CooperationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public string $firstName;
    public string $ticketNumber;
    public function __construct(string $firstName, string $ticketNumber)
    {
        $this->firstName = $firstName;
        $this->ticketNumber = $ticketNumber;
    }
    public function build()
    {
        return $this->subject('Deine Kooperationsanfrage bei ICEKIDZ')
            ->markdown('emails.cooperation.confirmation');
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cooperation Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
