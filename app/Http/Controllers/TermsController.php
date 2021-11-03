<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TermsController extends Controller
{
    public function terms() 
    {
        return view('terms.terms-conditions');
    }
    public function privacy() 
    {
        return view('terms.privacy');
    }
}
