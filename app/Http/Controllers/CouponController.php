<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    // Serves the main admin blade view
    public function index()
    {
        return view('Backend.coupons.index'); // Adjust directory path as necessary
    }

    // Returns coupons data in JSON format
    public function data()
    {
        $coupons = Coupon::orderBy('expiry', 'desc')->get();
        return response()->json($coupons);
    }

    // Handles storing a new coupon
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:coupons,code|max:255',
            'type' => 'required|in:percentage,fixed',
            'value' => 'required|numeric|min:0.01',
            'min_order' => 'nullable|numeric|min:0',
            'expiry' => 'required|date',
            'usage_limit' => 'nullable|integer|min:1',
        ]);

        if ($validated['type'] === 'percentage' && $validated['value'] > 100) {
            return response()->json(['message' => 'Percentage discount cannot exceed 100%'], 422);
        }

        $coupon = Coupon::create($validated);

        return response()->json([
            'message' => 'Coupon created successfully',
            'coupon' => $coupon
        ]);
    }

    // Handles updating an existing coupon
    public function update(Request $request, Coupon $coupon)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:coupons,code,' . $coupon->id,
            'type' => 'required|in:percentage,fixed',
            'value' => 'required|numeric|min:0.01',
            'min_order' => 'nullable|numeric|min:0',
            'expiry' => 'required|date',
            'usage_limit' => 'nullable|integer|min:1',
        ]);

        if ($validated['type'] === 'percentage' && $validated['value'] > 100) {
            return response()->json(['message' => 'Percentage discount cannot exceed 100%'], 422);
        }

        $coupon->update($validated);

        return response()->json([
            'message' => 'Coupon updated successfully',
            'coupon' => $coupon
        ]);
    }

    // Handles deleting a coupon
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return response()->json([
            'message' => 'Coupon deleted successfully'
        ]);
    }
}