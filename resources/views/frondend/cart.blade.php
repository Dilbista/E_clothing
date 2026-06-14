<!DOCTYPE html>
<html lang="en">
<title>@yield('title', 'E_Cloting||Cart')</title>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopping Cart - ShopEase</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <!-- Scripts (Toggles, dropdowns, and live calculations logic) -->
    <script id="headerInteractions">
        document.addEventListener("DOMContentLoaded", function () {
            // Search Toggle
            const searchToggle = document.getElementById("searchToggle");
            const searchDropdown = document.getElementById("searchDropdown");

            if (searchToggle && searchDropdown) {
                searchToggle.addEventListener("click", function () {
                    searchDropdown.classList.toggle("hidden");
                });

                document.addEventListener("click", function (event) {
                    if (
                        !searchToggle.contains(event.target) &&
                        !searchDropdown.contains(event.target)
                    ) {
                        searchDropdown.classList.add("hidden");
                    }
                });
            }

            // Cart Toggle (Small badge updates linked directly)
            const cartToggle = document.getElementById("cartToggle");
            if (cartToggle) {
                cartToggle.addEventListener("click", function () {
                    // Cart page redirects or simple feedback can go here if needed.
                });
            }

            // Mobile Menu Toggle
            const mobileMenuToggle = document.getElementById("mobileMenuToggle");
            const mobileMenu = document.getElementById("mobileMenu");

            if (mobileMenuToggle && mobileMenu) {
                mobileMenuToggle.addEventListener("click", function () {
                    mobileMenu.classList.toggle("hidden");
                });
            }

            // Mobile Shop Menu Toggle
            const mobileShopToggle = document.getElementById("mobileShopToggle");
            const mobileShopMenu = document.getElementById("mobileShopMenu");

            if (mobileShopToggle && mobileShopMenu) {
                mobileShopToggle.addEventListener("click", function () {
                    mobileShopMenu.classList.toggle("hidden");
                });
            }
        });

        // User Account Profile Dropdown
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

        // Dynamic Cart Operations & Pricing Calculations
        function recalculateTotalSummary() {
            const cartItems = document.querySelectorAll('.cart-item');
            let subtotal = 0;

            cartItems.forEach(item => {
                const price = parseFloat(item.getAttribute('data-price'));
                const qtyElement = item.querySelector('.item-qty');
                const qty = parseInt(qtyElement.textContent);

                // Calculate and display individual item subtotal
                const itemSubtotal = price * qty;
                const itemSubtotalDisplay = item.querySelector('.item-subtotal');
                if (itemSubtotalDisplay) {
                    itemSubtotalDisplay.textContent = 'Rs.' + itemSubtotal.toFixed(2);
                }

                subtotal += itemSubtotal;
            });

            // Update overall values
            const subtotalDisplay = document.getElementById('summary-subtotal');
            const shippingDisplay = document.getElementById('summary-shipping');
            const taxDisplay = document.getElementById('summary-tax');
            const totalDisplay = document.getElementById('summary-total');
            const cartBadge = document.getElementById('cart-badge-count');

            if (subtotalDisplay) {
                subtotalDisplay.textContent = 'Rs.' + subtotal.toFixed(2);
            }

            // Calculate delivery (Free above Rs.100.00, otherwise Rs.10.00)
            let shippingCost = 0;
            if (subtotal > 0 && subtotal < 100) {
                shippingCost = 10.00;
                if (shippingDisplay) {
                    shippingDisplay.textContent = 'Rs.10.00';
                    shippingDisplay.classList.remove('text-emerald-600');
                    shippingDisplay.classList.add('text-gray-900');
                }
            } else {
                shippingCost = 0;
                if (shippingDisplay) {
                    shippingDisplay.textContent = subtotal > 0 ? 'Free' : 'Rs.0.00';
                    shippingDisplay.classList.add('text-emerald-600');
                    shippingDisplay.classList.remove('text-gray-900');
                }
            }

            // Calculate Tax (8%)
            const taxVal = subtotal * 0.08;
            if (taxDisplay) {
                taxDisplay.textContent = 'Rs.' + taxVal.toFixed(2);
            }

            // Final total
            const finalTotalVal = subtotal + shippingCost + taxVal;
            if (totalDisplay) {
                totalDisplay.textContent = 'Rs.' + finalTotalVal.toFixed(2);
            }

            // Update global cart counter badge
            if (cartBadge) {
                cartBadge.textContent = cartItems.length;
            }

            // If no items are left, toggle transition to Empty State Screen
            if (cartItems.length === 0) {
                const layout = document.getElementById('cart-main-layout');
                const emptyState = document.getElementById('empty-cart');
                if (layout && emptyState) {
                    layout.classList.add('hidden');
                    emptyState.classList.remove('hidden');
                }
            }
        }

        // Handle Quantity increments or decrements
        function updateQty(btn, change) {
            const qtyContainer = btn.parentNode;
            const qtyDisplay = qtyContainer.querySelector('.item-qty');
            if (qtyDisplay) {
                let currentQty = parseInt(qtyDisplay.textContent);
                currentQty += change;
                if (currentQty < 1) currentQty = 1;
                qtyDisplay.textContent = currentQty;

                recalculateTotalSummary();
            }
        }

        // Remove Item from Cart smoothly
        function removeCartItem(trashBtn) {
            const itemCard = trashBtn.closest('.cart-item');
            if (itemCard) {
                // Apply scale-down fade-out animation
                itemCard.classList.add('transition-all', 'duration-300', 'scale-90', 'opacity-0');

                setTimeout(() => {
                    itemCard.remove();
                    recalculateTotalSummary();
                }, 300);
            }
        }
    </script>
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
    <main class="container mx-auto px-4 py-10 md:py-16">
        <!-- Breadcrumb & Header -->
        <div class="mb-10">
            <nav class="flex text-xs text-gray-500 gap-2 mb-2">
                <a href="#" class="hover:text-primary transition">Home</a>
                <span>/</span>
                <span class="text-gray-900 font-semibold">Shopping Cart</span>
            </nav>
            <h1 class="text-3xl font-bold text-gray-900">Shopping Cart</h1>
        </div>

        <!-- Two Column Main Layout Grid -->
        <div id="cart-main-layout" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Side Column: Items List -->
            <div class="lg:col-span-2 space-y-4">
                <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm divide-y divide-gray-100"
                    id="cart-items-container">

                    <!-- Cart Item 1 -->
                    <div class="cart-item flex flex-col sm:flex-row items-start sm:items-center justify-between py-6 first:pt-0 last:pb-0 gap-4"
                        data-price="24.99">
                        <div class="flex items-center space-x-4">
                            <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?q=80&w=200&auto=format&fit=crop"
                                alt="Essential White T-Shirt"
                                class="w-20 h-20 object-cover rounded border border-gray-100" />
                            <div>
                                <h3 class="font-bold text-gray-900 text-base">Essential White T-Shirt</h3>
                                <p class="text-xs text-gray-500 mt-1">Size: M | Color: White</p>
                                <p class="text-sm font-semibold text-primary mt-2">Rs.24.99</p>
                            </div>
                        </div>

                        <!-- Quantity Selector & Subtotal Pricing -->
                        <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-8">
                            <div
                                class="flex items-center justify-between border border-gray-200 rounded-button w-28 px-3 py-1.5">
                                <button onclick="updateQty(this, -1)"
                                    class="text-gray-400 hover:text-gray-600 font-bold focus:outline-none"><i
                                        class="ri-subtract-line"></i></button>
                                <span class="item-qty text-sm font-semibold text-gray-800">1</span>
                                <button onclick="updateQty(this, 1)"
                                    class="text-gray-400 hover:text-gray-600 font-bold focus:outline-none"><i
                                        class="ri-add-line"></i></button>
                            </div>
                            <div class="text-right min-w-[80px]">
                                <p class="item-subtotal text-base font-bold text-gray-900">Rs.24.99</p>
                            </div>
                            <button onclick="removeCartItem(this)"
                                class="text-gray-400 hover:text-rose-600 transition p-1">
                                <i class="ri-delete-bin-line text-lg"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Cart Item 2 -->
                    <div class="cart-item flex flex-col sm:flex-row items-start sm:items-center justify-between py-6 last:pb-0 gap-4"
                        data-price="59.99">
                        <div class="flex items-center space-x-4">
                            <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?q=80&w=200&auto=format&fit=crop"
                                alt="Slim Fit Black Jeans"
                                class="w-20 h-20 object-cover rounded border border-gray-100" />
                            <div>
                                <h3 class="font-bold text-gray-900 text-base">Slim Fit Black Jeans</h3>
                                <p class="text-xs text-gray-500 mt-1">Size: 32 | Color: Black</p>
                                <p class="text-sm font-semibold text-primary mt-2">Rs.59.99</p>
                            </div>
                        </div>

                        <!-- Quantity Selector & Subtotal Pricing -->
                        <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-8">
                            <div
                                class="flex items-center justify-between border border-gray-200 rounded-button w-28 px-3 py-1.5">
                                <button onclick="updateQty(this, -1)"
                                    class="text-gray-400 hover:text-gray-600 font-bold focus:outline-none"><i
                                        class="ri-subtract-line"></i></button>
                                <span class="item-qty text-sm font-semibold text-gray-800">1</span>
                                <button onclick="updateQty(this, 1)"
                                    class="text-gray-400 hover:text-gray-600 font-bold focus:outline-none"><i
                                        class="ri-add-line"></i></button>
                            </div>
                            <div class="text-right min-w-[80px]">
                                <p class="item-subtotal text-base font-bold text-gray-900">Rs.59.99</p>
                            </div>
                            <button onclick="removeCartItem(this)"
                                class="text-gray-400 hover:text-rose-600 transition p-1">
                                <i class="ri-delete-bin-line text-lg"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Cart Item 3 -->
                    <div class="cart-item flex flex-col sm:flex-row items-start sm:items-center justify-between py-6 last:pb-0 gap-4"
                        data-price="129.99">
                        <div class="flex items-center space-x-4">
                            <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?q=80&w=200&auto=format&fit=crop"
                                alt="Classic Leather Watch"
                                class="w-20 h-20 object-cover rounded border border-gray-100" />
                            <div>
                                <h3 class="font-bold text-gray-900 text-base">Classic Leather Watch</h3>
                                <p class="text-xs text-gray-500 mt-1">Color: Brown</p>
                                <p class="text-sm font-semibold text-primary mt-2">Rs.129.99</p>
                            </div>
                        </div>

                        <!-- Quantity Selector & Subtotal Pricing -->
                        <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-8">
                            <div
                                class="flex items-center justify-between border border-gray-200 rounded-button w-28 px-3 py-1.5">
                                <button onclick="updateQty(this, -1)"
                                    class="text-gray-400 hover:text-gray-600 font-bold focus:outline-none"><i
                                        class="ri-subtract-line"></i></button>
                                <span class="item-qty text-sm font-semibold text-gray-800">1</span>
                                <button onclick="updateQty(this, 1)"
                                    class="text-gray-400 hover:text-gray-600 font-bold focus:outline-none"><i
                                        class="ri-add-line"></i></button>
                            </div>
                            <div class="text-right min-w-[80px]">
                                <p class="item-subtotal text-base font-bold text-gray-900">Rs.129.99</p>
                            </div>
                            <button onclick="removeCartItem(this)"
                                class="text-gray-400 hover:text-rose-600 transition p-1">
                                <i class="ri-delete-bin-line text-lg"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right Side Column: Order Checkout Summary Panel -->
            <div class="space-y-6">
                <!-- Order Pricing Breakdowns -->
                <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm space-y-4">
                    <h3 class="font-bold text-gray-900 text-lg border-b border-gray-100 pb-4">Order Summary</h3>

                    <div class="flex justify-between text-sm text-gray-600">
                        <span>Subtotal</span>
                        <span id="summary-subtotal" class="font-semibold text-gray-900">Rs.214.97</span>
                    </div>
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>Estimated Shipping</span>
                        <span id="summary-shipping" class="font-semibold text-emerald-600">Free</span>
                    </div>
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>Estimated Tax (8%)</span>
                        <span id="summary-tax" class="font-semibold text-gray-900">Rs.17.20</span>
                    </div>

                    <div class="border-t border-gray-100 pt-4 flex justify-between text-base font-bold text-gray-900">
                        <span>Estimated Total</span>
                        <span id="summary-total">Rs.232.17</span>
                    </div>

                    <!-- Promo Code Coupon section -->
                    <div class="pt-4">
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Apply
                            Promo Code</label>
                        <div class="flex gap-2">
                            <input type="text" placeholder="CODE20"
                                class="flex-1 px-3 py-2 border border-gray-200 rounded text-xs focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary uppercase" />
                            <button
                                class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-xs font-semibold rounded transition">Apply</button>
                        </div>
                    </div>

                    <button
                        class="w-full py-3 mt-4 bg-primary text-white font-semibold rounded-button hover:bg-primary/90 transition flex justify-center items-center gap-2">
                        Proceed to Checkout <i class="ri-arrow-right-line"></i>
                    </button>
                </div>

                <!-- Secure Checkout Assurance badges -->
                <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm text-center">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Secure Checkout
                        Guaranteed</p>
                    <div class="flex justify-center items-center gap-4">
                        <img src="{{ asset('build/images/payments/esewa.png') }}" alt="eSewa" class="h-8 object-contain">

                        <img src="{{ asset('build/images/payments/khalti.png') }}" alt="Khalti" class="h-8 object-contain">

                        <img src="{{ asset('build/images/payments/ime pay.png') }}" alt="IME Pay" class="h-8 object-contain">

                       
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty Cart Placeholder Screen (Hidden by default) -->
        <div id="empty-cart" class="hidden text-center py-24 max-w-sm mx-auto">
            <div class="w-16 h-16 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="ri-shopping-bag-line text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Your Shopping Cart is Empty</h3>
            <p class="text-sm text-gray-500 mb-8">Take a look at our collections to find sustainable and premium
                clothing designed to last.</p>
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


</body>

</html>