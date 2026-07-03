<!DOCTYPE html>
<html lang="en">
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('frondend.layouts.navbar')

<body class="bg-white">
    @include('frondend.layouts.header')
    <!-- Hero Section -->
    @include('frondend.layouts.heroSection')
    <!-- Categories Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Shop by Category</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($categories as $category)
                    <a href="#" class="group">
                        <div class="relative overflow-hidden rounded-lg aspect-[3/4]">

                            @if($category->category_image)
                                <img src="{{ asset($category->category_image) }}" alt="{{ $category->category_name }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                                <img src="https://via.placeholder.com/400x500?text=No+Image" alt="No Image"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @endif
                            <div class="absolute inset-0 bg-black/30 flex items-end p-6">
                                <div>
                                    <h3 class="text-xl font-semibold text-white">
                                        {{ $category->category_name }}
                                    </h3>
                                    <p class="text-white/80 text-sm">
                                        View Collection
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Products -->
 <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-3xl font-bold">Featured Products</h2>
                <div class="flex space-x-1 px-1 py-1 bg-gray-100 rounded-full">
                    <button
                        class="px-4 py-1.5 bg-white text-gray-800 rounded-full shadow-sm text-sm font-medium whitespace-nowrap">
                        All
                    </button>
                    <button
                        class="px-4 py-1.5 text-gray-600 rounded-full text-sm font-medium hover:bg-white hover:shadow-sm transition whitespace-nowrap">
                        New Arrivals
                    </button>
                    <button
                        class="px-4 py-1.5 text-gray-600 rounded-full text-sm font-medium hover:bg-white hover:shadow-sm transition whitespace-nowrap">
                        Best Sellers
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach($products as $product)
                <div class="featured-product-card">
                    <div class="featured-card-img-wrap">
                        {{-- Status Badge --}}
                        <div class="absolute top-3 left-3 z-10">
                            @if($product->stock <= 0)
                                <span class="bg-red-800 text-white text-xs px-2 py-1 rounded">Out of Stock</span>
                                @elseif($product->discount_price)
                                <span class="bg-green-500 text-white text-xs px-2 py-1 rounded">Sale</span>
                                @elseif($product->created_at->gt(now()->subDays(7)))
                                <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded">New</span>
                                @endif
                        </div>

                        <img
                            src="{{ asset($product->image) }}"
                            alt="{{ $product->name }}"
                            class="featured-card-img">

                        {{-- Hover Overlay with Icons --}}
                        <div class="featured-card-overlay">
                            <div class="featured-card-actions">
                                {{-- View --}}
                                <a href="{{ route('frontend.viewDetails', ['id' => $product->getKey()]) }}"
                                    class="featured-action-btn" title="View Product">
                                    <i class="ri-eye-line"></i>
                                </a>

                                {{-- Wishlist --}}
                                <button
                                    class="featured-action-btn add-to-wishlist-btn {{ in_array($product->id, $wishlistIds) ? 'wishlisted' : '' }}"
                                    data-product-id="{{ $product->id }}"
                                    title="Add to Wishlist">
                                    <i class="{{ in_array($product->id, $wishlistIds) ? 'ri-heart-fill' : 'ri-heart-line' }}"></i>
                                </button>

                                {{-- Add to Cart --}}
                                @php
                                $isInCart = isset($cartItems)
                                    ? $cartItems->contains(fn($item) => (int) $item->product_id === (int) $product->id)
                                    : false;
                                @endphp
                                @if($product->stock > 0)
                                <button class="featured-action-btn {{ $isInCart ? 'featured-action-btn--in-cart' : '' }}" title="{{ $isInCart ? 'Added to Cart' : 'Add to Cart' }}" onclick="addToCartGlobal({{ $product->id }})">
                                    <i class="ri-shopping-bag-line"></i>
                                </button>
                                @else
                                <button disabled class="featured-action-btn featured-action-btn--disabled" title="Out of Stock">
                                    <i class="ri-shopping-bag-line"></i>
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <h3 class="font-medium text-gray-900 mb-1">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $product->brand->name ?? '' }}</p>
                        @if($product->discount_price)
                        <div class="flex items-center mt-2">
                            <span class="text-lg font-bold text-rose-600">Rs. {{ number_format($product->price - $product->discount_price, 2) }}</span>
                            <span class="ml-2 text-sm text-gray-400 line-through">Rs. {{ number_format($product->price, 2) }}</span>
                        </div>
                        @else
                        <span class="font-bold text-gray-900">Rs. {{ number_format($product->price, 2) }}</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @if($products->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                @endforeach
            </div>
            @else
            <div class="text-center py-10">
                <h3 class="text-xl font-semibold">No Products Available</h3>
            </div>
            @endif
            <div class="text-center mt-12">
                <a
                    href="{{ route('frontend.new-arrivals') }}"
                    class="inline-block py-3 px-8 border border-gray-300 text-gray-800 font-medium rounded-button hover:bg-gray-50 transition-colors whitespace-nowrap">View All Products</a>
            </div>
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
                    <a href="{{ route('frontend.sale') }}"
                        class="inline-block py-3 px-8 bg-green-600 text-white font-medium rounded-button hover:bg-green-700 transition-colors whitespace-nowrap">
                        Shop the Sale
                    </a>
                </div>
                <div class="md:w-1/2">
                    <img src="https://readdy.ai/api/search-image?query=stylish%20summer%20clothing%20collection%20with%20discount%20tags%2C%20professional%20fashion%20photography%2C%20multiple%20items%20arranged%20elegantly%2C%20high-end%20apparel%20on%20minimal%20background&width=600&height=400&seq=sale1&orientation=landscape"
                        alt="Summer Sale" class="rounded-lg w-full" />
                </div>
            </div>
        </div>
    </section>

    <!-- New Arrivals -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">New Arrivals</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach($newArrivals as $product)

                    <div class="featured-product-card">
                        <div class="featured-card-img-wrap">
                            {{-- Status Badge --}}
                            <div class="absolute top-3 left-3 z-10">
                                @if($product->stock <= 0)
                                    <span class="bg-red-800 text-white text-xs px-2 py-1 rounded">Out of Stock</span>
                                @elseif($product->discount_price)
                                    <span class="bg-green-500 text-white text-xs px-2 py-1 rounded">Sale</span>
                                @elseif($product->created_at->gt(now()->subDays(7)))
                                    <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded">New</span>
                                @endif
                            </div>

                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="featured-card-img">

                            {{-- Hover Overlay with Icons --}}
                            <div class="featured-card-overlay">
                                <div class="featured-card-actions">
                                    {{-- View --}}
                                    <a href="{{ route('frontend.viewDetails', ['id' => $product->getKey()]) }}"
                                        class="featured-action-btn" title="View Product">
                                        <i class="ri-eye-line"></i>
                                    </a>

                                    {{-- Wishlist --}}
                                    <button
                                        class="featured-action-btn add-to-wishlist-btn {{ in_array($product->id, $wishlistIds) ? 'wishlisted' : '' }}"
                                        data-product-id="{{ $product->id }}" title="Add to Wishlist">
                                        <i
                                            class="{{ in_array($product->id, $wishlistIds) ? 'ri-heart-fill' : 'ri-heart-line' }}"></i>
                                    </button>

                                    {{-- Add to Cart --}}
                                    @if($product->stock > 0)
                                        <button class="featured-action-btn featured-action-btn--primary" title="Add to Cart">
                                            <i class="ri-shopping-bag-line"></i>
                                        </button>
                                    @else
                                        <button disabled class="featured-action-btn featured-action-btn--disabled"
                                            title="Out of Stock">
                                            <i class="ri-shopping-bag-line"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <h3 class="font-medium text-gray-900 mb-1">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $product->brand->name ?? '' }}</p>
                            @if($product->discount_price)
                                <div class="flex items-center mt-2">
                                    <span class="text-lg font-bold text-rose-600">Rs.
                                        {{ number_format($product->price - $product->discount_price, 2) }}</span>
                                    <span class="ml-2 text-sm text-gray-400 line-through">Rs.
                                        {{ number_format($product->price, 2) }}</span>
                                </div>
                            @else
                                <span class="font-bold text-gray-900">Rs. {{ number_format($product->price, 2) }}</span>
                            @endif
                        </div>
                    </div>

                @endforeach

            </div>
            <div class="text-center mt-12">
                <a href="{{ route('frontend.new-arrivals') }}"
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
                        <div
                            class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 mr-4">
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
                        <div
                            class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 mr-4">
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
                        <div
                            class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 mr-4">
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
    {{-- <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-4">
                Follow Us on Instagram
            </h2>
            <p class="text-gray-600 text-center mb-12">@shopease_official</p>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://readdy.ai/api/search-image?query=fashion%20lifestyle%20image%2C%20person%20wearing%20stylish%20outfit%20in%20urban%20setting%2C%20natural%20lighting%2C%20candid%20pose%2C%20high%20quality&width=300&height=300&seq=insta1&orientation=squarish"
                        alt="Instagram Post"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://readdy.ai/api/search-image?query=close-up%20of%20fashion%20accessories%20arrangement%2C%20minimal%20aesthetic%2C%20soft%20lighting%2C%20high%20quality%20product%20photography&width=300&height=300&seq=insta2&orientation=squarish"
                        alt="Instagram Post"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://readdy.ai/api/search-image?query=person%20wearing%20elegant%20outfit%20in%20cafe%20setting%2C%20lifestyle%20fashion%20photography%2C%20soft%20natural%20lighting%2C%20candid%20moment&width=300&height=300&seq=insta3&orientation=squarish"
                        alt="Instagram Post"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://readdy.ai/api/search-image?query=flatlay%20of%20fashion%20items%20including%20clothing%20and%20accessories%2C%20minimal%20aesthetic%2C%20soft%20lighting%2C%20high%20quality%20product%20photography&width=300&height=300&seq=insta4&orientation=squarish"
                        alt="Instagram Post"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://readdy.ai/api/search-image?query=person%20wearing%20casual%20outfit%20in%20urban%20setting%2C%20lifestyle%20fashion%20photography%2C%20natural%20lighting%2C%20candid%20pose&width=300&height=300&seq=insta5&orientation=squarish"
                        alt="Instagram Post"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
                <a href="#" class="block aspect-square overflow-hidden rounded-lg group">
                    <img src="https://readdy.ai/api/search-image?query=close-up%20of%20shoes%20and%20accessories%2C%20minimal%20aesthetic%2C%20soft%20lighting%2C%20high%20quality%20product%20photography&width=300&height=300&seq=insta6&orientation=squarish"
                        alt="Instagram Post"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                </a>
            </div>
        </div>
    </section> --}}
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
    @include('frondend.layouts.footer')

    <!-- Existing Scripts (header interactions & wishlist) -->
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

        // -----------------------------------------------------------------
        // WISHLIST HANDLER WITH HEART CLICK HIGHLIGHT
        // -----------------------------------------------------------------
        document.querySelectorAll('.add-to-wishlist-btn').forEach(button => {
            button.addEventListener('click', function () {
                const btn = this;
                const icon = btn.querySelector('i');

                // Heart highlight animation immediately on click
                icon.classList.add('animate-heart-highlight');
                icon.addEventListener('animationend', function handler() {
                    icon.classList.remove('animate-heart-highlight');
                    icon.removeEventListener('animationend', handler);
                });

                fetch("{{ route('wishlist.add') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        product_id: btn.dataset.productId
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        const icon = btn.querySelector("i");

                        if (data.is_wishlisted === true) {
                            btn.classList.remove("text-gray-900");
                            btn.classList.add("text-rose-500");
                            icon.classList.remove("ri-heart-line");
                            icon.classList.add("ri-heart-fill");
                        } else {
                            btn.classList.remove("text-rose-500");
                            btn.classList.add("text-gray-900");
                            icon.classList.remove("ri-heart-fill");
                            icon.classList.add("ri-heart-line");
                        }

                        // Update navbar wishlist badge
                        const badge = document.getElementById('wishlist-badge');
                        if (badge && typeof data.count === 'number') {
                            badge.textContent = data.count;
                            badge.classList.toggle('hidden', data.count === 0);
                        }
                    });
            });
        });
    </script>

    <!-- ========== ANIMATION & INTERACTION ENHANCEMENTS ========== -->
    <style>
        /* Keyframes for scroll-reveal animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes pulseGlow {

            0%,
            100% {
                box-shadow: 0 0 5px rgba(255, 255, 255, 0.2);
            }

            50% {
                box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
            }
        }

        /* Heart highlight animation on click */
        @keyframes heartHighlight {
            0% {
                transform: scale(1);
                color: currentColor;
                text-shadow: 0 0 0px rgba(244, 63, 94, 0);
            }

            30% {
                transform: scale(1.4);
                color: #ef4444;
                /* bright red */
                text-shadow: 0 0 12px rgba(239, 68, 68, 0.7);
            }

            100% {
                transform: scale(1);
                color: currentColor;
                text-shadow: 0 0 0px rgba(244, 63, 94, 0);
            }
        }

        .animate-heart-highlight {
            animation: heartHighlight 0.45s ease-out;
        }

        /* Classes applied by JS for scroll animation */
        .reveal {
            opacity: 0;
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .reveal.visible {
            opacity: 1;
        }

        .reveal-fade-up {
            transform: translateY(30px);
        }

        .reveal-fade-up.visible {
            transform: translateY(0);
        }

        .reveal-fade-left {
            transform: translateX(-30px);
        }

        .reveal-fade-left.visible {
            transform: translateX(0);
        }

        .reveal-fade-right {
            transform: translateX(30px);
        }

        .reveal-fade-right.visible {
            transform: translateX(0);
        }

        .reveal-scale {
            transform: scale(0.9);
        }

        .reveal-scale.visible {
            transform: scale(1);
        }

        /* Ripple effect on buttons */
        .btn-ripple {
            position: relative;
            overflow: hidden;
        }

        .ripple-effect {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        }

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }



        /* Countdown box pulse */
        .countdown-box {
            animation: countdownPulse 2s infinite;
        }

        @keyframes countdownPulse {

            0%,
            100% {
                transform: scale(1);
                background-color: rgba(255, 255, 255, 0.1);
            }

            50% {
                transform: scale(1.05);
                background-color: rgba(255, 255, 255, 0.2);
            }
        }

        /* ========== FEATURED PRODUCT CARD HOVER ICONS ========== */
        .featured-product-card {
            cursor: pointer;
        }

        .featured-card-img-wrap {
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
            margin-bottom: 0.75rem;
        }

        .featured-card-img {
            width: 100%;
            height: 20rem;
            object-fit: cover;
            object-position: top;
            display: block;
            transition: transform 0.4s ease;
        }

        .featured-product-card:hover .featured-card-img {
            transform: scale(1.05);
        }

        /* Dark overlay — hidden by default */
        .featured-card-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 20;
        }

        /* Show overlay on card hover */
        .featured-product-card:hover .featured-card-overlay {
            opacity: 1;
        }

        /* Icons row — slide up on hover */
        .featured-card-actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transform: translateY(16px);
            transition: transform 0.3s ease;
        }

        .featured-product-card:hover .featured-card-actions {
            transform: translateY(0);
        }

        /* Individual icon button */
        .featured-action-btn {
            background: #ffffff;
            color: #111827;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.18);
            cursor: pointer;
            transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease;
            text-decoration: none;
        }

        .featured-action-btn:hover {
            background: #f3f4f6;
            transform: scale(1.12);
        }

        /* Wishlisted state */
        .featured-action-btn.wishlisted {
            color: #f43f5e;
        }

        /* Primary (cart) button */
        .featured-action-btn--primary {
            background: var(--color-primary, #4f46e5);
            color: #ffffff;
        }

        .featured-action-btn--primary:hover {
            background: var(--color-primary-dark, #4338ca);
            color: #ffffff;
        }

        /* Disabled (out of stock) button */
        .featured-action-btn--disabled {
            background: #9ca3af;
            color: #ffffff;
            cursor: not-allowed;
        }

        .featured-action-btn--disabled:hover {
            background: #9ca3af;
            transform: none;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // ========== SCROLL REVEAL ==========
            const revealElements = document.querySelectorAll('section, .group, .grid > *');
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                threshold: 0.1
            }
            );

            // Mark sections and major cards with reveal classes
            document.querySelectorAll('section').forEach(section => {
                section.classList.add('reveal', 'reveal-fade-up');
                observer.observe(section);
            });

            // Category cards
            document.querySelectorAll('.grid a.group').forEach(card => {
                card.classList.add('reveal', 'reveal-scale');
                observer.observe(card);
            });

            // Product cards (both featured and new arrivals)
            document.querySelectorAll('.grid .group, .grid .featured-product-card').forEach(card => {
                if (!card.classList.contains('reveal')) {
                    card.classList.add('reveal', 'reveal-fade-up', 'product-card');
                    observer.observe(card);
                }
            });

            // Countdown timer boxes
            document.querySelectorAll('.flex.gap-4.mb-8 > .text-center').forEach(box => {
                box.classList.add('countdown-box');
            });

            // Testimonials
            document.querySelectorAll('.grid.grid-cols-1.md\\:grid-cols-3.gap-6 > div').forEach(testimonial => {
                testimonial.classList.add('reveal', 'reveal-fade-left');
                observer.observe(testimonial);
            });

            // Instagram images
            document.querySelectorAll('.grid.grid-cols-2.md\\:grid-cols-4.lg\\:grid-cols-6.gap-4 > a').forEach(img => {
                img.classList.add('reveal', 'reveal-scale');
                observer.observe(img);
            });

            // ========== RIPPLE EFFECT ON BUTTONS ==========
            function createRipple(event) {
                const button = event.currentTarget;
                const circle = document.createElement('span');
                const diameter = Math.max(button.clientWidth, button.clientHeight);
                const radius = diameter / 2;

                circle.style.width = circle.style.height = `${diameter}px`;
                circle.style.left = `${event.clientX - button.getBoundingClientRect().left - radius}px`;
                circle.style.top = `${event.clientY - button.getBoundingClientRect().top - radius}px`;
                circle.classList.add('ripple-effect');

                const ripple = button.querySelector('.ripple-effect');
                if (ripple) {
                    ripple.remove();
                }
                button.appendChild(circle);
            }

            // Attach ripple to all buttons (except disabled and wishlist toggles if you prefer)
            document.querySelectorAll('button:not(.add-to-wishlist-btn), a.btn, .rounded-button').forEach(btn => {
                btn.classList.add('btn-ripple');
                btn.addEventListener('click', createRipple);
            });

            // Also attach to the "View All" links
            document.querySelectorAll('a.inline-block').forEach(link => {
                if (link.matches('.rounded-button, [class*="py-3"]')) {
                    link.classList.add('btn-ripple');
                    link.addEventListener('click', createRipple);
                }
            });
        });
    </script>
</body>

</html>

