<?php

namespace App\Console\Commands;

use App\Events\ScholarshipDeadlineApproaching;
use App\Models\Scholarship;
use Illuminate\Console\Command;

class CloseExpiredScholarships extends Command
{
    protected $signature = 'scholarships:expire';

    protected $description = 'Close scholarships that have passed their deadline and notify providers about upcoming deadlines.';

    public function handle(): int
    {
        $expired = Scholarship::query()
            ->where('status', 'open')
            ->where('deadline', '<', now())
            ->update(['status' => 'closed']);

        $this->info("Closed {$expired} expired scholarships.");

        $soon = Scholarship::with('organization')
            ->where('status', 'open')
            ->whereBetween('deadline', [now(), now()->addDays(2)])
            ->get();

        foreach ($soon as $scholarship) {
            event(new ScholarshipDeadlineApproaching($scholarship));
        }

        $this->info("Dispatched deadline approaching event for {$soon->count()} scholarships.");

        return self::SUCCESS;
    }
}
