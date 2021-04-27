<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\RequestCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  
    {
    $categories = Category::all();
        return view('backend.categories.index', array('categories' => $categories));
  
        
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCategory $requestCategory)
    {
        //
        $categories = Category::create($requestCategory->all());
        if($categories) {
            return redirect()->route('categories.index');
        }
        return redirect()->route('categories.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('frontend.categories', array('category' => $category));
        //
    }

    public function action($action, $id)
    {
        if ($action) {
            $categories = Category::find($id);
            switch ($action) {
                case 'active':
                    $categories->active = $categories->active ? 0 : 1;
                    break;
               
            }
            $categories->save();
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
    

        return view('backend.categories.edit',array('categories'=>$categories));
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
        $categories = Category::find($id);
        $categories->name = $request['name'];
        // $categories->categories_id = $request['categories_id'];
        $categories->save();
        if($categories){
            return redirect()->route('categories.index');
        }
        return redirect()->route('categories.edit');
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
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->route('categories.index');
        //
    }
}
