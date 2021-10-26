<script>window.onload = function() { window.print(); }</script>
<style type="text/css">
	
*,
*:after,
*:before {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
			
.timeline {
  width: 100%;
  height: 100px;
  margin: 0 auto;
  display: flex;      
  justify-content: center;    
}

.timeline .events {
  position: relative;
  background-color: #f6b228;
  height: 3px;
  width: 100%;
  border-radius: 4px;
  margin: 5em 0;
 }

.timeline .events ol {
  margin: 0;
  padding: 0;
  text-align: center;
}

.timeline .events ul {
  list-style: none;
}

.timeline .events ul li {
  display: inline-block;
  width: 20%;
  margin: 0;
  padding: 0;
}

.timeline .events ul li a {
  font-family: 'Arapey', sans-serif;
  font-style: italic;
  font-size: 0.8em;
  color: #606060;
  text-decoration: none;
  position: relative;
  top: -32px;
}

.timeline .events ul li a:after {
  content: '';
  position: absolute;
  bottom: -21px;
  left: 50%;
  right: auto;
  height: 20px;
  width: 20px;
  border-radius: 50%;
  border: 3px solid #f6b228;
  background-color: #fff;
  transition: 0.3s ease;
  transform: translateX(-50%);
}

.timeline .events ul li a:hover::after {
  background-color: #f6b228;
  border-color: #f6b228;
}

.timeline .events ul li a.selected:after {
  background-color: #f6b228;
  border-color: #f6b228;
}
			
.events-content {
  width: 100%;
  height: 100px;
  max-width: 800px;
  margin: 0 auto;
  display: flex;      
  justify-content: left;
}

.events-content li {
  display: none;
  list-style: none;
}

.events-content li.selected {
  display: initial;
}

.events-content li h2 {
  font-family: 'Frank Ruhl Libre', serif;
  font-weight: 500;
  color: #919191;
  font-size: 2.5em;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="panel panel-default"  style="width: 60%; margin: auto;">
	@if(Session::has('flash_message'))
		<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{Session::get('flash_message')}}
		</div>
	@endif

	@if(Session::has('flash_error'))
		<div class="alert alert-danger">{{Session::get('flash_error')}}</div>
	@endif
			
	<div class="panel-body">
		<div class="row">	
				
				<div class="col-md-12">
					@if($order->status=='cancelled')
						<div class="panel panel-danger"  style="width: 100%; margin: auto;">
						<div class="panel-heading" style="padding: 3px 15px">
							<h5>Order id# {{$order->order_id}} </h5>
							
						</div>
					@else
					<div class="panel panel-default"  style="width: 100%; margin: auto;">
						<div class="panel-heading" style="padding: 3px 15px">
							<h5>Order id# {{$order->order_id}} </h5>
							
						</div>
						
					@endif

						<div class="panel-body">
			
							<div class="row">
								<div class="col-md-12">
									<div class="timeline">
										<div class="events">
											<ol>
												<ul>
													@if($order->status=='waiting')

														@if($order->payment_method<>'paypal')
														<li>
															<a href="#0" class="selected" >waiting for payment</a>
														</li>
														@endif
														
														<li>
															<a href="#1"> processing </a>
														</li>
														
														<li>
															<a href="#2">shipped</a>
														</li>
														<li>
															<a href="#3">delivered</a>
														</li>

													@elseif($order->status=='processing')
														@if($order->payment_method<>'paypal')
														<li>
															<a href="#0" class="selected" >waiting for payment</a>
														</li>
														@endif
														<li>
															<a href="#1" class="selected">processing</a>
														</li>
														<li>
															<a href="#2">shipped</a>
														</li>
														<li>
															<a href="#3">delivered</a>
														</li>
													@elseif($order->status=='ship')
														@if($order->payment_method<>'paypal')
														<li>
															<a href="#0" class="selected" >waiting for payment</a>
														</li>
														@endif
														<li>
															<a href="#1" class="selected">processing</a>
														</li>
														
														<li>
															<a href="#2" class="selected">shipped</a>
														</li>
														<li>
															<a href="#3">delivered</a>
														</li>
													@elseif($order->status=='delivered')
														@if($order->payment_method<>'paypal')
														<li>
															<a href="#0" class="selected" >waiting for payment</a>
														</li>
														@endif
														<li>
															<a href="#1" class="selected">processing</a>
														</li>
														
														<li>
															<a href="#2" class="selected">shipped</a>
														</li>
														<li>
															<a href="#3" class="selected">delivered</a>
														</li>
													@elseif($order->status=='cancelled')
														@if($order->payment_method<>'paypal')
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
											$discount = 0;
											$discount_count = 0 ;
										@endphp
										@foreach($orderItems as $x)
										<tr>
											<td>

												<img src="/uploads/products/{{$x->product->getProductImage()}}" style="width:100px;height:150px;float:left;padding-right: 0px;margin-right: 15px;">
											</td>
											<td>												
												<p style="font-size: 1em;"><strong><a href="/products/{{ $x->product->id or 0 }}">{{ $x->product->product_name }}</a></strong></p>
												@foreach($x->discount as $d)
													@php
														$discount_count = $discount_count+1;
														$discount = $discount + $d->promoCode->value;
													@endphp
													<p style="font-size: 0.9em;">{{ $d->description }}</p>
												@endforeach
											</td>
											
												<td>{{ $x->price }}</td>
												<td>{{ $x->qty}}</td>
												<td>{{ $x->price * $x->qty}}</td>
												@php
													$sub = $sub + ($x->price * $x->qty);
												@endphp
										
											
											
											
										</tr>
										@endforeach
										
									</table>

								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<h5>Order Notes</h5>
									<p style="font-size: 0.9em;">{{ $order->notes }}</p>
								</div>
								<div class="col-md-6">
									<table class="table">

									<tr>
										<td>
											<strong>Subtotal</strong>	
										</td>
										<td>
											<strong>PHP {{number_format($sub,2)}}</strong>	
										</td>
									</tr>

									@if($discount_count>0)
										<tr>											
											<td>
												<strong>Discounts</strong>	
																								
											</td>
											<td>
												<strong>PHP {{number_format($discount,2)}}</strong>	
											</td>
										</tr>

									@endif


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
									<p style="font-size: 0.9em;">{{ $user->first_name }} {{ $user->last_name }}</p>
									<p style="font-size: 0.9em;">{{ $user->email }}</p>
									<p style="font-size: 0.9em;">{{ $user->contact }}</p>
								</div>
								<div class="col-md-3">
									<h5><strong>Billing Address</strong></h5>
									<p style="font-size: 0.9em;">{{ $user->first_name }} {{ $user->last_name }}</p>
									<p style="font-size: 0.9em;">{{ $order->address->address }}</p>
									<p style="font-size: 0.9em;">{{ $order->address->city }}</p>
									<p style="font-size: 0.9em;">{{ $order->address->zip }}</p>
									<p style="font-size: 0.9em;">{{ $user->contact }}</p>
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

		</div>
		<br/>
		<div class="panel panel-default"  style="width: 100%; margin: auto;">
			<div class="panel-heading">
				<h3>Order Transactions</h3>			
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table" class="pull-left" style="font-size: 0.9em">
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