<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Log;
use App\Product;
use App\Category;
class HomeController extends Controller
{
    //
    public function marketplace()
    {
    	$products = Product::where('listing','=','products')
    			->where('visibility','=','active')->get();
    	$categories = Category::get();
    	 return view('marketplace',[
    	 	'products'=>$products,
    	 	'categories'=>$categories,
            ]);
    }
    public function home()
    {
    	$product = Product::where('listing','=','products')->get();
       
        return view('home',[
            ]);
    }
}
