<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use DB;

use App\Enumeration\ActiveStatus;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.manufacturer.createManufacturer');
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
        //dd($request->all());
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
        ]);
        
        $manufacturerInfo = new Manufacturer();
        $manufacturerInfo->name = $request->name;
        $manufacturerInfo->description = $request->description;
        if($request->active == ActiveStatus::PUBLISHED){
            $manufacturerInfo->active = $request->active;
        }
        $manufacturerInfo->save();
        
        return response()->json(["success"=>true],200);
    }
    
    public function manageManufacturer()
    {
        $manufacturers = Manufacturer::all();
        return response()->json([
            'manufacturers'=>$manufacturers,
            "success" => true
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
        $manufacturerInfo = Manufacturer::where('id',$id)->first();
        return response()->json([
            'manufacturerInfo'=>$manufacturerInfo,
            "success" => true
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
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
        ]);
        
        
        //return $request->all();
        $manufacturerInfo = Manufacturer::where('id',$id)->first();
        $manufacturerInfo->name = $request->name;
        $manufacturerInfo->description = $request->description;
        if($request->active == ActiveStatus::PUBLISHED){
            $manufacturerInfo->active = $request->active;
        }
        if($request->active == null){
            $manufacturerInfo->active = ActiveStatus::UNPUBLISHED;
        }
        $manufacturerInfo->save();
        
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
        $manufacturerInfo = Manufacturer::find($id);
        $manufacturerInfo->delete();
        return response()->json(["success"=>true],200);
    }
}
