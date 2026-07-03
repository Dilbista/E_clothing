<?php

namespace App\Http\Controllers;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\Product; // Assuming you have a Product model

class WishlistController extends Controller
{
    // Show user's wishlist
    public function index()
    {
        $wishlistItems = Wishlist::where('user_id', auth()->id())->with('product')->get();
        return view('frondend.wishlist', compact('wishlistItems'));
    }

    // Add product to wishlist via AJAX

public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id'
    ]);

    $wishlist = Wishlist::where('user_id', auth()->id())
        ->where('product_id', $request->product_id)
        ->first();

    if ($wishlist) {
        $wishlist->delete();
        $count = Wishlist::where('user_id', auth()->id())->count();
        return response()->json([
            'success' => true,
            'status' => 'removed',
            'message' => 'Product removed from wishlist.',
            'wishlist_count' => $count
        ]);
    }

    Wishlist::create([
        'user_id' => auth()->id(),
        'product_id' => $request->product_id
    ]);

    $count = Wishlist::where('user_id', auth()->id())->count();
    return response()->json([
        'success' => true,
        'status' => 'added',
        'message' => 'Product added to wishlist.',
        'wishlist_count' => $count
    ]);
}

    // Remove product from wishlist
    public function destroy($id)
    {
        $wishlist = Wishlist::where('id', $id)->where('user_id', auth()->id())->first();
        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'error'], 400);
    }
}
