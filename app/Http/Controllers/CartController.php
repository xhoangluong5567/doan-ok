<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderItem;
use App\Product;
use App\User;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
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
    public function remove($rowId)

    {
        $cartItem = $this->get($rowId);
        $content = $this->getContent();
        $content->pull($cartItem->rowId);
        $this->events->dispatch('cart.removed', $cartItem);
        $this->session->put($this->instance, $content);
    }
    public function addProduct(Request $request, $id)
    {
        $products = Product::select('id', 'name', 'price', 'discount', 'quantity', 'status', 'warranty', 'images')->find($id);
        if (!$products) return  redirect('/');



        $price_old = $products->price;
        if ($products->discount) {
            $price_old = $price_old - $products->discount;
        }
        if ($products->quantity == 0) {
            return redirect()->back()->with('warning', 'Xin lỗi, Sản phẩm tạm thời hết hàng.');
        }

        Cart::add([
            'id' => $id,
            'name' => $products->name,
            'qty' => 1,
            'price' => $products->price,
            'options' => [
                'images' => $products->images, 'discount' => $products->discount, 'price_old' => $products->price,
            ]
        ]);
        return back()->with('success', 'Thêm hàng vào giỏ thành công');
    }

    public function showProduct()
    {
        $products = Cart::content();
        return view('frontend.showproduct', compact('products'));
    }

    public function getUpdateCart(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
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





    public function getFormPay()
    {
        $products = Cart::content();


        return view('frontend.shopcart.pay', compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDeleteCart($id)
    {
        if ($id == 'all') {
            Cart::destroy();
        } else {
            Cart::remove($id);
        }
        return back();
    }



    public function postCheckOut(Request $req)
    {
        $cart = Cart::content();
        $user = User::find(Auth::user()->id)->update([
            'address' => $req->address,
        ]);

        $bill = new Order;
        $bill->user_id = Auth::user()->id;
        $bill->date_order = date('Y-m-d H:i:s');
        $bill->total = Cart::total();
        $bill->note = $req->note;
        $bill->save();

        // foreach ($cart->items as $key=> $value) {
        // foreach ($cart->$pr as $item =>$value) {
        if (count($cart) > 0) {
            foreach ($cart as $key => $item) {
                $bill_details = new OrderItem();
                $bill_details->bill_id = $bill->id;
                $bill_details->product_id = $item->id;
                $bill_details->quantity = $item->qty;
                $bill_details->price = $item->price;
                $bill_details->save();
                // dd($bill_details);

                // Session::forget('cart');
            }
            Cart::destroy();
            return redirect('complete');
        }


        // $bill_details->quantity = $quantity->quantity;
        // $bill_details->save();
        // dd($cart);
        // }




    }




    //
    public function getComplete()
    {
        return view('frontend.shopcart.complete');
    }
}
