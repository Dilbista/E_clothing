<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account - ShopEase</title>
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

<body class="bg-gray-50">
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <!-- Logo -->
            <a href="#" class="font-['Pacifico'] text-2xl text-primary">logo</a>

            <!-- Main Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="{{ url('/') }}" class="text-gray-900 font-medium hover:text-primary transition-colors">Home</a>
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
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 font-semibold text-primary">My
                            Account</a>
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

    <!-- Main Content Panel -->
    <main class="container mx-auto px-4 py-10 md:py-16">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Navigation Panel -->
            <aside class="w-full lg:w-1/4">
                <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                    <!-- Changeable User Account Avatar Card -->
                    <div class="flex items-center space-x-4 pb-6 border-b border-gray-100 mb-6">
                        <div class="relative group cursor-pointer w-14 h-14">
                            <!-- Avatar Image -->
                            <img id="avatarImage"
                                src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=200&auto=format&fit=crop"
                                alt="User Avatar" class="w-14 h-14 rounded-full object-cover border border-gray-100" />

                            <!-- Hover Overlay -->
                            <div id="changeAvatarBtn"
                                class="absolute inset-0 bg-black/50 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="ri-camera-line text-white text-base"></i>
                            </div>

                            <!-- Hidden Image File Input -->
                            <input type="file" id="avatarInput" accept="image/*" class="hidden" />
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Emily Richardson</h3>
                            <p class="text-xs text-gray-500">Member since 2024</p>
                        </div>
                    </div>

                    <!-- Left Sidebar Nav Links -->
                    <nav id="account-sidebar-nav" class="space-y-1">
                        <button onclick="switchTab('dashboard')" id="nav-dashboard"
                            class="w-full text-left flex items-center space-x-3 px-4 py-3 rounded-button font-medium text-primary bg-primary/10 transition-colors">
                            <i class="ri-dashboard-line text-lg"></i>
                            <span>Dashboard</span>
                        </button>
                        <button onclick="switchTab('orders')" id="nav-orders"
                            class="w-full text-left flex items-center space-x-3 px-4 py-3 rounded-button font-medium text-gray-600 hover:text-primary hover:bg-gray-50 transition-colors">
                            <i class="ri-shopping-bag-3-line text-lg"></i>
                            <span>Order History</span>
                        </button>
                        <button onclick="switchTab('addresses')" id="nav-addresses"
                            class="w-full text-left flex items-center space-x-3 px-4 py-3 rounded-button font-medium text-gray-600 hover:text-primary hover:bg-gray-50 transition-colors">
                            <i class="ri-map-pin-line text-lg"></i>
                            <span>My Addresses</span>
                        </button>
                        <button onclick="switchTab('profile')" id="nav-profile"
                            class="w-full text-left flex items-center space-x-3 px-4 py-3 rounded-button font-medium text-gray-600 hover:text-primary hover:bg-gray-50 transition-colors">
                            <i class="ri-user-settings-line text-lg"></i>
                            <span>Account Details</span>
                        </button>
                        <a href="#"
                            class="block flex items-center space-x-3 px-4 py-3 rounded-button font-medium text-rose-600 hover:bg-rose-50 transition-colors mt-6 pt-4 border-t border-gray-100">
                            <i class="ri-logout-box-r-line text-lg"></i>
                            <span>Sign Out</span>
                        </a>
                    </nav>
                </div>
            </aside>

            <!-- Interactive Tab Sections -->
            <section class="w-full lg:w-3/4">

                <!-- Tab: Dashboard -->
                <div id="tab-dashboard" class="tab-content block space-y-8">
                    <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Hello, Emily</h2>
                        <p class="text-gray-600 text-sm">From your account dashboard you can easily view your recent
                            orders, manage your shipping and billing addresses, and edit your password and profile
                            details.</p>
                    </div>

                    <!-- Quick stats grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <div
                            class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm flex items-center justify-between">
                            <div>
                                <span class="block text-gray-500 text-xs font-semibold uppercase tracking-wider">Active
                                    Orders</span>
                                <span class="block text-3xl font-bold text-gray-900 mt-1">1</span>
                            </div>
                            <div
                                class="w-12 h-12 bg-indigo-50 text-primary rounded-full flex items-center justify-center">
                                <i class="ri-truck-line text-xl"></i>
                            </div>
                        </div>
                        <div
                            class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm flex items-center justify-between">
                            <div>
                                <span class="block text-gray-500 text-xs font-semibold uppercase tracking-wider">Total
                                    Spent</span>
                                <span class="block text-3xl font-bold text-gray-900 mt-1">Rs.428.94</span>
                            </div>
                            <div
                                class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center">
                                <i class="ri-wallet-line text-xl"></i>
                            </div>
                        </div>
                        <div
                            class="bg-white p-6 rounded-lg border border-gray-100 shadow-sm flex items-center justify-between">
                            <div>
                                <span class="block text-gray-500 text-xs font-semibold uppercase tracking-wider">Saved
                                    Addresses</span>
                                <span class="block text-3xl font-bold text-gray-900 mt-1">2</span>
                            </div>
                            <div
                                class="w-12 h-12 bg-amber-50 text-amber-500 rounded-full flex items-center justify-center">
                                <i class="ri-map-pin-line text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Order Section inside Dashboard -->
                    <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-bold text-gray-900 text-lg">Recent Order</h3>
                            <button onclick="switchTab('orders')"
                                class="text-primary text-sm font-semibold hover:underline">View All Orders</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="border-b border-gray-100 text-xs text-gray-400 font-semibold uppercase">
                                        <th class="pb-3">Order ID</th>
                                        <th class="pb-3">Date</th>
                                        <th class="pb-3">Status</th>
                                        <th class="pb-3">Total Price</th>
                                        <th class="pb-3 text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-sm border-b border-gray-50">
                                        <td class="py-4 font-semibold text-gray-900">#SE-8942</td>
                                        <td class="py-4 text-gray-600">June 02, 2026</td>
                                        <td class="py-4">
                                            <span
                                                class="inline-block px-2.5 py-1 bg-indigo-50 text-primary text-xs font-semibold rounded-full">Shipped</span>
                                        </td>
                                        <td class="py-4 font-semibold text-gray-900">Rs.134.98</td>
                                        <td class="py-4 text-right">
                                            <a href="#"
                                                class="inline-block py-1.5 px-4 text-xs font-semibold text-primary border border-indigo-100 rounded-button hover:bg-primary hover:text-white transition">View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tab: Orders -->
                <div id="tab-orders"
                    class="tab-content hidden bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                    <h3 class="font-bold text-gray-900 text-lg mb-6">Your Complete Order History</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-100 text-xs text-gray-400 font-semibold uppercase">
                                    <th class="pb-3">Order ID</th>
                                    <th class="pb-3">Date</th>
                                    <th class="pb-3">Status</th>
                                    <th class="pb-3">Total Price</th>
                                    <th class="pb-3 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                <tr class="text-sm">
                                    <td class="py-4 font-semibold text-gray-900">#SE-8942</td>
                                    <td class="py-4 text-gray-600">June 02, 2026</td>
                                    <td class="py-4">
                                        <span
                                            class="inline-block px-2.5 py-1 bg-indigo-50 text-primary text-xs font-semibold rounded-full">Shipped</span>
                                    </td>
                                    <td class="py-4 font-semibold text-gray-900">Rs.134.98</td>
                                    <td class="py-4 text-right">
                                        <a href="#"
                                            class="inline-block py-1.5 px-4 text-xs font-semibold text-primary border border-indigo-100 rounded-button hover:bg-primary hover:text-white transition">View</a>
                                    </td>
                                </tr>
                                <tr class="text-sm">
                                    <td class="py-4 font-semibold text-gray-900">#SE-8519</td>
                                    <td class="py-4 text-gray-600">May 14, 2026</td>
                                    <td class="py-4">
                                        <span
                                            class="inline-block px-2.5 py-1 bg-emerald-50 text-emerald-600 text-xs font-semibold rounded-full">Delivered</span>
                                    </td>
                                    <td class="py-4 font-semibold text-gray-900">Rs.214.00</td>
                                    <td class="py-4 text-right">
                                        <a href="#"
                                            class="inline-block py-1.5 px-4 text-xs font-semibold text-primary border border-indigo-100 rounded-button hover:bg-primary hover:text-white transition">View</a>
                                    </td>
                                </tr>
                                <tr class="text-sm">
                                    <td class="py-4 font-semibold text-gray-900">#SE-7901</td>
                                    <td class="py-4 text-gray-600">April 02, 2026</td>
                                    <td class="py-4">
                                        <span
                                            class="inline-block px-2.5 py-1 bg-emerald-50 text-emerald-600 text-xs font-semibold rounded-full">Delivered</span>
                                    </td>
                                    <td class="py-4 font-semibold text-gray-900">Rs.79.96</td>
                                    <td class="py-4 text-right">
                                        <a href="#"
                                            class="inline-block py-1.5 px-4 text-xs font-semibold text-primary border border-indigo-100 rounded-button hover:bg-primary hover:text-white transition">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tab: Addresses -->
                <div id="tab-addresses" class="tab-content hidden space-y-6">
                    <div
                        class="flex justify-between items-center bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                        <h3 class="font-bold text-gray-900 text-lg">My Saved Addresses</h3>
                        <button
                            class="py-2 px-4 bg-primary text-white text-xs font-semibold rounded-button hover:bg-primary/90 transition-colors">Add
                            Address</button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Address Card 1 -->
                        <div class="bg-white p-6 rounded-lg border border-primary relative shadow-sm">
                            <span
                                class="absolute top-4 right-4 text-xs text-primary font-bold bg-indigo-50 px-2 py-0.5 rounded-full uppercase">Default</span>
                            <h4 class="font-bold text-gray-900 mb-3 text-base">Billing Address</h4>
                            <div class="space-y-1 text-sm text-gray-600">
                                <p class="font-semibold text-gray-800">Emily Richardson</p>
                                <p>124 Parkview Terrace</p>
                                <p>Apartment 4B</p>
                                <p>New York, NY 10011</p>
                                <p class="pt-2"><span class="font-medium text-gray-800">Phone: </span> +1 (555) 123-4567
                                </p>
                            </div>
                            <div class="mt-6 flex gap-3 border-t border-gray-50 pt-4">
                                <button
                                    class="text-sm font-semibold text-primary hover:underline flex items-center gap-1">
                                    <i class="ri-edit-line"></i> Edit
                                </button>
                                <span class="text-gray-200">|</span>
                                <button
                                    class="text-sm font-semibold text-gray-400 hover:text-rose-600 transition flex items-center gap-1">
                                    <i class="ri-delete-bin-line"></i> Remove
                                </button>
                            </div>
                        </div>

                        <!-- Address Card 2 -->
                        <div class="bg-white p-6 rounded-lg border border-gray-100 relative shadow-sm">
                            <h4 class="font-bold text-gray-900 mb-3 text-base">Shipping Address</h4>
                            <div class="space-y-1 text-sm text-gray-600">
                                <p class="font-semibold text-gray-800">Emily Richardson</p>
                                <p>124 Parkview Terrace</p>
                                <p>Apartment 4B</p>
                                <p>New York, NY 10011</p>
                                <p class="pt-2"><span class="font-medium text-gray-800">Phone: </span> +1 (555) 123-4567
                                </p>
                            </div>
                            <div class="mt-6 flex gap-3 border-t border-gray-50 pt-4">
                                <button
                                    class="text-sm font-semibold text-primary hover:underline flex items-center gap-1">
                                    <i class="ri-edit-line"></i> Edit
                                </button>
                                <span class="text-gray-200">|</span>
                                <button
                                    class="text-sm font-semibold text-gray-400 hover:text-rose-600 transition flex items-center gap-1">
                                    <i class="ri-delete-bin-line"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab: Profile Settings -->
                <div id="tab-profile" class="tab-content hidden space-y-6">
                    <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                        <h3 class="font-bold text-gray-900 text-lg mb-6">Account Information</h3>
                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                    <input type="text" value="Emily"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary text-sm" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                    <input type="text" value="Richardson"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary text-sm" />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                    <input type="email" value="emily.richardson@example.com"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary text-sm" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <input type="text" value="+1 (555) 123-4567"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary text-sm" />
                                </div>
                            </div>

                            <div class="pt-4 border-t border-gray-50 flex justify-end">
                                <button type="submit"
                                    class="py-2.5 px-6 bg-primary text-white text-sm font-semibold rounded-button hover:bg-primary/90 transition-colors">Save
                                    Personal Info</button>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                        <h3 class="font-bold text-gray-900 text-lg mb-6">Change Password</h3>
                        <form class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                <input type="password" placeholder="••••••••••••"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary text-sm" />
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                    <input type="password"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary text-sm" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New
                                        Password</label>
                                    <input type="password"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary text-sm" />
                                </div>
                            </div>
                            <div class="pt-4 border-t border-gray-50 flex justify-end">
                                <button type="submit"
                                    class="py-2.5 px-6 bg-primary text-white text-sm font-semibold rounded-button hover:bg-primary/90 transition-colors">Update
                                    Password</button>
                            </div>
                        </form>
                    </div>
                </div>

            </section>
        </div>
    </main>

    <!-- Footer (Identical Pattern to Home and About Pages) -->
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

    <!-- Scripts (Includes dropdown logic, account tab toggles, and image change handler) -->
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

        // Profile Avatar Upload Handler
        const avatarInput = document.getElementById('avatarInput');
        const changeAvatarBtn = document.getElementById('changeAvatarBtn');
        const avatarImage = document.getElementById('avatarImage');

        if (changeAvatarBtn && avatarInput && avatarImage) {
            changeAvatarBtn.addEventListener('click', function() {
                avatarInput.click();
            });

            avatarInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        avatarImage.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });

    // User Profile Dropdown
    const btn = document.getElementById("userBtn");
    const dropdown = document.getElementById("dropdown");

    btn.addEventListener("click", () => {
        dropdown.classList.toggle("hidden");
    });

    document.addEventListener("click", (e) => {
        if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add("hidden");
        }
    });

    // Account Tab Switching System
    function switchTab(tabId) {
        // Hide all tabs
        const contents = document.querySelectorAll('.tab-content');
        contents.forEach(content => {
            content.classList.add('hidden');
            content.classList.remove('block');
        });

        // Show selected tab
        const activeContent = document.getElementById('tab-' + tabId);
        if (activeContent) {
            activeContent.classList.remove('hidden');
            activeContent.classList.add('block');
        }

        // Remove active styles from navigation buttons
        const navButtons = document.querySelectorAll('#account-sidebar-nav button');
        navButtons.forEach(btn => {
            btn.classList.remove('text-primary', 'bg-primary/10');
            btn.classList.add('text-gray-600', 'hover:text-primary', 'hover:bg-gray-50');
        });

        // Add active style to selected navigation button
        const activeButton = document.getElementById('nav-' + tabId);
        if (activeButton) {
            activeButton.classList.add('text-primary', 'bg-primary/10');
            activeButton.classList.remove('text-gray-600', 'hover:text-primary', 'hover:bg-gray-50');
        }
    }
    </script>
</body>

</html>