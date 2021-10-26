@extends('layout.app')
@section('title', 'Travel Pass List')
@section('app_name', Session::get('software_name'))
@section('css')
<style type="text/css">
	.input-group .form-control {
        z-index: 0 !important;
    }
    .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
        z-index: 0 !important;
    }
    .table thead > tr> th > a.sort-desc:after
	{
		content: "\e155";
		position: absolute;
	    bottom: 8px;
	    right: 8px;
	    display: block;
	    font-family: 'Glyphicons Halflings';
	    opacity: 0.5;
	}
	.table thead > tr> th > a.sort-asc:after
	{
		content: "\e156";
		position: absolute;
	    bottom: 8px;
	    right: 8px;
	    display: block;
	    font-family: 'Glyphicons Halflings';
	    opacity: 0.5;
	}
	.table thead > tr> th > a.sort:after
	{
		opacity: 0.2;
    	content: "\e150";
		position: absolute;
	    bottom: 8px;
	    right: 8px;
	    display: block;
	    font-family: 'Glyphicons Halflings';
	    opacity: 0.5;
	}
    @media (min-width: 768px) {
        /*.table-responsive {
            overflow: visible;
        }*/
         div.dataTables_wrapper div.dataTables_paginate {
	    	margin-right:20px !important;
	    }
	    table.dataTable {
	    	margin-top: -1px !important;
	    	margin-bottom: 0px !important;
	    }
        #travelPassesTable_info
        {
            margin-left: 20px;
            padding-top: 25px;
        }
        .sort-icon
		{
			position: relative;
			top:0;
			right:0;
			float:right;
		}
    }
    @media (max-width: 767px)
    {
    	.table-responsive
    	{
    		margin-top: 10px;
    	}
	    #casesReportsTable_wrapper
	    {
	    	margin-right: -15px;
	    }
	    table.dataTable {
	    	margin-top: -2px !important;
	    	margin-bottom: 0px !important;
	    }
    }
    
    .dataTables_wrapper > .table-scrollable{
    	background-color: #EBEDEF;
    }
    div.table-responsive>div.dataTables_wrapper>div[class^="row"]:last-child {
    	background-color: white;
    }
    .table>thead
    {
    	background-color: #EBEDEF;
    	color: black;
    }
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    	vertical-align: middle;
    }
    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    	margin: 10px 0;
    }
	.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus
	{
		background-color: #1790da !important;
    	border-color: #1790da !important;
	}
	.table-striped > tbody > tr:nth-of-type(even) {
	    background-color: #fff;
	}
	.table-responsive
	{
		background-color:white;
		box-shadow: 0px 3px 6px #00000029;
	}
	.table thead > tr> th> a
	{
		color:black;
		font-weight: bold;
		text-decoration: none;
	}
	.table thead > tr> th> a:hover
	{
	 	color:gray;
	}
	.table-hover > tbody > tr:hover
	{
		background-color:#EBEDEF;
	}
	.table thead > tr> th
	{
		position: relative;
		padding-right: 30px;
	}
	.table thead > tr> th > a
	{
		width: 25px;
	}
    @media(min-height: 76px)
    {
        .btn-print
        {
            margin-bottom: 10px;    
        }
    }
