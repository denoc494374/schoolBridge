<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Services\EligibilityMatcherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class StudentScholarshipController extends Controller
{
    public function index(Request $request, EligibilityMatcherService $matcher): View
    {
        $query = Scholarship::with('organization')->open()->withAvailableSlots();

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%'.$searchTerm.'%')
                  ->orWhere('description', 'like', '%'.$searchTerm.'%')
                  ->orWhereJsonContains('eligibility_criteria->locations', $searchTerm)
                  ->orWhereJsonContains('eligibility_criteria->courses', $searchTerm);
            });
        }

        $scholarships = $query->latest()->paginate(12)->withQueryString();

        $studentProfile = Auth::user()->studentProfile;
        $matches = [];

        foreach ($scholarships as $scholarship) {
            $matches[$scholarship->id] = $matcher->matches($studentProfile, $scholarship);
        }

        return view('student.scholarships.index', compact('scholarships', 'matches'));
    }

    public function show(Scholarship $scholarship): View
    {
        if ($scholarship->status !== 'open' || $scholarship->deadline <= now()) {
            abort(404);
        }

        return view('student.scholarships.show', compact('scholarship'));
    }
}
