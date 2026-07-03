<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalOrder = Order::count();



        return view('Backend.AdminDashboard', compact('totalUsers', 'totalProducts', 'totalOrder'));
    }
}
