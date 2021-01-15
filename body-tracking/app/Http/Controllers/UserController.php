<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FoodRecom;
use App\Models\BodyTrack;

class UserController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        $user = $request->session()->get('user');
        $error = null;
        return view('user.login', compact('error','user'));
    }

    public function login_eval(Request $request){
        $user = User::select('*')->where('email', $request->email)->get();
        if(!$user->isEmpty() && $request->password == $user[0]->password){
            $user = $user[0];
            $user->isAdmin = false;
            $request->session()->put('user', $user);
            return redirect()->route('home');
        } else{
            $user = $request->session()->get('user');
            $error = array("email_error"=>true, "email"=>$request->email);
            return view('user.login', compact('user', 'error'));
        }
    }

    public function register(Request $request){
        $user = $request->session()->get('user');
        $error = null;
        return view('user.register', compact('user', 'error'));
    }

    public function register_eval(Request $request){
        $user = User::select('email')->where('email', $request->email)->get();
        if(!$user->isEmpty()){
            $user = $request->session()->get('user');
            $error = array("email_error"=>true, "name"=>$request->name, "email"=>$request->email);
            return view('user.register', compact('user', 'error'));
        } else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
            return redirect()->route('user.login');
        }
    }

    public function food(Request $request){
        $user = $request->session()->get('user');
        $food = FoodRecom::all();
        return view('user.food', compact('user', 'food'));
    }

    public function body_track(Request $request){
        $user = $request->session()->get('user');
        $track = BodyTrack::select('*')->where('user_id', $user->id)->get();
        $total = 0;
        foreach ($track as $item){
            $total += $item->weight / pow($item->height, 2);
        }
        if(count($track) > 0){
            $result = $total / count($track);
        }else {
            $result = 0;
        }
        return view('user.body', compact('user','track', 'result'));
    }

    public function workout(Request $request){
        $user = $request->session()->get('user');
        return view('user.workout', compact('user'));
    }

}
