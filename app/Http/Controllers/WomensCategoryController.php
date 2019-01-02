<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WomensCategoryController extends Controller
{
    public function womensCategoryView()
    {
        return view('frontEnd.womensCategory.womensCategoryContent');
    }
}
