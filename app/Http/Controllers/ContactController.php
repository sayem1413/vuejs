<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactView()
    {
        return view('frontEnd.contact.contact');
    }
}
