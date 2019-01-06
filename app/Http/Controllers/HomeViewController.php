<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class HomeViewController extends Controller {

    public function index() {
        $publishedProducts = Product::where('publicationStatus',1)->get();
        /* return response()->json([
            'publishedProducts'=>$publishedProducts
        ],200); */
        return view('frontEnd.master');
    }

}
