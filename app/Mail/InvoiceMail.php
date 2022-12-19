<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{

    public $subject, $body, $file;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $body, $file)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->file = $file;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function build()
    {
        return $this
            ->subject($this->subject)
            ->html($this->body)
            ->attachData($this->file->output(), 'Invoice.pdf')
            ->withMime('application/pdf');
    }
}
