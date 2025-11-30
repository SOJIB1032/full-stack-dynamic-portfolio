@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm">
  <div class="flex items-center justify-between">
    <h2 class="text-xl font-semibold">Admin Dashboard</h2>
    <form method="POST" action="{{ route('admin.logout') }}">
      @csrf
      <button class="px-3 py-2 border rounded-lg">Logout</button>
    </form>
  </div>

  <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="bg-indigo-50 p-4 rounded-xl">
      <div class="text-xs text-slate-500">Projects</div>
      <div class="text-2xl font-bold">{{ $projectsCount }}</div>
    </div>
    <div class="bg-white p-4 rounded-xl">
      <div class="text-xs text-slate-400">Recent messages</div>
      <ul class="mt-3 space-y-2">
        @foreach($messages as $m)
          <li class="p-2 border rounded-md">
            <div class="flex justify-between"><div class="font-semibold">{{ $m->name }}</div><div class="text-xs text-slate-500">{{ $m->created_at->diffForHumans() }}</div></div>
            <div class="text-sm text-slate-600">{{ Str::limit($m->message, 80) }}</div>
          </li>
        @endforeach
      </ul>
    </div>
    <div class="bg-white p-4 rounded-xl">
      <a href="{{ route('admin.projects.index') }}" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded-lg">Manage Projects</a>
      <a href="{{ route('admin.messages') }}" class="inline-block px-4 py-2 ml-2 border rounded-lg">View Messages</a>
    </div>
  </div>
</div>
@endsection
