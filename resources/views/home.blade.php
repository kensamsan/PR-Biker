@extends('template.master')


@section('content')
<link rel="stylesheet" href="/css/home.css">
<!--White navbar-->

<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">logo</a>
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
            <div class="col-lg-6 p-5">
                <h1>OPEN CYCLES</h1>
                <button type="submit" class="btn2"><b>NOW AVAILABLE<b></button>
            </div>
        </div>
    </div>
</div>

<div class="container" id="Recommend">
    <div class="row">
        <div class="Recommend col-lg-6 p-4">
            <div class="Recon">
                <h1>Recommended for you:</h1>
            </div>
        </div>
    </div>
</div>


<!-- First Row -->

<div class="container">
    <div class="row my-5">

        <div class="col-lg-3 col-md-6 col-sm-12 p-3">
            <a href="#">
                <div class="card card-course">
                    <div class="card-body">

                        <label class="details2 mt-2 pb-1"><img src="/images/girl.png" id="user-photo"
                                alt="user's photo">Lucifer Morningstar</label>

                        <p><label>666 mins ago</label></p>

                        <img src="/images/bike1.png" class="card-img-top" alt="HTML Logo">
                        <h5><label class="mt-3">Bike ni Satanas</label> </h5>
                        <p><label>1,000,000,000</label> </p>
                    </div>

                    <div class="card card-course-foot text-center">
                        <div class="card-body">
                            <label class="details2">Other details</label>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12">
            <!-- <div class="card card-course">
                    <div class="card-body">
                        <label>User name 1</label>
                        <p>30 mins ago</p>

                        <img src="/images/bike1.png" class="card-img-top" alt="HTML Logo"">
                        <h5> Product Name</h5>
                        <p>PRICE</p>
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-primary">Other Details</a>
                        </div>
                    </div>
                </div> -->


            <a href="#">
                <div class="card card-course">
                    <div class="card-body">
                        <label>User name 1</label>
                        <p><label>30 mins ago</label> </p>

                        <img src="/images/bike1.png" class="card-img-top" alt="HTML Logo">
                        <h5><label>Product Name</label> </h5>
                        <p><label>PRICE</label> </p>
                    </div>


                    <div class="card-footer text-center  ">
                        <a href="#" class="details">
                            <div class="card-footer text-center  ">
                                <label>Other Details</label>
                            </div>
                        </a>

                    </div>

                </div>
            </a>

        </div>

        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card card-course">
                <div class="card-body">
                    <label>User name 1</label>
                    <p>30 mins ago</p>

                    <img src="/images/bike1.png" class="card-img-top" alt="HTML Logo">
                    <h5> Product Name</h5>
                    <p>PRICE</p>

                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-primary">Other Details</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card card-course">
                <div class="card-body">
                    <label>User name 1</label>
                    <p>30 mins ago</p>

                    <img src="/images/bike1.png" class="card-img-top" alt="HTML Logo">
                    <h5> Product Name</h5>
                    <p>PRICE</p>
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-primary">Other Details</a>
                    </div>
                </div>
            </div>
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

@endsection
