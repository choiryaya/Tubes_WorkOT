<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodRecom;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = $request->session()->get('user');
        return view('admin.food_add', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new FoodRecom();
        $path = public_path().'/images';
        $new->name = $request->name;
        $new->description = $request->desc;
        $image = $request->file('image');
        $image->move($path.'/food', $image->getClientOriginalName());
        $new->image = "images/food/".$image->getClientOriginalName();
        $new->save();
        return redirect()->route('admin.index');
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
    public function edit(Request $request, $id)
    {
        $user = $request->session()->get('user');
        $food = FoodRecom::findorfail($id);
        return view('admin.food_edit', compact('user','food'));
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
        $item = FoodRecom::findorfail($id);
        $item->name = $request->name;
        $item->description = $request->desc;
        if($request->hasFile('image')){
            $path = public_path().'/images';
            $image = $request->file('image');
            $image->move($path.'/food', $image->getClientOriginalName());
            $item->image = "images/food/".$image->getClientOriginalName();
        } else {
            $item->image = $item->image;
        }
        $item->save();
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $item = FoodRecom::findorfail($request->id);
        $item->delete();
        return redirect()->route('admin.index');    
    }
}
