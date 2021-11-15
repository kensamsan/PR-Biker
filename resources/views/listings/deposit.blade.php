@extends('template.master')

@section('content')
<link rel="stylesheet" href="/css/profile.css">
<link rel="icon" href="Images/navbarwhitebike.svg">
<style>
    #content {
     display: flex;
     justify-content: center;
     flex-direction: column;
 }
 </style>
<div class="container-fluid d-flex justify-content-center align-items-center mb-5">
    {{-- <div class="row my-auto"> --}}
        <div class="col-lg-5 listing-container shadow p-4 ms-4">
            <h3>Add Deposit Slip</h3>
            <p>Rental # {{$rentals->id}}</p>


            {{ Form::open(array('route' => 'listing-deposit-submit', 'method' => 'store','files'=>true)) }}
            <div class="row">
                <div class="col-lg-12">
                    <input type="hidden" name="order_id" value="{{$rentals->id}}">
                    {!! Form::file('deposit_photo', array('id'=>'deposit_photo')) !!}
                    <span class="errors" style="color:#FF0000">{{$errors->first('employee_photo')}}</span>
                </div>
            </div>
            <br />
            <div class="row top10">
                <div class="col-lg-4">
                    <input type="submit" class="btn btn-success btn-lg" value="Submit"
                        onclick="this.disabled=true;this.value='Submitted, please wait...';this.form.submit();" />
                </div>
            </div>
            {!! Form::close() !!}
            {!! Form::close() !!}
        </div>

        {{-- <div class="col-lg-4 d-flex justify-content-end">
            <div class="profile-card card" id="product-profile">
                <p class="fst-italic fs-5 ms-2 mt-2">Your Profile:</p>
                <img src="/uploads/users/{{Auth::user()->photo}}" class="card-img-top" alt="user's photo">
                <div class="card-body">
                    <p class="card-text fw-bold fst-italic fs-5" id="user-name">{{Auth::user()->first_name}}
                        {{Auth::user()->last_name}}</p>
                    <p class="card-text fw-normal fst-italic" id="user-email">{{Auth::user()->email}}</p>
                    <a class="fw-normal fs-6 fst-italic lead mt-5" href="{{url('settings')}}"><i
                            class="bi bi-gear me-1"></i>Tweak your profile</a>
                    <a class="fw-normal fs-6 fst-italic lead mt-5" href="{{url('my-orders')}}"><i
                            class="bi bi-gear me-1"></i>My Orders</a>
                </div>
            </div>
        </div> --}}
    {{-- </div> --}}
</div>

@endsection