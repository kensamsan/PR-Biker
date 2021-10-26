@extends('layout.app')
@section('title', 'Add Bank')
@section('app_name', Session::get('software_name'))
@section('content')

<div style=" height: 900px;width: 100%; overflow: scroll;">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Banks <small></small>
			</h1>
			@if(Session::has('flash_message'))
				<div class="alert alert-success">{{Session::get('flash_message')}}</div>
			@endif

			@if(Session::has('flash_error'))
				<div class="alert alert-danger">{{Session::get('flash_error')}}</div>
			@endif
			<ol class="breadcrumb">
				<li class="active">
					<i class="fa fa-shopping-basket" aria-hidden="true"></i> Add Banks
				</li>
			</ol>
		</div>
	</div>

	{{ Form::open(array('url' => '/banks', 'method' => 'store')) }}

	<div class="row">
		<div class="col-lg-4">
			{{ Form::label('bank_name', 'Bank Name') }}
			{{ Form::text('bank_name','',array('class'=>'form-control span6','placeholder' => 'Bank Name')) }}
			<span class="errors" style="color:#FF0000">{{$errors->first('bank_name')}}</span>
		</div>
	</div>

	
	<div class="row top10">
		<div class="col-lg-4">
			<input type="submit" class="btn btn-default" value="Submit" onclick="this.disabled=true;this.value='Submitted, please wait...';this.form.submit();" />
		</div>
	</div>
	
	{!! Form::close() !!}

   
</div>

		 

	
	

	
@stop