<?php

namespace App\Http\Controllers;

use App\Enumeration\ActiveStatus;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Product;
use DB;


class WelcomeController extends Controller
{
    public function category($id) {
        
        $categoryWiseProducts = Product::where('category_id',$id)
                                  ->where('active', ActiveStatus::PUBLISHED)
                                  ->get();
        return response()->json([
            'categoryWiseProducts'=>$categoryWiseProducts,
            'success' => true,
        ],200);
    }
    
    public function productDetails($id)
    {
        $productInfo = Product::where('id',$id)->first();
        return response()->json([
            'productInfo'=>$productInfo,
            'success' => true,
        ],200);
    }

    public function checkAuth(){
        return response()->json([
            'authCheck'=>Auth::check()
        ],200);
    }
  
}
