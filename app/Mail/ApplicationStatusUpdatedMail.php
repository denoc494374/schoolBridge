<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationStatusUpdatedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Application $application;
    public string $oldStatus;

    public function __construct(Application $application, string $oldStatus)
    {
        $this->application = $application;
        $this->oldStatus = $oldStatus;
    }

    public function build()
    {
        return $this->subject('Your scholarship application status has been updated')
            ->view('emails.application_status_updated')
            ->with([
                'application' => $this->application,
                'oldStatus' => $this->oldStatus,
            ]);
    }
}
