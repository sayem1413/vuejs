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
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required|not_in:""',
            'manufacturer_id' => 'required|not_in:""',
            'price' => 'required',
            'quantity' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'image' => 'required',
            'active' => 'required|not_in:""',
        ]);

        /* $strpos = strpos($request->image,';');
        $sub = substr($request->image,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->image)->resize(200, 200);
        $uploadPath = public_path()."/productImage/";
        $img->save($uploadPath.$name);
        $this->saveProductInfo($request, $name); */

        $productImage = $request->file('image');
        Image::make($productImage)->resize(200, 200);
        $imageName =  time().'_'.$productImage->getClientOriginalName();
        $uploadPath = 'productImage/';
        $productImage->move($uploadPath, $imageName);
        $imageUrl = $uploadPath . $imageName;
        $this->saveProductInfo($request, $imageUrl);

        
        return response()->json(["success"=>true],200);
    }

    protected function saveProductInfo($request, $imageUrl) {
        $productInfo = new Product();
        $productInfo->name = $request->name;
        $productInfo->category_id = $request->category_id;
        $productInfo->manufacturer_id = $request->manufacturer_id;
        $productInfo->price = $request->price;
        $productInfo->quantity = $request->quantity;
        $productInfo->short_description = $request->short_description;
        $productInfo->long_description = $request->long_description;
        $productInfo->image = $imageUrl;
        $productInfo->active = $request->active;
        $productInfo->save();
    }

    public function manageProduct() {
        //$products = Product::all();
        $products = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
                ->select('products.id', 'products.name', 'categories.name as category_name', 'manufacturers.name as manufacturer_name', 'products.price', 'products.quantity', 'products.short_description', 'products.long_description', 'products.image', 'products.active')
                ->get();
        return response()->json([
            'products'=>$products,
            'success' => true
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $productInfo = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
                ->select('products.*', 'categories.name as category_name', 'manufacturers.name as category_name')
                ->where('products.id', $id)
                ->first();
        return view('admin.product.viewProduct', ['productInfo' => $productInfo]);
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
        $productInfo = Product::where('id', $id)->first();
        return response()->json([
            'productInfo'=>$productInfo
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
            'name' => 'required',
            'category_id' => 'required|not_in:""',
            'manufacturer_id' => 'required|not_in:""',
            'price' => 'required',
            'quantity' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'image' => 'required',
            'active' => 'required|not_in:""',
        ]);

        $imageUrl = $this->imageExistStatus($request, $id);

        $this->updateProductInfo($request, $imageUrl, $id);
        return response()->json(["success"=>true],200);
    }

    private function imageExistStatus($request, $id) {
        $productInfoById = Product::where('id', $id)->first();
        $productImage = $request->file('image');
        $oldImage = $productInfoById->image;
        
        if($productImage!=$oldImage){
            if($oldImage){
                unlink($oldImage);
            }
            Image::make($productImage)->resize(200, 200);
            $imageName =  time().'_'.$productImage->getClientOriginalName();
            $uploadPath = 'productImage/';
            $productImage->move($uploadPath, $imageName);
            $imageUrl = $uploadPath . $imageName;
        }else{
            $imageUrl = $oldImage;
        }
        return $imageUrl;
    }

    protected function updateProductInfo($request, $imageUrl, $id) {
        $productInfo = Product::find($id);
        $productInfo->name = $request->name;
        $productInfo->category_id = $request->category_id;
        $productInfo->manufacturer_id = $request->manufacturer_id;
        $productInfo->price = $request->price;
        $productInfo->quantity = $request->quantity;
        $productInfo->short_description = $request->short_description;
        $productInfo->long_description = $request->long_description;
        $productInfo->image = $imageUrl;
        $productInfo->active = $request->active;
        $productInfo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $productInfo = Product::find($id);

        $image = $productInfo->image;
        if(file_exists($image)){
            unlink($image);
        }
        $productInfo->delete();
        return response()->json(["success"=>true],200);
    }

}
