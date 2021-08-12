<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class InviteNotification extends Mailable
{

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.getinvited')
                    ->with('details', $this->details);

    }
}
