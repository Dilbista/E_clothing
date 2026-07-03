<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title','E_Cloting||About US')</title>
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

        /* Hero section with stable Unsplash image and soft warm-toned overlay */
        .about-hero-section {
            background-image: linear-gradient(to right, rgba(24, 24, 27, 0.85) 30%, rgba(24, 24, 27, 0.4) 100%),
                url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1920&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .custom-checkbox {
            position: relative;
            cursor: pointer;
        }

        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 18px;
            width: 18px;
            background-color: #fff;
            border: 1px solid #d1d5db;
            border-radius: 4px;
        }

        .custom-checkbox:hover input~.checkmark {
            background-color: #f3f4f6;
        }

        .custom-checkbox input:checked~.checkmark {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom-checkbox input:checked~.checkmark:after {
            display: block;
        }

        .custom-checkbox .checkmark:after {
            left: 6px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #e5e7eb;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #4f46e5;
        }

        input:checked+.slider:before {
            transform: translateX(20px);
        }

        .custom-range {
            -webkit-appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;

            width: 100%;
            height: 6px;
            border-radius: 5px;
            background: #e5e7eb;
            outline: none;
        }

        .custom-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #4f46e5;
            cursor: pointer;
        }

        .custom-range::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #4f46e5;
            cursor: pointer;
            border: none;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 50;
            border-radius: 8px;
        }
    </style>
</head>

