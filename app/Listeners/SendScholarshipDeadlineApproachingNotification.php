<?php

namespace App\Listeners;

use App\Events\ScholarshipDeadlineApproaching;
use App\Mail\ScholarshipDeadlineApproachingMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendScholarshipDeadlineApproachingNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(ScholarshipDeadlineApproaching $event): void
    {
        $organization = $event->scholarship->organization;

        if (! $organization || ! $organization->contact_email) {
            return;
        }

        Mail::to($organization->contact_email)
            ->queue(new ScholarshipDeadlineApproachingMail($event->scholarship));
    }
}
