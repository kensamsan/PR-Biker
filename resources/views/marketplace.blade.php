@extends('template.master')

@section('content')

    <link rel="stylesheet" href="/css/marketplace.css">

    <div class="container-fluid ps-lg-5 mx-auto">
        <h1 class="text-uppercase fw-bold mb-5 fst-italic mt-5 text-lg-start text-center" id=marketplace-text>
            <b>Marketplace</b>
        </h1>
        <div class="row pb-5 text-lg-start text-center">
            @foreach($categories as $x)
             <div class="col-lg-2 fs-4">
                <label for=""><b>{{$x->category_name}}</b></label>
            </div>
            @endforeach
           
            <div class="col-lg-6">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-5">
                         <div class="row">
                                @foreach($products as $x)
                                      
                                            <div class="col-lg-4 col-md-4 col-12 pt-4">
                                                <div class="card card-course images">
                                                    <div class="card-body">
                                                       <!--  <label>
                                                            <img src="/images/user1.png" alt="user photo" id="user-photo">
                                                            username
                                                            <p class="card-time lh-3" id="card-time">30 mins ago</p>
                                                        </label> -->
                                                        <img src="/uploads/products/{{$x->getProductImage()}}" class="card-img-top img-fluid" alt="bike1">
                                                        <label class="mt-3 fs-5 fw-bold">{{$x->product_name}}</label>
                                                        <p class="fs-5 lh-1 card-text">{{ number_format($x->price,2)}}</p>
                                                    </div>
                                                    <div class="card card-course-foot shadow border-0">
                                                        <button
                                                            class="btn-background text-light mx-auto fst-italic btn border-0 fs-5 p-2">
                                                            <a href="{{ route('product.show',$x->id) }}">Other Details</a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="image-viewer">
                                                <span class="close">&times;</span>
                                                <img class="modal-content" id="full-image">
                                            </div>

                                       
                                @endforeach
                        </div>
                        
                    
                </div>
            </div>
            <div class="col-lg-3 mt-5 ms-lg-5 mx-auto">
                <h1 class="text-lg-start text-center">Feature Products</h1>
                <div class="card mb-3 border-0 mt-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/images/bike1.png" class="img-fluid" alt="bike1">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text">Price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 border-0 mt-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/images/bike1.png" class="img-fluid" alt="bike1">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text">Price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 border-0 mt-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/images/bike1.png" class="img-fluid" alt="bike1">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text">Price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 border-0 mt-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/images/bike1.png" class="img-fluid" alt="bike1">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text">Price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 border-0 mt-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/images/bike1.png" class="img-fluid" alt="bike1">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text">Price</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">

            @if(Session::has('error_message'))
                Swal.fire({
                // title: '<h3></h3>',
                html:
                    '<h4>{{Session::get('error_message')}}</h4>',
                type: 'error',
                customClass: 'swal-wide',
                confirmButtonText: 'Ok',
                confirmButtonClass: 'btn-swal'             
            })
            @endif
         @if(Session::has('order_placed'))
                Swal.fire({
                title: 'Thank you for your Purchase!',
                html:
                    'your order number is  <b>{{Session::get('order_id')}}</b>,<br/> ' +
                    'For more details, track your delivery status<br/>' +
                    'under My Account>Track my Orders<br/>' +
                    'We sent a confirmation email to<br/>' +
                    '{{Session::get('email')}}<br/>' +
                    'with the order details',
                type: 'success',
                confirmButtonText: 'Continue Shopping'
                })
            @endif

    </script>
@endsection
