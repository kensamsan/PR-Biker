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
    <title>Registration Done | {{Session::get('software_name')}}</title>


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
            background-color: #2C2926;
            border-color: #2C2926;
            padding: 15px 50px;
            color: white;
            font-size: 1.5em;
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
                    <div class="first-left">
                        &nbsp;
                    </div>
                    <div class="first-middle">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group text-center" style="margin-bottom:30px;">
                                            <h5 class="text-title">Your Application is now on Process. We will notify you thru email & SMS once its verified.</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group text-center">
                                            <img src="{{asset('uploads/icons/checked(2).png')}}" class="img-responsive" style="margin: 0 auto;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group text-center" style="margin-bottom:30px;">
                                            <h5 class="text-details">For more details, track your travel pass status.</h5>
                                            <h5 class="tracking-number">Tracking #{{Session::get('tracking_number')}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group text-center">
                                            <a href="{{route('registration.index')}}" class="btn btn-default btn-custom">Done</a>
                                        </div>
                                    </div>
                                </div>
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
			@if($errors->any())
				Swal.fire(
				  'There is an error.',
				  'Please check all of your input.',
				  'error'
				)
			@endif
        });
    </script>
</body>
</html>