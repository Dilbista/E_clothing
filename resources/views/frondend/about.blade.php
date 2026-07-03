<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title','E_Clothing || Our Story')</title>
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
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" />
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-gradient {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                        url('https://images.unsplash.com/photo-1523381210434-271e8be1f52b?q=80&w=1600&auto=format&fit=crop');
            background-size: cover; background-position: center;
        }
    </style>
</head>

<body class="bg-white text-gray-800">
    <!-- Header -->
    @include('frondend.layouts.header')

    <!-- Simple Hero -->
    <section class="hero-gradient py-20 md:py-32 text-center text-white">
        <div class="container mx-auto px-4">
            <span class="text-secondary font-bold tracking-widest uppercase text-xs">Namaste & Welcome</span>
            <h1 class="text-4xl md:text-5xl font-bold mt-4 mb-6">Modern Style, <br class="md:hidden"> Himalayan Soul.</h1>
            <p class="max-w-xl mx-auto text-gray-300 text-lg font-light">
                E_Clothing is a Kathmandu-based label dedicated to crafting premium, sustainable apparel for the modern Nepali lifestyle.
            </p>
        </div>
    </section>

    <!-- Short Story & Stats -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-4">Our Essence</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Founded in 2021, we set out to prove that high-quality fashion can be made right here in Nepal. From using organic Himalayan hemp to premium combed cotton, every piece is tailored for durability and comfort.
                    </p>
                    <div class="flex gap-8">
                        <div>
                            <span class="block text-2xl font-bold text-primary">50k+</span>
                            <span class="text-xs uppercase text-gray-400">Happy Customers</span>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold text-primary">7</span>
                            <span class="text-xs uppercase text-gray-400">Provinces Reached</span>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1558769132-cb1aea458c5e?q=80&w=800&auto=format&fit=crop" 
                         alt="Nepali Design" class="rounded-2xl shadow-2xl">
                    <div class="absolute -bottom-4 -left-4 bg-secondary text-white p-4 rounded-lg font-bold">
                        100% Nepali
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Three Sweet Values -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div class="p-6">
                    <i class="ri-leaf-line text-4xl text-primary mb-4 block"></i>
                    <h3 class="font-bold text-lg mb-2">Ethically Made</h3>
                    <p class="text-sm text-gray-500">Fair wages for our local tailors and artisans in Kathmandu.</p>
                </div>
                <div class="p-6">
                    <i class="ri-truck-line text-4xl text-primary mb-4 block"></i>
                    <h3 class="font-bold text-lg mb-2">Nationwide Love</h3>
                    <p class="text-sm text-gray-500">Fast delivery from the streets of Thamel to every corner of Nepal.</p>
                </div>
                <div class="p-6">
                    <i class="ri-shield-check-line text-4xl text-primary mb-4 block"></i>
                    <h3 class="font-bold text-lg mb-2">Genuine Quality</h3>
                    <p class="text-sm text-gray-500">Premium fabrics that withstand the diverse Nepali climate.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Simple CTA -->
    <section class="py-16 text-center">
        <h2 class="text-2xl font-bold mb-6">Ready to upgrade your wardrobe?</h2>
        <a href="{{ route('frontend.sale') }}" class="bg-primary text-white px-10 py-3 rounded-button font-medium hover:bg-opacity-90 transition">
            Shop the Collection
        </a>
    </section>

    <!-- Footer -->
    @include('frondend.layouts.footer')
</body>
</html>