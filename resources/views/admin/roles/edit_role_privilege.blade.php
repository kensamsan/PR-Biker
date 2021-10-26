@extends('layout.app')
@section('title', 'Edit Role Privilege')
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
	@media (max-width: 991px) {
        .btnDeletePrivilege {
            margin-bottom:15px;
        }
    }
</style>
@stop
@section('content')
<div class="container-fluid">
	<div class="row" style="margin-top:30px;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">				
				<h2><a  href="{{ route('roles.index')}}" style="color:black;"><i class="fa fa-arrow-left"></i></a> Roles / {{ucfirst($role->name)}} Role / Edit Privileges</h2> <small></small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading" >
					<h4 class="panel-title">
						<i class="fa fa-info-circle"></i>
					</h4>
				</div>
				<div class="panel-body">
					<div class="row">
					  	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					  		{{ Form::open(array('route' => array('roles.update.privilege','id' => $role->id, 'type' =>'destroy'),'method'=>'put','id'=>'deletePrivilegeForm')) }}
						  		<div class="form-group {{ $errors->first('has_privilege') ? 'has-error' : '' }} ">
						  			{{ Form::label('has_privilege', 'Current Privileges', array('class'=>'control-label')) }}
						  			<select size="10" class="form-control validate[required]" name="has_privilege[]" id="has_privilege"  multiple>
						  				@foreach($has_privileges as $has_privilege)
						  					<option value="{{$has_privilege->id}}">{{ $has_privilege->name}}</option>
						  				@endforeach
						  			</select>
						  			@if($errors->has('has_privilege'))
										<p class="help-block text-danger">{{$errors->first('has_privilege')}}</p>
									@endif
						  		</div>
						  		<button type="submit" class="btn btn-danger pull-left btnDeletePrivilege">
									&nbsp;Remove Privileges >>
		                        </button>
							{{ Form::close() }}
					  	</div>
					  	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					  		{{ Form::open(array('route' => array('roles.update.privilege','id' => $role->id, 'type' =>'store'),'method'=>'put','id'=>'addPrivilegeForm')) }}
						  		<div class="form-group {{ $errors->first('has_not_privilege') ? 'has-error' : '' }} ">
						  			{{ Form::label('has_not_privilege', 'Other Privileges', array('class'=>'control-label')) }}
						  			<select size="10" class="form-control validate[required]" name="has_not_privilege[]" id="has_not_privilege" multiple>
						  				@foreach($has_not_privileges as $has_not_privilege)	
						  					<option value="{{$has_not_privilege->id}}">{{ $has_not_privilege->name}}</option>
						  				@endforeach
						  			</select>
						  			@if($errors->has('has_not_privilege'))
										<p class="help-block text-danger">{{$errors->first('has_not_privilege')}}</p>
									@endif
						  		</div>
						  		<button type="submit" class="btn btn-success pull-right btnAddPrivilege">
									&nbsp;<< Add Privileges
		                        </button>
					  		{{ Form::close() }}
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
		@if($errors->any())
			Swal.fire(
			  'There is an error.',
			  'Please check all of your input.',
			  'error'
			)
		@endif
	});
	$('#deletePrivilegeForm').validationEngine('attach',
		{
	    	promptPosition : "inline", 
	    	scroll: false,
	    	onValidationComplete: function(form,status)
	    	{
	    		if(status === true)
	    		{
	    			$('.btnDeletePrivilege').html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
	    			$('.btnDeletePrivilege').attr('disabled',true);
	    			$('.btnAddPrivilege').attr('disabled',true);
	    			return true;
	    		}
	    		else
	    		{
	    			$('.btnDeletePrivilege').attr('disabled',false);
	    			$('.btnAddPrivilege').attr('disabled',false);
	    		}
	    	}
	    }
	);
	$('#addPrivilegeForm').validationEngine('attach',
		{
	    	promptPosition : "inline", 
	    	scroll: false,
	    	onValidationComplete: function(form,status)
	    	{
	    		if(status === true)
	    		{
	    			$('.btnAddPrivilege').html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
	    			$('.btnAddPrivilege').attr('disabled',true);
	    			$('.btnDeletePrivilege').attr('disabled',true);
	    			return true;
	    		}
	    		else
	    		{
	    			$('.btnAddPrivilege').attr('disabled',false);
	    			$('.btnDeletePrivilege').attr('disabled',false);
	    		}
	    	}
	    }
	);
</script>	
@stop