<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;

class ContactanosMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $user)
    {
        $this->data = $data; // asunto y mensaje
        $this->user = $user; // usuario autenticado
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('73031584@continental.edu.pe', 'Jefferson Diego Curi Untiveros'),
            subject: $this->data['asunto'], // Asunto dinámico desde el formulario
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contactanos',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
