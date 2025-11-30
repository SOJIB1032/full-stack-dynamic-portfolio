<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\Project;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $username = env('ADMIN_USERNAME');
        $password = env('ADMIN_PASSWORD');

        if ($request->username === $username && $request->password === $password) {
            $request->session()->put('is_admin', true);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['Invalid credentials']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('is_admin');
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $projectsCount = Project::count();
        $messages = ContactMessage::orderBy('created_at','desc')->take(10)->get();
        return view('admin.dashboard', compact('projectsCount','messages'));
    }

    public function messages()
    {
        $messages = ContactMessage::orderBy('created_at','desc')->get();
        return view('admin.messages', compact('messages'));
    }

    public function markRead($id)
    {
        $msg = ContactMessage::findOrFail($id);
        $msg->read = true;
        $msg->save();
        return back()->with('success','Marked read');
    }
}
