<?php

namespace App\Http\Controllers;

use App\Enumeration\ActiveStatus;

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
            'name'=>'required',
            'description'=>'required',
        ]);
        
        $categoryInfo = new Category();
        $categoryInfo->name = $request->name;
        $categoryInfo->description = $request->description;
        if($request->active == ActiveStatus::PUBLISHED){
            $categoryInfo->active = $request->active;
        }
        $categoryInfo->save();
        return response()->json(["success"=>true],200);
    }
    
    public function manageCategory()
    {
        $categories = Category::all();
        return response()->json([
            'categories'=>$categories
        ],200);

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
        $categoryInfo = Category::where('id',$id)->first();
        return response()->json([
            'categoryInfo'=>$categoryInfo,
            "success"=>true
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
            'name'=>'required',
            'description'=>'required',
        ]);
        
        $categoryInfo = Category::where('id',$id)->first();
        $categoryInfo->name = $request->name;
        $categoryInfo->description = $request->description;
        if($request->active == ActiveStatus::PUBLISHED){
            $categoryInfo->active = $request->active;
        }
        if($request->active == null){
            $categoryInfo->active = ActiveStatus::UNPUBLISHED;
        }
        $categoryInfo->save();
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
        $categoryInfo = Category::find($id);
        $categoryInfo->delete();
        return response()->json(["success"=>true],200);
    }
}
