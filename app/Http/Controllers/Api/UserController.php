<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users from database
        // $users = User::all();

        $users= User::orderBy('created_at', 'desc')->paginate(5);

        return view('Backend.usermanagement', compact('users'));
    }

   public function store(Request $request)
{
    // 1. Validate incoming data dynamically
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => ['required', 'email', Rule::unique('users', 'email')->ignore($request->user_id)],
        'role_id'  => 'required',
        'status'   => 'required',
        // Password is REQUIRED for new users, but OPTIONAL (nullable) when updating
        'password' => $request->user_id ? 'nullable|string|min:8' : 'required|string|min:8',
    ]);

    // 2. Build the data array
    $userData = [
        'name'    => $request->name,
        'email'   => $request->email,
        'role_id' => $request->role_id,
        'status'  => $request->status,
    ];

    // 3. Conditionally inject the hashed password into the data array
    if ($request->filled('password')) {
        $userData['password'] = Hash::make($request->password);
    }

    // 4. Perform the single atomic updateOrCreate query
    User::updateOrCreate(
        ['id' => $request->user_id],
        $userData
    );

    return redirect()->back()->with('success', 'User saved successfully');
    }




    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Prevention: Don't let admin delete themselves
        if (Auth()->id() == $user->id) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
