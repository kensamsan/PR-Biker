@extends('layout.app')
@section('title', 'Users List')
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
	    #usersTable_wrapper
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


<div class="modal fade" id="confirmStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure you want to add stock?
			</div>
			<div class="modal-footer">
				<a href="#" id="btnAddStockSubmit" class="btn btn-primary">Submit</a>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div id="confirmationGrade" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Confirmation</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<p>
					Delete this Category?
				</p>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
				<a href="#" id="btnDeleteGrade" class="btn btn-danger">Delete</a>
			</div>
		</div>
	</div>
</div>
<div id="addStock" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Stock</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				{{ Form::open(['route' => 'admin.product.addstock','files'=>true,'method' => 'post','id'=>'form_add']) }}
					<div class="row">
						<div class="col-lg-12">
							{{ Form::label('quantity', 'Quantity') }}
							<input type="number" class="form-control span6" required name="quantity" min="0" value="1" step="1" >
							<span class="errors" style="color:#FF0000">{{$errors->first('quantity')}}</span>
						</div>
					</div>
				{{ Form::close() }}
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
				<!-- <a href="#" id="btnAddStockSubmit" class="btn btn-primary">Submit</a> -->
				<a href="#" id="btnSubmitStock" class="btn btn-primary">Submit</a>
			</div>
		</div>
	</div>
</div>

<div id="adjustStock" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Adjust Stock</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				{{ Form::open(['route' => 'admin.product.adjust-stock','files'=>true,'method' => 'post','id'=>'form_adjust']) }}
					<div class="row">
						<div class="col-lg-12">
							{{ Form::label('quantity', 'Quantity') }}
							<input type="number" class="form-control span6" required name="quantity" min="0" value="0" step="1" >
							<span class="errors" style="color:#FF0000">{{$errors->first('quantity')}}</span>
						</div>
					</div>
				{{ Form::close() }}
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
				<!-- <a href="#" id="btnAddStockSubmit" class="btn btn-primary">Submit</a> -->
				<a href="#" id="btnSubmitAdjustStock" class="btn btn-primary">Submit</a>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				<small><a href="{{ route('admin-products.index') }}">Products</a> > {{$p->product_name}}</small>
			</h1>
		</div>
	
	</div>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="">
				&nbsp; 
			</h1>
			@if(Session::has('flash_message'))
				<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{Session::get('flash_message')}}
				</div>
			@endif

			@if(Session::has('flash_error'))
				<div class="alert alert-danger">{{Session::get('flash_error')}}</div>
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<table class="table" style="border: 1px solid black;">
				<thead  >
					<tr style="border: 1px solid black;">
						<th>Product Name</th>
						<th>On Stock</th>
						<th>Reserved</th>
						<th></th>
					</tr>
				</thead>
				
				<tr style="border: 1px solid black;">
					<td>{{ $p->product_name }}</td>			
					<td>{{ $p->transaction->where('type', 'po')->sum('qty') - $p->transaction->where('type', 'so')->sum('qty') - $p->transaction->where('type', 'res')->sum('qty')}}</td>
					<td>{{ $p->transaction->where('type', 'res')->sum('qty')  }}</td>
					<td>
						<div class="btn-group" role="group" aria-label="...">
							
							
							<a  class="btn btn-success btnAddStock" href="#" id="{{$p->id}}" data-toggle="modal" data-target="#addStock"><i class="fas fa-times-circle"></i> Add Stock</a>	
							<a  class="btn btn-primary btnAdjustStock" href="#" id="{{$p->id}}" data-toggle="modal" data-target="#adjustStock"><i class="fas fa-times-circle"></i> Adjust Stock</a>					
						</div>
					</td>
				</tr>
				
		</table>
		</div>
	</div>
</div>
@stop
@section('script')
<script>
$(document).ready(function(){

		$('#btnSubmitStock').click(function(){
			
			$("#addStock").modal('hide');
			$("#confirmStock").modal();
		});


		@if(Session::has('flash_message'))

			//$("#added_stock").modal();
		@endif

		$('.btnAddStock').click(function(){
		
			var product_id = $("<input>")
			   .attr("type", "hidden")
			   .attr("name", "product_id").val({{$p->id}});

			$('#form_add').append(product_id);

			// $('#btnAddStock').attr('href','/addstock/' + $(this).attr('id') + '/addd');
			// $('#btnAddStock').attr('href','/api/product_id/{{$p->id}}/variation/' + $(this).attr('id') + '/addstock');
		});

		$('.btnAdjustStock').click(function(){

			var product_id = $("<input>")
			   .attr("type", "hidden")
			   .attr("name", "product_id").val({{$p->id}});
	
			$('#form_adjust').append(product_id);

			// $('#btnAddStock').attr('href','/addstock/' + $(this).attr('id') + '/addd');
			// $('#btnAddStock').attr('href','/api/product_id/{{$p->id}}/variation/' + $(this).attr('id') + '/addstock');
		});

		$('#btnSubmitAdjustStock').click(function(){


			$('#form_adjust').submit();
			// $('#btnAddStock').attr('href','/addstock/' + $(this).attr('id') + '/addd');
			// $('#btnAddStock').attr('href','/api/product_id/{{$p->id}}/variation/' + $(this).attr('id') + '/addstock');
		});
		
		$('#btnAddStockSubmit').click(function(){


			$('#form_add').submit();
			// $('#btnAddStock').attr('href','/addstock/' + $(this).attr('id') + '/addd');
			// $('#btnAddStock').attr('href','/api/product_id/{{$p->id}}/variation/' + $(this).attr('id') + '/addstock');
		});

	});

</script>
@stop