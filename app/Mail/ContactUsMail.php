<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $image;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $image)
    {
        $this->data = $data;
        $this->image = $image;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Contact Us')
            ->view('emails.contact')
            ->attach(public_path('uploads/' . $this->image));
    }
}
