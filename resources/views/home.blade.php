@extends('template.master')


@section('content')
<link rel="stylesheet" href="/css/home.css">
<!--White navbar-->

<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand"><img src="/images/navbarlogo.svg" width="150px" alt="white logo"></a>
        <form class="row">
            <div class="col-lg-5">
                <input class="form-control me-2" type="search" placeholder="Search for an item" aria-label="Search">
            </div>
            <div class="col-lg-3">
                <input class="form-control me-2" type="search" placeholder="All location" aria-label="Search">
            </div>
            <div class="col-lg-3 mt-1">
                <button class="btn btn-custom btn-sm btn-blue border-0 fs-5" type="submit">Rent a bike</button>
            </div>

        </form>
    </div>
</nav>

<!-- Banner  -->

<div id="banner">
    <div class="container">
        <div class="row">
            <div class="open-cycles col-lg-6 p-5">
                <h1 class="d-flex align-items-end display-1 fw-bolder">OPEN CYCLES</h1>
                <button class="btn btn-now fst-italic fw-bolder rounded-pill">NOW AVAILABLE</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="recommend col-lg-6 pt-3">
            <h1 class="fst-italic fw-bolder">Recommended for you:</h1>
        </div>
    </div>
</div>

<!-- First Row -->

<div class="container card-container shadow bg-body fw-bolder       ">
    <div class="row my-5">
        <div class="col-lg-3 col-sm-12 p-3">
            <div class="card card-course">
                <div class="card-body">
                    <label>
                        <img src="/images/girl.png" alt="user photo" id="user-photo">
                        Lucifer Morningstar                      
                        <p class="mt-2 ms-4 lh-1">666 mins ago</p>           
                    </label>

                    <img src="/images/bike1.png" class="card-img-top" alt="bike">
                    <label class="mt-3 fs-5">PRODUCT NAME</label>
                    <p class="fs-5 lh-1 card-text">1,000,000,000</p>
                </div>

                <div class="card card-course-foot shadow">
                    <button class="mx-auto fst-italic btn border-0 fs-5 col-lg-4 p-2">
                        Other Details
                    </button>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-12 p-3">
            <div class="card card-course">
                <div class="card-body">
                    <label>
                        <img src="/images/girl.png" alt="user photo" id="user-photo">
                        Lucifer Morningstar                      
                        <p class="mt-2 ms-4 lh-1">666 mins ago</p>           
                    </label>

                    <img src="/images/bike1.png" class="card-img-top" alt="bike">
                    <label class="mt-3 fs-5">PRODUCT NAME</label>
                    <p class="fs-5 lh-1 card-text">1,000,000,000</p>
                </div>

                <div class="card card-course-foot shadow">
                    <button class="mx-auto fst-italic btn border-0 fs-5 col-lg-4 p-2">
                        Other Details
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
            <div class="card card-course">
                <div class="card-body">
                    <label>
                        <img src="/images/girl.png" alt="user photo" id="user-photo">
                        Lucifer Morningstar                      
                        <p class="mt-2 ms-4 lh-1">666 mins ago</p>           
                    </label>

                    <img src="/images/bike1.png" class="card-img-top" alt="bike">
                    <label class="mt-3 fs-5">PRODUCT NAME</label>
                    <p class="fs-5 lh-1 card-text">1,000,000,000</p>
                </div>

                <div class="card card-course-foot shadow">
                    <button class="mx-auto fst-italic btn border-0 fs-5 col-lg-4 p-2">
                        Other Details
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
            <div class="card card-course">
                <div class="card-body">
                    <label>
                        <img src="/images/girl.png" alt="user photo" id="user-photo">
                        Lucifer Morningstar                      
                        <p class="mt-2 ms-4 lh-1">666 mins ago</p>           
                    </label>

                    <img src="/images/bike1.png" class="card-img-top" alt="bike">
                    <label class="mt-3 fs-5">PRODUCT NAME</label>
                    <p class="fs-5 lh-1 card-text">1,000,000,000</p>
                </div>

                <div class="card card-course-foot shadow">
                    <button class="mx-auto fst-italic btn border-0 fs-5 col-lg-4 p-2">
                        Other Details
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
            <div class="card card-course">
                <div class="card-body">
                    <label>
                        <img src="/images/girl.png" alt="user photo" id="user-photo">
                        Lucifer Morningstar                      
                        <p class="mt-2 ms-4 lh-1">666 mins ago</p>           
                    </label>

                    <img src="/images/bike1.png" class="card-img-top" alt="bike">
                    <label class="mt-3 fs-5">PRODUCT NAME</label>
                    <p class="fs-5 lh-1 card-text">1,000,000,000</p>
                </div>

                <div class="card card-course-foot shadow">
                    <button class="mx-auto fst-italic btn border-0 fs-5 col-lg-4 p-2">
                        Other Details
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
            <div class="card card-course">
                <div class="card-body">
                    <label>
                        <img src="/images/girl.png" alt="user photo" id="user-photo">
                        Lucifer Morningstar                      
                        <p class="mt-2 ms-4 lh-1">666 mins ago</p>           
                    </label>

                    <img src="/images/bike1.png" class="card-img-top" alt="bike">
                    <label class="mt-3 fs-5">PRODUCT NAME</label>
                    <p class="fs-5 lh-1 card-text">1,000,000,000</p>
                </div>

                <div class="card card-course-foot shadow">
                    <button class="mx-auto fst-italic btn border-0 fs-5 col-lg-4 p-2">
                        Other Details
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
            <div class="card card-course">
                <div class="card-body">
                    <label>
                        <img src="/images/girl.png" alt="user photo" id="user-photo">
                        Lucifer Morningstar                      
                        <p class="mt-2 ms-4 lh-1">666 mins ago</p>           
                    </label>

                    <img src="/images/bike1.png" class="card-img-top" alt="bike">
                    <label class="mt-3 fs-5">PRODUCT NAME</label>
                    <p class="fs-5 lh-1 card-text">1,000,000,000</p>
                </div>

                <div class="card card-course-foot shadow">
                    <button class="mx-auto fst-italic btn border-0 fs-5 col-lg-4 p-2">
                        Other Details
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
            <div class="card card-course">
                <div class="card-body">
                    <label>
                        <img src="/images/girl.png" alt="user photo" id="user-photo">
                        Lucifer Morningstar                      
                        <p class="mt-2 ms-4 lh-1">666 mins ago</p>           
                    </label>

                    <img src="/images/bike1.png" class="card-img-top" alt="bike">
                    <label class="mt-3 fs-5">PRODUCT NAME</label>
                    <p class="fs-5 lh-1 card-text">1,000,000,000</p>
                </div>

                <div class="card card-course-foot shadow">
                    <button class="mx-auto fst-italic btn border-0 fs-5 col-lg-4 p-2">
                        Other Details
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
            <div class="card card-course">
                <div class="card-body">
                    <label>
                        <img src="/images/girl.png" alt="user photo" id="user-photo">
                        Lucifer Morningstar                      
                        <p class="mt-2 ms-4 lh-1">666 mins ago</p>           
                    </label>

                    <img src="/images/bike1.png" class="card-img-top" alt="bike">
                    <label class="mt-3 fs-5">PRODUCT NAME</label>
                    <p class="fs-5 lh-1 card-text">1,000,000,000</p>
                </div>

                <div class="card card-course-foot shadow">
                    <button class="mx-auto fst-italic btn border-0 fs-5 col-lg-4 p-2">
                        Other Details
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
            <div class="card card-course">
                <div class="card-body">
                    <label>
                        <img src="/images/girl.png" alt="user photo" id="user-photo">
                        Lucifer Morningstar                      
                        <p class="mt-2 ms-4 lh-1">666 mins ago</p>           
                    </label>

                    <img src="/images/bike1.png" class="card-img-top" alt="bike">
                    <label class="mt-3 fs-5">PRODUCT NAME</label>
                    <p class="fs-5 lh-1 card-text">1,000,000,000</p>
                </div>

                <div class="card card-course-foot shadow">
                    <button class="mx-auto fst-italic btn border-0 fs-5 col-lg-4 p-2">
                        Other Details
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
            <div class="card card-course">
                <div class="card-body">
                    <label>
                        <img src="/images/girl.png" alt="user photo" id="user-photo">
                        Lucifer Morningstar                      
                        <p class="mt-2 ms-4 lh-1">666 mins ago</p>           
                    </label>

                    <img src="/images/bike1.png" class="card-img-top" alt="bike">
                    <label class="mt-3 fs-5">PRODUCT NAME</label>
                    <p class="fs-5 lh-1 card-text">1,000,000,000</p>
                </div>

                <div class="card card-course-foot shadow">
                    <button class="mx-auto fst-italic btn border-0 fs-5 col-lg-4 p-2">
                        Other Details
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
            <div class="card card-course">
                <div class="card-body">
                    <label>
                        <img src="/images/girl.png" alt="user photo" id="user-photo">
                        Lucifer Morningstar                      
                        <p class="mt-2 ms-4 lh-1">666 mins ago</p>           
                    </label>

                    <img src="/images/bike1.png" class="card-img-top" alt="bike">
                    <label class="mt-3 fs-5">PRODUCT NAME</label>
                    <p class="fs-5 lh-1 card-text">1,000,000,000</p>
                </div>

                <div class="card card-course-foot shadow">
                    <button class="mx-auto fst-italic btn border-0 fs-5 col-lg-4 p-2">
                        Other Details
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container">

                <div class="col-lg-0 p-3">
                    <div class="d-flex justify-content-center">

                        <button class="btn btn-white-outline">View More</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
