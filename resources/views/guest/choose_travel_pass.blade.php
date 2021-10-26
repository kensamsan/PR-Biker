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
    <title>Choose one of the following | {{Session::get('software_name')}}</title>


    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
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
            .btn-custom
            {
            	color: #15296d;
            	font-size: 1.8em;
            	padding:  25px;
            	font-weight: 600;
            }
            a.btn-custom:hover, a.btn-custom:active , a.btn-custom:focus
            {
            	background-color: #15296d !important;
                color:white;
            }
            .full-height
            {
                height:100%;
            }
            .full-width
            {
                width:100%;
            }
            .row-flex-vertical
            {
                width: 100%;
                height: 100%;
                display:flex;
                display: -webkit-box;
                
                display: -ms-flexbox;
                display: -webkit-flex;
                -webkit-flex-direction: column;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-orient: vertical;
                -moz-box-orient: vertical;
                align-items: stretch;
            }
            .container-fluid
            {
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
                height:100%;
                /* padding:20px; */
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
                justify-content: space-around;
            }
         .panel-custom
         {
         	border:  unset;
         	border-radius: unset;
         	box-shadow: 0px 3px 6px #00000029;
         }
         .panel-custom > .panel-body
         {
         	padding: 15px 20px;
         }
         .panel-custom > .panel-body > h4
         {
         	font-weight: 600;
         }
         @media (min-width: 992px)
         {
         	.panel-custom > .panel-body > h4
         	{
         		text-align: right;
         	}
         	.first-left
         	{
         		flex:2
         	}
         	.first-middle
         	{
         		flex:3
         	}
         	.first-right
         	{
         		flex:2
         	}
         }
         @media (max-width: 991px)
         {
         	.panel-custom > .panel-body > h4
         	{
         		text-align: center;
         	}
         	.first-left
         	{
         		flex:1
         	}
         	.first-middle
         	{
         		flex:4
         	}
         	.first-right
         	{
         		flex:1
         	}
         }
         @media (min-width: 1200px)
         {
         	.first-left
         	{
         		flex:2
         	}
         	.first-middle
         	{
         		flex:3
         	}
         	.first-right
         	{
         		flex:2
         	}
         }
         @media(max-width: 767px)
         {
         	.first-left
         	{
         		flex:1
         	}
         	.first-middle
         	{
         		flex:5
         	}
         	.first-right
         	{
         		flex:1
         	}
         	.flex-middle
	         {
	         	height:100%;
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
	         .text-covid
	         {
	         	color:#15296d; font-size: 2em;letter-spacing: 0px;font-weight: 600;margin-bottom: 0px;text-align: center;
	         }
	         .text-travel
	         {
	         	color:#15296d; font-size: 2em;letter-spacing: 0px;font-weight: 600;	text-align: center;
	         }
	         .btn-custom
	         {
	         	font-size: initial;
	         	display: block;
	         	width: 100%;
	         }
	       .text-description
         	{
         		font-size: 1.2em;
         	}
            .text-footer
            {
                font-size: 1em;
            }
         }
         .text-description
         	{
         		color:#15296d; letter-spacing: 0px;font-weight: 600;
         	}
            .text-footer
            {
                letter-spacing: 0px;
            }
         @media(min-width: 768px)
         {
         	 .text-description
         	{
         		font-size: 2em;
         	}
            .text-footer
            {
                font-size: 1.3em;
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
	            align-items: stretch;justify-content: space-between;
	         	
	         }
	         .text-covid
	         {
	         	color:#15296d; font-size: 2.5em;letter-spacing: 0px;font-weight: 600;margin-bottom: 0px;
	         }
	         .text-travel
	         {
	         	color:#15296d; font-size: 2.5em;letter-spacing: 0px;font-weight: 600;
	         }
	         .first-middle > .panel > .panel-body
         	{
         		padding: 50px;
         	}
         	.btn-custom
         	{
         		min-width: 470px;

         	}
         }
         .first-middle
         {
         	justify-content: center;
         	align-self: center;
         }
    </style>
</head>
<body>
	<div class="container-fluid">
		<div class="row-flex-vertical">
			<div style="flex:2;
                    -webkit-box-flex: 2;      
                    -moz-box-flex: 2;         
                    -webkit-flex: 2;          
                    -ms-flex: 2;">
				<div class="panel panel-default panel-custom">
					<div class="panel-body">
						<h4 style="font:gibsonregular;letter-spacing: 0px;color: #15296d;"><a href="{{route('check.travel.pass.status')}}" style="color: #15296d;">Track Travel Pass Status</a></h4>
					</div>
				</div>
			</div>
			<div style="flex:35;
                    -webkit-box-flex: 35;      
                    -moz-box-flex: 35;         
                    -webkit-flex: 35;          
                    -ms-flex: 35;">
                <div class="row-flex-horizontal">
                	<div class="first-left">
                		
                	</div>
                	<div class="first-middle">
                		<div class="panel panel-default" style="background: #FFFFFF 0% 0% no-repeat padding-box;
box-shadow: 0px 3px 6px #00000029;border-radius:0px;">
                			<div class="panel-body">
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
                				<div class="row-flex-vertical">
                					<div class="form-group text-center">
                						<h5 class="text-description">Click on the Travel Pass you need</h5>
                					</div>
                                    <div class="form-group text-center">
                                        <a href="{{route('registration.incoming.visitor')}}" class="btn btn-default btn-custom">
                                            Travel Pass for Incoming Visitor
                                        </a>
                                    </div>
                					<div class="form-group text-center">
                						<a href="{{route('registration.resident')}}" class="btn btn-default btn-custom">
                						    Travel Pass for Local Traveller
                						</a>
                					</div>
                                    <div class="form-group text-center">
                                        <a href="{{route('registration.frequent.traveller')}}" class="btn btn-default btn-custom">
                                            Travel Pass for Frequent Traveller
                                        </a>
                                    </div>
                					<div class="form-group text-center">
                						<a href="{{route('registration.ofw')}}" class="btn btn-default btn-custom">
                							Travel Pass for ROF<br>(Returning Overseas Filipino)
                						</a>
                					</div>
                					<div class="form-group text-center">
                						<a href="{{route('registration.lsi')}}" class="btn btn-default btn-custom">
                							Travel Pass for LSI
                						</a>
                					</div>
                                    <div class="form-group text-center">
                                        <a href="{{route('registration.traveller.passing.through.santiago.city')}}" class="btn btn-default btn-custom">
                                            Travel Pass for Traveller’s Passing <br>Through the City of Santiago
                                        </a>
                                    </div>
                				</div>
                			</div>
                		</div>
                        <div class="form-group text-center">
                            <h5 class="text-description">City of Santiago Travel Pass</h5>
                        </div>
                        <div class="form-group text-center">
                            <p class="text-footer">For inquiries and other concerns, you may call the following hotlines from 8:00 AM to 5:00 PM:<br>Globe 0905-5586-669<br>Smart 0998-1892-545<br>Tel No. (078) 305-2766<br>You may also email us at lgusantiagoinformation@gmail.com</p>
                        </div>
                        <div class="form-group text-center">
                            <p class="text-footer"></p>
                        </div>
                	</div>
                	<div class="first-right">
                		
                	</div>
                </div>
            </div>
		</div>
	</div>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript">
        $(document).ready(function(){
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