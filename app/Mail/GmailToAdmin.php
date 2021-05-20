<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GmailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $detailsToAdmin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($detailsToAdmin)
    {
        $this->detailsToAdmin = $detailsToAdmin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Inscription pour une formation sur la plateforme Atalhos Communication ")
                    ->view('emails.mailToAdmin')
                    ->from('isaacdahoue1@gmail.com');

    }
}
