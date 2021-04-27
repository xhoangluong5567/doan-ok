<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Http\Requests\RequestProduct;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'like', '%' . $search . '%')->get();
        $categories = Category::all();

        return view('backend.products.index', ['products' => $products], ['categories' =>  $categories]);
    }

    // public function searchPro(Request $request)
    // {

    //     $search = $request->get('searchpro');
    //     $products = Product::where('name', 'like', '%' . $search . '%')->paginate(10);
    //     return view('backend.products.search', ['products' => $products]);

    // }
    //


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestProduct $requestProduct)
    {

        $filename = $requestProduct->images->getClientOriginalName();
        $product = new Product;
        $product->name = $requestProduct->name;
        $product->images = $filename;
        $product->accessories = $requestProduct->accessories;
        $product->price = $requestProduct->price;
        $product->quantity = $requestProduct->quantity;
        $product->warranty = $requestProduct->warranty;
        $product->discount = $requestProduct->discount;
        $product->status = $requestProduct->status;
        $product->desc = $requestProduct->desc;
        $product->categories_id = $requestProduct->categories_id;
        $product->save();
        $requestProduct->images->move(public_path('upload'), $filename);

        if ($requestProduct->hasFile('images_phu')) {
            foreach ($requestProduct->file('images_phu') as  $file) {
                $image = new ProductImage();
                $fileName = preg_replace("/\s+/", "", $product->name . '_' . $file->getClientOriginalName());
                $fileAddress = $file->move('upload', $fileName);
                $image->name = $fileName;
                $image->image = $fileAddress;
                $image->product_id = $product->id;
                $image->save();
            }
        }

        // $product = Product::create($request->all());
        if ($product) {
            return redirect()->route('products.index');
        }
        return redirect()->route('products.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $categories = Category::all();
    //     $product = \App\Product::find($id);
    //     return view('layouts.frontend.details', array('product' => $product, 'categories' => $categories));
    // }
    public function showhang($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $product_images = ProductImage::where('product_id', '=', $id)->get();
        $comment = Comment::where('product_id', '=', $id)->get();

        return view('frontend.details', array('product' => $product, 'categories' => $categories, 'product_images' => $product_images, 'comment' => $comment));
    }



    public function postComment(Request $request, $id)
    {
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->content = $request->content;
        $comment->product_id = $id;
        $comment->save();
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        $product_images = ProductImage::where('product_id', '=', $id)->get();


        return view('backend.products.edit', ['products' => $products, 'product_images' => $product_images]);
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
        $products = Product::find($id);

        $products->name = $request['name'];
        $products->price = $request['price'];
        $products->quantity = $request['quantity'];
        $products->desc = $request['desc'];
        $products->discount = $request['discount'];


        if ($request['images'] != null) {
            $filename = $request->images->getClientOriginalName();
            $products->images = $request['images'];
            $request->images->move(public_path('upload'), $filename);

            $products->images = $filename;
        }

        $products->categories_id = $request['categories_id'];
        $products->save();


        if ($request->hasFile('images_phu')) {
            foreach ($request->file('images_phu') as  $file) {
                $image = new ProductImage();
                $fileName = preg_replace("/\s+/", "", $products->name . '_' . $file->getClientOriginalName());
                $fileAddress = $file->move('upload', $fileName);
                $image->name = $fileName;
                $image->image = $fileAddress;
                $image->product_id = $products->id;
                $image->save();
            }
        }

        if ($products) {
            return redirect()->route('products.index');
        }
        return redirect()->route('products.edit');
    }


    //


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
        //
    }
    public function action($action, $id)
    {
        if ($action) {
            $products = Product::find($id);
            switch ($action) {
                case 'active':
                    $products->active = $products->active ? 0 : 1;
                    break;
                case 'hot':
                    $products->hot = $products->hot ? 0 : 1;
                    break;
            }
            $products->save();
        }
        return redirect()->back();
    }
}
