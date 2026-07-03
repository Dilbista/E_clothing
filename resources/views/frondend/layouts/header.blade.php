<!-- Header Wrapper -->
<header class="sticky top-0 z-50 bg-white shadow-sm font-sans">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16 md:h-20">

            <!-- 1. Logo -->
            <a href="{{ url('/') }}" class="font-['Pacifico'] text-2xl text-primary shrink-0">
                logo
            </a>

            <!-- 2. Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-8">
                <a href="{{ url('/') }}"
                    class="{{ request()->is('/') ? 'text-primary font-semibold' : 'text-gray-900 font-medium hover:text-primary' }} transition-colors">
                    Home
                </a>

                <!-- Shop Mega Dropdown -->
                <div class="relative">
                    <button id="shopBtn"
                        class="flex items-center gap-1 {{ request()->routeIs('frontend.women', 'frontend.men', 'frontend.accessories', 'frontend.footwear') ? 'text-primary font-semibold' : 'text-gray-900 font-medium hover:text-primary' }} transition-colors">
                        Shop
                        <i class="ri-arrow-down-s-line transition-transform duration-200" id="shopArrow"></i>
                    </button>

                    <!-- Mega Menu Content -->
                    <div id="shopDropdown"
                        class="hidden absolute left-1/2 -translate-x-1/2 mt-4 w-[600px] bg-white shadow-2xl rounded-2xl border border-gray-100 overflow-hidden z-50">
                        <div class="grid grid-cols-2 p-6 gap-6">
                            <!-- Category Group 1 -->
                            <div class="space-y-4">
                                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest">Fashion</h3>
                                <div class="grid gap-3">
                                    <a href="{{ route('frontend.women') }}"
                                        class="group flex items-center gap-3 p-2 rounded-xl hover:bg-gray-50 transition-all">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-pink-50 flex items-center justify-center text-pink-600 group-hover:scale-110 transition-transform">
                                            <i class="ri-women-line text-xl"></i>
                                        </div>
                                        <div>
                                            <span class="block text-sm font-semibold text-gray-900">Women</span>
                                            <span class="block text-[11px] text-gray-500">Latest feminine trends</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('frontend.men') }}"
                                        class="group flex items-center gap-3 p-2 rounded-xl hover:bg-gray-50 transition-all">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600 group-hover:scale-110 transition-transform">
                                            <i class="ri-men-line text-xl"></i>
                                        </div>
                                        <div>
                                            <span class="block text-sm font-semibold text-gray-900">Men</span>
                                            <span class="block text-[11px] text-gray-500">Classic & modern styles</span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!-- Category Group 2 -->
                            <div class="space-y-4">
                                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest">Essentials</h3>
                                <div class="grid gap-3">
                                    <a href="{{ route('frontend.accessories') }}"
                                        class="group flex items-center gap-3 p-2 rounded-xl hover:bg-gray-50 transition-all">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center text-amber-600 group-hover:scale-110 transition-transform">
                                            <i class="ri-handbag-line text-xl"></i>
                                        </div>
                                        <div>
                                            <span class="block text-sm font-semibold text-gray-900">Accessories</span>
                                            <span class="block text-[11px] text-gray-500">Bags, jewelry & more</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('frontend.footwear') }}"
                                        class="group flex items-center gap-3 p-2 rounded-xl hover:bg-gray-50 transition-all">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover:scale-110 transition-transform">
                                            <i class="ri-footprint-line text-xl"></i>
                                        </div>
                                        <div>
                                            <span class="block text-sm font-semibold text-gray-900">Footwear</span>
                                            <span class="block text-[11px] text-gray-500">Shoes for every step</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Featured Footer in Dropdown -->
                        <div class="bg-gray-50 p-4 flex justify-between items-center border-t border-gray-100 px-8">
                            <span class="text-xs text-gray-500">Discover our complete collection</span>
                            <a href="{{ route('frontend.new-arrivals') }}"
                                class="text-xs font-bold text-primary hover:underline">View All New Arrivals →</a>
                        </div>
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
                <!-- Search Button -->
                <!-- Search -->
