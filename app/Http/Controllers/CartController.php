<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller {

    public function addToCart($id) {
        //echo $id;
        $product_by_id = Product::where('id',$id)->first();
        Cart::add([
            'id' => $id,
            'name' => $product_by_id->product_name,
            'price' => $product_by_id->product_price,
            'qty' => 1,
        ]);
//        $cartProducts = Cart::content();
//        echo '<pre>';
//        print_r($cartProducts);
        //return redirect('/cart/show');
        return response()->json(["success"=>true],200);
    }

    public function viewCart() {
        $cart_products = Cart::content();
        //return view('frontEnd.checkOut.viewCart',['cartProducts' => $cartProducts]);
        return response()->json([
            'cart_products'=>$cart_products
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
