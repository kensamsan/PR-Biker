<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:site_name" content="CovidTracer Travel Pass">
    <meta property="og:title" content="CovidTracer Travel Pass" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{route('check.travel.pass.status') }}" />
    <meta property="og:image" itemprop="image" content="{{ url('uploads/small_covid.png') }}" />
    <meta property="og:image:type" content="image/png">
    <meta property="og:description" content="Santiagueño Disiplinado, COVID-19 Kaya Natin!" /> 
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
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
    <title>Check Travel Pass Status | {{Session::get('software_name')}}</title>


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
        }
        @media(min-width: 992px)
        {
            .first-left
            {
                flex: 1;
            }
            .first-middle
            {
                flex: 2;
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
                flex: 2;
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
        }
        .panel
        {
            box-shadow: 0px 3px 6px #00000029;
        }
        .panel > .panel-body
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
    </style>
</head>
<body>
    <link itemprop="thumbnailUrl" href="{{ url('uploads/small_covid.png') }}"> 
    <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject"> 
      <link itemprop="url" href="{{ url('uploads/small_covid.png') }}"> 
    </span>
    <div class="container-fluid">
        <div class="row-flex-horizontal">
            <div class="first-left">
                &nbsp;
            </div>
            <div class="first-middle">
                <div class="row-flex-vertical">
                    <div class="first-left">
                        &nbsp;
                    </div>
                    <div class="first-middle">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                {{ Form::open(array('route' => 'show.travel.pass.status','files' => true,'id'=>'registrationForm','method'=>'POST')) }}
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
                                                <h5 class="text-description">Travel Pass Status</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                                            <div class="form-group text-center" style="margin-bottom: 30px;">
                                                {{Form::text('tracking_no',NULL,['class'=>'form-control','placeholder'=>'Tracking Number'])}}
                                                @if($errors->first('tracking_no'))
                                                    <p class="help-block text-danger" style="color:#a94442;">{{$errors->first('tracking_no')}}</p>
                                                @endif
                                                @if(Session::has('flash_error'))
                                                    <p class="help-block text-danger" style="color:#a94442;">{{Session::get('flash_error')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group text-center">
                                                <button class="btn btn-primary btn-custom" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                        
                    </div>
                    <div class="first-right">
                        &nbsp;
                    </div>
                </div>
            </div>
            <div class="first-right">
                &nbsp;
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/moment.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        	@if(Session::has('flash_message'))
				Swal.fire(
				  'Success',
				  '{{Session::get('flash_message')}}',
				  'success'
				)
			@endif
        });
    </script>
</body>
</html>