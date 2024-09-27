<?php

namespace App\Jobs;

use App\Mail\welcomeemail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $message;
    protected $subject;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $message, $subject)
    {
        $this->email = $email;
        $this->message = $message;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Send the email with the welcomeemail Mailable
        Mail::to($this->email)->send(new welcomeemail($this->message, $this->subject));
    }
}
