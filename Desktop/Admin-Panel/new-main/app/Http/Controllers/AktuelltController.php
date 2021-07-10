<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\aktuellt;
use App\Models\Home;

class AktuelltController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Aktuellt.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Aktuellt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $main_image ='aktuellt'.$request->file('main_image')->getClientOriginalName();;

        $request->file('main_image')->move(public_path('/aktuellt'),$main_image);

        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name='aktuellt'.$file->getClientOriginalName();
                $file->move(public_path('/aktuellt'),$name);
                $images[]=$name;
            }
        }
        // return $images;

        aktuellt::insert( [
            'main_image' => $main_image,
            'images'=>  implode("|",$images),
            'description' => $input['description'],
            'name' => $input['name'],
        ]);

        // varahus::create($request->all());
        toastr()->info('Added Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\aktuellt  $aktuellt
     * @return \Illuminate\Http\Response
     */
    public function show(aktuellt $aktuellt)
    {
        return view('front.Aktuellt-single',compact('category'));
    }

    public function showItem($id){
        $item = aktuellt::find($id);
        // return $item;
        return view('front.Aktuellt-single-item',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\aktuellt  $aktuellt
     * @return \Illuminate\Http\Response
     */
    public function edit(aktuellt $aktuellt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\aktuellt  $aktuellt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aktuellt $aktuellt)
    {
        $aktuellt->update($request->all());
        toastr()->success('Updated');
        return redirect()->route('aktuellt.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\aktuellt  $aktuellt
     * @return \Illuminate\Http\Response
     */
    public function destroy($aktuellt)
    {
        // return $aktuellt;
        aktuellt::find($aktuellt)->delete();
        toastr()->error('Deleted');
        return redirect()->back();
    }

    public function getCategories()
    {
        $category=Home::all();
        if($category)
        {
           
            return response()->json([
                'success'=>true,
                'data'=>$category,
                'message'=>'All Categories',
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'data'=>[],
                'message'=>'Categories is empty',
            ]);
        }
    }

    public function getProducts()
    {
        $product=aktuellt::all();
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

    public function getProductThroughCategory($id)
    {
        
    }
}
