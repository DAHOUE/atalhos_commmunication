<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GmailMessageToAdmin extends Mailable
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
        return $this->subject($this->detailsToAdmin['subject'])
                    ->from('atalhoscommunication@gmail.com')
                    ->view('emails.mailMessageToAdmin');
    }
}
