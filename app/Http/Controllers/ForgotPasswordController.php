<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PasswordOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('Forgotpassword.forgot-password');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $otp = rand(100000, 999999);

        PasswordOtp::updateOrCreate(['email' => $request->email], [
            'otp' => $otp,
            'expires_at' => now()->addMinutes(1)
        ]);

        try {
            Mail::raw("Your OTP is: {$otp}", function ($message) use ($request) {
                $message->to($request->email)->subject('Password Reset OTP');
            });

            session(['email' => $request->email]);
            return redirect()->route('verify.form')->with('success', 'OTP sent!');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Could not send email: ' . $e->getMessage()]);
        }
    }

    public function showVerifyForm()
    {
        return view('Forgotpassword.verify-otp');
    }
public function verifyOtp(Request $request)
{
    $request->validate(['otp' => 'required|digits:6']);
    
    $otpRecord = PasswordOtp::where('email', session('email'))->where('otp', $request->otp)->first();
    
    if (!$otpRecord || now()->gt($otpRecord->expires_at)) {
        return back()->with('error', 'Invalid or Expired OTP.');
    }

    session(['reset_email' => session('email')]);
    
    // FIX: Pass the 'token' parameter here to satisfy the route
    return redirect()->route('reset.password', ['token' => 'verified']);
}

    public function showResetForm($token)
    {
        // Check if user has permission to be here
        if (!session()->has('reset_email')) {
            return redirect()->route('forgot.password')->with('error', 'Unauthorized access.');
        }
        
        return view('Forgotpassword.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        // dd('ddd');
        $request->validate(['password' => 'required|min:8|confirmed']);
        
        $user = User::where('email', session('reset_email'))->first();
        if ($user) {
            $user->update(['password' => Hash::make($request->password)]);
            PasswordOtp::where('email', session('reset_email'))->delete();
            session()->forget(['email', 'reset_email']);
            return redirect()->route('login')->with('success', 'Password reset successfully.');
        }

        return back()->with('error', 'User not found.');
    }
}