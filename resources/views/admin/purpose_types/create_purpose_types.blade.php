@extends('layout.app')
@section('title', 'Add Purpose Type')
@section('app_name', Session::get('software_name'))
@section('css')
<style>
	.list-group-custom > a.list-group-item
	{
		font-size: 1.6em;
	}
	.list-group-custom > a.list-group-item.active, .list-group-custom > a.list-group-item.active:focus, .list-group-custom > a.list-group-item.active:hover {
		background-color: #0063E0;
    	border-color: #707070;
	}
	.custom-box
	{
		background: #FFFFFF 0% 0% no-repeat padding-box;
		border: 1px solid #C6C6C6;
		border-radius: 3px;
		padding: 10px 15px;
	}
	.text-field
	{
		font: normal 20px/30px Helvetica Neue;
		font-weight: 500;
		letter-spacing: 0px;
		color: #000000;
	}
	@media(min-width: 1200px)
    {
    	.table-responsive {
            overflow: visible;
        }
    }
	@media(min-width: 768px)
	{
		.btn-edit
		{
			float: right;
		}
		 div.dataTables_wrapper div.dataTables_paginate {
	    	margin-right:20px !important;
	    }
	    table.dataTable {
	    	margin-top: -1px !important;
	    	margin-bottom: 0px !important;
	    }
	}
	@media(max-width: 767px)
	{
		.btn-edit
		{
			text-align: center;
		}
		.table-responsive
    	{
    		margin-bottom: -10px;
    	}
	    #purposeTypeTable_wrapper
	    {
	    	margin-right: -15px;
	    }
	    table.dataTable {
	    	margin-top: -2px !important;
	    	margin-bottom: 0px !important;
	    }
	}
	.input-group .form-control {
        z-index: 0 !important;
    }
    .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
        z-index: 0 !important;
    }
	.panel-custom > .panel-heading
	{
		padding: 25px 15px 15px 15px;
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
</style>
@stop
@section('content')
<div class="container-fluid">
	<div class="row" style="margin-top:30px;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">				
				<h2>Add Purpose</h2> <small></small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
			<div class="list-group list-group-custom">
			  	<a href="{{route('settings.manage.profile')}}" class="list-group-item">
			    	<i class="fa fa-fw fa-user-circle"></i>&nbsp;<small>Manage Profile</small>
			  	</a>
			  	@if(Session::get('is_allow_users') > 0)
				  	<a href="{{route('settings.users.index')}}" class="list-group-item">
				    	<i class="fa fa-fw fa-users"></i>&nbsp;<small>Users List</small>
				  	</a>
			  	@endif
			  	@if(Session::get('is_allow_activity_logs') > 0)
				  	<a href="{{route('settings.activity.logs.index')}}" class="list-group-item">
				    	<i class="fa fa-fw fa-clipboard-list"></i>&nbsp;<small>Activity Logs</small>
				  	</a>
			  	@endif
			  	@if(Session::get('is_allow_purpose_types') > 0)
				  	<a href="{{route('settings.purpose.types.index')}}" class="list-group-item active">
				    	<i class="fa fa-fw fa-list-ul"></i>&nbsp;<small>Purpose of Travel List</small>
				  	</a>
			  	@endif
			  	@if(Session::get('is_allow_check_points') > 0)
				  	<a href="{{route('settings.check.points.index')}}" class="list-group-item">
				    	<i class="fa fa-fw fa-map-pin"></i>&nbsp;<small>Checkpoint List</small>
				  	</a>
			  	@endif
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-4">
			<div class="panel panel-default panel-custom">
				<div class="panel-body">
					{{ Form::open(array('route' => ['settings.purpose.types.store'],'method' => 'POST','files' => true,'id'=>'purposeForm')) }}
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group {{ $errors->first('name') ? 'has-error' : '' }} ">
									{{ Form::label('name', 'Name', array('class'=>'control-label')) }}
									{{ Form::text('name',null,array('class'=>'form-control validate[required]','placeholder' => 'Name')) }}
									@if($errors->has('name'))
										<p class="help-block text-danger">{{$errors->first('name')}}</p>
									@endif
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="pull-right">
									<a href="{{route('settings.purpose.types.index')}}" class="btn btn-default btnCancel">Cancel</a>
									<button class="btn btn-success btnSubmit" type="button">Submit</button>
								</div>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
<script>
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
		$('#purposeForm').on('click','.btnSubmit',function(){
			$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
			$(this).attr('disabled',true);
			$(this).siblings('.btn').attr('disabled',true);
			$(this).parents('form').submit();
		});
	});
</script>
@stop