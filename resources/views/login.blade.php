<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - UndanganF</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-900 flex items-center justify-center">

  <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-8">
    <div class="text-center mb-6">
      <img src="{{ asset('assets/undanganf.png') }}" alt="Logo" class="h-12 mx-auto mb-2">
      <h1 class="text-2xl font-semibold text-gray-800">Login Admin</h1>
    </div>

    @if(session('error'))
      <div class="bg-red-100 text-red-600 p-2 rounded text-sm mb-4">{{ session('error') }}</div>
    @endif

    <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label class="block mb-1 text-sm text-gray-700">Email</label>
        <input type="email" name="email" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-pink-500" required>
      </div>
      <div>
        <label class="block mb-1 text-sm text-gray-700">Password</label>
        <input type="password" name="password" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-pink-500" required>
      </div>
      <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded hover:bg-pink-700 transition">
        Login
      </button>
    </form>
  </div>

</body>
</html>
