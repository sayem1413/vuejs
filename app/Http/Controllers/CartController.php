<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller {

    public function addToCart($id) {
        //echo $id;
        $productById = Product::where('id',$id)->first();
        Cart::add([
            'id' => $id,
            'name' => $productById->productName,
            'price' => $productById->productPrice,
            'qty' => 1,
        ]);
//        $cartProducts = Cart::content();
//        echo '<pre>';
//        print_r($cartProducts);
        return redirect('/cart/show');
    }

    public function viewCart() {
        $cartProducts = Cart::content();
        return view('frontEnd.checkOut.viewCart',['cartProducts' => $cartProducts]);
    }

    public function deleteCartProduct($id) {
        Cart::remove($id);
        return redirect('/cart/show');
    }

}
