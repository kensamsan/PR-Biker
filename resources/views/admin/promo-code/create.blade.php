@extends('layout.app')
@section('title', 'Product List')
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
<div class="container-fluid">
	<div class="row" style="margin-top:30px;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header d-flex">
				<span class="align-items-center d-flex">
					<i class="fas fa-chevron-left fa-2x"></i>
					<h2 class="margin-left-sm" style="margin:0px;">Add Promo Code</h2>
				</span>					
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default panel-custom">
				<div class="panel-heading">
					
				</div>
				<div class="panel-body" style="padding:0px;">
					{{ Form::open(array('route' => 'admin.promo-codes.store', 'method' => 'store','files'=>true)) }}
					<div class="row">
				<div class="col-lg-11 margin-left margin-bottom margin-top">
					{{ Form::label('code', 'Promo Code') }}
					{{ Form::text('code','',array('class'=>'form-control span6','placeholder' => 'Promo Code')) }}
					<span class="errors" style="color:#FF0000">{{$errors->first('code')}}</span>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-11 margin-left margin-bottom margin-top">
					{{ Form::label('label', 'Label') }}
					<textarea class="form-control" name="label" id="label"></textarea>
				</div>
			</div>	
			<div class="row">
				<div class="col-lg-11 margin-left margin-bottom margin-top">
					{{ Form::label('description', 'Description') }}
					{{ Form::text('description','',array('class'=>'form-control span6','placeholder' => 'description')) }}
					<span class="errors" style="color:#FF0000">{{$errors->first('description')}}</span>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-5 margin-left margin-bottom margin-top">
					{{ Form::label('type', 'Type') }}
					<select class="form-control" name="type">
						<option value="promo">Promo</option>
						<option value="tax">Tax</option>
						<option value="shipping">Shipping</option>
						<option value="sale">Sale</option>
						<option value="misc">Misc</option>						
						<option value="freeshipping">Free Shipping</option>						
						<option value="firstorder">First Order</option>						
					</select>
					<span class="errors" style="color:#FF0000">{{$errors->first('type')}}</span>
				</div>

				<div class="col-lg-6 margin-bottom margin-top">
					{{ Form::label('target', 'Target') }}
					<select class="form-control" name="target">
						<option value="subtotal">Subtotal</option>				
						<option value="total">Total</option>
					</select>
					<span class="errors" style="color:#FF0000">{{$errors->first('target')}}</span>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5 margin-left margin-bottom margin-top">
					{{ Form::label('date_from', 'From') }}
					{{ Form::date('date_from','',array('class'=>'form-control span6','placeholder' => 'From')) }}
					<span class="errors" style="color:#FF0000">{{$errors->first('product_code')}}</span>
				</div>
				<div class="col-lg-6 margin-bottom margin-top">
					{{ Form::label('date_to', 'To') }}
					{{ Form::date('date_to','',array('class'=>'form-control span6','placeholder' => 'To')) }}
					<span class="errors" style="color:#FF0000">{{$errors->first('date_to')}}</span>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5 margin-left margin-bottom margin-top">
					{{ Form::label('value', 'Value') }}
					{{ Form::text('value','',array('class'=>'form-control span6','placeholder' => '+50/-10% etc')) }}
					<span class="errors" style="color:#FF0000">{{$errors->first('value')}}</span>
				</div>
				<div class="col-lg-6 margin-bottom margin-top">
					{{ Form::label('order', 'Order') }}
					{{ Form::number('order','1',array('class'=>'form-control span6','placeholder' => 'Order Applied')) }}
					<span class="errors" style="color:#FF0000">{{$errors->first('order')}}</span>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-5 margin-left margin-bottom margin-top">
					{{ Form::label('discount_type', 'Discount Type') }}
					<select class="form-control" name="discount_type" id="discount_type">
						<option value="all">All</option>
						<option value="over_amount">Orders over Specific Amount</option>
						<option value="category">Specific Category</option>
						<option value="product">Specific Product</option>				
					</select>
					<span class="errors" style="color:#FF0000">{{$errors->first('discount_type')}}</span>
				</div>

				<div class="col-lg-6">
				
					<div id="over_amount" class="dc_type" style="display:none">
						{{ Form::label('over', 'Amount') }}
						{{ Form::number('over','1',array('class'=>'form-control span6','placeholder' => 'Amount')) }}
						<span class="errors" style="color:#FF0000">{{$errors->first('over')}}</span>
					</div>
					<div id="category" class="dc_type" style="display:none">
						{{ Form::label('order', 'Specific Categories') }}
						<br/>
						<a href="#" data-toggle="modal" data-target="#add_category">+ Choose Category</a>
					</div>
					<div id="product" class="dc_type" style="display:none">
						{{ Form::label('order', 'Specific Product') }}
						<br/>
						<a href="#" data-toggle="modal" data-target="#add_product">+ Choose Product</a>
					</div>
					
				</div>
			</div>


			
			
			<div class="row top10">
				<div class="col-lg-4 margin-left margin-bottom margin-top">
					<input type="submit" class="btn btn-primary" value="Submit" />
				</div>
			</div>

			<div id="add_product" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Add Product</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						
						<div class="modal-body">
								<table class="table ng-cloak table-striped">						
									@foreach($product as $x)
									<tr>
										<td><input type="checkbox" name="product_ids[]" value="{{$x->id}}"></td>
										<td class="text-capitalize">{{ $x->product_name }}</td> 
									</tr>

									@endforeach
									
								</table>
						</div>
						<div class="modal-footer">
						</div>

					</div>
				</div>
			</div>


			<div id="add_category" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Add Category</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						
						<div class="modal-body">
								<table class="table ng-cloak table-striped">						
									@foreach($category as $x)
									<tr>
										<td><input type="checkbox" name="category_ids[]" value="{{$x->id}}"></td>
										<td class="text-capitalize">{{ $x->category_name }}</td> 

									</tr>

									@endforeach
									
								</table>
						</div>
						<div class="modal-footer">
						</div>

					</div>
				</div>
			</div>

					</form>
					  @if(Session::has('flash_error'))
                            <div class="alert alert-danger">{{Session::get('flash_error')}}</div>
                        @endif
                        @if($errors->has())
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        @endif
				</div>
			</div>
		</div>
	</div>
	
</div>
@stop
@section('script')
<script>
    $(function() {
        $('#discount_type').change(function(){
            $('.dc_type').hide();
            $('#' + $(this).val()).show();
        });
    });

	// $(document).ready(function() {
	//   $('#description').summernote({
	//   height: 200,

	// 	});

	// });
	
</script>
@stop