<div class="relative">

    <!-- Search Button -->
    <button id="searchBtn"
        class="group relative w-11 h-11 flex items-center justify-center rounded-full border border-gray-200 bg-white shadow-md transition-all duration-300 hover:scale-110 hover:bg-gradient-to-r hover:from-blue-600 hover:to-indigo-600 hover:shadow-xl">

        <i
            class="ri-search-line text-xl text-gray-700 transition-all duration-300 group-hover:text-white group-hover:rotate-90"></i>

    </button>

    <!-- Search Dropdown -->
    <div id="searchDropdown"
        class="hidden absolute right-0 mt-4 w-80 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden z-50">

        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 px-5 py-4">

            <h3 class="text-white font-semibold text-lg">
                Search Products
            </h3>

            <p class="text-blue-100 text-sm">
                Find your favorite products
            </p>

        </div>

        <!-- Body -->
        <div class="p-5">

            <div class="relative">

                <i class="ri-search-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                <input
                    type="text"
                    placeholder="Search products..."
                    class="w-full pl-12 pr-12 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">

                <button
                    class="absolute right-2 top-2 w-9 h-9 rounded-lg bg-blue-600 hover:bg-blue-700 text-white transition">

                    <i class="ri-arrow-right-line"></i>

                </button>

            </div>

            <!-- Popular -->
            <div class="mt-5">

                <p class="text-xs uppercase text-gray-400 font-semibold mb-3">
                    Popular Searches
                </p>

                <div class="flex flex-wrap gap-2">

                    <span class="px-3 py-1 rounded-full bg-gray-100 hover:bg-blue-600 hover:text-white cursor-pointer transition">
                        Shoes
                    </span>

                    <span class="px-3 py-1 rounded-full bg-gray-100 hover:bg-blue-600 hover:text-white cursor-pointer transition">
                        T-Shirt
                    </span>

                    <span class="px-3 py-1 rounded-full bg-gray-100 hover:bg-blue-600 hover:text-white cursor-pointer transition">
                        Watch
                    </span>

                    <span class="px-3 py-1 rounded-full bg-gray-100 hover:bg-blue-600 hover:text-white cursor-pointer transition">
                        Jacket
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

<style>
#searchDropdown{
    animation:searchAnimation .35s ease;
}

@keyframes searchAnimation{

    from{
        opacity:0;
        transform:translateY(-15px) scale(.98);
    }

    to{
        opacity:1;
        transform:translateY(0) scale(1);
    }

}
</style>


                @auth
                    <!-- Wishlist -->
                    <a href="{{ route('wishlist') }}"
                        class="relative w-10 h-10 flex items-center justify-center text-gray-700 hover:text-primary">
                        <i class="ri-heart-line text-xl"></i>
                        @php
                            $count = \App\Models\Wishlist::where('user_id', auth()->id())->count();
                        @endphp
                        <span
                            id="wishlist-badge"
                            class="absolute top-1 right-1 bg-rose-500 text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center {{ $count > 0 ? '' : 'hidden' }}">
                            {{ $count }}
                        </span>
                    </a>

                    <!-- Cart -->
                    <div class="relative">
                        <button id="cartBtn"
                            class="w-10 h-10 flex items-center justify-center text-gray-700 hover:text-primary">
                            <i class="ri-shopping-bag-line text-xl"></i>
                            <span
                                id="cart-badge-count"
                                class="absolute top-1 right-1 bg-primary text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">0</span>

                        </button>
<div id="cartDropdown"
                            class="hidden absolute right-0 mt-2 w-80 max-h-[70vh] overflow-y-auto bg-white shadow-2xl rounded-xl p-5 border border-gray-100 z-50">
                            @include('frondend.partials.cart-dropdown', ['cartItems' => collect()])
                        </div>
                    </div>
                @endauth

                <!-- User Account -->
               <div class="flex items-center space-x-3">

    @guest

        <div class="flex items-center gap-4">

    <!-- Login Button -->
    <a href="{{ route('login') }}"
        class="group relative overflow-hidden px-6 py-2.5 rounded-full border-2 border-blue-600 text-blue-600 font-semibold transition-all duration-500 hover:text-white hover:shadow-xl hover:shadow-blue-500/30 hover:scale-105">

        <span class="absolute inset-0 w-0 bg-gradient-to-r from-blue-600 to-indigo-600 transition-all duration-500 ease-out group-hover:w-full"></span>

        <span class="relative z-10 flex items-center gap-2">
            <i class="ri-login-circle-line text-lg transition-transform duration-300 group-hover:translate-x-1"></i>
            Login
        </span>

    </a>

    <!-- Register Button -->
    <a href="{{ route('register') }}"
        class="group relative overflow-hidden px-6 py-2.5 rounded-full bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 text-white font-semibold shadow-lg shadow-blue-500/30 transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-indigo-500/40">

        <span class="absolute inset-0 bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>

        <span class="relative z-10 flex items-center gap-2">
            <i class="ri-user-add-line text-lg transition-transform duration-300 group-hover:rotate-12"></i>
            Register
        </span>

    </a>

