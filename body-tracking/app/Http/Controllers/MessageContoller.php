<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageContoller extends Controller
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
        $new = new Message();
        $new->user_id = $request->id_user;
        $new->message = $request->message;
        $new->isAdmin = $user->isAdmin;
        $new->save();
        if(!$user->isAdmin){
            return redirect()->route('user.consult');
        }else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = $request->session()->get('user');
        $msg = Message::join('users', 'users.id','=','messages.user_id')->select('messages.*', 'users.name as username')->where('user_id','=', $id)->get();
        // dd($msg);
        return view('admin.consult', compact('user', 'msg', 'id'));
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

    public function admin_user_list(Request $request){
        $user = $request->session()->get('user');
        $users = Message::join('users', 'users.id','=','messages.user_id')->select('user_id', 'users.name as username')->groupby('user_id')->get();
        return view('admin.user_list', compact('user', 'users'));
    }

    public function user_consult(Request $request){
        $user = $request->session()->get('user');
        $msg = Message::select('*')->where('user_id', '=', $user->id)->get();
        return view('user.consult', compact('user', 'msg'));
    }

}
