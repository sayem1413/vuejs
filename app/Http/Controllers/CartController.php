<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use Cart;

class CartController extends Controller {

    public function addToCart($id) {

        $productInfo = Product::where('id',$id)->first();
        Cart::add([
            'id' => $id,
            'name' => $productInfo->name,
            'price' => $productInfo->price,
            'qty' => 1,
        ]);
        return response()->json(["success"=>true],200);
    }

    public function viewCart() {
        $user = Auth::user();
        if($user){
            $userLoginCheck = true;
        }else{
            $userLoginCheck = false;
        }
        
        $cartInfo = Cart::content();
        return response()->json([
            'cartInfo'=>$cartInfo,
            'userLoginCheck'=>$userLoginCheck
        ],200);
    }

    public function updateCartProduct(Request $request, $id) {
        
        Cart::update($id, $request->qty);
        return response()->json(["success"=>true],200);
    }
    
    public function deleteCartProduct($id) {
        Cart::remove($id);
        return response()->json(["success"=>true],200);
    }

}
