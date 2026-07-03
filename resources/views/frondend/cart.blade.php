@php
    // Calculate initial page values securely from server side
    $subtotal = 0;
    foreach($cartItems as $item) {
        $price = $item->product->discount_price ? ($item->product->price - $item->product->discount_price) : $item->product->price;
        $subtotal += $price * $item->quantity;
    }
    $tax = $subtotal * 0.08;
    $total = $subtotal + $tax;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Shopping Cart - ShopEase</title>
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
        <div id="cart-main-layout" class="grid grid-cols-1 lg:grid-cols-3 gap-8 {{ $cartItems->isEmpty() ? 'hidden' : '' }}">
            <!-- Left Side Column: Items List -->
            <div class="lg:col-span-2 space-y-4">
                <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm divide-y divide-gray-100"
                    id="cart-items-container">

                    @forelse($cartItems as $item)
                    <!-- Cart Item -->
                    <div class="cart-item flex flex-col sm:flex-row items-start sm:items-center justify-between py-6 first:pt-0 last:pb-0 gap-4"
                        data-price="{{ $item->product->discount_price ? ($item->product->price - $item->product->discount_price) : $item->product->price }}" data-cart-id="{{ $item->id }}">
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset($item->product->image) }}"
                                alt="{{ $item->product->name }}"
                                class="w-20 h-20 object-cover rounded border border-gray-100" />
                            <div>
                                <h3 class="font-bold text-gray-900 text-base">{{ $item->product->name }}</h3>
                                <p class="text-xs text-gray-500 mt-1">
                                    @if($item->size) Size: {{ $item->size }} @endif
                                    @if($item->color) @if($item->size) | @endif Color: {{ $item->color }} @endif
                                </p>
                                <p class="text-sm font-semibold text-primary mt-2">Rs.{{ number_format($item->product->discount_price ? ($item->product->price - $item->product->discount_price) : $item->product->price, 2) }}</p>
                            </div>
                        </div>

                        <!-- Quantity Selector & Subtotal Pricing -->
                        <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-8">
                            <div
                                class="flex items-center justify-between border border-gray-200 rounded-button w-28 px-3 py-1.5">
                                <button onclick="updateQty(this, -1, {{ $item->id }})"
                                    class="text-gray-400 hover:text-gray-600 font-bold focus:outline-none"><i
                                        class="ri-subtract-line"></i></button>
                                <span class="item-qty text-sm font-semibold text-gray-800">{{ $item->quantity }}</span>
                                <button onclick="updateQty(this, 1, {{ $item->id }})"
                                    class="text-gray-400 hover:text-gray-600 font-bold focus:outline-none"><i
                                        class="ri-add-line"></i></button>
                            </div>
                            <div class="text-right min-w-[80px]">
                                <p class="item-subtotal text-base font-bold text-gray-900">Rs.{{ number_format(($item->product->discount_price ? ($item->product->price - $item->product->discount_price) : $item->product->price) * $item->quantity, 2) }}</p>
                            </div>
                            <button onclick="removeCartItem(this, {{ $item->id }})"
                                class="text-gray-400 hover:text-rose-600 transition p-1">
                                <i class="ri-delete-bin-line text-lg"></i>
                            </button>
                        </div>
                    </div>
                    @empty
                    @endforelse

                </div>
            </div>

            <!-- Right Side Column: Order Checkout Summary Panel -->
            <div class="space-y-6">
                <!-- Order Pricing Breakdowns -->
                <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm space-y-4">
                    <h3 class="font-bold text-gray-900 text-lg border-b border-gray-100 pb-4">Order Summary</h3>

                    <div class="flex justify-between text-sm text-gray-600">
                        <span>Subtotal</span>
                        <span id="summary-subtotal" class="font-semibold text-gray-900">Rs.{{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>Estimated Shipping</span>
                        <span id="summary-shipping" class="font-semibold text-emerald-600">Free</span>
                    </div>
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>Estimated Tax (8%)</span>
                        <span id="summary-tax" class="font-semibold text-gray-900">Rs.{{ number_format($tax, 2) }}</span>
                    </div>

                    <div class="border-t border-gray-100 pt-4 flex justify-between text-base font-bold text-gray-900">
                        <span>Estimated Total</span>
                        <span id="summary-total">Rs.{{ number_format($total, 2) }}</span>
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

                    <!-- Updated Proceed to Checkout Button Link -->
                    <a href="{{ route('checkout') }}"
                        class="w-full py-3 mt-4 bg-primary text-white font-semibold rounded-button hover:bg-primary/90 transition flex justify-center items-center gap-2 text-center block">
                        Proceed to Checkout <i class="ri-arrow-right-line"></i>
                    </a>
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

        <!-- Empty Cart Placeholder Screen -->
        <div id="empty-cart" class="{{ $cartItems->isEmpty() ? '' : 'hidden' }} text-center py-24 max-w-sm mx-auto">
            <div class="w-16 h-16 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="ri-shopping-bag-line text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Your Shopping Cart is Empty</h3>
            <p class="text-sm text-gray-500 mb-8">Take a look at our collections to find sustainable and premium
                clothing designed to last.</p>
            <a href="{{ url('/') }}"
                class="py-3 px-6 bg-primary text-white text-xs font-semibold rounded-button hover:bg-primary/90 transition-colors">Start
                Shopping</a>
        </div>
    </main>

    <!-- Footer -->
    @include('frondend.layouts.footer')

    <!-- Interactive Javascript AJAX Logic -->
    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function updateQty(btnElement, change, cartId) {
            const container = btnElement.closest('.border-gray-200');
            const qtySpan = container.querySelector('.item-qty');
            let currentQty = parseInt(qtySpan.textContent);

            if (currentQty + change < 1) {
                return; // Do not proceed if user tries to decrease lower than 1
            }

            // Disable buttons temporarily to prevent double clicks
            const buttons = container.querySelectorAll('button');
            buttons.forEach(btn => btn.disabled = true);

            fetch('/cart/update-quantity', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    cart_id: cartId,
                    change: change
                })
            })
            .then(res => {
                if (!res.ok) throw new Error();
                return res.json();
            })
            .then(data => {
                buttons.forEach(btn => btn.disabled = false);
                if (data.success) {
                    qtySpan.textContent = data.quantity;
                    
                    // Update item row subtotal price text inside DOM
                    const itemRow = btnElement.closest('.cart-item');
                    itemRow.querySelector('.item-subtotal').textContent = 'Rs.' + parseFloat(data.item_subtotal).toFixed(2);

                    // Update main panel totals inside DOM
                    document.getElementById('summary-subtotal').textContent = 'Rs.' + parseFloat(data.subtotal).toFixed(2);
                    document.getElementById('summary-tax').textContent = 'Rs.' + parseFloat(data.tax).toFixed(2);
                    document.getElementById('summary-total').textContent = 'Rs.' + parseFloat(data.total).toFixed(2);
                }
            })
            .catch(error => {
                buttons.forEach(btn => btn.disabled = false);
                console.error('An error occurred during quantity update:', error);
            });
        }

        function removeCartItem(btnElement, cartId) {
            if (!confirm('Are you sure you want to remove this item from your cart?')) {
                return;
            }

            fetch('/cart/remove', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    cart_id: cartId
                })
            })
            .then(res => {
                if (!res.ok) throw new Error();
                return res.json();
            })
            .then(data => {
                if (data.success) {
                    // Remove item element from DOM smoothly
                    const itemRow = btnElement.closest('.cart-item');
                    itemRow.remove();

                    // Update main panel totals inside DOM
                    document.getElementById('summary-subtotal').textContent = 'Rs.' + parseFloat(data.subtotal).toFixed(2);
                    document.getElementById('summary-tax').textContent = 'Rs.' + parseFloat(data.tax).toFixed(2);
                    document.getElementById('summary-total').textContent = 'Rs.' + parseFloat(data.total).toFixed(2);

                    // Swap views if the cart becomes empty
                    if (data.isEmpty) {
                        document.getElementById('cart-main-layout').classList.add('hidden');
                        document.getElementById('empty-cart').classList.remove('hidden');
                    }
                }
            })
            .catch(error => {
                console.error('An error occurred during item removal:', error);
            });
        }
    </script>
</body>
</html>