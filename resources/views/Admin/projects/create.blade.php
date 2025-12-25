@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm">
  <h2 class="text-xl font-semibold">Create Project</h2>

  <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="mt-4 grid gap-3">
    @csrf
    @if($errors->any())
      <div class="mb-3 text-red-600">
        {{ implode(', ', $errors->all()) }}
      </div>
    @endif
    <input name="title" placeholder="Title" class="border p-3 rounded" />
    <input name="short_description" placeholder="Short description" class="border p-3 rounded" />
    <textarea name="description" rows="6" placeholder="Description" class="border p-3 rounded"></textarea>
    <input type="file" name="thumbnail" class="border p-2 rounded" />
    <input name="project_url" placeholder="Live URL" class="border p-3 rounded" />
    <input name="github_url" placeholder="GitHub URL" class="border p-3 rounded" />
    <label class="inline-flex items-center gap-2">
      <input type="checkbox" name="published" value="1" {{ old('published', true) ? 'checked' : '' }}> Published
    </label>
    @error('published') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror

    <div class="flex justify-end">
      <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg">Save</button>
    </div>
  </form>
</div>
@endsection
