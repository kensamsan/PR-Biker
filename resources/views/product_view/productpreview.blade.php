@extends('template.master')
@section('content')
    @include('template.search')
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
            <div class="col-lg-9">
                <div class="ms-5">
                    <h2 class="lead display-6">Raleigh Redux 2</h2>
                    <h2 class="fw-bold"><b>PHP 12,000</b></h2>
                    <div class="row">
                        <div class="col-lg-1 col-12">
                            <span>
                                <i class="far fa-calendar-alt fs-4 pe-2 icon-color"></i>
                                <label class="fs-4" for="">2015</label>
                            </span>
                        </div>
                        <div class="col-lg-2 col-12">
                            <span>
                                <i class="fas fa-map-marker-alt fs-4 pe-2 icon-color"></i>
                                <label class="fs-4 lead" for="">Manila City</label>
                            </span>
                        </div>              
                    </div>
                    <hr>
                    <h3 class="fw-bold"><b>Description:</b></h3>
                    <p class="product-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum harum odio ipsa! Aliquam culpa magnam, est fugiat minus quaerat sit? Consequuntur, eius unde debitis cumque fugit quisquam ipsam et numquam eveniet labore nisi aperiam perspiciatis odit nobis ea incidunt possimus accusantium doloremque quas inventore deserunt recusandae! Corrupti accusantium consequuntur maxime.</p>
                    <a href="#" class="read fw-bold"><b>read more</b></a>
                </div>     
            </div>
        </div>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let items = document.querySelectorAll('.carousel .carousel-item')

        items.forEach((el) => {
            const minPerSlide = 4
            let next = el.nextElementSibling
            for (var i = 1; i < minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
    </script>
@endsection
