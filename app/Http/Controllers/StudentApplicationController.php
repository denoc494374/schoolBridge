<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Mail\ApplicationSubmittedMail;
use App\Models\Application;
use App\Models\Document;
use App\Models\Scholarship;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class StudentApplicationController extends Controller
{
    public function index(): View
    {
        $query = Auth::user()->applications()->with(['scholarship', 'scholarship.organization']);

        if (request('status')) {
            $query->where('status', request('status'));
        } else {
            $query->whereNotIn('status', ['approved']);
        }

        $applications = $query->latest('submitted_at')->paginate(12);

        return view('student.applications.index', compact('applications'));
    }

    public function show(Application $application): View
    {
        if ($application->student_id !== Auth::id()) {
            abort(403);
        }

        $application->load(['scholarship.organization', 'documents']);

        return view('student.applications.show', compact('application'));
    }

    public function create(Scholarship $scholarship): View|RedirectResponse
    {
        if ($scholarship->status !== 'open' || $scholarship->deadline <= now()) {
            abort(404);
        }

        if (Auth::user()->applications()->where('scholarship_id', $scholarship->id)->exists()) {
            return redirect()->route('student.scholarships.show', $scholarship)->with('error', 'You have already applied to this scholarship.');
        }

        return view('student.applications.create', compact('scholarship'));
    }

    public function store(ApplicationRequest $request, Scholarship $scholarship): RedirectResponse
    {
        if ($scholarship->status !== 'open' || $scholarship->deadline <= now()) {
            abort(404);
        }

        $student = Auth::user();

        if ($student->applications()->where('scholarship_id', $scholarship->id)->exists()) {
            return redirect()->route('student.scholarships.show', $scholarship)->with('error', 'You have already applied to this scholarship.');
        }

        $submittedDocuments = [];

        $application = Application::create([
            'scholarship_id' => $scholarship->id,
            'student_id' => $student->id,
            'status' => 'pending',
            'remarks' => $request->remarks,
            'submitted_at' => now(),
        ]);

        foreach ($request->file('documents') as $documentFile) {
            $path = $documentFile->store('applications/'.$application->id, ['disk' => 'local']);

            Document::create([
                'application_id' => $application->id,
                'file_path' => $path,
                'document_type' => $documentFile->getClientOriginalExtension(),
                'uploaded_at' => now(),
            ]);

            // Add document info to submitted_documents array
            $submittedDocuments[] = [
                'filename' => $documentFile->getClientOriginalName(),
                'file_path' => $path,
                'document_type' => $documentFile->getClientOriginalExtension(),
                'size' => $documentFile->getSize(),
                'uploaded_at' => now()->toIso8601String(),
            ];
        }

        // Update application with submitted documents
        $application->update(['submitted_documents' => $submittedDocuments]);

        // Send confirmation email to student
        Mail::to($student->email)->queue(new ApplicationSubmittedMail($application));

        return redirect()->route('student.scholarships.show', $scholarship)->with('success', 'Your application has been submitted successfully! Check your email for confirmation.');
    }

    public function destroy(Application $application): RedirectResponse
    {
        if ($application->student_id !== Auth::id()) {
            abort(403);
        }

        // Delete associated documents
        foreach ($application->documents as $document) {
            Storage::disk('local')->delete($document->file_path);
            $document->delete();
        }

        // Delete the application
        $application->delete();

        return redirect()->route('student.applications.index')->with('success', 'Your application has been deleted successfully.');
    }
}
