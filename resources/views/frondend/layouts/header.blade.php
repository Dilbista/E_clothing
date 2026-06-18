<!-- Header Wrapper -->
<header class="sticky top-0 z-50 bg-white shadow-sm font-sans">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16 md:h-20">
            
            <!-- 1. Logo -->
            <a href="{{ url('/') }}" class="font-['Pacifico'] text-2xl text-primary shrink-0">
                logo
            </a>

            <!-- 2. Desktop Navigation (Hidden on Mobile) -->
            <nav class="hidden lg:flex items-center space-x-8">
                <a href="{{ url('/') }}"
                    class="{{ request()->is('/') ? 'text-primary font-semibold' : 'text-gray-900 font-medium hover:text-primary' }} transition-colors">
                    Home
                </a>

                <!-- Shop Dropdown -->
                <div class="relative group" id="desktopShopDropdown">
                    <button class="flex items-center {{ request()->routeIs('frontend.women', 'frontend.men', 'frontend.accessories', 'frontend.footwear') ? 'text-primary font-semibold' : 'text-gray-900 font-medium hover:text-primary' }} transition-colors">
                        Shop
                        <i class="ri-arrow-down-s-line ml-1"></i>
                    </button>
                    <!-- Dropdown Content (Hover or Click) -->
                    <div class="absolute left-0 mt-2 w-48 bg-white shadow-xl rounded-lg border border-gray-100 hidden group-hover:block transition-all">
                        <a href="{{ route('frontend.women') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 rounded-t-lg">Women</a>
                        <a href="{{ route('frontend.men') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">Men</a>
                        <a href="{{ route('frontend.accessories') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">Accessories</a>
                        <a href="{{ route('frontend.footwear') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 rounded-b-lg">Footwear</a>
                    </div>
                </div>

                <a href="{{ route('frontend.new-arrivals') }}"
                    class="{{ request()->routeIs('frontend.new-arrivals') ? 'text-primary font-semibold' : 'text-gray-900 font-medium hover:text-primary' }} transition-colors">
                    New Arrivals
                </a>

                <a href="{{ route('frontend.sale') }}"
                    class="{{ request()->routeIs('frontend.sale') ? 'text-primary font-semibold' : 'text-gray-900 font-medium hover:text-primary' }} transition-colors">
                    Sale
                </a>

                <a href="{{ route('frontend.about') }}"
                    class="{{ request()->routeIs('frontend.about') ? 'text-primary font-semibold' : 'text-gray-900 font-medium hover:text-primary' }} transition-colors">
                    About
                </a>
            </nav>

            <!-- 3. Utility Icons -->
            <div class="flex items-center space-x-2 md:space-x-4">
                
                <!-- Search Icon -->
                <div class="relative">
                    <button id="searchToggle" class="w-10 h-10 flex items-center justify-center text-gray-700 hover:text-primary transition-colors">
                        <i class="ri-search-line text-xl"></i>
                    </button>
                    <!-- Search Dropdown Box -->
                    <div id="searchDropdown" class="hidden absolute right-0 mt-2 w-screen max-w-[300px] md:w-80 bg-white shadow-2xl rounded-xl p-4 border border-gray-100">
                        <div class="relative">
                            <input type="text" placeholder="Search products..."
                                class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary text-sm" />
                            <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>
                </div>

                @auth
                    <!-- Wishlist -->
                    <a href="{{ route('wishlist') }}" class="relative w-10 h-10 flex items-center justify-center text-gray-700 hover:text-rose-500 transition-colors">
                        <i class="ri-heart-line text-xl"></i>
                        <span class="absolute top-1 right-1 bg-rose-500 text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">5</span>
                    </a>

                    <!-- Cart -->
                    <div class="relative">
                        <button id="cartToggle" class="w-10 h-10 flex items-center justify-center text-gray-700 hover:text-primary transition-colors">
                            <i class="ri-shopping-bag-line text-xl"></i>
                            <span class="absolute top-1 right-1 bg-primary text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">3</span>
                        </button>
                        <!-- Cart Summary Dropdown -->
                        <div id="cartDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white shadow-2xl rounded-xl p-5 border border-gray-100">
                            <p class="text-sm text-gray-500 text-center">Cart content goes here...</p>
                        </div>
                    </div>
                @endauth

                <!-- User Account -->
 <div class="relative">
    <!-- User Icon -->
    <button id="userBtn"
        class="w-10 h-10 flex items-center justify-center text-gray-700 hover:text-primary">
        <i class="ri-user-line text-xl"></i>
    </button>

    <!-- Dropdown -->
    <div id="dropdown"
        class="hidden absolute right-0 top-full mt-2 w-56 bg-white rounded-xl shadow-lg border border-gray-100 z-50">

        @if(Auth::check())
            <div class="px-4 py-2 text-xs font-bold text-gray-400 uppercase">
                Welcome, {{ Auth::user()->first_name }}
            </div>

            <a href="{{ route('frontend.userprofile') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                My Account
            </a>

            <a href="{{ route('frontend.orders') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                Orders
            </a>

            <hr class="my-1">

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                Sign In
            </a>

            <a href="{{ route('register') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                Create Account
            </a>
        @endif
    </div>
