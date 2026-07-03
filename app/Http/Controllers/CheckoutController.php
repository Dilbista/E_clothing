<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart; // Update this to match your actual Cart model
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        // Fetch cart items from database
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // Backend safe calculation
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $price = $item->product->discount_price
                ? $item->product->discount_price
                : $item->product->price;
            $subtotal += $price * $item->quantity;
        }

        $shipping = 0; // Free
        $tax = $subtotal * 0.08; // 8% Tax
        $total = $subtotal + $shipping + $tax;

        return view('frondend.checkout', compact('cartItems', 'subtotal', 'shipping', 'tax', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'payment_method' => 'required|in:cod,esewa,khalti,imepay',
        ]);

        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // Calculations validation
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $price = $item->product->discount_price
                ? $item->product->discount_price
                : $item->product->price;
            $subtotal += $price * $item->quantity;
        }

        $shipping = 0;
        $tax = $subtotal * 0.08;
        $total = $subtotal + $shipping + $tax;

        DB::beginTransaction();
        try {
            // 1. Create Order
            
            $order = Order::create([
                'user_id' => auth()->id(),
                'order_number' => 'ORD-' . strtoupper(Str::random(10)),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'payment_method' => $request->payment_method,
                'payment_status' => $request->payment_method === 'cod' ? 'pending' : 'awaiting_payment',
                'order_status' => 'pending',
                'sub_total' => $subtotal,
                'tax' => $tax,
                'shipping' => $shipping,
                'total_amount' => $total,
            ]);

            // 2. Create Order Items
            foreach ($cartItems as $item) {
                $price = $item->product->discount_price
                    ? $item->product->discount_price
                    : $item->product->price;
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'size' => $item->size,
                    'color' => $item->color,
                    'quantity' => $item->quantity,
                    'price' => $price,
                ]);
            }

            // 3. Clear the user's cart
            Cart::where('user_id', auth()->id())->delete();

            DB::commit();

            // Handle Payment Gateway Directing or simple COD flow
            if ($request->payment_method === 'cod') {
                return redirect()->route('checkout.success', $order->id)->with('success', 'Order placed successfully!');
            } else {
                // Here, you would plug in API wrappers for eSewa, Khalti, or IME Pay.
                // For demonstrating layout, we redirect to success.
                return redirect()->route('checkout.success', $order->id)->with('success', 'Order recorded.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An issue occurred. Please try again. ' . $e->getMessage());
        }
    }

    public function success($id)
    {
        $order = Order::findOrFail($id);
        return view('frondend.success', compact('order'));
    }
}
