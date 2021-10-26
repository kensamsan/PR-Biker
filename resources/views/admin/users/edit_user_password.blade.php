@extends('layout.app')
@section('title', 'Edit User Password')
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
				<h2>Edit User Password</h2> <small></small>
			</div>
		</div>
	</div>
	@if(Session::has('flash_message'))
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="alert alert-success">{{Session::get('flash_message')}}</div>
			</div>
		</div>
	@endif
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
			<div class="list-group list-group-custom">
			  	<a href="{{route('settings.manage.profile')}}" class="list-group-item">
			    	<i class="fa fa-fw fa-user-circle"></i>&nbsp;<small>Manage Profile</small>
			  	</a>
			  	@if(Session::get('is_allow_users') > 0)
				  	<a href="{{route('settings.users.index')}}" class="list-group-item active">
				    	<i class="fa fa-fw fa-users"></i>&nbsp;<small>Users List</small>
				  	</a>
			  	@endif
			  	@if(Session::get('is_allow_activity_logs') > 0)
				  	<a href="{{route('settings.activity.logs.index')}}" class="list-group-item">
				    	<i class="fa fa-fw fa-clipboard-list"></i>&nbsp;<small>Activity Logs</small>
				  	</a>
			  	@endif
			  	@if(Session::get('is_allow_purpose_types') > 0)
				  	<a href="{{route('settings.purpose.types.index')}}" class="list-group-item">
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
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<i class="fa fa-info-circle"></i> {{$user->first_name}} {{$user->middle_name}} {{$user->last_name}} 
					</h4>
				</div>
				<div class="panel-body">
					{{ Form::open(array('route' => ['settings.users.update.password','id' => $user->id],'method' => 'put','files' => true,'id'=>'userForm')) }}
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="form-group {{ $errors->first('old_password') ? 'has-error' : '' }} ">
									{{ Form::label('old_password', 'Old Password', array('class'=>'control-label')) }}
									{{ Form::password('old_password',array('class'=>'form-control validate[required]','placeholder' => 'Old Password')) }}
									@if($errors->has('old_password'))
										<p class="help-block text-danger">{{$errors->first('old_password')}}</p>
									@endif
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="form-group {{ $errors->first('new_password') ? 'has-error' : '' }} ">
									{{ Form::label('new_password', 'New Password', array('class'=>'control-label')) }}
									{{ Form::password('new_password',array('class'=>'form-control validate[required]','placeholder' => 'New Password','id'=>'pass')) }}
									@if($errors->has('new_password'))
										<p class="help-block text-danger">{{$errors->first('new_password')}}</p>
									@endif
								</div>	
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="form-group {{ $errors->first('new_password_confirmation') ? 'has-error' : '' }} ">
									{{ Form::label('new_password_confirmation', 'Password Confirmation', array('class'=>'control-label')) }}
									{{ Form::password('new_password_confirmation',array('class'=>'form-control validate[equals[pass]]','placeholder' => 'New Password Confirmation')) }}
									@if($errors->has('new_password_confirmation'))
										<p class="help-block text-danger">{{$errors->first('new_password_confirmation')}}</p>
									@endif
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="pull-right">
									<a href="{{route('settings.users.index')}}" class="btn btn-default btnCancel">Cancel</a>
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
		$('#userForm').on('click','.btnSubmit',function(){
			$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
			$(this).attr('disabled',true);
			$(this).siblings('.btn').attr('disabled',true);
			$(this).parents('form').submit();
		});
	});
</script>
@stop