@extends('template.master')
@section('title', 'Marketplace')
@section('content')

<link rel="stylesheet" href="/css/marketplace.css">

<div class="container-fluid ps-lg-5 mx-auto">
    <h1 class="text-uppercase fw-bold mb-5 fst-italic mt-5 text-lg-start text-center fs-1" id=marketplace-text>
        <b>Marketplace</b>
    </h1>
    <div class="row pb-5 text-lg-start text-center">
        @foreach($categories as $x)
        <div class="col-lg-2 fs-4">
            <label for=""><b>{{$x->category_name}}</b></label>
        </div>
        @endforeach
    </div>

    <div class="col-lg-9 jusify-content-center mx-auto">
        <div class="mb-5">
            <div class="row">
                @foreach($products as $x)
                @if($x->getProductImageCount()>0)
                <div class="col-lg-3 col-md-4 col-12 pt-4">
                    <div class="card card-course images h-100">
                        <div class="card-body">
                            <div class="col img-modal"
                                style="background: url('{{ asset("uploads/products/".$x->getProductImage()) }}') no-repeat center; background-size: cover; height: 300px;"
                                data-src="{{ asset("uploads/products/".$x->getProductImage()) }}">
                            </div>
                            <label class="mt-3 fs-5 fw-bold">{{$x->product_name}}</label>
                            <p class="fs-5 lh-1 card-text">{{ number_format($x->price,2)}}</p>
                        </div>
                        <div class="card card-course-foot shadow border-0">
                            <a class="btn btn-background text-light mx-auto fst-italic btn border-0 fs-5 p-2"
                                href="{{ route('product.show',$x->id) }}">Other Details</a>
                        </div>
                    </div>
                </div>
                @endif
               
                @endforeach
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
    @if(Session::has('order_placed'))
    Swal.fire({
        title: 'Thank you for your Purchase!',
        html:'For more details, track your delivery status<br/>' +
        'under My Account > Track my Orders<br/>',
        type: 'success',
        confirmButtonText: 'Continue Shopping'
    })
    @endif
</script>
@endsection