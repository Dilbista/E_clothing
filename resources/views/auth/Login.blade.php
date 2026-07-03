<!DOCTYPE html>
<html lang="en">

<head>
  @include('frondend.layouts.navbar')

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .sky-bg {
            background: linear-gradient(to bottom, #cae8fa 0%, #e2f1fc 50%, #ffffff 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        .circle-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
            height: 800px;
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 50%;
            pointer-events: none;
        }

        .circle-overlay::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 1000px;
            height: 1000px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
        }
    </style>
</head>
    {{-- @include('frondend.layouts.header') --}}

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<body class="sky-bg">

    {{-- Header --}}
    {{-- @include('frontend.layouts.header') --}}
    @include('frondend.layouts.header')

    {{-- Background Circle --}}
    <div class="circle-overlay"></div>

    {{-- Login Section --}}
    <section class="relative z-10 flex justify-center items-center px-4 py-200 mt-300">

        <main class="w-full max-w-[440px]">

            <div class="bg-white/80 backdrop-blur-xl rounded-[45px] shadow-2xl shadow-blue-200/50 p-10 border border-white">

                <!-- Icon -->
                <div class="flex justify-center mb-8">
                    <div class="w-16 h-16 bg-white rounded-2xl shadow-md flex items-center justify-center text-gray-700 text-2xl">
                        <i class="fa-solid fa-right-to-bracket"></i>
                    </div>
                </div>

                <!-- Heading -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">
                        Sign in with email
                    </h1>

                    <p class="text-gray-500 text-sm">
                        Make a new doc to bring your words, data, and teams together. For free
                    </p>
                </div>

                {{-- Success --}}
                @if(session('success'))
                    <div class="mb-4 p-3 rounded-xl bg-green-100 text-green-700 text-center">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Error --}}
                @if(session('error'))
                    <div class="mb-4 p-3 rounded-xl bg-red-100 text-red-700 text-center">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf

                    <!-- Email -->
                    <div class="relative mb-4">
                        <i class="fa-regular fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Email"
                            class="w-full pl-12 pr-4 py-3 rounded-xl bg-gray-100 focus:ring-2 focus:ring-blue-500 outline-none">

                    </div>

                    @error('email')
                        <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
                    @enderror

                    <!-- Password -->
                    <div class="relative mb-3">
                        <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Password"
                            class="w-full pl-12 pr-12 py-3 rounded-xl bg-gray-100 focus:ring-2 focus:ring-blue-500 outline-none">

                        <button type="button"
                            onclick="togglePassword()"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400">

                            <i id="eyeIcon" class="fa-regular fa-eye-slash"></i>

                        </button>
                    </div>

                    @error('password')
                        <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
                    @enderror

                    <div class="flex justify-end mb-6">
                        <a href="{{ route('forgot.password') }}"
                            class="text-sm font-medium hover:underline">
                            Forgot Password?
                        </a>
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-gray-900 hover:bg-black text-white py-3 rounded-xl transition">
                        Get Started
                    </button>

                </form>
                  <p class="text-center mt-8 text-gray-600">
                    Don't have an account?

                    <a href="{{ url('register') }}"
                        class="font-semibold text-black hover:underline">
                        Register
                    </a>
                </p>

                <!-- Divider -->
                <div class="relative flex items-center my-8">
                    <div class="flex-grow border-t"></div>

                    <span class="mx-4 text-xs text-gray-500 uppercase">
                        Or sign in with
                    </span>

                    <div class="flex-grow border-t"></div>
                </div>

                <!-- Social Login -->
               <!-- Social Login -->
<div class="grid grid-cols-3 gap-5 mt-8">

    <!-- Google -->
    <a href="{{ route('redirect.google') }}"
        class="group relative flex items-center justify-center h-14 rounded-2xl bg-white border border-gray-200 shadow-md overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:border-red-300">

        <!-- Hover Background -->
        <span
            class="absolute inset-0 bg-gradient-to-r from-red-500 via-yellow-400 to-green-500 opacity-0 group-hover:opacity-10 transition duration-500">
        </span>

        <img src="https://www.svgrepo.com/show/475656/google-color.svg"
            class="relative w-7 transition duration-500 group-hover:scale-125 group-hover:rotate-12">

    </a>

    <!-- Facebook -->
    <a href="#"
        class="group relative flex items-center justify-center h-14 rounded-2xl bg-white border border-gray-200 shadow-md overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:border-blue-400">

        <span
            class="absolute inset-0 bg-gradient-to-r from-blue-500 to-blue-700 opacity-0 group-hover:opacity-10 transition duration-500">
        </span>

        <img src="https://www.svgrepo.com/show/475647/facebook-color.svg"
            class="relative w-7 transition duration-500 group-hover:scale-125 group-hover:rotate-12">

    </a>

    <!-- Apple -->
    <a href="#"
        class="group relative flex items-center justify-center h-14 rounded-2xl bg-white border border-gray-200 shadow-md overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:border-gray-700">

        <span
            class="absolute inset-0 bg-gradient-to-r from-gray-700 to-black opacity-0 group-hover:opacity-10 transition duration-500">
        </span>

        <i
            class="fa-brands fa-apple text-3xl text-gray-800 transition duration-500 group-hover:scale-125 group-hover:rotate-12">
        </i>

    </a>

</div>

<style>
/* Smooth animation */
.group {
    transition: all .4s ease;
}

/* Glow effect */
.group:hover {
    box-shadow:
        0 15px 35px rgba(59, 130, 246, .15),
        0 8px 15px rgba(0, 0, 0, .08);
}

/* Click animation */
.group:active {
    transform: scale(.95);
}
</style>
              

            </div>

        </main>

    </section>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const eye = document.getElementById('eyeIcon');

            if (password.type === 'password') {
                password.type = 'text';
                eye.classList.remove('fa-eye-slash');
                eye.classList.add('fa-eye');
            } else {
                password.type = 'password';
                eye.classList.remove('fa-eye');
                eye.classList.add('fa-eye-slash');
            }
        }
    </script>

</body>

</html>