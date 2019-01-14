<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;


class WelcomeController extends Controller
{
    public function category($id) {
        
        $published_category_products = Product::where('category_id',$id)
                                  ->where('active',1)
                                  ->get();
        //return view('frontEnd.category.categoryContent',['published_category_products'=>$published_category_products]);
        return response()->json([
            'published_category_products'=>$published_category_products
        ],200);
    }
    
    public function productDetails($id)
    {
        $product_by_id = Product::where('id',$id)->first();
        //return view('frontEnd.product.productContent',['product_by_id'=>$product_by_id]);
        return response()->json([
            'product_by_id'=>$product_by_id
        ],200);
    }
  
}
