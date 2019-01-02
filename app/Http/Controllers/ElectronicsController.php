<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElectronicsController extends Controller
{
    public function electronicsView()
    {
        return view('frontEnd.electronics.electronicsContent');
    }
}
