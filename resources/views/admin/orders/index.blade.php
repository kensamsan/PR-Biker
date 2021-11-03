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
	.margin-left {
		margin-left: 2rem!important;
	}
</style>
@stop
@section('content')

<div id="confirmationGrade" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Cancel Order</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

				<Form action=" {{ route('order-cancel') }} " method="get">

					<div class="modal-body">
						<p>Are you sure you want to Cancel this Order?</p>
						<p><b>Note</b></p>
						<input type="text" name="content" id="content" placeholder="Note" class="form-control">
						<input type="hidden" id="orderID" name="orderID">
					</div>
	
					<div class="modal-footer">
						<input type="submit" value="Submit" class="btn btn-primary">
						{{-- <a href="#" id="btnDeleteGrade" class="btn btn-primary">Cancel Order</a> --}}
						<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
					</div>

				</Form>


		</div>
	</div>
</div>


<div class="container-fluid">
	<div class="row" style="margin-top: 30px";>
		<div class="col-lg-12">
			<div class="page-header">				
				<h2>Orders</h2> <small></small>
			</div>
			@if(Session::has('flash_message'))
				<div class="alert alert-success">{{Session::get('flash_message')}}</div>
			@endif

			@if(Session::has('flash_error'))
				<div class="alert alert-danger">{{Session::get('flash_error')}}</div>
			@endif
		</div>
	</div>
	{{-- <div class="row">
		{{ Form::open(array('route' => 'admin.orders.index', 'method' => 'get')) }} 
		
		<div class="col-md-4">
		
			<div class="input-group" >
				{{ Form::text('search','',array('class'=>'form-control span6','placeholder' => 'Search', 'style'=>'height:35px')) }}
			
		
				<span class="input-group-btn">
					<select class="form-control margin-left" name="type">
						<option value="all" @if($type=='all') selected @endif>All</option>
						<option value="processing" @if($type=='processing') selected @endif>processing</option>
						<option value="pick-up" @if($type=='pick-up') selected @endif>pick-up</option>
						<option value="ship" @if($type=='ship') selected @endif>shipped</option>
						<option value="delivered" @if($type=='delivered') selected @endif>delivered</option>
						<option value="waiting" @if($type=='waiting') selected @endif>waiting for paymeent</option>
						<option value="waiting-approval" @if($type=='waiting-approval') selected @endif>waiting for approval</option>
						<option value="paid" @if($type=='paid') selected @endif>paid</option>
						<option value="unpaid" @if($type=='unpaid') selected @endif>unpaid</option>
						
					</select>
					{{ Form::button('Search <i class="fa fa-search"></i>', array('class'=>'btn btn-primary btn-search-member' ,'type' => 'submit', 'style' => 'height: 35px')) }}
				</span>
			</div>
	    </div>	    
	
		{{ Form::close() }}
	</div> --}}
	{{-- <div class="row">
		<div class="col-lg-12">
			
			<ol class="breadcrumb">
				<li class="active">
					<i class="fa fa-shopping-basket"></i> Product List
				</li>
			</ol>
			
		</div>
	</div> --}}

	<div class="row">
		
		<div class="col-lg-12">
			<div class="panel panel-default panel-custom">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-3">
							<div class="form-group">
						        <div class="input-group">
						        	<form method="get" action="{{ route('admin-products.index',['products']) }}">
							        	{{csrf_field()}}
							            <input type="text" class="form-control" placeholder="Search for..." name="search" value="{{ Request::get('search') }}">
							            	<input type="submit" name="" value="submit" class="btn btn-primary btn-admin-submit"> 
							            </span>
						            </form>
						        </div>
							</div>
					    </div>
						<div class="col-lg-2">
							<a class="btn btn-success addBtn" href="{{route('admin-products.create')}}">
								<i class="fa fa-plus-circle"></i> Add Product
							</a>
						</div>
					</div>
				</div>
				<div class="panel-body" style="padding:0px;">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Order #</th>
									<th>Date</th>
									<th>Customer</th>
									<th>Shipping</th>
									<th>Method</th>
									<th>payment</th>
									<th>Status</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>
							@foreach ($orders as $x)
							<tr>
								<td>{{ $x->order_id }}</td>
								<td>{{ Carbon\Carbon::parse($x->created_at)->toDateString() }}</td>
								<td>{{ $x->user->first_name }} {{ $x->user->last_name }}</td>
								<td>{{ $x->shipping_type }}</td>

								<td>{{ $x->payment_method }}</td>
								<td>{{ $x->payment_status }}</td>
								<td>
									@if($x->status=='processing')
										<span class="label label-default">Processing</span>
									@elseif($x->status=='waiting-approval')
										<span class="label label-warning">Waiting For Approval</span>
									@elseif($x->status=='waiting')
										<span class="label label-warning">Waiting For Payment</span>
									@elseif($x->status=='pick-up')
										<span class="label label-info">For pick-up</span>
									@elseif($x->status=='ship')
										<span class="label label-primary">Shipped</span>
									@elseif($x->status=='delivered')
										<span class="label label-success">Delivered</span>
									@elseif($x->status=='cancelled')
										<span class="label label-danger">Cancelled</span>
									@endif

								</td>
								<td>{{ number_format($x->total,2) }}</td>
								
								<td>
									<div class="btn-group" role="group" aria-label="...">
										<a  class="btn btn-default " href="{{ route('admin.orders.show',$x->id) }}"><i class="fas fa-pencil-alt"></i> View</a>
										<a  class="btn btn-danger btnDeleteGrade" href="#" id="delete_order" data-orderID="{{ $x->id }}" @if($x->status != 'cancelled') data-toggle="modal" data-target="#confirmationGrade" @endif @if( $x->status =='cancelled') disabled @endif>Cancel Order</a>					
									</div>
								</td>
							</tr>
							@endforeach 
					</table>
					<div style="text-align: center">

						{{ $orders->appends(['search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" )])->links() }}
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
		$(document).on('click','#delete_order',function(){
    	var orderID =$(this).attr('data-orderID');
    	$('#orderID').val(orderID); 
	});
</script>
@stop