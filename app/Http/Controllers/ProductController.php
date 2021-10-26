<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Category;
use App\Tag;
use App\Transaction;
use App\ProductTag;
use App\PromoCodeSpecific;
use DB;
use Session;
use Validator;
use Auth;
use View;
use Carbon\Carbon;
use Log;
class ProductController extends Controller
{
    //
    public function show($id)
    {
		$p = Product::find($id);
    	return view('products.show', [
			'p'=>$p,
		]);
    }
    public function adjustStock(Request $request)
	{


		$p = Product::find($request->product_id);
		
		$on_stock = $p->transaction->where('type', 'po')->sum('qty') - $p->transaction->where('type', 'so')->sum('qty');
		if($request->quantity>$on_stock)
		{
	
			$transaction = Transaction::create([	
				'product_id'=>$request->input('product_id'),
				'qty'=>$request->input('quantity')-$on_stock,
				'user_id'=>Auth::user()->id,
				'type'=>'po',
			]);
		}

		if($request->quantity<$on_stock)
		{

			$transaction = Transaction::create([	
				'product_id'=>$request->input('product_id'),
				'qty'=>$on_stock-$request->input('quantity'),
				'user_id'=>Auth::user()->id,
				'type'=>'so',
			]);
		}
		
		

		return redirect()->route('admin.product.stock',$request->input('product_id'))->with('flash_message', 'Stock Adjusted!!');
	}
    public function addstock(Request $request)
    {
    	
    	$transaction = Transaction::create([
			'product_id'=>$request->input('product_id'),
			'qty'=>$request->input('quantity'),
			'user_id'=>Auth::user()->id,
			'type'=>'po',
		]);

		return redirect()->route('admin.product.stock',$request->input('product_id'))->with('flash_message', 'Stock Added!!');
    }
    public function stock($id)
    {
 
    	$p = Product::find($id);
    	return view('admin.products.stock', [
			'p'=>$p,
		]);
    }
    public function active($id)
	{

		$lookbook = Product::find($id);
		$lookbook->visibility = 'active';
		$lookbook->save();
		return redirect()->route('product-type.index',['products'])->with('flash_message', 'Activated!!');
	}

	public function inactive($id)
	{

		$lookbook = Product::find($id);
		$lookbook->visibility = 'inactive';
		$lookbook->save();
		return redirect()->route('product-type.index',['products'])->with('flash_message', 'Deactivated!!');
	}

	public function index(Request $request)
	{
		//
		Log::info($request);
	

		if($request->search=='')
		{
			$products = Product::where('listing','=','products')->paginate(10);
		}
		else
		{
			$products = Product::where('listing','=','products')->Where(function ($query) use ($request) {
				$query->where('product_code','like', '%'.$request->search.'%')
				->orWhere('product_name','like', '%'.$request->search.'%');
			})
			->paginate(10);
		}
		
		// Log::info($p);
		return view('admin.products.index', [
			'products'=>$products,
		]);
	}

    public function indexByType(Request $request,$type)
	{
		//
	

		if($request->search=='')
		{
			$products = Product::where('listing','=',$type)->paginate(10);
		}
		else
		{
			$products = Product::where('listing','=',$type)->Where(function ($query) use ($request) {
				$query->where('product_code','like', '%'.$request->search.'%')
				->orWhere('product_name','like', '%'.$request->search.'%');
			})
			->paginate(10);
		}
		
		// Log::info($p);
		return view('admin.products.index', [
			'products'=>$products,
		]);
	}
	public function create()
    {
        //

		$tags = Tag::get();
        $categories = Category::get();
        return view('admin.products.create',[
        	'categories'=>$categories,
        	'tags'=>$tags,
        	]);
    }

