<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success - ShopEase</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" />
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    @include('frondend.layouts.header')

    <main class="flex-grow container mx-auto px-4 py-16 flex flex-col items-center justify-center text-center">
        <div class="w-20 h-20 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mb-6">
            <i class="ri-checkbox-circle-line text-5xl"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Thank you for your order!</h1>
        <p class="text-gray-600 mb-6">Your order <span class="font-bold text-gray-900">#{{ $order->order_number }}</span> has been placed successfully.</p>
        
        <div class="bg-white border border-gray-100 rounded-lg p-6 max-w-md w-full shadow-sm text-left mb-8">
            <h3 class="font-bold text-gray-900 border-b border-gray-100 pb-3 mb-3">Order Details</h3>
            <div class="space-y-2 text-sm">
                <div class="flex justify-between"><span class="text-gray-500">Recipient:</span> <span class="font-semibold text-gray-900">{{ $order->first_name }} {{ $order->last_name }}</span></div>
                <div class="flex justify-between"><span class="text-gray-500">Contact:</span> <span class="font-semibold text-gray-900">{{ $order->phone }}</span></div>
                <div class="flex justify-between"><span class="text-gray-500">Address:</span> <span class="font-semibold text-gray-900 text-right">{{ $order->address }}, {{ $order->city }}</span></div>
                <div class="flex justify-between"><span class="text-gray-500">Payment:</span> <span class="font-semibold text-gray-900 uppercase">{{ $order->payment_method }}</span></div>
                <div class="border-t border-gray-100 pt-3 flex justify-between font-bold text-base text-gray-900">
                    <span>Total Amount:</span> <span>Rs.{{ number_format($order->total_amount, 2) }}</span>
                </div>
            </div>
        </div>

        <a href="/" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition">Continue Shopping</a>
    </main>

    @include('frondend.layouts.footer')
</body>
</html>