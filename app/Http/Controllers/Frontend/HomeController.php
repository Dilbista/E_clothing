<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    /**
     * Helper to map sidebar filter slugs to singular/plural terms 
     * for intelligent fallback text matching.
     */
    private function getKeywordsForCategorySlug($slug)
    {
        $map = [
            'dresses'            => ['dress', 'dresses', 'gown', 'frock'],
            'tops-blouses'       => ['top', 'blouse', 'shirt', 't-shirt', 'polo'],
            'knitwear-sweaters'  => ['knitwear', 'sweater', 'cardigan', 'pullover', 'hoodie'],
            'pants-skirts'       => ['pant', 'skirt', 'jean', 'trouser', 'legging', 'shorts'],
            'handbags-scarves'   => ['bag', 'scarf', 'handbag', 'wallet', 'purse'],
            'bags-wallets'       => ['bag', 'wallet', 'purse', 'handbag', 'backpack'],
            'watches'            => ['watch', 'clock', 'timepiece'],
            'sunglasses'         => ['glass', 'eyewear', 'sunglass', 'shades', 'spectacles'],
            'jewelry-chains'     => ['jewelry', 'chain', 'ring', 'necklace', 'bracelet', 'earring'],
            'hats-belts-scarves' => ['hat', 'belt', 'scarf', 'cap', 'beanie'],
            'sneakers'           => ['sneaker', 'shoe', 'trainer', 'kick'],
            'boots'              => ['boot'],
            'heels-wedges'       => ['heel', 'wedge', 'pump'],
            'loafers-flats'      => ['loafer', 'flat', 'slip-on'],
            'sandals-slides'     => ['sandal', 'slide', 'slipper', 'flip-flop'],
            'womens-apparel'     => ['women', 'woman', 'lady', 'ladies', 'girl'],
            'mens-apparel'       => ['men', 'man', 'gentleman', 'guy', 'boy'],
            'footwear'           => ['shoe', 'boot', 'sneaker', 'sandal', 'heel', 'loafer'],
            'accessories'        => ['bag', 'watch', 'glass', 'jewelry', 'belt', 'wallet']
        ];

        return $map[$slug] ?? [$slug];
    }

    /**
     * Reusable private helper method to apply all search, filter, and sort logic.
     */
    private function applyProductFilters($query, Request $request)
    {
        // 1. Text Search (Keyword matching)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('brand', function ($b) use ($search) {
                      $b->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // 2. Category filtering
        // The women page UI sends: categories[] values like: dresses, tops-blouses, ...
        // Make filtering deterministic using those slugs + a keyword fallback.
        if ($request->filled('categories')) {
            $slugs = (array) $request->input('categories', []);

            $query->where(function ($q) use ($slugs) {
                foreach ($slugs as $slug) {
                    $slug = (string) $slug;
                    if ($slug === '') {
                        continue;
                    }

                    // Match the Category relationship by slug-ish name first
                    $q->orWhereHas('category', function ($catQuery) use ($slug) {
                        $catQuery->where('category_name', 'like', '%' . str_replace('-', ' ', $slug) . '%');

                        // Also try splitting tokens (e.g. tops-blouses -> tops / blouses)
                        $terms = explode('-', $slug);
                        foreach ($terms as $term) {
                            $term = trim($term);
                            if (strlen($term) > 2) {
                                $catQuery->orWhere('category_name', 'like', '%' . $term . '%');
                            }
                        }
                    });

                    // Fallback: match product name/description with mapped keywords
                    $keywords = $this->getKeywordsForCategorySlug($slug);
                    foreach ($keywords as $keyword) {
                        $q->orWhere('name', 'like', '%' . $keyword . '%')
                          ->orWhere('description', 'like', '%' . $keyword . '%');
                    }
                }
            });
        }

        // 2b. Sorting
        // (kept below; no change)


        // 3. Selling Price Range Filtering
        if ($request->filled('max_price')) {
            $query->where(function ($q) use ($request) {
                $q->whereRaw('(price - COALESCE(discount_price, 0)) <= ?', [$request->max_price]);
            });
        }

        // 4. Sizes Filter (Auto-detects database column using global namespace)
        if ($request->filled('sizes')) {
            $tableName = (new Product)->getTable();
            
            if (Schema::hasColumn($tableName, 'sizes')) {
                $query->where(function ($q) use ($request) {
                    foreach ($request->sizes as $size) {
                        $q->orWhere('sizes', 'like', "%{$size}%");
                    }
                });
            } elseif (Schema::hasColumn($tableName, 'size')) {
                $query->where(function ($q) use ($request) {
                    foreach ($request->sizes as $size) {
                        $q->orWhere('size', 'like', "%{$size}%");
                    }
                });
            } else {
                $query->where(function ($q) use ($request) {
                    foreach ($request->sizes as $size) {
                        $q->orWhere('name', 'like', "%{$size}%")
                          ->orWhere('description', 'like', "%{$size}%");
                    }
                });
            }
        }

        // 5. Availability Status (Stock check)
        if ($request->has('in_stock')) {
            $query->where('stock', '>', 0);
        }

        // 6. Sorting
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'price_low_high':
                    $query->orderByRaw('(price - COALESCE(discount_price, 0)) ASC');
                    break;
                case 'price_high_low':
                    $query->orderByRaw('(price - COALESCE(discount_price, 0)) DESC');
                    break;
                case 'newest':
                    $query->latest();
                    break;
                case 'popularity':
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        // 7. Discount Levels Filter (Specifically for Sale & Clearance pages)
        if ($request->filled('discount_levels')) {
            $query->where(function ($q) use ($request) {
                foreach ($request->discount_levels as $level) {
                    if ($level === '50_plus') {
                        $q->orWhere(function ($sub) {
                            $sub->where('price', '>', 0)
                                ->whereRaw('(discount_price / price) * 100 >= 50');
                        });
                    } elseif ($level === '30_50') {
                        $q->orWhere(function ($sub) {
                            $sub->where('price', '>', 0)
                                ->whereRaw('(discount_price / price) * 100 >= 30 AND (discount_price / price) * 100 < 50');
                        });
                    } elseif ($level === 'under_30') {
                        $q->orWhere(function ($sub) {
                            $sub->where('price', '>', 0)
                                ->where('discount_price', '>', 0)
                                ->whereRaw('(discount_price / price) * 100 < 30');
                        });
                    }
                }
            });
        }

        return $query;
    }

    private function getWishlistIds()
    {
        return auth()->check()
            ? Wishlist::where('user_id', auth()->id())
            ->pluck('product_id')
            ->toArray()
            : [];
    }

    public function index()
    {
        $products = Product::with(['category', 'brand'])
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::latest()->get();
        $newArrivals = Product::with(['brand'])
            ->latest()
            ->take(4)
            ->get();

        $wishlistIds = $this->getWishlistIds();

        return view('frondend.home', compact('products', 'categories', 'newArrivals', 'wishlistIds'));
    }

    public function women(Request $request)
    {
        $womenCategory = Category::where('category_name', 'Women')->first();

        if (!$womenCategory) {
            $products = Product::whereRaw('1 = 0')->paginate(9);
        } else {
            $query = Product::with(['category', 'brand'])
                ->where('category_id', $womenCategory->category_id);

            $query = $this->applyProductFilters($query, $request);
            $products = $query->paginate(9);
        }

        $wishlistIds = $this->getWishlistIds();
        $cartItems = session()->get('cart', collect()); 

        return view('frondend.women', compact('products', 'wishlistIds', 'cartItems'));
    }

    public function men(Request $request)
    {
        $query = Product::with(['category', 'brand'])
            ->where('category_id', 1);

        $query = $this->applyProductFilters($query, $request);
        $products = $query->paginate(9);

        $wishlistIds = $this->getWishlistIds();
        $cartItems = session()->get('cart', collect());

        return view('frondend.men', compact('products', 'wishlistIds', 'cartItems'));
    }

    public function accessories(Request $request)
    {
        $query = Product::with(['category', 'brand'])
            ->where('category_id', 4);

        $query = $this->applyProductFilters($query, $request);
        $products = $query->paginate(9);

        $wishlistIds = $this->getWishlistIds();
        $cartItems = session()->get('cart', collect());

        return view('frondend.accessories', compact('products', 'wishlistIds', 'cartItems'));
    }

    public function footwear(Request $request)
    {
        $query = Product::with(['category', 'brand'])
            ->where('category_id', 3);

        $query = $this->applyProductFilters($query, $request);
        $products = $query->paginate(9);

        $wishlistIds = $this->getWishlistIds();
        $cartItems = session()->get('cart', collect());

        return view('frondend.footwear', compact('products', 'wishlistIds', 'cartItems'));
    }

    public function newArrival(Request $request)
    {
        $query = Product::with(['category', 'brand']);

        $query = $this->applyProductFilters($query, $request);
        $products = $query->paginate(9);

        $wishlistIds = $this->getWishlistIds();
        $cartItems = session()->get('cart', collect());

        return view('frondend.new-arrivals', compact('products', 'wishlistIds', 'cartItems'));
    }

    public function sale(Request $request)
    {
        $query = Product::with(['category', 'brand'])
            ->where('discount_price', '>', 0)
            ->where('price', '>', 0);

        $query = $this->applyProductFilters($query, $request);
        $products = $query->paginate(9);

        $products->getCollection()->transform(function ($product) {
            $product->discount_percentage = round(
                ($product->discount_price / $product->price) * 100
            );
            $product->final_price = $product->price - $product->discount_price;
            return $product;
        });

        $wishlistIds = $this->getWishlistIds();
        $cartItems = session()->get('cart', collect());

        return view('frondend.sale', compact('products', 'wishlistIds', 'cartItems'));
    }

    public function viewDetails($id)
    {
        $product = Product::with(['brand', 'category'])->findOrFail($id);

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(4)
            ->get();

        $wishlistIds = $this->getWishlistIds();

        return view('frondend.viewDetailes', compact('product', 'relatedProducts', 'wishlistIds'));
    }
}