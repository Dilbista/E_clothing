<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Orders - ShopEase</title>
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

<body class="bg-gray-50">
    <!-- Header -->
    @include('frondend.layouts.header')

    <!-- Main Content Panel -->
    <main class="container mx-auto px-4 py-10 md:py-16 max-w-4xl">
        <!-- Breadcrumb & Header -->
        <div class="mb-8">
            <nav class="flex text-xs text-gray-500 gap-2 mb-2">
                <a href="{{ url('/') }}" class="hover:text-primary transition">Home</a>
                <span>/</span>
                <a href="#" class="hover:text-primary transition">My Account</a>
                <span>/</span>
                <span class="text-gray-900 font-medium">Orders</span>
            </nav>
            <h1 class="text-3xl font-bold text-gray-900">Your Orders</h1>
            <p class="text-sm text-gray-600 mt-1">Check the status of current shipments, view detailed invoice bills, or
                repurchase saved selections.</p>
        </div>

        <!-- Filter Tab Selection Bar -->
        <div class="flex border-b border-gray-200 mb-8 gap-6">
            <button onclick="filterOrders('all')" id="tab-all"
                class="pb-4 font-semibold text-sm border-b-2 border-primary text-primary transition-colors focus:outline-none">
                All Orders <span class="text-xs bg-indigo-50 text-primary px-2 py-0.5 rounded-full ml-1">3</span>
            </button>
            <button onclick="filterOrders('transit')" id="tab-transit"
                class="pb-4 font-medium text-sm border-b-2 border-transparent text-gray-500 hover:text-primary hover:border-indigo-100 transition-colors focus:outline-none">
                In Transit <span class="text-xs bg-indigo-50 text-primary px-2 py-0.5 rounded-full ml-1">1</span>
            </button>
            <button onclick="filterOrders('completed')" id="tab-completed"
                class="pb-4 font-medium text-sm border-b-2 border-transparent text-gray-500 hover:text-primary hover:border-indigo-100 transition-colors focus:outline-none">
                Completed <span class="text-xs bg-indigo-50 text-primary px-2 py-0.5 rounded-full ml-1">2</span>
            </button>
        </div>

        <!-- Orders Container -->
        <div id="orders-list" class="space-y-6">

            <!-- Order Card 1 (Shipped / Transit) -->
            <div class="order-card bg-white rounded-lg border border-gray-100 shadow-sm overflow-hidden"
                data-status="transit">
                <!-- Header of Card -->
                <div
                    class="bg-gray-50/50 px-6 py-4 border-b border-gray-100 flex flex-wrap justify-between items-center gap-4 text-sm text-gray-600">
                    <div class="flex gap-6">
                        <div>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Date Placed</p>
                            <p class="font-semibold text-gray-800 mt-0.5">June 02, 2026</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Total Sum</p>
                            <p class="font-semibold text-gray-800 mt-0.5">Rs.154.98</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Ship To</p>
                            <p class="font-semibold text-gray-800 mt-0.5 hover:text-primary cursor-pointer">Emily
                                Richardson</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Order Reference</p>
                        <p class="font-semibold text-gray-800 mt-0.5">#SE-8942</p>
                    </div>
                </div>

                <!-- Body of Card (Products) -->
                <div class="p-6 divide-y divide-gray-100">
                    <!-- Product Item 1 -->
                    <div
                        class="flex flex-col sm:flex-row justify-between items-start sm:items-center py-4 first:pt-0 last:pb-0 gap-4">
                        <div class="flex items-center space-x-4">
                            <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?q=80&w=200&auto=format&fit=crop"
                                alt="Essential T-shirt" class="w-16 h-16 object-cover rounded border border-gray-100" />
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">Essential White T-Shirt</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Size: M | Qty: 1</p>
                                <p class="text-sm font-semibold text-primary mt-1">Rs.24.99</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <button
                                class="py-2 px-4 border border-gray-200 text-xs font-semibold rounded-button text-gray-700 hover:bg-gray-50 transition">Buy
                                It Again</button>
                        </div>
                    </div>

                    <!-- Product Item 2 -->
                    <div
                        class="flex flex-col sm:flex-row justify-between items-start sm:items-center py-4 last:pb-0 gap-4">
                        <div class="flex items-center space-x-4">
                            <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?q=80&w=200&auto=format&fit=crop"
                                alt="Classic Leather Watch"
                                class="w-16 h-16 object-cover rounded border border-gray-100" />
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">Classic Leather Watch</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Color: Brown | Qty: 1</p>
                                <p class="text-sm font-semibold text-primary mt-1">Rs.129.99</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <button
                                class="py-2 px-4 border border-gray-200 text-xs font-semibold rounded-button text-gray-700 hover:bg-gray-50 transition">Buy
                                It Again</button>
                        </div>
                    </div>
                </div>

                <!-- Shipping Status Step-Tracker Footer inside Card -->
                <div class="bg-gray-50/30 p-6 border-t border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-indigo-600 animate-pulse"></span>
                            <span class="text-sm font-semibold text-primary">In Transit - Expected Delivery: June 15,
                                2026</span>
                        </div>
                        <button class="text-xs font-semibold text-primary hover:underline">Track Your Shipment</button>
                    </div>

                    <!-- Step Tracker Graphic -->
                    <div class="relative flex justify-between text-xs text-gray-500 max-w-lg">
                        <!-- Connecting Line Behind -->
                        <div class="absolute top-2.5 left-4 right-4 h-0.5 bg-gray-200 -z-10"></div>
                        <div class="absolute top-2.5 left-4 w-2/3 h-0.5 bg-primary -z-10"></div>
                        <!-- Active Progress Line -->

                        <div class="flex flex-col items-center">
                            <span
                                class="w-5 h-5 rounded-full bg-primary text-white flex items-center justify-center font-bold text-[10px] shadow"><i
                                    class="ri-check-line"></i></span>
                            <span class="mt-2 font-medium text-gray-900">Ordered</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <span
                                class="w-5 h-5 rounded-full bg-primary text-white flex items-center justify-center font-bold text-[10px] shadow"><i
                                    class="ri-check-line"></i></span>
                            <span class="mt-2 font-medium text-gray-900">Processed</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <span
                                class="w-5 h-5 rounded-full bg-primary text-white flex items-center justify-center font-bold text-[10px] border-2 border-primary shadow">3</span>
                            <span class="mt-2 font-semibold text-primary">Shipped</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <span
                                class="w-5 h-5 rounded-full bg-white text-gray-300 flex items-center justify-center font-bold text-[10px] border-2 border-gray-200">4</span>
                            <span class="mt-2 font-medium text-gray-400">Delivered</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Card 2 (Completed) -->
            <div class="order-card bg-white rounded-lg border border-gray-100 shadow-sm overflow-hidden"
                data-status="completed">
                <!-- Header of Card -->
                <div
                    class="bg-gray-50/50 px-6 py-4 border-b border-gray-100 flex flex-wrap justify-between items-center gap-4 text-sm text-gray-600">
                    <div class="flex gap-6">
                        <div>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Date Placed</p>
                            <p class="font-semibold text-gray-800 mt-0.5">May 14, 2026</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Total Sum</p>
                            <p class="font-semibold text-gray-800 mt-0.5">Rs.214.00</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Ship To</p>
                            <p class="font-semibold text-gray-800 mt-0.5 hover:text-primary cursor-pointer">Emily
                                Richardson</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Order Reference</p>
                        <p class="font-semibold text-gray-800 mt-0.5">#SE-8519</p>
                    </div>
                </div>

                <!-- Body of Card (Products) -->
                <div class="p-6 divide-y divide-gray-100">
                    <div
                        class="flex flex-col sm:flex-row justify-between items-start sm:items-center py-4 first:pt-0 last:pb-0 gap-4">
                        <div class="flex items-center space-x-4">
                            <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?q=80&w=200&auto=format&fit=crop"
                                alt="Slim Fit Jeans" class="w-16 h-16 object-cover rounded border border-gray-100" />
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">Slim Fit Black Jeans</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Size: 32 | Qty: 1</p>
                                <p class="text-sm font-semibold text-primary mt-1">Rs.59.99</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <button
                                class="py-2 px-4 border border-gray-200 text-xs font-semibold rounded-button text-gray-700 hover:bg-gray-50 transition">Buy
                                It Again</button>
                        </div>
                    </div>
                </div>

                <!-- Delivery Footer status -->
                <div class="bg-gray-50/30 p-6 border-t border-gray-100 flex justify-between items-center text-sm">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span class="font-semibold text-emerald-600">Delivered on May 18, 2026</span>
                    </div>
                    <a href="#" class="text-xs font-semibold text-primary hover:underline flex items-center gap-1">
                        <i class="ri-file-download-line"></i> Download Invoice
                    </a>
                </div>
            </div>

            <!-- Order Card 3 (Completed) -->
            <div class="order-card bg-white rounded-lg border border-gray-100 shadow-sm overflow-hidden"
                data-status="completed">
                <!-- Header of Card -->
                <div
                    class="bg-gray-50/50 px-6 py-4 border-b border-gray-100 flex flex-wrap justify-between items-center gap-4 text-sm text-gray-600">
                    <div class="flex gap-6">
                        <div>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Date Placed</p>
                            <p class="font-semibold text-gray-800 mt-0.5">April 02, 2026</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Total Sum</p>
                            <p class="font-semibold text-gray-800 mt-0.5">Rs.79.96</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Ship To</p>
                            <p class="font-semibold text-gray-800 mt-0.5 hover:text-primary cursor-pointer">Emily
                                Richardson</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Order Reference</p>
                        <p class="font-semibold text-gray-800 mt-0.5">#SE-7901</p>
                    </div>
                </div>

                <!-- Body of Card (Products) -->
                <div class="p-6 divide-y divide-gray-100">
                    <div
                        class="flex flex-col sm:flex-row justify-between items-start sm:items-center py-4 first:pt-0 last:pb-0 gap-4">
                        <div class="flex items-center space-x-4">
                            <img src="https://images.unsplash.com/photo-1511499767150-a48a237f0083?q=80&w=200&auto=format&fit=crop"
                                alt="Sunglasses" class="w-16 h-16 object-cover rounded border border-gray-100" />
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">Premium Sunglasses</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Color: Black | Qty: 1</p>
                                <p class="text-sm font-semibold text-primary mt-1">Rs.89.99</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <button
                                class="py-2 px-4 border border-gray-200 text-xs font-semibold rounded-button text-gray-700 hover:bg-gray-50 transition">Buy
                                It Again</button>
                        </div>
                    </div>
                </div>

                <!-- Delivery Footer status -->
                <div class="bg-gray-50/30 p-6 border-t border-gray-100 flex justify-between items-center text-sm">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span class="font-semibold text-emerald-600">Delivered on April 06, 2026</span>
                    </div>
                    <a href="#" class="text-xs font-semibold text-primary hover:underline flex items-center gap-1">
                        <i class="ri-file-download-line"></i> Download Invoice
                    </a>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer (Identical Pattern to existing Pages) -->
      @include('frondend.layouts.footer')


    <!-- Scripts (Toggles, dropdowns, and filtering logic) -->
    
</body>

</html>