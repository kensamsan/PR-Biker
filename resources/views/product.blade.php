@extends('template.user')

@section('content')
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="/css/product.css">

{{-- Main content --}}
<div class="container">
    <div class="row">
        <div class="col-lg-5 col-12 mt-4 my-2">
            <div class="headers fs-1 fst-italic mx-auto">
                <h1 class="product-header">Have your bike for Rent!</h1>
            </div>
        </div>
    </div>
</div>
<div class="container form-container shadow mb-5 ">
    <div class="col-lg-11 col-12 me-5 p-4">
        <div class="row d-flex justify-content-around">
            <div class="col-lg-5">
                <div class="photo-card p-3 border-0 shadow card">
                    <h5 class="fst-italic fs-5 ms-2 mt-2 card-title" id="photo-card-header">Upload Photos here:</h5>
                    <div class="photo-container p-3 mb-4">
                        <i class="d-flex justify-content-center fab fa-dropbox fa-5x"></i>
                        <p class="text-center">Drag and Drop Files here</p>
                        <a class="col-7 text-light d-block rounded-pill fw-bold p-auto mx-auto btn btn-select" href="#">
                            Select files to upload
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-sm-center">
                            <div class="col-4 col-md-4 text-center">
                                <img class="img-fluid" src="/images/bike2.svg" alt="bike">
                            </div>
                            <div class="col-4 col-md-4 text-center">
                                <img class="img-fluid" src="/images/bike3.svg" alt="bike">
                            </div>
                            <div class="col-4 col-md-4 position-relative text-center">
                                <div class="photo-number-bg">
                                    <p
                                        class="photo-number fs-2 fs-md-2 text-light fst-italic text-center d-flex justify-content-center align-items-center">
                                        +2</p>
                                </div>
                                <img class="img-fluid" src="/images/bike4.svg" alt="bike">
                            </div>
                        </div>
                    </div>
                    <p class="card-text lead text-center text-uppercase fs-5">You can upload up to 10 images</p>
                </div>
            </div>
            <div class="col-lg-6 mt-3">
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label fs-5 fst-italic">Name your bike:</label>
                            <div class="col">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label fs-5 fst-italic">Bike Unit:</label>
                            <div class="col">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mt-1">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label fs-5 fst-italic">Price:</label>
                            <div class="col">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label fs-5 fst-italic">Location:</label>
                            <div class="col">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 mt-2">
                        <label for="inputPassword4" class="form-label fs-5 fst-italic">Description:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="text-light fw-bolder rounded-pill btn btn-post" type="button">POST NOW</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
