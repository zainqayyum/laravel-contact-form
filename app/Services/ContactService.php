<?php

namespace App\Services;

use App\Models\Contact;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;


class ContactService
{
    public function handle(array $data, string $ip = null)
    {
        $contact = Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
            'ip' => $ip,
        ]);


        // Queue the mailable for sending. MAIL_ADMIN is used as recipient.
        $admin = config('mail.admin');
        if ($admin) {
            Mail::to($admin)->queue(new ContactMessageMail($contact));
        }


        return $contact;
    }
}
