<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // dd('ddd');
        // Fetches orders and filters by status/search if needed
        $orders = Order::latest()->paginate(15);
        return view('backend.ordersmanagements',compact('orders'));
    }


    public function updateStatus(Request $request)
    {
        $order = Order::where('order_number', $request->order_id)->firstOrFail();
        $order->order_status = $request->new_status;
        $order->save();

        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    }

    public function show($id)
    {
        // Fetch order with its items and product info
        $order = Order::with('items.product')->where('order_number', $id)->firstOrFail();
        return response()->json($order);
    }
}
