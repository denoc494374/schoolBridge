<?php

namespace App\Events;

use App\Models\Scholarship;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ScholarshipDeadlineApproaching
{
    use Dispatchable, SerializesModels;

    public Scholarship $scholarship;

    public function __construct(Scholarship $scholarship)
    {
        $this->scholarship = $scholarship;
    }
}
