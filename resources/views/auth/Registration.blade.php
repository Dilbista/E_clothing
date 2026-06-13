<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @include('frondend.layouts.navbar')
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

  @include('frondend.layouts.header')

  <main class="flex-grow flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">

      <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
        Create Account
      </h2>

      <div class="flex items-center justify-end mt-4">

        <br>
        <a href="{{ route('redirect.google') }}">
          <img src="https://miro.medium.com/v2/resize:fit:1400/1*u0bwdudgoyKjSLntsRcqiw.png" alt="" srcset=""
            width="200px">
        </a>

      </div>

      <form method="POST" action="{{ route('register.post') }}">
        @csrf

        <div class="mb-4">
          <label class="block text-gray-600 mb-2">Full Name</label>
          <input type="text" name="name" placeholder="Enter your name"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required />
        </div>

        <div class="mb-4">
          <label class="block text-gray-600 mb-2">Email</label>
          <input type="email" name="email" placeholder="Enter your email"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required />
        </div>

        <div class="mb-4">
          <label class="block text-gray-600 mb-2">Password</label>
          <input type="password" name="password" placeholder="Enter password"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required />
        </div>

        <div class="mb-4">
          <label class="block text-gray-600 mb-2">Confirm Password</label>
          <input type="password" name="password_confirmation" placeholder="Confirm password"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required />
        </div>

        <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">
          Register
        </button>
      </form>

      <p class="text-center text-sm text-gray-600 mt-4">
        Already have an account?
        <a href="{{ url('login') }}" class="text-green-600 hover:underline">Login</a>
      </p>

    </div>

  </main>

</body>

</html>