<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use DB;

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

        $productImage = $request->file('productImage');
        $imageName = $productImage->getClientOriginalName();
        $uploadPath = 'public/productImage/';
        $productImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName;

        $this->saveProductInfo($request, $imageUrl);
        return redirect('/product/add')->with('message', 'Product Info save successfully!');
    }

    protected function saveProductInfo($request, $imageUrl) {
        $product = new Product();
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

    public function manageProduct() {
        //$products = Product::all();
        $products = DB::table('products')
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                ->select('products.id', 'products.productName', 'categories.categoryName', 'manufacturers.manufacturerName', 'products.productPrice', 'products.productQuantity', 'products.productShortDescription', 'products.productLongDescription', 'products.productImage', 'products.productImage', 'products.publicationStatus')
                ->get();
        return view('admin.product.manageProduct', ['products' => $products]);
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
        $categories = Category::where('publicationStatus', 1)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        $productById = Product::where('id', $id)->first();
        //return view('admin.product.editProduct', ['productById' => $productById, 'categories' => $categories, 'manufacturers' => $manufacturers]);
        return view('admin.product.editProduct')
                        ->with('productById', $productById)
                        ->with('categories', $categories)
                        ->with('manufacturers', $manufacturers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $this->validate($request, [
            'productName' => 'required',
            'productPrice' => 'required',
            'productImage' => 'required',
        ]);
        
        $imageUrl = $this->imageExistStatus($request);

        $this->updateProductInfo($request, $imageUrl);
        return redirect('/product/manage')->with('message', 'Product Info update successfully!');
    }

    private function imageExistStatus($request) {
        $productById = Product::where('id', $request->productId)->first();
        $productImage = $request->file('productImage');
        if($productImage) {
            unlink($productById->productImage);
            $imageName = $productImage->getClientOriginalName();
            $uploadPath = 'public/productImage/';
            $productImage->move($uploadPath, $imageName);
            $imageUrl = $uploadPath . $imageName;
        } else {
            $imageUrl = $productById->productImage;
        }
        return $imageUrl;
    }

    protected function updateProductInfo($request, $imageUrl) {
        $product = Product::find($request->productId);
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
        $product->delete();
        return redirect('/product/manage')->with('message', 'Product Info deleted successfully!');
    }

}
