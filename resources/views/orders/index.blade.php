@extends('template.master')

@section('content')
<link rel="stylesheet" href="/css/profile.css">
<link rel="icon" href="Images/navbarwhitebike.svg">
<div class="row ms-4">
    <div class="headers col-lg-6 mt-5">
        <h1 class="fst-italic fw-bolder">My Orders</h1>
    </div>
</div>
<div class="container-fluid d-flex justify-content-evenly mt-3 mb-5">
        <div class="col-lg-5 listing-container shadow p-3">
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
</div>

@endsection
