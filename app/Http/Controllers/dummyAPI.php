<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
class dummyAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return ["123"];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        Posts::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,

        ]);
        return ["Result"=>"Data has Been Saved"];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
      
        return $id?Posts::find($id):Posts::all();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
          $dataid = Posts::find($request->id);
          $dataid->name=$request->name;
          $dataid->email=$request->email;
          $dataid->address=$request->address;
          $result = $dataid->save();
        return ["Result"=>"Data has Been Updated"];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts)
    {
        //
    }
    public function search($name)
    {
        return Posts::where("name",$name)->get();
    }
    public function delete($id)
    {
        $dataid=Posts::Find($id);
        $dataid->delete();

        return ["Result"=>"Data has Been DELETED"];

    }
}

