<?php

namespace App\Http\Controllers;

use App\Enumeration\ActiveStatus;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use DB;
use Image;

class ProductController extends Controller {

    public function index() {
        $categories = Category::where('active',  ActiveStatus::PUBLISHED)->get();
        $manufacturers = Manufacturer::where('active',  ActiveStatus::PUBLISHED)->get();
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
            'product_name' => 'required',
            'category_id' => 'required|not_in:""',
            'manufacturer_id' => 'required|not_in:""',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_short_description' => 'required',
            'product_long_description' => 'required',
            'product_image' => 'required',
            'active' => 'required|not_in:""',
        ]);

        $strpos = strpos($request->product_image,';');
        $sub = substr($request->product_image,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->product_image)->resize(200, 200);
        $upload_path = public_path()."/productImage/";
        $img->save($upload_path.$name);

        /* $product_image = $request->file('product_image');
        $image_name = $product_image->getClientOriginalName();
        $upload_path = 'productImage/';
        $product_image->move($upload_path, $image_name);
        $imageUrl = $upload_path . $image_name; */

        $this->saveProductInfo($request, $name);
        return response()->json(["success"=>true],200);
    }

    protected function saveProductInfo($request, $name) {
        $product = new Product();
        $product->name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->price = $request->product_price;
        $product->quantity = $request->product_quantity;
        $product->short_description = $request->product_short_description;
        $product->long_description = $request->product_long_description;
        $product->image = $name;
        $product->active = $request->active;
        $product->save();
    }

    public function manageProduct() {
        //$products = Product::all();
        $products = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
                ->select('products.id', 'products.name', 'categories.name as category_name', 'manufacturers.name as manufacturer_name', 'products.price', 'products.quantity', 'products.short_description', 'products.long_description', 'products.image', 'products.active')
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
        $product_by_id = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
                ->select('products.*', 'categories.name as category_name', 'manufacturers.name as category_name')
                ->where('products.id', $id)
                ->first();
        return view('admin.product.viewProduct', ['product' => $product_by_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //$categories = Category::where('active', 1)->get();
        //$manufacturers = Manufacturer::where('active', 1)->get();
        /* $product_by_id = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
                ->select('products.*','categories.id as category_id', 'categories.categoryName','manufacturers.id as manufacturer_id', 'manufacturers.manufacturerName')
                ->where('products.id', $id)
                ->first(); */
        //return view('admin.product.editProduct', ['product_by_id' => $product_by_id, 'categories' => $categories, 'manufacturers' => $manufacturers]);
        $product_by_id = Product::where('id', $id)->first();
        return response()->json([
            'product_by_id'=>$product_by_id
        ],200);
        /* return view('admin.product.editProduct')
                        ->with('product_by_id', $product_by_id)
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
            'product_name' => 'required',
            'category_id' => 'required|not_in:""',
            'manufacturer_id' => 'required|not_in:""',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_short_description' => 'required',
            'product_long_description' => 'required',
            'product_image' => 'required',
            'active' => 'required|not_in:""',
        ]);

        $imageUrl = $this->imageExistStatus($request, $id);

        $this->updateProductInfo($request, $imageUrl, $id);
        return response()->json(["success"=>true],200);
    }

    private function imageExistStatus($request, $id) {
        $product_by_id = Product::where('id', $id)->first();

        if($request->product_image!=$product_by_id->image){
            $strpos = strpos($request->product_image,';');
            $sub = substr($request->product_image,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->product_image)->resize(200, 200);
            $upload_path = public_path()."/productImage/";
            $image = $upload_path. $product_by_id->image;
            $img->save($upload_path.$name);

            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $product_by_id->image;
        }
        return $name;
    }

    protected function updateProductInfo($request, $imageUrl, $id) {
        $product = Product::find($id);
        $product->name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->price = $request->product_price;
        $product->quantity = $request->product_quantity;
        $product->short_description = $request->product_short_description;
        $product->long_description = $request->product_long_description;
        $product->image = $imageUrl;
        $product->active = $request->active;
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

        $image_path = public_path()."/productImage/";
        $image = $image_path. $product->image;
        if(file_exists($image)){
            @unlink($image);
        }
        $product->delete();
        return response()->json(["success"=>true],200);
    }

}
