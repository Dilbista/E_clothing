<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('frondend.*', function ($view) {
            if (auth()->check()) {
                $cartItems = \App\Models\Cart::where('user_id', auth()->id())->with('product')->get();
                $cartCount = $cartItems->sum('quantity');
                $wishlistIds = \App\Models\Wishlist::where('user_id', auth()->id())->pluck('product_id')->toArray();
                $view->with(compact('cartItems', 'cartCount', 'wishlistIds'));
            } else {
                $view->with([
                    'cartItems' => collect(),
                    'cartCount' => 0,
                    'wishlistIds' => [],
                ]);
            }
        });
    }
}
