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
    <title>Travel Pass Status | {{Session::get('software_name')}}</title>


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
            .container-fluid
            {
                /* height: 100%; */
                /* width: 100%; */
                padding-left: 0px;
                padding-right: 0px;
                display: -webkit-flex;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                
                width: 100%;
                height: 100%;
                align-items: stretch;
            }
        .row-flex-horizontal
        {
            padding:20px;
            width: 100%;
                display:flex;
                display: -webkit-box;
                
                display: -ms-flexbox;
                display: -webkit-flex;
                -webkit-flex-direction: row;
                -ms-flex-direction: row;
                flex-direction: row;
                -webkit-box-orient: horizontal;
                -moz-box-orient: horizontal;
                align-items: stretch;
                justify-content: center;
                
        }
        .row-flex-vertical
        {
            /* height: 100%; */
            padding:20px;
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
        .text-description
            {
                color:#15296d; letter-spacing: 0px;font-weight: 600;
            }
        @media (min-width: 768px)
        {
            .panel-blue > .panel-body > img
            {
                height: 50px;
                width: 50px;
            }
            .panel-gray > .panel-body > img
            {
                height: 50px;
                width: 50px;
            }
            .panel-red > .panel-body > img
            {
                height: 50px;
                width: 50px;
            }
            .panel-green > .panel-body > img
            {
                height: 50px;
                width: 50px;
            }
            .text-title
            {
                color:#15296d; font-size: 2em;letter-spacing: 0px;font-weight: 600;margin-bottom: 0px;
            }
            .tracking-number
            {
                color:#373A3C;font-size: 1.5em;letter-spacing: 0px;font-weight: 800;
            }
            .text-details
            {
                color:#373A3C;font-size: 1.2em;letter-spacing: 0px;font-weight: 600;
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
              .text-description
            {
                font-size: 2em;
            }
            .divider
            {
                 margin-top: -50px;
            }
            .icon-text
            {
                color:#15296d;font-size: 1.2em;letter-spacing: 0px;font-weight: 600;
            }
        }
        @media(min-width: 992px)
        {
            .panel-blue > .panel-body > img
            {
                height: 80px;
                width: 80px;
            }
            .panel-gray > .panel-body > img
            {
                height: 80px;
                width: 80px;
            }
            .panel-red > .panel-body > img
            {
                height: 80px;
                width: 80px;
            }
            .panel-green > .panel-body > img
            {
                height: 80px;
                width: 80px;
            }
            .first-left
            {
                flex: 1;
            }
            .first-middle
            {
                flex: 5;
            }
            .first-right
            {
                flex: 1;
            }
            .text-title
            {
                color:#15296d; font-size: 2.4em;letter-spacing: 0px;font-weight: 600;margin-bottom: 0px;
            }
            .tracking-number
            {
                color:#373A3C;font-size: 1.9em;letter-spacing: 0px;font-weight: 800;
            }
            .text-details
            {
                color:#373A3C;font-size: 1.6em;letter-spacing: 0px;font-weight: 600;
            }
        }
        @media (min-height:600px)
        {
            .row-flex-vertical
            {
                height: 100%;
            }    
        }
        @media (max-width: 767px)
        {
            .icon-text
            {
                color:#15296d;font-size: 1em;letter-spacing: 0px;font-weight: 600;
            }
            .panel-blue > .panel-body > img
            {
                height: 25px;
                width: 25px;
            }
            .panel-blue
            {
                margin-bottom: unset;
            }
            .panel-gray > .panel-body > img
            {
                height: 25px;
                width: 25px;
            }
            .panel-gray
            {
                margin-bottom: unset;
            }
            .panel-red > .panel-body > img
            {
                height: 25px;
                width: 25px;
            }
            .panel-red
            {
                margin-bottom: unset;
            }
            .panel-green > .panel-body > img
            {
                height: 25px;
                width: 25px;
            }
            .panel-green
            {
                margin-bottom: unset;
            }
            .container-fluid
            {
                height: unset;
            }
            .first-left
            {
                flex: 1 ;
            }
            .first-middle
            {
                flex: 5;
            }
            .first-right
            {
                flex: 1;
            }
             .text-description
            {
                font-size: 1.1em;
            }
            .text-title
            {
                color:#15296d; font-size: 1.5em;letter-spacing: 0px;font-weight: 600;margin-bottom: 0px;
            }
            .tracking-number
            {
                color:#373A3C;font-size: 1.2em;letter-spacing: 0px;font-weight: 800;
            }
            .text-details
            {
                color:#373A3C;font-size: 1em;letter-spacing: 0px;font-weight: 600;
            }
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
             .row-flex-horizontal
             {
                width: unset;
             }
        }
        @media(max-width: 320px)
        {
            .row-flex-horizontal
             {
                width: unset;
             }
        }
        .panel-form
        {
            box-shadow: 0px 3px 6px #00000029;
        }
        .panel-form > .panel-body
        {
            padding: 50px;
        }

        
        .btn-custom
        {
            background-color: #1C7CD5;
            border-color: #1766AF;
            padding: 15px 50px;
            color: white;
            font-size: 1.5em;
        }
        input[type="text"]
            {
                height: 50px;
                font-size:20px;
                border: 1px solid #DDDFE2;
                border-radius: 5px;
            }
        .panel-blue
        {
            background: #15296d 0% 0% no-repeat padding-box;
            border: 1px solid #C6C6C6;
            border-radius: 8px;
            color: white;
        }
        .panel-gray
        {
            background: #9A9A9A 0% 0% no-repeat padding-box;
            border: 1px solid #C6C6C6;
            border-radius: 8px;
            color: black;
        }
        .panel-red
        {
            background: #a94442 0% 0% no-repeat padding-box;
            border: 1px solid #C6C6C6;
            border-radius: 8px;
            color: white;
        }
        .panel-green
        {
            background: #00B341 0% 0% no-repeat padding-box;
            border: 1px solid #009336;
            border-radius: 8px;
            color: white;
        }
        .panel-gray > .panel-body > img
        {
            display: block;
            margin: 0 auto;

        }
        .panel-blue > .panel-body > img
        {
            display: block;
            margin: 0 auto;

        }
        .panel-red > .panel-body > img
        {
            display: block;
            margin: 0 auto;

        }
        .panel-green > .panel-body > img
        {
            display: block;
            margin: 0 auto;

        }
        .divider {
          flex-grow: 1;
          border: 2px solid #15296d;
          /* margin: 5px */
        }
        .gray-border
        {
            border-color: #9A9A9A;
        }
        .red-border
        {
            border-color: #a94442;
        }
        .green-border
        {
            border-color: #00B341;
        }
        .icon-text
        {
            text-align: center;
        }
        .flex-icons > div
        {
            flex-basis: 100%;
            align-self: stretch;
        }
        .flex-icons > div.divider
        {
            align-self: center;
        }
        .text-gray
        {
            color: #9A9A9A;
        }
        .text-red
        {
            color: #a94442;
        }
        .text-green
        {
            color: #00B341;
        }
        .text-black
        {
            color: #000000;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row-flex-horizontal">
            <div class="first-left">
                &nbsp;
            </div>
            <div class="first-middle">
                <div class="row-flex-vertical">
                    <div class="second-left">
                        &nbsp;
                    </div>
                    <div class="second-middle">
                        <div class="panel panel-default panel-form">
                            <div class="panel-body">
                                {{ Form::open(array('route' => 'show.travel.pass.status','files' => true,'id'=>'registrationForm','method'=>'GET')) }}
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
                                            <div class="form-group text-center">
                                                <h5 class="text-description">Travel Pass Status</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group text-center" style="margin-bottom: 30px;">
                                                <h5 class="text-description">Travel Pass #{{!empty($travel_pass->tracking_no) ? $travel_pass->tracking_no : 'xxxxxxxxxxx'}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-middle flex-icons" style="justify-content: space-between;align-items: center;">
                                        @if(!empty($travel_pass))
                                            @if(strcasecmp($travel_pass->type,'incoming_visitor') != 0 && strcasecmp($travel_pass->type,'ofw') != 0 && strcasecmp($travel_pass->type,'pass_through') != 0)
                                                <div>
                                                    @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'rejected') == 0 || strcasecmp($travel_pass->status,'cancelled') == 0))
                                                        @if(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'processing') == 0))
                                                            <div class="panel panel-red">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/processing-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-red">Travel Application Rejected</span>
                                                            </div>
                                                        @else
                                                            <div class="panel panel-blue">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/processing-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-blue">Processing</span>
                                                            </div>
                                                        @endif
                                                    @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'processing') == 0))
                                                        <div class="panel panel-gray">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/processing-black.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-black">Processing</span>
                                                        </div>
                                                    @elseif(!empty($travel_pass->status) &&  (strcasecmp($travel_pass->status,'medical_assessment') == 0 || strcasecmp($travel_pass->status,'waiting_for_payment') == 0 || strcasecmp($travel_pass->status,'payment_paid') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                                        <div class="panel panel-blue">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/processing-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-blue">Processing</span>
                                                        </div>
                                                    @else
                                                        <div class="panel panel-gray">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/processing-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-gray">Processing</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'rejected') == 0 || strcasecmp($travel_pass->status,'cancelled') == 0))
                                                    @if(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'medical_assessment') == 0))
                                                        <div class="divider red-border">

                                                        </div>
                                                    @elseif(empty($travel_pass_approve) || (!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'processing') == 0)))
                                                        <div class="divider gray-border">

                                                        </div>
                                                    @else
                                                        <div class="divider blue-border">

                                                        </div>
                                                    @endif
                                                @elseif(!empty($travel_pass->status) &&  (strcasecmp($travel_pass->status,'medical_assessment') == 0 || strcasecmp($travel_pass->status,'waiting_for_payment') == 0 || strcasecmp($travel_pass->status,'payment_paid') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                                    <div class="divider blue-border">

                                                    </div>
                                                @else
                                                    <div class="divider gray-border">

                                                    </div>
                                                @endif
                                                <div>
                                                    @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'rejected') == 0 || strcasecmp($travel_pass->status,'cancelled') == 0))
                                                        @if(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'medical_assessment') == 0))
                                                            <div class="panel panel-red">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/assessment-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-red">Travel Application Rejected</span>
                                                            </div>
                                                        @elseif(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'processing') == 0))
                                                            <div class="panel panel-gray">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/assessment-black.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-gray">Medical Assessment</span>
                                                            </div>
                                                        @else
                                                            <div class="panel panel-blue">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/assessment-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-blue">Medical Assessment</span>
                                                            </div>
                                                        @endif
                                                    @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'medical_assessment') == 0))
                                                        <div class="panel panel-gray">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/assessment-black.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-black">Medical Assessment</span>
                                                        </div>
                                                    @elseif(!empty($travel_pass->status) &&  (strcasecmp($travel_pass->status,'waiting_for_payment') == 0 || strcasecmp($travel_pass->status,'payment_paid') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                                        <div class="panel panel-blue">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/assessment-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-blue">Medical Assessment</span>
                                                        </div>
                                                    @else
                                                        <div class="panel panel-gray">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/assessment-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-gray">Medical Assessment</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'rejected') == 0 || strcasecmp($travel_pass->status,'cancelled') == 0))
                                                    @if(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'waiting_for_payment') == 0 || strcasecmp($travel_pass_approve->status,'payment_paid') == 0))
                                                        <div class="divider red-border">

                                                        </div>
                                                    @elseif(empty($travel_pass_approve) || (!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'medical_assessment') == 0)))
                                                        <div class="divider gray-border">

                                                        </div>
                                                    @else
                                                        <div class="divider blue-border">

                                                        </div>
                                                    @endif
                                                @elseif(!empty($travel_pass->status) &&  (strcasecmp($travel_pass->status,'waiting_for_payment') == 0 || strcasecmp($travel_pass->status,'payment_paid') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                                    <div class="divider blue-border">

                                                    </div>
                                                @else
                                                    <div class="divider gray-border">

                                                    </div>
                                                @endif
                                                <div>
                                                    @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'rejected') == 0 || strcasecmp($travel_pass->status,'cancelled') == 0))
                                                        @if(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'waiting_for_payment') == 0 || strcasecmp($travel_pass_approve->status,'payment_paid') == 0))
                                                            <div class="panel panel-red">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/payment-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-red">Travel Application Rejected</span>
                                                            </div>
                                                        @elseif(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'medical_assessment') == 0))
                                                            <div class="panel panel-gray">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/payment-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-gray">Payment</span>
                                                            </div>
                                                        @else
                                                            <div class="panel panel-blue">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/payment-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-blue">Payment</span>
                                                            </div>
                                                        @endif
                                                    @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'waiting_for_payment') == 0))
                                                        <div class="panel panel-gray">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/payment-black.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-black">Payment</span>
                                                        </div>
                                                    @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'payment_paid') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                                        <div class="panel panel-blue">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/payment-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-blue">Payment</span>
                                                        </div>
                                                    @else
                                                        <div class="panel panel-gray">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/payment-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-gray">Payment</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'rejected') == 0 || strcasecmp($travel_pass->status,'cancelled') == 0))
                                                    @if(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'medical_certificate') == 0))
                                                        <div class="divider red-border">

                                                        </div>
                                                    @elseif(empty($travel_pass_approve) || (!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'waiting_for_payment') == 0)))
                                                        <div class="divider gray-border">

                                                        </div>
                                                    @else
                                                        <div class="divider blue-border">

                                                        </div>
                                                    @endif
                                                @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass_approve->status,'payment_paid') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                                    <div class="divider blue-border">

                                                    </div>
                                                @else
                                                    <div class="divider gray-border">

                                                    </div>
                                                @endif
                                                <div>
                                                    @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'rejected') == 0 || strcasecmp($travel_pass->status,'cancelled') == 0))
                                                        @if(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'medical_certificate') == 0))
                                                            <div class="panel panel-red">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/cross-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-red">Travel Application Rejected</span>
                                                            </div>
                                                        @elseif(!empty($travel_pass_approve->status) && (strcasecmp($travel_pass_approve->status,'waiting_for_payment') == 0))
                                                            <div class="panel panel-gray">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/medical-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-gray">Medical Certificate</span>
                                                            </div>
                                                        @else
                                                            <div class="panel panel-blue">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/medical-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-blue">Medical Certificate</span>
                                                            </div>
                                                        @endif
                                                    @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'payment_paid') == 0))
                                                        <div class="panel panel-gray">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/medical-black.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-black">Medical Certificate</span>
                                                        </div>
                                                    @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass_approve->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                                        <div class="panel panel-blue">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/medical-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-blue">Medical Certificate</span>
                                                        </div>
                                                    @else
                                                        <div class="panel panel-gray">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/medical-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-gray">Medical Certificate</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'rejected') == 0 || strcasecmp($travel_pass->status,'cancelled') == 0))
                                                    @if(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'released') == 0))
                                                        <div class="divider red-border">

                                                        </div>
                                                    @else
                                                        <div class="divider gray-border">

                                                        </div>
                                                    @endif
                                                @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                                    <div class="divider blue-border">

                                                    </div>
                                                @else
                                                    <div class="divider gray-border">

                                                    </div>
                                                @endif
                                                <div>
                                                    @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'rejected') == 0 || strcasecmp($travel_pass->status,'cancelled') == 0))
                                                        @if(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'released') == 0))
                                                            <div class="panel panel-red">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/medical-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-red">Travel Application Rejected</span>
                                                            </div>
                                                        @elseif(!empty($travel_pass_approve->status) && (strcasecmp($travel_pass_approve->status,'medical_certificate') == 0))
                                                            <div class="panel panel-gray">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/released-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-gray">Released</span>
                                                            </div>
                                                        @else
                                                            <div class="panel panel-blue">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/released-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-blue">Released</span>
                                                            </div>
                                                        @endif
                                                    @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'released') == 0))
                                                        <div class="panel panel-blue">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/released-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-blue">Released</span>
                                                        </div>
                                                    @else
                                                        <div class="panel panel-gray">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/released-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-gray">Released</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            @else
                                                <div>
                                                    @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'rejected') == 0 || strcasecmp($travel_pass->status,'cancelled') == 0))
                                                        @if(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'processing') == 0))
                                                            <div class="panel panel-red">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/processing-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-red">Travel Application Rejected</span>
                                                            </div>
                                                        @else
                                                            <div class="panel panel-blue">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/processing-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-blue">Processing</span>
                                                            </div>
                                                        @endif
                                                    @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'processing') == 0))
                                                        <div class="panel panel-gray">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/processing-black.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-black">Processing</span>
                                                        </div>
                                                    @elseif(!empty($travel_pass->status) &&  (strcasecmp($travel_pass->status,'medical_assessment') == 0 || strcasecmp($travel_pass->status,'waiting_for_payment') == 0 || strcasecmp($travel_pass->status,'payment_paid') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'approved') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                                        <div class="panel panel-blue">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/processing-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-blue">Processing</span>
                                                        </div>
                                                    @else
                                                        <div class="panel panel-gray">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/processing-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-gray">Processing</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'rejected') == 0 || strcasecmp($travel_pass->status,'cancelled') == 0))
                                                    @if(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'medical_assessment') == 0 || strcasecmp($travel_pass_approve->status,'approved') == 0))
                                                        <div class="divider red-border">

                                                        </div>
                                                    @elseif(empty($travel_pass_approve) || (!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'processing') == 0)))
                                                        <div class="divider gray-border">

                                                        </div>
                                                    @else
                                                        <div class="divider blue-border">

                                                        </div>
                                                    @endif
                                                @elseif(!empty($travel_pass->status) &&  (strcasecmp($travel_pass->status,'medical_assessment') == 0 || strcasecmp($travel_pass->status,'waiting_for_payment') == 0 || strcasecmp($travel_pass->status,'payment_paid') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0 || strcasecmp($travel_pass->status,'approved') == 0))
                                                    <div class="divider blue-border">

                                                    </div>
                                                @else
                                                    <div class="divider gray-border">

                                                    </div>
                                                @endif
                                                <div>
                                                    @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'rejected') == 0 || strcasecmp($travel_pass->status,'cancelled') == 0))
                                                        @if(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'medical_assessment') == 0 || strcasecmp($travel_pass_approve->status,'approved') == 0))
                                                            <div class="panel panel-red">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/medical-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-red">Travel Application Rejected</span>
                                                            </div>
                                                        @elseif(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'processing') == 0))
                                                            <div class="panel panel-gray">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/medical-black.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-gray">Approved</span>
                                                            </div>
                                                        @else
                                                            <div class="panel panel-blue">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/medical-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-blue">Approved</span>
                                                            </div>
                                                        @endif
                                                    {{-- @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'medical_assessment') == 0 || strcasecmp($travel_pass->status,'approved') == 0))
                                                        <div class="panel panel-gray">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/medical-black.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-black">Approved</span>
                                                        </div> --}}
                                                    @elseif(!empty($travel_pass->status) &&  (strcasecmp($travel_pass->status,'waiting_for_payment') == 0 || strcasecmp($travel_pass->status,'payment_paid') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'approved') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                                        <div class="panel panel-blue">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/medical-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-blue">Approved</span>
                                                        </div>
                                                    @else
                                                        <div class="panel panel-gray">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/medical-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-gray">Approved</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'rejected') == 0 || strcasecmp($travel_pass->status,'cancelled') == 0))
                                                    @if(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'released') == 0))
                                                        <div class="divider red-border">

                                                        </div>
                                                    @else
                                                        <div class="divider gray-border">

                                                        </div>
                                                    @endif
                                                @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'approved') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                                    <div class="divider blue-border">

                                                    </div>
                                                @else
                                                    <div class="divider gray-border">

                                                    </div>
                                                @endif
                                                <div>
                                                    @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'rejected') == 0 || strcasecmp($travel_pass->status,'cancelled') == 0))
                                                        @if(!empty($travel_pass_approve->status) &&  (strcasecmp($travel_pass_approve->status,'released') == 0))
                                                            <div class="panel panel-red">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/medical-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-red">Travel Application Rejected</span>
                                                            </div>
                                                        @elseif(!empty($travel_pass_approve->status) && (strcasecmp($travel_pass->status,'approved') == 0 || strcasecmp($travel_pass_approve->status,'medical_certificate') == 0))
                                                            <div class="panel panel-gray">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/released-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-gray">Released</span>
                                                            </div>
                                                        @else
                                                            <div class="panel panel-blue">
                                                                <div class="panel-body">
                                                                    <img src="{{asset('uploads/icons/released-white.png')}}" >
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <span class="icon-text text-blue">Released</span>
                                                            </div>
                                                        @endif
                                                    @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'approved') == 0))
                                                        <div class="panel panel-gray">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/released-black.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-black">Released</span>
                                                        </div>
                                                    @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'released') == 0))
                                                        <div class="panel panel-blue">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/released-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-blue">Released</span>
                                                        </div>
                                                    @else
                                                        <div class="panel panel-gray">
                                                            <div class="panel-body">
                                                                <img src="{{asset('uploads/icons/released-white.png')}}" >
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <span class="icon-text text-gray">Released</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif
                                        @else
                                            <div class="text-center">
                                                <h2 class="text-black">Unable To Find Travel Pass Status</h2>
                                            </div>
                                        @endif
                                    </div>
                                    @if(!empty($travel_pass) && strcasecmp($travel_pass->status, 'released') == 0)
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group text-center">
                                                    <button type="button" class="btn btn-primary" style="background-color:#15296d;" title="Attachments" data-toggle="modal" data-target="#showTravelPassAttachments">View Attachments</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                {{ Form::close() }}
                            </div>
                        </div>
                        
                    </div>
                    <div class="second-right">
                        &nbsp;
                    </div>
                </div>
            </div>
            <div class="first-right">
                &nbsp;
            </div>
        </div>
        @if(!empty($travel_pass) && strcasecmp($travel_pass->status, 'released') == 0)
            <div id="showTravelPassAttachments" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Attachments</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group text-center">
                                        <label>Government ID:</label>
                                        <a href="{{ route('show.travel.pass.status.download.attachments',['tracking_no' => $travel_pass->tracking_no,'attachment'=>'gid']) }}" class="btn btn-default btn-block" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>&nbsp;Download</a>
                                    </div>
                                </div>
                            </div>
                            @if(!empty($travel_pass) && (strcasecmp($travel_pass->type,'ofw') == 0 || strcasecmp($travel_pass->type,'incoming_visitor') == 0 || strcasecmp($travel_pass->type,'pass_through') == 0))
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group text-center">
                                            <label>Medical Certificate:</label>
                                            <a href="{{ route('show.travel.pass.status.download.attachments',['tracking_no' => $travel_pass->tracking_no,'attachment'=>'omc']) }}" class="btn btn-default btn-block" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>&nbsp;Download</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($travel_pass) && strcasecmp($travel_pass->type,'incoming_visitor') == 0)
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group text-center">
                                            <label>Barangay Certificate:</label>
                                            <a href="{{ route('show.travel.pass.status.download.attachments',['tracking_no' => $travel_pass->tracking_no,'attachment'=>'bc']) }}" class="btn btn-default btn-block" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>&nbsp;Download</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($travel_pass) && strcasecmp($travel_pass->type,'incoming_visitor') != 0 && strcasecmp($travel_pass->type,'ofw') != 0 && strcasecmp($travel_pass->type,'pass_through') != 0)
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group text-center">
                                            <label>BHERT Health Declaration:</label>
                                            <a href="{{ route('show.travel.pass.status.download.attachments',['tracking_no' => $travel_pass->tracking_no,'attachment'=>'bhd']) }}" class="btn btn-default btn-block" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>&nbsp;Download</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($travel_pass) && (strcasecmp($travel_pass->type,'ofw') == 0))
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group text-center">
                                            <label>Certificate of Employment:</label>
                                            <a href="{{ route('show.travel.pass.status.download.attachments',['tracking_no' => $travel_pass->tracking_no,'attachment'=>'coe']) }}" class="btn btn-default btn-block" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>&nbsp;Download</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($travel_pass) && strcasecmp($travel_pass->type,'frequent_traveller') == 0)
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group text-center">
                                            <label>Rapid Test Result:</label>
                                            <a href="{{ route('show.travel.pass.status.download.attachments',['tracking_no' => $travel_pass->tracking_no,'attachment'=>'rtr']) }}" class="btn btn-default btn-block" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>&nbsp;Download</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if((strcasecmp($travel_pass->type,'resident') == 0 || strcasecmp($travel_pass->type,'frequent_traveller') == 0) && (!empty($travel_pass_attachment->medical_certificate_issued_by_city_health_office)))
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group text-center">
                                            <label>Medical Certificate Issued By City Health Office:</label>
                                            <a href="{{ route('show.travel.pass.status.download.attachments',['tracking_no' => $travel_pass->tracking_no,'attachment'=>'mccho']) }}" class="btn btn-default btn-block" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>&nbsp;Download</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($travel_pass) && ((strcasecmp($travel_pass->type,'incoming_visitor') != 0 && strcasecmp($travel_pass->type,'ofw') != 0 && strcasecmp($travel_pass->type,'pass_through') != 0) || (strcasecmp($travel_pass->type,'resident') == 0 && !empty($travel_pass_attachment->medical_certificate_issued_by_city_health_office) && strcasecmp($travel_pass_attachment->is_valid_medical_certificate_issued_by_city_health_office,'no') == 0)))
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group text-center">
                                            <label>Medical Certificate:</label>
                                            <a href="{{ route('show.travel.pass.status.download.attachments',['tracking_no' => $travel_pass->tracking_no,'attachment'=>'nmc']) }}" class="btn btn-default btn-block" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>&nbsp;Download</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(strcasecmp($travel_pass->type,'pass_through') != 0)
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group text-center">
                                            <label>Travel Pass Document:</label>
                                            <a href="{{ route('show.travel.pass.status.download.attachments',['tracking_no' => $travel_pass->tracking_no,'attachment'=>'tpd']) }}" class="btn btn-default btn-block" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>&nbsp;Download</a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group text-center">
                                            <label>Travel Pass / Travel Authority:</label>
                                            <a href="{{ route('show.travel.pass.status.download.attachments',['tracking_no' => $travel_pass->tracking_no,'attachment'=>'tpta']) }}" class="btn btn-default btn-block" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>&nbsp;Download</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group text-center">
                                        <label>QR Code:</label>
                                        <a href="{{ route('show.travel.pass.status.download.attachments',['tracking_no' => $travel_pass->tracking_no,'attachment'=>'qrc']) }}" class="btn btn-default btn-block" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>&nbsp;Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/moment.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        	@if(Session::has('flash_message'))
				Swal.fire(
				  'Success',
				  '{{Session::get('flash_message')}}',
				  'success'
				)
			@endif
            @if(Session::has('flash_error'))
                Swal.fire(
                  'Error',
                  '{{Session::get('flash_error')}}',
                  'error'
                )
            @endif
        });
    </script>
</body>
</html>