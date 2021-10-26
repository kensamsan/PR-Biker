<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\ActivityLog;
use DB;
use Hash;
use Validator;
use Auth;
use Log;
use Session;
class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $val = ['created_at','desc'];
        if(!empty(Input::get('sort_by')) && (strpos(Input::get('sort_by'), '.') !== false))
        {
            $val = explode(".",Input::get('sort_by'));
        }
        $activity_logs = ActivityLog::where(function ($query) use ($request)
            {      
                if(!empty($request->search))
                {
                    $query->where('username','like', '%'.$request->search.'%');
                    $query->orWhere('entry','like', '%'.$request->search.'%');
                    $query->orWhere('family','like', '%'.$request->search.'%');
                    $query->orWhere(function($q) use ($request){
                        $q->whereDate('created_at','=',$request->search);
                    });
                }
                // if(!empty($request->categories) && $request->categories !== 'All')
                // {
                //     $query->where('family','like', '%'.$request->categories.'%');
                // }
            })
            ->orderBy($val[0],$val[1])
            ->paginate(10);   

        return view('admin.activity_logs',
            [
                'activity_logs' => $activity_logs,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
