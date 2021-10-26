@extends('layout.app')
@section('title', 'Dashboard')
@section('app_name', Session::get('software_name'))
@section('css')
<style type="text/css">

	.equal {
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
	a.box-header-text{
		color:black !important;
	}
	a.box-header-text:hover {
		text-decoration: none !important;
		color:black !important;
	}
	a.box-subheader-text{
		color:gray !important;
	}
	a.box-subheader-text:hover {
		text-decoration: none !important;
		color:gray !important;
	}
	.anchor-panel-card, .anchor-panel-card:focus, .anchor-panel-card:hover
	{
		color: black;
		text-decoration: none;
	}
	.panel-card
	{
		min-height: 145px;
	}
	.panel-card > .panel-body
	{
		min-height:145px;
	}
	.card-header
	{
		display:block;
		font-size: 1.3em;
		font-weight: 900;
		margin-bottom: 10px;
		letter-spacing: -1px;
		min-height: 40px;
	}
	.card-body
	{
		font-size: 2em;
		font-weight: 600;
		margin-bottom: 0px;
	}
	.panel-card > .panel-body
	{
		padding:10px;
	}
	.flex-row-vertical
	{
		vertical-align: middle;
        height:100%;
        display:flex;
        display: -webkit-box;
        /*display: -moz-box;*/
        display: -ms-flexbox;
        display: -webkit-flex;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-orient: vertical;
        -moz-box-orient: vertical;
        align-items: stretch;
        justify-content: space-between;
	}
    .dataTables_wrapper > .table-scrollable{
    	background-color: white;
    }
    div.table-responsive>div.dataTables_wrapper>div[class^="row"]:last-child {
    	background-color: white;
    }
    .table>thead
    {
    	background-color: white;
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
	.table-striped > tbody > tr:nth-of-type(odd) {
	    background-color: #EBEDEF;
	}
	
	.table-responsive
	{
		background-color:white;
		box-shadow: 0px 3px 6px #00000029;
	}
	@media(min-width: 1200px)
    {
    	.table-responsive
    	{
            overflow: visible;
        }
    }
    @media (max-width: 767px)
    {
    	.table-responsive
    	{
    		margin-top: unset;
    		margin-bottom: unset;
    	}
	    #travelPassesTable_wrapper
	    {
	    	margin-right: -15px;
	    }
	    table.dataTable {
	    	margin-top: -2px !important;
	    	/* margin-bottom: 0px !important; */
	    	padding-bottom: 15px;
	    }
    }
    #travelPassesTable
    {
    	margin-top: -1px !important;
    	/* margin-bottom: -1px !important; */
    	padding-bottom: 15px;
    }
    @media(max-width: 991px)
    {
    	#travelPassesTable
	    {
	    	margin-top: -2px !important;
	    }
    }
    .total-text-card
    {
    	color: #383838;
    }
</style>
<script src="{{ URL::asset('/js/chart.js') }}"></script>
@stop
@section('content')

<div class="container-fluid">
	<div class="row" style="margin-top: 30px;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	
			<div class="page-header">				
				<h2>Dashboard</h2> <small></small>
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		   	@if(Session::has('flash_message'))
				<div class="alert alert-success">{{Session::get('flash_message')}}</div>
			@endif

			@if(Session::has('flash_error'))
				<div class="alert alert-danger">{{Session::get('flash_error')}}</div>
			@endif
		</div>	
	</div>

		<div class="row equal">
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
				<a href="#" class="anchor-panel-card">
					<div class="panel panel-default panel-card panel-total">
						<div class="panel-body">
							<div class="row equal">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="align-self: center;">
									<img src="{{asset('uploads/icons/green-check-circle.png')}}" class="img-responsive img-circle" alt="total-cases-icon">
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<div class="flex-row-vertical">
										<div class="second-column text-center">
											<p class="card-body total-text-card">0</p>
										</div>
										<div class="first-column  text-center">
											<strong class="card-header">Total INvoice</strong>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
				<a href="#" class="anchor-panel-card">
					<div class="panel panel-default panel-card panel-total">
						<div class="panel-body">
							<div class="row equal">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="align-self: center;">
									<img src="{{asset('uploads/icons/checklist-light-blue.png')}}" class="img-responsive img-circle" alt="total-cases-icon">
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<div class="flex-row-vertical">
										<div class="second-column text-center">
											<p class="card-body total-text-card">0</p>
										</div>
										<div class="first-column  text-center">
											<strong class="card-header">Paid Rents</strong>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
				<a href="#" class="anchor-panel-card">
					<div class="panel panel-default panel-card panel-total">
						<div class="panel-body">
							<div class="row equal">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="align-self: center;">
									<img src="{{asset('uploads/icons/gray-rotation.png')}}" class="img-responsive img-circle" alt="total-cases-icon">
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<div class="flex-row-vertical">
										<div class="second-column text-center">
											<p class="card-body total-text-card">0</p>
										</div>
										<div class="first-column  text-center">
											<strong class="card-header">Unpaid Total</strong>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
				<a href="#" class="anchor-panel-card">
					<div class="panel panel-default panel-card panel-total">
						<div class="panel-body">
							<div class="row equal">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="align-self: center;">
									<img src="{{asset('uploads/icons/blue-paper-plane.png')}}" class="img-responsive img-circle" alt="total-cases-icon">
								</div>
								<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
									<div class="flex-row-vertical">
										<div class="second-column text-center">
											<p class="card-body total-text-card">0</p>
										</div>
										<div class="first-column  text-center">
											<strong class="card-header">Pending Rents</strong>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	
	


	
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Pending Application</h4>
					</div>
					<div class="panel-body" style="padding: unset;">
						<div class="table-responsive">
							<table class="table table-striped" id="travelPassesTable">
								<thead>
									<tr>
										<th>Tracking Number</th>
										<th>Name</th>
										<th>Contact Number</th>
										<th>Barangay</th>
										<th>Date of Travel</th>
										<th>Destination</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	
</div>
@stop
@section('js')
<script src="{{ URL::asset('assets/chart.js-2.9.3/package/dist/Chart.bundle.min.js') }}"></script>
<script>
	let travelPassesTable = $('#travelPassesTable').DataTable({
            "columnDefs": [
                { "orderable": false , "targets": 6 },
                { "type"     : 'date', 'targets': [4] }
              ],
            "order": [],
            "filter": false,
            "paging" : false,
            "lengthChange": false,
            "info" : false,
            "pagingType": "simple_numbers"
        });
</script>
@stop