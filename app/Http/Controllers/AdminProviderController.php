<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProviderController extends Controller
{
    public function index(Request $request): View
    {
        $query = Organization::with('user');

        if ($request->filled('status')) {
            if ($request->status === 'verified') {
                $query->whereNotNull('verified_at');
            } else {
                $query->whereNull('verified_at');
            }
        }

        if ($request->filled('search')) {
            $query->where(fn ($q) => $q->where('name', 'like', '%'.$request->search.'%')
                ->orWhere('contact_email', 'like', '%'.$request->search.'%'));
        }

        $organizations = $query->latest()->paginate(12);

        return view('admin.providers.index', compact('organizations'));
    }

    public function show(Organization $organization): View
    {
        return view('admin.providers.show', compact('organization'));
    }

    public function verify(Organization $organization): RedirectResponse
    {
        $organization->update(['verified_at' => now()]);

        return redirect()->route('admin.providers.show', $organization)->with('success', 'Provider verified successfully.');
    }

    public function revoke(Organization $organization): RedirectResponse
    {
        $organization->update(['verified_at' => null]);

        return redirect()->route('admin.providers.show', $organization)->with('success', 'Provider verification revoked.');
    }
}
