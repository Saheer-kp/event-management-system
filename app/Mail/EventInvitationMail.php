<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;

class EventInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event, $user)
    {
        $this->event = $event;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(Config::get('mail.from.address'), Config::get('mail.from.name'))
                    ->subject('Invitation to the event')
                    ->markdown('emails.event.invitation-mail');
    }
}
