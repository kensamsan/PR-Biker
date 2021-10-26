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
    <title>Travel Pass Information | {{Session::get('software_name')}}</title>


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
        @media(min-width: 992px)
        {
            .equal {
                display:flex;
                display: -webkit-box;
                
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
        }
    </style>
</head>
<body>
	<div class="container-fluid">
		<div class="row equal">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-default" style="height: 100%;margin-top:20px;box-shadow: 0px 3px 6px #00000029;">
                    <div class="panel-body" style="padding: 15px 20px;height: 100%;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h4><strong>Basic Information</strong></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Full Name:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{ucwords($travel_pass->full_name)}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Contact Number:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{!empty($travel_pass->contact_no) ? '0'.$travel_pass->contact_no : 'None'}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Email:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{$travel_pass->email}}&nbsp;</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Address:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{$travel_pass->residence.' '.$travel_pass->barangay.' '.$travel_pass->municipality_city.' '.$travel_pass->province}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-default" style="height: 100%;margin-top:20px;box-shadow: 0px 3px 6px #00000029;">
                    <div class="panel-body" style="padding: 15px 20px;height:100%;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h4><strong>Travel Details</strong></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Travel Pass Type:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">
                                    @if(!empty($travel_pass->type))
                                        @if(strcasecmp($travel_pass->type,'resident') == 0)
                                            Local Traveller
                                        @elseif(strcasecmp($travel_pass->type,'incoming_visitor') == 0)
                                            Incoming Visitor
                                        @else
                                            {{strtoupper($travel_pass->type)}}
                                        @endif
                                    @else
                                        None
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Place of Origin:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{ucwords($travel_pass->place_of_origin)}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Departure Date:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{\Carbon\Carbon::parse($travel_pass->departure_date)->format('F d, Y')}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Place of Destination:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{ucwords($travel_pass->place_of_destination)}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Return Date:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{\Carbon\Carbon::parse($travel_pass->return_date)->format('F d, Y')}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Mode of Transport:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{ $mode_of_transport_text}}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Purpose of Travel:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{!empty($travel_pass->purpose) ? ucwords($travel_pass->purpose) : 'None'}}</p>
                            </div>
                        </div>
                        @if(!empty($travel_pass->remarks))
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Remarks:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{strtoupper($travel_pass->remarks)}}{{ (!empty($travel_pass->is_issuance) && strcasecmp($travel_pass->is_issuance,'yes') == 0) ? ',RAPID TEST ON NEXT ISSUANCE' : '&nbsp;' }}</p>
                            </div>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-default" style="height: 100%;margin-top:20px;box-shadow: 0px 3px 6px #00000029;">
                    <div class="panel-body" style="padding: 15px 20px;height:100%;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h4><strong>Required Attachments</strong></h4>
                            </div>
                        </div>
                        <div class="row row-margin">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                <p class="attachment-text">Government ID:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                <div class="attachment-button" style="margin-bottom: 10px;">
                                    @if(!empty($travel_pass_attachments->government_id))
                                        <a href="{{ url('/uploads/government_id/'.$travel_pass_attachments->government_id) }}" class="btn btn-primary btn-fixed-width" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;View Attachment</a>
                                    @else
                                        <a href="#" class="btn btn-default btn-fixed-width">&nbsp;Pending</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(!empty($travel_pass) && (strcasecmp($travel_pass->type,'resident') == 0 || strcasecmp($travel_pass->type,'incoming_visitor') == 0))
                            <div class="row row-margin">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                    <p class="attachment-text">Medical Certifcate:</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <div class="attachment-button" style="margin-bottom: 10px;">
                                        @if(!empty($travel_pass_attachments->old_medical_certificate))
                                            <a href="{{ url('/uploads/old_medical_certificate/'.$travel_pass_attachments->old_medical_certificate) }}" class="btn btn-primary btn-fixed-width" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;View Attachment</a>
                                        @else
                                            <a href="#" class="btn btn-default btn-fixed-width">&nbsp;Pending</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(strcasecmp($travel_pass->type,'incoming_visitor') == 0)
                            <div class="row row-margin">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                    <p class="attachment-text">Barangay Certificate:</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <div class="attachment-button" style="margin-bottom: 10px;">
                                        @if(!empty($travel_pass_attachments->barangay_certificate))
                                            <a href="{{ url('/uploads/barangay_certificate/'.$travel_pass_attachments->barangay_certificate) }}" class="btn btn-primary btn-fixed-width" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;View Attachment</a>
                                        @else
                                            <a href="#" class="btn btn-default btn-fixed-width">&nbsp;Pending</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(!empty($travel_pass) && strcasecmp($travel_pass->type,'incoming_visitor') != 0)
                            <div class="row row-margin">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                    <p class="attachment-text">BHERT Health Declaration:</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <div class="attachment-button" style="margin-bottom: 10px;">
                                        @if(!empty($travel_pass_attachments->bhert_health_declaration))
                                            <a href="{{ url('/uploads/bhert_health_declaration/'.$travel_pass_attachments->bhert_health_declaration) }}" class="btn btn-primary btn-fixed-width" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;View Attachment</a>
                                        @else
                                            <a href="#" class="btn btn-default btn-fixed-width">&nbsp;Pending</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(!empty($travel_pass) && (strcasecmp($travel_pass->type,'ofw') == 0))
                            <div class="row row-margin">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                    <p class="attachment-text">Certificate of Employment:</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <div class="attachment-button" style="margin-bottom: 10px;">
                                        @if(!empty($travel_pass_attachments->certificate_of_employment))
                                            <a href="{{ url('/uploads/certificate_of_employment/'.$travel_pass_attachments->certificate_of_employment) }}" class="btn btn-primary btn-fixed-width" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;View Attachment</a>
                                        @else
                                            <a href="#" class="btn btn-default btn-fixed-width">&nbsp;Pending</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(!empty($travel_pass) && strcasecmp($travel_pass->type,'frequent_traveller') == 0)
                            <div class="row row-margin">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                    <p class="attachment-text">Rapid Test Result:</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <div class="attachment-button" style="margin-bottom: 10px;">
                                        @if(!empty($travel_pass_attachments->rapid_test_result))
                                            <a href="{{ url('/uploads/rapid_test_result/'.$travel_pass_attachments->rapid_test_result) }}" class="btn btn-primary btn-fixed-width" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;View Attachment</a>
                                        @else
                                            <a href="#" class="btn btn-default btn-fixed-width">&nbsp;Pending</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(strcasecmp($travel_pass->type,'incoming_visitor') != 0)
                            <div class="row row-margin">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                    <p class="attachment-text">Medical Certificate:</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <div class="attachment-button" style="margin-bottom: 10px;">
                                        @if(!empty($travel_pass_attachments->new_medical_certificate))
                                            <a href="{{ url('/uploads/new_medical_certificate/'.$travel_pass_attachments->new_medical_certificate) }}" class="btn btn-primary btn-fixed-width" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;View Attachment</a>
                                        @else
                                            <a href="#" class="btn btn-default btn-fixed-width">&nbsp;Pending</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row row-margin">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                <p class="attachment-text">Travel Pass:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                <div class="attachment-button" style="margin-bottom: 10px;">
                                    @if(!empty($travel_pass->status) && strcasecmp($travel_pass->status,'released') == 0)
                                        <a href="{{ route('api.travel.pass.document.fetch.by.tracking.no',$travel_pass->tracking_no) }}" target="_blank" class="btn btn-primary btn-fixed-width"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;View Attachment</a>
                                    @else
                                        <a href="#" class="btn btn-default btn-fixed-width">&nbsp;Pending</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row row-margin">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                <p class="attachment-text">QR CODE:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                <div class="attachment-button" style="margin-bottom: 10px;">
                                    @if(!empty($travel_pass->status) && strcasecmp($travel_pass->status,'released') == 0)
                                        <a href="{{ route('api.travel.pass.qr.code.fetch.by.tracking.no',$travel_pass->tracking_no) }}" class="btn btn-primary btn-fixed-width" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;View Attachment</a>
                                    @else
                                        <a href="#" class="btn btn-default btn-fixed-width">&nbsp;Pending</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>      
        </div>
	</div>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/moment.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript">
        
    </script>
</body>
</html>