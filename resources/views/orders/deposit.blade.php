@extends('template.user')

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
          <h3>Add Deposit Slip</h3>       
            <p>Orders # {{$order->order_id}}</p>
        

                            {{ Form::open(array('route' => 'order-deposit-submit', 'method' => 'store','files'=>true)) }}
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="order_id" value="{{$order->id}}">
                                    {!! Form::file('deposit_photo', array('id'=>'deposit_photo')) !!} 
                                <span class="errors" style="color:#FF0000">{{$errors->first('employee_photo')}}</span>      
                                </div>
                            </div>
                            <br/>
                            <div class="row top10">
                                <div class="col-lg-4">
                                    <input type="submit" class="btn btn-success btn-lg" value="Submit" onclick="this.disabled=true;this.value='Submitted, please wait...';this.form.submit();" />
                                </div>
                            </div>
                            {!! Form::close() !!}

            
            
        

            {!! Form::close() !!}
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