<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function download(Request $request, Document $document)
    {
        if (! $request->hasValidSignature()) {
            abort(403);
        }

        $application = $document->application;

        if ($application->student_id !== Auth::id() && (! Auth::user()->organization || Auth::user()->organization->id !== $application->scholarship->organization_id)) {
            abort(403);
        }

        return Storage::disk('local')->download($document->file_path);
    }
}
