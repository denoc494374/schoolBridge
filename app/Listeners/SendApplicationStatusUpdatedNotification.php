<?php

namespace App\Listeners;

use App\Events\ApplicationStatusUpdated;
use App\Mail\ApplicationStatusUpdatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendApplicationStatusUpdatedNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(ApplicationStatusUpdated $event): void
    {
        Mail::to($event->application->student->email)
            ->queue(new ApplicationStatusUpdatedMail($event->application, $event->oldStatus));
    }
}
