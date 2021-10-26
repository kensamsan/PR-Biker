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
    <title>Print Travel QR Code | {{Session::get('software_name')}}</title>


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
        .ambisyon
        {
            max-width: 200px;max-height: 116px;
        }
        @media print 
        {
            .ambisyon
            {
                max-width: 200px;max-height: 200px;
            }
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

            .text-title
            {
                font: normal normal bold 47px Century Gothic;letter-spacing: 0px;font-weight: 900 !important;
            }
        }
        .full_name
        {
            font-size: 2.5em;
        }
        .text-title
        {
            font-size: 3em;
        }
        .first-border-top
        {
            margin-top:40px;margin-bottom: 20px;border-top: 20px solid #9a191f;
        }
        .first-row
        {
            margin-bottom: 20px;
        }
        .second-row
        {
            margin-bottom: 40px;
        }
        .third-row
        {
            margin-bottom: 35px;
        }
        .fourth-row
        {
            margin-bottom: 40px;
        }
        .fifth-row
        {
            /* margin-bottom: 40px; */
        }
        .qr-code-image
        {
            margin:0 auto;border: 2px solid #9a191f;
            width: 325px;
            height: 325px;
        }
        .santiago-image
        {
            margin:0 auto;
            width: 150px;
            height: 150px;
        }
        .covid_logo
        {
            width: 90px;
            height: 90px;
            float: right;
        }
        .santiago-city-text
        {
            font-size: 1.5em;
        }
        @media screen and (max-width: 767px)
        {
            .covid_logo
            {
                height: 220px;
                width: 220px;
                float: unset;
            }
            .text-title
            {
                font-size: 5.5em;
            }
            .full_name
            {
                font-size: 5em;
            }
            .first-border-top
            {
                border-top: 40px solid #9a191f;
                margin-bottom: 60px;
            }
            .first-row
            {
                margin-bottom: 80px;
            }
            .second-row
            {
                margin-bottom: 80px;
            }
            .third-row
            {
                margin-bottom: 80px;
            }
            .fourth-row
            {
                margin-bottom: 50px;
            }
            .qr-code-image
            {
                margin:0 auto;border: 2px solid #9a191f;
                width: 700px;
                height: 700px;
            }
            .santiago-image
            {
                width: 350px;
                height: 230px;
            }
            .santiago-city-text
            {
                font-size: 4em;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1" style="padding:0;">
                <hr class="first-border-top" style="">
            </div>
        </div>
        <div class="row first-row">
            <div class="col-xs-offset-1 col-xs-3">
                <img src="{{asset('uploads/balamban.png')}}" style="max-width: 200px;max-height: 116px;display:block;margin:0 auto;">
            </div>
            <div class="col-xs-4">
                <img src="{{asset('uploads/covid.png')}}" style="max-width: 200px;max-height: 116px;display:block;margin:0 auto;">
            </div>
            <div class="col-xs-3">
                <img src="{{asset('uploads/Ambisyon 2040 Logo.png')}}" class="ambisyon" style="display:block;margin:0 auto;margin-top:-25px;">
            </div>
        </div>
        <div class="row second-row">
            <div class="col-xs-12">
                <div class="qr-div text-center">
                    <p class="full_name" style="color:#9A9A9A !important;"><strong>{{ (!empty($travel_pass->first_name) && !empty($travel_pass->last_name)) ? (ucwords(!empty($travel_pass->middle_name) ? $travel_pass->first_name.' '.substr($travel_pass->middle_name,0,1).'. '.$travel_pass->last_name : $travel_pass->first_name.' '.$travel_pass->last_name) ) : '&nbsp;'}}</strong></p>
                </div>
            </div>
        </div>
        <div class="row third-row">
            <div class="col-xs-12">
                <div class="qr-div text-center">
                    <img src="{{asset('uploads/qrcode/'.$travel_pass->tracking_no.'.png')}}" class="img-responsive qr-code-image">
                </div>
            </div>
        </div>
        <div class="row fourth-row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="row">
                    <div class="col-xs-offset-3 col-xs-6">
                        <img src="{{asset('uploads/santiago_logo.png')}}"  class="img-responsive santiago-image">
                    </div>
                </div>
            </div>
        </div>
        <div class="row fifth-row" style="margin-bottom: 20px;">
            <div class="col-xs-12">
                <div class="text-center">
                    <p class="santiago-city-text" style="letter-spacing: 0.1em;"><strong>SANTIAGO CITY</strong></p>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>
</body>
</html>