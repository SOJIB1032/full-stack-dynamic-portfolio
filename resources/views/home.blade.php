@extends('layouts.app')

@section('content')

<!-- Hero -->
<section class="grid md:grid-cols-2 gap-6 items-center">
  <div>
    <div class="text-slate-500">Hi, I'm</div>
    <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">Sojib Hasan — <span class="text-indigo-600">data science & Web Developers</span></h1>
    <p class="mt-4 text-slate-600 max-w-xl">A Computer Science student building clean, accessible web apps and machine learning experiments. I love rural-themed poetry and efficient code.</p>

    <div class="mt-6 flex gap-3">
      <a href="#projects" class="touch-btn bg-indigo-600 text-white rounded-2xl px-4 py-2 shadow card-hover">View Projects</a>
      <a href="#contact" class="touch-btn border rounded-2xl px-4 py-2">Contact</a>
    </div>

    <div class="mt-6 grid grid-cols-3 gap-3">
      <div class="bg-white p-3 rounded-2xl shadow-sm">
        <div class="text-xs text-slate-400">Experience</div>
        <div class="font-semibold">3 internships</div>
      </div>
      <div class="bg-white p-3 rounded-2xl shadow-sm">
        <div class="text-xs text-slate-400">Skills</div>
        <div class="font-semibold">Python . java Springboot · Laravel</div>
      </div>
      <div class="bg-white p-3 rounded-2xl shadow-sm">
        <div class="text-xs text-slate-400">Projects</div>
        <div class="font-semibold">12+ shipped</div>
      </div>
    </div>
  </div>

  <div class="flex justify-center md:justify-end">
    <div class="w-72 h-72 rounded-3xl bg-gradient-to-br from-indigo-50 to-pink-50 flex items-center justify-center shadow-2xl">
      <img src="{{ asset('images/sojib.png') }}" 
     class="w-64 h-64 object-cover rounded-2xl border-4 border-white shadow" />

    </div>
  </div>
</section>

<!-- About -->
<section id="about" class="mt-14">
  <h2 class="text-2xl font-semibold">About Me</h2>
  <p class="mt-3 text-slate-600 max-w-2xl">I’m a CSE student at Daffodil International University interested in data science, machine learning and web development. I enjoy writing poetry and building practical projects that help people.</p>
</section>

<!-- Skills -->
<section id="skills" class="mt-10">
  <h3 class="text-xl font-semibold">Skills</h3>
  <div class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-3">
    <span class="bg-white p-3 rounded-xl shadow-sm">Python</span>
    <span class="bg-white p-3 rounded-xl shadow-sm">TensorFlow</span>
    <span class="bg-white p-3 rounded-xl shadow-sm">Laravel</span>
    <span class="bg-white p-3 rounded-xl shadow-sm">SQL</span>
  </div>
</section>

<!-- Projects -->
<section id="projects" class="mt-12">
  <div class="flex items-center justify-between">
    <h3 class="text-xl font-semibold">Selected Projects</h3>
    <a href="{{ route('home') }}#projects" class="text-sm text-indigo-600">View all</a>
  </div>

  <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
    @foreach($projects as $p)
    <a href="{{ route('projects.show', $p->slug) }}" class="bg-white p-4 rounded-2xl shadow-sm card-hover transform transition duration-200">
      <div class="h-40 w-full rounded-xl overflow-hidden bg-slate-100 flex items-center justify-center">
        @if($p->thumbnail)
          <img src="{{ $p->thumbnail }}" class="w-full h-full object-cover" alt="{{ $p->title }}">
        @else
          <div class="text-slate-400">{{ $p->title }}</div>
        @endif
      </div>
      <h4 class="mt-3 font-semibold">{{ $p->title }}</h4>
      <p class="text-sm text-slate-500 mt-1">{{ $p->short_description }}</p>
      <div class="mt-3 flex items-center justify-between text-xs text-slate-400">
        <div>{{ $p->created_at->format('M Y') }}</div>
        <div class="flex gap-3">
          @if($p->github_url)<a href="{{ $p->github_url }}" target="_blank">GitHub</a>@endif
          @if($p->project_url)<a href="{{ $p->project_url }}" target="_blank">Live</a>@endif
        </div>
      </div>
    </a>
    @endforeach
  </div>
</section>

<!-- Contact -->
<section id="contact" class="mt-12 bg-white p-6 rounded-2xl shadow-sm">
  <h3 class="text-lg font-semibold">Contact Me</h3>

  @if(session('success'))
    <div class="mt-3 text-green-600">{{ session('success') }}</div>
  @endif

  <form action="{{ route('contact.send') }}" method="POST" class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
    @csrf
    <input name="name" placeholder="Your name" value="{{ old('name') }}" class="border p-3 rounded-lg" />
    <input name="email" placeholder="Email" value="{{ old('email') }}" class="border p-3 rounded-lg" />
    <input name="subject" placeholder="Subject" value="{{ old('subject') }}" class="border p-3 rounded-lg md:col-span-2" />
    <textarea name="message" placeholder="Message" rows="5" class="border p-3 rounded-lg md:col-span-2">{{ old('message') }}</textarea>
    <div class="md:col-span-2 flex justify-end">
      <button type="submit" class="bg-indigo-600 text-white rounded-2xl px-5 py-2 touch-btn">Send Message</button>
    </div>
  </form>
</section>

@endsection
