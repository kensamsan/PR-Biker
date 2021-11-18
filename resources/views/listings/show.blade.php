@extends('template.master')
@section('title', 'Rental Details')
@section('content')
<link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/user.css">
<link rel="icon" href="Images/navbarwhitebike.svg">


<div class="row ms-4">
    <div class="headers col-lg-6 pt-3">
        <h1 class="fst-italic fw-bolder">Rental Tracking</h1>
    </div>
</div>
<div class="container d-flex justify-content-evenly mt-3 mb-5">
    <div class="row my-auto">
        <div class="col-lg-7 listing-container shadow p-4 ms-4 w-100">
      <div class="panel panel-default"  style="width: 100%; margin: auto;">
                <h3 class="title-style">Rental Details <span style="float:right;font-weight:normal;font-size:16px;color:grey;text-decoration:underline">Order id# {{$listing->id}}</span></h3>
                <br>
            <div class="row">
                <div class="col-lg-9">
                    <div class="progressbar-container">
                        <h4>Rental Status:</h4>
                        <ul class="progressbar">
                           {{$listing->status}}
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
            <!--Customer & Address Details-->
            <div class="row no-gutters" id="custadd_det">
                <div class="col-lg-4 p-3">
                    <label> Customer Details</label><br>
                    <small>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</small><br>
                    <small>{{ Auth::user()->email }}</small><br>
                    <small>{{ Auth::user()->contact }}</small>
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
                        @if(Session::get('is_admin')==0 && $x->title=='UPLOADED DEPOSIT SLIP' && $listing->payment_method=='cod')

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
    </div>
</div>

@endsection
