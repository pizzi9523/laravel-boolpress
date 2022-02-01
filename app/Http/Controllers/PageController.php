<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function sendForm(Request $request)
    {
        $validateData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required'
            ]
        );

        //return (new ContactFormMailable($validateData))->render();
        Mail::to('example@admin.com')
            ->cc($validateData['email'])
            ->send(new ContactFormMailable($validateData));

        return redirect()->back()->with('message', 'Message sent succesfully');
    }



    public function index()
    {
        return view('guest.contacts.form');
    }
}