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

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate common fields
        $validationRules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:student,provider'],
        ];

        // Add student-specific validation
        if ($request->role === 'student') {
            $validationRules['age'] = ['required', 'integer', 'min:1', 'max:120'];
            $validationRules['year_level'] = ['required', 'string', 'in:First Year,Second Year,Third Year,Fourth Year'];
            $validationRules['address'] = ['required', 'string', 'max:500'];
        }

        $request->validate($validationRules);

        $role = Role::firstOrCreate(['name' => $request->role]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => 'active',
        ]);

        $user->assignRole($role);

        // Create student profile if registering as student
        if ($request->role === 'student') {
            StudentProfile::create([
                'user_id' => $user->id,
                'age' => $request->age,
                'year_level' => $request->year_level,
                'address' => $request->address,
            ]);
        }

        event(new Registered($user));

        // Don't log in yet - redirect to register page to show success message
        // This prevents the guest middleware from redirecting authenticated users to dashboard
        return redirect(route('register'))->with('success', 'Welcome to ScholarBridge! Your account has been created successfully. You can now access your dashboard.')->with('register_email', $user->email)->with('register_role', $user->role)->with('user_id', $user->id);
    }
}
