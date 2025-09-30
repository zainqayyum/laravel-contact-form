<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Contact;
use App\Mail\ContactMessageMail;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_submission_saves_and_sends_email()
    {
        Mail::fake();

        $response = $this->post(route('contact.store'), [
            'name' => 'Zain Qayyum',
            'email' => 'zain@example.com',
            'subject' => 'Test Subject',
            'message' => 'This is a test message',
        ]);

        $response->assertRedirect(route('contact.index'));
        $this->assertDatabaseHas('contacts', [
            'email' => 'zain@example.com',
            'subject' => 'Test Subject',
        ]);

        Mail::assertQueued(ContactMessageMail::class);
    }

    public function test_validation_errors_for_empty_fields()
    {
        $response = $this->post(route('contact.store'), []);

        $response->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
    }

    public function test_rate_limit_applies()
    {
        Mail::fake();

        for ($i = 0; $i < 5; $i++) {
            $response = $this->post(route('contact.store'), [
                'name' => 'Zain',
                'email' => 'zain'.$i.'@example.com',
                'subject' => 'subject',
                'message' => 'message',
            ]);
            $response->assertRedirect();
        }

        // 6th request should be rate limited
        $response = $this->post(route('contact.store'), [
            'name' => 'Zain',
            'email' => 'zain6@example.com',
            'subject' => 'subject',
            'message' => 'message',
        ]);

        $response->assertStatus(429);
    }
}
