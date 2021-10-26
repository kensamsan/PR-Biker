@extends('layout.app')
@section('title', 'User Profile Edit Password')
@section('app_name', Session::get('software_name'))
@section('css')
<style>
	.formError{
		z-index: 0 !important;
	}
	.formError .formErrorContent{
		z-index: 0 !important;
	}
	.input-group .form-control {
		z-index: 0 !important;
	}
	.usetwentyfour
	{
		width:350px !important;
		height: 420px !important;
	}
</style>
@stop
@section('content')
	<div class="container-fluid">
		<div class="row" style="margin-top:30px;">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="page-header">				
					<h2><a href="{{ route('profile')}}" style="color:black;"><i class="fa fa-arrow-left"></i></a> User Profile / Edit Password</h2> <small></small>
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
		@if(count($errors->all()) > 0)
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="alert alert-danger">
						@foreach ($errors->all() as $message)
							{{$message}}<br>
						@endforeach

					</div>	
				</div>
			</div>
		@endif
		<div class="row">
			{{ Form::open(array('route' => array('profile.password.update'),'files' => true,'method' => 'put','id'=>'editUserPasswordForm')) }}
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading" style="background-color: #fff">
						<h4 class="panel-title">
							<i class="fa fa-info-circle"></i> {{$user->first_name}} {{$user->middle_name}} {{$user->last_name}} 
						</h4>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="form-group {{ $errors->first('old_password') ? 'has-error' : '' }} ">
									{{ Form::label('old_password', 'Old Password', array('class'=>'control-label')) }}
									{{ Form::password('old_password',array('class'=>'form-control validate[required]','placeholder' => 'Old Password')) }}
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="form-group {{ $errors->first('new_password') ? 'has-error' : '' }} ">
									{{ Form::label('new_password', 'New Password', array('class'=>'control-label')) }}
									{{ Form::password('new_password',array('class'=>'form-control validate[required]','placeholder' => 'New Password','id'=>'pass')) }}
								</div>	
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="form-group {{ $errors->first('new_password_confirmation') ? 'has-error' : '' }} ">
									{{ Form::label('new_password_confirmation', 'Password Confirmation', array('class'=>'control-label')) }}
									{{ Form::password('new_password_confirmation',array('class'=>'form-control validate[equals[pass]]','placeholder' => 'New Password Confirmation')) }}
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-offset-9 col-md-3 col-lg-offset-9 col-lg-3">
								<button type="submit" class="btn btn-success btn-block btnUserSubmit">
                                    &nbsp;Submit
                                </button>
							</div>
						</div>
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
@stop
@section('script')
	<script>
		$('#editUserPasswordForm').validationEngine('attach',{
	    	promptPosition : "inline", 
	    	scroll: false,
	    	onValidationComplete: function(form,status)
	    	{
	    		if(status === true)
	    		{
	    			$('.btnUserSubmit').html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
	    			$('.btnUserSubmit').attr('disabled',true);
	    			return true;
	    		}
	    		else
	    		{
	    			$('.btnUserSubmit').attr('disabled',false);
	    		}
	    	}
	    });
	</script>
@stop