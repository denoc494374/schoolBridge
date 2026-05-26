<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScholarshipRequest;
use App\Models\Scholarship;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProviderScholarshipController extends Controller
{
    public function index(): View|RedirectResponse
    {
        $organization = Auth::user()->organization;

        if (! $organization) {
            return redirect()->route('provider.dashboard')->with('error', 'Please complete your organization profile before creating scholarships.');
        }

        $scholarships = $organization->scholarships()->latest()->paginate(10);

        return view('provider.scholarships.index', compact('scholarships'));
    }

    public function create(): View|RedirectResponse
    {
        if (! Auth::user()->organization) {
            return redirect()->route('provider.dashboard')->with('error', 'Please complete your organization profile before creating scholarships.');
        }

        return view('provider.scholarships.create');
    }

    public function store(ScholarshipRequest $request): RedirectResponse
    {
        $organization = Auth::user()->organization;

        if (! $organization) {
            return redirect()->route('provider.dashboard')->with('error', 'Please complete your organization profile before creating scholarships.');
        }

        $organization->scholarships()->create([
            'title' => $request->title,
            'description' => $request->description,
            'slots' => $request->slots,
            'deadline' => $request->deadline,
            'eligibility_criteria' => $this->parseEligibilityCriteria($request->input('eligibility_criteria', [])),
            'year_level' => $this->parseArrayOrString($request->input('eligibility_criteria.year_levels', [])),
            'status' => 'open',
        ]);

        return redirect()->route('provider.scholarships.index')->with('success', 'Scholarship created successfully! It is now live and students can start applying.');
    }

    public function show(Scholarship $scholarship): View
    {
        $this->authorizeOrganizationScholarship($scholarship);

        return view('provider.scholarships.show', compact('scholarship'));
    }

    public function edit(Scholarship $scholarship): View
    {
        $this->authorizeOrganizationScholarship($scholarship);

        return view('provider.scholarships.edit', compact('scholarship'));
    }

    public function update(ScholarshipRequest $request, Scholarship $scholarship): RedirectResponse
    {
        $this->authorizeOrganizationScholarship($scholarship);

        $scholarship->update([
            'title' => $request->title,
            'description' => $request->description,
            'slots' => $request->slots,
            'deadline' => $request->deadline,
            'eligibility_criteria' => $this->parseEligibilityCriteria($request->input('eligibility_criteria', [])),
            'year_level' => $this->parseArrayOrString($request->input('eligibility_criteria.year_levels', [])),
        ]);

        return redirect()->route('provider.scholarships.index')->with('success', 'Scholarship updated successfully! All changes have been saved.');
    }

    public function destroy(Scholarship $scholarship): RedirectResponse
    {
        $this->authorizeOrganizationScholarship($scholarship);

        $scholarship->delete();

        return redirect()->route('provider.scholarships.index')->with('success', 'Scholarship has been deleted. Students can no longer apply for this opportunity.');
    }

    protected function authorizeOrganizationScholarship(Scholarship $scholarship): void
    {
        if (! Auth::user()->organization || Auth::user()->organization->id !== $scholarship->organization_id) {
            abort(403);
        }
    }

    protected function parseEligibilityCriteria(array $criteria): array
    {
        return [
            'locations' => $this->splitString($criteria['locations'] ?? ''),
            'courses' => $this->splitString($criteria['courses'] ?? ''),
            'year_levels' => $this->parseArrayOrString($criteria['year_levels'] ?? ''),
            'income_brackets' => $this->splitString($criteria['income_brackets'] ?? ''),
            'min_gpa' => $criteria['min_gpa'] ?? null,
        ];
    }

    protected function splitString(string $value): array
    {
        return array_values(array_filter(array_map('trim', explode(',', $value))));
    }

    protected function parseArrayOrString($value): array
    {
        if (is_array($value)) {
            return array_values(array_filter($value));
        }
        return $this->splitString($value);
    }
}
