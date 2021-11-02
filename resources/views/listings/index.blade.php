@extends('template.master')
@section('content')
<link rel="stylesheet" href="/css/profile.css">
<div class="row ms-4">
    <div class="headers col-lg-6 mt-5">
        <h1 class="fst-italic fw-bolder">My Listings </h1>
    </div>
</div>
<div class="container-fluid d-flex justify-content-center mt-3 mb-5">
        <div class="col-lg-5 listing-container shadow p-3">
        <table class="table table-hover">
                <tr>
                    <th>Bike Name</th>
                    <th>Bike Unit</th>
                    <th>Ship To</th>
                    <th>Order Status</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                @foreach($listings as $x)
                <tr>
                    <td style="color: black!important">{{ $x->bike_name }}</td>
                    <td style="color: black!important">{{ $x->bike_unit }}</td>
                    <td></td>
                    <td>
                        @if($x->status=='processing')
                            <span class="status proc"></span>Processing
                        @elseif($x->status=='waiting-approval')
                            <span class="status wait"></span>Waiting For Approval
                        @elseif($x->status=='waiting-ship')
                            <span class="status wait"></span>Waiting For Payment Approval
                        @elseif($x->status=='waiting')
                            <span class="status wait"></span>Waiting, For Payment
                        @elseif($x->status=='pick-up')
                            <span class="status pick"></span>For pick-up
                        @elseif($x->status=='ship')
                            <span class="status ship"></span>Waiting for Shipment
                        @elseif($x->status=='delivered')
                            <span class="status delivered"></span>Delivered
                        @elseif($x->status=='cancelled')
                            <span class="status cancel"></span>Cancelled
                        @elseif($x->status=='posted')
                            <span class="status cancel"></span>Posted
                        @elseif($x->status=='in-transit')
                            <span class="status cancel"></span>In Transit
                        @endif
                    </td>
                    <td>₱ {{ number_format($x->price,2) }}</td>
                    <td>
                        @if($x->status=='ship')
                            <a href="{{ route('listing-ship',$x->id) }}"><button type="button" class="btn btn-green form-control">SHIP NOW</button></a>
                        @endif
                    </td>
                </tr>
                @endforeach
                
            </table>
             <div style="text-align: center">
              {{ $listings->links() }}
            </div>
            
            
        </div>
<!-- 
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
        </div> -->
</div>

@endsection
