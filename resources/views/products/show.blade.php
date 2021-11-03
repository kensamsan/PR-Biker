@extends('template.master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/store/productpreview.css">

    {{-- Main Content --}}
    <div class="container-fluid text-center my-5">
        <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @foreach($p->productImage as $x)
                     <div class="carousel-item @if($p->productImage->first()->id==$x->id) active @endif">
                        <div class="col-lg-3 col-md-3 px-2">
                            <div class="card">
                                <div class="card-img"
                                    style="background: url('{{ asset("uploads/products/".$x->file_name) }}') no-repeat center; background-size: cover; height: 300px;">
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
                    <h2 class="lead display-6">{{$p->product_name}}</h2>
                    <h2 class="fw-bold"><b>PHP {{ number_format($p->price,2)}}</b></h2>
                    <div class="row">
                        <div class="col-lg-4 d-flex col-md-2">
                            <span class="me-3">
                                <i class="far fa-calendar-alt fs-4 pe-2 icon-color"></i>
                                <label class="fs-5" for="">2015</label>
                            </span>
                            <span>
                                <i class="fas fa-map-marker-alt fs-4 pe-2 icon-color"></i>
                                <label class="fs-5 lead" for="">Manila City</label>
                            </span>
                        </div>
                    </div>
                    <hr>
                    <h3 class="fw-bold"><b>Description:</b></h3>
                    <p class="paragraph-alignment">{{$p->description}}</p>
                    <!-- <a href="#" class="read fw-bold"><b>read more</b></a> -->
                    <div class="row">
                        <div class="col-lg-6 d-flex col-md-2">
                            @if($p->productQtyAvailable()>0)
                          <!--   <a href="#" class="px-5 mt-3 me-3 btn btn-background fw-bold text-uppercase lead text-light">buy
                                now</a> -->
                         
                            <form method="post" action="{{ route('client-add-to-cart') }}">
                            {{csrf_field()}}
                                <input type="hidden" name="product_id" value="{{$p->id}}">
                                <input type="hidden" name="qty" value="1">
                              <input type="submit" class="px-5 my-4 btn btn-custom-outline text-uppercase lead text-light" value="add to cart">
                        
                            </form>
                            @else
                                <b class="mb-5">out of stock</b>
                            @endif
                        </div>                  
                    </div>
                
                    {{-- Listings --}}
                    {{-- @include('template.similar-listings') --}}
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
