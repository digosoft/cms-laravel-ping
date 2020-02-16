<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\catagory;
use App\Http\Requests\Catagories\CreateCatagoryRequest;
use App\Http\Requests\Catagories\UpdateCatagoryRequest;


class CatagoriesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catagories.index')->with('catagories',  catagory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('catagories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCatagoryRequest $request)
    {
      catagory::create([
          'name' => $request->name,
      ]);
 
      session()->flash('message', 'Task was successful!');
      return redirect(route('catagories.index'));


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
    public function edit(Catagory $catagory)
    {
       return view('catagories.create')->with('catagory', $catagory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatagoryRequest $request, catagory $catagory)
    { 
    //    $catagory->name = $request->name;
    //    $catagory->save();
        $catagory->update([
            'name' =>$request->name,
        ]);

       session()->flash('message', 'Update successfully');
       return redirect()->route('catagories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = catagory::find($id);
        $data->delete();
        return redirect()->route('catagories.index')->with('message', 'Caragory Delete Successfully');
    }
}
