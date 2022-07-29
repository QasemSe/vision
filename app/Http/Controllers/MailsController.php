<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailsController extends Controller
{
    public function send_mail()
    {
        Mail::to('admin@gmail.com')->send(new TestMail());
    }

    public function contact_us()
    {
        return view('forms.contact_us');
    }

    public function contact_us_data(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'image' => 'required'
        ]);

        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $img_name);

        Mail::to('contact@gmail.com')->send(new ContactUsMail($request->except('_token'), $img_name));
    }
}
