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
            'manufacturerName'=>'required',
            'manufacturerDescription'=>'required',
        ]);
        
        
        //return $request->all();
        $manufacturer = new Manufacturer();
        $manufacturer->manufacturerName = $request->manufacturerName;
        $manufacturer->manufacturerDescription = $request->manufacturerDescription;
        $manufacturer->publicationStatus = $request->publicationStatus;
        $manufacturer->save();
        
        return redirect('/manufacturer/add')->with('message','Manufacturer info save successfully!');
    }
    
    public function manageManufacturer()
    {
        $manufacturers = Manufacturer::all();
        return view('admin.manufacturer.manageManufacturer', ['manufacturers'=>$manufacturers]);
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
        $manufacturerById = Manufacturer::where('id',$id)->first();
        return view('admin.manufacturer.editManufacturer',['manufacturerById'=>$manufacturerById]);
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
            'manufacturerName'=>'required',
            'manufacturerDescription'=>'required',
        ]);
        
        
        //return $request->all();
        $manufacturer = Manufacturer::find($request->manufacturerId);
        $manufacturer->manufacturerName = $request->manufacturerName;
        $manufacturer->manufacturerDescription = $request->manufacturerDescription;
        $manufacturer->publicationStatus = $request->publicationStatus;
        $manufacturer->save();
        
        return redirect('/manufacturer/manage')->with('message','Manufacturer info updated successfully!');
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
        return redirect('/manufacturer/manage')->with('message','Manufacturer info deleted successfully!');
    }
}
