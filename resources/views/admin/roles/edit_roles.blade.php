@extends('layout.app')
@section('title', 'Edit Role')
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
				<h2><a  href="{{ route('roles.index')}}" style="color:black;"><i class="fa fa-arrow-left"></i></a> Roles / Edit Role</h2> <small></small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
			{{ Form::open(array('route' => ['roles.update','id'=>$role->id],'files' => true,'id'=>'editRolesForm','method'=>'put')) }}
			<div class="panel panel-default">
				<div class="panel-heading" >
					<h4 class="panel-title">
						<i class="fa fa-info-circle"></i>
					</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="form-group {{ $errors->first('name') ? 'has-error' : '' }} ">
								{{ Form::label('name', 'Role Name', array('class'=>'control-label')) }}
								{{ Form::text('name',$role->name,array('class'=>'form-control validate[required]','placeholder' => 'Role Name')) }}
								@if($errors->has('name'))
									<p class="help-block text-danger">{{$errors->first('name')}}</p>
								@endif
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-offset-8 col-sm-4 col-md-offset-7 col-md-5 col-lg-offset-8 col-lg-4">
							<button type="submit" class="btn btn-success btn-block btnRoleSubmit">
								&nbsp;Submit
	                        </button>
						</div>
					</div>
				</div>
			</div>
			{!! Form::close() !!}
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
	});
	$('#editRolesForm').validationEngine('attach',
		{
	    	promptPosition : "inline", 
	    	scroll: false,
	    	onValidationComplete: function(form,status)
	    	{
	    		if(status === true)
	    		{
	    			$('.btnRoleSubmit').html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
	    			$('.btnRoleSubmit').attr('disabled',true);
	    			return true;
	    		}
	    		else
	    		{
	    			$('.btnRoleSubmit').attr('disabled',false);
	    		}
	    	}
	    }
	);
</script>	
@stop