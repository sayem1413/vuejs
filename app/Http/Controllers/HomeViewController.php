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
<<<<<<< HEAD
    }
    public function latestProducts(){
        $latestPublishedProducts = Product::where('publicationStatus',1)->latest()->get();
        return response()->json([
            'latestPublishedProducts'=>$latestPublishedProducts
        ],200);
=======
>>>>>>> 1d6aafad38d36499c1fbaf2ee1493ac21f5e7aaf
    }

}
