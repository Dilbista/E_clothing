<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Wishlist - ShopEase</title>
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

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    </style>
</head>

<body class="bg-white">
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ url('/') }} " class="font-['Pacifico'] text-2xl text-primary">logo</a>

            <!-- Main Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('frontend.home') }}"
                    class="text-gray-900 font-medium hover:text-primary transition-colors">Home</a>
                <div class="relative group">
                    <button class="text-gray-900 font-medium hover:text-primary transition-colors flex items-center">
                        Shop
                        <div class="w-4 h-4 ml-1 flex items-center justify-center">
                            <i class="ri-arrow-down-s-line"></i>
                        </div>
                    </button>
                    <div class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded hidden group-hover:block">
                        <a href="{{ route('frontend.women') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Women</a>
                        <a href="{{ route('frontend.men') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Men</a>
                        <a href="{{ route('frontend.accessories') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Accessories</a>
                        <a href="{{ route('frontend.footwear') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Footwear</a>
                    </div>
                </div>
                <a href="#" class="text-gray-900 font-medium hover:text-primary transition-colors">New Arrivals</a>
                <a href="#" class="text-gray-900 font-medium hover:text-primary transition-colors">Sale</a>
                <a href="#" class="text-gray-900 font-medium hover:text-primary transition-colors">About</a>
            </nav>

            <!-- Utility Icons -->
            <div class="flex items-center space-x-6">
                <!-- Search -->
                <div class="relative">
                    <button id="searchToggle"
                        class="w-10 h-10 flex items-center justify-center text-gray-700 hover:text-primary transition-colors">
                        <i class="ri-search-line text-xl"></i>
                    </button>
                    <div id="searchDropdown"
                        class="hidden absolute right-0 mt-2 w-72 bg-white shadow-lg rounded-lg p-4">
                        <div class="relative">
                            <input type="text" placeholder="Search products..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary text-sm" />
                            <div
                                class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 flex items-center justify-center text-gray-400">
                                <i class="ri-search-line"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account -->
                <div class="relative">
                    <button id="userBtn"
                        class="w-10 h-10 flex items-center justify-center text-primary transition-colors">
                        <i class="ri-user-line text-xl"></i>
                    </button>

                    <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded hidden">
                        <a href="{{ url('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Sign
                            In</a>
                        <a href="{{ url('register') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Register</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">My Account</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Orders</a>
                    </div>
                </div>

                <!-- Cart -->
                <div class="relative">
                    <button id="cartToggle"
                        class="w-10 h-10 flex items-center justify-center text-gray-700 hover:text-primary transition-colors">
                        <i class="ri-shopping-bag-line text-xl"></i>
                        <span
                            class="absolute -top-1 -right-1 bg-primary text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                    </button>
                    <div id="cartDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white shadow-lg rounded-lg p-4">
                        <h3 class="font-medium text-gray-900 mb-3">Your Cart (3)</h3>
                        <div class="space-y-3 max-h-80 overflow-y-auto">
                            <div class="flex items-center space-x-3">
                                <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?q=80&w=200&auto=format&fit=crop"
                                    alt="Product" class="w-16 h-16 object-cover rounded" />
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium">Essential White T-Shirt</h4>
                                    <p class="text-xs text-gray-500">Size: M | Qty: 1</p>
                                    <p class="text-sm font-medium">Rs.24.99</p>
                                </div>
                                <button class="text-gray-400 hover:text-gray-600">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>
                            <div class="flex items-center space-x-3">
                                <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?q=80&w=200&auto=format&fit=crop"
                                    alt="Product" class="w-16 h-16 object-cover rounded" />
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium">Slim Fit Black Jeans</h4>
                                    <p class="text-xs text-gray-500">Size: 32 | Qty: 1</p>
                                    <p class="text-sm font-medium">Rs.59.99</p>
                                </div>
                                <button class="text-gray-400 hover:text-gray-600">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>
                            <div class="flex items-center space-x-3">
                                <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?q=80&w=200&auto=format&fit=crop"
                                    alt="Product" class="w-16 h-16 object-cover rounded" />
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium">Classic Leather Watch</h4>
                                    <p class="text-xs text-gray-500">Color: Brown | Qty: 1</p>
                                    <p class="text-sm font-medium">Rs.129.99</p>
                                </div>
                                <button class="text-gray-400 hover:text-gray-600">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100">
                            <div class="flex justify-between mb-3">
                                <span class="text-sm text-gray-600">Subtotal</span>
                                <span class="text-sm font-medium">Rs.214.97</span>
                            </div>
                            <div class="space-y-2">
                                <a href="#"
                                    class="block w-full py-2 px-4 bg-primary text-white text-center font-medium rounded-button hover:bg-primary/90 transition-colors whitespace-nowrap">Checkout</a>
                                <a href="{{ url('cart') }}"
                                    class="block w-full py-2 px-4 bg-gray-100 text-gray-800 text-center font-medium rounded-button hover:bg-gray-200 transition-colors whitespace-nowrap">View
                                    Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu Toggle -->
                <button id="mobileMenuToggle"
                    class="md:hidden w-10 h-10 flex items-center justify-center text-gray-700">
                    <i class="ri-menu-line text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-100">
            <div class="container mx-auto px-4 py-3 space-y-3">
                <a href="#" class="block py-2 text-gray-900 font-medium">Home</a>
                <div>
                    <button id="mobileShopToggle"
                        class="flex items-center justify-between w-full py-2 text-gray-900 font-medium">
                        Shop
                        <i class="ri-arrow-down-s-line"></i>
                    </button>
                    <div id="mobileShopMenu" class="hidden pl-4 space-y-2 mt-1">
                        <a href="#" class="block py-1 text-gray-700">Women</a>
                        <a href="#" class="block py-1 text-gray-700">Men</a>
                        <a href="#" class="block py-1 text-gray-700">Accessories</a>
                        <a href="#" class="block py-1 text-gray-700">Footwear</a>
                    </div>
                </div>
                <a href="#" class="block py-2 text-gray-900 font-medium">New Arrivals</a>
                <a href="#" class="block py-2 text-gray-900 font-medium">Sale</a>
                <a href="#" class="block py-2 text-gray-900 font-medium">About</a>
            </div>
        </div>
    </header>

    <!-- Wishlist Showcase Content Layout -->
    <main class="container mx-auto px-4 py-10 md:py-16">
        <!-- Breadcrumb & Header -->
        <div class="mb-10 flex flex-col md:flex-row md:justify-between md:items-end gap-4">
            <div>
                <nav class="flex text-xs text-gray-500 gap-2 mb-2">
                    <a href="#" class="hover:text-primary transition">Home</a>
                    <span>/</span>
                    <span class="text-gray-900 font-semibold">My Wishlist</span>
                </nav>
                <h1 class="text-3xl font-bold text-gray-900">Saved Wishlist</h1>
                <p class="text-sm text-gray-600 mt-1">Review saved products, verify live stock statuses, or transfer
                    directly to your active shopping cart.</p>
            </div>
            <!-- Dynamic Item Count Badge -->
            <p class="text-sm font-semibold text-gray-500">
                You have <span id="wishlist-count" class="text-primary font-bold">4</span> items saved
            </p>
        </div>

        <!-- Wishlist Grid System -->
        <div id="wishlist-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            <!-- Wishlist Card 1 -->
            <div
                class="group relative bg-white border border-gray-100 rounded-lg overflow-hidden p-3 shadow-sm hover:shadow transition duration-300">
                <!-- Delete Button overlay -->
                <button onclick="removeWishlistItem(this)"
                    class="absolute top-6 right-6 z-10 w-8 h-8 rounded-full bg-white text-gray-400 hover:text-rose-600 border border-gray-100 flex items-center justify-center shadow-sm transition">
                    <i class="ri-close-line text-lg"></i>
                </button>

                <div class="relative overflow-hidden rounded-lg mb-4 aspect-[4/5]">
                    <!-- Stock badge -->
                    <span
                        class="absolute top-3 left-3 bg-emerald-500 text-white text-[10px] font-bold px-2.5 py-1 rounded">In
                        Stock</span>
                    <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=400&auto=format&fit=crop"
                        alt="Elegant White Blouse"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                </div>
                <div class="px-1 space-y-2">
                    <h3 class="font-bold text-gray-900 text-sm truncate">Elegant White Blouse</h3>
                    <div class="flex items-center mb-1">
                        <div class="flex text-amber-400 text-xs">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-half-fill"></i>
                        </div>
                        <span class="text-[10px] text-gray-500 ml-1">(42)</span>
                    </div>
                    <p class="text-gray-900 font-bold text-sm">Rs.49.99</p>

                    <!-- Quick transfer to cart button -->
                    <button
                        class="w-full py-2.5 mt-2 bg-primary text-white text-xs font-semibold rounded-button hover:bg-primary/90 transition flex justify-center items-center gap-2">
                        <i class="ri-shopping-bag-line"></i> Add to Cart
                    </button>
                </div>
            </div>

            <!-- Wishlist Card 2 -->
            <div
                class="group relative bg-white border border-gray-100 rounded-lg overflow-hidden p-3 shadow-sm hover:shadow transition duration-300">
                <!-- Delete Button overlay -->
                <button onclick="removeWishlistItem(this)"
                    class="absolute top-6 right-6 z-10 w-8 h-8 rounded-full bg-white text-gray-400 hover:text-rose-600 border border-gray-100 flex items-center justify-center shadow-sm transition">
                    <i class="ri-close-line text-lg"></i>
                </button>

                <div class="relative overflow-hidden rounded-lg mb-4 aspect-[4/5]">
                    <!-- Stock badge -->
                    <span
                        class="absolute top-3 left-3 bg-emerald-500 text-white text-[10px] font-bold px-2.5 py-1 rounded">In
                        Stock</span>
                    <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?q=80&w=400&auto=format&fit=crop"
                        alt="Classic Leather Jacket"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                </div>
                <div class="px-1 space-y-2">
                    <h3 class="font-bold text-gray-900 text-sm truncate">Classic Leather Jacket</h3>
                    <div class="flex items-center mb-1">
                        <div class="flex text-amber-400 text-xs">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-line"></i>
                        </div>
                        <span class="text-[10px] text-gray-500 ml-1">(76)</span>
                    </div>
                    <p class="text-gray-900 font-bold text-sm">Rs.199.99</p>

                    <!-- Quick transfer to cart button -->
                    <button
                        class="w-full py-2.5 mt-2 bg-primary text-white text-xs font-semibold rounded-button hover:bg-primary/90 transition flex justify-center items-center gap-2">
                        <i class="ri-shopping-bag-line"></i> Add to Cart
                    </button>
                </div>
            </div>

            <!-- Wishlist Card 3 -->
            <div
                class="group relative bg-white border border-gray-100 rounded-lg overflow-hidden p-3 shadow-sm hover:shadow transition duration-300">
                <!-- Delete Button overlay -->
                <button onclick="removeWishlistItem(this)"
                    class="absolute top-6 right-6 z-10 w-8 h-8 rounded-full bg-white text-gray-400 hover:text-rose-600 border border-gray-100 flex items-center justify-center shadow-sm transition">
                    <i class="ri-close-line text-lg"></i>
                </button>

                <div class="relative overflow-hidden rounded-lg mb-4 aspect-[4/5]">
                    <!-- Stock badge -->
                    <span
                        class="absolute top-3 left-3 bg-emerald-500 text-white text-[10px] font-bold px-2.5 py-1 rounded">In
                        Stock</span>
                    <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?q=80&w=400&auto=format&fit=crop"
                        alt="Premium Denim Jeans"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                </div>
                <div class="px-1 space-y-2">
                    <h3 class="font-bold text-gray-900 text-sm truncate">Premium Denim Jeans</h3>
                    <div class="flex items-center mb-1">
                        <div class="flex text-amber-400 text-xs">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                        <span class="text-[10px] text-gray-500 ml-1">(128)</span>
                    </div>
                    <p class="text-gray-900 font-bold text-sm">Rs.79.99</p>

                    <!-- Quick transfer to cart button -->
                    <button
                        class="w-full py-2.5 mt-2 bg-primary text-white text-xs font-semibold rounded-button hover:bg-primary/90 transition flex justify-center items-center gap-2">
                        <i class="ri-shopping-bag-line"></i> Add to Cart
                    </button>
                </div>
            </div>

            <!-- Wishlist Card 4 -->
            <div
                class="group relative bg-white border border-gray-100 rounded-lg overflow-hidden p-3 shadow-sm hover:shadow transition duration-300">
                <!-- Delete Button overlay -->
                <button onclick="removeWishlistItem(this)"
                    class="absolute top-6 right-6 z-10 w-8 h-8 rounded-full bg-white text-gray-400 hover:text-rose-600 border border-gray-100 flex items-center justify-center shadow-sm transition">
                    <i class="ri-close-line text-lg"></i>
                </button>

                <div class="relative overflow-hidden rounded-lg mb-4 aspect-[4/5]">
                    <!-- Stock badge -->
                    <span
                        class="absolute top-3 left-3 bg-amber-500 text-white text-[10px] font-bold px-2.5 py-1 rounded">Only
                        2 Left!</span>
                    <img src="https://images.unsplash.com/photo-1577803645773-f96470509666?q=80&w=400&auto=format&fit=crop"
                        alt="Premium Sunglasses"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                </div>
                <div class="px-1 space-y-2">
                    <h3 class="font-bold text-gray-900 text-sm truncate">Premium Sunglasses</h3>
                    <div class="flex items-center mb-1">
                        <div class="flex text-amber-400 text-xs">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-line"></i>
                        </div>
                        <span class="text-[10px] text-gray-500 ml-1">(8)</span>
                    </div>
                    <p class="text-gray-900 font-bold text-sm">Rs.89.99</p>

                    <!-- Quick transfer to cart button -->
                    <button
                        class="w-full py-2.5 mt-2 bg-primary text-white text-xs font-semibold rounded-button hover:bg-primary/90 transition flex justify-center items-center gap-2">
                        <i class="ri-shopping-bag-line"></i> Add to Cart
                    </button>
                </div>
            </div>

        </div>

        <!-- Empty Wishlist Placeholder Screen (Hidden by default) -->
        <div id="empty-wishlist" class="hidden text-center py-24 max-w-sm mx-auto">
            <div class="w-16 h-16 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="ri-heart-line text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Your Wishlist is Empty</h3>
            <p class="text-sm text-gray-500 mb-8">Save items that you like to your personal wishlist so you can buy them
                later easily.</p>
            <a href="#"
                class="py-3 px-6 bg-primary text-white text-xs font-semibold rounded-button hover:bg-primary/90 transition-colors">Start
                Shopping</a>
        </div>
    </main>

    <!-- Footer (Identical Pattern to existing Pages) -->
    <footer class="bg-white border-t border-gray-100 pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
                <!-- Column 1: About -->
                <div class="lg:col-span-2">
                    <a href="#" class="font-['Pacifico'] text-2xl text-primary inline-block mb-4">logo</a>
                    <p class="text-gray-600 mb-6 max-w-md">
                        We offer premium quality clothing and accessories for men and
                        women. Our mission is to provide sustainable fashion that lasts.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                            <i class="ri-twitter-x-line"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
                            <i class="ri-pinterest-line"></i>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Shop -->
                <div>
                    <h3 class="text-gray-900 font-semibold mb-4">Shop</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Women</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Men</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Accessories</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Footwear</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">New Arrivals</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Sale</a>
                        </li>
                    </ul>
                </div>

                <!-- Column 3: Help -->
                <div>
                    <h3 class="text-gray-900 font-semibold mb-4">Help</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Customer Service</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">My Account</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Find a Store</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Shipping &
                                Returns</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">FAQs</a>
                        </li>
                    </ul>
                </div>

                <!-- Column 4: About -->
                <div>
                    <h3 class="text-gray-900 font-semibold mb-4">About</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">About Us</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Sustainability</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Careers</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Press</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-600 hover:text-primary transition-colors">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-gray-100">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-500 text-sm mb-4 md:mb-0">
                        &copy; 2025 ShopEase. All rights reserved.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="#" class="text-gray-500 text-sm hover:text-gray-700">Privacy Policy</a>
                        <a href="#" class="text-gray-500 text-sm hover:text-gray-700">Terms of Service</a>
                        <a href="#" class="text-gray-500 text-sm hover:text-gray-700">Cookies Settings</a>
                    </div>
                    <div class="flex items-center space-x-3 mt-4 md:mt-0">
                        <i class="ri-visa-fill text-2xl text-gray-600"></i>
                        <i class="ri-mastercard-fill text-2xl text-gray-600"></i>
                        <i class="ri-paypal-fill text-2xl text-gray-600"></i>
                        <i class="ri-apple-fill text-2xl text-gray-600"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts (Toggles, dropdowns, and items deletion handler) -->
    <script id="headerInteractions">
    document.addEventListener("DOMContentLoaded", function() {
        // Search Toggle
        const searchToggle = document.getElementById("searchToggle");
        const searchDropdown = document.getElementById("searchDropdown");

        if (searchToggle && searchDropdown) {
            searchToggle.addEventListener("click", function() {
                searchDropdown.classList.toggle("hidden");
            });

            document.addEventListener("click", function(event) {
                if (
                    !searchToggle.contains(event.target) &&
                    !searchDropdown.contains(event.target)
                ) {
                    searchDropdown.classList.add("hidden");
                }
            });
        }

        // Cart Toggle
        const cartToggle = document.getElementById("cartToggle");
        const cartDropdown = document.getElementById("cartDropdown");

        if (cartToggle && cartDropdown) {
            cartToggle.addEventListener("click", function() {
                cartDropdown.classList.toggle("hidden");
            });

            document.addEventListener("click", function(event) {
                if (
                    !cartToggle.contains(event.target) &&
                    !cartDropdown.contains(event.target)
                ) {
                    cartDropdown.classList.add("hidden");
                }
            });
        }

        // Mobile Menu Toggle
        const mobileMenuToggle = document.getElementById("mobileMenuToggle");
        const mobileMenu = document.getElementById("mobileMenu");

        if (mobileMenuToggle && mobileMenu) {
            mobileMenuToggle.addEventListener("click", function() {
                mobileMenu.classList.toggle("hidden");
            });
        }

        // Mobile Shop Menu Toggle
        const mobileShopToggle = document.getElementById("mobileShopToggle");
        const mobileShopMenu = document.getElementById("mobileShopMenu");

        if (mobileShopToggle && mobileShopMenu) {
            mobileShopToggle.addEventListener("click", function() {
                mobileShopMenu.classList.toggle("hidden");
            });
        }
    });

    // User Profile Dropdown Menu
    const btn = document.getElementById("userBtn");
    const dropdown = document.getElementById("dropdown");

    if (btn && dropdown) {
        btn.addEventListener("click", () => {
            dropdown.classList.toggle("hidden");
        });

        document.addEventListener("click", (e) => {
            if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add("hidden");
            }
        });
    }

    // Interactive Wishlist Deletion Logic
    function removeWishlistItem(deleteBtn) {
        const card = deleteBtn.closest('.group');
        if (card) {
            // Apply visual disappear fade transition
            card.classList.add('transition-all', 'duration-300', 'scale-90', 'opacity-0');

            setTimeout(() => {
                card.remove();

                // Read remaining cards
                const remainingCards = document.querySelectorAll('#wishlist-grid > .group');
                const countBadge = document.getElementById('wishlist-count');

                if (countBadge) {
                    countBadge.textContent = remainingCards.length;
                }

                // If no cards remain, show the empty placeholder screen
                if (remainingCards.length === 0) {
                    const grid = document.getElementById('wishlist-grid');
                    const emptyPlaceholder = document.getElementById('empty-wishlist');
                    if (grid && emptyPlaceholder) {
                        grid.classList.add('hidden');
                        emptyPlaceholder.classList.remove('hidden');
                    }
                }
            }, 300);
        }
    }
    </script>
</body>

</html>