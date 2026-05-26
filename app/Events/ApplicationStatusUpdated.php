<?php

namespace App\Events;

use App\Models\Application;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ApplicationStatusUpdated
{
    use Dispatchable, SerializesModels;

    public Application $application;
    public string $oldStatus;

    public function __construct(Application $application, string $oldStatus)
    {
        $this->application = $application;
        $this->oldStatus = $oldStatus;
    }
}
