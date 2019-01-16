<?php

namespace App\Http\Controllers;

use App\Enumeration\ActiveStatus;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;


class WelcomeController extends Controller
{
    public function category($id) {
        
        $categoryWiseProducts = Product::where('category_id',$id)
                                  ->where('active', ActiveStatus::PUBLISHED)
                                  ->get();
        //return view('frontEnd.category.categoryContent',['published_category_products'=>$published_category_products]);
        return response()->json([
            'categoryWiseProducts'=>$categoryWiseProducts
        ],200);
    }
    
    public function productDetails($id)
    {
        $productInfo = Product::where('id',$id)->first();
        //return view('frontEnd.product.productContent',['product_by_id'=>$product_by_id]);
        return response()->json([
            'productInfo'=>$productInfo
        ],200);
    }
  
}
