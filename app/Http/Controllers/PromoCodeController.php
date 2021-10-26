<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PromoCode;
use App\Product;
use App\Category;
use App\PromoCodeSpecific;
use Log;
use DB;
use Validator;
use Auth;
use View;

class PromoCodeController extends Controller
{
    //
    public function active($id)
	{

		$promo = PromoCode::find($id);
		if($promo->type=='firstorder')
		{
			$firstorderpromos = PromoCode::where('type','=','firstorder')->update(['active'=>0]);
		}
		$promo->active = 1;
		$promo->save();
		return redirect()->route('admin.promo-codes.index')->with('flash_message', 'Activated!!');

		//Log::info($promo->type);
		
		// return redirect('admin_customer_care');
	}

	public function inactive($id)
	{

		$promo = PromoCode::find($id);
		$promo->active = 0;
		$promo->save();
		// return redirect('admin_customer_care');
		return redirect()->route('admin.promo-codes.index')->with('flash_message', 'Deactivated!!');
	}

	
	public function setBanner($id)
	{
		//
		$p = PromoCode::where('id','=',$id)->first();
		if($p->type=='shipping')
		{
			return redirect()->route('admin.promo-codes.index')->with('flash_error', 'Shipping cannot be set as banner!!');
		}
		else
		{
			PromoCode::query()->update(['banner' => 0]);
			$p->banner = 1;
			$p->save(); 
		}

	
		return redirect()->route('admin.promo-codes.index')->with('flash_message', 'Promo Code Set as Banner!!');
	}

	public function index()
	{
		//
		$p = PromoCode::paginate(10);
		// Log::info($p);
		return view('admin.promo-code.index', [
			'promo_codes'=>$p,
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
		$product = Product::get();
		$category = Category::get();
		return view('admin.promo-code.create', [
			'product'=>$product,
			'category'=>$category,
		]);
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


		$date_to = ($request->input('date_to') == '' ? null : $request->input('date_to'));
		$validator = Validator::make($request->all(), [
			'code' => 'required|unique:promo_codes',    		
			// 'label' => 'required|min:2|max:1000',  
			'description' => 'required|min:2|max:255',  
			'type' => 'required',    
			'target' => 'required',    
			'date_from' => 'required|date',    
			'value' => 'required',    
			'order' => 'required',    
			'discount_type' => 'required',    
			
		]);

		if ($validator->fails()) {
			return redirect()
				->route('admin.promo-codes.create')
				->withErrors($validator)
				->withInput();
		}


		DB::beginTransaction();
		try {

		  	$promo_code = PromoCode::create([
				'code'  =>  $request->input('code'),
				'description'  =>  $request->input('description'),
				'label'  =>  $request->input('label'),
				'type'  =>  $request->input('type'),
				'target'  =>  $request->input('target'),
				'date_from'  =>  $request->input('date_from'),
				'date_to'  =>  $date_to,
				'value'  =>  $request->input('value'),
				'order'  =>  $request->input('order'),
				'discount_type'  =>  $request->input('discount_type'),
				'discount_amount'  =>  0,
				'over'  =>  $request->input('over'),
				
			]);

			if($request->discount_type=='category')
			{
				PromoCodeSpecific::where('promo_code_id','=',$promo_code->id)->delete();
				foreach($request->category_ids as $x)
				{
					PromoCodeSpecific::create([
						'category_id'=>$x,
						'promo_code_id'=>$promo_code->id,
					]);
				}
			}
			elseif($request->discount_type=='product')
			{
				PromoCodeSpecific::where('promo_code_id','=',$promo_code->id)->delete();
				foreach($request->product_ids as $x)
				{
					PromoCodeSpecific::create([
						'product_id'=>$x,
						'promo_code_id'=>$promo_code->id,
					]);
				}
			}
			

			DB::table('activity_logs')->insert([
				'username'  =>  Auth::user()->username.'@'.\Request::ip(),
				'entry'  =>  'added Promo Code :'.$request->input('code'),
				'comment'  =>  '',
				'family'  =>  'insert',
				'created_at' => \Carbon\Carbon::now()
				]);

			 DB::commit();
			return redirect()->route('admin.promo-codes.index')->with('flash_message', 'Promo Code Added!!');
		
			
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
		$p = PromoCode::find($id);
		$product = Product::get();
		$category = Category::get();
		$specific = PromoCodeSpecific::where('promo_code_id','=',$id)->get();
		return view('admin.promo-code.edit', [
		    'p'=>$p,
		    'specific'=>$specific,
		    'product'=>$product,
		    'category'=>$category,
		]);
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
		// Log::info($request);

		$date_to = ($request->input('date_to') == '' ? null : $request->input('date_to'));
	
		$validator = Validator::make($request->all(), [
			'code' => 'required|unique:promo_codes,code,'.$id,    
			'description' => 'required|min:2|max:255',    
			// 'label' => 'required|min:2|max:1000',    
			'type' => 'required',    
			'target' => 'required',    
			'date_from' => 'required|date',    
			'value' => 'required',    
			'order' => 'required',    

			
		]);
		if ($validator->fails()) {
			return redirect()
				->route('admin.promo-codes.edit',$id)
						->withErrors($validator)
						->withInput();
		}

		

		DB::beginTransaction();
		try {

				
				DB::table('activity_logs')->insert([
					'username'  =>  Auth::user()->username.'@'.\Request::ip(),
					'entry'  =>  'updated promo code id '.$request->input('id'),
					'comment'  =>  '',
					'family'  =>  'update',
					'created_at' => \Carbon\Carbon::now()
					]);
				$x = PromoCode::find($id);
				$x->code = $request->input('code');
				$x->label = $request->input('label');
				$x->description = $request->input('description');
				$x->type = $request->input('type');
				$x->target = $request->input('target');
				$x->date_from = $request->input('date_from');
				$x->date_to = $request->input('date_to');
				$x->value = $request->input('value');
				$x->order = $request->input('order');
				$x->date_to = $date_to;
				$x->discount_type = $request->input('discount_type');
				$x->discount_amount = $request->input('discount_amount');
				$x->over = $request->input('over');


				if($request->discount_type=='category')
				{
					PromoCodeSpecific::where('promo_code_id','=',$id)->delete();
					foreach($request->category_ids as $i)
					{
						PromoCodeSpecific::create([
							'category_id'=>$i,
							'promo_code_id'=>$id,
						]);
					}
				}
				elseif($request->discount_type=='product')
				{
					PromoCodeSpecific::where('promo_code_id','=',$id)->delete();
					foreach($request->product_ids as $i)
					{
						PromoCodeSpecific::create([
							'product_id'=>$i,
							'promo_code_id'=>$id,
						]);
					}
				}
				


				$x->save(); 
				DB::commit();
				return redirect()->route('admin.promo-codes.index')->with('flash_message', 'Promo-code Updated!!');

		
		
			
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
		DB::table('activity_log')->insert([
			'username'  =>  Auth::user()->username.'@'.\Request::ip(),
			'entry'  =>  'deleted promo-code '.$id,
			'comment'  =>  '',
			'family'  =>  'delete',
			'created_at' => \Carbon\Carbon::now()
		]);


		PromoCode::where('id',$id)->delete();
		return redirect()->route('admin.promo-codes.index')->with('flash_message', 'Promo-Code Deleted!!');
	}
}
