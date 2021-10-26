<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
        <meta name="description" content="{{Session::get('software_description')}}">
        <meta name="author" content="Aguora IT Solutions & Technology">
        <title>Forgot Password | {{Session::get('software_name')}}</title>


        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
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
        <meta name="application-name" content="{{Session::get('software_name')}}"/>
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="{{Session::get('company_logo')}}" />
        <meta name="msapplication-square70x70logo" content="{{Session::get('company_logo')}}" />
        <meta name="msapplication-square150x150logo" content="{{Session::get('company_logo')}}" />
        <meta name="msapplication-wide310x150logo" content="{{Session::get('company_logo')}}" />
        <meta name="msapplication-square310x310logo" content="{{Session::get('company_logo')}}" />
        <style>
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
                /*background-color: #F0F2F5;*/
                background: #F0F2F5 url({{ asset('uploads/new_travel_pass_santiago_bg.png') }}) no-repeat;
                background-size: cover;
                background-attachment: fixed;
                background-position: center bottom;
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
                display:flex;
                display: -webkit-box;
                
                display: -ms-flexbox;
                display: -webkit-flex;
                width: 100%;
                 height: 100%;
                 align-items: stretch;
            }
            .panel
            {
                /* height:100%; */
                margin-bottom: 0;
                border-radius: 0;
            }
            .panel-body
            {
                height: 100%;
            }
            .footer-text
            {
                font: normal normal medium 12px/15px Roboto;
                padding: 5px 15px;
            }
            input[type="text"],input[type="email"]
            {
                height: 50px;
                font-size:20px;
                border: 1px solid #DDDFE2;
                border-radius: 5px;
            }
            .btn-login
            {
                height: 50px;
                background: #09487A 0% 0% no-repeat padding-box;
                vertical-align: middle;
                text-align: center;
                /*line-height: 3em;*/
            }
            .row-flex-horizontal
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
                align-items: stretch;
                justify-content: space-around;
            }
            .login-text
            {
                font: bold 27px/81px Helvetica Neue;letter-spacing: 0px;color: #121212;
            }
            .text-description
            {
                font: normal 25px/35px Helvetica Neue;letter-spacing: 0px;color: #1C1E21;font-weight: bold;
            }
            .text-title
            {
                font: normal normal bold 47px/141px Helvetica Neue;letter-spacing: 0px;color: #09487A;font-weight: 900;
            }
            @media(min-width: 1200px)
            {
                .left-first-column
                {
                    flex:1;
                    -webkit-box-flex: 1;      
                    -moz-box-flex: 1;         
                    -webkit-flex: 1;          
                    -ms-flex: 1;
                }
                .middle-first-column
                {
                    flex:10;
                    -webkit-box-flex: 10;      
                    -moz-box-flex: 10;         
                    -webkit-flex: 10;          
                    -ms-flex: 10;
                }
                .right-first-column
                {
                    flex:1;
                    -webkit-box-flex: 1;      
                    -moz-box-flex: 1;         
                    -webkit-flex: 1;          
                    -ms-flex: 1;
                }
                .left-second-column
                {
                    flex:2;
                    -webkit-box-flex: 2;      
                    -moz-box-flex: 2;         
                    -webkit-flex: 2;          
                    -ms-flex: 2;
                }
                .middle-second-column
                {
                    flex: 7;
                    -webkit-box-flex: 7;      
                    -moz-box-flex: 7;         
                    -webkit-flex: 7;          
                    -ms-flex: 7;
                }
                .right-second-column
                {
                    flex:3;
                    -webkit-box-flex: 3;      
                    -moz-box-flex: 3;         
                    -webkit-flex: 3;          
                    -ms-flex: 3;
                }
                .left-third-column
                {
                    flex:8;
                    -webkit-box-flex: 8;      
                    -moz-box-flex: 8;         
                    -webkit-flex: 8;          
                    -ms-flex: 8;
                }
                .right-third-column
                {
                    flex:4;
                    -webkit-box-flex: 4;      
                    -moz-box-flex: 4;         
                    -webkit-flex: 4;          
                    -ms-flex: 4;
                }
                .left-third-inner-left-column
                {
                    flex:3;
                    -webkit-box-flex: 3;      
                    -moz-box-flex: 3;         
                    -webkit-flex: 3;          
                    -ms-flex: 3;
                }
                .left-third-inner-right-column
                {
                    flex:9;
                    -webkit-box-flex: 9;      
                    -moz-box-flex: 9;         
                    -webkit-flex: 9;          
                    -ms-flex: 9;
                }
                .inner-row-flex
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
	                align-items: stretch;
	                justify-content: space-around;
                }
                .title-row-flex
                {
                    text-align: left;
                    vertical-align: middle;
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
	                align-items: stretch;
	                justify-content: space-around;
                }
                
                    .panel
                    {
                        height: unset;
                    }
                
            }
            @media(max-width: 1250px) and (min-width: 1200px)
            {
                /*.login-text
                {
                    line-height: 10px;
                    margin-bottom: 20px;
                    letter-spacing: 2px;
                    font-size: 20px;
                }*/
                .middle-first-column
                {
                    flex:30;
                    -webkit-box-flex: 30;      
                    -moz-box-flex: 30;         
                    -webkit-flex: 30;          
                    -ms-flex: 30;
                }
                .right-third-column
                {
                	flex:6;
                	-webkit-box-flex: 6;      
                    -moz-box-flex: 6;         
                    -webkit-flex: 6;          
                    -ms-flex: 6;
                }
            }
            @media(min-width:992px) and (max-width: 1199px)
            {
                .left-first-column
                {
                    flex:0;
                    -webkit-box-flex: 0;      
                    -moz-box-flex: 0;         
                    -webkit-flex: 0;          
                    -ms-flex: 0;
                }
                .right-flex-column
                {
                    flex:0;
                    -webkit-box-flex: 0;      
                    -moz-box-flex: 0;         
                    -webkit-flex: 0;          
                    -ms-flex: 0;
                }
                .left-second-column
                {
                    flex:1;
                    -webkit-box-flex: 1;      
                    -moz-box-flex: 1;         
                    -webkit-flex: 1;          
                    -ms-flex: 1;
                }
                .middle-second-column
                {
                    flex: 7;
                    -webkit-box-flex: 7;      
                    -moz-box-flex: 7;         
                    -webkit-flex: 7;          
                    -ms-flex: 7;
                }
                .right-second-column
                {
                    flex:1;
                    -webkit-box-flex: 1;      
                    -moz-box-flex: 1;         
                    -webkit-flex: 1;          
                    -ms-flex: 1;
                }
                .inner-row-flex
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
	                align-items: stretch;
	                justify-content: space-around;
                }
                .left-third-column
                {
                    /*flex:6;
                    -webkit-box-flex: 6;      
                    -moz-box-flex: 6;         
                    -webkit-flex: 6;          
                    -ms-flex: 6;*/
                }
                .right-third-column
                {
                    flex:6;
                    -webkit-box-flex: 6;      
                    -moz-box-flex: 6;         
                    -webkit-flex: 6;          
                    -ms-flex: 6;
                    align-self: center;
                }
                 .title-row-flex
                {
                    text-align: center;
                    vertical-align: middle;
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
	                align-items: stretch;
	                justify-content: space-around;
                }
                .panel
                {
                    height: unset;
                }
            }
            @media(max-width: 991px)
            {
                 .title-row-flex
                {
                    text-align: center;
                    vertical-align: middle;
                    height:100%;
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
	                justify-content: space-around;
                }
                .text-description
                {
                    text-align: center;
                }
                .footer-text
                {
                    text-align: center;
                }
            }
            @media(max-width: 394px)
            {
                 .text-title
                 {
                    font-size:32px;
                 }
                 .text-description
                 {
                    font-size:20px;
                 }
                .login-text
                {
                    font-size: 22px;
                    line-height: 1em;
                }
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row-flex-vertical">   
                <div style="flex:35;-webkit-box-flex: 35;-moz-box-flex: 35;-webkit-flex: 35;-ms-flex: 35;">   
                    <div class="row-flex-horizontal">   
                        <div class="left-first-column">   
                            
                        </div>
                        <div class="middle-first-column">   
                            <div class="row-flex-vertical">
                                <div class="left-second-column">   
                                    
                                </div>
                                <div class="middle-second-column">   
                                    <div class="inner-row-flex">
                                        <div class="left-third-column">   
                                            <div class="row-flex-vertical">
                                                <div class="left-third-inner-left-column">
                                                    <div class="title-row-flex">
                                                        {{-- <div style="flex:3;-webkit-box-flex: 3;-moz-box-flex: 3;-webkit-flex: 3;-ms-flex: 3;">
                                                            <img src="{{asset('uploads/covid_tracer_logo_x2.png')}}" class="img-responsive" style="margin: 0 auto;">
                                                        </div>
                                                        <div style="flex:9;-webkit-box-flex: 9;-moz-box-flex: 9;-webkit-flex: 9;-ms-flex: 9;">
                                                            <div style="height:100%;display:flex;display: -webkit-box;display: -ms-flexbox;display: -webkit-flex;-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;-webkit-box-orient: vertical;-moz-box-orient: vertical;align-items: stretch;justify-content: space-around;">
                                                                <div>   
                                                                    <span class="text-title">COVID TRACER <small>Travel&nbsp;Pass&nbsp;Admin</small></span>
                                                                
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="left-third-inner-right-column">   
                                                    <div style="padding: 15px;">   
                                                        {{-- <span class="text-description">Marilao Covid Tracer (MCT) initiative utilizes ICT-enabled technology to improve and increase efficiency in monitoring and surveillance of Covid-19 cases.</span> --}}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-third-column">   
                                            <div class="panel panel-default">   
                                                <div class="panel-body" style="padding: 30px 35px 30px 35px;"> 
                                                    {{ Form::open(array('route' => 'user.forgot.request.token','id'=>'resetPasswordEmailForm')) }}                                       
                                                        <div style="height:100%;display:flex;display: -webkit-box;display: -ms-flexbox;display: -webkit-flex;-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;-webkit-box-orient: vertical;-moz-box-orient: vertical;align-items: stretch;justify-content: space-around;">
                                                            @if(Session::has('flash_message'))
                                                                <div style="flex:1;-webkit-box-flex: 1;-moz-box-flex: 1;-webkit-flex: 1;-ms-flex: 1;">
                                                                    <div style="padding-bottom: 5px;">   
                                                                        <span class="login-text">Thanks</span>
                                                                        <div class="form-group" style="margin-bottom: 25px;margin-top:10px;">
                                                                            <span style="font-size: 1.2em;">Please check <strong>{{Session::get('flash_message')}}</strong> for a link to reset your password.</span>
                                                                        </div>
                                                                        <a href="{{route('user.login')}}" class="btn btn-primary btn-block btn-login" style="line-height: 3em;">Back to login</a>
                                                                    </div>   
                                                                </div>
                                                            @else
                                                                <div style="flex:6;-webkit-box-flex: 6;-moz-box-flex: 6;-webkit-flex: 6;-ms-flex: 6;">
                                                                    <div style="padding-bottom: 5px;">   
                                                                        <span class="login-text">Forgot Password</span>
                                                                        <div class="form-group" style="margin-bottom: 25px;margin-top:10px;">   
                                                                            <span style="font-size: 1.2em;">Enter your email and we'll send you a link to get back into your account.</span>
                                                                        </div>
                                                                        <div class="form-group">   
                                                                            {{ Form::email('email',null,['class'=>'form-control validate[required]','placeholder'=>'Please enter your email.'])}}
                                                                        </div>
                                                                        <a href="{{route('user.login')}}">Back to login</a>
                                                                    </div>   
                                                                </div>
                                                                <div style="flex:1;-webkit-box-flex: 1;-moz-box-flex: 1;-webkit-flex: 1;-ms-flex: 1;"> 
                                                                    @if(count($errors->all()) > 0)
                                                                    <p class="text-center text-danger">{{$errors->has('email') ? $errors->first('email') : '&nbsp;'}} </p>
		                                                            @elseif(Session::get('flash_error'))
		                                                                <p class="text-center text-danger">{{Session::has('flash_error') ? Session::get('flash_error') : '&nbsp;'}} </p>
		                                                            @elseif(Session::has('flash_message'))
		                                                                <p class="text-center text-success">{{Session::has('flash_message') ? Session::get('flash_message') : '&nbsp;'}} </p>
		                                                            @else
		                                                            	<p class="text-center">&nbsp;</p>
		                                                            @endif
                                                                </div>
                                                                <div style="flex:1;-webkit-box-flex: 1;-moz-box-flex: 1;-webkit-flex: 1;-ms-flex: 1;">
                                                                    <div>   
                                                                        <button type="submit" name="" class="btn btn-primary btn-block btn-login btnSubmit">Submit</button>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    {{ Form::close() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="right-second-column">   
                                    
                                </div>
                            </div>
                        </div>
                        <div  class="right-first-column">   
                            
                        </div>
                    </div>
                </div>
                {{-- <div class="" style="flex:1;-webkit-box-flex: 1;-moz-box-flex: 1;-webkit-flex: 1;-ms-flex: 1;">   
                    <div class="panel panel-default" style="background-color: #09487A;color:white;border: 1px solid #0051B7;">   
                        <div class="panel-body footer-text">   
                            &nbsp;
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- jQuery -->
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript">
            $('.btnSubmit').click(function(){
                $(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
                $(this).attr('disabled',true);
                $(this).parents('form').submit();
            });
        </script>
    </body>
</html>
