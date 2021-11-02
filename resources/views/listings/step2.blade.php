@extends('template.master')
@section('content')

<link rel="stylesheet" href="/css/store/checkout.css">

<main>
    <div class="container-fluid pb-5 mb-5">
        <div class="row my-5 px-5">
            <div class="col-lg-12" id="cart-col">
                <h2 class="fw-bold"><b>Rent {{$rental->bike_name}}</b></h4>

                    <!-- Cart with items -->    
               <form method="post" action="{{ route('client-rental-payment') }}">
               {{ csrf_field() }}
               <input type="hidden" name="rental_id" value="{{$rental->id}}">
               <input type="hidden" name="dt_from" value="{{$rental->dt_from}}">
               <input type="hidden" name="dt_from_time" value="{{$rental->dt_from_time}}">
               <input type="hidden" name="dt_to" value="{{$rental->dt_to}}">
               <input type="hidden" name="dt_to_time" value="{{$rental->dt_to_time}}">
               <div class="row">
                 <div class="col-lg-4 col-md-4 col-12 pt-4">
                    <div class="card card-course images">
                        <div class="card-body">
                            <div class="col img-modal"
                                style="background: url('{{ asset("uploads/rentals/".$rental->getProductImage()) }}') no-repeat center; background-size: cover; height: 300px;"
                                data-src="{{ asset("uploads/rentals/".$rental->getProductImage()) }}"></div>
                            <label class="mt-3 fs-5 fw-bold">{{$rental->product_name}}</label>
                            <p class="fs-5 lh-1 card-text">{{ number_format($rental->price,2)}}</p>
                        </div>
                        <div class="card card-course-foot shadow border-0">
                            <a class="btn btn-background text-light mx-auto fst-italic btn border-0 fs-5 p-2"
                                href="{{ route('rental-detail',$rental->id) }}">Other Details</a>
                        </div>
                    </div>
                </div>
                  <div class="col-lg-4 col-md-4 col-12 pt-4">
                     <div class="col-lg-4">
                        {{ Form::label('dt_from', 'From') }}
                        <p>DATE FROM {{ Carbon\Carbon::parse($dt_from." ".$dt_from_time)}}</p>
               
                      
                    </div>
                      <div class="col-lg-4">
                        {{ Form::label('dt_to', 'To') }}
                          <p>DATE To {{ Carbon\Carbon::parse($dt_to." ".$dt_to_time)}}</p>
                      
                    </div>
                    <div class="col-lg-4">
                       <p>Duration</p>
                        <p> {{ Carbon\Carbon::parse($dt_to." ".$dt_to_time)->diffInDays(Carbon\Carbon::parse($dt_from." ".$dt_from_time)) }} Days</p>
                      
                    </div>
                </div>
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
                <input type="submit" name="CHECKOUT">
     

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
