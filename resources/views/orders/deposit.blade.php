@extends('template.master')
@section('content')
{{-- <link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/user.css"> --}}
<link rel="icon" href="Images/navbarwhitebike.svg">
<div class="container-fluid">
</div>

<div class="row ms-4">
    <div class="headers col-lg-6 pt-3">
        <h1 class="fst-italic fw-bolder">My Orders</h1>
    </div>
</div>
<div class="container d-flex mt-3 mb-5">
    <div class="row justify-content-center mx-auto">
        <div class="col-lg-7 listing-container shadow p-4 ms-4 w-100">
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
    </div>
</div>

@endsection
