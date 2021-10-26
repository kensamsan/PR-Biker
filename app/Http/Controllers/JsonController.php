<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TravelPass;
use App\TravelPassTransaction;
use App\TravelPassAttachment;
use App\PurposeType;
use App\User;
use App\Passenger;
use App\PassengerAttachment;
use App\CheckPoint;
use DB;
use Hash;
use Validator;
use Auth;
use Log;
use Response;
use Session;
use Illuminate\Support\Facades\Input;
use PDF;
use QrCode;
use Mail;
use URL;
class JsonController extends Controller
{
    //
    public function mobileRemarks(Request $request )
    {
        
        $tp =TravelPass::where('tracking_no','=',$request->id)->first();
        $tp->remarks = $request->remarks;
        $tp->save();
        $t =  TravelPassTransaction::create([
                        'travel_pass_id' => $tp->id,
                        'status' => 'exit',                            
                        'description' => 'Checkpoint Remark :'.$tp->remarks,
                    ]);
        return Response::json(['success' => true], 200,[],JSON_PRETTY_PRINT);
    }
    public function mobileLogin(Request $request)
    {
        $credentials = [
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        ];
        $user = User::where('username','=',Input::get('username'))->whereNull('deleted_at')->first();
        if(!empty($user))
        {
           return Response::json(['success' => true], 200,[],JSON_PRETTY_PRINT);
        }
        else
        {
             return Response::json(['success' => false], 200,[],JSON_PRETTY_PRINT);
        }
    }
    public function fetchTravelPassInformationByTrackingNo($tracking_no)
    {
    	$travel_pass_information = NULL;
    	$travel_pass = TravelPass::select([
    			'travel_passes.id',
                'travel_passes.type',
                'travel_passes.age',
    			'travel_passes.tracking_no',
                'travel_passes.first_name',
                'travel_passes.middle_name',
                'travel_passes.last_name',
                DB::raw('IF(travel_passes.middle_name IS NOT NULL,CONCAT(travel_passes.first_name," ",travel_passes.middle_name," ",travel_passes.last_name),CONCAT(travel_passes.first_name," ",travel_passes.last_name)) as full_name'),
                'travel_passes.contact_no',
                'travel_passes.email',
                'travel_passes.residence',
                'travel_passes.barangay',
                'travel_passes.municipality_city',
                'travel_passes.province',
                'travel_passes.departure_date',
                'travel_passes.place_of_origin',
                'travel_passes.return_date',
                'travel_passes.place_of_destination',
                'travel_passes.mode_of_transport',
                'travel_passes.plate_no',
                'travel_passes.model_type',
                'travel_passes.status',
                'travel_pass_attachments.government_id',
                'travel_pass_attachments.old_medical_certificate',
                'travel_pass_attachments.barangay_certificate',
                'travel_pass_attachments.bhert_health_declaration',
                'travel_pass_attachments.certificate_of_employment',
                'travel_pass_attachments.rapid_test_result',
                'travel_pass_attachments.new_medical_certificate',
                'travel_pass_attachments.medical_certificate_issued_by_city_health_office',
                'travel_pass_attachments.is_valid_medical_certificate_issued_by_city_health_office',
                'travel_pass_attachments.travel_pass_or_travel_authority',
                'travel_passes.remarks',
                'travel_passes.is_issuance',
                'travel_passes.entry_point',
                'travel_passes.exit_point',
                'travel_passes.time_travel',
                'travel_passes.entry_point_time',
                'travel_passes.exit_point_time',
                DB::raw('(SELECT purpose_types.name FROM purpose_types WHERE purpose_types.deleted_at is NULL and purpose_types.id = travel_passes.purpose_type_id) as purpose'),
    		])
    		->where(function($query) use ($tracking_no)
    		{
    			$query->whereNull('travel_passes.deleted_at');
    			$query->whereNull('travel_pass_attachments.deleted_at');
    		})
    		->leftJoin('travel_pass_attachments','travel_pass_attachments.travel_pass_id','=','travel_passes.id')
    		->where('tracking_no','=',$tracking_no)
    		->first();
    	if(!empty($travel_pass))
    	{
            $travel_pass_type = '';
            if(strcasecmp($travel_pass->type,'resident') == 0)
            {
                $travel_pass_type = 'Local Traveller';
            }
            elseif(strcasecmp($travel_pass->type,'incoming_visitor') == 0)
            {
                $travel_pass_type = 'Incoming Visitor';
            }
            elseif(strcasecmp($travel_pass->type,'frequent_traveller') == 0)
            {
                $travel_pass_type = 'Frequent Traveller';
            }
            elseif(strcasecmp($travel_pass->type,'pass_through') == 0)
            {
                $travel_pass_type = 'Pass Through';
            }
            else
            {
                $travel_pass_type = strtoupper($travel_pass->type);
            }
            $mode_of_transport_text = '';
            if(strpos($travel_pass->mode_of_transport, '|') !== false)
            {
                $current_mode_of_transports = explode('|',$travel_pass->mode_of_transport);
                $current_plate_nos = explode('|',$travel_pass->plate_no);
                $current_model_types = explode('|',$travel_pass->model_type);
                foreach($current_mode_of_transports as $key => $mtransport)
                {
                    if($key == 0)
                    {
                            $mode_of_transport_text = ucwords($mtransport).((!empty($current_model_types[$key]) && strcasecmp($current_model_types[$key], 'none') != 0) ? '('.ucwords($current_model_types[$key]).')' : '').((!empty($current_plate_nos[$key]) && strcasecmp($current_plate_nos[$key], 'none') != 0) ? '/ Plate No. '.ucwords($current_plate_nos[$key]) : '');
                    }
                    else
                    {
                        $mode_of_transport_text .= ','.ucwords($mtransport).((!empty($current_model_types[$key]) && strcasecmp($current_model_types[$key], 'none') != 0) ? '('.ucwords($current_model_types[$key]).')' : '').((!empty($current_plate_nos[$key]) && strcasecmp($current_plate_nos[$key], 'none') != 0) ? '/ Plate No. '.ucwords($current_plate_nos[$key]) : '');
                    }
                }
            }
            else
            {
                $mode_of_transport_text = ucwords($travel_pass->mode_of_transport).(!empty($travel_pass->model_type) ? '('.ucwords($travel_pass->model_type).')' : '').(!empty($travel_pass->plate_no) ? '/ Plate No. '.strtoupper($travel_pass->plate_no) : '');
            }
            $passengers = Passenger::with('attachment')->whereNull('deleted_at')->where('travel_pass_id','=',$travel_pass->id)->get();
            if(count($passengers) > 0)
            {
                $passengers->map(function ($value){
                    $value->attachment->government_id = !empty($value->attachment->government_id) ? url('/uploads/passenger_government_id/'.$value->attachment->government_id) : NULL;
                    $value->attachment->medical_certificate = !empty($value->attachment->medical_certificate) ? url('/uploads/passenger_old_medical_certificate/'.$value->attachment->medical_certificate) : NULL;
                    $value->attachment->travel_pass_or_travel_authority = !empty($value->attachment->travel_pass_or_travel_authority) ? url('/uploads/passenger_travel_pass_or_travel_authority/'.$value->attachment->travel_pass_or_travel_authority) : NULL;
                });
            }






    		$travel_pass_information = collect([
	    		'id' => $travel_pass->id,
                'type' => $travel_pass_type,
                'purpose' => !empty($travel_pass->purpose) ? ucwords($travel_pass->purpose) : NULL,
                'age' => $travel_pass->age,
                'remarks' => !empty($travel_pass->remarks) ? (ucwords(strtolower($travel_pass->remarks)).((!empty($travel_pass->is_issuance) && strcasecmp($travel_pass->is_issuance,'yes') == 0) ? '(Rapid test on next issuance)' : '')) : NULL,
                'is_issuance' => $travel_pass->is_issuance,
	    		'tracking_no' => $travel_pass->tracking_no,
	    		'first_name' => $travel_pass->first_name,
	    		'middle_name' => $travel_pass->middle_name,
	    		'last_name' => $travel_pass->last_name,
	    		'full_name' => $travel_pass->full_name,
	    		'contact_no' => !empty($travel_pass->contact_no) ? '0'.$travel_pass->contact_no : 'None',
	    		'email' => $travel_pass->email,
	    		'residence' => $travel_pass->residence,
	    		'barangay' => $travel_pass->barangay,
	    		'municipality_city' => $travel_pass->municipality_city,
	    		'province' => $travel_pass->province,
	    		'departure_date' => !empty($travel_pass->departure_date) ? \Carbon\Carbon::parse($travel_pass->departure_date)->format('F d, Y') : NULL,
	    		'place_of_origin' => $travel_pass->place_of_origin,
	    		'return_date' => !empty($travel_pass->return_date) ? \Carbon\Carbon::parse($travel_pass->return_date)->format('F d, Y') : NULL,
	    		'place_of_destination' => $travel_pass->place_of_destination,
	    		'mode_of_transport' => $travel_pass->mode_of_transport,
                'entry_point'=> !empty($travel_pass->entry_point) ? $travel_pass->entry_point : NULL,
                'exit_point'=> !empty($travel_pass->exit_point) ? $travel_pass->exit_point : NULL,
                'time_travel'=> !empty($travel_pass->time_travel) ? $travel_pass->time_travel.' min(s)' : NULL,
                'time_travel_int'=> !empty($travel_pass->time_travel) ? (int)$travel_pass->time_travel : NULL,
                'eta' => !empty($this->getETA($travel_pass)->getData()->eta) ? $this->getETA($travel_pass)->getData()->eta : 'None',
                'eta_int' => !empty($this->getETA($travel_pass)->getData()->eta_int) ? $this->getETA($travel_pass)->getData()->eta_int : NULL,
                'entry_time'=> !empty($travel_pass->entry_point_time) ? \Carbon\Carbon::parse($travel_pass->entry_point_time)->format('h:i A') : NULL,
                'exit_time'=> !empty($travel_pass->exit_point_time) ? \Carbon\Carbon::parse($travel_pass->exit_point_time)->format('h:i A') : NULL,
	    		'plate_no' => !empty($travel_pass->plate_no) ? $travel_pass->plate_no : NULL,
	    		'model_type' =>  !empty($travel_pass->model_type) ? $travel_pass->model_type : NULL,
                'full_mode_of_transport_text' => $mode_of_transport_text,
	    		'status' => $travel_pass->status,
	    		'government_id' => !empty($travel_pass->government_id) ? url('/uploads/government_id/'.$travel_pass->government_id) : NULL,
	    		'old_medical_certificate' => !empty($travel_pass->old_medical_certificate) ? url('/uploads/old_medical_certificate/'.$travel_pass->old_medical_certificate) : NULL,
	    		'barangay_certificate' => !empty($travel_pass->barangay_certificate) ? url('/uploads/barangay_certificate/'.$travel_pass->barangay_certificate) : NULL,
	    		'bhert_health_declaration' => !empty($travel_pass->bhert_health_declaration) ? url('/uploads/bhert_health_declaration/'.$travel_pass->bhert_health_declaration) : NULL,
	    		'certificate_of_employment' => !empty($travel_pass->certificate_of_employment) ? url('/uploads/certificate_of_employment/'.$travel_pass->certificate_of_employment) : NULL,
                'rapid_test_result' => !empty($travel_pass->rapid_test_result) ? url('/uploads/rapid_test_result/'.$travel_pass->rapid_test_result) : NULL,
	    		'new_medical_certificate' => !empty($travel_pass->new_medical_certificate) ? url('/uploads/new_medical_certificate/'.$travel_pass->new_medical_certificate) : NULL,
                'medical_certificate_issued_by_city_health_office' => !empty($travel_pass->medical_certificate_issued_by_city_health_office) ? url('/uploads/medical_certificate_issued_by_city_health_office/'.$travel_pass->medical_certificate_issued_by_city_health_office) : NULL,
                'is_valid_medical_certificate_issued_by_city_health_office' => empty($travel_pass->medical_certificate_issued_by_city_health_office) ? NULL : ((!empty($travel_pass->medical_certificate_issued_by_city_health_office) && (!empty($travel_pass->is_valid_medical_certificate_issued_by_city_health_office) && strcasecmp($travel_pass->is_valid_medical_certificate_issued_by_city_health_office,'no') == 0)) ? 'no' : 'yes'),
                'travel_pass_or_travel_authority' => !empty($travel_pass->travel_pass_or_travel_authority) ? url('/uploads/travel_pass_or_travel_authority/'.$travel_pass->travel_pass_or_travel_authority) : NULL,
	    		'travel_pass_document_pdf' => (strcasecmp($travel_pass->type,'pass_through') != 0) ? url('/uploads/travel_pass_document_pdf/travel_pass_document_'.$travel_pass->tracking_no.'.pdf') : NULL,
	    		'travel_pass_document_url' => (strcasecmp($travel_pass->type,'pass_through') != 0) ? route('api.travel.pass.document.fetch.by.tracking.no',$travel_pass->tracking_no) : NULL,
	    		'travel_pass_qr_code_pdf' => url('/uploads/travel_pass_qr_code_pdf/travel_pass_qr_code_'.$travel_pass->tracking_no.'.pdf'),
	    		'travel_pass_qr_code_url' => route('api.travel.pass.qr.code.fetch.by.tracking.no',$travel_pass->tracking_no),
                'passengers' => $passengers,
	    	]);
    	}

        if($travel_pass->type=="pass_through")
        {
            Log::info($travel_pass->type);
            $tpt = TravelPassTransaction::where('travel_pass_id','=',$travel_pass->id)
            ->where('status','=','entry')
            ->get();
            if(count($tpt)==0)
            {
                $t =  TravelPassTransaction::create([
                            'travel_pass_id' => $travel_pass->id,
                            'status' => 'entry',                            
                            'description' => 'Entry on checkpoint '.$travel_pass->entry_point,
                        ]);
                $travel_pass->entry_point_time = $t->created_at;
                $travel_pass->save();

                // $travel_pass_information = $travel_pass_information->map(function($item) use($t) { 
                //     $item->entry_time = \Carbon\Carbon::parse($t->created_at)->format('h:i A') ; 
                //     return $item; 
                // });

                $travel_pass_information->put('entry_time', \Carbon\Carbon::parse($t->created_at)->format('h:i A') );             
                Log::info($travel_pass_information);
            }
            else
            {
                $t = TravelPassTransaction::updateOrCreate(
                    [
                     'travel_pass_id' => $travel_pass->id,
                     'status' => 'exit', 
                    ],
                    ['description' => 'exit on checkpoint '.$travel_pass->exit_point]
                );

                 // $t =  TravelPassTransaction::create([
                 //            'travel_pass_id' => $travel_pass->id,
                 //            'status' => 'exit',                            
                 //            'description' => 'exit on checkpoint '.$travel_pass->exit_point,
                 //        ]);
                $travel_pass->exit_point_time = $t->updated_at;
                $travel_pass->save();

                // $travel_pass_information = $travel_pass_information->map(function($item) use($t) { 
                //     $item->entry_time = \Carbon\Carbon::parse($t->updated_at)->format('h:i A') ; 
                //     return $item; 
                // });

                $travel_pass_information->put('exit_time', \Carbon\Carbon::parse($t->updated_at)->format('h:i A') );    
            
            }
          
        }
  
    	return Response::json(['success' => true, 'data'=> ['travel_pass' => $travel_pass_information]], 200,[],JSON_PRETTY_PRINT);
    }
    public function fetchTravelPassesByTrackingNo($tracking_no)
    {
        $travel_passes_information = array();
        $travel_passes = TravelPass::select([
                'travel_passes.id',
                'travel_passes.type',
                'travel_passes.age',
                'travel_passes.tracking_no',
                'travel_passes.first_name',
                'travel_passes.middle_name',
                'travel_passes.last_name',
                DB::raw('IF(travel_passes.middle_name IS NOT NULL,CONCAT(travel_passes.first_name," ",travel_passes.middle_name," ",travel_passes.last_name),CONCAT(travel_passes.first_name," ",travel_passes.last_name)) as full_name'),
                'travel_passes.contact_no',
                'travel_passes.email',
                'travel_passes.residence',
                'travel_passes.barangay',
                'travel_passes.municipality_city',
                'travel_passes.province',
                'travel_passes.departure_date',
                'travel_passes.place_of_origin',
                'travel_passes.return_date',
                'travel_passes.place_of_destination',
                'travel_passes.mode_of_transport',
                'travel_passes.plate_no',
                'travel_passes.model_type',
                'travel_passes.status',
                'travel_pass_attachments.government_id',
                'travel_pass_attachments.old_medical_certificate',
                'travel_pass_attachments.barangay_certificate',
                'travel_pass_attachments.bhert_health_declaration',
                'travel_pass_attachments.certificate_of_employment',
                'travel_pass_attachments.rapid_test_result',
                'travel_pass_attachments.new_medical_certificate',
                'travel_pass_attachments.medical_certificate_issued_by_city_health_office',
                'travel_pass_attachments.travel_pass_or_travel_authority',
                'travel_passes.remarks',
                'travel_passes.is_issuance',
                'travel_passes.is_issuance',
                'travel_passes.entry_point',
                'travel_passes.exit_point',
                'travel_passes.time_travel',
                'travel_passes.entry_point_time',
                'travel_passes.exit_point_time',
                DB::raw('(SELECT purpose_types.name FROM purpose_types WHERE purpose_types.deleted_at is NULL and purpose_types.id = travel_passes.purpose_type_id) as purpose'),
            ])
            ->where(function($query) use ($tracking_no)
            {
                $query->whereNull('travel_passes.deleted_at');
                $query->whereNull('travel_pass_attachments.deleted_at');
            })
            ->leftJoin('travel_pass_attachments','travel_pass_attachments.travel_pass_id','=','travel_passes.id')
            ->where('tracking_no','=',$tracking_no)
            ->get();
        if(count($travel_passes) > 0)
        {
            foreach($travel_passes as $travel_pass)
            {
                $travel_pass_type = '';
                if(strcasecmp($travel_pass->type,'resident') == 0)
                {
                    $travel_pass_type = 'Local Traveller';
                }
                elseif(strcasecmp($travel_pass->type,'incoming_visitor') == 0)
                {
                    $travel_pass_type = 'Incoming Visitor';
                }
                elseif(strcasecmp($travel_pass->type,'frequent_traveller') == 0)
                {
                    $travel_pass_type = 'Frequent Traveller';
                }
                elseif(strcasecmp($travel_pass->type,'pass_through') == 0)
                {
                    $travel_pass_type = 'Pass Through';
                }
                else
                {
                    $travel_pass_type = strtoupper($travel_pass->type);
                }
                $mode_of_transport_text = '';
                if(strpos($travel_pass->mode_of_transport, '|') !== false)
                {
                    $current_mode_of_transports = explode('|',$travel_pass->mode_of_transport);
                    $current_plate_nos = explode('|',$travel_pass->plate_no);
                    $current_model_types = explode('|',$travel_pass->model_type);
                    foreach($current_mode_of_transports as $key => $mtransport)
                    {
                        if($key == 0)
                        {
                            $mode_of_transport_text = ucwords($mtransport).((!empty($current_model_types[$key]) && strcasecmp($current_model_types[$key], 'none') != 0) ? '('.ucwords($current_model_types[$key]).')' : '').((!empty($current_plate_nos[$key]) && strcasecmp($current_plate_nos[$key], 'none') != 0) ? '/ Plate No. '.ucwords($current_plate_nos[$key]) : '');
                        }
                        else
                        {
                            $mode_of_transport_text .= ','.ucwords($mtransport).((!empty($current_model_types[$key]) && strcasecmp($current_model_types[$key], 'none') != 0) ? '('.ucwords($current_model_types[$key]).')' : '').((!empty($current_plate_nos[$key]) && strcasecmp($current_plate_nos[$key], 'none') != 0) ? '/ Plate No. '.ucwords($current_plate_nos[$key]) : '');
                        }
                    }
                }
                else
                {
                    $mode_of_transport_text = ucwords($travel_pass->mode_of_transport).(!empty($travel_pass->model_type) ? '('.ucwords($travel_pass->model_type).')' : '').(!empty($travel_pass->plate_no) ? '/ Plate No. '.strtoupper($travel_pass->plate_no) : '');
                }
                $passengers = Passenger::with('attachment')->whereNull('deleted_at')->where('travel_pass_id','=',$travel_pass->id)->get();
                if(count($passengers) > 0)
                {
                    $passengers->map(function ($value){
                        $value->attachment->government_id = !empty($value->attachment->government_id) ? url('/uploads/passenger_government_id/'.$value->attachment->government_id) : NULL;
                        $value->attachment->medical_certificate = !empty($value->attachment->medical_certificate) ? url('/uploads/passenger_old_medical_certificate/'.$value->attachment->medical_certificate) : NULL;
                        $value->attachment->travel_pass_or_travel_authority = !empty($value->attachment->travel_pass_or_travel_authority) ? url('/uploads/passenger_travel_pass_or_travel_authority/'.$value->attachment->travel_pass_or_travel_authority) : NULL;
                    });
                }
                $travel_pass_information = NULL;
                $travel_pass_information = collect([
                    'id' => $travel_pass->id,
                    'type' => $travel_pass_type,
                    'purpose' => !empty($travel_pass->purpose) ? ucwords($travel_pass->purpose) : NULL,
                    'age' => $travel_pass->age,
                    'remarks' => !empty($travel_pass->remarks) ? (ucwords(strtolower($travel_pass->remarks)).((!empty($travel_pass->is_issuance) && strcasecmp($travel_pass->is_issuance,'yes') == 0) ? '(Rapid test on next issuance)' : '')) : NULL,
                    'is_issuance' => $travel_pass->is_issuance,
                    'tracking_no' => $travel_pass->tracking_no,
                    'first_name' => $travel_pass->first_name,
                    'middle_name' => $travel_pass->middle_name,
                    'last_name' => $travel_pass->last_name,
                    'full_name' => $travel_pass->full_name,
                    'contact_no' => !empty($travel_pass->contact_no) ? '0'.$travel_pass->contact_no : 'None',
                    'email' => $travel_pass->email,
                    'residence' => $travel_pass->residence,
                    'barangay' => $travel_pass->barangay,
                    'municipality_city' => $travel_pass->municipality_city,
                    'province' => $travel_pass->province,
                    'departure_date' => !empty($travel_pass->departure_date) ? \Carbon\Carbon::parse($travel_pass->departure_date)->format('M d, Y') : NULL,
                    'place_of_origin' => $travel_pass->place_of_origin,
                    'return_date' => !empty($travel_pass->return_date) ? \Carbon\Carbon::parse($travel_pass->return_date)->format('M d, Y') : NULL,
                    'place_of_destination' => $travel_pass->place_of_destination,
                    'mode_of_transport' => $travel_pass->mode_of_transport,
                    'plate_no' => !empty($travel_pass->plate_no) ? $travel_pass->plate_no : NULL,
                    'model_type' =>  !empty($travel_pass->model_type) ? $travel_pass->model_type : NULL,
                    'full_mode_of_transport_text' => $mode_of_transport_text,
                    'status' => $travel_pass->status,
                    'government_id' => !empty($travel_pass->government_id) ? url('/uploads/government_id/'.$travel_pass->government_id) : NULL,
                    'old_medical_certificate' => !empty($travel_pass->old_medical_certificate) ? url('/uploads/old_medical_certificate/'.$travel_pass->old_medical_certificate) : NULL,
                    'barangay_certificate' => !empty($travel_pass->barangay_certificate) ? url('/uploads/barangay_certificate/'.$travel_pass->barangay_certificate) : NULL,
                    'bhert_health_declaration' => !empty($travel_pass->bhert_health_declaration) ? url('/uploads/bhert_health_declaration/'.$travel_pass->bhert_health_declaration) : NULL,
                    'certificate_of_employment' => !empty($travel_pass->certificate_of_employment) ? url('/uploads/certificate_of_employment/'.$travel_pass->certificate_of_employment) : NULL,
                    'rapid_test_result' => !empty($travel_pass->rapid_test_result) ? url('/uploads/rapid_test_result/'.$travel_pass->rapid_test_result) : NULL,
                    'new_medical_certificate' => !empty($travel_pass->new_medical_certificate) ? url('/uploads/new_medical_certificate/'.$travel_pass->new_medical_certificate) : NULL,
                    'medical_certificate_issued_by_city_health_office' => !empty($travel_pass->medical_certificate_issued_by_city_health_office) ? url('/uploads/medical_certificate_issued_by_city_health_office/'.$travel_pass->medical_certificate_issued_by_city_health_office) : NULL,
                    'travel_pass_or_travel_authority' => !empty($travel_pass->travel_pass_or_travel_authority) ? url('/uploads/travel_pass_or_travel_authority/'.$travel_pass->travel_pass_or_travel_authority) : NULL,
                    'travel_pass_document_pdf' => (strcasecmp($travel_pass->type,'pass_through') != 0) ? url('/uploads/travel_pass_document_pdf/travel_pass_document_'.$travel_pass->tracking_no.'.pdf') : NULL,
                    'travel_pass_document_url' => (strcasecmp($travel_pass->type,'pass_through') != 0) ? route('api.travel.pass.document.fetch.by.tracking.no',$travel_pass->tracking_no) : NULL,
                    'travel_pass_qr_code_pdf' => url('/uploads/travel_pass_qr_code_pdf/travel_pass_qr_code_'.$travel_pass->tracking_no.'.pdf'),
                    'travel_pass_qr_code_url' => route('api.travel.pass.qr.code.fetch.by.tracking.no',$travel_pass->tracking_no),
                    'passengers' => $passengers,
                ]);
                array_push($travel_passes_information,$travel_pass_information);
            }
        }
        return Response::json(['success' => true, 'data'=> ['travel_passes' => $travel_passes_information]], 200,[],JSON_PRETTY_PRINT);
    }
    public function fetchTravelPassDocumentByTrackingNo($tracking_no)
    {
        $url = URL::to('/');
    	$travel_pass = TravelPass::whereNull('deleted_at')->where('tracking_no','=',$tracking_no)->first();
        if(!empty($travel_pass))
        {
            $mode_of_transport_text = '';
            if(strpos($travel_pass->mode_of_transport, '|') !== false)
            {
                $current_mode_of_transports = explode('|',$travel_pass->mode_of_transport);
                $current_plate_nos = explode('|',$travel_pass->plate_no);
                $current_model_types = explode('|',$travel_pass->model_type);
                foreach($current_mode_of_transports as $key => $mtransport)
                {
                    if($key == 0)
                    {
                        $mode_of_transport_text = ucwords($mtransport).((!empty($current_model_types[$key]) && strcasecmp($current_model_types[$key], 'none') != 0) ? '('.ucwords($current_model_types[$key]).')' : '').((!empty($current_plate_nos[$key]) && strcasecmp($current_plate_nos[$key], 'none') != 0) ? '/ Plate No. '.ucwords($current_plate_nos[$key]) : '');
                    }
                    else
                    {
                        $mode_of_transport_text .= ','.ucwords($mtransport).((!empty($current_model_types[$key]) && strcasecmp($current_model_types[$key], 'none') != 0) ? '('.ucwords($current_model_types[$key]).')' : '').((!empty($current_plate_nos[$key]) && strcasecmp($current_plate_nos[$key], 'none') != 0) ? '/ Plate No. '.ucwords($current_plate_nos[$key]) : '');
                    }
                }
            }
            else
            {
                $mode_of_transport_text = ucwords($travel_pass->mode_of_transport).(!empty($travel_pass->model_type) ? '('.ucwords($travel_pass->model_type).')' : '').(!empty($travel_pass->plate_no) ? '/ Plate No. '.strtoupper($travel_pass->plate_no) : '');
            }
        	$purpose_type_id = !empty($travel_pass->purpose_type_id) ? $travel_pass->purpose_type_id : NULL;
        	$purpose = PurposeType::whereNull('deleted_at')->where('id',$purpose_type_id)->first();
        	return view('guest.show_travel_pass_document',compact('travel_pass','purpose','mode_of_transport_text','url'));
        }
        else
        {
            abort(404);
        }
    }
    public function fetchTravelPassQRCodeByTrackingNo($tracking_no)
    {
    	$travel_pass = TravelPass::whereNull('deleted_at')->where('tracking_no','=',$tracking_no)->first();
        if(!empty($travel_pass))
        {
            return view('guest.show_travel_pass_qr_code',compact('travel_pass'));
        }
        else
        {
            abort(404);
        }
    }

