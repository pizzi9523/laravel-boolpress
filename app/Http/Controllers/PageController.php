<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function sendForm(Request $request)
    {
        ddd($request);
    }

    public function index()
    {
        return view('guest.contacts.form');
    }
}