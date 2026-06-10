<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">

   



<h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
  Create Account
</h2>

<form method="POST" action="{{ url('/api/register') }}">
  @csrf

  <!-- Name -->
  <div class="mb-4">
    <label class="block text-gray-600 mb-2">Full Name</label>
    <input
      type="text"
      name="name"
      placeholder="Enter your name"
      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
      required
    />
  </div>

  <!-- Email -->
  <div class="mb-4">
    <label class="block text-gray-600 mb-2">Email</label>
    <input
      type="email"
      name="email"
      placeholder="Enter your email"
      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
      required
    />
  </div>

  <!-- Password -->
  <div class="mb-4">
    <label class="block text-gray-600 mb-2">Password</label>
    <input
      type="password"
      name="password"
      placeholder="Enter password"
      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
      required
    />
  </div>

  <!-- Confirm Password -->
  <div class="mb-4">
    <label class="block text-gray-600 mb-2">Confirm Password</label>
    <input
      type="password"
      name="password_confirmation"
      placeholder="Confirm password"
      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
      required
    />
  </div>

  <!-- Button -->
  <button
    type="submit"
    class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition"
  >
    Register
  </button>
</form>



    


    
    <!-- Login link -->
    <p class="text-center text-sm text-gray-600 mt-4">
      Already have an account?
      <a href="{{ url('login') }}" class="text-green-600 hover:underline">Login</a>
    </p>

  </div>

</body>

</html>