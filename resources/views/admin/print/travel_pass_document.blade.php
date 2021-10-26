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
    <title>Print Travel Pass Document | {{Session::get('software_name')}}</title>


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
            height: 25.cm;
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
		<div class="row flex-row" style="margin-bottom: 20px;">
			<div class="col-xs-offset-1 col-xs-2">
				<img src="{{asset('uploads/santiago_logo.png')}}" style="margin:0 auto;height:105px;width:100%;">
			</div>
            <div class="col-xs-6">
                <div class="" style="align-items: center;width:100%;height: 100%;">
                    <p class="text-center" style="width:100%;font-size:18px;font-family: garamond;">Republic of the Philippines</p>
                    <p class="text-center" style="width:100%;font-size:18px;font-family: garamond;font-weight: bold;">CITY OF SANTIAGO</p>
                    <p class="text-center" style="width:100%;font-size:16px;font-family: garamond;font-weight: bold;">LOCAL TASK FORCE AGAINST COVID-19</p>
                </div>
            </div>
            <div class="col-xs-3">
                <img src="{{asset('uploads/balamban.png')}}" height="105" width="250" style="margin-left: -50px;">
            </div>
		</div>
        <hr style="border-color:black;margin-top:5px;margin-bottom: 5px;">
        <hr style="border-color:black;margin-top:5px;margin-bottom: 5px;">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <div class="text-center">
                    <h5 style="font-size:14px;font-family: Century Gothic;font-weight: bold;margin-bottom: 30px;margin-top:0px;">TRAVEL PASS<br>{{\Carbon\Carbon::parse($travel_pass->created_at)->format('Y')}}-{{\Carbon\Carbon::parse($travel_pass->created_at)->format('m')}}-{{\Carbon\Carbon::parse($travel_pass->created_at)->format('d')}}-{{!empty($travel_pass->tracking_no) ? substr($travel_pass->tracking_no,8) : 'xxxx-xx-xx-xxx'}}</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <p style="font-size:14px;text-indent:25px;font-family: Century Gothic;text-align: justify;margin-bottom:5px;">
                    <b>THIS IS TO CERTIFY</b> that based on records, <b>{{ (!empty($travel_pass->first_name) && !empty($travel_pass->last_name)) ? (strtoupper(!empty($travel_pass->middle_name) ? $travel_pass->first_name.' '.substr($travel_pass->middle_name,0,1).'. '.$travel_pass->last_name : $travel_pass->first_name.' '.$travel_pass->last_name) ) : '&nbsp;'}}</b> is a bonafide resident of Santiago City.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <p style="font-size:14px;margin: 0;text-indent:25px;font-family: Century Gothic;text-align: justify;">
                    Pursuant to existing laws, ordinances, rules and regulations, the above-named person is allowed to <b>TRAVEL</b> subject to the following:
                </p>
                <ol style="font-family: Century Gothic;font-size:14px;margin-top:5px;">
                    <li>With BHERT Health Declaration and Medical Certification</li>
                    <li>Travel Details
                        <ol style="font-size:14px;list-style-type: lower-alpha;font-family: Century Gothic;margin-top: 0;margin-bottom: 5px;">
                            <li>Departure: <b>{{!empty($travel_pass->departure_date) ? \Carbon\Carbon::parse($travel_pass->departure_date)->format('F d, Y') : '&nbsp;'}}</b></li>
                            <li>Expected arrival in Santiago City: <b>{{ !empty($travel_pass->return_date) ? \Carbon\Carbon::parse($travel_pass->return_date)->format('F d, Y') : '&nbsp;' }}</b></li>
                            <li>Destination: <b>{{!empty($travel_pass->place_of_destination) ? ucwords($travel_pass->place_of_destination) : '&nbsp;' }}</b></li>
                            <li>Mode of Transportation: <b>{{ $mode_of_transport_text}}</b></li>
                        </ol>
                    </li>
                    <li>
                        Purpose of Travel: <b>{{!empty($purpose->name) ? ucwords($purpose->name) : '&nbsp;'}}</b>
                    </li>
                    <li>
                        Remarks: <b>{{!empty($travel_pass->remarks) ? strtoupper($travel_pass->remarks) : '&nbsp;'}}{{ (!empty($travel_pass->is_issuance) && strcasecmp($travel_pass->is_issuance,'yes') == 0) ? ',RAPID TEST ON NEXT ISSUANCE' : '&nbsp;' }}</b>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <p style="font-size:14px;margin: 0 0 10px;text-indent:25px;line-height: 1.42857143;font-family: Century Gothic !important;text-align: justify;">
                    This <b>TRAVEL PASS</b> is valid for single use only and shall be used to accomplish/perform the holder’s purpose. The unauthorized use of this <b>TRAVEL PASS</b> shall make the holder liable under existing laws and regulations. Any alteration on this document shall make this <b>TRAVEL PASS</b> INVALID.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <p style="font-size:14px;margin: 0 0 10px;text-indent:25px;line-height: 1.42857143;font-family: Century Gothic !important;text-align: justify;">
                    Issued this {{\Carbon\Carbon::now()->format('jS')}} of {{\Carbon\Carbon::now()->format('F, Y')}} at City of Santiago.
                </p>
            </div>
        </div>
        <div class="row" style="margin-top:40px;">
            <div class="col-xs-offset-1 col-xs-5">
                <div class="row">
                    <div class="col-xs-12">
                        <div>
                            <img src="{{asset('uploads/mayor_signature.png') }}" class="img-responsive" height="50" width="170" style="position: absolute;top:-35px;">
                            <p style="font-size:14px;margin-bottom: 0px;"><b>ENGR. PAULINO M. TAN</b></p>
                            <p style="font-size:14px;margin-bottom: 0px;">City Administrator</p>
                            {{-- <p style="margin-bottom: 0px;">Member, Local Task Force Against Covid-19</p> --}}
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:60px;">
                    <div class="col-xs-12">
                        <p style="font-size:14px;border-top: 1px solid black;"><b>Printed Name and Signature of Applicant</b></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-offset-2 col-xs-3">
                <div class="qr-div text-center">
                    <p style="font-size:14px;margin-bottom: 5px;">Scan QR Code To Verify</p>
                    <img src="{{asset('uploads/qrcode/'.$travel_pass->tracking_no.'.png')}}" class="img-responsive" width="100" height="100" style="margin:0 auto;border: 2px solid #9a191f;">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:0px;">
            <div class="col-xs-offset-1 col-xs-10">
                <p style="color:#FF3333 !important;font-size:0.8em;;margin-bottom: 0px;margin-top:20px;"><b>**The bearer of this document is required to closely coordinate with the BHERT for Monitoring</b></p>
            </div>
        </div>
        <hr style="font-size:12px;border-color:black;margin-bottom: 0px;margin-top:50px;">
        <div class="row">
            <div class="col-xs-offset-1 col-xs-5">
                <p style="font-size:12px;">CITY GOVERNMENT OF SANTIAGO<br>City Hall, San Andres, Santiago City</p>
            </div>
            <div class="col-xs-5">
                <p style="font-size:12px;text-align: right;">Tel. No.: (078) 305-1104<br>Telefax No.: (078) 305-2770</p>
            </div>
        </div>
	</div>
	<script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>
</body>
</html>