@extends('template.master')
@section('title', 'Rent A Bike')
@section('content')

<link rel="stylesheet" href="/css/marketplace.css">

<div class="container-fluid ps-lg-5 mx-auto">
    <h1 class="text-uppercase fw-bold mb-5 fst-italic mt-5 text-lg-start text-center fs-1" id=marketplace-text>
        <b>Rentals</b>
    </h1>
        <div class="col-lg-8 jusify-content-center mx-auto">
            <div class="mb-5">
                <div class="row">
                    @foreach($rentals as $x)
                   <div class="col-lg-3 col-md-4 col-12 pt-4">
                            <div class="card card-course images">
                                <div class="card-body">
                                    <div class="col img-modal"
                                        style="background: url('{{ asset("uploads/rentals/".$x->getProductImage()) }}') no-repeat center; background-size: cover; height: 300px;"
                                        data-src="{{ asset("uploads/rentals/".$x->getProductImage()) }}"></div>
                                    <label class="mt-3 fs-5 fw-bold">{{$x->bike_unit}}</label>
                                    <p class="fs-5 lh-1 card-text">{{ number_format($x->price,2)}}</p>
                                </div>
                                <div class="card card-course-foot shadow border-0">
                                    <a class="btn btn-background text-light mx-auto fst-italic btn border-0 fs-5 p-2"
                                        href="{{ route('rental-detail',$x->id) }}">Other Details</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @foreach($products as $x)
                   <div class="col-lg-3 col-md-4 col-12 pt-4">
                            <div class="card card-course images">
                                <div class="card-body">
                                    <div class="col img-modal"
                                        style="background: url('{{ asset("uploads/products/".$x->getProductImage()) }}') no-repeat center; background-size: cover; height: 300px;"
                                        data-src="{{ asset("uploads/products/".$x->getProductImage()) }}"></div>
                                    <label class="mt-3 fs-5 fw-bold">{{$x->bike_unit}}</label>
                                    <p class="fs-5 lh-1 card-text">{{ number_format($x->price,2)}}</p>
                                </div>
                                <div class="card card-course-foot shadow border-0">
                                    <a class="btn btn-background text-light mx-auto fst-italic btn border-0 fs-5 p-2"
                                        href="{{ route('product.show',$x->id) }}">Other Details</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div id="image-viewer">
    <span class="close">&times;</span>
    <img class="modal-content" id="full-image">
</div>
<script src="/js/modal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    @if(Session::has('error_message'))
    Swal.fire({
        // title: '<h3></h3>',
        html: '<h4>{{Session::get('
        error_message ')}}</h4>',
        type: 'error',
        customClass: 'swal-wide',
        confirmButtonText: 'Ok',
        confirmButtonClass: 'btn-swal'
    })
    @endif
    @if(Session::has('flash_success'))
    Swal.fire({
        title: 'Thank you for your Purchase!',
        html: 'your order number is <br/> ' +
        'For more details, track your delivery status<br/>' +
        'under My Account>Track my Orders<br/>' +
        'We sent a confirmation email to<br/>' +
        '<br/>' +
        'with the order details',
        type: 'success',
        confirmButtonText: 'Continue Shopping'
    })
    @endif
</script>
@endsection