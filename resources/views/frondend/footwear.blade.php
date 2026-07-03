<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ShopEase - Premium Footwear Collection</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#4f46e5",
                        secondary: "#f97316"
                    },
                    borderRadius: {
                        none: "0px",
                        sm: "4px",
                        DEFAULT: "8px",
                        md: "12px",
                        lg: "16px",
                        xl: "20px",
                        "2xl": "24px",
                        "3xl": "32px",
                        full: "9999px",
                        button: "8px",
                    },
                },
            },
        };
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" />
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .hero-section {
            background-image: linear-gradient(to right, rgba(24, 24, 27, 0.85) 30%, rgba(24, 24, 27, 0.4) 100%),
                url('https://images.unsplash.com/photo-1549298916-b41d501d3772?auto=format&fit=crop&w=1920&h=800&q=80');
            background-size: cover;
            background-position: center;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .custom-checkbox {
            position: relative;
            cursor: pointer;
        }

        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 18px;
            width: 18px;
            background-color: #fff;
            border: 1px solid #d1d5db;
            border-radius: 4px;
        }

        .custom-checkbox:hover input~.checkmark {
            background-color: #f3f4f6;
        }

        .custom-checkbox input:checked~.checkmark {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom-checkbox input:checked~.checkmark:after {
            display: block;
        }

        .custom-checkbox .checkmark:after {
            left: 6px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #e5e7eb;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #4f46e5;
        }

        input:checked+.slider:before {
            transform: translateX(20px);
        }

        .custom-range {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 6px;
            border-radius: 5px;
            background: #e5e7eb;
            outline: none;
        }

        .custom-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #4f46e5;
            cursor: pointer;
        }

        .custom-range::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #4f46e5;
            cursor: pointer;
            border: none;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 50;
            border-radius: 8px;
        }

        /* ========== ANIMATIONS & EFFECTS ========== */
        /* Heart red highlight on click */
        @keyframes heartHighlight {
            0% {
                transform: scale(1);
                color: currentColor;
                text-shadow: 0 0 0px rgba(239, 68, 68, 0);
            }

            30% {
                transform: scale(1.4);
                color: #ef4444;
                text-shadow: 0 0 12px rgba(239, 68, 68, 0.7);
            }

            100% {
                transform: scale(1);
                color: currentColor;
                text-shadow: 0 0 0px rgba(239, 68, 68, 0);
            }
        }

        .animate-heart-highlight {
            animation: heartHighlight 0.45s ease-out;
        }

        /* Scroll reveal keyframes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .reveal {
            opacity: 0;
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .reveal.visible {
            opacity: 1;
        }

        .reveal-fade-up {
            transform: translateY(30px);
        }

        .reveal-fade-up.visible {
            transform: translateY(0);
        }

        .reveal-fade-left {
            transform: translateX(-30px);
        }

        .reveal-fade-left.visible {
            transform: translateX(0);
        }

        .reveal-fade-right {
            transform: translateX(30px);
        }

        .reveal-fade-right.visible {
            transform: translateX(0);
        }

        .reveal-scale {
            transform: scale(0.9);
        }

        .reveal-scale.visible {
            transform: scale(1);
        }

        /* Ripple effect */
        .btn-ripple {
            position: relative;
            overflow: hidden;
        }

        .ripple-effect {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        }

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        /* Product card hover lift */
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-white">

    <!-- Header -->
    @include('frondend.layouts.header')

    <!-- Category Hero -->
    <section class="hero-section relative h-[350px] flex items-center">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-lg text-white">
                <div class="flex items-center space-x-2 text-sm text-gray-200 mb-4 font-medium">
                    <a href="{{ url('/') }}" class="hover:underline">Home</a>
                    <span>/</span>
                    <a href="#" class="hover:underline">Shop</a>
                    <span>/</span>
                    <span class="text-white font-semibold">Footwear</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Footwear Collection</h1>
                <p class="text-lg text-gray-200 mb-8 font-medium">
                    Step into style. Discover premium-crafted leather boots, contemporary dress shoes, everyday sneakers, and lightweight summer sandals.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Shop Layout -->
    <section id="shop-grid" class="py-16">
        <div class="container mx-auto px-4">
            
            <form id="filterForm" method="GET" action="{{ url()->current() }}">
                
                <!-- Mobile Filter & Sort Bar -->
                <div class="flex flex-wrap items-center justify-between gap-4 mb-8 pb-4 border-b border-gray-100 md:hidden">
                    <button type="button" id="filterToggleBtn"
                        class="flex items-center space-x-2 py-2 px-4 border border-gray-200 rounded-button text-gray-700 text-sm font-medium">
                        <i class="ri-filter-line"></i>
                        <span>Filters</span>
                    </button>
                    <div class="flex items-center space-x-2">
                        <label for="mobile-sort" class="text-sm text-gray-500">Sort By:</label>
                        <select id="mobile-sort" name="sort"
                            class="border-none py-2 bg-transparent text-sm font-medium text-gray-800 focus:outline-none">
                            <option value="popularity" {{ request('sort') == 'popularity' ? 'selected' : '' }}>Default</option>
                            <option value="price_low_high" {{ request('sort') == 'price_low_high' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_high_low" {{ request('sort') == 'price_high_low' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest Arrivals</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Left Sidebar Filters -->
                    <aside id="sidebarFilter" class="hidden md:block w-full md:w-64 flex-shrink-0 space-y-8 bg-white z-20">
                        
                        <!-- Search Input -->
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-4">Search</h3>
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..."
                                    class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-button text-sm focus:outline-none focus:ring-1 focus:ring-primary" />
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-search-line text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Categories -->
                        <!-- <div>
                            <h3 class="font-semibold text-gray-900 mb-4">Categories</h3>
                            <div class="space-y-3">
                                <label class="custom-checkbox block pl-7 text-sm text-gray-700">
                                    <input type="checkbox" name="categories[]" value="sneakers" {{ in_array('sneakers', request('categories', [])) ? 'checked' : '' }} />
                                    <span class="checkmark"></span>
                                    Sneakers
                                </label>
                                <label class="custom-checkbox block pl-7 text-sm text-gray-700">
                                    <input type="checkbox" name="categories[]" value="boots" {{ in_array('boots', request('categories', [])) ? 'checked' : '' }} />
                                    <span class="checkmark"></span>
                                    Boots
                                </label>
                                <label class="custom-checkbox block pl-7 text-sm text-gray-700">
                                    <input type="checkbox" name="categories[]" value="heels-wedges" {{ in_array('heels-wedges', request('categories', [])) ? 'checked' : '' }} />
                                    <span class="checkmark"></span>
                                    Heels & Wedges
                                </label>
                                <label class="custom-checkbox block pl-7 text-sm text-gray-700">
                                    <input type="checkbox" name="categories[]" value="loafers-flats" {{ in_array('loafers-flats', request('categories', [])) ? 'checked' : '' }} />
                                    <span class="checkmark"></span>
                                    Loafers & Flats
                                </label>
                                <label class="custom-checkbox block pl-7 text-sm text-gray-700">
                                    <input type="checkbox" name="categories[]" value="sandals-slides" {{ in_array('sandals-slides', request('categories', [])) ? 'checked' : '' }} />
                                    <span class="checkmark"></span>
                                    Sandals & Slides
                                </label>
                            </div>
                        </div> -->

                        <!-- Price Filter -->
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-4">Price Range</h3>
                            <div class="space-y-4">
                                <input type="range" name="max_price" min="30" max="300000" value="{{ request('max_price', 300000) }}" class="custom-range" id="priceRange" />
                                <div class="flex items-center justify-between text-sm text-gray-600">
                                    <span>Min: Rs.30</span>
                                    <span class="font-semibold text-primary" id="priceVal">Max: Rs.{{ request('max_price', 300000) }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Sizes -->
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-4">EU Sizes</h3>
                            <div class="grid grid-cols-4 gap-2">
                                @foreach(['37', '38', '39', '40', '41', '42', '43', '44'] as $size)
                                <label class="cursor-pointer text-center">
                                    <input type="checkbox" name="sizes[]" value="{{ $size }}" class="sr-only peer" {{ in_array($size, request('sizes', [])) ? 'checked' : '' }}>
                                    <div class="py-2 border border-gray-200 text-sm rounded font-medium transition hover:border-primary hover:text-primary peer-checked:border-primary peer-checked:text-primary peer-checked:bg-primary/5">
                                        {{ $size }}
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- In Stock Switch -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <span class="text-sm font-medium text-gray-700">In Stock Only</span>
                            <label class="switch">
                                <input type="checkbox" name="in_stock" value="1" {{ request('in_stock') ? 'checked' : '' }} />
                                <span class="slider"></span>
                            </label>
                        </div>
                    </aside>

                    <!-- Right Side: Products Grid -->
                    <div class="flex-1">
                        <!-- Desktop Filter & Sort Header -->
                        <div class="hidden md:flex justify-between items-center mb-8">
                            <p class="text-gray-500 text-sm">
                                Showing <span class="font-medium text-gray-900">{{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }}</span> of
                                <span class="font-medium text-gray-900">{{ $products->total() }}</span> products
                            </p>
                            <div class="flex items-center space-x-4">
                                <span class="text-sm text-gray-500">Sort By:</span>
                                <select name="sort" id="desktop-sort"
                                    class="border border-gray-200 rounded px-3 py-1.5 text-sm font-medium text-gray-700 focus:outline-none focus:ring-1 focus:ring-primary">
                                    <option value="popularity" {{ request('sort') == 'popularity' ? 'selected' : '' }}>Popularity</option>
                                    <option value="price_low_high" {{ request('sort') == 'price_low_high' ? 'selected' : '' }}>Price: Low to High</option>
                                    <option value="price_high_low" {{ request('sort') == 'price_high_low' ? 'selected' : '' }}>Price: High to Low</option>
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>New Arrivals</option>
                                </select>
                            </div>
                        </div>

                        <!-- Footwear Products Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                            @forelse($products as $product)
                            <div class="group">
                                <div class="relative overflow-hidden rounded-lg mb-4">
                                    <div class="absolute top-3 left-3 z-10">
                                        @if($product->stock <= 0)
                                            <span class="bg-red-800 text-white text-xs px-2 py-1 rounded">Out of Stock</span>
                                            @elseif($product->discount_price)
                                            <span class="bg-green-500 text-white text-xs px-2 py-1 rounded">Sale</span>
                                            @elseif($product->created_at->gt(now()->subDays(7)))
                                            <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded">New</span>
                                            @endif
                                    </div>
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                        class="w-full h-80 object-cover object-top">
                                    <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                        <a href="{{ route('frontend.viewDetails', ['id' => $product->getKey()]) }}"
                                            data-auth-action="view"
                                            class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                        <!-- Dynamic Wishlist Button -->
                                        <button type="button"
                                            class="add-to-wishlist-btn bg-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 transition-all duration-200
        {{ in_array($product->id, $wishlistIds ?? []) ? 'text-rose-500' : 'text-gray-900 hover:text-rose-500' }}"
                                            data-product-id="{{ $product->id }}">
                                            <i class="{{ in_array($product->id, $wishlistIds ?? []) ? 'ri-heart-fill' : 'ri-heart-line' }}"></i>
                                        </button>
                                        @php
                                        $isInCart = $cartItems->contains(fn($item) => (int) $item->product_id === (int) $product->id);
                                        @endphp
                                        <button type="button"
                                            onclick="addToCartGlobal({{ $product->id }})"
                                            data-auth-action="cart"
                                            class="w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 transition {{ $isInCart ? 'bg-primary text-white' : 'bg-white text-gray-900 hover:bg-gray-100' }}">
                                            <i class="ri-shopping-bag-line"></i>
                                        </button>
                                    </div>
                                </div>

                                <div>
                                    <h3 class="font-medium text-gray-900 mb-1">{{ $product->name }}</h3>
                                    <p class="text-sm text-gray-500">{{ $product->brand->name ?? '' }}</p>
                                    @if($product->discount_price)
                                    <div class="flex items-center mt-2">
                                        <span class="text-lg font-bold text-rose-600">
                                            Rs. {{ number_format($product->price - $product->discount_price, 2) }}
                                        </span>
                                        <span class="ml-2 text-sm text-gray-400 line-through">
                                            Rs. {{ number_format($product->price, 2) }}
                                        </span>
                                    </div>
                                    @else
                                    <span class="font-bold">Rs. {{ number_format($product->price,2) }}</span>
                                    @endif
                                </div>
                            </div>
                            @empty
                            <div class="col-span-3 text-center py-10 text-gray-500">No footwear products found matching your search.</div>
                            @endforelse
                        </div>

                        <!-- Dynamic Laravel Pagination -->
                        <div class="mt-12 flex justify-center">
                            {{ $products->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Instagram Feed -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-4">Shop the Look on Instagram</h2>
            <p class="text-gray-600 text-center mb-12">@shopease_official</p>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://images.unsplash.com/photo-1488161628813-04466f872be2?auto=format&fit=crop&w=300&h=300&q=80"
                        alt="Instagram Post" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=300&h=300&q=80"
                        alt="Instagram Post" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://images.unsplash.com/photo-1512310604669-443f26c35f52?auto=format&fit=crop&w=300&h=300&q=80"
                        alt="Instagram Post" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=300&h=300&q=80"
                        alt="Instagram Post" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&w=300&h=300&q=80"
                        alt="Instagram Post" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?auto=format&fit=crop&w=300&h=300&q=80"
                        alt="Instagram Post" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-16 bg-gray-900 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-4">Subscribe to Our Newsletter</h2>
                <p class="text-gray-300 mb-8">Stay updated with our latest collections, exclusive offers, and style tips.</p>
                <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input type="email" placeholder="Your email address"
                        class="flex-1 px-4 py-3 rounded-button border-none text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary/20" />
                    <button type="submit"
                        class="px-6 py-3 bg-primary text-white font-medium rounded-button hover:bg-primary/90 transition-colors whitespace-nowrap">
                        Subscribe
                    </button>
                </form>
                <p class="text-sm text-gray-400 mt-4">By subscribing, you agree to our Privacy Policy and consent to receive updates from our company.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('frondend.layouts.footer')

    <!-- Scripts -->

    <!-- Wishlist Handler with Red Heart Highlight -->
    <script>
        document.querySelectorAll('.add-to-wishlist-btn').forEach(button => {
            button.addEventListener('click', function() {
                const btn = this;
                const icon = btn.querySelector('i');

                // Red highlight animation
                icon.classList.add('animate-heart-highlight');
                icon.addEventListener('animationend', function handler() {
                    icon.classList.remove('animate-heart-highlight');
                    icon.removeEventListener('animationend', handler);
                });

                fetch("{{ route('wishlist.add') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                            "Accept": "application/json"
                        },
                        body: JSON.stringify({
                            product_id: btn.dataset.productId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        const icon = btn.querySelector("i");
                        if (data.status === "added") {
                            btn.classList.remove("text-gray-900");
                            btn.classList.add("text-rose-500");
                            icon.classList.remove("ri-heart-line");
                            icon.classList.add("ri-heart-fill");
                        } else if (data.status === "removed") {
                            btn.classList.remove("text-rose-500");
                            btn.classList.add("text-gray-900");
                            icon.classList.remove("ri-heart-fill");
                            icon.classList.add("ri-heart-line");
                        }
                    });
            });
        });

        // User dropdown toggle (if present)
        const userBtn = document.getElementById("userBtn");
        const dropdown = document.getElementById("dropdown");
        if (userBtn && dropdown) {
            userBtn.addEventListener("click", () => dropdown.classList.toggle("hidden"));
            document.addEventListener("click", (e) => {
                if (!userBtn.contains(e.target) && !dropdown.contains(e.target))
                    dropdown.classList.add("hidden");
            });
        }
    </script>

    <!-- Filter Form & Navigation Auto-Submission script -->
    <script>
        const filterForm = document.getElementById('filterForm');
        
        if (filterForm) {
            // Automatically submit when checkboxes or sorting drop-downs change
            filterForm.querySelectorAll('input[type="checkbox"], select').forEach(element => {
                element.addEventListener('change', () => {
                    filterForm.submit();
                });
            });

            // Handle slider logic
            const priceRange = document.getElementById('priceRange');
            const priceVal = document.getElementById('priceVal');
            if (priceRange) {
                priceRange.addEventListener('change', () => {
                    filterForm.submit();
                });
                priceRange.addEventListener('input', (e) => {
                    priceVal.textContent = `Max: Rs.${e.target.value}`;
                });
            }

            // Text search submission when pressing Enter
            const searchInput = filterForm.querySelector('input[name="search"]');
            if (searchInput) {
                searchInput.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        filterForm.submit();
                    }
                });
            }
        }

        // Mobile Filter Toggle Button Logic
        const filterToggleBtn = document.getElementById('filterToggleBtn');
        const sidebarFilter = document.getElementById('sidebarFilter');
        if (filterToggleBtn && sidebarFilter) {
            filterToggleBtn.addEventListener('click', (e) => {
                e.preventDefault();
                sidebarFilter.classList.toggle('hidden');
            });
        }
    </script>

    <!-- Scroll Reveal & Ripple Effects -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Scroll reveal observer
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            // Sections
            document.querySelectorAll('section').forEach(section => {
                section.classList.add('reveal', 'reveal-fade-up');
                observer.observe(section);
            });

            // Product cards
            document.querySelectorAll('.grid .group').forEach(card => {
                if (!card.classList.contains('reveal')) {
                    card.classList.add('reveal', 'reveal-fade-up', 'product-card');
                    observer.observe(card);
                }
            });

            // Instagram images
            document.querySelectorAll('.grid.grid-cols-2.md\\:grid-cols-4.lg\\:grid-cols-6.gap-4 > a').forEach(img => {
                img.classList.add('reveal', 'reveal-scale');
                observer.observe(img);
            });

            // Ripple effect on buttons (exclude wishlist)
            function createRipple(event) {
                const button = event.currentTarget;
                const circle = document.createElement('span');
                const diameter = Math.max(button.clientWidth, button.clientHeight);
                const radius = diameter / 2;
                circle.style.width = circle.style.height = `${diameter}px`;
                circle.style.left = `${event.clientX - button.getBoundingClientRect().left - radius}px`;
                circle.style.top = `${event.clientY - button.getBoundingClientRect().top - radius}px`;
                circle.classList.add('ripple-effect');
                const existing = button.querySelector('.ripple-effect');
                if (existing) existing.remove();
                button.appendChild(circle);
            }

            document.querySelectorAll('button:not(.add-to-wishlist-btn)').forEach(btn => {
                btn.classList.add('btn-ripple');
                btn.addEventListener('click', createRipple);
            });

            document.querySelectorAll('a.inline-block').forEach(link => {
                if (link.matches('.rounded-button, [class*="py-3"]')) {
                    link.classList.add('btn-ripple');
                    link.addEventListener('click', createRipple);
                }
            });
        });
    </script>
</body>

</html>