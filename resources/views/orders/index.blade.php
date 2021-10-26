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
        <table class="table table-hover">
                <tr>
                    <th>Order #</th>
                    <th>Date</th>
                    <th>Ship To</th>
                    <th>Order Status</th>
                    <th>Order Total</th>
                    <th></th>
                </tr>
                @foreach($user_orders as $x)
                <tr>
                    <td style="color: black!important">{{ $x->order_id }}</td>
                    <td>{{ \Carbon\Carbon::parse($x->created_at)->toDateString() }}</td>
                    <td>{{ $x->address->address }}</td>
                    <td>
                        @if($x->status=='processing')
                            <span class="status proc"></span>Processing
                        @elseif($x->status=='waiting-approval')
                            <span class="status wait"></span>Waiting For Approval
                        @elseif($x->status=='waiting')
                            <span class="status wait"></span>Waiting For Payment
                        @elseif($x->status=='pick-up')
                            <span class="status pick"></span>For pick-up
                        @elseif($x->status=='ship')
                            <span class="status ship"></span>Shipped
                        @elseif($x->status=='delivered')
                            <span class="status delivered"></span>Delivered
                        @elseif($x->status=='cancelled')
                            <span class="status cancel"></span>Cancelled
                        @endif
                    </td>
                    <td>₱ {{ number_format($x->total,2) }}</td>
                    <td><a href="{{ route('account.order.show',[Auth::user()->id,$x->id]) }}"><button  class="btn btn-details form-control">View</button></a></td>
                </tr>
                @endforeach
                
            </table>
             <div style="text-align: center">
              {{ $user_orders->links() }}
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