<body class="bg-white">
    <!-- Header -->
    @include('frondend.layouts.header')

    <!-- About Hero Section -->
    <section class="about-hero-section relative">
        <div class="container mx-auto px-4 py-24 md:py-32 w-full relative z-10 text-white">
            <div class="max-w-2xl">
                <span class="text-secondary font-semibold uppercase tracking-wider text-sm">Our Journey</span>
                <h1 class="text-4xl md:text-5xl font-bold mb-4 mt-2">
                    Crafting Sustainable & Premium Fashion
                </h1>
                <p class="text-lg text-gray-200 mb-8 max-w-lg">
                    We believe in clothing that not only looks exceptional but is built ethically and made to last.
                    Discover the philosophy behind ShopEase.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#"
                        class="py-3 px-6 bg-primary text-white font-medium rounded-button hover:bg-primary/90 transition-colors whitespace-nowrap">View
                        Collections</a>
                    <a href="#our-story"
                        class="py-3 px-6 bg-white/10 backdrop-blur-sm text-white font-medium rounded-button border border-white/20 hover:bg-white/20 transition-colors whitespace-nowrap">Our
                        Story</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section id="our-story" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Image Grid Column -->
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=800&auto=format&fit=crop"
                        alt="Designing clothes" class="rounded-lg shadow-md w-full object-cover h-[500px]" />
                    <div
                        class="absolute -bottom-6 -right-6 bg-primary text-white p-6 rounded-lg hidden md:block max-w-xs shadow-lg">
                        <p class="text-2xl font-bold mb-1">Since 2020</p>
                        <p class="text-sm text-white/90">Pioneering minimalist and sustainable design principles in
                            everyday wear.</p>
                    </div>
                </div>

                <!-- Text Column -->
                <div>
                    <span class="text-primary font-semibold uppercase tracking-wider text-sm">Who We Are</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-6">Designed for Comfort, Built for
                        the Future</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        ShopEase started with a simple observation: modern fashion often forces a choice between elegant
                        styling, affordability, and ecological responsibility. We believed we could bridge this gap.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        By sourcing globally certified organic materials, maintaining strict fair-labor certifications
                        at all our workshops, and choosing minimalist aesthetic principles, we offer clothing that
                        transitions seamlessly through seasons and trends.
                    </p>

                    <!-- Stats Grid block -->
                    <div class="grid grid-cols-2 gap-6 pt-6 border-t border-gray-100">
                        <div>
                            <span class="block text-3xl font-bold text-primary">100%</span>
                            <span class="text-sm text-gray-500">Organic Cotton & Recycled Linen</span>
                        </div>
                        <div>
                            <span class="block text-3xl font-bold text-primary">45k+</span>
                            <span class="text-sm text-gray-500">Happy Worldwide Customers</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center mb-16">
                <span class="text-primary font-semibold uppercase tracking-wider text-sm">Our Commitments</span>
                <h2 class="text-3xl font-bold text-gray-900 mt-2">Values We Live By Daily</h2>
                <p class="text-gray-600 mt-4">Every thread, cut, packaging block, and shipping route is evaluated
                    against our core organizational pillars.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="bg-white p-8 rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary mb-6">
                        <i class="ri-leaf-line text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Eco-Friendly Sourcing</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">
                        All physical fibers are selected from fully regeneratively grown crops or recycled sources,
                        minimizing chemical processing and water utilization.
                    </p>
                </div>

                <!-- Value 2 -->
                <div class="bg-white p-8 rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary mb-6">
                        <i class="ri-shake-hands-line text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Ethical Workspaces</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">
                        We guarantee transparent pay, safe manufacturing standards, and medical services for all
                        weavers, tailors, and distribution partners.
                    </p>
                </div>

                <!-- Value 3 -->
                <div class="bg-white p-8 rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary mb-6">
                        <i class="ri-instance-line text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Radical Simplicity</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">
                        We bypass temporary microtrends. Our design template centers on timeless aesthetics, meaning
                        your wardrobe stays elegant for years.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Meet the Founders/Team -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center mb-16">
                <span class="text-primary font-semibold uppercase tracking-wider text-sm">The Creative Minds</span>
                <h2 class="text-3xl font-bold text-gray-900 mt-2">Meet Our Leadership Team</h2>
                <p class="text-gray-600 mt-4">Bringing together industry-defining experience in design, logistics, and
                    ecology.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="group">
                    <div class="relative overflow-hidden rounded-lg mb-4 aspect-[4/5]">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=600&auto=format&fit=crop"
                            alt="Clara Jenkins"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-lg">Clara Jenkins</h3>
                        <p class="text-sm text-primary font-medium mb-2">CEO & Co-founder</p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            A classic design enthusiast, Clara leads our corporate scaling plans while maintaining focus
                            on brand values.
                        </p>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="group">
                    <div class="relative overflow-hidden rounded-lg mb-4 aspect-[4/5]">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=600&auto=format&fit=crop"
                            alt="Marcus Vance"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-lg">Marcus Vance</h3>
                        <p class="text-sm text-primary font-medium mb-2">Creative Director</p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Marcus oversees item geometry, styling selections, and aesthetic alignments, preserving our
                            timeless profiles.
                        </p>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="group">
                    <div class="relative overflow-hidden rounded-lg mb-4 aspect-[4/5]">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=600&auto=format&fit=crop"
                            alt="Elena Rostova"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-lg">Elena Rostova</h3>
                        <p class="text-sm text-primary font-medium mb-2">Head of Sustainability</p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Elena monitors supply-chain integrity, ensures circular reuse options, and vets our factory
                            operations regularly.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Elegant Call-to-Action Section -->
    <section class="py-16 bg-gray-50 border-t border-gray-100">
        <div class="container mx-auto px-4 text-center max-w-xl">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Want to See Our Creations in Action?</h2>
            <p class="text-gray-600 mb-6">Discover how we bring minimalist lines and sustainable fibers together in our
                latest collections.</p>
            <a href="#"
                class="inline-block py-3 px-8 bg-primary text-white font-medium rounded-button hover:bg-primary/90 transition-colors">Explore
                Summer Collection</a>
        </div>
    </section>

    <!-- Newsletter (Identical Pattern to Home Page) -->
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

    <!-- Footer (Identical Pattern to Home Page) -->
    @include('frondend.layouts.footer')


    <!-- Scripts (Matches Home page toggle systems) -->
    
    <script>
        const btn = document.getElementById("userBtn");
        const dropdown = document.getElementById("dropdown");

        btn.addEventListener("click", () => {
            dropdown.classList.toggle("hidden");
        });

        document.addEventListener("click", (e) => {
            if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add("hidden");
            }
        });
    </script>
</body>

</html>