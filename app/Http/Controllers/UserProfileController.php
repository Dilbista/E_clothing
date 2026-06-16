<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    // Update Personal Information
    public function updateInfo(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'email'      => 'required|email|unique:users,email,'.Auth::id(),
            'phone'      => 'nullable|max:20',
        ]);

        /** @var \App\Models\User $user */
        $user = User::find(Auth::id());

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->phone      = $request->phone;

        $user->save();

return redirect()->back()->with('success', 'Profile information updated successfully.') ; }


    // Update Password
   public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password'     => 'required|min:8|confirmed',
    ]);

    $user = Auth::user();

    // check current password
    if (!Hash::check($request->current_password, $user->password)) {
        return back()
            ->withErrors([
                'current_password' => 'Current password is incorrect.'
            ])
            ->withInput()
            ->with('active_tab', 'tab-profile');
    }

    // update password
    /** @var \App\Models\User $user */
    $user = User::find(Auth::id());
    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()
        ->with('success', 'Password updated successfully.')
        ->with('active_tab', 'tab-profile');
}
}