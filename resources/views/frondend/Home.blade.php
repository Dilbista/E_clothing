<!DOCTYPE html>
<html lang="en">
@include('frondend.navbar')

<body class="bg-white">

  @include('frondend.header')
  <!-- Hero Section -->

  @include('frondend.HeroSection')
  <!-- Categories Section -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold text-center mb-12">Shop by Category</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <a href="#" class="group">
          <div class="relative overflow-hidden rounded-lg aspect-[3/4]">
            <img
              src="https://readdy.ai/api/search-image?query=elegant%20womens%20clothing%20collection%2C%20minimal%20background%2C%20professional%20fashion%20photography%2C%20soft%20lighting%2C%20high-end%20apparel%20displayed%20neatly&width=400&height=500&seq=cat1&orientation=portrait"
              alt="Women's Collection"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
            <div class="absolute inset-0 bg-black/20 flex items-end p-6">
              <div>
                <h3 class="text-xl font-semibold text-white mb-1">Women</h3>
                <p class="text-white/80 text-sm">View Collection</p>
              </div>
            </div>
          </div>
        </a>
        <a href="#" class="group">
          <div class="relative overflow-hidden rounded-lg aspect-[3/4]">
            <img
              src="https://readdy.ai/api/search-image?query=stylish%20mens%20clothing%20collection%2C%20minimal%20background%2C%20professional%20fashion%20photography%2C%20soft%20lighting%2C%20high-end%20apparel%20displayed%20neatly&width=400&height=500&seq=cat2&orientation=portrait"
              alt="Men's Collection"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
            <div class="absolute inset-0 bg-black/20 flex items-end p-6">
              <div>
                <h3 class="text-xl font-semibold text-white mb-1">Men</h3>
                <p class="text-white/80 text-sm">View Collection</p>
              </div>
            </div>
          </div>
        </a>
        <a href="#" class="group">
          <div class="relative overflow-hidden rounded-lg aspect-[3/4]">
            <img
              src="https://readdy.ai/api/search-image?query=premium%20accessories%20collection%20including%20bags%2C%20jewelry%2C%20watches%2C%20minimal%20background%2C%20professional%20product%20photography%2C%20soft%20lighting%2C%20high-end%20items%20displayed%20neatly&width=400&height=500&seq=cat3&orientation=portrait"
              alt="Accessories Collection"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
            <div class="absolute inset-0 bg-black/20 flex items-end p-6">
              <div>
                <h3 class="text-xl font-semibold text-white mb-1">
                  Accessories
                </h3>
                <p class="text-white/80 text-sm">View Collection</p>
              </div>
            </div>
          </div>
        </a>
        <a href="#" class="group">
          <div class="relative overflow-hidden rounded-lg aspect-[3/4]">
            <img
              src="https://readdy.ai/api/search-image?query=luxury%20footwear%20collection%20including%20shoes%2C%20boots%2C%20sneakers%2C%20minimal%20background%2C%20professional%20product%20photography%2C%20soft%20lighting%2C%20high-end%20items%20displayed%20neatly&width=400&height=500&seq=cat4&orientation=portrait"
              alt="Footwear Collection"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
            <div class="absolute inset-0 bg-black/20 flex items-end p-6">
              <div>
                <h3 class="text-xl font-semibold text-white mb-1">
                  Footwear
                </h3>
                <p class="text-white/80 text-sm">View Collection</p>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- Featured Products -->
  <section class="py-16">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center mb-12">
        <h2 class="text-3xl font-bold">Featured Products</h2>
        

        <div class="flex space-x-1 px-1 py-1 bg-gray-100 rounded-full" id="filterTabs">

          <button
            class="tab px-4 py-1.5 bg-white text-gray-800 rounded-full shadow-sm text-sm font-medium whitespace-nowrap active">
            All
          </button>

          <button
            class="tab px-4 py-1.5 text-gray-600 rounded-full text-sm font-medium hover:bg-white hover:shadow-sm transition whitespace-nowrap">
            New Arrivals
          </button>

          <button
            class="tab px-4 py-1.5 text-gray-600 rounded-full text-sm font-medium hover:bg-white hover:shadow-sm transition whitespace-nowrap">
            Best Sellers
          </button>

        </div>

      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Product 1 -->
        <div class="group">
          <div class="relative overflow-hidden rounded-lg mb-4">
            <span class="absolute top-3 left-3 bg-primary text-white text-xs px-2 py-1 rounded">New</span>
            <img
              src="https://readdy.ai/api/search-image?query=elegant%20white%20blouse%20on%20minimal%20light%20background%2C%20professional%20fashion%20photography%2C%20high%20quality%20product%20image%2C%20detailed%20fabric%20texture&width=500&height=600&seq=prod4&orientation=portrait"
              alt="White Blouse" class="w-full h-80 object-cover object-top" />
            <div
              class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-eye-line"></i>
              </button>
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-heart-line"></i>
              </button>
              <button
                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                <i class="ri-shopping-bag-line"></i>
              </button>
            </div>
          </div>
          <div>
            <h3 class="font-medium text-gray-900 mb-1">
              Elegant White Blouse
            </h3>
            <div class="flex items-center mb-1">
              <div class="flex text-amber-400 text-sm">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-half-fill"></i>
              </div>
              <span class="text-xs text-gray-500 ml-1">(42)</span>
            </div>
            <p class="text-gray-900 font-medium">$49.99</p>
          </div>
        </div>
        <script>
          const tabs = document.querySelectorAll(".tab");

          tabs.forEach(tab => {
            tab.addEventListener("click", () => {

              // remove active from all
              tabs.forEach(t => {
                t.classList.remove("bg-white", "text-gray-800", "shadow-sm", "active");
                t.classList.add("text-gray-600");
              });

              // add active to clicked
              tab.classList.add("bg-white", "text-gray-800", "shadow-sm", "active");
              tab.classList.remove("text-gray-600");

            });
          });
        </script>
        <!-- Product 2 -->
        <div class="group">
          <div class="relative overflow-hidden rounded-lg mb-4">
            <span class="absolute top-3 left-3 bg-amber-500 text-white text-xs px-2 py-1 rounded">Best Seller</span>
            <img
              src="https://readdy.ai/api/search-image?query=premium%20denim%20jeans%20on%20minimal%20light%20background%2C%20professional%20fashion%20photography%2C%20high%20quality%20product%20image%2C%20detailed%20fabric%20texture&width=500&height=600&seq=prod5&orientation=portrait"
              alt="Denim Jeans" class="w-full h-80 object-cover object-top" />
            <div
              class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-eye-line"></i>
              </button>
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-heart-line"></i>
              </button>
              <button
                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                <i class="ri-shopping-bag-line"></i>
              </button>
            </div>
          </div>
          <div>
            <h3 class="font-medium text-gray-900 mb-1">
              Premium Denim Jeans
            </h3>
            <div class="flex items-center mb-1">
              <div class="flex text-amber-400 text-sm">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
              </div>
              <span class="text-xs text-gray-500 ml-1">(128)</span>
            </div>
            <p class="text-gray-900 font-medium">$79.99</p>
          </div>
        </div>

        <!-- Product 3 -->
        <div class="group">
          <div class="relative overflow-hidden rounded-lg mb-4">
            <img
              src="https://readdy.ai/api/search-image?query=stylish%20leather%20jacket%20on%20minimal%20light%20background%2C%20professional%20fashion%20photography%2C%20high%20quality%20product%20image%2C%20detailed%20leather%20texture&width=500&height=600&seq=prod6&orientation=portrait"
              alt="Leather Jacket" class="w-full h-80 object-cover object-top" />
            <div
              class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-eye-line"></i>
              </button>
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-heart-line"></i>
              </button>
              <button
                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                <i class="ri-shopping-bag-line"></i>
              </button>
            </div>
          </div>
          <div>
            <h3 class="font-medium text-gray-900 mb-1">
              Classic Leather Jacket
            </h3>
            <div class="flex items-center mb-1">
              <div class="flex text-amber-400 text-sm">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-line"></i>
              </div>
              <span class="text-xs text-gray-500 ml-1">(76)</span>
            </div>
            <p class="text-gray-900 font-medium">$199.99</p>
          </div>
        </div>

        <!-- Product 4 -->
        <div class="group">
          <div class="relative overflow-hidden rounded-lg mb-4">
            <span class="absolute top-3 left-3 bg-rose-500 text-white text-xs px-2 py-1 rounded">Sale</span>
            <img
              src="https://readdy.ai/api/search-image?query=elegant%20summer%20dress%20on%20minimal%20light%20background%2C%20professional%20fashion%20photography%2C%20high%20quality%20product%20image%2C%20detailed%20fabric%20texture&width=500&height=600&seq=prod7&orientation=portrait"
              alt="Summer Dress" class="w-full h-80 object-cover object-top" />
            <div
              class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-eye-line"></i>
              </button>
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-heart-line"></i>
              </button>
              <button
                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                <i class="ri-shopping-bag-line"></i>
              </button>
            </div>
          </div>
          <div>
            <h3 class="font-medium text-gray-900 mb-1">
              Floral Summer Dress
            </h3>
            <div class="flex items-center mb-1">
              <div class="flex text-amber-400 text-sm">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-half-fill"></i>
              </div>
              <span class="text-xs text-gray-500 ml-1">(54)</span>
            </div>
            <div class="flex items-center">
              <p class="text-gray-900 font-medium">$59.99</p>
              <p class="text-gray-500 line-through text-sm ml-2">$79.99</p>
            </div>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Product 1 -->
        <div class="group">
          <div class="relative overflow-hidden rounded-lg mb-4">
            <span class="absolute top-3 left-3 bg-primary text-white text-xs px-2 py-1 rounded">New</span>
            <img
              src="https://readdy.ai/api/search-image?query=elegant%20white%20blouse%20on%20minimal%20light%20background%2C%20professional%20fashion%20photography%2C%20high%20quality%20product%20image%2C%20detailed%20fabric%20texture&width=500&height=600&seq=prod4&orientation=portrait"
              alt="White Blouse" class="w-full h-80 object-cover object-top" />
            <div
              class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-eye-line"></i>
              </button>
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-heart-line"></i>
              </button>
              <button
                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                <i class="ri-shopping-bag-line"></i>
              </button>
            </div>
          </div>
          <div>
            <h3 class="font-medium text-gray-900 mb-1">
              Elegant White Blouse
            </h3>
            <div class="flex items-center mb-1">
              <div class="flex text-amber-400 text-sm">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-half-fill"></i>
              </div>
              <span class="text-xs text-gray-500 ml-1">(42)</span>
            </div>
            <p class="text-gray-900 font-medium">$49.99</p>
          </div>
        </div>
        <script>
          const tabs = document.querySelectorAll(".tab");

          tabs.forEach(tab => {
            tab.addEventListener("click", () => {

              // remove active from all
              tabs.forEach(t => {
                t.classList.remove("bg-white", "text-gray-800", "shadow-sm", "active");
                t.classList.add("text-gray-600");
              });

              // add active to clicked
              tab.classList.add("bg-white", "text-gray-800", "shadow-sm", "active");
              tab.classList.remove("text-gray-600");

            });
          });
        </script>
        <!-- Product 2 -->
        <div class="group">
          <div class="relative overflow-hidden rounded-lg mb-4">
            <span class="absolute top-3 left-3 bg-amber-500 text-white text-xs px-2 py-1 rounded">Best Seller</span>
            <img
              src="https://readdy.ai/api/search-image?query=premium%20denim%20jeans%20on%20minimal%20light%20background%2C%20professional%20fashion%20photography%2C%20high%20quality%20product%20image%2C%20detailed%20fabric%20texture&width=500&height=600&seq=prod5&orientation=portrait"
              alt="Denim Jeans" class="w-full h-80 object-cover object-top" />
            <div
              class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-eye-line"></i>
              </button>
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-heart-line"></i>
              </button>
              <button
                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                <i class="ri-shopping-bag-line"></i>
              </button>
            </div>
          </div>
          <div>
            <h3 class="font-medium text-gray-900 mb-1">
              Premium Denim Jeans
            </h3>
            <div class="flex items-center mb-1">
              <div class="flex text-amber-400 text-sm">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
              </div>
              <span class="text-xs text-gray-500 ml-1">(128)</span>
            </div>
            <p class="text-gray-900 font-medium">$79.99</p>
          </div>
        </div>

        <!-- Product 3 -->
        <div class="group">
          <div class="relative overflow-hidden rounded-lg mb-4">
            <img
              src="https://readdy.ai/api/search-image?query=stylish%20leather%20jacket%20on%20minimal%20light%20background%2C%20professional%20fashion%20photography%2C%20high%20quality%20product%20image%2C%20detailed%20leather%20texture&width=500&height=600&seq=prod6&orientation=portrait"
              alt="Leather Jacket" class="w-full h-80 object-cover object-top" />
            <div
              class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-eye-line"></i>
              </button>
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-heart-line"></i>
              </button>
              <button
                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                <i class="ri-shopping-bag-line"></i>
              </button>
            </div>
          </div>
          <div>
            <h3 class="font-medium text-gray-900 mb-1">
              Classic Leather Jacket
            </h3>
            <div class="flex items-center mb-1">
              <div class="flex text-amber-400 text-sm">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-line"></i>
              </div>
              <span class="text-xs text-gray-500 ml-1">(76)</span>
            </div>
            <p class="text-gray-900 font-medium">$199.99</p>
          </div>
        </div>

        <!-- Product 4 -->
        <div class="group">
          <div class="relative overflow-hidden rounded-lg mb-4">
            <span class="absolute top-3 left-3 bg-rose-500 text-white text-xs px-2 py-1 rounded">Sale</span>
            <img
              src="https://readdy.ai/api/search-image?query=elegant%20summer%20dress%20on%20minimal%20light%20background%2C%20professional%20fashion%20photography%2C%20high%20quality%20product%20image%2C%20detailed%20fabric%20texture&width=500&height=600&seq=prod7&orientation=portrait"
              alt="Summer Dress" class="w-full h-80 object-cover object-top" />
            <div
              class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-eye-line"></i>
              </button>
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-heart-line"></i>
              </button>
              <button
                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                <i class="ri-shopping-bag-line"></i>
              </button>
            </div>
          </div>
          <div>
            <h3 class="font-medium text-gray-900 mb-1">
              Floral Summer Dress
            </h3>
            <div class="flex items-center mb-1">
              <div class="flex text-amber-400 text-sm">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-half-fill"></i>
              </div>
              <span class="text-xs text-gray-500 ml-1">(54)</span>
            </div>
            <div class="flex items-center">
              <p class="text-gray-900 font-medium">$59.99</p>
              <p class="text-gray-500 line-through text-sm ml-2">$79.99</p>
            </div>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Product 1 -->
        <div class="group">
          <div class="relative overflow-hidden rounded-lg mb-4">
            <span class="absolute top-3 left-3 bg-primary text-white text-xs px-2 py-1 rounded">New</span>
            <img
              src="https://readdy.ai/api/search-image?query=elegant%20white%20blouse%20on%20minimal%20light%20background%2C%20professional%20fashion%20photography%2C%20high%20quality%20product%20image%2C%20detailed%20fabric%20texture&width=500&height=600&seq=prod4&orientation=portrait"
              alt="White Blouse" class="w-full h-80 object-cover object-top" />
            <div
              class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-eye-line"></i>
              </button>
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-heart-line"></i>
              </button>
              <button
                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                <i class="ri-shopping-bag-line"></i>
              </button>
            </div>
          </div>
          <div>
            <h3 class="font-medium text-gray-900 mb-1">
              Elegant White Blouse
            </h3>
            <div class="flex items-center mb-1">
              <div class="flex text-amber-400 text-sm">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-half-fill"></i>
              </div>
              <span class="text-xs text-gray-500 ml-1">(42)</span>
            </div>
            <p class="text-gray-900 font-medium">$49.99</p>
          </div>
        </div>
        <script>
          const tabs = document.querySelectorAll(".tab");

          tabs.forEach(tab => {
            tab.addEventListener("click", () => {

              // remove active from all
              tabs.forEach(t => {
                t.classList.remove("bg-white", "text-gray-800", "shadow-sm", "active");
                t.classList.add("text-gray-600");
              });

              // add active to clicked
              tab.classList.add("bg-white", "text-gray-800", "shadow-sm", "active");
              tab.classList.remove("text-gray-600");

            });
          });
        </script>
        <!-- Product 2 -->
        <div class="group">
          <div class="relative overflow-hidden rounded-lg mb-4">
            <span class="absolute top-3 left-3 bg-amber-500 text-white text-xs px-2 py-1 rounded">Best Seller</span>
            <img
              src="https://readdy.ai/api/search-image?query=premium%20denim%20jeans%20on%20minimal%20light%20background%2C%20professional%20fashion%20photography%2C%20high%20quality%20product%20image%2C%20detailed%20fabric%20texture&width=500&height=600&seq=prod5&orientation=portrait"
              alt="Denim Jeans" class="w-full h-80 object-cover object-top" />
            <div
              class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-eye-line"></i>
              </button>
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-heart-line"></i>
              </button>
              <button
                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                <i class="ri-shopping-bag-line"></i>
              </button>
            </div>
          </div>
          <div>
            <h3 class="font-medium text-gray-900 mb-1">
              Premium Denim Jeans
            </h3>
            <div class="flex items-center mb-1">
              <div class="flex text-amber-400 text-sm">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
              </div>
              <span class="text-xs text-gray-500 ml-1">(128)</span>
            </div>
            <p class="text-gray-900 font-medium">$79.99</p>
          </div>
        </div>

        <!-- Product 3 -->
        <div class="group">
          <div class="relative overflow-hidden rounded-lg mb-4">
            <img
              src="https://readdy.ai/api/search-image?query=stylish%20leather%20jacket%20on%20minimal%20light%20background%2C%20professional%20fashion%20photography%2C%20high%20quality%20product%20image%2C%20detailed%20leather%20texture&width=500&height=600&seq=prod6&orientation=portrait"
              alt="Leather Jacket" class="w-full h-80 object-cover object-top" />
            <div
              class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-eye-line"></i>
              </button>
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-heart-line"></i>
              </button>
              <button
                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                <i class="ri-shopping-bag-line"></i>
              </button>
            </div>
          </div>
          <div>
            <h3 class="font-medium text-gray-900 mb-1">
              Classic Leather Jacket
            </h3>
            <div class="flex items-center mb-1">
              <div class="flex text-amber-400 text-sm">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-line"></i>
              </div>
              <span class="text-xs text-gray-500 ml-1">(76)</span>
            </div>
            <p class="text-gray-900 font-medium">$199.99</p>
          </div>
        </div>

        <!-- Product 4 -->
        <div class="group">
          <div class="relative overflow-hidden rounded-lg mb-4">
            <span class="absolute top-3 left-3 bg-rose-500 text-white text-xs px-2 py-1 rounded">Sale</span>
            <img
              src="https://readdy.ai/api/search-image?query=elegant%20summer%20dress%20on%20minimal%20light%20background%2C%20professional%20fashion%20photography%2C%20high%20quality%20product%20image%2C%20detailed%20fabric%20texture&width=500&height=600&seq=prod7&orientation=portrait"
              alt="Summer Dress" class="w-full h-80 object-cover object-top" />
            <div
              class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-eye-line"></i>
              </button>
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-heart-line"></i>
              </button>
              <button
                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                <i class="ri-shopping-bag-line"></i>
              </button>
            </div>
          </div>
          <div>
            <h3 class="font-medium text-gray-900 mb-1">
              Floral Summer Dress
            </h3>
            <div class="flex items-center mb-1">
              <div class="flex text-amber-400 text-sm">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-half-fill"></i>
              </div>
              <span class="text-xs text-gray-500 ml-1">(54)</span>
            </div>
            <div class="flex items-center">
              <p class="text-gray-900 font-medium">$59.99</p>
              <p class="text-gray-500 line-through text-sm ml-2">$79.99</p>
            </div>
          </div>
        </div>
      </div>

      <nav aria-label="Page navigation" class="mt-5">
  <ul class="pagination justify-content-center">

   

    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">4</a></li>
    <li class="page-item"><a class="page-link" href="#">5</a></li>
    <li class="page-item"><a class="page-link" href="#">6</a></li>

    

  </ul>
