<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BodyTrack;

class TrackingController extends Controller
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
        $user = $request->session()->get('user');
        $find = BodyTrack::select('*')->where([['user_id','=' ,$user->id],['week','=', $request->week]])->get();
        // dd($find[0]->id);
        if($find->isEmpty()){
            $new = new BodyTrack();
            $new->user_id = $user->id;
            $new->week = $request->week;
        } else {
            $new = BodyTrack::findorfail($find[0]->id);
        }
        $new->weight = $request->weight;
        $new->height = $request->height;
        $new->save();
        return redirect()->route('user.body_track');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
