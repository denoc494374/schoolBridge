<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProviderOrganizationController extends Controller
{
    public function edit(): View
    {
        return view('provider.organization.edit');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
        ]);

        Auth::user()->organization()->create($validated);

        return redirect()->route('provider.scholarships.index')->with('success', 'Organization profile created successfully! You can now create scholarships and manage applications.');
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
        ]);

        Auth::user()->organization->update($validated);

        return redirect()->route('provider.dashboard')->with('success', 'Organization profile has been updated successfully!');
    }
}
