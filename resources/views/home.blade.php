@extends('template.master')
@section('content')
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
            @for ($i = 0; $i < 3; $i++)
            <div class="row my-5">
                @for ($j = 0; $j < 4; $j++)
                <div class="col-lg-3 col-md-6 col-12 p-3">
                    <div class="card card-course images">
                        <div class="card-body">
                            <label>
                                <img src="/images/girl.png" alt="user photo" id="user-photo">
                                Lucifer Morningstar
                                <p class="card-time mt-2 lh-3" id="card-time">666 mins ago</p>
                            </label>
                            <img src="/images/bike1.png" class="card-img-top" alt="bike1">
                            <label class="mt-3 fs-5">PRODUCT NAME</label>
                            <p class="fs-5 lh-1 card-text">1,000,000,000</p>
                        </div>
                        <div class="card card-course-foot shadow">
                            <a href="{{url('productpreview')}}" class="btn text-light mx-auto fst-italic btn border-0 fs-5 p-2">Other Details</a>
                        </div>
                    </div>
                </div>
                <div id="image-viewer">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="full-image">
                </div>
                @endfor     
            </div>
            @endfor
        </div>
    </section> 
    <script src="/js/modal.js"></script>
@endsection
