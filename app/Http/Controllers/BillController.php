<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Order;
use App\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
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


        $customerInfo = DB::table('customers')
            ->join('orders', 'customers.id', '=', 'orders.customer_id')
            ->select('customers.*', 'orders.id as bill_id', 'orders.total as orders_total', 'orders.note as orders_note', 'orders.status as orders_status')
            ->where('customers.id', '=', $id)
            ->first();

        $billInfo = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.bill_id')
            ->leftjoin('products', 'order_items.product_id', '=', 'products.id')
            ->where('orders.customer_id', '=', $id)
            ->select('orders.*', 'order_items.*', 'products.name as product_name')
            ->get();

        $this->data['customerInfo'] = $customerInfo;
        $this->data['billInfo'] = $billInfo;

        return view('backend.bill.edit', $this->data);
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
