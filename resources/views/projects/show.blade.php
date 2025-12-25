@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm">
  <div class="grid md:grid-cols-3 gap-6">
    <div class="col-span-2">
      <h1 class="text-2xl font-semibold">{{ $project->title }}</h1>
      <p class="text-slate-500 mt-2 ">{{ $project->short_description }}</p>
      <div class="mt-4 prose prose-sm md:prose">
        {!! nl2br(e($project->description)) !!}
      </div>

      <div class="mt-6 flex gap-3">
        @if($project->github_url) <a href="{{ $project->github_url }}" class="px-4 py-2 bg-gray-900 text-white border rounded-lg">GitHub</a> @endif
        @if($project->project_url) <a href="{{ $project->project_url }}" class="px-4 py-2 bg-gray-900 text-white rounded-lg">Live</a> @endif
      </div>
    </div>

    <div>
      <div class="h-64 w-full rounded-xl overflow-hidden bg-slate-100">
        @if($project->thumbnail) <img src="{{ asset($project->thumbnail) }}" class="w-full h-full object-cover" alt="{{ $project->title }}" /> @endif
      </div>
    </div>
  </div>
</div>
@endsection
