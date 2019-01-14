<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.createCategory');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        
        $this->validate($request,[
            'category_name'=>'required',
            'category_description'=>'required',
        ]);
        
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->active = $request->active;
        $category->save();
        return response()->json(["success"=>true],200);
        //return redirect('/category/add')->with('message','Category info save successfully!');
    }
    
    public function manageCategory()
    {
        $categories = Category::all();
        return response()->json([
            'categories'=>$categories
        ],200);
        //return view('admin.category.manageCategory',['categories'=>$categories]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_by_id = Category::where('id',$id)->first();
        return response()->json([
            'category_by_id'=>$category_by_id
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //return $id;

        $this->validate($request,[
            'category_name'=>'required',
            'category_description'=>'required',
        ]);
        
        $category = Category::where('id',$id)->first();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->active = $request->active;
        $category->save();
        return response()->json(["success"=>true],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json(["success"=>true],200);
    }
}
