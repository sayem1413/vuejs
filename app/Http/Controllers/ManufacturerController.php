<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;

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
        $this->validate($request,[
            'manufacturer_name'=>'required',
            'manufacturer_description'=>'required',
        ]);
        
        
        //return $request->all();
        $manufacturer = new Manufacturer();
        $manufacturer->manufacturer_name = $request->manufacturer_name;
        $manufacturer->manufacturer_description = $request->manufacturer_description;
        $manufacturer->active = $request->active;
        $manufacturer->save();
        
        return response()->json(["success"=>true],200);
    }
    
    public function manageManufacturer()
    {
        $manufacturers = Manufacturer::all();
        return response()->json([
            'manufacturers'=>$manufacturers
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
        $manufacturer_by_id = Manufacturer::where('id',$id)->first();
        return response()->json([
            'manufacturer_by_id'=>$manufacturer_by_id
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
            'manufacturer_name'=>'required',
            'manufacturer_description'=>'required',
        ]);
        
        
        //return $request->all();
        $manufacturer = Manufacturer::where('id',$id)->first();
        $manufacturer->manufacturer_name = $request->manufacturer_name;
        $manufacturer->manufacturer_description = $request->manufacturer_description;
        $manufacturer->active = $request->active;
        $manufacturer->save();
        
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
        $manufacturer = Manufacturer::find($id);
        $manufacturer->delete();
        return response()->json(["success"=>true],200);
    }
}