    public function generatePDFAttachmentsByTrackingNo($tracking_no)
    {
        $url = URL::to('/');
        $travel_pass = TravelPass::whereNull('deleted_at')->where('tracking_no','=',$tracking_no)->first();
        if(!empty($travel_pass))
        {
            if(strcasecmp($travel_pass->status,'released') == 0)
            {
                $travel_pass_attachment = TravelPassAttachment::where('travel_pass_id','=',$travel_pass->id)->first();
                QrCode::format('png')->size(1000)->errorCorrection('H')->generate($travel_pass->tracking_no, public_path('uploads/qrcode/'.$travel_pass->tracking_no.'.png'));
                if(file_exists(public_path('uploads/qrcode/'.$travel_pass->tracking_no.'.png')))
                {
                    
                }
                else
                {
                    return Response::json(['success' => false, 'status'=> 'UNABLE TO GENERATE QR CODE IMAGE'], 200,[],JSON_PRETTY_PRINT);
                }
                $destinationPath = '';
                if(strcasecmp($travel_pass->type,'pass_through') != 0)
                {
                    $mode_of_transport_text = '';
                    if(strpos($travel_pass->mode_of_transport, '|') !== false)
                    {
                        $current_mode_of_transports = explode('|',$travel_pass->mode_of_transport);
                        $current_plate_nos = explode('|',$travel_pass->plate_no);
                        $current_model_types = explode('|',$travel_pass->model_type);
                        foreach($current_mode_of_transports as $key => $mtransport)
                        {
                            if($key == 0)
                            {
                                $mode_of_transport_text = ucwords($mtransport).((!empty($current_model_types[$key]) && strcasecmp($current_model_types[$key], 'none') != 0) ? '('.ucwords($current_model_types[$key]).')' : '').((!empty($current_plate_nos[$key]) && strcasecmp($current_plate_nos[$key], 'none') != 0) ? '/ Plate No. '.ucwords($current_plate_nos[$key]) : '');
                            }
                            else
                            {
                                $mode_of_transport_text .= ','.ucwords($mtransport).((!empty($current_model_types[$key]) && strcasecmp($current_model_types[$key], 'none') != 0) ? '('.ucwords($current_model_types[$key]).')' : '').((!empty($current_plate_nos[$key]) && strcasecmp($current_plate_nos[$key], 'none') != 0) ? '/ Plate No. '.ucwords($current_plate_nos[$key]) : '');
                            }
                        }
                    }
                    else
                    {
                        $mode_of_transport_text = ucwords($travel_pass->mode_of_transport).(!empty($travel_pass->model_type) ? '('.ucwords($travel_pass->model_type).')' : '').(!empty($travel_pass->plate_no) ? '/ Plate No. '.strtoupper($travel_pass->plate_no) : '');
                    }
                    $tp_document = 'travel_pass_document_'.$travel_pass->tracking_no.'.pdf';
                    $destinationPath = public_path('uploads/travel_pass_document_pdf/'.$tp_document);
                    $pdf = PDF::loadView('admin.pdf_template.travel_pass_document_pdf',compact('travel_pass','purpose','url','mode_of_transport_text'))->setPaper('letter', 'portrait');
                    $pdf->save($destinationPath);
                    if(file_exists(public_path('uploads/travel_pass_document_pdf/'.$tp_document)))
                    {
                            
                    }
                    else
                    {
                        return Response::json(['success' => false, 'status'=> 'UNABLE TO GENERATE QR CODE IMAGE'], 200,[],JSON_PRETTY_PRINT);
                    }
                }
                $tp_qr_code = 'travel_pass_qr_code_'.$travel_pass->tracking_no.'.pdf';
                $destinationPathQR = public_path('uploads/travel_pass_qr_code_pdf/'.$tp_qr_code);
                $pdf = PDF::loadView('admin.pdf_template.travel_pass_qr_code_pdf',compact('travel_pass','url'))->setPaper('letter', 'portrait');
                $pdf->save($destinationPathQR);
                if(file_exists(public_path('uploads/travel_pass_qr_code_pdf/'.$tp_qr_code)))
                {
                        
                }
                else
                {
                    return Response::json(['success' => false, 'status'=> 'UNABLE TO GENERATE QR CODE IMAGE. PLEASE TRY AGAIN.'], 500,[],JSON_PRETTY_PRINT);
                }
                if(file_exists(public_path('uploads/qrcode/'.$travel_pass->tracking_no.'.png')) && file_exists(public_path('uploads/travel_pass_qr_code_pdf/'.$tp_qr_code)) && file_exists(public_path('uploads/travel_pass_document_pdf/'.$tp_document)))
                {
                    $software_name = Session::get('software_name');
                    Mail::send('admin.emails.pdf_request', ['travel_pass'=>$travel_pass], function ($m) use ($travel_pass,$software_name,$destinationPathQR,$destinationPath,$travel_pass_attachment){
                            $m->from('covid_tracer.support@aguora.com', $software_name);
                            $m->to($travel_pass->email, $travel_pass->first_name.' '.$travel_pass->last_name)->subject('PDF Attachments Request!');
                            if(strcasecmp($travel_pass->type,'pass_through') != 0)
                            {
                                $m->attach($destinationPath, ['as' => 'Travel Pass Document.pdf']);
                                if(!empty($travel_pass_attachment->new_medical_certificate))
                                {
                                    $path = public_path('uploads/new_medical_certificate/'.$travel_pass_attachment->new_medical_certificate);
                                    $m->attach($path, ['as' => 'Medical Certificate '.$travel_pass->tracking_no.'.pdf']);
                                }
                            }
                            $m->attach($destinationPathQR, ['as' => 'Travel Pass QR Code.pdf']);
                    });
                    if(!empty($travel_pass->contact_no))
                    {
                        $client = new \GuzzleHttp\Client();
                        $response = $client->request('POST', 'https://api.semaphore.co/api/v4/messages', [
                            'form_params' => [
                                'apikey' => '41d1484be7b95fcb0e56a95859438ca2',
                                'number' => '0'.$travel_pass->contact_no,
                                'message' => 'Your Travel Pass and QR code are now available. Please check your email.',
                            ]
                        ]);
                    }
                    return Response::json(['success' => true, 'status'=> 'OKAY'], 200,[],JSON_PRETTY_PRINT);
                }
                else
                {
                    return Response::json(['success' => false, 'status'=> 'UNABLE TO GENERATE PDF FILES. PLEASE TRY AGAIN.'], 500,[],JSON_PRETTY_PRINT);
                }
            }
            else
            {
                return Response::json(['success' => true, 'status'=> 'NOT YET RELEASED'], 200,[],JSON_PRETTY_PRINT);
            }
        }
        else
        {
            return Response::json(['success' => false, 'status'=> 'UNABLE TO FIND TRAVEL PASS INFORMATION'], 400,[],JSON_PRETTY_PRINT);
        }
    }
    public function generatePDFAttachmentsByIdAndTrackingNo($id,$tracking_no)
    {
        $url = URL::to('/');
        $travel_pass = TravelPass::whereNull('deleted_at')->where('id','=',$$id)->where('tracking_no','=',$tracking_no)->first();
        if(!empty($travel_pass))
        {
            if(strcasecmp($travel_pass->status,'released') == 0)
            {
                $travel_pass_attachment = TravelPassAttachment::where('travel_pass_id','=',$travel_pass->id)->first();
                QrCode::format('png')->size(1000)->errorCorrection('H')->generate($travel_pass->tracking_no, public_path('uploads/qrcode/'.$travel_pass->tracking_no.'.png'));
                if(file_exists(public_path('uploads/qrcode/'.$travel_pass->tracking_no.'.png')))
                {
                    
                }
                else
                {
                    return Response::json(['success' => false, 'status'=> 'UNABLE TO GENERATE QR CODE IMAGE'], 200,[],JSON_PRETTY_PRINT);
                }
                $destinationPath = '';
                if(strcasecmp($travel_pass->type,'pass_through') != 0)
                {
                    $mode_of_transport_text = '';
                    if(strpos($travel_pass->mode_of_transport, '|') !== false)
                    {
                        $current_mode_of_transports = explode('|',$travel_pass->mode_of_transport);
                        $current_plate_nos = explode('|',$travel_pass->plate_no);
                        $current_model_types = explode('|',$travel_pass->model_type);
                        foreach($current_mode_of_transports as $key => $mtransport)
                        {
                            if($key == 0)
                            {
                                $mode_of_transport_text = ucwords($mtransport).((!empty($current_model_types[$key]) && strcasecmp($current_model_types[$key], 'none') != 0) ? '('.ucwords($current_model_types[$key]).')' : '').((!empty($current_plate_nos[$key]) && strcasecmp($current_plate_nos[$key], 'none') != 0) ? '/ Plate No. '.ucwords($current_plate_nos[$key]) : '');
                            }
                            else
                            {
                                $mode_of_transport_text .= ','.ucwords($mtransport).((!empty($current_model_types[$key]) && strcasecmp($current_model_types[$key], 'none') != 0) ? '('.ucwords($current_model_types[$key]).')' : '').((!empty($current_plate_nos[$key]) && strcasecmp($current_plate_nos[$key], 'none') != 0) ? '/ Plate No. '.ucwords($current_plate_nos[$key]) : '');
                            }
                        }
                    }
                    else
                    {
                        $mode_of_transport_text = ucwords($travel_pass->mode_of_transport).(!empty($travel_pass->model_type) ? '('.ucwords($travel_pass->model_type).')' : '').(!empty($travel_pass->plate_no) ? '/ Plate No. '.strtoupper($travel_pass->plate_no) : '');
                    }
                    $tp_document = 'travel_pass_document_'.$travel_pass->tracking_no.'.pdf';
                    $destinationPath = public_path('uploads/travel_pass_document_pdf/'.$tp_document);
                    $pdf = PDF::loadView('admin.pdf_template.travel_pass_document_pdf',compact('travel_pass','purpose','url','mode_of_transport_text'))->setPaper('letter', 'portrait');
                    $pdf->save($destinationPath);
                    if(file_exists(public_path('uploads/travel_pass_document_pdf/'.$tp_document)))
                    {
                            
                    }
                    else
                    {
                        return Response::json(['success' => false, 'status'=> 'UNABLE TO GENERATE QR CODE IMAGE'], 200,[],JSON_PRETTY_PRINT);
                    }
                }
                $tp_qr_code = 'travel_pass_qr_code_'.$travel_pass->tracking_no.'.pdf';
                $destinationPathQR = public_path('uploads/travel_pass_qr_code_pdf/'.$tp_qr_code);
                $pdf = PDF::loadView('admin.pdf_template.travel_pass_qr_code_pdf',compact('travel_pass','url'))->setPaper('letter', 'portrait');
                $pdf->save($destinationPathQR);
                if(file_exists(public_path('uploads/travel_pass_qr_code_pdf/'.$tp_qr_code)))
                {
                        
                }
                else
                {
                    return Response::json(['success' => false, 'status'=> 'UNABLE TO GENERATE QR CODE IMAGE. PLEASE TRY AGAIN.'], 500,[],JSON_PRETTY_PRINT);
                }
                if(file_exists(public_path('uploads/qrcode/'.$travel_pass->tracking_no.'.png')) && file_exists(public_path('uploads/travel_pass_qr_code_pdf/'.$tp_qr_code)) && file_exists(public_path('uploads/travel_pass_document_pdf/'.$tp_document)))
                {
                    $software_name = Session::get('software_name');
                    Mail::send('admin.emails.pdf_request', ['travel_pass'=>$travel_pass], function ($m) use ($travel_pass,$software_name,$destinationPathQR,$destinationPath,$travel_pass_attachment){
                            $m->from('covid_tracer.support@aguora.com', $software_name);
                            $m->to($travel_pass->email, $travel_pass->first_name.' '.$travel_pass->last_name)->subject('PDF Attachments Request!');
                            $destinationPath = '';
                            if(strcasecmp($travel_pass->type,'pass_through') != 0)
                            {
                                $m->attach($destinationPath, ['as' => 'Travel Pass Document.pdf']);
                                if(!empty($travel_pass_attachment->new_medical_certificate))
                                {
                                    $path = public_path('uploads/new_medical_certificate/'.$travel_pass_attachment->new_medical_certificate);
                                    $m->attach($path, ['as' => 'Medical Certificate '.$travel_pass->tracking_no.'.pdf']);
                                }
                            }
                            $m->attach($destinationPathQR, ['as' => 'Travel Pass QR Code.pdf']);
                    });
                    if(!empty($travel_pass->contact_no))
                    {
                        $client = new \GuzzleHttp\Client();
                        $response = $client->request('POST', 'https://api.semaphore.co/api/v4/messages', [
                            'form_params' => [
                                'apikey' => '41d1484be7b95fcb0e56a95859438ca2',
                                'number' => '0'.$travel_pass->contact_no,
                                'message' => 'Your Medical Certificate, Travel Pass and QR code are now available. Please check your email.',
                            ]
                        ]);
                    }
                    return Response::json(['success' => true, 'status'=> 'OKAY'], 200,[],JSON_PRETTY_PRINT);
                }
                else
                {
                    return Response::json(['success' => false, 'status'=> 'UNABLE TO GENERATE PDF FILES. PLEASE TRY AGAIN.'], 500,[],JSON_PRETTY_PRINT);
                }
            }
            else
            {
                return Response::json(['success' => true, 'status'=> 'NOT YET RELEASED'], 200,[],JSON_PRETTY_PRINT);
            }
        }
        else
        {
            return Response::json(['success' => false, 'status'=> 'UNABLE TO FIND TRAVEL PASS INFORMATION'], 400,[],JSON_PRETTY_PRINT);
        }
    }
    public function fetchCheckpointCoordinatesByName(Request $request)
    {
        $check_point = CheckPoint::select(['latitude','longitude'])->whereNull('deleted_at')->where('name','=',$request->name)->first();
        if(!empty($check_point))
        {
            return Response::json(['success' => true, 'status'=> 'OKAY','data'=> ['check_point' => $check_point]], 200,[],JSON_PRETTY_PRINT);
        }
        else
        {
            return Response::json(['success' => false, 'status'=> 'UNABLE TO FIND CHECKPOINT'], 400,[],JSON_PRETTY_PRINT);
        }
    }
    public function fetchOriginDestinationCoordinatesByName(Request $request)
    {
        $origin = CheckPoint::select(['latitude','longitude'])->whereNull('deleted_at')->where('name','=',$request->origin)->whereNotNull('latitude')->whereNotNull('longitude')->first();
        $destination = CheckPoint::select(['latitude','longitude'])->whereNull('deleted_at')->where('name','=',$request->destination)->whereNotNull('latitude')->whereNotNull('longitude')->first();
        if(!empty($origin) && !empty($destination))
        {
            return Response::json(['success' => true, 'status'=> 'OKAY','data'=> ['origin' => $origin,'destination' => $destination]], 200,[],JSON_PRETTY_PRINT);
        }
        else
        {
            return Response::json(['success' => false, 'status'=> 'UNABLE TO FIND COORDINATES'], 404,[],JSON_PRETTY_PRINT);
        }
    }
    public function getETA($travel_pass)
    {
        if(!empty($travel_pass) && strcasecmp($travel_pass->type, 'pass_through') == 0)
        {
            $client = new \GuzzleHttp\Client();
            try 
            {
                $eta_text = NULL;
                $eta_int = NULL;
                if(!empty($travel_pass->entry_point) && !empty($travel_pass->exit_point))
                {
                    $entry_point = CheckPoint::whereNull('deleted_at')->where('name','=',$travel_pass->entry_point)->first();
                    $exit_point = CheckPoint::whereNull('deleted_at')->where('name','=',$travel_pass->exit_point)->first();
                    if((!empty($entry_point) && is_numeric($entry_point->latitude) && is_numeric($entry_point->longitude)) && (!empty($exit_point) && is_numeric($exit_point->latitude) && is_numeric($exit_point->longitude)))
                    {
                        $response_direction = $client->request('GET', 'https://maps.googleapis.com/maps/api/directions/json?', [
                            'query' => ['key' => 'AIzaSyCIAhonOgUwLNyJ01P9kyAw5EebSHOf--g','origin'=>$entry_point->latitude.','.$entry_point->longitude,'destination'=>$exit_point->latitude.','.$exit_point->longitude
                            ]
                        ]);
                        $json_direction =json_decode($response_direction->getBody());
                        $eta_text = (count($json_direction) > 0) ? (!empty($json_direction->routes[0]->legs[0]->duration->text) ? round($json_direction->routes[0]->legs[0]->duration->value/60).' min(s)' : 'None') : 'Unable to retrieve ETA';
                        $eta_int = (count($json_direction) > 0) ? (!empty($json_direction->routes[0]->legs[0]->duration->text) ? round($json_direction->routes[0]->legs[0]->duration->value/60) : NULL) : NULL;
                    }
                    else
                    {
                        $response_entry = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json', [
                            'query' => ['key' => 'AIzaSyCIAhonOgUwLNyJ01P9kyAw5EebSHOf--g','address'=>$entry_point->name.' Santiago City Isabela'
                            ]
                        ]);
                        $json_entry =json_decode($response_entry->getBody());
                        $response_exit = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json', [
                            'query' => ['key' => 'AIzaSyCIAhonOgUwLNyJ01P9kyAw5EebSHOf--g','address'=>$exit_point->name.' Santiago City Isabela'
                            ]
                        ]);
                        $json_exit =json_decode($response_exit->getBody());
                        $entry_latitude = (count($json_entry->results) > 0 ? (!empty($json_entry->results[0]->geometry->location->lat) ? $json_entry->results[0]->geometry->location->lat : 0): 0);
                        $entry_longitude = (count($json_entry->results) > 0 ? (!empty($json_entry->results[0]->geometry->location->lng) ? $json_entry->results[0]->geometry->location->lng : 0): 0);
                        $exit_latitude = (count($json_exit->results) > 0 ? (!empty($json_exit->results[0]->geometry->location->lat) ? $json_exit->results[0]->geometry->location->lat : 0): 0);
                        $exit_longitude = (count($json_exit->results) > 0 ? (!empty($json_exit->results[0]->geometry->location->lng) ? $json_exit->results[0]->geometry->location->lng : 0): 0);
                        
                        $response_direction = $client->request('GET', 'https://maps.googleapis.com/maps/api/directions/json?', [
                            'query' => ['key' => 'AIzaSyCIAhonOgUwLNyJ01P9kyAw5EebSHOf--g','origin'=>$entry_latitude.','.$entry_longitude,'destination'=>$exit_latitude.','.$exit_longitude
                            ]
                        ]);
                        $json_direction =json_decode($response_direction->getBody());
                        $eta_text = (count($json_direction) > 0) ? (!empty($json_direction->routes[0]->legs[0]->duration->text) ? round($json_direction->routes[0]->legs[0]->duration->value/60).' min(s)' : 'None') : 'Unable to retrieve ETA';
                        $eta_int = (count($json_direction) > 0) ? (!empty($json_direction->routes[0]->legs[0]->duration->text) ? round($json_direction->routes[0]->legs[0]->duration->value/60) : NULL) : NULL;
                    }
                    return Response::json(['success' => true,'eta' => $eta_text,'eta_int' => $eta_int], 200,[],JSON_PRETTY_PRINT);
                }
            }
            catch(\Exception $e)
            {
                Log::alert($e);
                return Response::json(['success' => false,'status' => 'Unable to retrieve.','eta' => NULL,'eta_int' => NULL], 200,[],JSON_PRETTY_PRINT);
            }
            catch(\Throwable $e)
            {
                Log::alert($e);
                return Response::json(['success' => false,'status' => 'Unable to retrieve.','eta' => NULL,'eta_int' => NULL], 200,[],JSON_PRETTY_PRINT);
            }
        }
        else
        {
            Log::alert('Not Pass Through');
            return Response::json(['success' => false,'eta' => NULL,'eta_int' => NULL], 200,[],JSON_PRETTY_PRINT);
        }
    }
}
