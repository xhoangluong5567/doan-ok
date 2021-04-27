<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function profile()
    {
        // $totalOrder = Order::where('id',get_data_user('web'))
        // ->sellec('id')->count();


        return view('frontend.user.profile');
    }

    public function updateInfo()
    {
        $user = User::find(get_data_user('web'));
        return view('frontend.user.info', compact('user'));
    }

    public function SaveUpdateInfo(Request $request)
    { 
        User::where('id',get_data_user('web'))->update($request->except('_token'));

        

        return redirect()->back()->with('success','Cập nhật thông tin thành công');

    }
}
