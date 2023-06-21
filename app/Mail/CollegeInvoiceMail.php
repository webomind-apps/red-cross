<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CollegeInvoiceMail extends Mailable
{
    public $subject, $body, $file, $file1;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $body, $file, $file1)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->file = $file;
        $this->file1 = $file1;
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
            ->attachData($this->file->output(), 'Receipt.pdf')
            ->attachData($this->file1->output(), 'Thank-You.pdf')
            ->withMime('application/pdf');
    }
}
