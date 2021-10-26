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
	  	{{ Form::open(array('route' => ['admin.order.cancel',$order->id], 'method' => 'store','files'=>true)) }}
		<p>Are you sure you want to Cancel this Order?</p>
		<input type="hidden" name="order_id" value="{{$order->id}}">
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
		{{ Form::open(array('route' => ['admin.order.ship',$order->id], 'method' => 'store','files'=>true)) }}
		<input type="hidden" name="order_id" value="{{$order->id}}">
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
		{{ Form::open(array('route' => ['admin.order.reship',$order->id], 'method' => 'store','files'=>true)) }}
		<input type="hidden" name="order_id" value="{{$order->id}}">
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

<div class="container-fluid">
	<div class="container-fluid">


	  <div class="panel panel-default"  style="width: 100%; margin: auto;">
		<div class="panel-heading">
			<h3>Order #{{ $order->order_id }}</h3>			
		</div>
		<div class="panel-body">
			<div class="btn-group pull-right">
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
					<span class="caret"></span></button>
					<ul class="dropdown-menu">
						@if($order->status=='waiting-approval')
							<li><a href="{{ route('admin.order.action',[$order->id,'approve']) }}">Approve</a></li>
							<li><a href="{{ route('admin.order.action',[$order->id,'retake']) }}">Retake</a></li>
						@elseif($order->status=='waiting')
							@if($order->shipping_type=='courier')
								<!-- <li><a href="{{ route('admin.order.action',[$order->id,'pickup']) }}">PickUp</a></li> -->
							@endif

						@elseif($order->status=='processing')
							@if($order->shipping_type=='courier')
								<li><a href="{{ route('admin.order.action',[$order->id,'pickup']) }}">PickUp</a></li>
							@else
								<li><a href="#" data-toggle="modal" data-target="#courier">Ship</a></li>
							@endif
							
							<!-- <li><a href="{{ route('admin.order.action',[$order->id,'ship']) }}">Ship</a></li> -->
						@elseif($order->status=='pick-up')
							<li><a href="#" data-toggle="modal" data-target="#courier">Ship</a></li>
						@elseif($order->status=='ship')
							<!-- <li><a href="{{ route('admin.order.action',[$order->id,'reship']) }}">Re Ship</a></li> -->
							<li><a href="#" data-toggle="modal" data-target="#recourier">Re Ship</a></li>

							<li><a href="{{ route('admin.order.action',[$order->id,'delivered']) }}">Delivered</a></li>
						@elseif($order->status=='delivered')
							<li><a href="{{ route('admin-order-deposit',$order->id) }}">Upload Receipt</a></li>

						@elseif($order->status=='cancelled')
						@endif

						

						<li><a href="{{ route('order-print',$order->id) }}" target="_blank">Print</a></li>
						<!-- <li><a href="{{ route('admin.order.action',[$order->id,'cancelled']) }}">Cancel</a></li> -->
						<li><a href="" data-toggle="modal" data-target="#confirm_cancel">Cancel</a></li>
					</ul>
				</div> 
		
			</div>
			<div class="timeline">
				<div class="events">
					<ol>
						<ul>
							@if($order->status=='waiting')

								@if($order->payment_method<>'paypal' && $order->payment_method<>'cod')
								<li>
									<a href="#0" class="selected" >waiting for payment</a>
								</li>
								@endif
								<li>
									<a href="#1"> processing </a>
								</li>
								@if($order->shipping_type=='courier')
								<li>
									<a href="#2">for pickup</a>
								</li>
								@endif
								
								
								<li>
									<a href="#2">shipped</a>
								</li>
								<li>
									<a href="#3">delivered</a>
								</li>

							@elseif($order->status=='waiting-approval')
								@if($order->payment_method<>'paypal' && $order->payment_method<>'cod')
								<li>
									<a href="#0" class="selected" >waiting for payment</a>
								</li>
								@endif
								<li>
									<a href="#1"> processing </a>
								</li>
								@if($order->shipping_type=='courier')
								<li>
									<a href="#2">for pickup</a>
								</li>
								@endif
								
								<li>
									<a href="#2">shipped</a>
								</li>
								<li>
									<a href="#3">delivered</a>
								</li>

							@elseif($order->status=='processing')

								@if($order->payment_method<>'paypal' && $order->payment_method<>'cod')
								<li>
									<a href="#0" class="selected" >waiting for payment</a>
								</li>
								@endif
								<li>
									<a href="#1" class="selected">processing</a>
								</li>
								@if($order->shipping_type=='courier')
								<li>
									<a href="#2">for pickup</a>
								</li>
								@endif
								<li>
									<a href="#2">shipped</a>
								</li>
								<li>
									<a href="#3">delivered</a>
								</li>

							@elseif($order->status=='pick-up')

								@if($order->payment_method<>'paypal' && $order->payment_method<>'cod')
								<li>
									<a href="#0" class="selected" >waiting for payment</a>
								</li>
								@endif
								<li>
									<a href="#1" class="selected">processing</a>
								</li>
								@if($order->shipping_type=='courier')
								<li>
									<a href="#2" class="selected">for pickup</a>
								</li>
								@endif
								<li>
									<a href="#2">shipped</a>
								</li>
								<li>
									<a href="#3">delivered</a>
								</li>

							@elseif($order->status=='ship')
								@if($order->payment_method<>'paypal' && $order->payment_method<>'cod')
								<li>
									<a href="#0" class="selected" >waiting for payment</a>
								</li>
								
								@endif
								<li>
									<a href="#1" class="selected">processing</a>
								</li>
								@if($order->shipping_type=='courier')
								<li>
									<a href="#2" class="selected">for pickup</a>
								</li>
								@endif
								<li>
									<a href="#2" class="selected">shipped</a>
								</li>
								<li>
									<a href="#3">delivered</a>
								</li>
							@elseif($order->status=='delivered')
								@if($order->payment_method<>'paypal' && $order->payment_method<>'cod')
								<li>
									<a href="#0" class="selected" >waiting for payment</a>
								</li>
								
								@endif
								<li>
									<a href="#1" class="selected">processing</a>
								</li>
								@if($order->shipping_type=='courier')
								<li>
									<a href="#2" class="selected">for pickup</a>
								</li>
								@endif
								<li>
									<a href="#2" class="selected">shipped</a>
								</li>
								<li>
									<a href="#3" class="selected">delivered</a>
								</li>
							@elseif($order->status=='cancelled')
								@if($order->payment_method<>'paypal' && $order->payment_method<>'cod')
								<li>
									<a href="#0" class="selected" >waiting for payment</a>
								</li>
								@endif
								<li>
									<a href="#1" >processing</a>
								</li>
								
								<li>
									<a href="#2">shipped</a>
								</li>
								<li>
									<a href="#3">delivered</a>
								</li>

							@endif
						</ul>
					</ol>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<tr>
							<th></th>
							<th>Item</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Total</th>
						</tr>
						@php
							$sub = 0;

						@endphp
						@foreach($orderItems as $x)
						<tr style="font-size: 0.7em;">
							<td>

								<img src="/uploads/products/{{$x->product->getProductImage()}}" style="width:70px;height:100px;float:left;padding-right: 0px;margin-right: 15px;">
							</td>
							<td>												
								<p ><strong><a href="/product/{{ $x->product->id or 0 }}">{{ $x->product->product_name }}</a></strong></p>
						
							</td>
							
								<td>{{ number_format($x->price,2) }}</td>
								<td>{{ $x->qty}}</td>
								<td>{{ number_format($x->price * $x->qty,2) }}</td>
								@php
									$sub = $sub + ($x->price * $x->qty);
								@endphp
							
						
						</tr>
						@endforeach
						
					</table>

				</div>
			</div>


			<div class="row">
				<div class="col-md-4">
					<h5>Order Notes</h5>
					<p style="font-size: 0.9em;">{{ $order->notes }}</p>
				</div>
				<div class="col-md-8">
					<table class="table">

					<tr>
						<td>
							<strong>Subtotal</strong>	
						</td>
						<td width="150px">
							<strong>PHP {{number_format($sub,2)}}</strong>	
						</td>
					</tr>
					@php
						$orderPromoCount=0;
					@endphp	
					@foreach($orderPromo as $x)
						@if($x->promo_code_id==null)
						@else
							@if($x->promoCode->type=='shipping' or $x->promoCode->type=='freeshipping')
							@else
								@php
								$orderPromoCount=$orderPromoCount+1;
								@endphp
							@endif
						@endif

					@endforeach

					@if($orderPromoCount>0)
					<tr>
						<td>
							<strong>Promo</strong>	
						</td>
						<td>
							<strong>&nbsp;</strong>	
						</td>
					</tr>

					@endif
					@foreach($orderPromo as $x)
						@if($x->promo_code_id==null)
						<tr>											
							<td>
								<strong>COD</strong>	
								
								
							</td>
							<td>
								<strong>PHP 40</strong>	
							</td>
						</tr>
						@else
						@if($x->promoCode->type=='shipping')
						<tr>											
							<td>
								
									<strong>{{$x->promoCode->description}}</strong>	
								
									<!-- <strong>{{$x->promoCode->value}}</strong>	 -->
								
								
							</td>
							<td>
								<strong>PHP {{$x->promoCode->value}}</strong>	
							</td>
						</tr>
						@else
						<tr>											
							<td>
								
									<strong>{{$x->promoCode->description}}</strong>		
								
								
							</td>
							<td>
								<strong>PHP {{$x->promoCode->value}}</strong>	
							</td>
						</tr>
						@endif
						
						@endif
					@endforeach

					
					
					<tr>
						<td>
							<strong>Total</strong>	
						</td>
						<td>
							<strong>PHP {{number_format($order->total,2)}}</strong>	
						</td>
					</tr>

					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<h5><strong>Customer Details</strong></h5>
					<p style="font-size: 0.9em;">{{ $customer->first_name }} {{ $customer->last_name }}</p>
					<p style="font-size: 0.9em;">{{ $customer->email }}</p>
					<p style="font-size: 0.9em;">{{ $customer->contact }}</p>
				</div>
				<div class="col-md-3">
					<h5><strong>Billing Address</strong></h5>
					<p style="font-size: 0.9em;">{{ $customer->first_name }} {{ $customer->last_name }}</p>
					<p style="font-size: 0.9em;">{{ $order->address->address }}</p>
					<p style="font-size: 0.9em;">{{ $order->address->city }}</p>
					<p style="font-size: 0.9em;">{{ $order->address->zip }}</p>
					<p style="font-size: 0.9em;">{{ $customer->contact }}</p>
				</div>
				<div class="col-md-3">
					<h5><strong>Delivery Address:</strong></h5>
					<p style="font-size: 0.9em;">{{ $order->address->first_name }} {{ $order->address->last_name }}</p>
					<p style="font-size: 0.9em;">{{ $order->address->address }}</p>
					<p style="font-size: 0.9em;">{{ $order->address->city }} </p>
					<p style="font-size: 0.9em;">{{ $order->address->region }}</p>
					<p style="font-size: 0.9em;">{{ $order->address->contact }}</p>
					<p style="font-size: 0.9em;">Landmark : {{ $order->address->landmark }}</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<h5><strong>Payment Method</strong></h5>
					<p style="font-size: 0.9em;">{{ $order->payment_method }}</p>
				</div>
				<div class="col-md-6">
					<h5><strong>Shipping Method</strong></h5>
					<p style="font-size: 0.9em;">{{ $order->shipping_type }}</p>
					
				</div>
			</div>


	
		</div>
		</div>
	  </div>

	  <div class="panel panel-default"  style="width: 100%; margin: auto;">
			<div class="panel-heading">
				<h3>Order Transactions</h3>			
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table" style="font-size: 0.9em;">
							@foreach($orderLogs as $x)
							<tr>
								<td style="width: 20%">{{ Carbon\Carbon::parse($x->created_at)->toDayDateTimeString() }}</td>
								<td style="left:0">{!! $x->content !!}</td>
							</tr>
							@endforeach
						</table>
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