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
        
        $this->validate($request,[
            'categoryName'=>'required',
            'categoryDescription'=>'required',
        ]);
        
        
        //return $request->all();
        $category = new Category();
        $category->categoryName = $request->categoryName;
        $category->categoryDescription = $request->categoryDescription;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();
//        return 'Category info save successfully!';

//        Category::create($request->all());
//        return 'Category info save successfully!';

//        DB::table('categories')->insert([
//            'categoryName' => $request->categoryName,
//            'categoryDescription' => $request->categoryDescription,
//            'publicationStatus' => $request->publicationStatus,
//        ]);
        //return redirect()->back();
        return redirect('/category/add')->with('message','Category info save successfully!');
    }
    
    public function manageCategory()
    {
        $categories = Category::all();
        return view('admin.category.manageCategory',['categories'=>$categories]);
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
        $categoryById = Category::where('id',$id)->first();
        return view('admin.category.editCategory',['categoryById'=>$categoryById]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'categoryName'=>'required',
            'categoryDescription'=>'required',
        ]);
        
        $category = Category::find($request->categoryId);
        $category->categoryName = $request->categoryName;
        $category->categoryDescription = $request->categoryDescription;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();
        return redirect('/category/manage')->with('message','Category info updated successfully!');
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
        return redirect('/category/manage')->with('message','Category info deleted successfully!');
    }
}
