@extends('template.master')
@section('title', 'Rent Date')
@section('content')

<link rel="stylesheet" href="/css/store/checkout.css">

<main>
    <div class="container-fluid pb-5 mb-5">
        <div class="row my-5 px-5">
            <div class="col-lg-9" id="cart-col">
                <h2 class="fw-bold"><b>Rent {{$rental->bike_name}}</b></h4>

                    <!-- Cart with items -->    
               <form method="post" action="{{ route('client-rental-information') }}">
               {{ csrf_field() }}
               <input type="hidden" name="rental_id" value="{{$rental->id}}">
               <div class="col-lg-4">
                    {{ Form::label('dt_from', 'From') }}
                    <input type="date" name="dt_from" class="form-control my-2">
                    <input type="time" name="dt_from_time" class="form-control">
           
                  
                </div>
                  <div class="col-lg-4 mt-4">
                    {{ Form::label('dt_to', 'To') }}
                    <input type="date" name="dt_to" class="form-control my-2">
                    <input type="time" name="dt_to_time" class="form-control">
                </div>
         <!--    <table class="table table-condensed">
                <thead>
                    <tr>
                        <th class="th-lg"></th>
                        <th>Bike Name</th>
                        <th>Bike Unit</th>
                        <th>Price</th>
                    </tr>
                </thead>

                <tbody>
                  
                        <tr>
                            <td>
                            
                                <img src="/uploads/rentals/{{ App\Rentals::find($rental->id)->getProductImage() }}" style="width:100px;height:100px;float:left;padding-right: 0px;margin-right: 15px;object-fit:cover;">
                                <p><strong><a href="/product/{{ App\Rentals::find($rental->id)->first()->id or 0 }}" style="color: #F2B533;">{{ $rental->name }}</a></strong></p>
                            </td>
                            <td>{{ $rental->bike_name }}</td>
                            <td>{{ $rental->bike_unit }}</td>
                            <td>₱ {{ number_format($rental->price,2) }}</td>
                      </tr>


             

                  

                </tbody>
                
                <tfoot>
                
            </table> -->
                <input class="btn-background fw-bold border-0 mt-3 rounded p-2" type="submit" name="CHECKOUT">
     

                </div>
           
            </div>
         
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    @if(Session::has('add_to_cart'))
            Swal.fire({
              title: '<strong>Added to Cart!</strong>',
              type: 'info',
              html:
                'You can go to checkout or proceed to continue shopping',
              showCloseButton: true,
              showCancelButton: true,
              focusConfirm: false,
              confirmButtonText:
                '<i class="fa fa-shopping-cart"></i> checkout!',
              confirmButtonAriaLabel: 'Proceed to Checkout',
              cancelButtonText:
                'Continue Shopping',
              cancelButtonAriaLabel: 'Continue Shopping'
            })
            .then((result) => {
            if (result.value) {
                 window.location.href = "{{Session::get('add_to_cart')}}";
            }
            });
          

    @endif
</script>
@endsection
