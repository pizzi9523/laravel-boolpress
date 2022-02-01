<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{

    public function contact()
    {
        return view('guest.contacts.form');
    }

    public function home()
    {
        return view('guest.welcome');
    }
}