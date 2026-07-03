<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $product->name }} - ShopEase</title>
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
    :where([class^="ri-"])::before { content: "\f3c2"; }
    body { font-family: 'Inter', sans-serif; }
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }

    /* Thumbnail active border */
    .thumb-btn.active { border-color: #4f46e5; }

    /* Size button active */
    .size-btn.active { border-color: #4f46e5; color: #4f46e5; background: #eef2ff; }

    /* Color button active ring */
    .color-btn.active { ring: 2px; ring-offset: 2px; ring-color: #4f46e5; outline: 2px solid #4f46e5; outline-offset: 2px; }

    /* Heart highlight animation */
    @keyframes heartPop {
        0%   { transform: scale(1); }
        40%  { transform: scale(1.35); }
        100% { transform: scale(1); }
    }
    .animate-heart-pop { animation: heartPop 0.35s ease-out; }

    /* Product card hover */
    .related-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .related-card:hover { transform: translateY(-4px); box-shadow: 0 10px 25px -5px rgba(0,0,0,0.12); }
    </style>
</head>

<body class="bg-white">
    <!-- Header -->
    @include('frondend.layouts.header')

    <!-- Product Details Main Layout -->
    <main class="container mx-auto px-4 py-10 md:py-16">
        <!-- Breadcrumb Navigation -->
        <nav class="flex text-xs text-gray-500 gap-2 mb-8 flex-wrap">
            <a href="{{ url('/') }}" class="hover:text-primary transition">Home</a>
            <span>/</span>
            <a href="#" class="hover:text-primary transition">Shop</a>
            @if($product->category)
            <span>/</span>
            <a href="#" class="hover:text-primary transition">{{ $product->category->category_name }}</a>
            @endif
            <span>/</span>
            <span class="text-gray-900 font-semibold truncate max-w-[200px]">{{ $product->name }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
            <!-- ===== LEFT: Product Image Showcase ===== -->
            <div class="space-y-4">
                <!-- Main Image -->
                <div class="overflow-hidden rounded-lg bg-gray-100 aspect-[4/5]">
                    <img id="mainProductImg"
                        src="{{ asset($product->image) }}"
                        alt="{{ $product->name }}"
                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105" />
                </div>

                <!-- Thumbnail Gallery -->
                <div class="grid grid-cols-4 gap-3">
                    <!-- Main image thumbnail (always shown) -->
                    <button onclick="switchImage(this, '{{ asset($product->image) }}')"
                        class="thumb-btn active overflow-hidden rounded-lg aspect-square border-2 transition">
                        <img src="{{ asset($product->image) }}"
                            class="w-full h-full object-cover" alt="{{ $product->name }}" />
                    </button>

                    {{-- If product has additional images in a JSON column or similar, render them. For now show placeholder slots. --}}
                </div>
            </div>

            <!-- ===== RIGHT: Product Info ===== -->
            <div class="space-y-6">
                <!-- Badges + Title -->
                <div>
                    <div class="flex flex-wrap gap-2 mb-3">
                        @if($product->stock <= 0)
                            <span class="inline-block px-2.5 py-1 bg-red-500 text-white text-xs font-semibold rounded">Out of Stock</span>
                        @elseif($product->discount_price > 0)
                            <span class="inline-block px-2.5 py-1 bg-rose-500 text-white text-xs font-semibold rounded">
                                {{ round(($product->discount_price / $product->price) * 100) }}% OFF
                            </span>
                        @endif
                        @if($product->created_at->gt(now()->subDays(7)))
                            <span class="inline-block px-2.5 py-1 bg-blue-500 text-white text-xs font-semibold rounded">New Arrival</span>
                        @endif
                    </div>

                    <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>

                    @if($product->brand)
                    <p class="text-sm text-gray-500 mt-1">by <span class="font-medium">{{ $product->brand->name }}</span></p>
                    @endif

                    <!-- Star Rating (static for now) -->
                    <div class="flex items-center space-x-2 mt-3">
                        <div class="flex text-amber-400 text-sm">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-half-fill"></i>
                        </div>
                        <span class="text-xs font-medium text-gray-500">(4.5 / 5)</span>
                        @if($product->stock > 0)
                        <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">
                            <i class="ri-checkbox-circle-line mr-1"></i>In Stock ({{ $product->stock }})
                        </span>
                        @endif
                    </div>
                </div>

                <!-- Price -->
                <div class="border-b border-gray-100 pb-6">
                    @if($product->discount_price > 0)
                    <div class="flex items-baseline gap-3">
                        <p class="text-3xl font-bold text-rose-600">
                            Rs.{{ number_format($product->price - $product->discount_price, 2) }}
                        </p>
                        <p class="text-lg text-gray-400 line-through">
                            Rs.{{ number_format($product->price, 2) }}
                        </p>
                        <span class="text-sm font-semibold text-emerald-600">
                            Save Rs.{{ number_format($product->discount_price, 2) }}
                        </span>
                    </div>
                    @else
                    <p class="text-3xl font-bold text-gray-900">Rs.{{ number_format($product->price, 2) }}</p>
                    @endif

                    @if($product->description)
                    <p class="text-sm text-gray-500 mt-3 leading-relaxed">{{ $product->description }}</p>
                    @endif
                </div>

                <!-- Colors -->
                @php $colors = $product->colors ?? collect(); @endphp
                @if($colors->count() > 0)
                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Color:</span>
                        <span id="selected-color-label" class="text-xs font-semibold text-gray-700">{{ $colors->first()->name ?? '' }}</span>
                    </div>
                    <div class="flex flex-wrap gap-2" id="color-selectors">
                        @foreach($colors as $color)
                        <button onclick="selectColor(this, '{{ $color->name }}')"
                            class="color-btn w-8 h-8 rounded-full border-2 border-transparent transition {{ $loop->first ? 'active' : '' }}"
                            style="background-color: {{ $color->hex_code ?? '#ccc' }};"
                            title="{{ $color->name }}">
                        </button>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Sizes -->
                @php $sizes = $product->sizes ?? collect(); @endphp
                @if($sizes->count() > 0)
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Size:</span>
                        <button class="text-xs font-semibold text-primary hover:underline">Size Guide</button>
                    </div>
                    <div class="flex flex-wrap gap-2" id="size-selectors">
                        @foreach($sizes as $size)
                        <button onclick="selectSize(this)"
                            class="size-btn px-4 py-2 text-xs font-semibold border rounded border-gray-200 text-gray-600 hover:border-primary hover:text-primary transition {{ $loop->first ? 'active' : '' }}">
                            {{ $size->name }}
                        </button>
                        @endforeach
                    </div>
                </div>
                @else
                {{-- Fallback generic sizes if no sizes defined --}}
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Size:</span>
                        <button class="text-xs font-semibold text-primary hover:underline">Size Guide</button>
                    </div>
                    <div class="flex flex-wrap gap-2" id="size-selectors">
                        @foreach(['S','M','L','XL','XXL'] as $s)
                        <button onclick="selectSize(this)"
                            class="size-btn px-4 py-2 text-xs font-semibold border rounded border-gray-200 text-gray-600 hover:border-primary hover:text-primary transition {{ $loop->first ? 'active' : '' }}">
                            {{ $s }}
                        </button>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Quantity & Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-4 border-t border-gray-100">
                    <!-- Qty Counter -->
                    <div class="flex items-center justify-between border border-gray-200 rounded-button w-full sm:w-32 px-4 py-2.5 select-none">
                        <button onclick="changeQuantity(-1)" class="text-gray-400 hover:text-gray-700 font-bold focus:outline-none">
                            <i class="ri-subtract-line"></i>
                        </button>
                        <span id="qty-counter" class="text-sm font-semibold text-gray-800">1</span>
                        <button onclick="changeQuantity(1)" class="text-gray-400 hover:text-gray-700 font-bold focus:outline-none">
                            <i class="ri-add-line"></i>
                        </button>
                    </div>

                    <!-- Add to Cart -->
                    @if($product->stock > 0)
                    <button
    id="add-to-cart-btn"
    type="button"
    onclick="addToCartFromDetail()"
    data-product-id="{{ $product->id }}"
    class="flex-1 py-3 px-6 bg-primary text-white font-semibold rounded-button hover:bg-primary/90 transition flex justify-center items-center gap-2">
    <i class="ri-shopping-cart-line"></i>
    Add to Cart
</button>
                    @else
                    <button disabled class="flex-1 py-3 px-6 bg-gray-300 text-gray-500 font-semibold rounded-button cursor-not-allowed flex justify-center items-center gap-2">
                        <i class="ri-shopping-bag-line"></i> Out of Stock
                    </button>
                    @endif

                    <!-- Wishlist -->
                    <button id="detail-wishlist-btn"
                        data-product-id="{{ $product->id }}"
                        class="add-to-wishlist-btn p-3 border {{ in_array($product->id, $wishlistIds ?? []) ? 'border-rose-300 text-rose-500' : 'border-gray-200 text-gray-400 hover:text-rose-500 hover:border-rose-200' }} rounded-button transition flex items-center justify-center">
                        <i class="{{ in_array($product->id, $wishlistIds ?? []) ? 'ri-heart-fill' : 'ri-heart-line' }} text-lg"></i>
                    </button>
                </div>

                <!-- Info badges -->
                <div class="grid grid-cols-3 gap-3 pt-2">
                    <div class="flex flex-col items-center text-center p-3 bg-gray-50 rounded-lg">
                        <i class="ri-truck-line text-primary text-xl mb-1"></i>
                        <span class="text-xs text-gray-600 font-medium">Free Shipping</span>
                        <span class="text-[10px] text-gray-400">Orders over Rs.100</span>
                    </div>
                    <div class="flex flex-col items-center text-center p-3 bg-gray-50 rounded-lg">
                        <i class="ri-arrow-left-right-line text-primary text-xl mb-1"></i>
                        <span class="text-xs text-gray-600 font-medium">30-Day Returns</span>
                        <span class="text-[10px] text-gray-400">Hassle-free returns</span>
                    </div>
                    <div class="flex flex-col items-center text-center p-3 bg-gray-50 rounded-lg">
                        <i class="ri-shield-check-line text-primary text-xl mb-1"></i>
                        <span class="text-xs text-gray-600 font-medium">Secure Payment</span>
                        <span class="text-[10px] text-gray-400">100% Protected</span>
                    </div>
                </div>

                <!-- Accordion Details -->
                <div class="border-t border-gray-100 pt-6 space-y-4">
                    @if($product->description)
                    <div class="border-b border-gray-100 pb-4">
                        <button onclick="toggleAccordion('desc')"
                            class="w-full flex justify-between items-center text-sm font-bold text-gray-900 focus:outline-none">
                            <span>Product Description</span>
                            <i id="icon-desc" class="ri-add-line text-gray-400 transition"></i>
                        </button>
                        <div id="content-desc" class="hidden text-xs text-gray-600 mt-3 leading-relaxed">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                    @endif

                    <div class="border-b border-gray-100 pb-4">
                        <button onclick="toggleAccordion('shipping')"
                            class="w-full flex justify-between items-center text-sm font-bold text-gray-900 focus:outline-none">
                            <span>Shipping &amp; Returns</span>
                            <i id="icon-shipping" class="ri-add-line text-gray-400 transition"></i>
                        </button>
                        <div id="content-shipping" class="hidden text-xs text-gray-600 space-y-2 mt-3 leading-relaxed">
                            <p>• Free express shipping on orders over Rs.100.</p>
                            <p>• Free hassle-free returns within 30 days of delivery.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
    <section class="py-16 border-t border-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">You May Also Like</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                <div class="related-card group bg-white border border-gray-100 rounded-lg overflow-hidden shadow-sm">
                    <div class="relative overflow-hidden">
                        @if($related->discount_price > 0)
                            <span class="absolute top-3 left-3 z-10 bg-rose-500 text-white text-xs px-2 py-1 rounded">Sale</span>
                        @elseif($related->created_at->gt(now()->subDays(7)))
                            <span class="absolute top-3 left-3 z-10 bg-blue-500 text-white text-xs px-2 py-1 rounded">New</span>
                        @endif

                        <img src="{{ asset($related->image) }}" alt="{{ $related->name }}"
                            class="w-full h-72 object-cover object-top transition-transform duration-500 group-hover:scale-105" />

                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-2">
                            <a href="{{ route('frontend.viewDetails', ['id' => $related->getKey()]) }}"
                                class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center shadow-md hover:bg-gray-100 transition"
                                title="View Details">
                                <i class="ri-eye-line"></i>
                            </a>
                            <button
                                class="add-to-wishlist-btn bg-white w-10 h-10 rounded-full flex items-center justify-center shadow-md transition-all duration-200 {{ in_array($related->id, $wishlistIds ?? []) ? 'text-rose-500' : 'text-gray-900 hover:text-rose-500' }}"
                                data-product-id="{{ $related->id }}" title="Wishlist">
                                <i class="{{ in_array($related->id, $wishlistIds ?? []) ? 'ri-heart-fill' : 'ri-heart-line' }}"></i>
                            </button>
                            <button onclick="addToCartGlobal({{ $related->id }})"
                                class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md hover:bg-primary/90 transition"
                                title="Add to Cart">
                                <i class="ri-shopping-bag-line"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 text-sm truncate">{{ $related->name }}</h3>
                        <p class="text-xs text-gray-400 mb-2">{{ $related->brand->name ?? '' }}</p>
                        @if($related->discount_price > 0)
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-rose-600">Rs.{{ number_format($related->price - $related->discount_price, 2) }}</span>
                            <span class="text-xs text-gray-400 line-through">Rs.{{ number_format($related->price, 2) }}</span>
                        </div>
                        @else
                        <span class="font-bold text-gray-900">Rs.{{ number_format($related->price, 2) }}</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Footer -->
    @include('frondend.layouts.footer')

    <!-- Scripts -->
    <script>
    // Switch main product image when thumbnail clicked
    function switchImage(thumbBtn, imageSrc) {
        document.getElementById('mainProductImg').src = imageSrc;
        document.querySelectorAll('.thumb-btn').forEach(b => b.classList.remove('active', 'border-primary'));
        thumbBtn.classList.add('active', 'border-primary');
    }

    // Size selector
    function selectSize(sizeBtn) {
        document.querySelectorAll('#size-selectors .size-btn').forEach(b => b.classList.remove('active'));
        sizeBtn.classList.add('active');
    }

    // Color selector
    function selectColor(colorBtn, colorName) {
        document.querySelectorAll('#color-selectors .color-btn').forEach(b => b.classList.remove('active'));
        colorBtn.classList.add('active');
        const label = document.getElementById('selected-color-label');
        if (label) label.textContent = colorName;
    }

    // Quantity counter
    function changeQuantity(val) {
        const counter = document.getElementById('qty-counter');
        if (counter) {
            let count = parseInt(counter.textContent) + val;
            if (count < 1) count = 1;
            counter.textContent = count;
        }
    }

    // Accordion toggle
    function toggleAccordion(sectionId) {
        const content = document.getElementById('content-' + sectionId);
        const icon = document.getElementById('icon-' + sectionId);
        if (content && icon) {
            content.classList.toggle('hidden');
            icon.classList.toggle('ri-add-line');
            icon.classList.toggle('ri-subtract-line');
        }
    }

    // Add to Cart from detail page (picks up qty, size, color)
    function addToCartFromDetail() {
        const productId = document.getElementById('add-to-cart-btn').dataset.productId;
        const qty = parseInt(document.getElementById('qty-counter').textContent);

        const activeSizeBtn = document.querySelector('#size-selectors .size-btn.active');
        const size = activeSizeBtn ? activeSizeBtn.textContent.trim() : null;

        const activeColorBtn = document.querySelector('#color-selectors .color-btn.active');
        const color = activeColorBtn ? activeColorBtn.title : null;

        addToCartGlobal(productId, qty, size, color);
    }
    </script>

</body>

</html>