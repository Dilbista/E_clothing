<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart - E-Commerce Table Layout</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Remix Icon CDN for clean icons -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body class="bg-gray-50 min-h-screen py-10 px-4 md:px-6 lg:px-8">

  <!-- Main Section Wrapper -->
  <main class="max-w-6xl mx-auto font-sans text-gray-800">
    <div class="lg:grid lg:grid-cols-12 lg:gap-x-8 lg:items-start">
      
      <!-- Left Side: Table Layout (Spans 8 columns on desktop layout screens) -->
      <section class="lg:col-span-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
          <i class="ri-shopping-cart-2-line text-blue-600"></i> Shopping Cart Items
        </h2>
        
        <div class="overflow-x-auto border border-gray-200 rounded-xl shadow-sm bg-white">
          <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
              <tr>
                <th scope="col" class="px-6 py-4">Product Details</th>
                <th scope="col" class="px-6 py-4">Rate (Price)</th>
                <th scope="col" class="px-6 py-4 text-center">Quantity</th>
                <th scope="col" class="px-6 py-4 text-right">Total Price</th>
                <th scope="col" class="px-6 py-4"></th>
              </tr>
            </thead>
            
            <tbody class="divide-y divide-gray-200 text-gray-700">
              <!-- Product Item 1 -->
              <tr class="hover:bg-gray-50/50 transition-colors">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center space-x-4">
                    <img src="https://readdy.ai/api/search-image?query=minimalist%20white%20t-shirt%20on%20clean%20background%2C%20professional%20product%20photography%2C%20high%20quality%2C%20detailed%20fabric%20texture&width=80&height=80&seq=prod1&orientation=squarish" class="w-16 h-16 object-cover rounded-md border border-gray-100 shadow-inner" alt="White T-Shirt" />
                    <div>
                      <div class="font-semibold text-gray-900 text-base">Essential White T-Shirt</div>
                      <div class="text-xs text-gray-400 mt-0.5">Size: M</div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-gray-600 font-medium">$24.99</td>
                <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-gray-900">1</td>
                <td class="px-6 py-4 whitespace-nowrap text-right font-semibold text-gray-900">$24.99</td>
                <td class="px-6 py-4 whitespace-nowrap text-right">
                  <button class="text-gray-400 hover:text-red-500 transition-colors focus:outline-none">
                    <i class="ri-delete-bin-line text-lg"></i>
                  </button>
                </td>
              </tr>

              <!-- Product Item 2 -->
              <tr class="hover:bg-gray-50/50 transition-colors">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center space-x-4">
                    <img src="https://readdy.ai/api/search-image?query=minimalist%20black%20jeans%20on%20clean%20background%2C%20professional%20product%20photography%2C%20high%20quality%2C%20detailed%20fabric%20texture&width=80&height=80&seq=prod2&orientation=squarish" class="w-16 h-16 object-cover rounded-md border border-gray-100 shadow-inner" alt="Black Jeans" />
                    <div>
                      <div class="font-semibold text-gray-900 text-base">Slim Fit Black Jeans</div>
                      <div class="text-xs text-gray-400 mt-0.5">Size: 32</div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-gray-600 font-medium">$59.99</td>
                <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-gray-900">1</td>
                <td class="px-6 py-4 whitespace-nowrap text-right font-semibold text-gray-900">$59.99</td>
                <td class="px-6 py-4 whitespace-nowrap text-right">
                  <button class="text-gray-400 hover:text-red-500 transition-colors focus:outline-none">
                    <i class="ri-delete-bin-line text-lg"></i>
                  </button>
                </td>
              </tr>

              <!-- Product Item 3 -->
              <tr class="hover:bg-gray-50/50 transition-colors">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center space-x-4">
                    <img src="https://readdy.ai/api/search-image?query=minimalist%20leather%20watch%20on%20clean%20background%2C%20professional%20product%20photography%2C%20high%20quality%2C%20detailed%20texture&width=80&height=80&seq=prod3&orientation=squarish" class="w-16 h-16 object-cover rounded-md border border-gray-100 shadow-inner" alt="Watch" />
                    <div>
                      <div class="font-semibold text-gray-900 text-base">Classic Leather Watch</div>
                      <div class="text-xs text-gray-400 mt-0.5">Color: Brown</div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-gray-600 font-medium">$129.99</td>
                <td class="px-6 py-4 whitespace-nowrap text-center font-medium text-gray-900">1</td>
                <td class="px-6 py-4 whitespace-nowrap text-right font-semibold text-gray-900">$129.99</td>
                <td class="px-6 py-4 whitespace-nowrap text-right">
                  <button class="text-gray-400 hover:text-red-500 transition-colors focus:outline-none">
                    <i class="ri-delete-bin-line text-lg"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Right Side: Order Summary Card (Spans 4 columns on desktop layout screens) -->
      <aside class="mt-10 lg:mt-0 lg:col-span-4 bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
        <h3 class="text-lg font-bold text-gray-900 mb-4 pb-2 border-b border-gray-100">Order Summary</h3>
        
        <div class="space-y-4 text-sm text-gray-600">
          <div class="flex items-center justify-between">
            <span>Subtotal (3 items)</span>
            <span class="font-semibold text-gray-900">$214.97</span>
          </div>
          <div class="flex items-center justify-between">
            <span>Shipping Fee</span>
            <span class="text-green-600 font-semibold uppercase tracking-wider text-xs bg-green-50 px-2 py-0.5 rounded">Free</span>
          </div>
          <div class="flex items-center justify-between">
            <span>Tax (Estimated)</span>
            <span class="font-semibold text-gray-900">$0.00</span>
          </div>
          
          <div class="flex items-center justify-between border-t border-gray-100 pt-4 text-base font-bold text-gray-900">
            <span>Total Amount</span>
            <span class="text-xl font-extrabold text-blue-600">$214.97</span>
          </div>
        </div>

        <button class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-all shadow-sm hover:shadow active:scale-[0.99] text-sm tracking-wide focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
          Proceed to Checkout
        </button>
        
        <div class="mt-4 flex items-center justify-center gap-2 text-xs text-gray-400">
          <i class="ri-shield-check-line text-sm text-green-500"></i> Secure Checkout Guaranteed
        </div>
      </aside>

    </div>
  </main>

</body>
</html>