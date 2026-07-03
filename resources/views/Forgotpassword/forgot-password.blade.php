<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | E_Clothing</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

    <!-- Background particles effect (optional subtle decoration) -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-10 w-4 h-4 bg-purple-200 rounded-full opacity-50"></div>
        <div class="absolute bottom-20 right-20 w-6 h-6 bg-purple-300 rounded-full opacity-30"></div>
        <div class="absolute top-1/4 right-1/4 w-3 h-3 bg-purple-400 rounded-full opacity-40"></div>
    </div>

    <!-- Main Card -->
    <div class="bg-white p-10 rounded-3xl shadow-xl w-full max-w-md border border-gray-100 relative z-10">
        
        <!-- Icon -->
        <div class="flex justify-center mb-6">
            <div class="bg-purple-50 p-4 rounded-full">
                <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C9.24 2 7 4.24 7 7V9H6C4.9 9 4 9.9 4 11V21C4 22.1 4.9 23 6 23H18C19.1 23 20 22.1 20 21V11C20 9.9 19.1 9 18 9H17V7C17 4.24 14.76 2 12 2M12 4C13.66 4 15 5.34 15 7V9H9V7C9 5.34 10.34 4 12 4Z"/>
                </svg>
            </div>
        </div>

        <!-- Heading -->
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-2">Forget password?</h2>
        <p class="text-gray-500 text-center mb-8 px-4">we'll send you the updated instructions shortly.</p>

        <!-- Error Handling -->
        @if($errors->any())
            <div class="bg-red-50 text-red-600 p-3 rounded-xl mb-4 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('forgot.password') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" required 
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition" 
                    placeholder="Enter your email">
            </div>

            <button type="submit" 
                class="w-full bg-purple-600 text-white py-4 rounded-xl font-bold text-lg hover:bg-purple-700 transition shadow-lg shadow-purple-200">
                Reset password
            </button>
        </form>

    </div>

</body>
</html>