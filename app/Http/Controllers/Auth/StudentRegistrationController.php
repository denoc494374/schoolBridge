<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StudentProfile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class StudentRegistrationController extends Controller
{
    /**
     * Display the student registration view.
     */
    public function create(): View
    {
        return view('auth.register-student');
    }

    /**
     * Handle an incoming student registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min:1', 'max:120'],
            'year_level' => ['required', 'string', 'in:First Year,Second Year,Third Year,Fourth Year'],
            'address' => ['required', 'string', 'max:500'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $role = Role::firstOrCreate(['name' => 'student']);

        $user = User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student',
            'status' => 'active',
        ]);

        $user->assignRole($role);

        // Create student profile with registration data
        StudentProfile::create([
            'user_id' => $user->id,
            'age' => $request->age,
            'year_level' => $request->year_level,
            'address' => $request->address,
        ]);

        event(new Registered($user));

        // Don't log in yet - redirect to register page to show success message
        // This prevents the guest middleware from redirecting authenticated users to dashboard
        return redirect(route('student.register'))->with('success', 'Welcome to ScholarBridge! Your account has been created successfully. You can now access your dashboard.')->with('register_email', $user->email);
    }
}
