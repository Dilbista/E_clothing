<?php

//  app/Http/Controllers/AddressController.php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

   public function index($id)
{
    $addresses = Address::where('user_id', $id)->get();

    return view('frondend.userprofile', compact('addresses'));
}
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type'        => 'required|in:shipping,billing,home,office',
            'name'        => 'required|string|max:255',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city'        => 'required|string|max:255',
            'state'       => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'phone'       => 'required|string|max:20',
            'is_default'  => 'nullable|boolean',
        ]);

        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        // If this address is set as default, unset any existing default
        if ($request->has('is_default') && $request->is_default) {
            $user->addresses()->update(['is_default' => false]);
            $validated['is_default'] = true;
        } else {
            $validated['is_default'] = false;
        }

        $address = $user->addresses()->create($validated);
        
        return redirect()->back()->with('success', 'Address added successfully.')->with('active_tab', 'tab-addresses');
    }

    public function update(Request $request, Address $address)
    {
        // Ensure the address belongs to the authenticated user
        if ($address->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'type'        => 'required|in:shipping,billing,home,office',
            'name'        => 'required|string|max:255',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city'        => 'required|string|max:255',
            'state'       => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'phone'       => 'required|string|max:20',
            'is_default'  => 'nullable|boolean',
        ]);

        // If this address is set as default, unset any other default
        if ($request->has('is_default') && $request->is_default) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $user->addresses()->where('id', '!=', $address->id)->update(['is_default' => false]);
            $validated['is_default'] = true;
        } else {
            $validated['is_default'] = false;
        }

        $address->update($validated);

        return redirect()->back()->with('success', 'Address updated successfully.')->with('active_tab', 'tab-addresses');
    }

    // Optional: delete method
    public function destroy(Address $address)
    {
        if ($address->user_id !== Auth::id()) {
            abort(403);
        }

        $address->delete();
        return redirect()->back()->with('success', 'Address deleted.')->with('active_tab', 'tab-addresses');
    }
}
