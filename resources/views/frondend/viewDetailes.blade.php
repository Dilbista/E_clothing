<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Classic Leather Jacket - ShopEase</title>
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
            <a href="{{ url('/') }}" class="font-['Pacifico'] text-2xl text-primary">logo</a>

            <!-- Main Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('frontend.home') }}"
                    class="text-gray-900 font-medium hover:text-primary transition-colors">Home</a>
                <div class="relative group">
                    <button class="text-primary font-semibold hover:text-primary transition-colors flex items-center">
                        Shop
                        <div class="w-4 h-4 ml-1 flex items-center justify-center">
                            <i class="ri-arrow-down-s-line"></i>
                        </div>
                    </button>
                    <div class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded hidden group-hover:block">
                        <a href="{{ route('frontend.women') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Women</a>
                        <a href="{{ route('frontend.men') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 font-semibold text-primary">Men</a>
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
                        class="w-10 h-10 flex items-center justify-center text-gray-700 hover:text-primary transition-colors">
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

    <!-- Product Details Main Layout -->
    <main class="container mx-auto px-4 py-10 md:py-16">
        <!-- Breadcrumb Navigation -->
        <nav class="flex text-xs text-gray-500 gap-2 mb-8">
            <a href="#" class="hover:text-primary transition">Home</a>
            <span>/</span>
            <a href="#" class="hover:text-primary transition">Shop</a>
            <span>/</span>
            <a href="#" class="hover:text-primary transition">Men</a>
            <span>/</span>
            <span class="text-gray-900 font-semibold">Classic Leather Jacket</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
            <!-- Left Side: Product Image Showcase -->
            <div class="space-y-4">
                <!-- Main Showcase Image -->
                <div class="overflow-hidden rounded-lg bg-gray-100 aspect-[4/5]">
                    <img id="mainProductImg"
                        src="https://images.unsplash.com/photo-1551028719-00167b16eac5?q=80&w=800&auto=format&fit=crop"
                        alt="Classic Leather Jacket"
                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105" />
                </div>
                <!-- Mini Thumbnails Image Switcher List -->
                <div class="grid grid-cols-3 gap-4">
                    <button
                        onclick="switchProductImage(this, 'https://images.unsplash.com/photo-1551028719-00167b16eac5?q=80&w=800&auto=format&fit=crop')"
                        class="overflow-hidden rounded-lg aspect-square border-2 border-primary">
                        <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?q=80&w=200&auto=format&fit=crop"
                            class="w-full h-full object-cover" alt="Jacket Front View" />
                    </button>
                    <button
                        onclick="switchProductImage(this, 'https://images.unsplash.com/photo-1521223890158-f9f7c3d5d504?q=80&w=800&auto=format&fit=crop')"
                        class="overflow-hidden rounded-lg aspect-square border-2 border-transparent hover:border-gray-200">
                        <img src="https://images.unsplash.com/photo-1521223890158-f9f7c3d5d504?q=80&w=200&auto=format&fit=crop"
                            class="w-full h-full object-cover" alt="Jacket Back Detail" />
                    </button>
                    <button
                        onclick="switchProductImage(this, 'https://images.unsplash.com/photo-1551488831-00ddcb6c6bd3?q=80&w=800&auto=format&fit=crop')"
                        class="overflow-hidden rounded-lg aspect-square border-2 border-transparent hover:border-gray-200">
                        <img src="https://images.unsplash.com/photo-1551488831-00ddcb6c6bd3?q=80&w=200&auto=format&fit=crop"
                            class="w-full h-full object-cover" alt="Jacket Collar Detail" />
                    </button>
                </div>
            </div>

            <!-- Right Side: Details, Sizing, Quantity Controls -->
            <div class="space-y-6">
                <!-- Header product stats -->
                <div>
                    <span
                        class="inline-block px-2.5 py-1 bg-amber-500 text-white text-xs font-semibold rounded mb-3">Best
                        Seller</span>
                    <h1 class="text-3xl font-bold text-gray-900">Classic Leather Jacket</h1>

                    <!-- Rating and reviews block -->
                    <div class="flex items-center space-x-3 mt-3">
                        <div class="flex text-amber-400 text-sm">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-half-fill"></i>
                        </div>
                        <span class="text-xs font-semibold text-gray-500">(76 verified buyer reviews)</span>
                    </div>
                </div>

                <!-- Product Price -->
                <div class="border-b border-gray-100 pb-6">
                    <p class="text-3xl font-bold text-gray-900">Rs.199.99</p>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Handcrafted using durable top-grain sheepskin
                        leather. This classic asymmetrical zip jacket features quilted shoulder panel detailing,
                        heavy-duty metal hardware closures, and a breathable lined interior built to endure years of
                        wear.</p>
                </div>

                <!-- Color Select Option -->
                <div class="space-y-3">
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Select Color</span>
                    <div class="flex space-x-3" id="color-selectors">
                        <button onclick="selectColor(this, 'Classic Black')"
                            class="w-8 h-8 rounded-full bg-neutral-900 border-2 border-primary focus:outline-none ring-2 ring-offset-2 ring-transparent transition"
                            title="Classic Black"></button>
                        <button onclick="selectColor(this, 'Vintage Brown')"
                            class="w-8 h-8 rounded-full bg-[#5C4033] border-2 border-transparent focus:outline-none ring-2 ring-offset-2 ring-transparent transition"
                            title="Vintage Brown"></button>
                    </div>
                </div>

                <!-- Size Select Option -->
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Select Size</span>
                        <button class="text-xs font-semibold text-primary hover:underline">Size Guide</button>
                    </div>
                    <div class="flex flex-wrap gap-3" id="size-selectors">
                        <button onclick="selectSize(this)"
                            class="px-4 py-2 text-xs font-semibold border rounded border-gray-200 text-gray-600 hover:border-primary hover:text-primary transition">S</button>
                        <button onclick="selectSize(this)"
                            class="px-4 py-2 text-xs font-semibold border rounded border-primary text-primary transition">M</button>
                        <button onclick="selectSize(this)"
                            class="px-4 py-2 text-xs font-semibold border rounded border-gray-200 text-gray-600 hover:border-primary hover:text-primary transition">L</button>
                        <button onclick="selectSize(this)"
                            class="px-4 py-2 text-xs font-semibold border rounded border-gray-200 text-gray-600 hover:border-primary hover:text-primary transition">XL</button>
                    </div>
                </div>

                <!-- Quantity & Actions block -->
                <div class="flex flex-col sm:flex-row gap-4 pt-4 border-t border-gray-100">
                    <!-- Quantity Counter -->
                    <div
                        class="flex items-center justify-between border border-gray-200 rounded-button w-full sm:w-32 px-4 py-2.5">
                        <button onclick="changeQuantity(-1)"
                            class="text-gray-400 hover:text-gray-600 font-bold focus:outline-none"><i
                                class="ri-subtract-line"></i></button>
                        <span id="qty-counter" class="text-sm font-semibold text-gray-800">1</span>
                        <button onclick="changeQuantity(1)"
                            class="text-gray-400 hover:text-gray-600 font-bold focus:outline-none"><i
                                class="ri-add-line"></i></button>
                    </div>

                    <!-- Buy Buttons -->
                    <button
                        class="flex-1 py-3 px-6 bg-primary text-white font-semibold rounded-button hover:bg-primary/90 transition flex justify-center items-center gap-2">
                        <i class="ri-shopping-bag-line"></i> Add to Cart
                    </button>
                    <button
                        class="p-3 border border-gray-200 text-gray-400 hover:text-rose-500 hover:border-rose-200 rounded-button transition flex items-center justify-center">
                        <i class="ri-heart-line text-lg"></i>
                    </button>
                </div>

                <!-- Accordion collapsible details block -->
                <div class="border-t border-gray-100 pt-6 space-y-4">
                    <!-- Accordion Item 1 -->
                    <div class="border-b border-gray-100 pb-4">
                        <button onclick="toggleAccordion('desc')"
                            class="w-full flex justify-between items-center text-sm font-bold text-gray-900 focus:outline-none">
                            <span>Product Specifications</span>
                            <i id="icon-desc" class="ri-add-line text-gray-400 transition"></i>
                        </button>
                        <div id="content-desc" class="hidden text-xs text-gray-600 space-y-2 mt-3 leading-relaxed">
                            <p>• Genuine top-grain soft-finished sheepskin leather body.</p>
                            <p>• Asymmetric front metal zip closure with robust double lining panels.</p>
                            <p>• Zip utility sleeve pockets, two zippered lower hand rest compartments.</p>
                            <p>• Internal storage pockets for quick security storage options.</p>
                        </div>
                    </div>

                    <!-- Accordion Item 2 -->
                    <div class="border-b border-gray-100 pb-4">
                        <button onclick="toggleAccordion('fit')"
                            class="w-full flex justify-between items-center text-sm font-bold text-gray-900 focus:outline-none">
                            <span>Material & Fit Advice</span>
                            <i id="icon-fit" class="ri-add-line text-gray-400 transition"></i>
                        </button>
                        <div id="content-fit" class="hidden text-xs text-gray-600 space-y-2 mt-3 leading-relaxed">
                            <p>• Regular crop silhouette fitting. Built for layering comfortably over thin t-shirts or
                                winter sweaters.</p>
                            <p>• Clean professionally at licensed leather-care facilities only. Do not wash or steam
                                iron directly.</p>
                        </div>
                    </div>

                    <!-- Accordion Item 3 -->
                    <div class="border-b border-gray-100 pb-4">
                        <button onclick="toggleAccordion('shipping')"
                            class="w-full flex justify-between items-center text-sm font-bold text-gray-900 focus:outline-none">
                            <span>Standard Delivery & Returns</span>
                            <i id="icon-shipping" class="ri-add-line text-gray-400 transition"></i>
                        </button>
                        <div id="content-shipping" class="hidden text-xs text-gray-600 space-y-2 mt-3 leading-relaxed">
                            <p>• Complimentary express home shipping on orders exceeding Rs.100.00.</p>
                            <p>• Free hassle-free returns on unworn selections returned complete with security tags
                                within 30 days.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Related Products Grid (Matching Home page layouts) -->
    <section class="py-16 border-t border-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Selections</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Related Item 1 -->
                <div class="group">
                    <div class="relative overflow-hidden rounded-lg mb-4">
                        <span class="absolute top-3 left-3 bg-rose-500 text-white text-xs px-2 py-1 rounded">Sale</span>
                        <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?q=80&w=300&auto=format&fit=crop"
                            alt="Denim Jeans" class="w-full h-80 object-cover" />
                        <div
                            class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <button
                                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition"><i
                                    class="ri-eye-line"></i></button>
                            <button
                                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition"><i
                                    class="ri-heart-line"></i></button>
                            <button
                                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition"><i
                                    class="ri-shopping-bag-line"></i></button>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Premium Denim Jeans</h3>
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
                        <p class="text-gray-900 font-medium">Rs.79.99</p>
                    </div>
                </div>

                <!-- Related Item 2 -->
                <div class="group">
                    <div class="relative overflow-hidden rounded-lg mb-4">
                        <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?q=80&w=300&auto=format&fit=crop"
                            alt="Classic Watch" class="w-full h-80 object-cover" />
                        <div
                            class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <button
                                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition"><i
                                    class="ri-eye-line"></i></button>
                            <button
                                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition"><i
                                    class="ri-heart-line"></i></button>
                            <button
                                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition"><i
                                    class="ri-shopping-bag-line"></i></button>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Classic Leather Watch</h3>
                        <div class="flex items-center mb-1">
                            <div class="flex text-amber-400 text-sm">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-line"></i>
                            </div>
                            <span class="text-xs text-gray-500 ml-1">(41)</span>
                        </div>
                        <p class="text-gray-900 font-medium">Rs.129.99</p>
                    </div>
                </div>

                <!-- Related Item 3 -->
                <div class="group">
                    <div class="relative overflow-hidden rounded-lg mb-4">
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs px-2 py-1 rounded">New</span>
                        <img src="https://images.unsplash.com/photo-1511499767150-a48a237f0083?q=80&w=300&auto=format&fit=crop"
                            alt="Sunglasses" class="w-full h-80 object-cover" />
                        <div
                            class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <button
                                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition"><i
                                    class="ri-eye-line"></i></button>
                            <button
                                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition"><i
                                    class="ri-heart-line"></i></button>
                            <button
                                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition"><i
                                    class="ri-shopping-bag-line"></i></button>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Premium Sunglasses</h3>
                        <div class="flex items-center mb-1">
                            <div class="flex text-amber-400 text-sm">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-line"></i>
                            </div>
                            <span class="text-xs text-gray-500 ml-1">(8)</span>
                        </div>
                        <p class="text-gray-900 font-medium">Rs.89.99</p>
                    </div>
                </div>

                <!-- Related Item 4 -->
                <div class="group">
                    <div class="relative overflow-hidden rounded-lg mb-4">
                        <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?q=80&w=300&auto=format&fit=crop"
                            alt="White Shirt" class="w-full h-80 object-cover" />
                        <div
                            class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <button
                                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition"><i
                                    class="ri-eye-line"></i></button>
                            <button
                                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition"><i
                                    class="ri-heart-line"></i></button>
                            <button
                                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition"><i
                                    class="ri-shopping-bag-line"></i></button>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Essential White T-Shirt</h3>
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
                        <p class="text-gray-900 font-medium">Rs.24.99</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <!-- Scripts (Toggles, image switches, color/size select, accordion toggles) -->
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

    // User Account Dropdown
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

    // Image Switcher Logic
    function switchProductImage(thumbnailBtn, imageSrc) {
        const mainImg = document.getElementById('mainProductImg');
        if (mainImg) {
            mainImg.src = imageSrc;
        }

        // Reset thumbnail borders
        const thumbnails = thumbnailBtn.parentNode.querySelectorAll('button');
        thumbnails.forEach(btn => {
            btn.classList.remove('border-primary');
            btn.classList.add('border-transparent', 'hover:border-gray-200');
        });

        // Highlight active thumbnail
        thumbnailBtn.classList.add('border-primary');
        thumbnailBtn.classList.remove('border-transparent', 'hover:border-gray-200');
    }

    // Color Selector Action
    function selectColor(colorBtn, colorName) {
        const colorContainer = document.getElementById('color-selectors');
        const colorButtons = colorContainer.querySelectorAll('button');

        colorButtons.forEach(btn => {
            btn.classList.remove('border-primary');
            btn.classList.add('border-transparent');
        });

        colorBtn.classList.add('border-primary');
        colorBtn.classList.remove('border-transparent');
    }

    // Size Selector Action
    function selectSize(sizeBtn) {
        const sizeContainer = document.getElementById('size-selectors');
        const sizeButtons = sizeContainer.querySelectorAll('button');

        sizeButtons.forEach(btn => {
            btn.classList.remove('border-primary', 'text-primary');
            btn.classList.add('border-gray-200', 'text-gray-600');
        });

        sizeBtn.classList.add('border-primary', 'text-primary');
        sizeBtn.classList.remove('border-gray-200', 'text-gray-600');
    }

    // Quantity Increment / Decrement Counter
    function changeQuantity(val) {
        const counter = document.getElementById('qty-counter');
        if (counter) {
            let count = parseInt(counter.textContent);
            count += val;
            if (count < 1) count = 1;
            counter.textContent = count;
        }
    }

    // Details Accordion Expand/Collapse Action
    function toggleAccordion(sectionId) {
        const content = document.getElementById('content-' + sectionId);
        const icon = document.getElementById('icon-' + sectionId);

        if (content && icon) {
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.classList.remove('ri-add-line');
                icon.classList.add('ri-subtract-line');
            } else {
                content.classList.add('hidden');
                icon.classList.remove('ri-subtract-line');
                icon.classList.add('ri-add-line');
            }
        }
    }
    </script>
</body>

</html>