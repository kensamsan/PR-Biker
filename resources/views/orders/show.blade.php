@extends('template.master')

@section('content')
<link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/user.css">
<link rel="icon" href="Images/navbarwhitebike.svg">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 mt-3">
            <img class="img-fluid" src="/images/navbarlogo.svg" alt="logo">
        </div>
        <div class="col-lg-4 col-6 mt-2">
            <div class="headers fs-1 fst-italic lead" id="user-settings">YOUR PROFILE</div>
        </div>
    </div>
    <hr>
</div>

<div class="row ms-4">
    <div class="headers col-lg-6 pt-3">
        <h1 class="fst-italic fw-bolder">My Orders </h1>
    </div>
</div>
<div class="container d-flex justify-content-evenly mt-3 mb-5">
    <div class="row my-auto">
        <div class="col-lg-7 listing-container shadow p-4 ms-4">
      <div class="panel panel-default"  style="width: 100%; margin: auto;">
                <h3 class="title-style">Order Details <span style="float:right;font-weight:normal;font-size:16px;color:grey;text-decoration:underline">Order id# {{$order->order_id}}</span></h3>
                <br>
                
            <div class="row">
                <div class="col-lg-9 text-center">
                    <div class="progressbar-container">
                        <ul class="progressbar">

                            @if($order->status=='waiting-approval')

                                @if($order->payment_method<>'paypal'  && $order->payment_method<>'cod')
                                    <li class="active">Waiting for Payment</li>
                                @endif
                                <li>Processing</li>
                                @if($order->shipping_type=='courier')
                                <li>Pick-up</li>
                                @endif
                                <li>Shipped</li>
                                <li>Delivered</li>
                            
                            @elseif($order->status=='waiting')

                                @if($order->payment_method<>'paypal'  && $order->payment_method<>'cod')
                                <li class="active">Waiting for Payment</li>
                                @endif
                                @if($order->shipping_type=='courier')
                                <li>Pick-up</li>
                                @endif
                                <li>Processing</li>
                                <li>Shipped</li>
                                <li>Delivered</li>

                            @elseif($order->status=='pick-up')

                                @if($order->payment_method<>'paypal'  && $order->payment_method<>'cod')
                                <li class="active">Waiting for Payment</li>
                                @endif
                                <li class="active">Processing</li>
                                @if($order->shipping_type=='courier')
                                <li class="active">Pick-Up</li>
                                @endif
                                <li>Shipped</li>
                                <li>Delivered</li>
                            
                            @elseif($order->status=='processing')

                                @if($order->payment_method<>'paypal'  && $order->payment_method<>'cod')
                                <li class="active">Waiting for Payment</li>
                                @endif
                                <li class="active">Processing</li>
                                @if($order->shipping_type=='courier')
                                <li class="active">Pick-Up</li>
                                @endif
                                <li>Shipped</li>
                                <li>Delivered</li>

                            @elseif($order->status=='processing')

                                @if($order->payment_method<>'paypal'  && $order->payment_method<>'cod')
                                <li class="active">Waiting for Payment</li>
                                @endif
                                <li class="active">Processing</li>
                                @if($order->shipping_type=='courier')
                                <li class="active">Pick-Up</li>
                                @endif
                                <li>Shipped</li>
                                <li>Delivered</li>

                            @elseif($order->status=='ship')

                                @if($order->payment_method<>'paypal'  && $order->payment_method<>'cod')
                                <li class="active">Waiting for Payment</li>
                                @endif
                                <li class="active">Processing</li>
                                @if($order->shipping_type=='courier')
                                <li class="active">Pick-Up</li>
                                @endif
                                <li class="active">Shipped</li>
                                <li>Delivered</li>


                            @elseif($order->status=='delivered')
                                @if($order->payment_method<>'paypal'  && $order->payment_method<>'cod')
                                <li class="active">Waiting for Payment</li>
                                @endif
                                <li class="active">Processing</li>
                                @if($order->shipping_type=='courier')
                                <li class="active">Pick-Up</li>
                                @endif
                                <li class="active">Shipped</li>
                                <li class="active">Delivered</li>

                                @elseif($order->status=='cancelled')
                                    @if($order->payment_method<>'paypal'  && $order->payment_method<>'cod')
                                    <li class="active">Waiting for Payment</li>
                                    @endif
                                    <li>Processing</li>
                                    @if($order->shipping_type=='courier')
                                    <li>Pick-Up</li>
                                    @endif
                                    <li>Shipped</li>
                                    <li>Delivered</li>
                                    
                                @endif
                                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 text-right">
                    {{-- <a href="{{ route('order-print',$order->id) }}"><button type="button" class="btn btn-whtout form-control">Print</button></a> --}}
                    {{-- @if($order->status!='cancelled' && $order->status<>'delivered')
                    <!-- <a href="{{ route('order-cancel',$order->id) }}"  style="color:#000;" class="btn btn-default btn-sm confirmationCancel"  >Cancel</a> -->
                    @endif --}}
                    @if($order->payment_method=='bank-transfer' && $order->status=='waiting')
                    <a href="{{ route('order-deposit',$order->id) }}"><button type="button" class="btn btn-green form-control">Upload Deposit Slip</button></a>
                    @endif
                </div>
            </div>
            <br>
            
            <!--Order Table-->
            <table class="table" id="wishlist">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Product Details</th>
                        <th scope="col">Price</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sub = 0;
                        $discount = 0;
                        $discount_count = 0 ;
                    @endphp
                    @foreach($orderItems as $x)
                    <tr>
                        <td>
                            <img src="/uploads/products/{{$x->product->getProductImage()}}" style="width:70px;height:100px;float:left;padding-right: 0px;margin-right: 15px;">
                        </td>
                        <td>
                            <p ><strong><a href="/product/{{ $x->product->id or 0 }}">{{ $x->product->product_name }}</a></strong></p>
                            @foreach($x->discount as $d)
                                @php
                                    $discount_count = $discount_count+1;
                                    $discount = $discount + $d->promoCode->value;
                                @endphp
                                <p style="font-size: 0.9em;">{{ $d->description }}</p>
                            @endforeach
                        </td>
                      
                           <td>{{ number_format($x->price,2) }}</td>
                            <td>{{ $x->qty}}</td>
                            <td>{{ number_format($x->price * $x->qty,2) }}</td>
                            @php
                               $sub = $sub + ($x->price * $x->qty);
                            @endphp
                      
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <!--Order Notes-->
            <div class="row no-gutters" id="order_notes">
                <div class="col-lg-6">
                    <label>Order Notes:</label>
                    <br>
                    <p>{{ $order->notes }}</p>
                </div>
                <div class="col-lg-6">  
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
                    <div class="row">
                        <div class="col-8">Promo</div>
                        <div class="col text-right">&nbsp;</div>
                    </div>
                    @endif
                
                    @foreach($orderPromo as $x)
                        @if($x->promo_code_id==null)
                        <div class="row">
                            <div class="col-8">COD</div>
                            <div class="col text-right">₱ 40</div>
                        </div>
                        @else
                            @if($x->promoCode->type=='shipping')
                            <div class="row">
                                <div class="col-8">{{$x->promoCode->description}}</div>
                                <div class="col text-right">₱ {{$x->promoCode->value}}</div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-8">{{$x->promoCode->description}}</div>
                                <div class="col text-right">₱ {{$x->promoCode->value}}</div>
                            </div>
                            @endif
                        @endif
                    @endforeach
                    <br>
                    <div class="row">
                        <div class="col"><label>Subtotal:</label></div>
                        <div class="col text-right">₱ {{number_format($sub,2)}}</div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col"><label>Total</label></div>
                        <div class="col text-right">₱ {{number_format($order->total,2)}}</div>
                    </div>

                </div>
            </div>
            <br>
            {{-- <div class="row">
                <div class="col-md-4">
                    <h5>Order Notes</h5>
                    <p style="font-size: 0.9em;"></p>
                </div>
                <div class="col-md-8">
                    <table class="table">

                    <tr>
                        <td>
                            <strong>Subtotal</strong>   
                        </td>
                        <td width="150px">
                            <strong>PHP </strong>   
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
                                
                                    <strong>{{$x->promoCode->value}}</strong>   
                                
                                
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
            </div> --}}

            <!--Customer & Address Details-->
            <div class="row no-gutters" id="custadd_det">
                <div class="col-lg-4 p-3">
                    <label> Customer Details</label><br>
                    <small>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</small><br>
                    <small>{{ Auth::user()->email }}</small><br>
                    <small>{{ Auth::user()->contact }}</small>
                </div>
                <div class="col-lg-4 p-3" id="mid_col">
                    <label> Billing Address</label><br>
                    <small>{{ $order->address->address }}, {{ $order->address->city }},{{ $order->address->zip }}</small><br>
                </div>
                <div class="col-lg-4 p-3">
                    <label> Delivery Address</label><br>
                    <small>{{ $order->address->first_name }} {{ $order->address->last_name }}, {{ $order->address->address }}, {{ $order->address->city }}
                        <br>{{ $order->address->contact }}
                        <br>Landmark : {{ $order->address->landmark }}
                    </small><br>
                </div>
            </div>
            <!--Method-->
            <div class="row no-gutters" id="method">
                <div class="col-lg-6 p-3" id="method_col">
                    <label> Payment Method</label><br>
                    <p> {{ $order->payment_method }}</p><br>
                </div>
                <div class="col-lg-6 p-3">
                    <label> Shipping Method</label><br>
                    @if($x->promo_code_id==null)
                    <p>COD</p><br>
                    @else
                    <p>{{ $order->shipping->description }}</p><br>
                    @endif
                </div>
            </div>
            <br>

            <!--Order Transactions-->
            <label>Order Transactions</label>
            <table class="table" id="o_transactions">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderLogs as $x)

                        @if(Session::get('is_admin')==0 && $x->title=='UPLOADED DEPOSIT SLIP' && $order->payment_method=='cod')

                        @else
                        <tr>
                            <td>{{ Carbon\Carbon::parse($x->created_at)->toDayDateTimeString() }}</td>
                            <td>{!! $x->content !!}</td>
                        </tr>
                        @endif

                    @endforeach

                </tbody>
            </table>

        </div>
        </div>

        <div class="col-lg-4 d-flex justify-content-end">
            <div class="col-lg-9 me-5">
                <div class="profile-card card" id="product-profile">
                    <p class="fst-italic fs-5 ms-2 mt-2">Your Profile:</p>
                    <img src="/uploads/users/{{Auth::user()->photo}}" class="card-img-top" alt="user's photo">
                    <div class="card-body">
                        <p class="card-text fw-bold fst-italic fs-5" id="user-name">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                        <p class="card-text fw-normal fst-italic" id="user-email">{{Auth::user()->email}}</p>
                        <a class="fw-normal fs-6 fst-italic lead mt-5" href="{{url('settings')}}"><i class="bi bi-gear me-1"></i>Tweak your profile</a>
                        <a class="fw-normal fs-6 fst-italic lead mt-5" href="{{url('my-orders')}}"><i class="bi bi-gear me-1"></i>My Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
