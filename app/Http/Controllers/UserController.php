<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('backend.user.index', array('user'=>$user));
    }

    public function action($action, $id)
    {
        if ($action) {
            $user = User::find($id);
            switch ($action) {
                case 'active':
                    $user->active = $user->active ? 0 : 1;
                    break;
                case 'hot':
                    $user->hot = $user->hot ? 0 : 1;
                    break;
               
            }
            $user->save();
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request->password),
            'level' => $request['level'],

        ]);




        
        if($users) {
            return redirect()->back();
        }
        return redirect()->route('users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \App\User::find($id);
        return view('user.show', array('user' => $user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $users = User::find($id);
        
    
            return view('backend.user.edit',array('user'=>$users));
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
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request->password);
        $user->level = $request['level'];
        $user->save();
        if($user){
            return redirect()->route('user.index');
        }
        return redirect()->route('user.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');//
    }

}