</div>





                <!-- Mobile Menu Toggle Button -->
                <button id="mobileMenuToggle" class="lg:hidden w-10 h-10 flex items-center justify-center text-gray-700 hover:bg-gray-100 rounded-full transition-colors">
                    <i class="ri-menu-3-line text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- 4. Mobile Menu Drawer -->
    <div id="mobileMenu" class="hidden lg:hidden bg-white border-t border-gray-100 shadow-inner overflow-y-auto max-h-[calc(100vh-80px)]">
        <div class="container mx-auto px-6 py-8 space-y-6">
            <a href="{{ url('/') }}" class="block text-lg font-medium text-gray-900 border-b border-gray-50 pb-2">Home</a>
            
            <!-- Mobile Shop Submenu -->
            <div>
                <button id="mobileShopToggle" class="flex items-center justify-between w-full text-lg font-medium text-gray-900 border-b border-gray-50 pb-2">
                    Shop
                    <i class="ri-arrow-down-s-line transition-transform duration-200" id="mobileShopArrow"></i>
                </button>
                <div id="mobileShopMenu" class="hidden mt-4 ml-4 space-y-4 border-l-2 border-primary/20 pl-4">
                    <a href="{{ route('frontend.women') }}" class="block text-gray-600">Women</a>
                    <a href="{{ route('frontend.men') }}" class="block text-gray-600">Men</a>
                    <a href="{{ route('frontend.accessories') }}" class="block text-gray-600">Accessories</a>
                    <a href="{{ route('frontend.footwear') }}" class="block text-gray-600">Footwear</a>
                </div>
            </div>

            <a href="{{ route('frontend.new-arrivals') }}" class="block text-lg font-medium text-gray-900 border-b border-gray-50 pb-2">New Arrivals</a>
            <a href="{{ route('frontend.sale') }}" class="block text-lg font-medium text-rose-600 border-b border-gray-50 pb-2">Sale</a>
            <a href="{{ route('frontend.about') }}" class="block text-lg font-medium text-gray-900 border-b border-gray-50 pb-2">About</a>

            @guest
            <div class="flex flex-col gap-3 pt-4">
                <a href="{{ route('login') }}" class="w-full py-3 text-center font-semibold text-primary border border-primary rounded-xl">Login</a>
                <a href="{{ route('register') }}" class="w-full py-3 text-center font-semibold text-white bg-primary rounded-xl">Register</a>
            </div>
            @endguest
        </div>
    </div>
</header>

<!-- 5. Scripts -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Selector Helper
        const setupToggle = (btnId, menuId) => {
            const btn = document.getElementById(btnId);
            const menu = document.getElementById(menuId);
            if (!btn || !menu) return;

            btn.addEventListener("click", (e) => {
                e.stopPropagation();
                // Close other dropdowns first
                document.querySelectorAll('[id$="Dropdown"], [id="dropdown"], [id="cartDropdown"]').forEach(el => {
                    if(el !== menu) el.classList.add('hidden');
                });
                menu.classList.toggle("hidden");
            });
        };

        // Initialize Toggles
        setupToggle("searchToggle", "searchDropdown");
        setupToggle("userBtn", "dropdown");
        setupToggle("cartToggle", "cartDropdown");

        // Mobile Menu Logic
        const mobileBtn = document.getElementById("mobileMenuToggle");
        const mobileMenu = document.getElementById("mobileMenu");
        mobileBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });

        // Mobile Shop Submenu logic
        const mobileShopBtn = document.getElementById("mobileShopToggle");
        const mobileShopMenu = document.getElementById("mobileShopMenu");
        const mobileShopArrow = document.getElementById("mobileShopArrow");
        if(mobileShopBtn) {
            mobileShopBtn.addEventListener("click", () => {
                mobileShopMenu.classList.toggle("hidden");
                mobileShopArrow.classList.toggle("rotate-180");
            });
        }

        // Close all dropdowns when clicking outside
        document.addEventListener("click", (e) => {
            const dropdowns = ["searchDropdown", "dropdown", "cartDropdown"];
            dropdowns.forEach(id => {
                const menu = document.getElementById(id);
                const btn = document.getElementById(id.replace('Dropdown', 'Toggle').replace('dropdown', 'userBtn'));
                if (menu && !menu.contains(e.target) && !btn.contains(e.target)) {
                    menu.classList.add("hidden");
                }
            });
        });
    });
</script>