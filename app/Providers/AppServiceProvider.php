<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart; // 1. Ensure this is here!

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
       View::composer('*', function ($view) {
        // Fetch variables needed by your layouts (Header, Footer, Sidebar)
        $categories = Category::all();
        
        // Fetch New Arrivals (typically the latest 8 products)
        $newArrivals = Product::where('status', 'active')->latest()->take(8)->get();

        if (Auth::check()) {
            $userId = Auth::id();
            $wishlistIds = Wishlist::where('user_id', $userId)->pluck('product_id')->toArray();
            $cartCount = Cart::where('user_id', $userId)->sum('quantity');
        } else {
            $wishlistIds = [];
            $cartCount = 0;
        }

        // Share with ALL views
        $view->with([
            'categories'  => $categories,
            'newArrivals' => $newArrivals, // <--- Add this
            'wishlistIds' => $wishlistIds,
            'cartCount'   => $cartCount,
            'products'    => Product::take(8)->get(), // If you use $products elsewhere
        ]);
    });

    }
}