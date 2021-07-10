<?php

namespace App\Http\Controllers;

use App\category;
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
        $category = category::all();
        if ($category) {

            return response()->json([
                'success' => true,
                'data' => $category,
                'message' => 'All Products',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Product is empty',
            ]);
        }
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
        if ($request->has('image')) {
            $file_name = $request->image->getClientOriginalName();
            $generated_new_name = time() . '.' . $file_name;
            $request->image->move('public/category', $generated_new_name);
            $category =    category::create([
                'name' => $request['name'],
                'image' => 'public/category/' . $generated_new_name,


            ]);
        } else {
            $user =   category::create([
                'name' => $request['name'],

            ]);
        }
        toastr()->info('Data Add');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
        toastr()->error('Data Deleted');
        return redirect()->back();
    }
}
