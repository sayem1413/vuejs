<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use DB;
use Image;

class ProductController extends Controller {

    public function index() {
        $categories = Category::where('publicationStatus', 1)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        return view('admin.product.createProduct', ['categories' => $categories, 'manufacturers' => $manufacturers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'productName' => 'required',
            'productPrice' => 'required',
            'productImage' => 'required',
        ]);

        $strpos = strpos($request->productImage,';');
        $sub = substr($request->productImage,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->productImage)->resize(200, 200);
        $upload_path = public_path()."/public/productImage/";
        $img->save($upload_path.$name);

        /* $productImage = $request->file('productImage');
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName; */

        $this->saveProductInfo($request, $name);
        return response()->json(["success"=>true],200);
    }

    protected function saveProductInfo($request, $name) {
        $product = new Product();
        $product->productName = $request->productName;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productShortDescription = $request->productShortDescription;
        $product->productLongDescription = $request->productLongDescription;
        $product->productImage = $name;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }

    public function manageProduct() {
        //$products = Product::all();
        $products = DB::table('products')
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                ->select('products.id', 'products.productName', 'categories.categoryName', 'manufacturers.manufacturerName', 'products.productPrice', 'products.productQuantity', 'products.productShortDescription', 'products.productLongDescription', 'products.productImage', 'products.productImage', 'products.publicationStatus')
                ->get();
        return response()->json([
            'products'=>$products
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $productById = DB::table('products')
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                ->select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
                ->where('products.id', $id)
                ->first();
        return view('admin.product.viewProduct', ['product' => $productById]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //$categories = Category::where('publicationStatus', 1)->get();
        //$manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        /* $productById = DB::table('products')
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                ->select('products.*','categories.id as categoryId', 'categories.categoryName','manufacturers.id as manufacturerId', 'manufacturers.manufacturerName')
                ->where('products.id', $id)
                ->first(); */
        //return view('admin.product.editProduct', ['productById' => $productById, 'categories' => $categories, 'manufacturers' => $manufacturers]);
        $productById = Product::where('id', $id)->first();
        return response()->json([
            'productById'=>$productById
        ],200);
        /* return view('admin.product.editProduct')
                        ->with('productById', $productById)
                        ->with('categories', $categories)
                        ->with('manufacturers', $manufacturers); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'productName' => 'required',
            'productPrice' => 'required',
            'productImage' => 'required',
        ]);
        
        $imageUrl = $this->imageExistStatus($request, $id);

        $this->updateProductInfo($request, $imageUrl, $id);
        return response()->json(["success"=>true],200);
    }

    private function imageExistStatus($request, $id) {
        $productById = Product::where('id', $id)->first();
        $productImage = $request->productImage;
        if(file_exists($productImage)) {
            //unlink($productById->productImage);
            $strpos = strpos($request->productImage,';');
            $sub = substr($request->productImage,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->productImage)->resize(200, 200);
            $upload_path = public_path()."/public/productImage/";
            $img->save($upload_path.$name);
        } else {
            $name = $productById->productImage;
        }
        return $name;
    }

    protected function updateProductInfo($request, $imageUrl, $id) {
        $product = Product::find($id);
        $product->productName = $request->productName;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productShortDescription = $request->productShortDescription;
        $product->productLongDescription = $request->productLongDescription;
        $product->productImage = $imageUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::find($id);
        /* if(file_exists($product->productImage)){
            unlink($product->productImage);
        } */
        $product->delete();
        return response()->json(["success"=>true],200);
    }

}