    public function store(Request $request)
    {
    
		$validator = Validator::make($request->all(), [
			'category_id' => 'required',    
			'product_name' => 'required|min:2|max:50',    
			'visibility' => 'required',    
			'price' => 'numeric|required',    
			
		]);

		if ($validator->fails()) {
			return redirect()
				->route('admin-products.create')
						->withErrors($validator)
						->withInput();
		}


		 DB::beginTransaction();
            try
            {
				$product = Product::create([
					'category_id'  =>  $request->input('category_id'),
					'product_code'  =>  $request->input('product_code'),
					'product_name'  =>  $request->input('product_name'),
					'description'  =>  $request->input('description'),
					'details'  =>  $request->input('details'),
					'visibility'  =>  $request->input('visibility'),
					'price'  =>  $request->input('price'),

				]);
					if($request->input('tag_id'))
					{
						foreach($request->input('tag_id') as $x)
						{
							ProductTag::create([
								'tag_id'=>$x,
								'product_id'=>$product->id,
							]);
						}

					}
					

					DB::table('activity_logs')->insert([
					'username'  =>  Auth::user()->username.'@'.\Request::ip(),
					'entry'  =>  'added Product :'.$request->input('product_code'),
					'comment'  =>  '',
					'family'  =>  'insert',
					'created_at' => \Carbon\Carbon::now()
					]);

				// Log::info($product);
                DB::commit();
                return redirect()->route('product-type.index',['products'])->with('flash_message', 'Product Created!!');
            }
            catch(\Exception $e)
            {
                DB::rollback();
                Log::alert($e);
                abort(500);
            }
            catch(\Throwable $e)
            {
                DB::rollback();
                Log::alert($e);
                abort(500);
            }

	 
	
	

		return redirect()->route('admin.product.index')->with('flash_message', 'Product Added!!');

    }

     public function update(Request $request,$id)
    {
    

		$validator = Validator::make($request->all(), [
			'category_id' => 'required',    
			'product_name' => 'required|min:2|max:50',    
			'visibility' => 'required',    
			// 'fulfillment' => 'required',    
			
		]);

		if ($validator->fails()) {
			return redirect()
				->route('admin-products.edit',[$id])
						->withErrors($validator)
						->withInput();
		}


		 DB::beginTransaction();
            try
            {
            	$product = Product::find($id);
            	$product->category_id = $request->input('category_id');
            	$product->product_name = $request->input('product_name');
            	$product->description = $request->input('description');
            	$product->details = $request->input('details');
            	$product->visibility = $request->input('visibility');
            	$product->price = $request->input('price');
            	$product->save();
			
				DB::table('activity_logs')->insert([
				'username'  =>  Auth::user()->username.'@'.\Request::ip(),
				'entry'  =>  'updated Product :'.$request->input('product_name'),
				'comment'  =>  '',
				'family'  =>  'update',
				'created_at' => \Carbon\Carbon::now()
				]);

				if($request->input('tag_id'))
				{
					ProductTag::where('product_id','=',$product->id)->delete();
					foreach($request->input('tag_id') as $x)
					{
						ProductTag::create([
							'tag_id'=>$x,
							'product_id'=>$product->id,
						]);
					}

				}

				



				// Log::info($product);
                DB::commit();
                return redirect()->route('product-type.index',['products'])->with('flash_message', 'Product Updated!!');
            }
            catch(\Exception $e)
            {
                DB::rollback();
                Log::alert($e);
                abort(500);
            }
            catch(\Throwable $e)
            {
                DB::rollback();
                Log::alert($e);
                abort(500);
            }

	 
	
	

		return redirect()->route('admin.product.index')->with('flash_message', 'Product Added!!');

    }


    public function edit($id)
	{
		//
		$p = Product::find($id);
		$categories = Category::get();
		$tags = Tag::get();
		$specific = ProductTag::where('product_id','=',$id)->get();


		return view('admin.products.edit', [
		    'p'=>$p,
		    'categories'=>$categories,
		    'tags'=>$tags,
		    'specific'=>$specific,
		]);
	}

}
