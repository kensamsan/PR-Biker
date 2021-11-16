@extends('template.master')
@section('title', 'Home')
@section('content')

<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "107738521703237");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    
    <link rel="stylesheet" href="/css/home.css">
    <div id="banner">
        <div class="container-fluid">
            <div class="row">
                <div class="open-cycles col-lg-6 p-5 ms-4">
                    <h1 class="d-flex align-items-end display-1" id="banner-header">OPEN CYCLES</h1>
                    <button class="btn fs-5 fst-italic rounded-pill" id="btn-now">NOW AVAILABLE</button>
                </div>
            </div>
        </div>
    </div>
    <section class="recommended-bg pt-1 pb-5">
        <div class="row ms-4">
            <div class="recommend col-lg-6 pt-5">
                <h1 class="fst-italic fw-bolder"><b>Recommended for you:</b></h1>
            </div>
        </div>
        <div class="container card-container shadow fw-bolder">
            <div class="row my-5">
                @foreach ($products as $x)
                <div class="col-lg-3 col-md-6 col-12 p-3">
                    <div class="card card-course images h-100">
                        <div class="card-body">
                            <div class="col img-modal"
                                style="background: url('{{ asset("uploads/products/".$x->getProductImage()) }}') no-repeat center; background-size: cover; height: 300px;"
                                data-src="{{ asset("uploads/products/".$x->getProductImage()) }}">
                            </div>
                            <label class="mt-3 fs-5 fw-bold">{{$x->product_name}}</label>
                            <p class="fs-5 lh-1 card-text">{{ number_format($x->price,2)}}</p>
                        </div>
                        {{-- <div class="card-body">
                            <img src="/uploads/products/{{$x->getProductImage()}}" class="card-img-top" alt="bike1">
                            <label class="mt-3 fs-5">{{$x->product_name}}</label>
                            <p class="fs-5 lh-1 card-text">{{ number_format($x->price,2)}}</p>
                        </div> --}}
                        <div class="card card-course-foot shadow">
                            <a href="{{ route('product.show',$x->id) }}" class="btn text-light mx-auto fst-italic btn border-0 fs-5 p-2">Other Details</a>
                        </div>
                    </div>
                </div>
                <div id="image-viewer">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="full-image">
                </div>
                @endforeach     
                @foreach ($rentals as $x)
                <div class="col-lg-3 col-md-6 col-12 p-3">
                    <div class="card card-course images h-100">
                        <div class="card-body">
                            <div class="col img-modal"
                                style="background: url('{{ asset("uploads/rentals/".$x->getProductImage()) }}') no-repeat center; background-size: cover; height: 300px;"
                                data-src="{{ asset("uploads/rentals/".$x->getProductImage()) }}">
                            </div>
                            <label class="mt-3 fs-5 fw-bold">{{$x->bike_unit}}</label>
                            <p class="fs-5 lh-1 card-text">{{ number_format($x->price,2)}}</p>
                        </div>
                      
                        <div class="card card-course-foot shadow">
                            <a href="{{ route('rental-detail',$x->id) }}" class="btn text-light mx-auto fst-italic btn border-0 fs-5 p-2">Other Details</a>
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
    </section> 
    <script src="/js/modal.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script type="text/javascript">
        $(document).ready(function(){
        @if(Session::has('flash_message'))
            Swal.fire(
              'Success',
              '{{Session::get('flash_message')}}',
              'success'
            )
        @endif
        @if(Session::has('register_ok'))
                Swal.fire({
                title: 'Thank you for Registering!',
                // html:
                //     'We sent a confirmation email to<br/>' +
                //     '{{Session::get('email')}}<br/>' +
                //     'Please check mail',
                type: 'success',
                confirmButtonText: 'Okay'
                })
         @endif
        @if(Session::has('flash_error'))
            Swal.fire(
              'Error',
              '{{Session::get('flash_error')}}',
              'error'
            )
        @endif
       
    });
    </script>
@endsection
