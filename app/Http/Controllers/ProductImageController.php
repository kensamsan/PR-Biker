<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Log;
use DB;
use App\Product;
class ProductImageController extends Controller
{
    //
 

    public function index($product_id)
    {
        //
        $p= Product::find($product_id);
        $product_image = DB::table('product_images')
            ->where('product_id','=',$product_id)
            ->get();
        return view('admin.products.add_images',[
            'p'=>$p,
            'product_id'=>$product_id,
            'product_image'=>$product_image,
            ]);   //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($product_id,Request $request)
    {
        //
      
        $destinationPath = 'uploads/products';
        $photoExtension = $request->file('file')->getClientOriginalExtension(); 
        $file = 'file'.uniqid().'.'.$photoExtension;
        $request->file('file')->move($destinationPath, $file);

        $g = DB::table('product_images')->insert([
            'product_id'=>$product_id,
            'file_original_name'=>$request->file('file')->getClientOriginalName(),
            'file_name'=>$file,

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id,$id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id,$id)
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
    public function update($product_id,Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
    	Log::info($request);
        //
        DB::table('product_images')
            ->where('product_id','=',$id)
            ->where('file_original_name','=',$request->input('filename'))
            ->delete();
    }

    public function deleteProductImage($id)
    {
        //
        DB::table('product_images')
            ->where('id','=',$id)
            ->delete();
    }


}