</div>

    @endguest


    @auth

        <div class="relative">

            <!-- Profile Button -->
            <button id="profileButton"
                class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 transition">

                <!-- Profile Circle -->
                <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-lg">

                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                </div>

                <!-- Name -->
                <div class="hidden md:block text-left">

                    <h5 class="text-sm font-semibold text-gray-800">
                        {{ Auth::user()->name }}
                    </h5>

                    <p class="text-xs text-gray-500">
                        My Account
                    </p>

                </div>

                <i class="ri-arrow-down-s-line text-xl"></i>

            </button>

            <!-- Dropdown -->
            <div id="profileDropdown"
                class="hidden absolute right-0 mt-3 w-64 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden z-50">

                <!-- Header -->
                <div class="bg-gray-50 px-5 py-4">

                    <div class="flex items-center gap-3">

                        <div class="w-12 h-12 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-lg">

                            {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                        </div>

                        <div>

                            <h4 class="font-semibold">

                                {{ Auth::user()->name }}

                            </h4>

                            <p class="text-sm text-gray-500">

                                {{ Auth::user()->email }}

                            </p>

                        </div>

                    </div>

                </div>

                <!-- Menu -->

                <a href="{{ route('frontend.userprofile') }}"
                    class="flex items-center px-5 py-3 hover:bg-gray-100">

                    <i class="ri-user-line mr-3"></i>

                    My Profile

                </a>

                <a href="{{ route('frontend.orders') }}"
                    class="flex items-center px-5 py-3 hover:bg-gray-100">

                    <i class="ri-shopping-bag-line mr-3"></i>

                    My Orders

                </a>

                

              

                <hr>

                <!-- Logout -->

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="w-full text-left px-5 py-3 text-red-600 hover:bg-red-50">

                        <i class="ri-logout-circle-r-line mr-2"></i>

                        Logout

                    </button>

                </form>

            </div>

        </div>

    @endauth

</div>

<!-- Dropdown Script -->
<script>

document.addEventListener('DOMContentLoaded', function () {

    const profileButton = document.getElementById('profileButton');
    const profileDropdown = document.getElementById('profileDropdown');

    if(profileButton){

        profileButton.addEventListener('click', function(e){

            e.stopPropagation();

            profileDropdown.classList.toggle('hidden');

        });

        document.addEventListener('click', function(){

            profileDropdown.classList.add('hidden');

        });

        profileDropdown.addEventListener('click', function(e){

            e.stopPropagation();

        });

    }

});

</script>

                <button id="mobileMenuToggle"
                    class="lg:hidden w-10 h-10 flex items-center justify-center text-gray-700 hover:bg-gray-100 rounded-full">
                    <i class="ri-menu-3-line text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- 4. Mobile Menu Drawer -->
    <div id="mobileMenu"
        class="hidden lg:hidden bg-white border-t border-gray-100 shadow-inner overflow-y-auto max-h-[calc(100vh-80px)]">
        <div class="container mx-auto px-6 py-8 space-y-6">
            <a href="{{ url('/') }}"
                class="block text-lg font-medium text-gray-900 border-b border-gray-50 pb-2">Home</a>

            <!-- Mobile Shop Categories -->
            <div>
                <button id="mobileShopToggle"
                    class="flex items-center justify-between w-full text-lg font-medium text-gray-900 border-b border-gray-50 pb-2">
                    Shop Categories
                    <i class="ri-arrow-down-s-line transition-transform duration-200" id="mobileShopArrow"></i>
                </button>
                <div id="mobileShopMenu" class="hidden mt-4 ml-4 space-y-4 border-l-2 border-primary/20 pl-4">
                    <a href="{{ route('frontend.women') }}" class="flex items-center gap-2 text-gray-600"><i
                            class="ri-women-line"></i> Women</a>
                    <a href="{{ route('frontend.men') }}" class="flex items-center gap-2 text-gray-600"><i
                            class="ri-men-line"></i> Men</a>
                    <a href="{{ route('frontend.accessories') }}" class="flex items-center gap-2 text-gray-600"><i
                            class="ri-handbag-line"></i> Accessories</a>
                    <a href="{{ route('frontend.footwear') }}" class="flex items-center gap-2 text-gray-600"><i
                            class="ri-footprint-line"></i> Footwear</a>
                </div>
            </div>

            <a href="{{ route('frontend.new-arrivals') }}"
                class="block text-lg font-medium text-gray-900 border-b border-gray-50 pb-2">New Arrivals</a>
            <a href="{{ route('frontend.sale') }}"
                class="block text-lg font-medium text-rose-600 border-b border-gray-50 pb-2">Sale</a>
            <a href="{{ route('frontend.about') }}"
                class="block text-lg font-medium text-gray-900 border-b border-gray-50 pb-2">About</a>
        </div>
    </div>
</header>

<!-- 5. Improved Scripts -->
<script>
    // Global Add-to-Cart for product hover/cart buttons
    async function addToCartGlobal(productId) {
        try {
            const res = await fetch("{{ route('cart.add') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: 1,
                    size: null,
                    color: null
                })
            });

            const data = await res.json();

            const badge = document.getElementById('cart-badge-count');
            if (badge && typeof data.cart_count === 'number') {
                badge.textContent = data.cart_count;
                badge.classList.toggle('hidden', data.cart_count === 0);
            }

            // Refresh cart dropdown list immediately (so cart content updates without page reload)
            try {
                const dropdown = document.getElementById('cartDropdown');
                if (dropdown) {
                    const res2 = await fetch("{{ route('cart.dropdown') }}", {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    });
                    if (res2.ok) {
                        dropdown.innerHTML = await res2.text();
                        // also ensure cart badge stays in sync after dropdown refresh
                        const text = dropdown.innerText || '';
                        const match = text.match(/(\d+)\s*total/i);
                        if (match && badge) {
                            badge.textContent = match[1];
                            badge.classList.toggle('hidden', match[1] === '0');
                        }
                    }
                }
            } catch (e2) {
                console.error(e2);
            }
        } catch (e) {
            console.error(e);
            alert('Unable to add to cart.');
        }
    }

    document.addEventListener("DOMContentLoaded", async () => {

        // Load cart dropdown content
        async function loadCartDropdown() {
            const dropdown = document.getElementById('cartDropdown');
            const badge = document.getElementById('cart-badge-count');
            if (!dropdown) return;

            try {
                const res = await fetch("{{ route('cart.dropdown') }}", {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                if (!res.ok) throw new Error('Failed to load cart dropdown');

                const html = await res.text();
                dropdown.innerHTML = html;

                // update badge count from rendered dropdown (simple fallback)
                if (badge) {
                    const text = dropdown.innerText || '';
                    const match = text.match(/(\d+)\s*total/i);
                    // ignore if not matched; you still get correct dropdown list
                    if (match) badge.textContent = match[1];
                }
            } catch (e) {
                console.error(e);
            }
        }

        await loadCartDropdown();

        // Toggle Logic for all dropdowns
        const dropMap = [
            { btn: 'shopBtn', menu: 'shopDropdown', arrow: 'shopArrow' },
            { btn: 'searchBtn', menu: 'searchDropdown' },
            { btn: 'userBtn', menu: 'userDropdown' },
            { btn: 'cartBtn', menu: 'cartDropdown' }
        ];

        dropMap.forEach(item => {
            const btn = document.getElementById(item.btn);
            const menu = document.getElementById(item.menu);
            const arrow = item.arrow ? document.getElementById(item.arrow) : null;

            if (btn && menu) {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    // Close others
                    dropMap.forEach(other => {
                        if (other.menu !== item.menu) {
                            document.getElementById(other.menu)?.classList.add('hidden');
                            if (other.arrow) document.getElementById(other.arrow)?.classList.remove('rotate-180');
                        }
                    });
                    // Toggle current
                    const isHidden = menu.classList.toggle('hidden');
                    if (arrow) arrow.classList.toggle('rotate-180', !isHidden);
                });
            }
        });

        // Close when clicking outside
        document.addEventListener('click', (e) => {
            dropMap.forEach(item => {
                const menu = document.getElementById(item.menu);
                const btn = document.getElementById(item.btn);
                if (menu && !menu.contains(e.target) && !btn.contains(e.target)) {
                    menu.classList.add('hidden');
                    if (item.arrow) document.getElementById(item.arrow)?.classList.remove('rotate-180');
                }
            });
        });

        // Mobile Menu
        const mbToggle = document.getElementById("mobileMenuToggle");
        const mbMenu = document.getElementById("mobileMenu");
        if (mbToggle) mbToggle.onclick = () => mbMenu.classList.toggle("hidden");

        const mbShopToggle = document.getElementById("mobileShopToggle");
        const mbShopMenu = document.getElementById("mobileShopMenu");
        const mbShopArrow = document.getElementById("mobileShopArrow");
        if (mbShopToggle) {
            mbShopToggle.onclick = () => {
                mbShopMenu.classList.toggle("hidden");
                mbShopArrow.classList.toggle("rotate-180");
            };
        }
    });

    // Robust cart dropdown toggle (works even if header is rendered later)
    document.addEventListener('click', function (e) {
        const cartBtn = document.getElementById('cartBtn');
        const cartDropdown = document.getElementById('cartDropdown');
        if (!cartBtn || !cartDropdown) return;

        const clickedCartButton = cartBtn.contains(e.target);
        const clickedInsideDropdown = cartDropdown.contains(e.target);

        if (clickedCartButton) {
            e.stopPropagation();
            cartDropdown.classList.toggle('hidden');
            return;
        }

        if (!clickedInsideDropdown) {
            cartDropdown.classList.add('hidden');
        }
    });
</script>
