<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ContactMessageMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;


    public $contact;


    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }


    public function build()
    {
        return $this->subject('New Contact Message: ' . $this->contact->subject)
            ->view('emails.contact_message')
            ->with(['contact' => $this->contact]);
    }
}
