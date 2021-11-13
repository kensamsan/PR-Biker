@extends('template.master')
@section('title', 'Details')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/store/productpreview.css">

    {{-- Main Content --}}
    <div class="container-fluid text-center my-5">
        <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @foreach($rental->rentalImage as $x)
                     <div class="carousel-item @if($rental->rentalImage->first()->id==$x->id) active @endif">
                        <div class="col-lg-3 col-md-3 px-2">
                            <div class="card">
                                <div class="card-img"
                                    style="background: url('{{ asset("uploads/rentals/".$x->file_name) }}') no-repeat center; background-size: cover; height: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach                 
                </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
    {{-- Bike Info --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="ms-5 ms-sm">
                    <h2 class="lead display-6">{{$rental->bike_unit}}</h2>
                    <h2 class="fw-bold"><b>PHP {{ number_format($rental->price,2)}}</b></h2>
                    <div class="row">
                        <div class="col-lg-4 d-flex col-md-2">
                            <span>
                                <i class="fas fa-map-marker-alt fs-4 pe-2 icon-color"></i>
                                <label class="fs-5 lead" for="">{{$rental->brgy}}</label>
                            </span>
                        </div>
                    </div>
                    <hr>
                    <h2 class="lead display-6">{{$rental->bike_name}}</h2>
                    <h3 class="fw-bold"><b>Description:</b></h3>
                    <p class="paragraph-alignment">{{$rental->description}}</p>
                    <div class="row mb-5">
                        <div class="col-lg-6 d-flex col-md-2">
                            <form method="post" action="{{ route('client-rent-now') }}">
                            {{csrf_field()}}
                                <input type="hidden" name="rental_id" value="{{$rental->id}}">
                              <input type="submit" class="px-5 mt-3 btn btn-custom-outline text-uppercase lead text-light" value="Rent Now">     
                            </form>
                        </div>                  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/carousel.js"></script>


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
