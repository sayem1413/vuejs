<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;


class WelcomeController extends Controller
{
    public function category($id) {
        
        $publishedCategoryProducts = Product::where('categoryId',$id)
                                  ->where('publicationStatus',1)
                                  ->get();
        //return view('frontEnd.category.categoryContent',['publishedCategoryProducts'=>$publishedCategoryProducts]);
        return response()->json([
            'publishedCategoryProducts'=>$publishedCategoryProducts
        ],200);
    }
    
    public function productDetails($id)
    {
        $productById = Product::where('id',$id)->first();
        //return view('frontEnd.product.productContent',['productById'=>$productById]);
        return response()->json([
            'productById'=>$productById
        ],200);
    }
  
}
