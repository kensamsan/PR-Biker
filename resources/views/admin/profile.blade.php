@extends('layout.app')
@section('title', 'User Profile')
@section('app_name', Session::get('software_name'))
@section('css')
<style>

	  .caption{
		display: none;
		transition: background-color .5s;
	}

	
	.caption-cam{
		float:right;
		display:block;
		color:#fff;
		position: absolute;
		/* bottom: 5px; */
		bottom: -25px;
		left: 7px;
		transition: bottom .5s;
	}
	.img_caption:hover .caption-cam{
		bottom: 8px
	}

	.img_caption:hover .caption {
		display: block;
		height: 45px;
		/* height: 50px; */
		width: 100%;
		background-color: #cccccc42;
		background-color: #00000042;
		position: absolute;
		bottom: 0;
		margin: 0;
		/* border-bottom-left-radius: 8px; */
		/* border-bottom-right-radius: 8px; */
		padding-top: 15px;
		color: #fff;
		cursor: pointer;
		text-align: center;
	}
	.caption:hover{
		/* background-color: #00000042 !important; */
		background-color: #00000069 !important;
	}
	.fields-boi>.row>.col-md-3, .fields-boi>.row>.col-md-4, .fields-boi>.row>.col-md-6 {
		padding-top: 20px;
	}
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
	.img_caption
	{
		overflow: hidden; 
		position: relative; 
		outline: 5px solid #f1f2f6; 
	}
</style>
@stop
@section('content')
<div class="container-fluid">
	<div class="row" style="margin-top:30px;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">				
				<h2>User Profile</h2> <small></small>
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
		{{ Form::open(array('route' => ['profile.update'],'method' => 'put','files' => true,'id'=>'createUsersForm')) }}
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color: #fff">
					<h4 class="panel-title">
						<i class="fa fa-camera"></i> Photo
					</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-10 col-md-offset-1 col-lg-6 col-lg-offset-3">
							<div class="form-group">
								<div  class="img_caption" >
									<img src="{{URL::asset('/uploads/users/'.$user->photo ) }}" id="prof_id" class="img-responsive req_file_view2" alt=""  style=" width: auto; background-color: #013b4a; margin: 0 auto;">
									<label for="image_id" class="caption text-center">
										<i class="fa fa-camera hidden"></i> 
											Update Photo
										</label> 
									<label class="caption-cam">
										<i class="fa fa-camera"></i>
									</label>
									{!! Form::file('photo', array('id'=>'image_id', 'class'=>'hidden')) !!} 
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<a href="{{route('profile.password')}}" class="btn btn-info btn-block"><i class="fa fa-lock"></i> Change Password</a>
				</div>	
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color: #fff">
					<h4 class="panel-title">
						<i class="fa fa-info-circle"></i>
					</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h4><strong>Personal Information</strong></h4>
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="form-group {{ $errors->first('last_name') ? 'has-error' : '' }} ">
								{{ Form::label('last_name', 'Last Name', array('class'=>'control-label')) }}
								{{ Form::text('last_name',$user->last_name,array('class'=>'form-control validate[required]','placeholder' => 'Last Name')) }}
							</div>	
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="form-group {{ $errors->first('first_name') ? 'has-error' : '' }} ">
								{{ Form::label('first_name', 'First Name', array('class'=>'control-label')) }}
								{{ Form::text('first_name',$user->first_name,array('class'=>'form-control validate[required]','placeholder' => 'First Name')) }}
							</div>	
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="form-group {{ $errors->first('middle_name') ? 'has-error' : '' }} ">
								{{ Form::label('middle_name', 'Middle Name', array('class'=>'control-label')) }}
								{{ Form::text('middle_name',$user->middle_name,array('class'=>'form-control validate[required]','placeholder' => 'Middle Name')) }}
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="form-group {{ $errors->first('contact_no') ? 'has-error' : '' }} ">
								{{ Form::label('contact_no', 'Contact No.', array('class'=>'control-label')) }}
								{{ Form::text('contact_no',$user->contact,array('class'=>'form-control validate[required]','placeholder' => 'Contact No.')) }}
							</div>	
						</div>
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-4">
							<div class="form-group {{ $errors->first('email_address') ? 'has-error' : '' }} ">
								{{ Form::label('email_address', 'Email Address', array('class' => 'control-label')) }}
								{{ Form::email('email_address',$user->email,array('class'=>'form-control validate[required,custom[email]]','placeholder' => 'Email Address','formnovalidate'=>'formnovalidate')) }}
					 		</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h4><strong>Account Information</strong></h4>
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-4">
							<div class="form-group {{ $errors->first('username') ? 'has-error' : '' }} ">
								{{ Form::label('username', 'Username', array('class'=>'control-label')) }}
								{{ Form::text('username',$user->username,array('class'=>'form-control validate[required]','placeholder' => 'Username')) }}
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-offset-9 col-md-3 col-lg-offset-10 col-lg-2">
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
	$('#prof_id').css('width',$('.img_caption').width());
	$('#prof_id').css('height',$('.img_caption').width());
    $(window).on('resize', function(){
        $('#prof_id').css('width',$('.img_caption').width());
        $('#prof_id').css('height',$('.img_caption').width());
    });
	function readURL(input) {
		var defaultUser = '{{asset('/uploads/users/'.$user->photo)}}';
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {

				$('#prof_id').attr('src', e.target.result);
				
			}

			reader.readAsDataURL(input.files[0]);
		}
		else
		{
			$('#prof_id').attr('src',defaultUser);
		}
	}
	$("#image_id").change(function() {
		readURL(this);
	});
	$('#createUsersForm').validationEngine('attach',
		{
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
	    }
	);
</script>
@stop