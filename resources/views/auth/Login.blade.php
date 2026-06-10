<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap (optional, if you already use it) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700 text-center border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <!-- ERROR MESSAGE -->
        @if(session('error'))
            <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-700 text-center border border-red-300">
                {{ session('error') }}
            </div>
        @endif

      
        <p class="text-center text-gray-500 mb-6">
            Login to your account
        </p>

        <!-- LOGIN FORM -->
       <form method="POST" action="{{ route('login.post') }}">
    @csrf
           

            <!-- EMAIL -->
            <div class="mb-4">
                <label class="block text-gray-600 mb-1">Email</label>
                <input 
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
                <label class="block text-gray-600 mb-1">Password</label>
                <input 
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- FORGOT PASSWORD -->
            <div class="flex justify-end mb-5">
                <a href="#" class="text-sm text-blue-500 hover:underline">
                    Forgot Password?
                </a>
            </div>

            <!-- BUTTON -->
            <button 
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition"
            >
                Login
            </button>

        </form>

        <!-- REGISTER LINK -->
        <p class="text-center text-sm text-gray-600 mt-6">
            Don’t have an account?
            <a href="{{ url('register') }}" class="text-blue-600 font-semibold hover:underline">
                Register here
            </a>
        </p>

    </div>

</body>
</html>