<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Enums\UserType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validation

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Default role from Enum (CUSTOMER = 3)
        $customerRoleId = UserType::CUSTOMER->value;

        // Create user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $customerRoleId,
        ]);

        return redirect()->route('login')->with('success', 'User registered successfully');
    }


    


    public function login(Request $request)
    {
        // 1. VALIDATION
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 2. LOGIN ATTEMPT
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->with('error', 'Invalid credentials');
        }

        // 3. IMPORTANT: REGENERATE SESSION
        $request->session()->regenerate();

        // 4. GET USER
        $user = Auth::user();

        // 5. ROLE CHECK (ADMIN / SELLER → ADMIN DASHBOARD)
        if (in_array($user->role_id, [
            UserType::ADMIN->value,
            UserType::SELLER->value,
        ])) {
            return redirect()->route('admin')
                ->with('success', 'Welcome Admin/Seller');
        }

        // 6. CUSTOMER → HOME PAGE
        return redirect('/')
            ->with('success', 'Login successful');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('success', 'Logged out successfully');
    }
}
