<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MensCategoryController extends Controller
{
    public function mensCategoryView()
    {
        return view('frontEnd.mensCategory.mensCategoryContent');
    }
}
