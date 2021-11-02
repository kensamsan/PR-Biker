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
        <h1 class="fst-italic fw-bolder">My Listing </h1>
    </div>
</div>
<div class="container d-flex justify-content-evenly mt-3 mb-5">
    <div class="row my-auto">
        <div class="col-lg-7 listing-container shadow p-4 ms-4">
      <div class="panel panel-default"  style="width: 100%; margin: auto;">
                <h3 class="title-style">Order Details <span style="float:right;font-weight:normal;font-size:16px;color:grey;text-decoration:underline">Order id# {{$listing->id}}</span></h3>
                <br>
                
            <div class="row">
                <div class="col-lg-9 text-center">
                    <div class="progressbar-container">
                        <ul class="progressbar">

                            @if($listing->status=='waiting-approval')

                                @if($listing->payment_method<>'paypal'  && $listing->payment_method<>'cod')
                                    <li class="active">Waiting for Payment</li>
                                @endif
                                <li>Processing</li>
                                @if($listing->shipping_type=='courier')
                                <li>Pick-up</li>
                                @endif
                                <li>Shipped</li>
                                <li>Delivered</li>
                            
                            @elseif($listing->status=='waiting')

                                @if($listing->payment_method<>'paypal'  && $listing->payment_method<>'cod')
                                <li class="active">Waiting for Payment</li>
                                @endif
                                @if($listing->shipping_type=='courier')
                                <li>Pick-up</li>
                                @endif
                                <li>Processing</li>
                                <li>Shipped</li>
                                <li>Delivered</li>

                            @elseif($listing->status=='pick-up')

                                @if($listing->payment_method<>'paypal'  && $listing->payment_method<>'cod')
                                <li class="active">Waiting for Payment</li>
                                @endif
                                <li class="active">Processing</li>
                                @if($listing->shipping_type=='courier')
                                <li class="active">Pick-Up</li>
                                @endif
                                <li>Shipped</li>
                                <li>Delivered</li>
                            
                            @elseif($listing->status=='processing')

                                @if($listing->payment_method<>'paypal'  && $listing->payment_method<>'cod')
                                <li class="active">Waiting for Payment</li>
                                @endif
                                <li class="active">Processing</li>
                                @if($listing->shipping_type=='courier')
                                <li class="active">Pick-Up</li>
                                @endif
                                <li>Shipped</li>
                                <li>Delivered</li>

                            @elseif($listing->status=='processing')

                                @if($listing->payment_method<>'paypal'  && $listing->payment_method<>'cod')
                                <li class="active">Waiting for Payment</li>
                                @endif
                                <li class="active">Processing</li>
                                @if($listing->shipping_type=='courier')
                                <li class="active">Pick-Up</li>
                                @endif
                                <li>Shipped</li>
                                <li>Delivered</li>

                            @elseif($listing->status=='ship')

                                @if($listing->payment_method<>'paypal'  && $listing->payment_method<>'cod')
                                <li class="active">Waiting for Payment</li>
                                @endif
                                <li class="active">Processing</li>
                                @if($listing->shipping_type=='courier')
                                <li class="active">Pick-Up</li>
                                @endif
                                <li class="active">Shipped</li>
                                <li>Delivered</li>


                            @elseif($listing->status=='delivered')
                                @if($listing->payment_method<>'paypal'  && $listing->payment_method<>'cod')
                                <li class="active">Waiting for Payment</li>
                                @endif
                                <li class="active">Processing</li>
                                @if($listing->shipping_type=='courier')
                                <li class="active">Pick-Up</li>
                                @endif
                                <li class="active">Shipped</li>
                                <li class="active">Delivered</li>

                                @elseif($listing->status=='cancelled')
                                    @if($listing->payment_method<>'paypal'  && $listing->payment_method<>'cod')
                                    <li class="active">Waiting for Payment</li>
                                    @endif
                                    <li>Processing</li>
                                    @if($listing->shipping_type=='courier')
                                    <li>Pick-Up</li>
                                    @endif
                                    <li>Shipped</li>
                                    <li>Delivered</li>
                                    
                                @endif
                                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 text-right">
                   
                    @if($listing->payment_method=='bank-transfer' && $listing->status=='waiting')
                    <a href="{{ route('order-deposit',$listing->id) }}"><button type="button" class="btn btn-green form-control">Upload Deposit Slip</button></a>
                    @endif
                </div>
            </div>
      
            <hr>
        
            <br>
         

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
                  
                </div>
                <div class="col-lg-4 p-3">
                    <label> Delivery Address</label><br>
                   
                </div>
            </div>
            <!--Method-->
            <div class="row no-gutters" id="method">
                <div class="col-lg-6 p-3" id="method_col">
                    <label> Payment Method</label><br>
                    <p> {{ $listing->payment_method }}</p><br>
                </div>
                <div class="col-lg-6 p-3">
                    <label> Shipping Method</label><br>
                   
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
                    @foreach($rentalLogs as $x)

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
