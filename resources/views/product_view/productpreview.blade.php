@extends('template.master')
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/store/productpreview.css">

    {{-- Main Content --}}
    <div class="container-fluid text-center my-5">
        <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="col-lg-3 col-md-3 px-2">
                            <div class="card">
                                <div class="card-img">
                                    <img src="/images/bike1.png" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-3 col-md-3 px-2">
                            <div class="card">
                                <div class="card-img">
                                    <img src="/images/bike3.png" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-3 col-md-3 px-2">
                            <div class="card">
                                <div class="card-img">
                                    <img src="/images/bike3.png" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-3 col-md-3 px-2">
                            <div class="card">
                                <div class="card-img">
                                    <img src="/images/bike4.png" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-3 col-md-3 px-2">
                            <div class="card">
                                <div class="card-img">
                                    <img src="/images/bike5.png" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-lg-3 col-md-3 px-2">
                            <div class="card">
                                <div class="card-img">
                                    <img src="/images/bike1.png" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
    {{-- Bike Info --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="ms-5 ms-sm">
                    <h2 class="lead display-6">Raleigh Redux 2</h2>
                    <h2 class="fw-bold"><b>PHP 12,000</b></h2>
                    <div class="row">
                        <div class="col-lg-4 d-flex col-md-2">
                            <span class="me-3">
                                <i class="far fa-calendar-alt fs-4 pe-2 icon-color"></i>
                                <label class="fs-5" for="">2015</label>
                            </span>
                            <span>
                                <i class="fas fa-map-marker-alt fs-4 pe-2 icon-color"></i>
                                <label class="fs-5 lead" for="">Manila City</label>
                            </span>
                        </div>
                    </div>
                    <hr>
                    <h3 class="fw-bold"><b>Description:</b></h3>
                    <p class="paragraph-alignment">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum harum
                        odio ipsa! Aliquam culpa magnam, est fugiat minus quaerat sit? Consequuntur, eius unde debitis
                        cumque fugit quisquam ipsam et numquam eveniet labore nisi aperiam perspiciatis odit nobis ea
                        incidunt possimus accusantium doloremque quas inventore deserunt recusandae! Corrupti accusantium
                        consequuntur maxime.</p>
                    <a href="#" class="read fw-bold"><b>read more</b></a>
                    <div class="row">
                        <div class="col-lg-6 d-flex col-md-2">
                            <a href="#" class="px-5 mt-3 me-3 btn btn-background fw-bold text-uppercase lead text-light">buy
                                now</a>
                            <a href="#" class="px-5 mt-3 btn btn-custom-outline text-uppercase lead text-light">add to
                                cart</a>
                        </div>
                    </div>
                    {{-- Meet the seller --}}
                    <div class="row mt-4">
                        <div class="col-lg-4">
                            <h1 class="fw-bold fs-1"><b>Meet the Seller</b></h1>
                        </div>
                        <div class="col pt-2">
                            <hr class="custom-hr-color">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-3 border-0">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <img src="/images/1155017.png" class="img-fluid rounded-start pt-2" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold text-uppercase lh-3"><b>seller name</b></h5>
                                            <p class="card-title lh-3"><small class="text-muted lh-1">@seller_name</small>
                                            </p>
                                            <span>
                                                <p class="card-title lh-3"><small class="lh-1">
                                                        <i class="card-title fas fa-clock pe-1"></i>
                                                        Joined 4 years ago</small>
                                                </p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <h5 class="fw-bold text-uppercase"><b>Reviews for @seller_name</b></h5>
                            <div class="card border-0 mb-3">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <img src="/images/BG1.png" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold lh-3">@seller_name</h5>
                                            <i class="fas fa-star lh-3"></i>
                                            <i class="fas fa-star lh-3"></i>
                                            <i class="fas fa-star lh-3"></i>
                                            <i class="fas fa-star lh-3"></i>
                                            <i class="fas fa-star lh-3"></i>
                                            <p class="card-text paragraph-alignment">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. Voluptatum accusantium cupiditate soluta maxime debitis
                                                quia eligendi exercitationem cumque nihil corporis!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 mb-3">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <img src="/images/user1.png" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold lh-3">@seller_name</h5>
                                            <i class="fas fa-star lh-3"></i>
                                            <i class="fas fa-star lh-3"></i>
                                            <i class="fas fa-star lh-3"></i>
                                            <i class="fas fa-star lh-3"></i>
                                            <i class="fas fa-star lh-3"></i>
                                            <p class="card-text paragraph-alignment">Lorem ipsum dolor sit amet,
                                                consectetur
                                                adipisicing elit. Voluptatum accusantium cupiditate soluta maxime debitis
                                                quia eligendi exercitationem cumque nihil corporis!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 mb-3">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <img src="/images/BG1.png" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold lh-3">@seller_name</h5>
                                            <i class="fas fa-star lh-3"></i>
                                            <i class="fas fa-star lh-3"></i>
                                            <i class="fas fa-star lh-3"></i>
                                            <i class="fas fa-star lh-3"></i>
                                            <i class="fas fa-star lh-3"></i>
                                            <p class="card-text paragraph-alignment">Lorem ipsum dolor sit amet,
                                                consectetur
                                                adipisicing elit. Voluptatum accusantium cupiditate soluta maxime debitis
                                                quia eligendi exercitationem cumque nihil corporis!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="read fw-bold"><b>Read all reviews &nbsp</b><i
                                    class="fas fa-greater-than"></i></a>
                        </div>
                    </div>
                    {{-- Comment section --}}
                    <div class="mb-3">
                        <img src="/images/user1.png" class="img-fluid rounded-start pe-3" alt="...">
                        <label for="exampleFormControlTextarea1" class="form-label pb-4 fw-bold fs-5">@user_name</label>
                        <textarea class="form-control remove-resize" rows="4"></textarea>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-3">
                            <a href="" class="w-100 btn btn-background fw-bold text-uppercase lead text-light">post
                                comment</a>
                        </div>
                    </div>
                    {{-- Similar listings --}}
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <h1 class="fw-bold fs-1"><b>Similar Listings</b></h1>
                        </div>
                        <div class="col pt-2">
                            <hr class="custom-hr-color">
                        </div>
                    </div>
                    {{-- Listings --}}
                    <div class="mb-5">
                        @for ($i = 0; $i < 2; $i++)
                            <div class="row">
                                @for ($j = 0; $j < 4; $j++)
                                    <div class="col-lg-3 col-md-6 col-12 pt-4">
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
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/carousel.js"></script>
@endsection
