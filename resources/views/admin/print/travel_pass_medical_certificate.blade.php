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
    <title>Print Travel Pass Medical Certificate | {{Session::get('software_name')}}</title>


    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/fontawesome-free-5.15.1-web/css/all.min.css') }}" rel="stylesheet" type="text/css">
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
        .flex-row
        {
            display:flex;
            display: -webkit-box;
            /*display: -moz-box;*/
            display: -ms-flexbox;
            display: -webkit-flex;
            flex-wrap: wrap;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-box-orient: horizontal;
            -moz-box-orient: horizontal;
            align-items: stretch;
        }
    	body
    	{
            -webkit-print-color-adjust: exact; 
            font-family: 'Century Gothic';
            height: 21.59cm;
            width: 27.94cm;
        }
        .qr-div > svg
        {
            margin: 0 auto;
        }
            #qrcode > img
            {
                margin: 0 auto;
                border: 2px solid #9a191f;
                padding: 2px;
            }
        @media print 
        {
            body
            {
                height: 100%;
                width: 100%;
            }
            *
            {
                color: inherit !important;
                background: inherit !important;
            }
                @page 
                { 
                    margin: 0.11in;  
                    size: letter portrait;
                }
                .no-print, .no-print *
                {
                    display: none !important;
                }
                body 
                { 
                   -webkit-print-color-adjust: exact; 
            }
            .name-text
            {
                -webkit-print-color-adjust: exact; 
                color: #632f92 !important;
            }
        }
    </style>
</head>
<body>
	<div class="container-fluid" style="margin-bottom: 0.39in;margin-top:0.39in;">
		<div class="row flex-row">
			<div class="col-xs-offset-1 col-xs-2">
				<img src="{{asset('uploads/santiago_logo.png')}}" style="margin:0 auto;width:140px;">
			</div>
            <div class="col-xs-6">
                <div class="" style="align-items: center;width:100%;height: 100%;">
                    <p class="text-center" style="width:100%;font-size:18px;font-family: garamond;">Republic of the Philippines</p>
                    <p class="text-center" style="width:100%;font-size:20px;font-family: garamond;font-weight: bold;">CITY OF SANTIAGO</p>
                    <p class="text-center" style="width:100%;font-size:18px;font-family: garamond;font-weight: bold;">OFFICE OF THE CITY HEALTH CENTER</p>
                </div>
            </div>
            <div class="col-xs-2">
                <img src="{{asset('uploads/cho_logo.png')}}" style="margin-left: 0px;width:140px;margin-top:-5px;">
            </div>
		</div>
        <hr style="border-color:black;margin-top:5px;margin-bottom: 5px;">
        <hr style="border-color:black;margin-top:5px;margin-bottom: 5px;">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <div class="text-right">
                    <p style="font-size:16px;font-family: Times New Roman;text-align: right;line-height: 1.42857143;letter-spacing: 0.4;margin-top:0;margin-bottom: 0;margin-right:30   px;"><strong>City Health Office {{ \Carbon\Carbon::today()->year }}-{{ !empty($med_cet_control_no) ? $med_cet_control_no : 'xxxxx' }}</strong></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <div class="text-center">
                    <h5 style="font-size:22px;font-family: Times New Roman;font-weight: bold;margin-top:0px;margin-bottom: 10px;letter-spacing: 0.4;">MEDICAL CERTIFICATE</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <div>
                    <p style="margin-bottom: 10px;line-height: 1.42857143;font-family: Times New Roman;text-align: justify;font-size:18px;letter-spacing: 0.4;">To whom it may concern:
                        </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <div>
                    <p style="text-indent:50px;font-size:18px;font-family: Times New Roman;text-align: justify;line-height: 1.6;letter-spacing: 0.4;margin-bottom:10px;">This is to certify that <u> <strong>&nbsp;{{ (!empty($travel_pass->first_name) && !empty($travel_pass->last_name)) ? (strtoupper(!empty($travel_pass->middle_name) ? $travel_pass->first_name.' '.substr($travel_pass->middle_name,0,1).'. '.$travel_pass->last_name : $travel_pass->first_name.' '.$travel_pass->last_name) ) : '&nbsp;'}}&nbsp;</strong> </u> , <u> <strong>&nbsp;{{!empty($travel_pass->age) ? $travel_pass->age : '&nbsp;'}}</strong> </u> y/o, from <u> &nbsp;{{!empty($travel_pass->barangay) ? $travel_pass->barangay : '&nbsp;'}}&nbsp; </u> , Santiago City, consult here at the City Health Office <strong>on <u> &nbsp;&nbsp;{{\Carbon\Carbon::now()->format('M. d')}} </u> , {{\Carbon\Carbon::now()->format('Y')}}</strong> due to / for Medical and Physical examination</p>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom:30px;">
            <div class="col-xs-10 col-xs-offset-1">
                <div>
                    <p style="font-size:18px;font-family: Times New Roman;text-align: justify;line-height: 1.42857143;letter-spacing: 0.4;">Diagnosis: <strong style="font-size:17px;">Essentially normal findings at the time of examination.</strong></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-5  col-xs-offset-1">
                <div>
                    <p style="font-size:16px;font-family: Times New Roman;text-align: justify;line-height: 1.42857143;letter-spacing: 0.4;margin-top:20px;">Valid Until: <u>&nbsp;&nbsp;{{!empty($certificate_valid_until) ? \Carbon\Carbon::parse($certificate_valid_until)->format('M. d Y') : '&nbsp;'}}&nbsp;&nbsp;</u></p>
                </div>
            </div>
            <div class="col-xs-6">
                <div>
                    <p style="font-size:16px;font-family: Times New Roman;text-align: center;line-height: 1.42857143;letter-spacing: 0.4;"><strong>GENARO N. MANALO, M.D.</strong><br>City Health Officer</p>
                        <img src="{{asset('uploads/cho_signature.png') }}" style="position: absolute;width:200px;top:-40px;margin-left:100px;">
                </div>
            </div>
        </div>
	</div>
	<script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>
</body>
</html>