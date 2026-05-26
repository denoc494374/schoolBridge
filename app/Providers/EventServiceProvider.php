<?php

namespace App\Providers;

use App\Events\ApplicationStatusUpdated;
use App\Events\ScholarshipDeadlineApproaching;
use App\Listeners\SendApplicationStatusUpdatedNotification;
use App\Listeners\SendScholarshipDeadlineApproachingNotification;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->app->make('events')->listen(
            ApplicationStatusUpdated::class,
            SendApplicationStatusUpdatedNotification::class,
        );

        $this->app->make('events')->listen(
            ScholarshipDeadlineApproaching::class,
            SendScholarshipDeadlineApproachingNotification::class,
        );
    }
}
