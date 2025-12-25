@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm">
  <h2 class="text-xl font-semibold">Edit Project</h2>

  <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" class="mt-4 grid gap-3">
    @csrf @method('PUT')

    @if($errors->any())
      <div class="mb-3 text-red-600">
        {{ implode(', ', $errors->all()) }}
      </div>
    @endif

    <input name="title" placeholder="Title" value="{{ old('title', $project->title) }}" class="border p-3 rounded" />
    <input name="short_description" placeholder="Short description" value="{{ old('short_description', $project->short_description) }}" class="border p-3 rounded" />
    <textarea name="description" rows="6" placeholder="Description" class="border p-3 rounded">{{ old('description', $project->description) }}</textarea>
    <input type="file" name="thumbnail" class="border p-2 rounded" />
    @if($project->thumbnail)
      <div class="text-sm text-slate-500">Current: <img src="{{ asset($project->thumbnail) }}" alt="{{ $project->title }}" class="inline-block h-10"/></div>
    @endif
    <input name="project_url" placeholder="Live URL" value="{{ old('project_url', $project->project_url) }}" class="border p-3 rounded" />
    <input name="github_url" placeholder="GitHub URL" value="{{ old('github_url', $project->github_url) }}" class="border p-3 rounded" />

    <label class="inline-flex items-center gap-2">
      <input type="checkbox" name="published" value="1" {{ old('published', $project->published) ? 'checked' : '' }}> Published
    </label>
    @error('published') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror

    <div class="flex justify-end">
      <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg">Save</button>
    </div>
  </form>
</div>
@endsection
