<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'E_Clothing || Cart')</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { primary: "#4f46e5", secondary: "#f97316" },
                    borderRadius: { button: "8px" },
                },
            },
        };

        // Live calculations logic
        function recalculateTotalSummary() {
            const cartItems = document.querySelectorAll('.cart-item');
            let subtotal = 0;

            cartItems.forEach(item => {
                const price = parseFloat(item.getAttribute('data-price'));
                const qtyElement = item.querySelector('.item-qty');
                const qty = parseInt(qtyElement.textContent);

                const itemSubtotal = price * qty;
                const itemSubtotalDisplay = item.querySelector('.item-subtotal');
                if (itemSubtotalDisplay) {
                    itemSubtotalDisplay.textContent = 'Rs.' + itemSubtotal.toLocaleString(undefined, {minimumFractionDigits: 2});
                }
                subtotal += itemSubtotal;
            });

            const subtotalDisplay = document.getElementById('summary-subtotal');
            const shippingDisplay = document.getElementById('summary-shipping');
            const taxDisplay = document.getElementById('summary-tax');
            const totalDisplay = document.getElementById('summary-total');
            const cartBadge = document.getElementById('cart-badge-count');

            if (subtotalDisplay) subtotalDisplay.textContent = 'Rs.' + subtotal.toLocaleString(undefined, {minimumFractionDigits: 2});

            // Delivery logic (Free above Rs.1000, otherwise Rs.100)
            let shippingCost = subtotal > 0 && subtotal < 1000 ? 100.00 : 0;
            if (shippingDisplay) {
                shippingDisplay.textContent = shippingCost === 0 ? (subtotal > 0 ? 'Free' : 'Rs.0.00') : 'Rs.' + shippingCost.toFixed(2);
                shippingDisplay.className = shippingCost === 0 ? "font-semibold text-emerald-600" : "font-semibold text-gray-900";
            }

            const taxVal = subtotal * 0.13; // Updated to 13% for standard VAT
            if (taxDisplay) taxDisplay.textContent = 'Rs.' + taxVal.toLocaleString(undefined, {minimumFractionDigits: 2});

            const finalTotalVal = subtotal + shippingCost + taxVal;
            if (totalDisplay) totalDisplay.textContent = 'Rs.' + finalTotalVal.toLocaleString(undefined, {minimumFractionDigits: 2});

            if (cartBadge) cartBadge.textContent = cartItems.length;

            if (cartItems.length === 0) {
                document.getElementById('cart-main-layout').classList.add('hidden');
                document.getElementById('empty-cart').classList.remove('hidden');
            }
        }

        function updateQty(btn, change) {
            const qtyDisplay = btn.parentNode.querySelector('.item-qty');
            let currentQty = parseInt(qtyDisplay.textContent);
            currentQty += change;
            if (currentQty < 1) currentQty = 1;
            qtyDisplay.textContent = currentQty;
            recalculateTotalSummary();
        }

        async function removeCartItemAjax(trashBtn, cartItemId) {
            if(!confirm('Remove this item?')) return;
            try {
                const res = await fetch("{{ route('cart.remove') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({ cart_id: cartItemId })
                });

                const data = await res.json();
                if (data.success) {
                    const itemCard = trashBtn.closest('.cart-item');
                    itemCard.classList.add('opacity-0', 'scale-90');
                    setTimeout(() => {
                        itemCard.remove();
                        recalculateTotalSummary();
                    }, 300);
                }
            } catch (e) {
                alert('Error removing item.');
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" />
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>

<body class="bg-gray-50">
    @include('frondend.layouts.header')

    <main class="container mx-auto px-4 py-10 md:py-16">
        <div class="mb-10">
            <nav class="flex text-xs text-gray-500 gap-2 mb-2">
                <a href="/" class="hover:text-primary">Home</a>
                <span>/</span>
                <span class="text-gray-900 font-semibold">Shopping Cart</span>
            </nav>
            <h1 class="text-3xl font-bold text-gray-900">Shopping Cart</h1>
        </div>

        @if($cartItems->count() > 0)
        <div id="cart-main-layout" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Items List -->
            <div class="lg:col-span-2 space-y-4">
                <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm divide-y divide-gray-100">
                    @foreach($cartItems as $item)
                        @php
                            $product = $item->product;
                            $unitPrice = $product->discount_price ? ($product->price - $product->discount_price) : $product->price;
                        @endphp
                        <div class="cart-item flex flex-col sm:flex-row items-start sm:items-center justify-between py-6 first:pt-0 last:pb-0 gap-4 transition-all duration-300"
                            data-price="{{ $unitPrice }}">

                            <div class="flex items-center space-x-4">
                                <img src="{{ asset($product->image) }}" class="w-20 h-20 object-cover rounded border" />
                                <div>
                                    <h3 class="font-bold text-gray-900">{{ $product->name }}</h3>
                                    <p class="text-xs text-gray-500">
                                        @if($item->size)Size: {{ $item->size }} @endif
                                        @if($item->color) | Color: {{ $item->color }} @endif
                                    </p>
                                    <p class="text-sm font-semibold text-primary mt-2">Rs.{{ number_format($unitPrice, 2) }}</p>
                                </div>
                            </div>

                            <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-8">
                                <div class="flex items-center border rounded-button px-3 py-1.5 gap-4">
                                    <button onclick="updateQty(this, -1)" class="text-gray-400 hover:text-primary"><i class="ri-subtract-line"></i></button>
                                    <span class="item-qty text-sm font-semibold">{{ $item->quantity }}</span>
                                    <button onclick="updateQty(this, 1)" class="text-gray-400 hover:text-primary"><i class="ri-add-line"></i></button>
                                </div>
                                <div class="text-right min-w-[100px]">
                                    <p class="item-subtotal text-base font-bold text-gray-900">Rs.{{ number_format($unitPrice * $item->quantity, 2) }}</p>
                                </div>
                                <button onclick="removeCartItemAjax(this, {{ $item->id }})" class="text-gray-400 hover:text-rose-600"><i class="ri-delete-bin-line text-lg"></i></button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Summary -->
            <div class="space-y-6">
                <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm space-y-4">
                    <h3 class="font-bold text-gray-900 text-lg border-b pb-4">Order Summary</h3>
                    
                    @php
                        $subtotal = $cartItems->sum(fn($i) => ($i->product->discount_price ? ($i->product->price - $i->product->discount_price) : $i->product->price) * $i->quantity);
                        $tax = $subtotal * 0.13;
                        $shipping = ($subtotal > 0 && $subtotal < 1000) ? 100 : 0;
                    @endphp

                    <div class="flex justify-between text-sm text-gray-600">
                        <span>Subtotal</span>
                        <span id="summary-subtotal" class="font-semibold text-gray-900">Rs.{{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>Shipping</span>
                        <span id="summary-shipping" class="{{ $shipping == 0 ? 'text-emerald-600' : 'text-gray-900' }} font-semibold">
                            {{ $shipping == 0 ? 'Free' : 'Rs.'.number_format($shipping, 2) }}
                        </span>
                    </div>
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>VAT (13%)</span>
                        <span id="summary-tax" class="font-semibold text-gray-900">Rs.{{ number_format($tax, 2) }}</span>
                    </div>
                    <div class="border-t pt-4 flex justify-between text-lg font-bold text-gray-900">
                        <span>Total</span>
                        <span id="summary-total">Rs.{{ number_format($subtotal + $tax + $shipping, 2) }}</span>
                    </div>

                    <div class="pt-4">
                        <div class="flex gap-2">
                            <input type="text" placeholder="Promo Code" class="flex-1 px-3 py-2 border rounded text-xs uppercase outline-none focus:border-primary" />
                            <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-xs font-semibold rounded">Apply</button>
                        </div>
                    </div>

                    <button class="w-full py-3 bg-primary text-white font-semibold rounded-button hover:bg-primary/90 transition flex justify-center items-center gap-2">
                       <a href="{{ route('checkout.index') }}"> Proceed to Checkout</a> <i class="ri-arrow-right-line"></i>

                    </button>
                </div>

                <div class="bg-white rounded-lg border p-6 shadow-sm text-center">
                    <p class="text-xs font-semibold text-gray-400 uppercase mb-3">Secure Checkout</p>
                    <div class="flex justify-center gap-4 grayscale opacity-70">
                        <img src="{{ asset('build/images/payments/esewa.png') }}" class="h-6">
                        <img src="{{ asset('build/images/payments/khalti.png') }}" class="h-6">
                        <img src="{{ asset('build/images/payments/fonepay.png') }}" class="h-6">
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Empty State -->
        <div id="empty-cart" class="{{ $cartItems->count() > 0 ? 'hidden' : '' }} text-center py-24 max-w-sm mx-auto">
            <div class="w-20 h-20 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="ri-shopping-cart-2-line text-3xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Your cart is empty</h3>
            <p class="text-sm text-gray-500 mb-8">Looks like you haven't added anything yet.</p>
            <a href="/" class="inline-block py-3 px-8 bg-primary text-white font-semibold rounded-button hover:bg-primary/90 transition">Start Shopping</a>
        </div>
    </main>

    @include('frondend.layouts.footer')
</body>
</html>