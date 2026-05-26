<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class AnalyticsController extends Controller
{
    public function dashboard(): JsonResponse
    {
        return response()->json([
            'total_users' => User::count(),
            'total_students' => User::where('role', 'student')->count(),
            'total_providers' => User::where('role', 'provider')->count(),
            'verified_providers' => User::whereHas('organization', fn ($q) => $q->whereNotNull('verified_at'))->count(),
            'total_scholarships' => Scholarship::count(),
            'open_scholarships' => Scholarship::where('status', 'open')->where('deadline', '>', now())->count(),
            'total_applications' => Application::count(),
            'pending_applications' => Application::where('status', 'pending')->count(),
            'approved_applications' => Application::where('status', 'approved')->count(),
            'applications_by_status' => Application::selectRaw('status, count(*) as count')
                ->groupBy('status')
                ->pluck('count', 'status')
                ->toArray(),
            'scholarships_by_status' => Scholarship::selectRaw('status, count(*) as count')
                ->groupBy('status')
                ->pluck('count', 'status')
                ->toArray(),
        ]);
    }
}
