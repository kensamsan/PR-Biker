@extends('layout.app')
@section('title', 'Manage Profile')
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
	@media(min-width: 768px)
	{
		.btn-edit
		{
			float: right;
		}
	}
	@media(max-width: 767px)
	{
		.btn-edit
		{
			text-align: center;
		}
	}
	
</style>
@stop
@section('content')
<div class="container-fluid">
	<div class="row" style="margin-top:30px;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">				
				<h2>Manage Profile</h2> <small></small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
			<div class="list-group list-group-custom">
			  	<a href="{{route('settings.manage.profile')}}" class="list-group-item active">
			    	<i class="fa fa-fw fa-user-circle"></i>&nbsp;<small>Manage Profile</small>
			  	</a>
			  	@if(Session::get('is_allow_users') > 0)
				  	<a href="#" class="list-group-item">
				    	<i class="fa fa-fw fa-users"></i>&nbsp;<small>Users List</small>
				  	</a>
			  	@endif
			  	@if(Session::get('is_allow_activity_logs') > 0)
				  	<a href="#" class="list-group-item">
				    	<i class="fa fa-fw fa-clipboard-list"></i>&nbsp;<small>Activity Logs</small>
				  	</a>
			  	@endif
			  	@if(Session::get('is_allow_purpose_types') > 0)
				  	<a href="{{route('settings.purpose.types.index')}}" class="list-group-item">
				    	<i class="fa fa-fw fa-list-ul"></i>&nbsp;<small>Purpose of Travel List</small>
				  	</a>
			  	@endif
			  	{{-- @if(Session::get('is_allow_mobile_users') > 0)
				  	<a href="{{route('settings.purpose.types.index')}}" class="list-group-item">
				    	<i class="fa fa-fw fa-list-ul"></i>&nbsp;<small>Purpose of Travel List</small>
				  	</a>
			  	@endif --}}
			  	@if(Session::get('is_allow_check_points') > 0)
				  	<a href="{{route('settings.check.points.index')}}" class="list-group-item">
				    	<i class="fa fa-fw fa-map-pin"></i>&nbsp;<small>Checkpoint List</small>
				  	</a>
			  	@endif
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row" style="margin-bottom:10px;">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="custom-box">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p class="text-field">Name: {{!empty($user->middle_name) ? $user->first_name.' '.substr($user->middle_name,0,1).'. '.$user->last_name : $user->first_name.' '.$user->last_name}}</p>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<a href="{{route('settings.edit.name')}}" class="btn btn-default btn-edit"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" style="margin-bottom:10px;">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="custom-box">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p class="text-field">Username: {{$user->username}}</p>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<a href="{{route('settings.edit.username')}}" class="btn btn-default btn-edit"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" style="margin-bottom:10px;">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="custom-box">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p class="text-field">Email: {{$user->email}}</p>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<a href="{{route('settings.edit.email')}}" class="btn btn-default btn-edit"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" style="margin-bottom:10px;">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="custom-box">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<p class="text-field">Change Password</p>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<a href="{{route('settings.edit.password')}}" class="btn btn-default btn-edit"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</a>
									</div>
								</div>
							</div>
						</div>
					</div>
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
	});
</script>
@stop