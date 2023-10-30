<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $cvPath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $cvPath)
    {
        $this->data = $data;
        $this->cvPath = $cvPath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreplycandidature@aimurazzi.it')
            ->subject('Auto Candidatura')
            ->view('mails.contacts.message')
            ->with([
                'data' => $this->data,
            ])
            ->attach($this->cvPath);
    }
}
