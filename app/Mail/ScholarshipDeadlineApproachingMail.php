<?php

namespace App\Mail;

use App\Models\Scholarship;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ScholarshipDeadlineApproachingMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Scholarship $scholarship;

    public function __construct(Scholarship $scholarship)
    {
        $this->scholarship = $scholarship;
    }

    public function build()
    {
        return $this->subject('Scholarship deadline approaching')
            ->view('emails.scholarship_deadline_approaching')
            ->with([
                'scholarship' => $this->scholarship,
            ]);
    }
}
