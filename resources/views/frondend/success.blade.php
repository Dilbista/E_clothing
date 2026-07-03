
@section('content')

<div class="max-w-2xl mx-auto py-20 px-4">
    <div class="bg-white rounded-xl shadow-lg p-10 text-center">

        <div class="text-green-600 text-6xl mb-4">
            <i class="ri-checkbox-circle-fill"></i>
        </div>

        <h1 class="text-3xl font-bold text-gray-800 mb-3">
            Order Placed Successfully!
        </h1>

        <p class="text-gray-600 mb-8">
            Thank you for shopping with us.
            Your order has been placed successfully.
        </p>

        <a href="{{ route('home') }}"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg transition px-8 py-3">
            Continue Shopping
        </a>

    </div>
</div>

