<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrderTrackingController extends Controller
{
    //
    public function order()
    {
        
        return view('products.order-tracking');
        
    }
}
