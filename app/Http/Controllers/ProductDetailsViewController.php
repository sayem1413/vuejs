<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductDetailsViewController extends Controller
{
    public function viewProductDetails()
    {
        return view('frontEnd.productDetails.viewProductDetails');
    }
}
