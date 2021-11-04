<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Product;
use Log;
use DB;
use Validator;
use Auth;
use View;
class CategoryController extends Controller
{
    //
    public function index()
	{
		//
		$c = Category::paginate(10);
		return view('admin.categories.index', [
			'c'=>$c,
		]);
	}
	public function edit($id)
	{
		//
		$c  = Category::find($id);
		return View::make('admin.categories.edit')
			->with('c', $c);
	}

	public function create()
	{
		//
		return view('admin.categories.create',[
   
			]);   //
	}

	public function store(Request $request)
	{
		//
		$validator = Validator::make($request->all(), [
			'category_name' => 'required|min:2|max:50',    
			
		]);

		if ($validator->fails()) {
			return redirect('/categories/create')
						->withErrors($validator)
						->withInput();
		}

		DB::beginTransaction();
		try {

			
			$tag = Category::create([
				'category_name'  =>  $request->input('category_name'),
			
				
			]);

			DB::table('activity_logs')->insert([
				'username'  =>  Auth::user()->username.'@'.\Request::ip(),
				'entry'  =>  'added Category :'.$request->input('category_name'),
				'comment'  =>  '',
				'family'  =>  'insert',
				'created_at' => \Carbon\Carbon::now()
				]);

			DB::commit();
			return redirect()->route('categories.index')->with('flash_message', 'Tag Added!!');
			
		} catch (\Exception $e) {
			Log::info($e);
			  DB::rollback();
		   return redirect()->back()->with('flash_error', 'An Error has Occurred');
		}


		
	}

}
