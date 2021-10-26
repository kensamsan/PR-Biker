<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;
use App\Product;
use Log;
use DB;
use Validator;
use Auth;
use View;

class TagController extends Controller
{
    //
    public function active($id)
	{

		$category = Tag::find($id);
		$category->active = 1;
		$category->save();
		return redirect()->route('admin.tag.index')->with('flash_message', 'Activated!!');
	}

	public function inactive($id)
	{

		$category = Tag::find($id);
		$category->active = 0;
		$category->save();
		return redirect()->route('admin.tag.index')->with('flash_message', 'Deactivated!!');
	}

	public function index()
	{
		//
		$t = Tag::paginate(10);
		return view('admin.tags.index', [
			't'=>$t,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		return view('admin.tags.create',[
   
			]);   //
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
		$validator = Validator::make($request->all(), [
			'tag_name' => 'required|min:2|max:50',    
			
		]);

		if ($validator->fails()) {
			return redirect('/tags/create')
						->withErrors($validator)
						->withInput();
		}

		DB::beginTransaction();
		try {

			if($request->file('photo')==null || $request->file('photo')=='')
			{
				$photo='';
			}
			else
			{

			 $destinationPath = 'uploads/tag';
			 $photoExtension = $request->file('photo')->getClientOriginalExtension(); 
			 $photo = 'photo'.\Carbon\Carbon::now()->timestamp.'.'.$photoExtension;
			 $request->file('photo')->move($destinationPath, $photo);
			}
			
		 
			$tag = Tag::create([
				'tag_name'  =>  $request->input('tag_name'),
				'photo'  =>  $photo,
				
			]);

			DB::table('activity_logs')->insert([
				'username'  =>  Auth::user()->username.'@'.\Request::ip(),
				'entry'  =>  'added Tag :'.$request->input('tag_name'),
				'comment'  =>  '',
				'family'  =>  'insert',
				'created_at' => \Carbon\Carbon::now()
				]);

			DB::commit();
			return redirect()->route('admin.tag.index')->with('flash_message', 'Tag Added!!');
			
		} catch (\Exception $e) {
			Log::info($e);
			  DB::rollback();
		   return redirect()->route('register')->with('flash_error', 'An Error has Occurred');
		}


		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
		$t  = Tag::find($id);
		return View::make('admin.tags.edit')
			->with('t', $t);
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
		//
		$validator = Validator::make($request->all(), [
			'tag_name' => 'required|min:2|max:50',    
			
		]);
		if ($validator->fails()) {
			return redirect()
						->route('admin.tag.edit',$id)
						->withErrors($validator)
						->withInput();
		}


		DB::beginTransaction();
		try {

			
			$x = Tag::find($id);

			if($request->file('photo')==null || $request->file('photo')=='')
			{
			 $photo='';
			}
			else
			{

			 $destinationPath = 'uploads/tag';
			 $photoExtension = $request->file('photo')->getClientOriginalExtension(); 
			 $photo = 'photo'.\Carbon\Carbon::now()->timestamp.'.'.$photoExtension;
			 $request->file('photo')->move($destinationPath, $photo);

			 $x->photo = $photo;
			}

			
			DB::table('activity_logs')->insert([
				'username'  =>  Auth::user()->username.'@'.\Request::ip(),
				'entry'  =>  'updated Tag id '.$request->input('id'),
				'comment'  =>  '',
				'family'  =>  'update',
				'created_at' => \Carbon\Carbon::now()
				]);

			$x->tag_name = $request->input('tag_name');
			$x->save(); 
			DB::commit();
			return redirect()->route('admin.tag.index')->with('flash_message', 'Tag Updated!!');

			
		
			
		} catch (\Exception $e) {
			Log::info($e);
			  DB::rollback();
		   return redirect()->route('register')->with('flash_error', 'An Error has Occurred');
		}


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
