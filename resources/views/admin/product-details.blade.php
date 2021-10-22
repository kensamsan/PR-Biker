@extends('admin.admin-template.main')
@section('title', 'Product Details')

@section('body')

    <style>
        input[type=text] {
            background-color: #fff !important;
            color: #000 !important;
        }

        .btn-files {
            background-color: transparent;
        }

        .br-10 {
            border-radius: 10px !important;
        }

        .product-textarea {
            resize: none;
        }

    </style>

    <h3 class="ps-2 pt-4 pb-2 fs-2"><a href="/products"><i class="fas fa-chevron-left me-3 text-dark"></i></a><b>Product
            Details</b></h3>
    <p class="dashed"></p>
    <!-- Side Menu -->
    <div class="row mx-5 my-5">
        <div class="col-lg-7">
            <section class="mx-4">
                <div class="mb-3">
                    <label class="form-label fw-bold fs-4">Product Photo</label>
                    <input type="text" class="form-control border border-2 br-10" placeholder="product_photo.jpg">
                </div>
                <div class="d-grid gap-2 col-12 mx-auto">
                    <button class="btn btn-files border border-2 br-10" type="button">Add Files<i
                            class="fas fa-plus-circle ms-1"></i></button>
                </div>
                <label for="" class="fw-bold fs-4 mt-4">Name</label>
                <p class="lead">product name</p>
                <label for="" class="fw-bold fs-4 mt-2">Description</label>
                <ul>
                    <li>
                        <p class="lead my-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </li>
                    <li>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </li>
                </ul>
                <label class="fw-bold fs-4 mt-2">Categories</label>
                <br>
                <div class="form-check form-check-inline mt-1">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">Product Type 1</label>
                </div>
                <div class="form-check form-check-inline mt-1">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">Product Type 2</label>
                </div>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">Rentals</label>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label text-dark fs-4 fw-bold">Product
                    Comments</label>
                <textarea class="form-control product-textarea h-75 w-100" id="exampleFormControlTextarea1"
                    rows="3"></textarea>
            </div>
        </div>
    </div>

@endsection