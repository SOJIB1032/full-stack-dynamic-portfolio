<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::where('published', true)->orderBy('created_at','desc')->take(6)->get();
        return view('home', compact('projects'));
    }
}
