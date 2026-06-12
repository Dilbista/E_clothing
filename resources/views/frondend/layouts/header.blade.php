<header class="sticky top-0 z-50 bg-white shadow-sm">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="font-['Pacifico'] text-2xl text-primary">logo</a>

        <!-- Main Navigation -->
        <nav class="hidden md:flex space-x-8">
            <!-- Home Link -->
            <a href="{{ url('/') }}"
                class="{{ request()->is('/') ? 'text-primary font-semibold' : 'text-gray-900 font-medium hover:text-primary' }} transition-colors">
                Home
            </a>

            <!-- Shop Dropdown Trigger -->
            <div class="relative">
                <button id="shopToggle"
                    class="{{ request()->routeIs('frontend.women', 'frontend.men', 'frontend.accessories', 'frontend.footwear') ? 'text-primary font-semibold' : 'text-gray-900 font-medium hover:text-primary' }} transition-colors flex items-center">
                    Shop
                    <div class="w-4 h-4 ml-1 flex items-center justify-center">
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                </button>

                <div id="shopMenu" class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded hidden">
                    <a href="{{ route('frontend.women') }}"
                        class="block px-4 py-2 text-sm {{ request()->routeIs('frontend.women') ? 'text-primary font-semibold bg-gray-50' : 'text-gray-700 hover:bg-gray-50' }}">Women</a>
                    <a href="{{ route('frontend.men') }}"
                        class="block px-4 py-2 text-sm {{ request()->routeIs('frontend.men') ? 'text-primary font-semibold bg-gray-50' : 'text-gray-700 hover:bg-gray-50' }}">Men</a>
                    <a href="{{ route('frontend.accessories') }}"
                        class="block px-4 py-2 text-sm {{ request()->routeIs('frontend.accessories') ? 'text-primary font-semibold bg-gray-50' : 'text-gray-700 hover:bg-gray-50' }}">Accessories</a>
                    <a href="{{ route('frontend.footwear') }}"
                        class="block px-4 py-2 text-sm {{ request()->routeIs('frontend.footwear') ? 'text-primary font-semibold bg-gray-50' : 'text-gray-700 hover:bg-gray-50' }}">Footwear</a>
                </div>
            </div>

            <!-- New Arrivals Link -->
            <a href="{{ route('frontend.new-arrivals') }}"
                class="{{ request()->routeIs('frontend.new-arrivals') ? 'text-primary font-semibold' : 'text-gray-900 font-medium hover:text-primary' }} transition-colors">
                New Arrivals
            </a>

            <!-- Sale Link -->
            <a href="{{ route('frontend.sale') }}"
                class="{{ request()->routeIs('frontend.sale') ? 'text-primary font-semibold' : 'text-gray-900 font-medium hover:text-primary' }} transition-colors">
                Sale
            </a>

            <!-- About Link -->
            <a href="{{ route('frontend.about') }}"
                class="{{ request()->routeIs('frontend.about') ? 'text-primary font-semibold' : 'text-gray-900 font-medium hover:text-primary' }} transition-colors">
                About
            </a>
        </nav>

        <!-- Utility Icons -->
        <div class="flex items-center space-x-6">
            <!-- Search -->
            <div class="relative">
                <button id="searchToggle"
                    class="w-10 h-10 flex items-center justify-center text-gray-700 hover:text-primary transition-colors">
                    <i class="ri-search-line text-xl" title="Search"></i>
                </button>
                <div id="searchDropdown" class="hidden absolute right-0 mt-2 w-72 bg-white shadow-lg rounded-lg p-4">
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
                    @if(Auth::check())
                        <!-- USER NAME -->
                        <div class="px-4 py-2 text-sm font-semibold text-gray-800 border-b">
                            {{ Auth::user()->name }}
                        </div>

                        <a href="{{ route('frontend.userprofile') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            My Account
                        </a>

                        <a href="{{ route('frontend.orders') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            Orders
                        </a>

                        <!-- LOGOUT -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-50">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            Sign In
                        </a>

                        <a href="{{ url('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            Register
                        </a>
                    @endif
                </div>
            </div>

            <div class="relative inline-block">
                <!-- Wishlist Link Container -->
                <a href="{{ route('wishlist') }}"
                    class="group relative flex items-center justify-center p-2.5 text-rose-500 bg-rose-50 rounded-full hover:bg-rose-100 hover:scale-105 active:scale-95 transition-all duration-200 shadow-sm hover:shadow"
                    title="Wishlist">

                    <!-- Smooth scaling Heart Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                        class="w-6 h-6 transform group-hover:scale-110 transition-transform duration-200">
                        <path
                            d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                    </svg>

                    <!-- Animated Badge Container -->
                    <span class="absolute -top-1 -right-1 flex h-5 w-5">
                        <!-- Outer Ping/Pulse Animation -->
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                        <!-- Main Count Badge -->
                        <span
                            class="relative inline-flex items-center justify-center h-5 w-5 rounded-full bg-rose-600 text-[10px] font-bold text-white shadow-sm">
                            5
                        </span>
                    </span>

                </a>
            </div>

            <!-- Cart -->
            <div class="relative">
                <button id="cartToggle" 
                    class="w-10 h-10 flex items-center justify-center text-gray-700 hover:text-primary transition-colors">
                    <i class="ri-shopping-bag-line text-xl" title="Cart"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-primary text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                </button>
                <div id="cartDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white shadow-lg rounded-lg p-4">
                    <h3 class="font-medium text-gray-900 mb-3">Your Cart (3)</h3>
                    <div class="space-y-3 max-h-80 overflow-y-auto">
                        <div class="flex items-center space-x-3">
                            <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?q=80&w=160&auto=format&fit=crop"
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
                            <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?q=80&w=160&auto=format&fit=crop"
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
                            <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?q=80&w=160&auto=format&fit=crop"
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
            <button id="mobileMenuToggle" class="md:hidden w-10 h-10 flex items-center justify-center text-gray-700">
                <i class="ri-menu-line text-2xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-100">
        <div class="container mx-auto px-4 py-3 space-y-3">
            <a href="{{ url('/') }}"
                class="block py-2 {{ request()->is('/') ? 'text-primary font-semibold' : 'text-gray-900 font-medium' }}">Home</a>
            <div>
                <button id="mobileShopToggle"
                    class="flex items-center justify-between w-full py-2 {{ request()->routeIs('frontend.women', 'frontend.men', 'frontend.accessories', 'frontend.footwear') ? 'text-primary font-semibold' : 'text-gray-900 font-medium' }}">
                    Shop
                    <i class="ri-arrow-down-s-line"></i>
                </button>
                <div id="mobileShopMenu" class="hidden pl-4 space-y-2 mt-1">
                    <a href="{{ route('frontend.women') }}"
                        class="block py-1 {{ request()->routeIs('frontend.women') ? 'text-primary font-semibold' : 'text-gray-700' }}">Women</a>
                    <a href="{{ route('frontend.men') }}"
                        class="block py-1 {{ request()->routeIs('frontend.men') ? 'text-primary font-semibold' : 'text-gray-700' }}">Men</a>
                    <a href="{{ route('frontend.accessories') }}"
                        class="block py-1 {{ request()->routeIs('frontend.accessories') ? 'text-primary font-semibold' : 'text-gray-700' }}">Accessories</a>
                    <a href="{{ route('frontend.footwear') }}"
                        class="block py-1 {{ request()->routeIs('frontend.footwear') ? 'text-primary font-semibold' : 'text-gray-700' }}">Footwear</a>
                </div>
            </div>
            <a href="{{ route('frontend.new-arrivals') }}"
                class="block py-2 {{ request()->routeIs('frontend.new-arrivals') ? 'text-primary font-semibold' : 'text-gray-900 font-medium' }}">New
                Arrivals</a>
            <a href="{{ route('frontend.sale') }}"
                class="block py-2 {{ request()->routeIs('frontend.sale') ? 'text-primary font-semibold' : 'text-gray-900 font-medium' }}">Sale</a>
            <a href="{{ route('frontend.about') }}"
                class="block py-2 {{ request()->routeIs('frontend.about') ? 'text-primary font-semibold' : 'text-gray-900 font-medium' }}">About</a>
        </div>
    </div>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // User Profile Dropdown
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

        // Shop Dropdown Toggle
        const toggle = document.getElementById('shopToggle');
        const menu = document.getElementById('shopMenu');

        if (toggle && menu) {
            toggle.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });

            document.addEventListener('click', (e) => {
                if (!toggle.contains(e.target) && !menu.contains(e.target)) {
                    menu.classList.add('hidden');
                }
            });
        }
    });
</script>