<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BillController extends Controller
{
    public function index()
    {
        // $products = Product::all();

        // $this->data['title'] = 'Quản lý hóa đơn';
        // $customers = DB::table('customers')
        //             ->orderBy('id', 'desc')
        //             ->get();
        // $this->data['customers'] = $customers;
        // return view('backend.bill.index', $this->data);

        // cai ni la` lay dsach user ma`
        //t k cos bang bill bill = orders billitem = orders-items

        $orders = Order::all()->sortByDesc('id');

        return view('backend.bill.index', ['orders' => $orders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userInfo = Auth::user();
        $order = Order::find($id);

        return view('backend.bill.edit', [
            'user'=>$userInfo,
            'order' => $order,
        ]);
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
        $bill = Order::find($id);
        $bill->status = $request->input('status');
        $bill->save();
        $request->session()->flash('message', "Cập nhật thành công");
        return redirect('admin/bill');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $bill = Order::find($id);
        $bill->delete();
        $request->session()->flash('message', "Xoá đơn hàng thành công");

        return Redirect::to('admin/bill');
    }
}
