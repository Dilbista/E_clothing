<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = Wishlist::where('user_id', auth()->id())->with('product')->get();
        return view('frondend.wishlist', compact('wishlistItems'));
    }

    // Add product to wishlist via AJAX

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'product_id' => 'required|exists:products,id'
    //     ]);

    //     $exists = Wishlist::where('user_id', auth()->id())
    //         ->where('product_id', $request->product_id)
    //         ->exists();

    //     if ($exists) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Product is already in your wishlist.'
    //         ]);
    //     }

    //     Wishlist::create([
    //         'user_id' => auth()->id(),
    //         'product_id' => $request->product_id
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Product added to wishlist.'
    //     ]);
    // }

    public function store(Request $request, $id = null)
    {
        // Supports both styles:
        // 1) store($id) -> /wishlist/add/{id} (legacy) (not used in current routes)
        // 2) store JSON body { product_id: ... } -> /wishlist/add
        $productId = $id;

        if ($request->filled('product_id')) {
            $productId = $request->input('product_id');
        }

        if (!$productId) {
            return response()->json([
                'success' => false,
                'message' => 'Missing product_id'
            ], 422);
        }

        // Toggle behavior
        $wishlist = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if ($wishlist) {
            $wishlist->delete();
            $is_wishlisted = false;
        } else {
            Wishlist::create([
                'user_id' => auth()->id(),
                'product_id' => $productId,
            ]);
            $is_wishlisted = true;
        }

        $count = Wishlist::where('user_id', auth()->id())->count();

        return response()->json([
            'success' => true,
            'is_wishlisted' => $is_wishlisted,
            'count' => $count,
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

public function toggleWishlist(Request $request)
{
    $userId = auth()->id();
    $product_id = $request->product_id;

    $wishlist = Wishlist::where('user_id', $userId)->where('product_id', $product_id)->first();

    if ($wishlist) {
        $wishlist->delete();
        $is_wishlisted = false;
    } else {
        Wishlist::create(['user_id' => $userId, 'product_id' => $product_id]);
        $is_wishlisted = true;
    }

    $count = Wishlist::where('user_id', $userId)->count();

    return response()->json([
        'success' => true,
        'is_wishlisted' => $is_wishlisted,
        'count' => $count // This will update the navbar
    ]);
}
}
