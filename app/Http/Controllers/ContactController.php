<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Mail\ContactFormMail;
use Mail;

class ContactController extends Controller
{
    public function send(Request $req)
    {
        $data = $req->validate([
            'name'=>'required|string|max:191',
            'email'=>'required|email|max:191',
            'subject'=>'nullable|string|max:191',
            'message'=>'required|string'
        ]);

        $contact = ContactMessage::create($data);

        // send email to site owner
        Mail::to(config('mail.from.address'))->send(new ContactFormMail($contact));

        return back()->with('success','Message sent. I will get back to you soon!');
    }
}
