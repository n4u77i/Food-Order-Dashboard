<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=product::all();
        if($product)
        {
           
            return response()->json([
                'success'=>true,
                'data'=>$product,
                'message'=>'All Products',
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'data'=>[],
                'message'=>'Product is empty',
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
        return view('product.create');

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
            $request->image->move('public/product', $generated_new_name);
            $category =    product::create([
                'name' => $request['name'],
                'image' => 'public/product/' . $generated_new_name,
                'category_id' => $request['category_id'],
                'description'=>$request['description'],

        


            ]);
        } else {
            $user =   product::create([
                'name' => $request['name'],

            ]);
        }
        toastr()->info('Data Add');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        // return $aktuellt;
        $product->delete();
        toastr()->error('Deleted');
        return redirect()->back();
    }

    public function getProductThroughCategory( $id)
    {
       
        $data = product::where('category_id',$id)->get();
        if($data)
        {
           
            return response()->json([
                'success'=>true,
                'data'=>$data,
                'message'=>' Products',
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'data'=>[],
                'message'=>'Product is empty',
            ]);
        }



    }

    public function getPage()
    {
        return view('product.index');
 
    }
}
