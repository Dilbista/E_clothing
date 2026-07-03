<!-- Header Wrapper -->
<header class="sticky top-0 z-50 bg-white shadow-sm font-sans">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16 md:h-20">

            <!-- 1. Logo -->
            <a href="{{ url('/') }}" class="shrink-0">
                <img src="{{ asset('build/images/logo.png') }}"
                    alt="Logo"
                    class="h-16 w-auto">
            </a>

            <!-- 2. Desktop Navigation (Hidden on Mobile) -->
            <nav class="hidden lg:flex items-center space-x-8">
                <a href="{{ url('/') }}"
                    class="{{ request()->is('/') ? 'text-primary font-semibold' : 'text-gray-900 font-medium hover:text-primary' }} transition-colors">
                    Home
                </a>

                <!-- Shop Dropdown -->
                <div class="relative group inline-block " style="padding-bottom: -0.25rem;">
                    <button
                        class="flex items-center {{ request()->routeIs('frontend.women', 'frontend.men', 'frontend.accessories', 'frontend.footwear') ? 'text-primary font-semibold' : 'text-gray-900 font-medium hover:text-primary' }}">
                        Shop
                        <i class="ri-arrow-down-s-line ml-1"></i>
                    </button>

                    <div
                        class="absolute left-0 top-full w-48 bg-white shadow-lg rounded-lg border border-gray-100 hidden group-hover:block z-50">

                        <a href="{{ route('frontend.women') }}"
                            class="block px-4 py-3 text-sm rounded-t-lg transition-colors
        {{ request()->routeIs('frontend.women') ? 'bg-primary text-white font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-primary' }}">
                            Women
                        </a>

                        <a href="{{ route('frontend.men') }}"
                            class="block px-4 py-3 text-sm transition-colors
        {{ request()->routeIs('frontend.men') ? 'bg-primary text-white font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-primary' }}">
                            Men
                        </a>

                        <a href="{{ route('frontend.accessories') }}"
                            class="block px-4 py-3 text-sm transition-colors
        {{ request()->routeIs('frontend.accessories') ? 'bg-primary text-white font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-primary' }}">
                            Accessories
                        </a>

                        <a href="{{ route('frontend.footwear') }}"
                            class="block px-4 py-3 text-sm rounded-b-lg transition-colors
        {{ request()->routeIs('frontend.footwear') ? 'bg-primary text-white font-semibold' : 'text-gray-700 hover:bg-gray-100 hover:text-primary' }}">
                            Footwear
                        </a>

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
                <!-- Wishlist
                <a href="{{ route('wishlist.index') }}" class="relative w-10 h-10 flex items-center justify-center text-gray-700 hover:text-rose-500 transition-colors">
                    <i class="ri-heart-line text-xl"></i>
                    <span class="absolute top-1 right-1 bg-rose-500 text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">{{ \App\Models\Wishlist::where('user_id', auth()->id())->count() }}</span>
                </a> -->

                <!-- Wishlist -->
                <a href="{{ route('wishlist.index') }}"
                    class="relative w-10 h-10 flex items-center justify-center text-gray-700 hover:text-rose-500 transition-colors">

                    <i class="ri-heart-line text-xl"></i>

                    <span id="wishlist-count"
                        class="absolute top-1 right-1 bg-rose-500 text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">
                        {{ auth()->check() ? \App\Models\Wishlist::where('user_id', auth()->id())->count() : 0 }}
                    </span>

                </a>

                <!-- Cart -->
                <div class="relative">
                    <button id="cartToggle" class="w-10 h-10 flex items-center justify-center text-gray-700 hover:text-primary transition-colors">
                        <i class="ri-shopping-bag-line text-xl"></i>
                        <span id="cart-badge-count-header" class="absolute top-1 right-1 bg-primary text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">
                            {{ $cartCount ?? 0 }}
                        </span>
                    </button>
                    <!-- Cart Summary Dropdown -->
                    <div id="cartDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white shadow-2xl rounded-xl p-5 border border-gray-100 z-50">
                        <h3 class="font-medium text-gray-900 mb-3">Your Cart (<span id="cart-dropdown-count">{{ $cartCount ?? 0 }}</span>)</h3>
                        @if(isset($cartItems) && $cartItems->count() > 0)
                        <div class="space-y-3 max-h-80 overflow-y-auto mb-4" id="cart-dropdown-items">
                            @foreach($cartItems as $item)
                            <div class="flex items-center space-x-3 cart-dropdown-item" data-id="{{ $item->id }}">
                                <img src="{{ asset($item->product->image) }}"
                                    alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded" />
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium line-clamp-1">{{ $item->product->name }}</h4>
                                    <p class="text-xs text-gray-500">
                                        @if($item->size) Size: {{ $item->size }} @endif
                                        @if($item->color) | Color: {{ $item->color }} @endif
                                        | Qty: <span class="dropdown-item-qty">{{ $item->quantity }}</span>
                                    </p>
                                    <p class="text-sm font-medium text-primary">Rs.{{ number_format($item->product->price - ($item->product->discount_price ?? 0), 2) }}</p>
                                </div>
                                <button onclick="removeCartItemFromDropdown(this.closest('.cart-dropdown-item').dataset.id)" class="text-gray-400 hover:text-rose-600 transition">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100" id="cart-dropdown-footer">
                            <div class="flex justify-between mb-3">
                                <span class="text-sm text-gray-600">Subtotal</span>
                                @php
                                $subtotal = $cartItems->sum(function($item) {
                                return ($item->product->price - ($item->product->discount_price ?? 0)) * $item->quantity;
                                });
                                @endphp
                                <span class="text-sm font-medium" id="cart-dropdown-subtotal">Rs.{{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="space-y-2">
                                <a href="{{ route('cart') }}"
                                    class="block w-full py-2 px-4 bg-primary text-white text-center font-medium rounded-button hover:bg-primary/90 transition-colors whitespace-nowrap">View Cart</a>
                            </div>
                        </div>
                        @else
                        <div id="cart-dropdown-empty" class="text-center py-6">
                            <p class="text-sm text-gray-500">Your cart is empty.</p>
                        </div>
                        @endif
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
            <a href="#" class="block text-lg font-medium text-gray-900 border-b border-gray-50 pb-2">About</a>

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
                    if (el !== menu) el.classList.add('hidden');
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
        if (mobileShopBtn) {
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

    // Global Cart JS Helper Functions
    function removeCartItemFromDropdown(itemId) {
        fetch(`/cart/remove/${itemId}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "Accept": "application/json"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update badge counts on all pages
                    const badges = document.querySelectorAll('#cart-badge-count-header, #cart-dropdown-count, #cart-badge-count');
                    badges.forEach(badge => {
                        if (badge) badge.textContent = data.cart_count;
                    });

                    // Remove the dropdown element
                    const itemEl = document.querySelector(`.cart-dropdown-item[data-id="${itemId}"]`);
                    if (itemEl) {
                        itemEl.remove();
                    }

                    recalculateDropdownSubtotal();

                    // Check if dropdown is now empty
                    const dropdownItems = document.querySelectorAll('.cart-dropdown-item');
                    if (dropdownItems.length === 0) {
                        const dropdownItemsContainer = document.getElementById('cart-dropdown-items');
                        const dropdownFooter = document.getElementById('cart-dropdown-footer');
                        if (dropdownItemsContainer) dropdownItemsContainer.remove();
                        if (dropdownFooter) dropdownFooter.remove();

                        const dropdownCart = document.getElementById('cartDropdown');
                        if (dropdownCart) {
                            const h3 = dropdownCart.querySelector('h3');
                            if (h3) h3.outerHTML = `<h3 class="font-medium text-gray-900 mb-3">Your Cart (0)</h3>`;

                            let emptyDiv = document.getElementById('cart-dropdown-empty');
                            if (!emptyDiv) {
                                emptyDiv = document.createElement('div');
                                emptyDiv.id = 'cart-dropdown-empty';
                                emptyDiv.className = 'text-center py-6';
                                emptyDiv.innerHTML = '<p class="text-sm text-gray-500">Your cart is empty.</p>';
                                dropdownCart.appendChild(emptyDiv);
                            }
                        }
                    }

                    // If on the Cart Page, also sync changes with the cart table/cards
                    const mainCartItem = document.querySelector(`.cart-item[data-cart-id="${itemId}"]`);
                    if (mainCartItem) {
                        mainCartItem.remove();
                        if (typeof recalculateTotalSummary === 'function') {
                            recalculateTotalSummary();
                        }
                    }
                }
            });
    }

    function recalculateDropdownSubtotal() {
        const items = document.querySelectorAll('.cart-dropdown-item');
        let subtotal = 0;
        items.forEach(item => {
            const priceText = item.querySelector('.text-sm.font-medium, .text-primary').textContent.replace('Rs.', '').replace(/,/g, '');
            const qtyText = item.querySelector('.dropdown-item-qty').textContent;
            subtotal += parseFloat(priceText) * parseInt(qtyText);
        });
        const subtotalEl = document.getElementById('cart-dropdown-subtotal');
        if (subtotalEl) {
            subtotalEl.textContent = 'Rs.' + subtotal.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }
    }

    // Global Add To Cart handler
    function addToCartGlobal(productId, quantity = 1, size = null, color = null) {
        if (!window.__userLoggedIn) {
            // Trigger auth modal (handled by footer auth interceptor)
            if (typeof openAuthModal === 'function') {
                openAuthModal();
            } else {
                window.location.href = "{{ route('login') }}";
            }
            return;
        }

        fetch("{{ route('cart.add') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity,
                    size: size,
                    color: color
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update badge count
                    const badges = document.querySelectorAll('#cart-badge-count-header, #cart-dropdown-count, #cart-badge-count');
                    badges.forEach(badge => {
                        if (badge) badge.textContent = data.cart_count;
                    });

                    // Show a modern notification or dynamic feedback
                    alertToast(data.message, 'success');

                    // Reload the page to refresh the cart dropdown list OR let user see updated list on page refresh
                    // But wait! Page reload can be avoided if we just fetch the dropdown again or simply reload.
                    // Simple page reload ensures the Blade views recreate the exact cart state. Let's do that for maximum simplicity/correctness,
                    // or we can reload after a small delay.
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    alertToast(data.message || 'Something went wrong', 'error');
                }
            })
            .catch(err => {
                console.error(err);
                alertToast('Failed to add product to cart', 'error');
            });
    }

    // Simple customized toast function
    function alertToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `fixed bottom-5 right-5 z-50 px-6 py-3 rounded-xl shadow-2xl text-white font-medium transition-all duration-300 transform translate-y-10 opacity-0 ${
            type === 'success' ? 'bg-emerald-600' : 'bg-rose-600'
        }`;
        toast.innerHTML = `<div class="flex items-center gap-2">
            <i class="${type === 'success' ? 'ri-checkbox-circle-line' : 'ri-error-warning-line'} text-lg"></i>
            <span>${message}</span>
        </div>`;
        document.body.appendChild(toast);

        // Trigger enter animation
        requestAnimationFrame(() => {
            toast.classList.remove('translate-y-10', 'opacity-0');
        });

        // Exit animation
        setTimeout(() => {
            toast.classList.add('translate-y-10', 'opacity-0');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 3000);
    }

    // Remove Wishlist Item dynamically
    function removeWishlistItem(deleteBtn, wishlistId) {
        fetch(`/wishlist/remove/${wishlistId}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "Accept": "application/json"
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    const card = deleteBtn.closest('.group');
                    if (card) {
                        card.classList.add('transition-all', 'duration-300', 'scale-90', 'opacity-0');
                        setTimeout(() => {
                            card.remove();
                            const remainingCards = document.querySelectorAll('#wishlist-grid > .group');

                            // Update badge
                            const countBadge = document.getElementById('wishlist-count');
                            if (countBadge) countBadge.textContent = remainingCards.length;

                            // Show empty placeholder if empty
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
                    alertToast('Item removed from wishlist', 'success');
                } else {
                    alertToast('Failed to remove item', 'error');
                }
            })
            .catch(err => {
                console.error(err);
                alertToast('Failed to remove item', 'error');
            });
    }

    // Global Wishlist Event Listener
    document.addEventListener('DOMContentLoaded', () => {
        document.body.addEventListener('click', function(e) {
            const btn = e.target.closest('.add-to-wishlist-btn');
            if (btn) {
                e.preventDefault();

                // Block if not logged in
                if (!window.__userLoggedIn) {
                    if (typeof openAuthModal === 'function') openAuthModal();
                    return;
                }

                const productId = btn.dataset.productId;
                if (!productId) return;

                const icon = btn.querySelector('i');

                fetch("{{ route('wishlist.add') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                            "Accept": "application/json"
                        },
                        body: JSON.stringify({
                            product_id: productId
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            if (data.status === 'added') {
                                if (icon) {
                                    icon.classList.remove('ri-heart-line');
                                    icon.classList.add('ri-heart-fill', 'text-rose-500');
                                }
                                btn.classList.add('wishlisted', 'animate-heart-highlight');
                                alertToast(data.message, 'success');
                            } else if (data.status === 'removed') {
                                if (icon) {
                                    icon.classList.remove('ri-heart-fill', 'text-rose-500');
                                    icon.classList.add('ri-heart-line');
                                }
                                btn.classList.remove('wishlisted', 'animate-heart-highlight');
                                alertToast(data.message, 'success');
                            }

                            const wishlistBadge = document.getElementById('wishlist-count');
                            if (wishlistBadge) {
                                wishlistBadge.textContent = data.wishlist_count;
                            }
                        } else {
                            alertToast(data.message || 'Error updating wishlist', 'error');
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alertToast('Failed to update wishlist', 'error');
                    });
            }
        });
    });
</script>