<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsCodesController extends Controller
{
    public function productsCodesView()
    {
        return view('frontEnd.productsShortCode.productsCodes');
    }
}
