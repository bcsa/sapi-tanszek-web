<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $contactMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contactMessage)
    {
        $this->contactMessage = $contactMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->replyTo($this->contactMessage->email, $this->contactMessage->name);
        $this->from('csongiika@gmail.com');

        return $this->markdown('emails.contact-message.received');
    }
}
