@extends('layout.app')
@section('title', 'Add User')
@section('app_name', Session::get('software_name'))
@section('css')
<style>
	.input-group .form-control {
		z-index: 0 !important;
	}
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
</style>
@stop
@section('content')
<div class="container-fluid">
	<div class="row" style="margin-top:30px;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">				
				<h2>Add User</h2> <small></small>
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
			
			  	@if(Session::get('is_allow_users') > 0)
				  	<a href="{{route('users.index')}}" class="list-group-item active">
				    	<i class="fa fa-fw fa-users"></i>&nbsp;<small>Users List</small>
				  	</a>
			  	@endif
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
			<div class="panel panel-default">
				<div class="panel-body">
					{{ Form::open(array('route' => ['users.store'],'method' => 'POST','files' => true,'id'=>'userForm')) }}
						<div class="row">
							<div class="col-xs-offset-4 col-xs-4 col-sm-offset-4 col-sm-4 col-md-offset-4 col-md-4 col-lg-offset-5 col-lg-2">
								<div class="form-group {{ $errors->first('photo') ? 'has-error' : '' }}">
									<div  class="img_caption" style="overflow: hidden; position: relative; outline: 5px solid #f1f2f6; ">
										<img src="{{URL::asset('/uploads/users/anon.png' ) }}" id="prof_id" class="img-responsive req_file_view2" alt=""  style=" width: auto; background-color: #013b4a; margin: 0 auto;">
										<label for="image_id" class="caption text-center">
											<i class="fa fa-camera hidden"></i> 
												Update Photo
											</label> 
										<label class="caption-cam">
											<i class="fa fa-camera"></i>
										</label>
										{!! Form::file('photo', array('id'=>'image_id', 'class'=>'hidden')) !!} 
									</div>
									@if($errors->has('photo'))
										<p class="help-block text-danger">{{$errors->first('photo')}}</p>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<div class="form-group {{ $errors->first('last_name') ? 'has-error' : '' }} ">
									{{ Form::label('last_name', 'Last Name', array('class'=>'control-label')) }}
									{{ Form::text('last_name',null,array('class'=>'form-control validate[required]','placeholder' => 'Last Name')) }}
									@if($errors->has('last_name'))
										<p class="help-block text-danger">{{$errors->first('last_name')}}</p>
									@endif
								</div>	
							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<div class="form-group {{ $errors->first('first_name') ? 'has-error' : '' }} ">
									{{ Form::label('first_name', 'First Name', array('class'=>'control-label')) }}
									{{ Form::text('first_name',null,array('class'=>'form-control validate[required]','placeholder' => 'First Name')) }}
									@if($errors->has('first_name'))
										<p class="help-block text-danger">{{$errors->first('first_name')}}</p>
									@endif
								</div>	
							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<div class="form-group {{ $errors->first('middle_name') ? 'has-error' : '' }} ">
									{{ Form::label('middle_name', 'Middle Name', array('class'=>'control-label')) }}
									{{ Form::text('middle_name',null,array('class'=>'form-control validate[required]','placeholder' => 'Middle Name')) }}
									@if($errors->has('middle_name'))
										<p class="help-block text-danger">{{$errors->first('middle_name')}}</p>
									@endif
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<div class="form-group {{ $errors->first('contact_no') ? 'has-error' : '' }} ">
									{{ Form::label('contact_no', 'Contact No.', array('class'=>'control-label')) }}
									{{ Form::text('contact_no',old('contact_no'),array('class'=>'form-control validate[required]','placeholder' => 'Contact No.')) }}
									@if($errors->has('contact_no'))
										<p class="help-block text-danger">{{$errors->first('contact_no')}}</p>
									@endif
								</div>	
							</div>
							<div class="col-xs-12 col-sm-12 col-md-8 col-lg-4">
								<div class="form-group {{ $errors->first('email_address') ? 'has-error' : '' }} ">
									{{ Form::label('email_address', 'Email Address', array('class' => 'control-label')) }}
									{{ Form::email('email_address',old('email_address'),array('class'=>'form-control validate[required,custom[email]]','placeholder' => 'Email Address','formnovalidate'=>'formnovalidate')) }}
									@if($errors->has('email_address'))
										<p class="help-block text-danger">{{$errors->first('email_address')}}</p>
									@endif
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
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
								<div class="form-group {{ $errors->first('username') ? 'has-error' : '' }} ">
									{{ Form::label('username', 'Username', array('class'=>'control-label')) }}
									{{ Form::text('username',old('username'),array('class'=>'form-control validate[required]','placeholder' => 'Username')) }}
									@if($errors->has('username'))
										<p class="help-block text-danger">{{$errors->first('username')}}</p>
									@endif
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
								<div class="form-group {{ $errors->first('password') ? 'has-error' : '' }} ">
									{{ Form::label('password', 'Password', array('class'=>'control-label')) }}
									{{ Form::password('password',array('class'=>'form-control validate[required]','placeholder' => 'Password','id'=>'pass')) }}
									@if($errors->has('password'))
										<p class="help-block text-danger">{{$errors->first('password')}}</p>
									@endif
								</div>	
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
								<div class="form-group {{ $errors->first('password_confirmation') ? 'has-error' : '' }} ">
									{{ Form::label('password_confirmation', 'Confirm Password', array('class'=>'control-label')) }}
									{{ Form::password('password_confirmation',array('class'=>'form-control validate[equals[pass]]','placeholder' => 'Confirm Password')) }}
									@if($errors->has('password_confirmation'))
										<p class="help-block text-danger">{{$errors->first('password_confirmation')}}</p>
									@endif
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="pull-right">
									<a href="{{route('users.index')}}" class="btn btn-default btnCancel">Cancel</a>
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

		$('#prof_id').css('width',$('.img_caption').width());
		$('#prof_id').css('height',$('.img_caption').width());
	    $(window).on('resize', function(){
	        $('#prof_id').css('width',$('.img_caption').width());
	        $('#prof_id').css('height',$('.img_caption').width());
	    });
		function readURL(input) {
		 var defaultUser = '{{asset('/uploads/users/anon.png')}}';
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
		$('#userForm').on('click','.btnSubmit',function(){
			$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
			$(this).attr('disabled',true);
			$(this).siblings('.btn').attr('disabled',true);
			$(this).parents('form').submit();
		});
	});
</script>
@stop