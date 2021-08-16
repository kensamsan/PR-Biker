@extends('template.master')


@section('content')
<link rel="stylesheet" href="/css/home.css">
<!--White navbar-->
<nav class="navbar navbar-expand-lg bg-light p-3 lightnav">
    <div class="container-fluid">
        <div class="col-lg-3 col-sm-12 mt-1">
            <img src="images/navbarlogo.svg" id="whitelogo">
        </div>

        <form class="input-group">
            <div class="col-lg-6 col-12 my-auto mt-2 ms-2">
                <input type="search" class="form-control fw-bold" placeholder="Search for an item" id="search-bar">
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="mt-1 input-group mb-3">
                        <input type="text" class="location-bar form-control fw-bold" placeholder="All locations">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="input-group-text bi bi-search"></i>
                        </span>
                    </div>
                </div>
               
                <div class="col">
                    <button class=" mx-auto btn btn-rent rounded-pill border-0 fs-5 fw-bold mt-1">
                        Rent a bike
                    </button>
                </div>

            </div>
        </form>

    </div>
</nav>
<!-- Banner  -->

<div id="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="open-cycles col-lg-6 p-5 ms-4">
                <h1 class="d-flex align-items-end display-1 fw-bolder">OPEN CYCLES</h1>
                <button class="btn btn-now fst-italic fw-bolder rounded-pill">NOW AVAILABLE</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid ms-4">
    <div class="row">
        <div class="recommend col-lg-6 pt-3">
            <h1 class="fst-italic fw-bolder">Recommended for you:</h1>
        </div>
    </div>
</div>

<!-- First Row -->

<div class="container-fluid card-container shadow bg-body fw-bolder">
    <div class="row my-5">
        <div class="col-lg-3 col-sm-12 p-3">
            <div class="card card-course">
                <div class="card-body">
                    <label>
                        <img src="/images/girl.png" alt="user photo" id="user-photo">
                        Lucifer Morningstar
                        <p class="card-time mt-2 lh-3" id="card-time">666 mins ago</p>
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
                        <p class="card-time mt-2 lh-3" id="card-time">666 mins ago</p>
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
                        <p class="card-time mt-2 lh-3" id="card-time">666 mins ago</p>
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
                        <p class="card-time mt-2 lh-3" id="card-time">666 mins ago</p>
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
                        <p class="card-time mt-2 lh-3" id="card-time">666 mins ago</p>
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
                        <p class="card-time mt-2 lh-3" id="card-time">666 mins ago</p>
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
                        <p class="card-time mt-2 lh-3" id="card-time">666 mins ago</p>
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
                        <p class="card-time mt-2 lh-3" id="card-time">666 mins ago</p>
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
                        <p class="card-time mt-2 lh-3" id="card-time">666 mins ago</p>
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
                        <p class="card-time mt-2 lh-3" id="card-time">666 mins ago</p>
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
                        <p class="card-time mt-2 lh-3" id="card-time">666 mins ago</p>
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
                        <p class="card-time mt-2 lh-3" id="card-time">666 mins ago</p>
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
