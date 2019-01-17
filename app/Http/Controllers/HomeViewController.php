<?php

namespace App\Http\Controllers;

use App\Enumeration\ActiveStatus;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class HomeViewController extends Controller {

    public function index() {
        $publishedProducts = Product::where('active', ActiveStatus::PUBLISHED)->get();
        return view('frontEnd.master');
    }
    public function latestProducts(){
        $latestPublishedProducts = Product::where('active', ActiveStatus::PUBLISHED)->latest()->get();
        return response()->json([
            'latestPublishedProducts'=>$latestPublishedProducts,
            'success' => true
        ],200);
    }

    public function test(){
        return view('home');
    }

}
