<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at','desc')->paginate(12);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            'title'=>'required|string|max:191',
            'short_description'=>'nullable|string|max:255',
            'description'=>'nullable|string',
            'thumbnail'=>'nullable|image|max:2048',
            'project_url'=>'nullable|url',
            'github_url'=>'nullable|url',
            'published'=>'nullable|boolean'
        ]);

        if ($req->hasFile('thumbnail')) {
            $path = $req->file('thumbnail')->store('projects','public');
            $data['thumbnail'] = '/storage/' . $path;
        }
        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(6);
        $data['published'] = $req->has('published');

        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success','Project created');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $req, Project $project)
    {
        $data = $req->validate([
            'title'=>'required|string|max:191',
            'short_description'=>'nullable|string|max:255',
            'description'=>'nullable|string',
            'thumbnail'=>'nullable|image|max:2048',
            'project_url'=>'nullable|url',
            'github_url'=>'nullable|url',
            'published'=>'nullable|boolean'
        ]);

        if ($req->hasFile('thumbnail')) {
            $path = $req->file('thumbnail')->store('projects','public');
            $data['thumbnail'] = '/storage/' . $path;
        }

        $data['published'] = $req->has('published');
        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success','Project updated');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return back()->with('success','Project deleted');
    }
}
