<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class StudentDashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $stats = [
            'scholarships' => Scholarship::open()->withAvailableSlots()->count(),
            'applications' => $user->applications()->whereNotIn('status', ['approved'])->count(),
            'approved' => $user->applications()->where('status', 'approved')->count(),
        ];

        return view('dashboard.student', compact('stats'));
    }
}
