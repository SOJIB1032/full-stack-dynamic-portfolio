@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm">
  <div class="flex justify-between items-center">
    <h2 class="text-xl font-semibold">Projects</h2>
    <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">New Project</a>
  </div>

  <table class="w-full mt-4">
    <thead>
      <tr class="text-left text-sm text-slate-500">
        <th>Title</th><th>Published</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($projects as $p)
      <tr class="border-t">
        <td class="py-3">{{ $p->title }}</td>
        <td>{{ $p->published ? 'Yes':'No' }}</td>
        <td>
          <a href="{{ route('admin.projects.edit', $p) }}" class="px-3 py-1 border rounded">Edit</a>
          <form action="{{ route('admin.projects.destroy', $p) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete?')">
            @csrf @method('DELETE')
            <button class="px-3 py-1 border rounded">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="mt-4">
    {{ $projects->links() }}
  </div>
</div>
@endsection
