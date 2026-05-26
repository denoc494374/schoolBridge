<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$scholarships = \App\Models\Scholarship::all();
echo "Total Scholarships: " . count($scholarships) . "\n";

foreach ($scholarships as $s) {
    echo "- {$s->title} (Status: {$s->status}, Deadline: {$s->deadline})\n";
}

$openScholarships = \App\Models\Scholarship::where('status', 'open')->where('deadline', '>', now())->get();
echo "\nOpen Scholarships with Future Deadlines: " . count($openScholarships) . "\n";

foreach ($openScholarships as $s) {
    echo "- {$s->title} (Deadline: {$s->deadline})\n";
}
