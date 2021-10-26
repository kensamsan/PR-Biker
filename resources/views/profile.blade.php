@extends('template.user')

@section('content')
<link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/user.css">
<link rel="icon" href="Images/navbarwhitebike.svg">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 mt-3">
            <img class="img-fluid" src="/images/navbarlogo.svg" alt="logo">
        </div>
        <div class="col-lg-4 col-6 mt-2">
            <div class="headers fs-1 fst-italic lead" id="user-settings">YOUR PROFILE</div>
        </div>
    </div>
    <hr>
</div>

<div class="row ms-4">
    <div class="headers col-lg-6 pt-3">
        <h1 class="fst-italic fw-bolder">Current Listings</h1>
    </div>
</div>
<div class="container d-flex justify-content-evenly mt-3 mb-5">
    <div class="row my-auto">
        <div class="col-lg-7 listing-container shadow p-4 ms-4">
            <!-- <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col-lg-4">
                    <div class="card text-center product-card shadow h-100">
                        <img class="card-img-top product-img" src="/images/bike10.svg" alt="product image">
                        <h4 class="bike-name card-title fst-italic mt-4">Bike Name</h4>
                        <p class="card-subtitle fs-6 p-1">Bike Specific Unit</p>
                        <p class="card-subtitle fs-6 text-muted fw-bold"><i
                                class="fs-5 fw-fold bi bi-geo-alt"></i>Manila City
                        </p>
                        <a class="text-center" href="#">See Your Product ></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center product-card shadow h-100">
                        <img class="card-img-top product-img" src="/images/bike10.svg" alt="product image">
                        <h4 class="bike-name card-title fst-italic mt-4">Bike Name</h4>
                        <p class="card-subtitle fs-6 p-1">Bike Specific Unit</p>
                        <p class="card-subtitle fs-6 text-muted fw-bold"><i
                                class="fs-5 fw-fold bi bi-geo-alt"></i>Manila City
                        </p>
                        <a class="text-center" href="#">See Your Product ></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center product-card shadow h-100">
                        <img class="card-img-top product-img" src="/images/bike10.svg" alt="product image">
                        <h4 class="bike-name card-title fst-italic mt-4">Bike Name</h4>
                        <p class="card-subtitle fs-6 p-1">Bike Specific Unit</p>
                        <p class="card-subtitle fs-6 text-muted fw-bold"><i
                                class="fs-5 fw-fold bi bi-geo-alt"></i>Manila City
                        </p>
                        <a class="text-center" href="#">See Your Product ></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center product-card shadow h-100">
                        <img class="card-img-top product-img" src="/images/bike10.svg" alt="product image">
                        <h4 class="bike-name card-title fst-italic mt-4">Bike Name</h4>
                        <p class="card-subtitle fs-6 p-1">Bike Specific Unit</p>
                        <p class="card-subtitle fs-6 text-muted fw-bold"><i
                                class="fs-5 fw-fold bi bi-geo-alt"></i>Manila City
                        </p>
                        <a class="text-center" href="#">See Your Product ></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center product-card shadow h-100">
                        <img class="card-img-top product-img" src="/images/bike10.svg" alt="product image">
                        <h4 class="bike-name card-title fst-italic mt-4">Bike Name</h4>
                        <p class="card-subtitle fs-6 p-1">Bike Specific Unit</p>
                        <p class="card-subtitle fs-6 text-muted fw-bold"><i
                                class="fs-5 fw-fold bi bi-geo-alt"></i>Manila City
                        </p>
                        <a class="text-center" href="#">See Your Product ></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center product-card shadow h-100">
                        <img class="card-img-top product-img" src="/images/bike10.svg" alt="product image">
                        <h4 class="bike-name card-title fst-italic mt-4">Bike Name</h4>
                        <p class="card-subtitle fs-6 p-1">Bike Specific Unit</p>
                        <p class="card-subtitle fs-6 text-muted fw-bold"><i
                                class="fs-5 fw-fold bi bi-geo-alt"></i>Manila City
                        </p>
                        <a class="text-center" href="#">See Your Product ></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center product-card shadow h-100">
                        <img class="card-img-top product-img" src="/images/bike10.svg" alt="product image">
                        <h4 class="bike-name card-title fst-italic mt-4">Bike Name</h4>
                        <p class="card-subtitle fs-6 p-1">Bike Specific Unit</p>
                        <p class="card-subtitle fs-6 text-muted fw-bold"><i
                                class="fs-5 fw-fold bi bi-geo-alt"></i>Manila City
                        </p>
                        <a class="text-center" href="#">See Your Product ></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center product-card shadow h-100">
                        <img class="card-img-top product-img" src="/images/bike10.svg" alt="product image">
                        <h4 class="bike-name card-title fst-italic mt-4">Bike Name</h4>
                        <p class="card-subtitle fs-6 p-1">Bike Specific Unit</p>
                        <p class="card-subtitle fs-6 text-muted fw-bold"><i
                                class="fs-5 fw-fold bi bi-geo-alt"></i>Manila City
                        </p>
                        <a class="text-center" href="#">See Your Product ></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center product-card shadow h-100">
                        <img class="card-img-top product-img" src="/images/bike10.svg" alt="product image">
                        <h4 class="bike-name card-title fst-italic mt-4">Bike Name</h4>
                        <p class="card-subtitle fs-6 p-1">Bike Specific Unit</p>
                        <p class="card-subtitle fs-6 text-muted fw-bold"><i
                                class="fs-5 fw-fold bi bi-geo-alt"></i>Manila City
                        </p>
                        <a class="text-center" href="#">See Your Product ></a>
                    </div>
                </div>
            </div> -->
        </div>

        <div class="col-lg-4 d-flex justify-content-end">
            <div class="col-lg-9 me-5">
                <div class="profile-card card" id="product-profile">
                    <p class="fst-italic fs-5 ms-2 mt-2">Your Profile:</p>
                    <img src="/uploads/users/{{Auth::user()->photo}}" class="card-img-top" alt="user's photo">
                    <div class="card-body">
                        <p class="card-text fw-bold fst-italic fs-5" id="user-name">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                        <p class="card-text fw-normal fst-italic" id="user-email">{{Auth::user()->email}}</p>
                        <a class="fw-normal fs-6 fst-italic lead mt-5" href="{{url('settings')}}"><i class="bi bi-gear me-1"></i>Tweak your profile</a>
                        <a class="fw-normal fs-6 fst-italic lead mt-5" href="{{url('settings')}}"><i class="bi bi-gear me-1"></i>My Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
