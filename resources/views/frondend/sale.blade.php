<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ShopEase - Special Sale & Clearance Drops</title>
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

    /* Standardized Hero Height and Optimized Overlay */
    .hero-section {
        background-image: linear-gradient(to right, rgba(24, 24, 27, 0.85) 30%, rgba(24, 24, 27, 0.4) 100%),
            url('https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=1920&h=800&q=80');
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
    </style>
</head>

<body class="bg-white">
    <!-- Header -->
    @include('frondend.layouts.header')

    <!-- Standardized Category Hero Height (350px) with Centered Alignment -->
    <section class="hero-section relative h-[350px] flex items-center">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-lg text-white">
                <!-- Breadcrumbs -->
                <div class="flex items-center space-x-2 text-sm text-gray-200 mb-4 font-semibold">
                    <a href="{{ url('/') }}" class="hover:underline">Home</a>
                    <span>/</span>
                    <span class="text-white font-semibold">Sale & Clearance</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    The Special Sale
                </h1>
                <p class="text-lg text-gray-200 mb-8 font-medium">
                    Up to 50% off on premium seasonal drops. Explore our limited-time clearance items, apparel, and
                    active footwear before they sell out.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Shop Layout -->
    <section id="shop-grid" class="py-16">
        <div class="container mx-auto px-4">
            <!-- Mobile Filter & Sort Bar -->
            <div class="flex flex-wrap items-center justify-between gap-4 mb-8 pb-4 border-b border-gray-100 md:hidden">
                <button id="filterToggleBtn"
                    class="flex items-center space-x-2 py-2 px-4 border border-gray-200 rounded-button text-gray-700 text-sm font-medium">
                    <i class="ri-filter-line"></i>
                    <span>Filters</span>
                </button>
                <div class="flex items-center space-x-2">
                    <label for="mobile-sort" class="text-sm text-gray-500">Sort By:</label>
                    <select id="mobile-sort"
                        class="border-none py-2 bg-transparent text-sm font-medium text-gray-800 focus:outline-none">
                        <option>Default</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Discount Level</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col md:flex-row gap-8">
                <!-- Left Sidebar Filters -->
                <aside id="sidebarFilter" class="hidden md:block w-full md:w-64 flex-shrink-0 space-y-8">
                    <!-- Discount Thresholds -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-4">Discounts</h3>
                        <div class="space-y-3">
                            <label class="custom-checkbox block pl-7 text-sm text-gray-700">
                                <input type="checkbox" checked />
                                <span class="checkmark"></span>
                                50% Off & More
                            </label>
                            <label class="custom-checkbox block pl-7 text-sm text-gray-700">
                                <input type="checkbox" checked />
                                <span class="checkmark"></span>
                                30% - 50% Off
                            </label>
                            <label class="custom-checkbox block pl-7 text-sm text-gray-700">
                                <input type="checkbox" />
                                <span class="checkmark"></span>
                                Up to 30% Off
                            </label>
                        </div>
                    </div>

                    <!-- Categories Drop -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-4">Clearance Departments</h3>
                        <div class="space-y-3">
                            <label class="custom-checkbox block pl-7 text-sm text-gray-700">
                                <input type="checkbox" checked />
                                <span class="checkmark"></span>
                                Women's Apparel
                            </label>
                            <label class="custom-checkbox block pl-7 text-sm text-gray-700">
                                <input type="checkbox" checked />
                                <span class="checkmark"></span>
                                Men's Apparel
                            </label>
                            <label class="custom-checkbox block pl-7 text-sm text-gray-700">
                                <input type="checkbox" />
                                <span class="checkmark"></span>
                                Footwear
                            </label>
                            <label class="custom-checkbox block pl-7 text-sm text-gray-700">
                                <input type="checkbox" />
                                <span class="checkmark"></span>
                                Accessories
                            </label>
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-4">Budget Range</h3>
                        <div class="space-y-4">
                            <input type="range" min="10" max="400" value="150" class="custom-range" id="priceRange" />
                            <div class="flex items-center justify-between text-sm text-gray-600">
                                <span>Min: Rs.10</span>
                                <span class="font-semibold text-primary" id="priceVal">Max: Rs.150</span>
                            </div>
                        </div>
                    </div>

                    <!-- In Stock Switch -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <span class="text-sm font-medium text-gray-700">In Stock Only</span>
                        <label class="switch">
                            <input type="checkbox" checked />
                            <span class="slider"></span>
                        </label>
                    </div>
                </aside>

                <!-- Right Side: Products Grid -->
                <div class="flex-1">
                    <!-- Desktop Filter & Sort Header -->
                    <div class="hidden md:flex justify-between items-center mb-8">
                        <p class="text-gray-500 text-sm">Showing <span class="font-medium text-gray-900">1 - 6</span> of
                            <span class="font-medium text-gray-900">24</span> clearance products
                        </p>
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-500">Sort By:</span>
                            <select
                                class="border border-gray-200 rounded px-3 py-1.5 text-sm font-medium text-gray-700 focus:outline-none focus:ring-1 focus:ring-primary">
                                <option>Highest Discount</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                                <option>Popularity</option>
                            </select>
                        </div>
                    </div>

                    <!-- Sale Products Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Product 1: Floral Summer Dress (Women's) -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-lg mb-4">
                                <span
                                    class="absolute top-3 left-3 bg-rose-500 text-white text-xs px-2 py-1 rounded font-semibold">-25%
                                    Off</span>
                                <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?auto=format&fit=crop&w=500&h=600&q=80"
                                    alt="Floral Summer Dress" class="w-full h-80 object-cover object-top" />
                                <div
                                    class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <button
                                        class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                    <button
                                        class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                                        <i class="ri-heart-line"></i>
                                    </button>
                                    <button
                                        class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                                        <i class="ri-shopping-bag-line"></i>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <span class="text-xs font-semibold text-primary uppercase tracking-wider">Women</span>
                                <h3 class="font-medium text-gray-900 mb-1 mt-0.5">Floral Summer Dress</h3>
                                <div class="flex items-center mb-1">
                                    <div class="flex text-amber-400 text-sm">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-half-fill"></i>
                                    </div>
                                    <span class="text-xs text-gray-500 ml-1">(54)</span>
                                </div>
                                <div class="flex items-center">
                                    <p class="text-rose-600 font-semibold">Rs.59.99</p>
                                    <p class="text-gray-400 line-through text-sm ml-2">Rs.79.99</p>
                                </div>
                            </div>
                        </div>

                        <!-- Product 2: Suede Chelsea Boots (Footwear) -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-lg mb-4">
                                <span
                                    class="absolute top-3 left-3 bg-rose-500 text-white text-xs px-2 py-1 rounded font-semibold">-25%
                                    Off</span>
                                <img src="https://images.unsplash.com/photo-1638247025967-b4e38f68931a?auto=format&fit=crop&w=500&h=600&q=80"
                                    alt="Suede Chelsea Boots" class="w-full h-80 object-cover object-center" />
                                <div
                                    class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <button
                                        class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                    <button
                                        class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                                        <i class="ri-heart-line"></i>
                                    </button>
                                    <button
                                        class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                                        <i class="ri-shopping-bag-line"></i>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <span
                                    class="text-xs font-semibold text-primary uppercase tracking-wider">Footwear</span>
                                <h3 class="font-medium text-gray-900 mb-1 mt-0.5">Suede Chelsea Boots</h3>
                                <div class="flex items-center mb-1">
                                    <div class="flex text-amber-400 text-sm">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <span class="text-xs text-gray-500 ml-1">(42)</span>
                                </div>
                                <div class="flex items-center">
                                    <p class="text-rose-600 font-semibold">Rs.119.99</p>
                                    <p class="text-gray-400 line-through text-sm ml-2">Rs.159.99</p>
                                </div>
                            </div>
                        </div>

                        <!-- Product 3: Premium Sunglasses (Accessories) -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-lg mb-4">
                                <span
                                    class="absolute top-3 left-3 bg-rose-500 text-white text-xs px-2 py-1 rounded font-semibold">-33%
                                    Off</span>
                                <img src="https://images.unsplash.com/photo-1511499767150-a48a237f0083?auto=format&fit=crop&w=500&h=600&q=80"
                                    alt="Sunglasses" class="w-full h-80 object-cover object-center" />
                                <div
                                    class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <button
                                        class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                    <button
                                        class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                                        <i class="ri-heart-line"></i>
                                    </button>
                                    <button
                                        class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                                        <i class="ri-shopping-bag-line"></i>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <span
                                    class="text-xs font-semibold text-primary uppercase tracking-wider">Accessories</span>
                                <h3 class="font-medium text-gray-900 mb-1 mt-0.5">Premium Retro Sunglasses</h3>
                                <div class="flex items-center mb-1">
                                    <div class="flex text-amber-400 text-sm">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                    <span class="text-xs text-gray-500 ml-1">(84)</span>
                                </div>
                                <div class="flex items-center">
                                    <p class="text-rose-600 font-semibold">Rs.59.99</p>
                                    <p class="text-gray-400 line-through text-sm ml-2">Rs.89.99</p>
                                </div>
                            </div>
                        </div>

                        <!-- Product 4: Classic Leather Watch (Accessories) -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-lg mb-4">
                                <span
                                    class="absolute top-3 left-3 bg-rose-500 text-white text-xs px-2 py-1 rounded font-semibold">-30%
                                    Off</span>
                                <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?auto=format&fit=crop&w=500&h=600&q=80"
                                    alt="Leather Watch" class="w-full h-80 object-cover object-center" />
                                <div
                                    class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <button
                                        class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                    <button
                                        class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                                        <i class="ri-heart-line"></i>
                                    </button>
                                    <button
                                        class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                                        <i class="ri-shopping-bag-line"></i>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <span
                                    class="text-xs font-semibold text-primary uppercase tracking-wider">Accessories</span>
                                <h3 class="font-medium text-gray-900 mb-1 mt-0.5">Classic Leather Watch</h3>
                                <div class="flex items-center mb-1">
                                    <div class="flex text-amber-400 text-sm">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <span class="text-xs text-gray-500 ml-1">(52)</span>
                                </div>
                                <div class="flex items-center">
                                    <p class="text-rose-600 font-semibold">Rs.89.99</p>
                                    <p class="text-gray-400 line-through text-sm ml-2">Rs.129.99</p>
                                </div>
                            </div>
                        </div>

                        <!-- Product 5: Premium Denim Jeans (Men's) -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-lg mb-4">
                                <span
                                    class="absolute top-3 left-3 bg-rose-500 text-white text-xs px-2 py-1 rounded font-semibold">-37%
                                    Off</span>
                                <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&w=500&h=600&q=80"
                                    alt="Denim Jeans" class="w-full h-80 object-cover object-top" />
                                <div
                                    class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <button
                                        class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                    <button
                                        class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                                        <i class="ri-heart-line"></i>
                                    </button>
                                    <button
                                        class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                                        <i class="ri-shopping-bag-line"></i>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <span class="text-xs font-semibold text-primary uppercase tracking-wider">Men</span>
                                <h3 class="font-medium text-gray-900 mb-1 mt-0.5">Premium Denim Jeans</h3>
                                <div class="flex items-center mb-1">
                                    <div class="flex text-amber-400 text-sm">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <span class="text-xs text-gray-500 ml-1">(128)</span>
                                </div>
                                <div class="flex items-center">
                                    <p class="text-rose-600 font-semibold">Rs.49.99</p>
                                    <p class="text-gray-400 line-through text-sm ml-2">Rs.79.99</p>
                                </div>
                            </div>
                        </div>

                        <!-- Product 6: Elegant White Blouse (Women's) -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-lg mb-4">
                                <span
                                    class="absolute top-3 left-3 bg-rose-500 text-white text-xs px-2 py-1 rounded font-semibold">-40%
                                    Off</span>
                                <img src="https://images.unsplash.com/photo-1548624149-f9b1859aa7d0?auto=format&fit=crop&w=500&h=600&q=80"
                                    alt="Elegant White Blouse" class="w-full h-80 object-cover object-top" />
                                <div
                                    class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <button
                                        class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                                        <i class="ri-eye-line"></i>
                                    </button>
                                    <button
                                        class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                                        <i class="ri-heart-line"></i>
                                    </button>
                                    <button
                                        class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                                        <i class="ri-shopping-bag-line"></i>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <span class="text-xs font-semibold text-primary uppercase tracking-wider">Women</span>
                                <h3 class="font-medium text-gray-900 mb-1 mt-0.5">Elegant White Blouse</h3>
                                <div class="flex items-center mb-1">
                                    <div class="flex text-amber-400 text-sm">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-half-fill"></i>
                                    </div>
                                    <span class="text-xs text-gray-500 ml-1">(42)</span>
                                </div>
                                <div class="flex items-center">
                                    <p class="text-rose-600 font-semibold">Rs.29.99</p>
                                    <p class="text-gray-400 line-through text-sm ml-2">Rs.49.99</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="flex justify-center items-center space-x-2 mt-12">
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-button border border-gray-200 text-gray-600 hover:bg-gray-50">
                            <i class="ri-arrow-left-s-line"></i>
                        </button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-button bg-primary text-white font-medium">1</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-button border border-gray-200 text-gray-600 hover:bg-gray-50">2</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-button border border-gray-200 text-gray-600 hover:bg-gray-50">
                            <i class="ri-arrow-right-s-line"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instagram Feed -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-4">
                Shop the Look on Instagram
            </h2>
            <p class="text-gray-600 text-center mb-12">@shopease_official</p>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://images.unsplash.com/photo-1488161628813-04466f872be2?auto=format&fit=crop&w=300&h=300&q=80"
                        alt="Instagram Post"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=300&h=300&q=80"
                        alt="Instagram Post"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://images.unsplash.com/photo-1512310604669-443f26c35f52?auto=format&fit=crop&w=300&h=300&q=80"
                        alt="Instagram Post"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=300&h=300&q=80"
                        alt="Instagram Post"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&w=300&h=300&q=80"
                        alt="Instagram Post"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?auto=format&fit=crop&w=300&h=300&q=80"
                        alt="Instagram Post"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-16 bg-gray-900 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-4">Subscribe to Our Newsletter</h2>
                <p class="text-gray-300 mb-8">
                    Stay updated with our latest collections, exclusive offers, and
                    style tips.
                </p>
                <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input type="email" placeholder="Your email address"
                        class="flex-1 px-4 py-3 rounded-button border-none text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary/20" />
                    <button type="submit"
                        class="px-6 py-3 bg-primary text-white font-medium rounded-button hover:bg-primary/90 transition-colors whitespace-nowrap">
                        Subscribe
                    </button>
                </form>
                <p class="text-sm text-gray-400 mt-4">
                    By subscribing, you agree to our Privacy Policy and consent to
                    receive updates from our company.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
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
                            <a href="{{ route('frontend.women') }}"
                                class="text-gray-600 hover:text-primary transition-colors">Women</a>
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
                            <a href="#" class="text-primary font-medium transition-colors">Sale</a>
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

    <!-- Scripts -->
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

        // Mobile Filters Toggle Panel
        const filterToggleBtn = document.getElementById("filterToggleBtn");
        const sidebarFilter = document.getElementById("sidebarFilter");

        if (filterToggleBtn && sidebarFilter) {
            filterToggleBtn.addEventListener("click", function() {
                sidebarFilter.classList.toggle("hidden");
            });
        }

        // Price range visual update
        const priceRange = document.getElementById("priceRange");
        const priceVal = document.getElementById("priceVal");
        if (priceRange && priceVal) {
            priceRange.addEventListener("input", function() {
                priceVal.textContent = "Max: Rs." + this.value;
            });
        }
    });
    </script>
    <script>
    const btn = document.getElementById("userBtn");
    const dropdown = document.getElementById("dropdown");

    btn.addEventListener("click", () => {
        dropdown.classList.toggle("hidden");
    });

    // close when clicking outside
    document.addEventListener("click", (e) => {
        if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add("hidden");
        }
    });
    </script>
</body>

</html>