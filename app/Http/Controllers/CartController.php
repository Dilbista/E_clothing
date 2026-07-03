<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    // Update Item Quantity (Increment/Decrement)
    public function updateQuantity(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|integer',
            'change' => 'required|integer|in:-1,1'
        ]);

        $cartItem = Cart::where('user_id', auth()->id())->findOrFail($request->cart_id);
        $newQty = $cartItem->quantity + $request->change;

        if ($newQty < 1) {
            return response()->json([
                'success' => false,
                'message' => 'Quantity cannot be less than 1.'
            ], 400);
        }

        $cartItem->quantity = $newQty;
        $cartItem->save();

        $totals = $this->calculateCartTotals();

        $unitPrice = $cartItem->product->discount_price 
            ? ($cartItem->product->price - $cartItem->product->discount_price) 
            : $cartItem->product->price;

        return response()->json([
            'success' => true,
            'quantity' => $newQty,
            'item_subtotal' => $unitPrice * $newQty,
            'subtotal' => $totals['subtotal'],
            'tax' => $totals['tax'],
            'total' => $totals['total']
        ]);
    }

    // Remove Item from Cart
    public function removeItem(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|integer',
        ]);

        $cartItem = Cart::where('user_id', auth()->id())->findOrFail($request->cart_id);
        $cartItem->delete();

        $totals = $this->calculateCartTotals();
        $isEmpty = Cart::where('user_id', auth()->id())->count() === 0;

        return response()->json([
            'success' => true,
            'subtotal' => $totals['subtotal'],
            'tax' => $totals['tax'],
            'total' => $totals['total'],
            'isEmpty' => $isEmpty
        ]);
    }

    // Secure helper calculation on Server Side
    private function calculateCartTotals()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        $subtotal = 0;

        foreach ($cartItems as $item) {
            $price = $item->product->discount_price 
                ? ($item->product->price - $item->product->discount_price) 
                : $item->product->price;
            $subtotal += $price * $item->quantity;
        }

        $shipping = 0; // Free Shipping
        $tax = $subtotal * 0.08; // 8% Tax calculation
        $total = $subtotal + $shipping + $tax;

        return [
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total
        ];
    }

    // Show the cart page
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('frondend.cart', compact('cartItems'));
    }

    // Cart dropdown HTML partial (AJAX)
    public function dropdown()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        return view('frondend.partials.cart-dropdown', compact('cartItems'));
    }

    // Add to cart (AJAX / JSON)
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
        ]);

        $productId = $request->product_id;
        $quantity = $request->input('quantity', 1);
        $size = $request->input('size');
        $color = $request->input('color');

        $cartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->where('size', $size)
            ->where('color', $color)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $productId,
                'quantity' => $quantity,
                'size' => $size,
                'color' => $color,
            ]);
        }

        $cartCount = Cart::where('user_id', auth()->id())->sum('quantity');

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'cart_count' => $cartCount
        ]);
    }

    // Update quantity (AJAX / JSON)
   
public function update(Request $request)
{
    $request->validate([
        'cart_id' => 'required|exists:carts,id',
        'quantity' => 'required|integer|min:1'
    ]);

    $cartItem = Cart::with('product')->find($request->cart_id);

    // 1. Optional: Check if the product has enough stock
    if ($cartItem->product->stock < $request->quantity) {
        return response()->json([
            'success' => false, 
            'message' => 'Only ' . $cartItem->product->stock . ' items left in stock.'
        ], 400);
    }

    // 2. Update quantity in database
    $cartItem->quantity = $request->quantity;
    $cartItem->save();

    return response()->json([
        'success' => true,
        'message' => 'Cart updated successfully'
    ]);
}

    // Delete item (AJAX / JSON)
    public function destroy($id)
    {
        $cartItem = Cart::where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if (!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found.'
            ], 404);
        }

        $cartItem->delete();

        $cartCount = Cart::where('user_id', auth()->id())->sum('quantity');

        return response()->json([
            'success' => true,
            'message' => 'Item removed from cart.',
            'cart_count' => $cartCount
        ]);
    }
}