</style>
@stop
@section('content')
<div class="container-fluid">
	<div class="row" style="margin-top:30px;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">				
				<h2>Travel Pass Report</h2> <small></small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			{{ Form::open(array('route' => ['travel.pass.reports.index'], 'method' => 'GET','id'=>'reportForm')) }}
		        <div class="panel panel-default">
		        	<div class="panel-heading">
		        		<h5 class="panel-title">Travel Pass Report Filter</h5>
		        	</div>
		        	<div class="panel-body">
		        		<div class="row">
			        		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			        			<div class="form-group">
			        				<label class="control-label">Travel Pass Type</label>
			        				{{Form::select('travel_pass_type',['all' => 'All','frequent_traveller'=>'Frequent Traveller','incoming_visitor'=>'Incoming Visitor','resident' => 'Local Traveller','lsi' =>'LSI','ofw' => 'OFW','pass_through' => 'Pass Through'],Request::get('travel_pass_type'),['class'=>'form-control'])}}
			        			</div>
			        		</div>
			        		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			        			<div class="form-group">
			        				<label class="control-label">Barangay</label>
			        				{{-- {{Form::text('barangay',Request::get('barangay'),['class'=>'form-control'])}} --}}
			        				{{Form::select('barangay',['all' => 'All'] + $barangays,Request::get('barangay'),['class'=>'form-control'])}}
			        			</div>
			        		</div>
			        		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			        			<div class="form-group">
			        				<label class="control-label">Departure Date</label>
			        				{{Form::date('departure_date',Request::get('departure_date'),['class'=>'form-control'])}}
			        			</div>
			        		</div>
			        		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			        			<div class="form-group">
			        				<label class="control-label">Return Date</label>
			        				{{Form::date('return_date',Request::get('return_date'),['class'=>'form-control'])}}
			        			</div>
			        		</div>
		        		</div>
		        		<div class="row">
		        			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			        			<div class="form-group">
			        				<label class="control-label">Mode of Transport</label>
			        				{{-- {{Form::text('mode_of_transport',Request::get('mode_of_transport'),['class'=>'form-control'])}} --}}
			        				{{Form::select('mode_of_transport',['all' => 'All'] + $mode_of_transports_arr,Request::get('mode_of_transport'),['class'=>'form-control'])}}
			        			</div>
			        		</div>
			        		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			        			<div class="form-group">
			        				<label class="control-label">Purpose of Travel</label>
			        				{{Form::select('purpose_of_travel',['all' => 'All'] + $purpose_types_arr,Request::get('purpose_of_travel'),['class'=>'form-control'])}}
			        			</div>
			        		</div>
			        		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			        			<div class="form-group">
			        				<label class="control-label">Travel Pass Status</label>
			        				{{Form::select('travel_pass_status',['all' => 'All','approved' => 'Approved','cancelled' => 'Cancelled','medical_assessment' => 'Medical Assessment','medical_certificate' => 'Medical Certificate','payment_paid' => 'Payment Paid','processing' => 'Processing','rejected' => 'Rejected','released' => 'Released','verification' => 'Verification','waiting_for_payment' => 'Waiting for Payment'],Request::get('travel_pass_status'),['class'=>'form-control'])}}
			        			</div>
			        		</div>
		        		</div>
		        		<div class="row">
	                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	                            <button type="submit" class="btn btn-success btnReportSubmit">Submit</button>
	                        </div>
	                    </div>
		        	</div>
		        </div>
		    {{ Form::close() }}
	    </div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<p style="margin-top:10px;">Total number of results: {{$travel_passes->count()}} of {{$travel_passes->total()}}</p>
		</div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            {{ Form::open(array('route' => ['travel.pass.reports.print'], 'method' => 'GET','target'=>'_blank')) }}
                {{Form::hidden('travel_pass_type',Request::get('travel_pass_type'))}}
                {{Form::hidden('barangay',Request::get('barangay'))}}
                {{Form::hidden('departure_date',Request::get('departure_date'))}}
                {{Form::hidden('return_date',Request::get('return_date'))}}
                {{Form::hidden('mode_of_transport',Request::get('mode_of_transport'))}}
                {{Form::hidden('purpose_of_travel',Request::get('purpose_of_travel'))}}
                {{Form::hidden('travel_pass_status',Request::get('travel_pass_status'))}}
                {{Form::hidden('is_today',Request::get('is_today'))}}
                {{Form::hidden('is_approval',Request::get('is_approval'))}}
                <button type="submit" class="btn btn-default btn-print pull-right"><i class="fa fa-print"></i>&nbsp;Print</button>
            {{Form::close()}}
        </div>
    </div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped" id="travelPassesTable">
					<thead>
						<tr>
							@if(Request::get('sort_by')!='tracking_no.asc')
								<th>
									<a class="sort-asc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'tracking_no.asc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" ),
									]) }}">Tracking Number&nbsp;
									</a>
								</th>
							@else
								<th>
									<a class="sort-desc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'tracking_no.desc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Tracking Number&nbsp;
									</a>
								</th>
							@endif
							@if(Request::get('sort_by')!='first_name.asc')
								<th><a class="sort-asc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'first_name.asc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Name</a></th>
							@else
								<th><a class="sort-desc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'first_name.desc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Name</a></th>
							@endif
							@if(Request::get('sort_by')!='type.asc')
								<th><a class="sort-asc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'type.asc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Type</a></th>
							@else
								<th><a class="sort-desc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'type.desc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Type</a></th>
							@endif
							@if(Request::get('sort_by')!='barangay.asc')
								<th><a class="sort-asc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'barangay.asc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Barangay</a></th>
							@else
								<th><a class="sort-desc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'barangay.desc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Barangay</a></th>
							@endif
							@if(Request::get('sort_by')!='departure_date.asc')
								<th><a class="sort-asc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'departure_date.asc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Departure Date</a></th>
							@else
								<th><a class="sort-desc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'departure_date.desc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Departure Date</a></th>
							@endif	
							@if(Request::get('sort_by')!='return_date.asc')
								<th><a class="sort-asc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'return_date.asc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Return Date</a></th>
							@else
								<th><a class="sort-desc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'return_date.desc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Return Date</a></th>
							@endif	
							@if(Request::get('sort_by')!='mode_of_transport.asc')
								<th><a class="sort-asc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'mode_of_transport.asc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Mode of Transport</a></th>
							@else
								<th><a class="sort-desc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'mode_of_transport.desc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Mode of Transport</a></th>
							@endif	
							@if(Request::get('sort_by')!='purpose_of_travel.asc')
								<th><a class="sort-asc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'purpose_of_travel.asc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Purpose of Travel</a></th>
							@else
								<th><a class="sort-desc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'purpose_of_travel.desc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Purpose of Travel</a></th>
							@endif	
							@if(Request::get('sort_by')!='status.asc')
								<th><a class="sort-asc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'status.asc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Status</a></th>
							@else
								<th><a class="sort-desc" href="{{ URL::route('travel.pass.reports.index',['sort_by'=>'status.desc',
									'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" )]) }}">Status</a></th>
							@endif
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
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="laravel-pagination" style="text-align: center">
				{{ $travel_passes->appends(
					[
						'sort_by' =>  (isset($_GET["sort_by"]) ? $_GET["sort_by"]:"" ),
						'travel_pass_type' =>  (isset($_GET["travel_pass_type"]) ? $_GET["travel_pass_type"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'departure_date' =>  (isset($_GET["departure_date"]) ? $_GET["departure_date"]:"" ),
						'return_date' =>  (isset($_GET["return_date"]) ? $_GET["return_date"]:"" ),
						'mode_of_transport' =>  (isset($_GET["mode_of_transport"]) ? $_GET["mode_of_transport"]:"" ),
						'barangay' =>  (isset($_GET["barangay"]) ? $_GET["barangay"]:"" ),
						'purpose_of_travel' =>  (isset($_GET["purpose_of_travel"]) ? $_GET["purpose_of_travel"]:"" ),
						'travel_pass_status' =>  (isset($_GET["travel_pass_status"]) ? $_GET["travel_pass_status"]:"" ),
						'is_today' =>  (isset($_GET["is_today"]) ? $_GET["is_today"]:"" ),
						'is_approval' =>  (isset($_GET["is_approval"]) ? $_GET["is_approval"]:"" ),
					])->links() }}
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
<script>
    $(document).ready(function()
    {
        // let travelPassesTable = $('#travelPassesTable').DataTable({
        //     "columnDefs": [
        //         { "type"     : 'date', 'targets': [4,5] }
        //       ],
        //     "order": [[ 0, "desc" ]],
        //     "filter": false,
        //     "paging" : true,
        //     "lengthChange": false,
        //     "info" : true,
        //     "pagingType": "simple_numbers"
        // });
        // var info = travelPassesTable.page.info();
        // $('#travelPassesTable_info').html(
        //     'Total number of results: '+(info.recordsTotal)
        // );
        $('#reportForm').on('click','.btnReportSubmit',function(){
			$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
			$(this).attr('disabled',true);
			$(this).parents('form').submit();
		});
		$('div.laravel-pagination ul.pagination li:first-child span').html('Previous');
		$('div.laravel-pagination ul.pagination li:last-child span').html('Next');
		$('div.laravel-pagination ul.pagination li:first-child a').html('Previous');
		$('div.laravel-pagination ul.pagination li:last-child a').html('Next');
    });
</script>
@stop