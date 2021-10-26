<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
    <meta name="description" content="{{Session::get('software_description')}}">
    <meta name="author" content="Aguora IT Solutions & Technology">
    <meta name="application-name" content="{{Session::get('software_name')}}"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{Session::get('company_logo')}}" />
    <meta name="msapplication-square70x70logo" content="{{Session::get('company_logo')}}" />
    <meta name="msapplication-square150x150logo" content="{{Session::get('company_logo')}}" />
    <meta name="msapplication-wide310x150logo" content="{{Session::get('company_logo')}}" />
    <meta name="msapplication-square310x310logo" content="{{Session::get('company_logo')}}" />
    <title>Application Form For Pass Through | {{Session::get('software_name')}}</title>


    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('assets/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href='{{asset('/uploads/'.Session::get('company_logo'))}}' />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('/uploads/'.Session::get('company_logo'))}}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('/uploads/'.Session::get('company_logo'))}}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('/uploads/'.Session::get('company_logo'))}}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{asset('/uploads/'.Session::get('company_logo'))}}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{asset('/uploads/'.Session::get('company_logo'))}}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{asset('/uploads/'.Session::get('company_logo'))}}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{asset('/uploads/'.Session::get('company_logo'))}}" />
    <link rel="icon" href="{{asset('/uploads/'.Session::get('company_logo'))}}" sizes="196x196" />
    <link rel="icon" href="{{asset('/uploads/'.Session::get('company_logo'))}}" sizes="96x96" />
    <link rel="icon" href="{{asset('/uploads/'.Session::get('company_logo'))}}" sizes="32x32" />
    <link rel="icon" href="{{asset('/uploads/'.Session::get('company_logo'))}}" sizes="16x16" />
    <link rel="icon" href="{{asset('/uploads/'.Session::get('company_logo'))}}" sizes="128x128" />
    <style type="text/css">
    	html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                /*display: table;*/
                /*font-weight: 100;*/
                /*font-family: 'Lato';*/
                background-color: #fff;
            }
        .text-description
            {
                color:#15296d; letter-spacing: 0px;font-weight: 600;
            }
            .text-consent
            {
                text-align: justify;
            }
            .text-subheader
            {
                color:#15296d; letter-spacing: 0px;font-weight: 600;
            }
        @media(max-width: 767px)
         {
            .flex-middle
             {
                height:100%;padding:20px;
                    display:flex;
                display: -webkit-box;
                
                display: -ms-flexbox;
                display: -webkit-flex;
                -webkit-flex-direction: column;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-orient: vertical;
                -moz-box-orient: vertical;
                 align-items: stretch;justify-content: center;
             }
             .text-covid
             {
                color:#15296d; font-size: 2em;letter-spacing: 0px;font-weight: 600;margin-bottom: 0px;text-align: center;
             }
             .text-travel
             {
                color:#15296d; font-size: 2em;letter-spacing: 0px;font-weight: 600; text-align: center;
             }
              .text-description
            {
                font-size: 1.2em;
            }
            .text-note
            {
            	font-size: 1.1em;
            }
            .text-consent
            {
            	font-size: 1em;
            }
         }
         @media(min-width: 768px)
         {
             .text-description
            {
                font-size: 2em;
            }
            .text-note
            {
            	font-size: 1.5em;
            }
            .text-consent
            {
            	font-size: 1.2em;
            }
            .flex-middle
             {
                height:100%;padding:20px;
                display:flex;
                display: -webkit-box;
                
                display: -ms-flexbox;
                display: -webkit-flex;
                -webkit-flex-direction: row;
                -ms-flex-direction: row;
                flex-direction: row;
                -webkit-box-orient: horizontal;
                -moz-box-orient: horizontal;
                align-items: stretch;justify-content: space-evenly;
             }
             .text-covid
             {
                color:#15296d; font-size: 2.5em;letter-spacing: 0px;font-weight: 600;margin-bottom: 0px;
             }
             .text-travel
             {
                color:#15296d; font-size: 2.5em;letter-spacing: 0px;font-weight: 600;
             }
         }
         .big-checkbox
		{
	    	margin: 2px 0 0;
	    	-ms-transform: scale(1.5); /* IE */
			-moz-transform: scale(1.5); /* FF */
			-webkit-transform: scale(1.5); /* Safari and Chrome */
			-o-transform: scale(1.5); /* Opera */
			transform: scale(1.5);
			margin-left: -18px !important;
		}
		.btn-custom
		{
			background-color: #1C7CD5;
			border-color: #1766AF;
			padding: 15px 50px;
			font-size: 1.5em;
		}
        .btn-add-passenger
        {
            background-color: #1C7CD5;
            border-color: #1766AF;
            padding: 10px 20px;
            font-size: 1.2em;
        }
		.swal2-popup {
          font-size: 1.4rem !important;
        }
        .form-group > .control-label > span
        {
            color:#F05252;
        }
        .form-group.has-error > .control-label > span
        {
            color:#a94442;
        }
        .btnDelete
        {
            /*padding-bottom: 3px;padding-top:3px;padding-right: 2px;padding-left: 2px;*/
            color:#d9534f;
            opacity: 0.8;
            cursor: pointer;
        }
        .btnDelete:active,.btnDelete:focus,.btnDelete:hover
        {
            opacity: 1;
        }
        #map
        {
            height: 300px;
            width:100%;
            border-radius: 6px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    @php
    $passengerAttachmentsCtr = 0;
    if(count(old('passenger_government_id')) > 0)
    {
        foreach(old('passenger_government_id') as $key => $government_id)
        {
            if($errors->has('passenger_government_id.'.$key) && (strcasecmp($errors->first('passenger_government_id.'.$key),'The government id may not be greater than 2000 kilobytes.') == 0)) $passengerAttachmentsCtr++;
        }
    }
    if(count(old('passenger_medical_certificate')) > 0)
    {
        foreach(old('passenger_medical_certificate') as $key => $medical_certificate)
        {
            if($errors->has('passenger_medical_certificate.'.$key) && (strcasecmp($errors->first('passenger_medical_certificate.'.$key),'The medical certificate may not be greater than 2000 kilobytes.') == 0)) $passengerAttachmentsCtr++;
        }
    }
    if(count(old('passenger_travel_pass_or_travel_authority')) > 0)
    {
        foreach(old('passenger_travel_pass_or_travel_authority') as $key => $travel_pass_or_travel_authority)
        {
            if($errors->has('passenger_travel_pass_or_travel_authority.'.$key) && (strcasecmp($errors->first('passenger_travel_pass_or_travel_authority.'.$key),'The travel pass or travel authority may not be greater than 2000 kilobytes.') == 0)) $passengerAttachmentsCtr++;
        }
    }
    @endphp
    <div class="container-fluid">
        <div class="row" style="padding-top:15px;padding-bottom: 15px;">
            <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                {{ Form::open(array('route' => 'registration.traveller.passing.through.santiago.city.store','files' => true,'id'=>'registrationForm')) }}
                    <div class="panel panel-default" style="background: #FFFFFF 0% 0% no-repeat padding-box;box-shadow: 0px 3px 6px #00000029;border-radius:0px;">
                        <div class="panel-body" style="padding:25px;">
                            <div class="flex-middle">
                                <div>   
                                    <img src="{{asset('uploads/santiago_city.png')}}" style="max-width: 116px;max-height: 116px;display:block;margin:0 auto;">
                                </div>
                                <div>   
                                    <img src="{{asset('uploads/balamban.png')}}" style="max-width: 200px;max-height: 116px;display:block;margin:0 auto;">
                                </div>
                                <div>   
                                    <img src="{{asset('uploads/covid.png')}}" style="max-width: 200px;max-height: 116px;display:block;margin:0 auto;">
                                </div>
                                <div>   
                                    <img src="{{asset('uploads/Ambisyon 2040 Logo.png')}}" style="max-width: 200px;max-height: 116px;display:block;margin:0 auto;">
                                </div>
                                {{-- <div style="padding:10px;">
                                    <img src="{{asset('uploads/covid_tracer_logo_x2.png')}}" style="max-width: 116px;max-height: 116px;display:block;margin:0 auto;">
                                </div>
                                <div style="padding:10px;">
                                    <p class="text-covid">CovidTracer</p>
                                    <p class="text-travel">Travel&nbsp;Pass</p>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group text-center" style="margin-bottom: 30px;">
                                        <h5 class="text-description">APPLICATION FORM FOR PASS THROUGH</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <h4 class="text-subheader">Primary Applicant </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group {{ $errors->first('first_name') ? 'has-error' : '' }}">
                                        <label class="control-label">First Name</label>
                                        {{Form::text('first_name',NULL,['class'=>'form-control  validate[required]','placeholder' => 'First Name'])}}
                                        @if($errors->first('first_name'))
                                            <p class="help-block text-danger">{{$errors->first('first_name')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group {{ $errors->first('middle_name') ? 'has-error' : '' }}">
                                        <label class="control-label">Middle Name</label>
                                        {{Form::text('middle_name',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Middle Name'])}}
                                        @if($errors->first('middle_name'))
                                            <p class="help-block text-danger">{{$errors->first('middle_name')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group {{ $errors->first('last_name') ? 'has-error' : '' }}">
                                        <label class="control-label">Last Name</label>
                                        {{Form::text('last_name',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Last Name'])}}
                                        @if($errors->first('last_name'))
                                            <p class="help-block text-danger">{{$errors->first('last_name')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                            	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group {{ $errors->first('contact_no') ? 'has-error' : '' }}">
                                        <label class="control-label">Contact No</label>
                                        {{Form::text('contact_no',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Contact No'])}}
                                        @if($errors->first('contact_no'))
                                            <p class="help-block text-danger">{{$errors->first('contact_no')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group {{ $errors->first('email_address') ? 'has-error' : '' }}">
                                        <label class="control-label">Email Address</label>
                                        {{Form::email('email_address',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Email Address','formnovalidate'=>'formnovalidate'])}}
                                        @if($errors->first('email_address'))
                                            <p class="help-block text-danger">{{$errors->first('email_address')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group {{ $errors->first('email_address_confirmation') ? 'has-error' : '' }}">
                                        <label class="control-label">Confirm Email</label>
                                        {{Form::email('email_address_confirmation',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Email Address','formnovalidate'=>'formnovalidate'])}}
                                        @if($errors->first('email_address_confirmation'))
                                            <p class="help-block text-danger">{{$errors->first('email_address_confirmation')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group {{ $errors->first('residence') ? 'has-error' : '' }}">
                                        <label class="control-label">Residence</label>
                                        {{Form::text('residence',NULL,['class'=>'form-control  validate[required]','placeholder' => 'House Number/Street'])}}
                                        @if($errors->first('residence'))
                                            <p class="help-block text-danger">{{$errors->first('residence')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group {{ $errors->first('barangay') ? 'has-error' : '' }}">
                                        <label class="control-label">Barangay</label>
                                        {{Form::text('barangay',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Barangay'])}}
                                        @if($errors->first('barangay'))
                                            <p class="help-block text-danger">{{$errors->first('barangay')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group {{ $errors->first('municipality_city') ? 'has-error' : '' }}">
                                        <label class="control-label">Municipality/City</label>
                                        {{Form::text('municipality_city',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Municipality/City'])}}
                                        @if($errors->first('municipality_city'))
                                            <p class="help-block text-danger">{{$errors->first('municipality_city')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group {{ $errors->first('province') ? 'has-error' : '' }}">
                                        <label class="control-label">Province</label>
                                        {{Form::text('province',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Province'])}}
                                        @if($errors->first('province'))
                                            <p class="help-block text-danger">{{$errors->first('province')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group text-center" style="margin-bottom: 30px;">
                                        <h5 class="text-description">Requirements</h5>
                                        <p style="font-size:1.1em;margin-bottom: 0px;">(Maximum File size acceptable is 2 MB.You can attach jpg, jpeg, png, and PDF)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            		<div class="form-group {{ $errors->first('government_id') ? 'has-error' : '' }}">
                                        <label class="control-label"><span>*</span>Government Issued ID with picture</label>
                                        {{Form::file('government_id',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                        @if($errors->first('government_id'))
                                            <p class="help-block text-danger">{{$errors->first('government_id')}}</p>
                                        @endif
                                    </div>
                            	</div>
                            </div>
                            <div class="row">
                            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            		<div class="form-group {{ $errors->first('medical_certificate') ? 'has-error' : '' }}">
                                        <label class="control-label"><span>*</span>Medical Certificate<br></label>
                                        
                                        {{Form::file('medical_certificate',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                        @if($errors->first('medical_certificate'))
                                            <p class="help-block text-danger">{{$errors->first('medical_certificate')}}</p>
                                        @endif
                                    </div>
                            	</div>
                            </div>
                            <div class="row">
                            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            		<div class="form-group {{ $errors->first('travel_pass_or_travel_authority') ? 'has-error' : '' }}">
                                        <label class="control-label"><span>*</span>Travel Pass / Travel Authority</label>
                                        {{Form::file('travel_pass_or_travel_authority',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                        @if($errors->first('travel_pass_or_travel_authority'))
                                            <p class="help-block text-danger">{{$errors->first('travel_pass_or_travel_authority')}}</p>
                                        @endif
                                    </div>
                            	</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-passenger">
                                    @if($errors->any())
                                        @if(count(old('passenger_first_name')) >0)
                                            @foreach(old('passenger_first_name') as $key=>$passenger_first_name)
                                                <div class="passenger-container">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                                <h4 class="text-subheader passenger-header">Passenger {{ ($key+1) }} <i class="fa fa-times-circle btnDelete" aria-hidden="true" ></i></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                            <div class="form-group {{ $errors->first('passenger_first_name.'.$key) ? 'has-error' : '' }}">
                                                                <label class="control-label">First Name</label>
                                                                {{Form::text('passenger_first_name[ ]',old('passenger_first_name.'.$key),['class'=>'form-control  validate[required]','placeholder' => 'First Name'])}}
                                                                @if($errors->first('passenger_first_name.'.$key))
                                                                    <p class="help-block text-danger">{{$errors->first('passenger_first_name.'.$key)}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                            <div class="form-group {{ $errors->first('passenger_middle_name') ? 'has-error' : '' }}">
                                                                <label class="control-label">Middle Name</label>
                                                                {{Form::text('passenger_middle_name[ ]',old('passenger_middle_name.'.$key),['class'=>'form-control  validate[required]','placeholder' => 'Middle Name'])}}
                                                                @if($errors->first('passenger_middle_name'))
                                                                    <p class="help-block text-danger">{{$errors->first('passenger_middle_name')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                            <div class="form-group {{ $errors->first('passenger_last_name.'.$key) ? 'has-error' : '' }}">
                                                                <label class="control-label">Last Name</label>
                                                                {{Form::text('passenger_last_name[ ]',old('passenger_last_name.'.$key),['class'=>'form-control  validate[required]','placeholder' => 'Last Name'])}}
                                                                @if($errors->first('passenger_last_name.'.$key))
                                                                    <p class="help-block text-danger">{{$errors->first('passenger_last_name.'.$key)}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                                <h3 style="font-weight: 600;margin-top:10px;">Requirements</h3>
                                                                <p style="font-size:1em;margin-bottom: 0px;">(Maximum File size acceptable is 2 MB.You can attach jpg, jpeg, png, and PDF)</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group {{ $errors->first('passenger_government_id.'.$key) ? 'has-error' : '' }}">
                                                                <label class="control-label"><span>*</span>Government Issued ID with picture</label>
                                                                {{Form::file('passenger_government_id[ ]',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                                @if($errors->first('passenger_government_id.'.$key))
                                                                    <p class="help-block text-danger">{{$errors->first('passenger_government_id.'.$key)}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group {{ $errors->first('passenger_medical_certificate.'.$key) ? 'has-error' : '' }}">
                                                                <label class="control-label"><span>*</span>Medical Certificate<br></label>
                                                                
                                                                {{Form::file('passenger_medical_certificate[ ]',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                                @if($errors->first('passenger_medical_certificate.'.$key))
                                                                    <p class="help-block text-danger">{{$errors->first('passenger_medical_certificate.'.$key)}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group {{ $errors->first('passenger_travel_pass_or_travel_authority.'.$key) ? 'has-error' : '' }}">
                                                                <label class="control-label"><span>*</span>Travel Pass / Travel Authority</label>
                                                                {{Form::file('passenger_travel_pass_or_travel_authority[ ]',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                                @if($errors->first('passenger_travel_pass_or_travel_authority.'.$key))
                                                                    <p class="help-block text-danger">{{$errors->first('passenger_travel_pass_or_travel_authority.'.$key)}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @else

                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group text-center" style="margin-bottom: 30px;">
                                        <button type="button" class="btn btn-primary btn-add-passenger">Add Passenger</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group text-center" style="margin-bottom: 30px;">
                                        <h5 class="text-description">Travel Details</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group {{ $errors->first('place_of_origin') ? 'has-error' : '' }}">
                                        <label class="control-label">Place of Origin</label>
                                        {{Form::text('place_of_origin',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Place of Origin'])}}
                                        @if($errors->first('place_of_origin'))
                                            <p class="help-block text-danger">{{$errors->first('place_of_origin')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group {{ $errors->first('departure_date') ? 'has-error' : '' }}">
                                        <label class="control-label">Date Entry</label>
                                        {{Form::date('departure_date',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Entry Date'])}}
                                        @if($errors->first('departure_date'))
                                            <p class="help-block text-danger">{{$errors->first('departure_date')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group {{ $errors->first('entry_point') ? 'has-error' : '' }}">
                                        <label class="control-label">Entry Point</label>
                                        {{ Form::select('entry_point',['' => 'Select Entry Point'] + $check_points_arr,null,['class'=>'form-control','id'=>'start'])}}
                                        @if($errors->first('entry_point'))
                                            <p class="help-block text-danger">{{$errors->first('entry_point')}}</p>
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group {{ $errors->first('entry_time') ? 'has-error' : '' }}">
                                        <label class="control-label">Time Entry</label>
                                        {{ Form::time('entry_time',null,['class'=>'form-control'])}}
                                        @if($errors->first('entry_time'))
                                            <p class="help-block text-danger">{{$errors->first('entry_time')}}</p>
                                        @endif
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group {{ $errors->first('place_of_destination') ? 'has-error' : '' }}">
                                        <label class="control-label">Place of Destination</label>
                                        {{Form::text('place_of_destination',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Place of Destination'])}}
                                        @if($errors->first('place_of_destination'))
                                            <p class="help-block text-danger">{{$errors->first('place_of_destination')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group {{ $errors->first('exit_point') ? 'has-error' : '' }}">
                                        <label class="control-label">Exit Point</label>
                                        {{ Form::select('exit_point',['' => 'Select Exit Point'] + $check_points_arr,null,['class'=>'form-control','id'=>'end'])}}
                                        @if($errors->first('exit_point'))
                                            <p class="help-block text-danger">{{$errors->first('exit_point')}}</p>
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group {{ $errors->first('exit_time') ? 'has-error' : '' }}">
                                        <label class="control-label">Time Exit</label>
                                        {{ Form::time('exit_time',null,['class'=>'form-control'])}}
                                        @if($errors->first('exit_time'))
                                            <p class="help-block text-danger">{{$errors->first('exit_time')}}</p>
                                        @endif
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group {{ $errors->first('mode_of_transport') ? 'has-error' : '' }}">
                                        <label class="control-label">Mode of Transport</label>
                                        {{ Form::select('mode_of_transport',['' => 'Select Mode of Transport'] + $mode_of_transport_arr,null,['class'=>'form-control'])}}
                                        @if($errors->first('mode_of_transport'))
                                            <p class="help-block text-danger">{{$errors->first('mode_of_transport')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group {{ $errors->first('plate_no') ? 'has-error' : '' }}">
                                        <label class="control-label">Plate No</label>
                                        {{Form::text('plate_no',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Plate No','disabled'])}}
                                        @if($errors->first('plate_no'))
                                            <p class="help-block text-danger">{{$errors->first('plate_no')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group {{ $errors->first('model_type') ? 'has-error' : '' }}">
                                        <label class="control-label">Model/Type</label>
                                        {{Form::text('model_type',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Model/Type','disabled'])}}
                                        @if($errors->first('model_type'))
                                            <p class="help-block text-danger">{{$errors->first('model_type')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    {{Form::hidden('time_travel',0)}}
                                    <div id="map">
                                                        
                                    </div>
                                    <div>
                                        <h5>Estimated Time Of Arrival:<strong id="eta"></strong></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group text-center" style="margin-bottom: 30px;">
                                        <h5 class="text-description">DECLARATION AND DATA PRIVACY CONSENT</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group" style="margin-bottom: 30px;">
                                        <p class="text-consent">Pursuant to Republic Act No. 10173, otherwise known as the “Data Privacy Act of 2012”, the City Government of Santiago undertakes to secure all sensitive personal information given by the client, under strict confidentiality, with the use of the most appropriate standard recognized by the information and communications technology industry, and as recommended by the National Privacy Commission.No Data being maintained by the city Government shall be shared to third party or entity withdrawal then knowledge and consent of the client.</p>
                                    </div>
                                </div>
                            </div>
                            @if($errors->first('declaration_and_data_privacy'))
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 has-error text-center">
									 	<p class="help-block text-danger">{{$errors->first('declaration_and_data_privacy')}}</p>
								    </div>				    					
							    </div>
							@endif
                            <div class="row">
                            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            		<div class="checkbox {{ $errors->first('declaration_and_data_privacy') ? 'has-error' : '' }}" style="margin-bottom: 30px;">
										<label class="checkbox-label" style="margin-left: 0">
											<input type="checkbox" name="declaration_and_data_privacy" value="yes" class="big-checkbox">
											<span class="checkbox-custom rectangular"></span>
											&nbsp;I accept the Declaration and Data Privacy Consent
										</label>
									</div>
                            	</div>
                            </div>
							<div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary btn-custom btnSubmit" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{ Form::close()}}
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/moment.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{asset('assets/robinherborts-inputmask/dist/jquery.inputmask.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        let isMap = false;
        var infoWindow;
        var geocoder;
        var marker;
        $(document).on("keydown", ":input:not(textarea):not(:submit)", function(event) { 
            return event.key != "Enter";
        });
        $(document).ready(function(){
            $('input[name="email_address"]').on("change", function(event) { 
                if($('input[name="email_address_confirmation"]').val())
                {
                    if($(this).val() !== $('input[name="email_address_confirmation"]').val())
                    {
                        if($(this).parent().hasClass('has-error'))
                        {

                        }
                        else
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length)
                        {
                            $(this).siblings('.help-block').html('The email address confirmation does not match.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The email address confirmation does not match.</p>');
                        }
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        else
                        {

                        }
                        if($(this).siblings('.help-block').length)
                        {
                            $(this).siblings('.help-block').remove();
                        }
                    }
                }
                else
                {
                    if($(this).parent().hasClass('has-error'))
                    {
                        $(this).parent().removeClass('has-error');
                    }
                    else
                    {

                    }
                    if($(this).siblings('.help-block').length)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $('input[name="email_address_confirmation"]').on("change", function(event){
                    if($(this).val() !== $('input[name="email_address"]').val())
                    {
                        if($('input[name="email_address"]').parent().hasClass('has-error'))
                        {

                        }
                        else
                        {
                            $('input[name="email_address"]').parent().addClass('has-error');
                        }
                        if($('input[name="email_address"]').siblings('.help-block').length)
                        {
                            $('input[name="email_address"]').siblings('.help-block').html('The email address confirmation does not match.')
                        }
                        else
                        {
                            $('input[name="email_address"]').parent().append('<p class="help-block text-danger">The email address confirmation does not match.</p>');
                        }
                    }
                    else
                    {
                        if($('input[name="email_address"]').parent().hasClass('has-error'))
                        {
                            $('input[name="email_address"]').parent().removeClass('has-error');
                        }
                        else
                        {

                        }
                        if($('input[name="email_address"]').siblings('.help-block').length)
                        {
                            $('input[name="email_address"]').siblings('.help-block').remove();
                        }
                    }
            });
            var max_chars = 13;
        	@if(Session::has('flash_message'))
				Swal.fire(
				  'Success',
				  '{{Session::get('flash_message')}}',
				  'success'
				)
			@endif
			@if($errors->any())
                @if((!empty($errors->first('government_id')) && (strcasecmp($errors->first('government_id'),'The government id may not be greater than 2000 kilobytes.') == 0)) || (!empty($errors->first('medical_certificate')) && (strcasecmp($errors->first('medical_certificate'),'The medical certificate may not be greater than 2000 kilobytes.') == 0)) || (!empty($errors->first('travel_pass_or_travel_authority')) && (strcasecmp($errors->first('travel_pass_or_travel_authority'),'The travel pass or travel authority may not be greater than 2000 kilobytes.') == 0)) || ($passengerAttachmentsCtr > 0))
                    Swal.fire(
                        'There is an error.',
                        'The file size you uploaded is more than 2mb.',
                        'error'
                    );
                @else
                
                    Swal.fire(
                        'There is an error.',
                        'Please check all of your input.',
                        'error'
                    );
                @endif
                @if(!empty(old('mode_of_transport')) && (strcasecmp(old('mode_of_transport'),'cargo vehicle') == 0 || strcasecmp(old('mode_of_transport'),'motorcycle') == 0) || strcasecmp(old('mode_of_transport'),'private vehicle') == 0 || strcasecmp(old('mode_of_transport'),'tricycle') == 0)
                    $('input[name="plate_no"]').attr('disabled',false);
                    $('input[name="model_type"]').attr('disabled',false);
                @else
                    $('input[name="plate_no"]').attr('disabled',true);
                    $('input[name="model_type"]').attr('disabled',true);
                @endif
			@endif
            $('#registrationForm').on('change','select[name="mode_of_transport"]',function(){
                if($(this).val() == 'Cargo Vehicle' || $(this).val() == 'Motorcycle' || $(this).val() == 'Private Vehicle' || $(this).val() == 'Tricycle')
                {
                    $('input[name="plate_no"]').attr('disabled',false);
                    $('input[name="model_type"]').attr('disabled',false);
                }
                else
                {
                    $('input[name="plate_no"]').attr('disabled',true);
                    $('input[name="model_type"]').attr('disabled',true);
                }
            });
            $('#registrationForm').on('click','.btnSubmit',function(){
                $(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
                $(this).attr('disabled',true);
                $(this).siblings('.btn').attr('disabled',true);
                $(this).parents('form').submit();
            });
            // $('input[name="contact_no"]').keydown( function(e){
            //     if ($(this).val().length >= max_chars) { 
            //         $(this).val($(this).val().substr(0, max_chars));
            //     }
            // });

            // $('input[name="contact_no"]').keyup( function(e){
            //     if ($(this).val().length >= max_chars) { 
            //         $(this).val($(this).val().substr(0, max_chars));
            //     }
            // });
            $('input[name="contact_no"]').inputmask('mask', {'mask' : "+63999-999-9999",'removeMaskOnSubmit' : true,'autoUnmask':true});
            $('input[name="contact_no"').on('change',function(){
                 var value = $(this).val();
                if(value.length < 10)
                {
                    if($(this).parent().hasClass('has-error'))
                    {

                    }
                    else
                    {
                        $(this).parent().addClass('has-error');
                    }
                        if($(this).siblings('.help-block').length)
                        {
                            $(this).siblings('.help-block').html('Please complete your contact no.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">Please complete your contact no.</p>');
                        }
                }
                else
                {
                    if($(this).parent().hasClass('has-error'))
                    {
                        $(this).parent().removeClass('has-error');
                    }
                    else
                    {

                    }
                    if($(this).siblings('.help-block').length)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $("input[name='government_id']").on("change",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The government id may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The government id may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').remove();
                        }
                    }
                }
                else
                {
                    if($(this).parent().hasClass('has-error'))
                    {
                        $(this).parent().removeClass('has-error');
                    }
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $("input[name='medical_certificate']").on("change",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The medical certificate may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The medical certificate may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').remove();
                        }
                    }
                }
                else
                {
                    if($(this).parent().hasClass('has-error'))
                    {
                        $(this).parent().removeClass('has-error');
                    }
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $("input[name='travel_pass_or_travel_authority']").on("change",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The travel pass or travel authority may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The travel pass or travel authority may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').remove();
                        }
                    }
                }
                else
                {
                    if($(this).parent().hasClass('has-error'))
                    {
                        $(this).parent().removeClass('has-error');
                    }
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $('#registrationForm').on('click','.btn-add-passenger',function(){
                $('.btn-add-passenger').attr('disabled',true);
                var firstName = $('<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><div class="form-group"><label class="control-label">First Name</label>{{Form::text('passenger_first_name[ ]',NULL,['class'=>'form-control  validate[required]','placeholder' => 'First Name'])}}</div></div>');
                var middleName = $('<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><div class="form-group"><label class="control-label">Middle Name</label>{{Form::text('passenger_middle_name[ ]',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Middle Name'])}}</div></div>');
                var lastName = $('<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><div class="form-group"><label class="control-label">Last Name</label>{{Form::text('passenger_last_name[ ]',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Last Name'])}}</div></div>');
                var secondRow = $('<div class="row"></div>').append(firstName).append(middleName).append(lastName);
                var headerTemp = $('<h4></h4>').addClass('text-subheader passenger-header').html('Passenger ' + ($('.passenger-header').length + 1 ) + '&nbsp;<i class="fa fa-times-circle btnDelete" aria-hidden="true" ></i>');
                var headerFormGroup = $('<div class="form-group"></div>').append(headerTemp);
                var headerColumn = $('<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>').append(headerFormGroup);
                var firstRow = $('<div class="row"></div>').append(headerColumn);
                var requirementsRow = '<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="form-group"><h3 style="font-weight: 600;margin-top:10px;">Requirements</h3><p style="font-size:1em;margin-bottom: 0px;">(Maximum File size acceptable is 2 MB.You can attach jpg, jpeg, png, and PDF)</p></div></div></div>';
                var governmentIdPassenger = $('<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="form-group"><label class="control-label"><span>*</span>Government Issued ID with picture</label>{{Form::file('passenger_government_id[ ]',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}</div></div></div>');
                var medicalCertificatePassenger = $('<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="form-group"><label class="control-label"><span>*</span>Medical Certificate</label>{{Form::file('passenger_medical_certificate[ ]',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}</div></div></div>');
                var travelPassPassenger = $('<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="form-group"><label class="control-label"><span>*</span>Travel Pass / Travel Authority</label>{{Form::file('passenger_travel_pass_or_travel_authority[ ]',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}</div></div></div>');
                var passengerContainer = $('<div class="passenger-container"></div>').append(firstRow).append(secondRow).append(requirementsRow).append(governmentIdPassenger).append(medicalCertificatePassenger).append(travelPassPassenger);
                $('.col-passenger').append(passengerContainer);
                $('.btn-add-passenger').attr('disabled',false);
            });
            $('#registrationForm').on('click','.btnDelete',function(){
                $(this).parents('.passenger-container').remove();
                var ctr = 1;
                $('.passenger-header').each(function(){
                    $(this).html('Passenger ' + ctr + '&nbsp;<i class="fa fa-times-circle btnDelete" aria-hidden="true" ></i>');
                    ++ctr;
                });
            });
            $('#registrationForm').on("change","input[name='passenger_government_id[ ]']",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The government id may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The government id may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').remove();
                        }
                    }
                }
                else
                {
                    if($(this).parent().hasClass('has-error'))
                    {
                        $(this).parent().removeClass('has-error');
                    }
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $('#registrationForm').on("change","input[name='passenger_medical_certificate[ ]']",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The medical certificate may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The medical certificate may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').remove();
                        }
                    }
                }
                else
                {
                    if($(this).parent().hasClass('has-error'))
                    {
                        $(this).parent().removeClass('has-error');
                    }
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $('#registrationForm').on("change","input[name='passenger_travel_pass_or_travel_authority[ ]']",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The travel pass or travel authority may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The travel pass or travel authority may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').remove();
                        }
                    }
                }
                else
                {
                    if($(this).parent().hasClass('has-error'))
                    {
                        $(this).parent().removeClass('has-error');
                    }
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
        });
     function initMap() {
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();
        map = new google.maps.Map(document.getElementById('map'), {
            // center: {lat: 24.886, lng: -70.268},
            center: {lat: 16.695756, lng: 121.558540},
            zoom: 14,
            mapTypeId: 'roadmap',
            panControl:false,
            zoomControl:true,
            mapTypeControl:false,
            scaleControl:false,
            streetViewControl:false,
            overviewMapControl:true,
            rotateControl:true,
            zoomControlOptions: {
              position: google.maps.ControlPosition.LEFT_TOP,
            },
            fullscreenControlOptions: {
              position: google.maps.ControlPosition.RIGHT_TOP,
            },
        });
        map.setOptions({ 'styles' : [
            {
                "featureType": "administrative",
                "elementType": "geometry",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "poi",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "transit",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            }
        ]});
        infoWindow = new google.maps.InfoWindow;
        geocoder = new google.maps.Geocoder();
        directionsRenderer.setMap(map);
        const onChangeHandler = function () {
            calculateAndDisplayRoute(directionsService, directionsRenderer);
        };
        document.getElementById("start").addEventListener("change", onChangeHandler);
        document.getElementById("end").addEventListener("change", onChangeHandler);
        @if($errors->any())
            calculateAndDisplayRoute(directionsService, directionsRenderer);
        @endif
        isMap = true;
    }
    function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        if(document.getElementById("start").value && document.getElementById("end").value)
        {
            var originPoint;
            var destinationPoint;
            $.ajax({
                type: "GET", 
                dataType: 'json',
                url: "{{route('api.travel.pass.fetch-origin-and-destination-coordinates-by-name')}}",
                data: {'origin': $('#start').val(),'destination': $('#end').val()},
                async: true,
                contentType: "application/json; charset=utf-8",
                tryCount : 0,
                retryLimit : 3,
                success: function (result)
                {
                    if(result.success)
                    {
                        originPoint = null;
                        destinationPoint = null;
                        if(result.data.origin && result.data.destination)
                        {
                            originPoint = new google.maps.LatLng(result.data.origin.latitude, result.data.origin.longitude);
                            destinationPoint = new google.maps.LatLng(result.data.destination.latitude, result.data.destination.longitude);
                        }
                    }
                },
                error : function(xhr, textStatus, errorThrown ) {
                    if (textStatus == 'timeout') {
                        this.tryCount++;
                        if (this.tryCount <= this.retryLimit) {
                                //try again
                            $.ajax(this);
                            return;
                        }            
                        return;
                    }
                    if (xhr.status == 500) {
                            //handle error
                    } else {
                            //handle error
                    }
                }
            }).done(function(){
                directionsService.route(
                    {
                      origin: originPoint,
                      destination: destinationPoint,
                      travelMode: google.maps.TravelMode.DRIVING,
                    },
                    (response, status) => {
                      if (status === "OK") {
                        directionsRenderer.setDirections(response);
                        if(response.routes[0])
                        {
                            $('#eta').html(response.routes[0].legs[0].duration.text + "&nbsp;(" +response.routes[0].legs[0].distance.text+ ")");
                            $('input[name="time_travel"]').val(Math.round((response.routes[0].legs[0].duration.value / 60)));
                        }
                      } else {
                        $('input[name="time_travel"]').val('0');
                        $('#eta').html("Directions request failed due to " + status);
                      }
                    }
                );
            }).fail(function(){
                directionsService.route(
                    {
                      origin: {
                        query: document.getElementById("start").value + ' Isabela Santiago City',
                      },
                      destination: {
                        query: document.getElementById("end").value + ' Isabela Santiago City',
                      },
                      travelMode: google.maps.TravelMode.DRIVING,
                    },
                    (response, status) => {
                      if (status === "OK") {
                        directionsRenderer.setDirections(response);
                        if(response.routes[0])
                        {
                            $('#eta').html(response.routes[0].legs[0].duration.text + "&nbsp;(" +response.routes[0].legs[0].distance.text+ ")");
                            $('input[name="time_travel"]').val(Math.round((response.routes[0].legs[0].duration.value / 60)));
                        }
                      } else {
                        $('input[name="time_travel"]').val('0');
                        $('#eta').html("Directions request failed due to " + status);
                      }
                    }
                );
            });
        }
    }
    </script>
    <script 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIAhonOgUwLNyJ01P9kyAw5EebSHOf--g&callback=initMap" async defer>
    </script>
</body>
</html>