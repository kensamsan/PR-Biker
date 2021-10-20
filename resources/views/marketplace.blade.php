@extends('template.master')

@section('content')

    <link rel="stylesheet" href="/css/marketplace.css">

    <div class="container-fluid ps-lg-5 mx-auto">
        <h1 class="text-uppercase fw-bold mb-5 fst-italic mt-5 text-lg-start text-center" id=marketplace-text>
            <b>Marketplace</b>
        </h1>
        <div class="row pb-5 text-lg-start text-center">
            <div class="col-lg-2 fs-4">
                <label for=""><b>Product Type 1</b></label>
            </div>
            <div class="col-lg-2 fs-4">
                <label for=""><b>Product Type 2</b></label>
            </div>
            <div class="col-lg-2 fs-4">
                <label for=""><b>Product Type 3</b></label>
            </div>
            <div class="col-lg-6">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-5">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="row">
                            @for ($j = 0; $j < 3; $j++)
                                <div class="col-lg-4 col-md-4 col-12 pt-4">
                                    <div class="card card-course">
                                        <div class="card-body">
                                            <label>
                                                <img src="/images/user1.png" alt="user photo" id="user-photo">
                                                username
                                                <p class="card-time lh-3" id="card-time">30 mins ago</p>
                                            </label>
                                            <img src="/images/bike1.png" class="card-img-top img-fluid" alt="bike1">
                                            <label class="mt-3 fs-5 fw-bold">PRODUCT NAME</label>
                                            <p class="fs-5 lh-1 card-text">PRICE</p>
                                        </div>
                                        <div class="card card-course-foot shadow border-0">
                                            <button
                                                class="btn-background text-light mx-auto fst-italic btn border-0 fs-5 p-2">
                                                Other Details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    @endfor
                </div>
            </div>
            <div class="col-lg-3 mt-5 ms-5">
                <h1>Feature Products</h1>
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
@endsection
