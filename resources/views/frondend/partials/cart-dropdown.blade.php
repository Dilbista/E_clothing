<div class="space-y-3">
    @php
        // $cartItems expected
        $cartCount = $cartItems->sum('quantity');
        $subtotal = 0;
    @endphp

    @if($cartItems->count() === 0)
        <p class="text-sm text-gray-500 text-center">Your cart is empty</p>
    @else
        <div class="flex items-center justify-between">
            <p class="text-xs font-semibold text-gray-600">Items</p>
            <p class="text-xs font-semibold text-primary">{{ $cartCount }} total</p>
        </div>

        @foreach($cartItems as $item)
            @php
                $product = $item->product;
                $unitPrice = $product->discount_price
                    ? ($product->price - $product->discount_price)
                    : $product->price;
                $lineTotal = $unitPrice * $item->quantity;
                $subtotal += $lineTotal;
            @endphp

            <div class="flex items-start gap-3 pb-3 border-b border-gray-100 last:border-b-0">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded border border-gray-100">

                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-900 line-clamp-1">{{ $product->name }}</p>
                    <p class="text-[11px] text-gray-500 mt-0.5">
                        Qty: {{ $item->quantity }}
                        @if($item->size) | Size: {{ $item->size }} @endif
                        @if($item->color) | Color: {{ $item->color }} @endif
                    </p>
                    <p class="text-sm font-bold text-primary mt-1">Rs.{{ number_format($lineTotal, 2) }}</p>
                </div>
            </div>
        @endforeach

        <div class="pt-2">
            <div class="flex justify-between text-sm text-gray-600">
                <span>Subtotal</span>
                <span class="font-semibold text-gray-900">Rs.{{ number_format($subtotal, 2) }}</span>
            </div>
            <div class="flex justify-between text-sm text-gray-600 mt-1">
                <span>Tax (8%)</span>
                <span class="font-semibold text-gray-900">Rs.{{ number_format($subtotal * 0.08, 2) }}</span>
            </div>
            <div class="flex justify-between text-base font-bold text-gray-900 mt-2 border-t border-gray-100 pt-2">
                <span>Total</span>
                <span>Rs.{{ number_format($subtotal + ($subtotal * 0.08), 2) }}</span>
            </div>
        </div>

        <div class="pt-4 flex gap-2">
            <a href="{{ route('cart') }}" class="flex-1 text-center py-2 rounded-lg bg-primary text-white text-xs font-semibold">View Cart</a>
        </div>
    @endif
</div>

