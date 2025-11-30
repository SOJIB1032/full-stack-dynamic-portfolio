<!doctype html>
<html>
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">
  <div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
      <h2 class="text-xl font-semibold">Admin Login</h2>
      <form method="POST" action="{{ route('admin.login.post') }}" class="mt-4">
        @csrf
        <input name="username" placeholder="Username" class="w-full p-3 border rounded-lg mb-3" />
        <input name="password" type="password" placeholder="Password" class="w-full p-3 border rounded-lg mb-3" />
        @if($errors->any())
          <div class="text-red-600 mb-3">{{ $errors->first() }}</div>
        @endif
        <div class="flex justify-between">
          <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg">Login</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
