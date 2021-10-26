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
    <title>Print Travel Pass Report | {{Session::get('software_name')}}</title>


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
    	body
    	{
            -webkit-print-color-adjust: exact; 
            font-family: 'Arial';
        }
        @media print 
        {
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
        @media all
        {
            .table>thead>tr>th
            {
                border: 1px solid !important;
            }
            .table-bordered, .table-bordered > thead > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > th ,.table-bordered > tbody > tr > td
            {
                border-color:  black !important;
            }
        }
    </style>
</head>
<body>
	<div class="container-fluid">
		{{-- <div class="row">
			<div class="col-xs-12">
				{!! Session('letter_header') !!}
			</div>
		</div> --}}
		<div class="row">
			<div class="col-xs-12">
				<h3 class="text-center">Travel Pass Report</h3>
			</div>
		</div>
		{{-- <div class="row">
            <div class="col-xs-12">
                <p>As of {{\Carbon\Carbon::now()->format('F d, Y h:i:s A' )}}</p>
            </div>
        </div> --}}
		<div class="row">
			<div class="col-xs-12">
				<table class="table table-bordered">
						<thead>
                        <tr>
                            <th>Tracking Number</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Barangay</th>
                            <th>Departure Date</th>
                            <th>Return Date</th>
                            <th>Mode of Transport</th>
                            <th>Purpose of Travel</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($travel_passes as $key=>$travel_pass)
                            <tr>
                                <td>{{$travel_pass->tracking_no}}</td>
                                <td>
                                    {{ucwords($travel_pass->first_name)}} {{!empty($travel_pass->middle_name) ? substr(ucwords($travel_pass->middle_name),0,1).'.' : ''}} {{ucwords($travel_pass->last_name)}} 
                                </td>
                                <td>
                                    @if(!empty($travel_pass->type))
                                        @if(strcasecmp($travel_pass->type,'resident') == 0)
                                            Local Traveller
                                        @elseif(strcasecmp($travel_pass->type,'incoming_visitor') == 0)
                                            Incoming Visitor
                                        @elseif(strcasecmp($travel_pass->type,'frequent_traveller') == 0)
                                            Frequent Traveller
                                        @elseif(strcasecmp($travel_pass->type,'pass_through') == 0)
                                            Pass Through
                                        @else
                                            {{strtoupper($travel_pass->type)}}
                                        @endif
                                    @else
                                        None
                                    @endif
                                </td>
                                <td>{{ucwords($travel_pass->barangay)}}</td>
                                <td>{{!empty($travel_pass->departure_date) ? \Carbon\Carbon::parse($travel_pass->departure_date)->format('M d, Y') : '&nbsp;'}}</td>
                                <td>{{ !empty($travel_pass->return_date) ? \Carbon\Carbon::parse($travel_pass->return_date)->format('M d, Y') : '&nbsp;'}}</td>
                                <td>
                                    @if(!empty($travel_pass->mode_of_transport))
                                        @if(strpos($travel_pass->mode_of_transport, '|') !== false)
                                            @php $current_mode_of_transports = explode('|',$travel_pass->mode_of_transport); @endphp
                                            @if(count($current_mode_of_transports) > 0)
                                                @forelse($current_mode_of_transports as $key => $mode_of_transport)
                                                    @if($key != 0)
                                                        ,
                                                    @endif
                                                        {{ $mode_of_transport }}
                                                @empty
                                                    None
                                                @endforelse
                                            @else
                                                None
                                            @endif
                                        @else
                                            {{ucwords($travel_pass->mode_of_transport)}}
                                        @endif
                                    @else
                                        None
                                    @endif
                                </td>
                                <td>{{ucwords($travel_pass->purpose_name)}}</td>
                                <td>
                                    @if(!empty($travel_pass))
                                        @if(strcasecmp($travel_pass->type,'incoming_visitor') != 0 && strcasecmp($travel_pass->type,'ofw') != 0)
                                            @if(strcasecmp($travel_pass->status,'processing') == 0)
                                                <span class="dot blue-dot"></span>&nbsp;Processing
                                            @elseif(strcasecmp($travel_pass->status,'verification') == 0)
                                                <span class="dot blue-dot"></span>&nbsp;For Verification
                                            @elseif(strcasecmp($travel_pass->status,'medical_assessment') == 0)
                                                <span class="dot yellow-dot"></span>&nbsp;Medical Assessment
                                            @elseif(strcasecmp($travel_pass->status,'waiting_for_payment') == 0)
                                                <span class="dot"></span>&nbsp;Waiting for Payment
                                            @elseif(strcasecmp($travel_pass->status,'payment_paid') == 0)
                                                <span class="dot black-dot"></span>&nbsp;Payment Paid
                                            @elseif(strcasecmp($travel_pass->status,'medical_certificate') == 0)
                                                <span class="dot orange-dot"></span>&nbsp;Medical Certificate
                                            @elseif(strcasecmp($travel_pass->status,'released') == 0)
                                                <span class="dot green-dot"></span>&nbsp;Released
                                            @else
                                                <span class="dot red-dot"></span>&nbsp;{{ucwords($travel_pass->status)}}
                                            @endif
                                        @else
                                            @if(strcasecmp($travel_pass->status,'processing') == 0)
                                                <span class="dot blue-dot"></span>&nbsp;Processing
                                            @elseif(strcasecmp($travel_pass->status,'verification') == 0)
                                                <span class="dot blue-dot"></span>&nbsp;For Verification
                                            @elseif(strcasecmp($travel_pass->status,'approved') == 0)
                                                <span class="dot yellow-dot"></span>&nbsp;Approved
                                            @elseif(strcasecmp($travel_pass->status,'released') == 0)
                                                <span class="dot green-dot"></span>&nbsp;Released
                                            @else
                                                <span class="dot red-dot"></span>&nbsp;{{ucwords($travel_pass->status)}}
                                            @endif
                                        @endif
                                    @else
                                        No Status
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
				</table>
			</div>
		</div>
		{{-- <div class="row">
			<div class="col-xs-12">
				{!! Session('report_footer') !!}
			</div>
		</div> --}}
	</div>
	<script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>
</body>
</html>