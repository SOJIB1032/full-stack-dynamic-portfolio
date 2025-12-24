<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>MD Sojib Hasan - Portfolio</title>

  <!-- Tailwind CDN quick start -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- optional: heroicons -->
  <script src="https://unpkg.com/feather-icons"></script>

  <style>
    /* small extras */
    .card-hover:hover { transform: translateY(-6px); box-shadow: 0 18px 35px rgba(15,23,42,.12); }
    a:focus { outline: 2px solid rgba(99,102,241,.25); outline-offset: 3px; }
    /* make buttons touch-friendly */
    .touch-btn { padding: .75rem 1rem; border-radius: .75rem; }
  </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

  <header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between">
      <a href="{{ route('home') }}" class="flex items-center gap-3">
        <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-indigo-500 to-pink-500 flex items-center justify-center text-white font-bold">SH</div>
        <div>
          <div class="font-semibold">MD sojib hasan </div>
          <div class="text-xs text-slate-500">Software & Data | Portfolio</div>
        </div>
      </a>

      <nav class="flex items-center gap-3">
        <a href="#projects" class="text-sm hover:underline hidden md:inline">Projects</a>
        <a href="#about" class="text-sm hover:underline hidden md:inline">About</a>
        <a href="#contact" class="text-sm hover:underline">Contact</a>
        <a href="{{ url('/admin/login') }}" class="ml-2 text-sm px-3 py-2 rounded-md border">Admin</a>
      </nav>
    </div>
  </header>

  <main class="max-w-5xl mx-auto px-4 py-10">
    @yield('content')
  </main>

  <footer class="bg-white mt-10 py-6 border-t">
    <div class="max-w-5xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-4">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-indigo-600 text-white flex items-center justify-center font-bold">SJ</div>
        <div>
          <div class="font-semibold">Sojib Hasan</div>
          <div class="text-sm text-slate-500">Computer Science Student — Daffodil International University</div>
        </div>
      </div>

      <div class="flex items-center gap-4">
        <a href="https://github.com/yourusername" target="_blank" rel="noopener" class="inline-flex items-center gap-2 touch-btn">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .5C5.73.5.98 5.25.98 11.52c0 4.6 2.99 8.5 7.14 9.88.52.1.71-.23.71-.51v-1.8c-2.9.63-3.52-1.4-3.52-1.4-.48-1.24-1.17-1.57-1.17-1.57-.96-.66.07-.65.07-.65 1.06.08 1.61 1.09 1.61 1.09.94 1.6 2.47 1.14 3.07.87.1-.68.37-1.14.67-1.4-2.32-.27-4.75-1.17-4.75-5.2 0-1.15.41-2.08 1.09-2.81-.11-.27-.48-1.36.11-2.84 0 0 .9-.29 2.96 1.08a10.1 10.1 0 012.7-.36c.92 0 1.85.12 2.72.36 2.05-1.37 2.95-1.08 2.95-1.08.59 1.48.22 2.57.11 2.84.68.73 1.09 1.66 1.09 2.81 0 4.05-2.44 4.92-4.77 5.18.38.33.72.97.72 1.96v2.9c0 .28.19.61.72.51 4.15-1.38 7.14-5.27 7.14-9.88C23.02 5.25 18.27.5 12 .5z"/></svg>
          <span class="hidden md:inline">GitHub</span>
        </a>
        <a href="https://www.linkedin.com/in/yourprofile" target="_blank" rel="noopener" class="inline-flex items-center gap-2 touch-btn">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5C3.86 3.5 3 4.37 3 5.49s.86 1.99 1.98 1.99c1.12 0 1.98-.86 1.98-1.99S6.1 3.5 4.98 3.5zM3 8.98H7v11.02H3zM9 8.98h3.7v1.49h.05c.52-.98 1.8-1.99 3.7-1.99 3.96 0 4.7 2.61 4.7 6.01V20H19v-5.01c0-1.2 0-2.99-1.83-2.99-1.83 0-2.12 1.44-2.12 2.9V20H9z"/></svg>
          <span class="hidden md:inline">LinkedIn</span>
        </a>
      </div>
    </div>
  </footer>

  <script> feather.replace(); </script>
</body>
</html>
