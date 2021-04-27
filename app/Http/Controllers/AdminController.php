<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\RequestRegister;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function getLogin() {
        return view('backend.login');
    }


    public function postLogin(Request $request) {
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if($request->remember_me = 'Remember Me'){
            $remember = true;
        }else{
            $remember = false;
        }

        if(Auth::attempt($arr, $remember)) {
            return redirect()->intended('admin');

        }
        else {
            return back()->withInput()->with('error','Tài khoản hoặc mật khẩu không đúng');
        }

    }
    public function getLogout(){
        Auth::logout();
        return redirect()->intended('login');
    }

    public function getRegister() {
        return view('backend.register');
    }

    public function postRegister(RequestRegister $requestRegister) {
        $user = new User();
        $user->name = $requestRegister->name;
        $user->password =bcrypt($requestRegister->password);
        $user->email = $requestRegister->email;
        $user->phone =($requestRegister->phone);

        $user->save();

        if($user->id) {

            return redirect()->intended('login')->with('success', 'Thao tác thành công');;
        }
        return redirect()->back();

    }

    public function getSearch(Request $request) {
        $result = $request->result;
        $keyword = $result;
        $result =str_replace('','%',$result);
        $items = Product::where('name','like','%'.$result.'%')->get();
        return view('frontend.search', array('items'=> $items, 'keyword' => $keyword));
        
        
    }




        
        


        
    //
}
