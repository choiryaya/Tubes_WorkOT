<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\FoodRecom;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        if(!$user || !$user->isAdmin){
            $error = null;
            return view('admin.login', compact('user','error'));
        } else {
            $food = FoodRecom::all();
            return view('admin.dashboard', compact('user', 'food'));
        }
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
        //
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

    public function login(Request $request){
        $user = $request->session()->get('user');
        $error = null;
        return view('admin.login', compact('error','user'));
    }

    public function login_eval(Request $request){
        $user = Admin::select('*')->where('email', $request->email)->get();
        if(!$user->isEmpty() && $request->password == $user[0]->password){
            $user = $user[0];
            $user->isAdmin = true;
            $request->session()->put('user', $user);
            return redirect()->route('admin.index');
        } else{
            $user = $request->session()->get('user');
            $error = array("email_error"=>true, "email"=>$request->email);
            return view('admin.login', compact('user', 'error'));
        }
    }

}
