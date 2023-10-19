<?php

namespace App\Jobs;

use App\Mail\Contact\ContactMail;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class StoreContactJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $adminEmail;
    protected Contact $contact;

    /**
     * Create a new job instance.
     */
    public function __construct(array $adminEmail, Contact $contact)
    {
        $this->adminEmail = $adminEmail;
        $this->contact = $contact;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->adminEmail)->send(new ContactMail($this->contact));
    }
}
