<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout - ShopEase</title>
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
                        button: "8px",
                    },
                },
            },
        };
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
                <a href="/" class="hover:text-primary transition">Home</a>
                <span>/</span>
                <span class="text-gray-900 font-semibold">Checkout</span>
            </nav>
            <h1 class="text-3xl font-bold text-gray-900">Checkout</h1>
        </div>

        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-md">{{ session('error') }}</div>
        @endif

        <form action="{{ route('checkout.place') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Shipping Address Details -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Shipping Details</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">First Name *</label>
                                <input type="text" name="first_name" required value="{{ old('first_name') }}"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-md focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                @error('first_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Last Name *</label>
                                <input type="text" name="last_name" required value="{{ old('last_name') }}"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-md focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                @error('last_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                                <input type="email" name="email" required value="{{ old('email', auth()->user()->email ?? '') }}"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-md focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number *</label>
                                <input type="text" name="phone" required value="{{ old('phone') }}"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-md focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Shipping Address *</label>
                            <input type="text" name="address" required value="{{ old('address') }}" placeholder="Street details, Landmark, Ward No."
                                class="w-full px-4 py-2 border border-gray-200 rounded-md focus:ring-2 focus:ring-primary/20 focus:border-primary">
                            @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">City *</label>
                            <input type="text" name="city" required value="{{ old('city') }}"
                                class="w-full px-4 py-2 border border-gray-200 rounded-md focus:ring-2 focus:ring-primary/20 focus:border-primary">
                            @error('city') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Payment Methods Gateway Section -->
                    <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Select Payment Method</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Cash On Delivery Option -->
                            <label class="relative flex items-center p-4 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                                <input type="radio" name="payment_method" value="cod" class="mr-3" checked>
                                <div>
                                    <p class="font-bold text-sm text-gray-900">Cash on Delivery (COD)</p>
                                    <p class="text-xs text-gray-500">Pay inside Nepal when delivered</p>
                                </div>
                            </label>

                            <!-- eSewa Option -->
                            <label class="relative flex items-center p-4 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 justify-between">
                                <div class="flex items-center">
                                    <input type="radio" name="payment_method" value="esewa" class="mr-3">
                                    <div>
                                        <p class="font-bold text-sm text-gray-900">eSewa</p>
                                        <p class="text-xs text-gray-500">Fast digital transfer</p>
                                    </div>
                                </div>
                                <img src="{{ asset('build/images/payments/esewa.png') }}" class="h-6 object-contain" alt="eSewa">
                            </label>

                            <!-- Khalti Option -->
                            <label class="relative flex items-center p-4 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 justify-between">
                                <div class="flex items-center">
                                    <input type="radio" name="payment_method" value="khalti" class="mr-3">
                                    <div>
                                        <p class="font-bold text-sm text-gray-900">Khalti</p>
                                        <p class="text-xs text-gray-500">Pay via Khalti SDK</p>
                                    </div>
                                </div>
                                <img src="{{ asset('build/images/payments/khalti.png') }}" class="h-6 object-contain" alt="Khalti">
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Right Side Panel: Checkout summary -->
                <div class="space-y-6">
                    <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm space-y-4">
                        <h3 class="font-bold text-gray-900 text-lg border-b border-gray-100 pb-4">Order Summary</h3>

                        <div class="max-h-60 overflow-y-auto space-y-4 divide-y divide-gray-100 pr-2">
                            @foreach($cartItems as $item)
                            <div class="flex items-center justify-between pt-4 first:pt-0">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset($item->product->image) }}" class="w-12 h-12 object-cover rounded border border-gray-100" />
                                    <div>
                                        <h4 class="text-xs font-semibold text-gray-800 line-clamp-1">{{ $item->product->name }}</h4>
                                        <p class="text-[10px] text-gray-400">Qty: {{ $item->quantity }} @if($item->size) | Size: {{ $item->size }} @endif</p>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-gray-900">
                                    Rs.{{ number_format(($item->product->discount_price ? ($item->product->price - $item->product->discount_price) : $item->product->price) * $item->quantity, 2) }}
                                </span>
                            </div>
                            @endforeach
                        </div>

                        <div class="border-t border-gray-100 pt-4 space-y-2">
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>Subtotal</span>
                                <span class="font-semibold text-gray-900">Rs.{{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>Shipping</span>
                                <span class="font-semibold text-emerald-600">{{ $shipping == 0 ? 'Free' : 'Rs.' . number_format($shipping, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>Tax (8%)</span>
                                <span class="font-semibold text-gray-900">Rs.{{ number_format($tax, 2) }}</span>
                            </div>
                            <div class="border-t border-gray-100 pt-3 flex justify-between text-base font-bold text-gray-900">
                                <span>Total Amount</span>
                                <span>Rs.{{ number_format($total, 2) }}</span>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full py-3 bg-primary text-white font-semibold rounded-button hover:bg-primary/90 transition flex justify-center items-center gap-2">
                            Place Order <i class="ri-check-line"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </main>

    @include('frondend.layouts.footer')
</body>
</html>