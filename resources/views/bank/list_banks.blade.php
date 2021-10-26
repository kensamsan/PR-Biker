@extends('layout.app')
@section('title', 'Bank List')
@section('app_name', Session::get('software_name'))
@section('content')




<div style=" height: 800px; overflow: scroll;">

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
					<i class="fa fa-search"></i> Client Search
				</li>
			</ol>
		</div>
	</div>


	<div class="row">
		<div class="col-lg-4">
			{{ Form::open(array('url' => '/banks', 'method' => 'get')) }}  
			{{ Form::text('search','',array('class'=>'form-control span6','placeholder' => 'Search')) }}
			<span class="errors" style="color:#FF0000">{{$errors->first('search')}}</span>{{ Form::submit('Search', array('class'=>'btn btn-default')) }}
			{{ Form::close() }}
		
		</div>
		<div class="col-lg-4">
			<a href="/banks/create"><button class="btn btn-primary">Add Bank</button></a>
		</div>

	</div>
	<div class="row">
		<div class="col-lg-12">
			
			<ol class="breadcrumb">
				<li class="active">
					<i class="fa fa-shopping-basket"></i> Bank List
				</li>
			</ol>
			
		</div>
	</div>


	<table class="table" style="border: 1px solid black;">
		<tr style="border: 1px solid black;">
			<th>Client Name</th>
			<th></th>
		</tr>
		  	@foreach ($banks as $x)
			<tr style="border: 1px solid black;">
				<td>{{ $x->bank_name }}</td>
				<td>
					<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown">Actions
						<span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="/banks/{{$x->id}}/edit"><i class="fa fa-pencil margin-right"></i>Edit</a></li>
							<li><a href="/bank-delete/{{$x->id}}" class="confirmation"><i class="fa fa-trash margin-right"></i>Delete</a></li>
						</ul>
					</div>
				</td>
				
			</tr>
			@endforeach 
	</table>
	<div style="text-align: center">
		{{ $banks->links() }}
	</div>
</div>
	

	
@stop