<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

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
     * @throws \Illuminate\Validation\ValidationException
     */


public function store(Request $request): JsonResponse
{
    // Manual validator for AJAX handling
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255', 'unique:users,name'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'role' => ['required', 'in:provider,customer'],
        'phone' => ['required', 'string', 'max:15'],
        'profile_img' => ['nullable', 'image', 'max:2048'],
        'loyalty_points' => ['nullable', 'integer'],
       'service_type' => ['exclude_unless:role,provider', 'required', 'string', 'max:255'],
        'organization_name' => ['exclude_unless:role,provider', 'required', 'string', 'max:255'],
        'address' => ['exclude_unless:role,provider', 'string', 'max:255'],
        'license_number' => ['exclude_unless:role,provider', 'string', 'max:100'],
        'nic_number' => ['exclude_unless:role,provider', 'string', 'max:20'],
    ], [
        'name.required' => 'Name is required.',
        'name.unique' => 'This name is already taken.',
        'email.required' => 'Email is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email is already taken.',
        'password.required' => 'Password is required.',
        'password.confirmed' => 'Password confirmation does not match.',
        'role.required' => 'User role is required.',
        'role.in' => 'Role must be either provider or customer.',
        'phone.required' => 'Phone number is required.',
        'profile_img.image' => 'Profile image must be a valid image file.',
        'profile_img.max' => 'Profile image must not exceed 2MB.',
        'service_type.required_if' => 'Service type is required for providers.',
        'organization_name.required_if' => 'Organization name is required for providers.',
        'address.required_if' => 'Address is required for providers.',
        'license_number.required_if' => 'License number is required for providers.',
        'nic_number.required_if' => 'NIC number is required for providers.',
    ]);
     Log::info('Registration validation started', $validator->getData());
    // If validation fails
    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    $validatedData = $validator->validated();

    // Handle image upload
    $profileImgPath = null;
    if ($request->hasFile('profile_img')) {
        $profileImgPath = $request->file('profile_img')->store('profile_images', 'public');
    }

    // Create user
    $user = new User();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = $validatedData['password']; // Will be hashed automatically in Laravel 12
    $user->save();

    // Assign role using Spatie
    $user->assignRole($validatedData['role']);

    // Create role-specific data
    if ($validatedData['role'] === 'provider') {
        Provider::create([
            'user_id' => $user->id,
            'service_type' => $validatedData['service_type'],
            'phone' => $validatedData['phone'],
            'organization_name' => $validatedData['organization_name'],
            'address' => $validatedData['address']?? null,
            'license_number' => $validatedData['license_number']?? null,
            'nic_number' => $validatedData['nic_number']?? null,
            'profile_img' => $profileImgPath,
        ]);
        
    } else {
        Customers::create([
            'user_id' => $user->id,
            'phone' => $validatedData['phone'],
            'loyalty_points' => $validatedData['loyalty_points'] ?? 0,
            'profile_img' => $profileImgPath,
        ]);
       
    }
    
    event(new Registered($user));
    Auth::login($user);

    return response()->json([
        'message' => 'Registration successful',
        'redirect' => route('dashboard')
    ]);
}



}

