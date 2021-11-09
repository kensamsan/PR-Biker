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


<div class="modal fade" tabindex="-1" role="dialog" id="confirm_cancel">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title">Cancel Order</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body">
	  	{{ Form::open(array('route' => ['admin.order.cancel',$rental->id], 'method' => 'store','files'=>true)) }}
		<p>Are you sure you want to Cancel this Order?</p>
		<input type="hidden" name="order_id" value="{{$rental->id}}">
		<div class="row">
			<div class="col-lg-12">
				{{ Form::label('note', 'Note') }}
				{{ Form::text('note','',array('class'=>'form-control span6','placeholder' => 'Note')) }}
				<span class="errors" style="color:#FF0000">{{$errors->first('note')}}</span>
			</div>
		</div>

	  </div>
	  <div class="modal-footer">
		<a href="#"><button type="submit" class="btn btn-primary">Cancel Order</button></a>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	  </div>
	  {{ Form::close() }}
	</div>
  </div>
</div>



<div class="modal fade" id="courier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Courier Info</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body">
		{{ Form::open(array('route' => ['admin.order.ship',$rental->id], 'method' => 'store','files'=>true)) }}
		<input type="hidden" name="order_id" value="{{$rental->id}}">
		<div class="row">
			<div class="col-lg-12">
				{{ Form::label('courier', 'Courier') }}
				{{ Form::text('courier','',array('class'=>'form-control span6','placeholder' => 'Courier')) }}
				<span class="errors" style="color:#FF0000">{{$errors->first('courier')}}</span>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				{{ Form::label('tracking', 'Tracking #') }}
				{{ Form::text('tracking','',array('class'=>'form-control span6','placeholder' => 'tracking')) }}
				<span class="errors" style="color:#FF0000">{{$errors->first('tracking')}}</span>
			</div>
		</div>

	 
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	  </div>
		{{ Form::close() }}
	</div>
  </div>
</div>


<div class="modal fade" id="recourier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Courier Info</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body">
		{{ Form::open(array('route' => ['admin.order.reship',$rental->id], 'method' => 'store','files'=>true)) }}
		<input type="hidden" name="order_id" value="{{$rental->id}}">
		<div class="row">
			<div class="col-lg-12">
				{{ Form::label('courier', 'Courier') }}
				{{ Form::text('courier','',array('class'=>'form-control span6','placeholder' => 'Courier')) }}
				<span class="errors" style="color:#FF0000">{{$errors->first('courier')}}</span>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				{{ Form::label('tracking', 'Tracking #') }}
				{{ Form::text('tracking','',array('class'=>'form-control span6','placeholder' => 'tracking')) }}
				<span class="errors" style="color:#FF0000">{{$errors->first('tracking')}}</span>
			</div>
		</div>

	 
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	  </div>
		{{ Form::close() }}
	</div>
  </div>
</div>
<br/>
<br/>
<br/>
<br/>
 <div class="container-fluid text-center my-5">
        <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @foreach($rental->rentalImage as $x)
                     <div class="carousel-item @if($rental->rentalImage->first()->id==$x->id) active @endif">
                        <div class="col-lg-3 col-md-3 px-2">
                            <div class="card">
                                <div class="card-img"
                                    style="background: url('{{ asset("uploads/rentals/".$x->file_name) }}') no-repeat center; background-size: cover; height: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach                 
                </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>

<div class="container-fluid">
	<div class="container-fluid">


	  <div class="panel panel-default"  style="width: 100%; margin: auto;">
		<div class="panel-heading">
			<h3>Rental #{{ $rental->id }}</h3>			
		</div>
		<div class="panel-body">
		
			

			<div class="row">
				<div class="col-md-6">
					<h5><strong>Bike Name</strong></h5>
					<p style="font-size: 0.9em;">{{ $rental->bike_name }}</p>
					<h5><strong>Bike Unit</strong></h5>
					<p style="font-size: 0.9em;">{{ $rental->bike_unit }}</p>
					<h5><strong>Price</strong></h5>
					<p style="font-size: 0.9em;">{{ $rental->price }}</p>
					<h5><strong>Description</strong></h5>
					<p style="font-size: 0.9em;">{{ $rental->description }}</p>
				</div>
				<div class="col-md-6">
					<h5><strong>Rentee Name</strong></h5>
					<p style="font-size: 0.9em;">{{ $rental->user->first_name }} {{ $rental->user->middle_name }} {{ $rental->user->last_name }}</p>
					<h5><strong>Rentee Address</strong></h5>
					<p style="font-size: 0.9em;">{{ $rental->user->getBillingAddress() }}</p>
				
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