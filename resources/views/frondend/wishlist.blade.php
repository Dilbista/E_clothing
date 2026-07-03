<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Ensure CSRF Token is present for AJAX calls -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    @include('frondend.layouts.header')

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
                You have <span id="wishlist-count" class="text-primary font-bold">{{ $wishlistItems->count() }}</span> items saved
            </p>
        </div>

        <!-- Wishlist Grid System -->
        <div id="wishlist-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 {{ $wishlistItems->isEmpty() ? 'hidden' : '' }}">
            
            @foreach($wishlistItems as $item)
            <!-- Wishlist Card -->
            <div class="group relative bg-white border border-gray-100 rounded-lg overflow-hidden p-3 shadow-sm hover:shadow transition duration-300">
                <!-- Delete Button overlay -->
                <button onclick="removeWishlistItem(this, {{ $item->id }})"
                    class="absolute top-6 right-6 z-10 w-8 h-8 rounded-full bg-white text-gray-400 hover:text-rose-600 border border-gray-100 flex items-center justify-center shadow-sm transition">
                    <i class="ri-close-line text-lg"></i>
                </button>

                <div class="relative overflow-hidden rounded-lg mb-4 aspect-[4/5]">
                    @if($item->product->stock > 0)
                        <span class="absolute top-3 left-3 bg-emerald-500 text-white text-[10px] font-bold px-2.5 py-1 rounded">In Stock</span>
                    @else
                        <span class="absolute top-3 left-3 bg-red-500 text-white text-[10px] font-bold px-2.5 py-1 rounded">Out of Stock</span>
                    @endif
                    
                    <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                </div>
                <div class="px-1 space-y-2">
                    <h3 class="font-bold text-gray-900 text-sm truncate">{{ $item->product->name }}</h3>
                    <p class="text-gray-900 font-bold text-sm">Rs.{{ number_format($item->product->price, 2) }}</p>

                    <!-- Quick transfer to cart button -->
                    <button type="button" onclick="addWishlistToCart({{ $item->product->id }})" class="w-full py-2.5 mt-2 bg-primary text-white text-xs font-semibold rounded-button hover:bg-primary/90 transition flex justify-center items-center gap-2">
                        <i class="ri-shopping-bag-line"></i> Add to Cart
                    </button>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Empty Wishlist Placeholder Screen -->
        <div id="empty-wishlist" class="{{ $wishlistItems->isEmpty() ? '' : 'hidden' }} text-center py-24 max-w-sm mx-auto">
            <div class="w-16 h-16 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="ri-heart-line text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Your Wishlist is Empty</h3>
            <p class="text-sm text-gray-500 mb-8">Save items that you like to your personal wishlist so you can buy them later easily.</p>
            <a href="/" class="py-3 px-6 bg-primary text-white text-xs font-semibold rounded-button hover:bg-primary/90 transition-colors">Start Shopping</a>
        </div>
    </main>

    <!-- Footer -->
    @include('frondend.layouts.footer')

    <!-- Scripts -->
    <script>
        function addWishlistToCart(productId) {
            fetch("{{ route('cart.add') }}", {
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
            })
            .then(r => r.json())
            .then(data => {
                // Update navbar cart badge (best-effort)
                const badge = document.getElementById('cart-badge-count');
                if (badge && typeof data.cart_count === 'number') {
                    badge.textContent = data.cart_count;
                    badge.classList.toggle('hidden', data.cart_count === 0);
                }
                // Do not navigate; just update cart badge (prevents navbar dropdown flicker)
                // location.href = "{{ route('cart') }}";
            })
            .catch(() => alert('Unable to add to cart.'));
        }

        function removeWishlistItem(btn, wishlistItemId) {
            fetch("{{ route('wishlist.destroy', ['id' => '__ID__']) }}".replace('__ID__', wishlistItemId), {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "Accept": "application/json"
                }
            })
            .then(r => r.json())
            .then(data => {
                if (data.status === 'success') {
                    // Remove card from UI
                    const card = btn.closest('.group');
                    if (card) card.remove();

                    // Update navbar wishlist badge (best-effort)
                    const badge = document.getElementById('wishlist-badge');
                    if (badge) {
                        const grid = document.getElementById('wishlist-grid');
                        const remaining = grid ? grid.querySelectorAll('.group').length : 0;
                        badge.textContent = remaining;
                        badge.classList.toggle('hidden', remaining === 0);
                    }

                    // If none left, show empty state
                    const grid = document.getElementById('wishlist-grid');
                    const empty = document.getElementById('empty-wishlist');
                    const remaining = grid ? grid.querySelectorAll('.group').length : 0;
                    if (remaining === 0) {
                        if (grid) grid.classList.add('hidden');
                        if (empty) empty.classList.remove('hidden');
                    }
                }
            })
            .catch(() => alert('Unable to remove from wishlist.'));
        }
    </script>
</body>

</html>