</nav>
    </div>
  </section>

  <!-- Special Offer Banner -->
  <section class="py-16 bg-gray-900 text-white">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-8 md:mb-0">
          <h2 class="text-3xl md:text-4xl font-bold mb-4">Summer Sale</h2>
          <p class="text-xl text-gray-300 mb-6">
            Up to 50% off on selected items. Limited time offer.
          </p>
          <div class="flex gap-4 mb-8">
            <div class="bg-white/10 rounded-lg p-4 text-center">
              <span class="block text-3xl font-bold">00</span>
              <span class="text-sm text-gray-300">Days</span>
            </div>
            <div class="bg-white/10 rounded-lg p-4 text-center">
              <span class="block text-3xl font-bold">12</span>
              <span class="text-sm text-gray-300">Hours</span>
            </div>
            <div class="bg-white/10 rounded-lg p-4 text-center">
              <span class="block text-3xl font-bold">45</span>
              <span class="text-sm text-gray-300">Minutes</span>
            </div>
            <div class="bg-white/10 rounded-lg p-4 text-center">
              <span class="block text-3xl font-bold">30</span>
              <span class="text-sm text-gray-300">Seconds</span>
            </div>
          </div>
          <a href="#"
            class="inline-block py-3 px-8 bg-white text-gray-900 font-medium rounded-button hover:bg-gray-100 transition-colors whitespace-nowrap">Shop
            the Sale</a>
        </div>
        <div class="md:w-1/2">
          <img
            src="https://readdy.ai/api/search-image?query=stylish%20summer%20clothing%20collection%20with%20discount%20tags%2C%20professional%20fashion%20photography%2C%20multiple%20items%20arranged%20elegantly%2C%20high-end%20apparel%20on%20minimal%20background&width=600&height=400&seq=sale1&orientation=landscape"
            alt="Summer Sale" class="rounded-lg w-full" />
        </div>
      </div>
    </div>
  </section>

  <!-- New Arrivals -->
  <section class="py-16">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold text-center mb-12">New Arrivals</h2>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Product 1 -->
        <div class="group">
          <div class="relative overflow-hidden rounded-lg mb-4">
            <span class="absolute top-3 left-3 bg-primary text-white text-xs px-2 py-1 rounded">New</span>
            <img
              src="https://readdy.ai/api/search-image?query=elegant%20silk%20scarf%20on%20minimal%20light%20background%2C%20professional%20fashion%20photography%2C%20high%20quality%20product%20image%2C%20detailed%20fabric%20texture&width=500&height=600&seq=prod8&orientation=portrait"
              alt="Silk Scarf" class="w-full h-80 object-cover object-top" />
            <div
              class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-eye-line"></i>
              </button>
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-heart-line"></i>
              </button>
              <button
                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                <i class="ri-shopping-bag-line"></i>
              </button>
            </div>
          </div>
          <div>
            <h3 class="font-medium text-gray-900 mb-1">Luxury Silk Scarf</h3>
            <div class="flex items-center mb-1">
              <div class="flex text-amber-400 text-sm">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-line"></i>
              </div>
              <span class="text-xs text-gray-500 ml-1">(12)</span>
            </div>
            <p class="text-gray-900 font-medium">$39.99</p>
          </div>
        </div>

        <!-- Product 2 -->
        <div class="group">
          <div class="relative overflow-hidden rounded-lg mb-4">
            <span class="absolute top-3 left-3 bg-primary text-white text-xs px-2 py-1 rounded">New</span>
            <img
              src="https://readdy.ai/api/search-image?query=premium%20leather%20handbag%20on%20minimal%20light%20background%2C%20professional%20fashion%20photography%2C%20high%20quality%20product%20image%2C%20detailed%20leather%20texture&width=500&height=600&seq=prod9&orientation=portrait"
              alt="Leather Handbag" class="w-full h-80 object-cover object-top" />
            <div
              class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-eye-line"></i>
              </button>
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-heart-line"></i>
              </button>
              <button
                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                <i class="ri-shopping-bag-line"></i>
              </button>
            </div>
          </div>
          <div>
            <h3 class="font-medium text-gray-900 mb-1">
              Designer Leather Handbag
            </h3>
            <div class="flex items-center mb-1">
              <div class="flex text-amber-400 text-sm">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-half-fill"></i>
              </div>
              <span class="text-xs text-gray-500 ml-1">(8)</span>
            </div>
            <p class="text-gray-900 font-medium">$149.99</p>
          </div>
        </div>

        <!-- Product 3 -->
        <div class="group">
          <div class="relative overflow-hidden rounded-lg mb-4">
            <span class="absolute top-3 left-3 bg-primary text-white text-xs px-2 py-1 rounded">New</span>
            <img
              src="https://readdy.ai/api/search-image?query=stylish%20sunglasses%20on%20minimal%20light%20background%2C%20professional%20product%20photography%2C%20high%20quality%20image%2C%20detailed%20texture&width=500&height=600&seq=prod10&orientation=portrait"
              alt="Sunglasses" class="w-full h-80 object-cover object-top" />
            <div
              class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-eye-line"></i>
              </button>
              <button
                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-gray-100 transition">
                <i class="ri-heart-line"></i>
              </button>
              <button
                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md mx-1 hover:bg-primary/90 transition">
                <i class="ri-shopping-bag-line"></i>
              </button>
            </div>
          </div>
          <div>
            <h3 class="font-medium text-gray-900 mb-1">Premium Sunglasses</h3>
            <div class="flex items-center mb-1">
              <div class="flex text-amber-400 text-sm">
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-fill"></i>
                <i class="ri-star-line"></i>
              </div>
              <span class="text-xs text-gray-500 ml-1">(6)</span>
            </div>
            <p class="text-gray-900 font-medium">$89.99</p>
          </div>
        </div>
      </div>

      <div class="text-center mt-12">
        <a href="#"
          class="inline-block py-3 px-8 border border-gray-300 text-gray-800 font-medium rounded-button hover:bg-gray-50 transition-colors whitespace-nowrap">View
          All New Arrivals</a>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold text-center mb-12">
        What Our Customers Say
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Testimonial 1 -->
        <div class="bg-white p-6 rounded-lg shadow-sm">
          <div class="flex text-amber-400 mb-4">
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
          </div>
          <p class="text-gray-700 mb-6">
            "The quality of the clothes is exceptional. I've ordered multiple
            times and have never been disappointed. The customer service is
            also top-notch!"
          </p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 mr-4">
              <i class="ri-user-3-line text-xl"></i>
            </div>
            <div>
              <h4 class="font-medium text-gray-900">Emily Richardson</h4>
              <p class="text-sm text-gray-500">Loyal Customer</p>
            </div>
          </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="bg-white p-6 rounded-lg shadow-sm">
          <div class="flex text-amber-400 mb-4">
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-half-fill"></i>
          </div>
          <p class="text-gray-700 mb-6">
            "Fast shipping and the products look exactly like the pictures.
            The sizing guide was very helpful. Will definitely shop here
            again!"
          </p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 mr-4">
              <i class="ri-user-3-line text-xl"></i>
            </div>
            <div>
              <h4 class="font-medium text-gray-900">Michael Thompson</h4>
              <p class="text-sm text-gray-500">Verified Buyer</p>
            </div>
          </div>
        </div>

        <!-- Testimonial 3 -->
        <div class="bg-white p-6 rounded-lg shadow-sm">
          <div class="flex text-amber-400 mb-4">
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
            <i class="ri-star-fill"></i>
          </div>
          <p class="text-gray-700 mb-6">
            "I love the sustainable approach this brand takes. The packaging
            is eco-friendly and the clothes are made from high-quality,
            sustainable materials."
          </p>
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 mr-4">
              <i class="ri-user-3-line text-xl"></i>
            </div>
            <div>
              <h4 class="font-medium text-gray-900">Sophia Martinez</h4>
              <p class="text-sm text-gray-500">Repeat Customer</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Instagram Feed -->
  <section class="py-16">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold text-center mb-4">
        Follow Us on Instagram
      </h2>
      <p class="text-gray-600 text-center mb-12">@shopease_official</p>

      <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
        <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
          <img
            src="https://readdy.ai/api/search-image?query=fashion%20lifestyle%20image%2C%20person%20wearing%20stylish%20outfit%20in%20urban%20setting%2C%20natural%20lighting%2C%20candid%20pose%2C%20high%20quality&width=300&height=300&seq=insta1&orientation=squarish"
            alt="Instagram Post"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
        </a>
        <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
          <img
            src="https://readdy.ai/api/search-image?query=close-up%20of%20fashion%20accessories%20arrangement%2C%20minimal%20aesthetic%2C%20soft%20lighting%2C%20high%20quality%20product%20photography&width=300&height=300&seq=insta2&orientation=squarish"
            alt="Instagram Post"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
        </a>
        <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
          <img
            src="https://readdy.ai/api/search-image?query=person%20wearing%20elegant%20outfit%20in%20cafe%20setting%2C%20lifestyle%20fashion%20photography%2C%20soft%20natural%20lighting%2C%20candid%20moment&width=300&height=300&seq=insta3&orientation=squarish"
            alt="Instagram Post"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
        </a>
        <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
          <img
            src="https://readdy.ai/api/search-image?query=flatlay%20of%20fashion%20items%20including%20clothing%20and%20accessories%2C%20minimal%20aesthetic%2C%20soft%20lighting%2C%20high%20quality%20product%20photography&width=300&height=300&seq=insta4&orientation=squarish"
            alt="Instagram Post"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
        </a>
        <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
          <img
            src="https://readdy.ai/api/search-image?query=person%20wearing%20casual%20outfit%20in%20urban%20setting%2C%20lifestyle%20fashion%20photography%2C%20natural%20lighting%2C%20candid%20pose&width=300&height=300&seq=insta5&orientation=squarish"
            alt="Instagram Post"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
        </a>
        <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
          <img
            src="https://readdy.ai/api/search-image?query=close-up%20of%20shoes%20and%20accessories%2C%20minimal%20aesthetic%2C%20soft%20lighting%2C%20high%20quality%20product%20photography&width=300&height=300&seq=insta6&orientation=squarish"
            alt="Instagram Post"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
        </a>
      </div>
    </div>
  </section>

  <!-- Newsletter -->
  <section class="py-16 bg-gray-900 text-white">
    <div class="container mx-auto px-4">
      <div class="max-w-2xl mx-auto text-center">
        <h2 class="text-3xl font-bold mb-4">Subscribe to Our Newsletter</h2>
        <p class="text-gray-300 mb-8">
          Stay updated with our latest collections, exclusive offers, and
          style tips.
        </p>
        <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
          <input type="email" placeholder="Your email address"
            class="flex-1 px-4 py-3 rounded-button border-none text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary/20" />
          <button type="submit"
            class="px-6 py-3 bg-primary text-white font-medium rounded-button hover:bg-primary/90 transition-colors whitespace-nowrap">
            Subscribe
          </button>
        </form>
        <p class="text-sm text-gray-400 mt-4">
          By subscribing, you agree to our Privacy Policy and consent to
          receive updates from our company.
        </p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white border-t border-gray-100 pt-16 pb-8">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
        <!-- Column 1: About -->
        <div class="lg:col-span-2">
          <a href="#" class="font-['Pacifico'] text-2xl text-primary inline-block mb-4">logo</a>
          <p class="text-gray-600 mb-6 max-w-md">
            We offer premium quality clothing and accessories for men and
            women. Our mission is to provide sustainable fashion that lasts.
          </p>
          <div class="flex space-x-4">
            <a href="#"
              class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
              <i class="ri-facebook-fill"></i>
            </a>
            <a href="#"
              class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
              <i class="ri-instagram-line"></i>
            </a>
            <a href="#"
              class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
              <i class="ri-twitter-x-line"></i>
            </a>
            <a href="#"
              class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-colors">
              <i class="ri-pinterest-line"></i>
            </a>
          </div>
        </div>

        <!-- Column 2: Shop -->
        <div>
          <h3 class="text-gray-900 font-semibold mb-4">Shop</h3>
          <ul class="space-y-3">
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">Women</a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">Men</a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">Accessories</a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">Footwear</a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">New Arrivals</a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">Sale</a>
            </li>
          </ul>
        </div>

        <!-- Column 3: Help -->
        <div>
          <h3 class="text-gray-900 font-semibold mb-4">Help</h3>
          <ul class="space-y-3">
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">Customer Service</a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">My Account</a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">Find a Store</a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">Shipping & Returns</a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">FAQs</a>
            </li>
          </ul>
        </div>

        <!-- Column 4: About -->
        <div>
          <h3 class="text-gray-900 font-semibold mb-4">About</h3>
          <ul class="space-y-3">
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">About Us</a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">Sustainability</a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">Careers</a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">Press</a>
            </li>
            <li>
              <a href="#" class="text-gray-600 hover:text-primary transition-colors">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="mt-12 pt-8 border-t border-gray-100">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <p class="text-gray-500 text-sm mb-4 md:mb-0">
            &copy; 2025 ShopEase. All rights reserved.
          </p>
          <div class="flex flex-wrap justify-center gap-4">
            <a href="#" class="text-gray-500 text-sm hover:text-gray-700">Privacy Policy</a>
            <a href="#" class="text-gray-500 text-sm hover:text-gray-700">Terms of Service</a>
            <a href="#" class="text-gray-500 text-sm hover:text-gray-700">Cookies Settings</a>
          </div>
          <div class="flex items-center space-x-3 mt-4 md:mt-0">
            <i class="ri-visa-fill text-2xl text-gray-600"></i>
            <i class="ri-mastercard-fill text-2xl text-gray-600"></i>
            <i class="ri-paypal-fill text-2xl text-gray-600"></i>
            <i class="ri-apple-fill text-2xl text-gray-600"></i>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script id="headerInteractions">
    document.addEventListener("DOMContentLoaded", function () {
      // Search Toggle
      const searchToggle = document.getElementById("searchToggle");
      const searchDropdown = document.getElementById("searchDropdown");

      if (searchToggle && searchDropdown) {
        searchToggle.addEventListener("click", function () {
          searchDropdown.classList.toggle("hidden");
        });

        document.addEventListener("click", function (event) {
          if (
            !searchToggle.contains(event.target) &&
            !searchDropdown.contains(event.target)
          ) {
            searchDropdown.classList.add("hidden");
          }
        });
      }

      // Cart Toggle
      const cartToggle = document.getElementById("cartToggle");
      const cartDropdown = document.getElementById("cartDropdown");

      if (cartToggle && cartDropdown) {
        cartToggle.addEventListener("click", function () {
          cartDropdown.classList.toggle("hidden");
        });

        document.addEventListener("click", function (event) {
          if (
            !cartToggle.contains(event.target) &&
            !cartDropdown.contains(event.target)
          ) {
            cartDropdown.classList.add("hidden");
          }
        });
      }

      // Mobile Menu Toggle
      const mobileMenuToggle = document.getElementById("mobileMenuToggle");
      const mobileMenu = document.getElementById("mobileMenu");

      if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener("click", function () {
          mobileMenu.classList.toggle("hidden");
        });
      }

      // Mobile Shop Menu Toggle
      const mobileShopToggle = document.getElementById("mobileShopToggle");
      const mobileShopMenu = document.getElementById("mobileShopMenu");

      if (mobileShopToggle && mobileShopMenu) {
        mobileShopToggle.addEventListener("click", function () {
          mobileShopMenu.classList.toggle("hidden");
        });
      }
    });
  </script>
</body>

</html>