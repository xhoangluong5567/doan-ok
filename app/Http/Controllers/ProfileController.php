<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    public function getBillUser(Request $request) {
        $user = Auth::user()->id;
        $orders = Order::where('user_id','=',$user)->get();
        return view('frontend.user.bill-user', ['orders'=>$orders]);
    }

    public function getBillDetails($id)
    {
        $userInfo = Auth::user();
        $order = Order::find($id);

        return view('frontend.user.bill-details', [
            'user'=>$userInfo,
            'order' => $order,
        ]);
    }
    public function destroy(Request $request,$id)
    {
        $bill = Order::find($id);
        $bill->delete();
        $request->session()->flash('message', "Huỷ đơn hàng thành công");

        return back();
    }
}
