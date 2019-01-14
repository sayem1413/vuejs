<?php

namespace App\Http\Controllers;

use App\Enumeration\ActiveStatus;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class HomeViewController extends Controller {

    public function index() {
        $published_products = Product::where('active', ActiveStatus::PUBLISHED)->get();
        /* return response()->json([
            'publishedProducts'=>$publishedProducts
        ],200); */
        return view('frontEnd.master');
        //return view('frontEnd.home.homeContent', ['publishedProducts'=>$publishedProducts]);
    }
    public function latestProducts(){
        $latest_published_products = Product::where('active', ActiveStatus::PUBLISHED)->latest()->get();
        return response()->json([
            'latest_published_products'=>$latest_published_products
        ],200);
    }

    public function test(){
        return view('home');
    }

}
