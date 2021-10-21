<title>Product Details</title>
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
<div class="container-fluid p-0">
    <div class="d-flex flex-row px-0 mx-0">
        <div class="col-lg-2 px-0">
            <!-- Side Menu -->
            @include('admin.admin-template.menu')
        </div>
<<<<<<< HEAD
        <div class="col-lg px-0">
            @include('admin.admin-template.main')
            <caption>
                <h2 class="pt-3 ps-3" style="font-weight: 900;">Users</h2>
            </caption>
            <p class="dashed"></p>
            <h4 style="font-weight: 700;">Name</h4>
            <caption>Hiplok DX Bicycle U Lock</caption>
            <h4 style="font-weight: 700;">Description</h4>
            <li>No Bracket Required - Integrated CLIP + RIDE system fits belts, bags & pockets</li>
            <li> 3 x coded & replaceable keys</li>

            <h4 style="font-weight: 700;">Categories</h4>
            <label class="container" style="font-size: 12pt;">Products
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>

            <label class="container">Rentals
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
=======
        <div class="col-lg px-0 mx-0">
            @include('admin.admin-template.main')
            <h3 class="ps-2 pt-4 pb-2 fs-2"><a href=""><i class="fas fa-chevron-left me-3 text-dark"></i></a><b>Product Details</b></h3>
            <p class="dashed"></p>
            {{-- Product Photo --}}
            <div class="row mx-5 my-5">
                <div class="col-lg-7">
                    <section class="mx-4">
                        <div class="mb-3">
                            <label class="form-label fw-bold fs-4">Product Photo</label>
                            <input type="text" class="form-control border border-2 br-10"
                                placeholder="product_photo.jpg">
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
                        <textarea class="form-control product-textarea h-100 w-100" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
>>>>>>> 014776221eb7470454e5c7d3c0714e50d4470ef2
