<?php

namespace App\Http\Controllers;

use App\Events\ApplicationStatusUpdated;
use App\Http\Requests\ApplicationStatusRequest;
use App\Models\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProviderApplicationController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        $organization = Auth::user()->organization;

        if (! $organization) {
            return redirect()->route('provider.dashboard')->with('error', 'Complete your organization profile first.');
        }

        $baseQuery = Application::whereHas('scholarship', function ($query) use ($organization) {
            $query->where('organization_id', $organization->id);
        })
        ->with(['scholarship.organization', 'student']);

        $pendingApplications = (clone $baseQuery)
            ->where('status', 'pending')
            ->latest('submitted_at')
            ->paginate(12, ['*'], 'pending_page');

        $approvedApplications = (clone $baseQuery)
            ->where('status', 'approved')
            ->latest('submitted_at')
            ->paginate(12, ['*'], 'approved_page');

        $rejectedApplications = (clone $baseQuery)
            ->where('status', 'rejected')
            ->latest('submitted_at')
            ->paginate(12, ['*'], 'rejected_page');

        return view('provider.applications.index', compact('pendingApplications', 'approvedApplications', 'rejectedApplications'));
    }

    public function show(Application $application): View
    {
        $application->load(['scholarship.organization', 'student', 'documents']);
        $this->authorizeProviderApplication($application);

        return view('provider.applications.show', compact('application'));
    }

    public function update(ApplicationStatusRequest $request, Application $application): RedirectResponse
    {
        $this->authorizeProviderApplication($application);

        $oldStatus = $application->status;
        $application->update([
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        event(new ApplicationStatusUpdated($application, $oldStatus));

        $statusMessage = match($application->status) {
            'approved' => 'Application approved! The student has been notified via email.',
            'rejected' => 'Application rejected. The student has been notified of the decision.',
            default => 'Application status updated. The student has been notified.'
        };

        return redirect()->route('provider.applications.index')->with('success', $statusMessage);
    }

    public function downloadDocument($applicationId, $documentId)
    {
        $application = Application::findOrFail($applicationId);
        $this->authorizeProviderApplication($application);

        $document = $application->documents()->findOrFail($documentId);

        return Storage::disk('local')->download($document->file_path);
    }

    protected function authorizeProviderApplication(Application $application): void
    {
        if (! Auth::user()->organization || Auth::user()->organization->id !== $application->scholarship->organization_id) {
            abort(403);
        }
    }
}
