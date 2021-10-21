<title>Add Product</title>
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
    .btn-save{
        background-color: #00931D!important;
    }
</style>
<div class="container-fluid p-0">
    <div class="d-flex flex-row px-0 mx-0">
        <div class="col-lg-2 px-0">
            <!-- Side Menu -->
            @include('admin.admin-template.menu')
        </div>
        <div class="col-lg px-0 mx-0">
            @include('admin.admin-template.main')
            <h3 class="ps-2 pt-4 pb-2 fs-2"><a href=""><i class="fas fa-chevron-left me-3 text-dark"></i></a><b>Add Product</b></h3>
            <p class="dashed"></p>
            {{-- Product Photo --}}
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
                        <input type="text" class="form-control border border-2 br-10">
                        <label for="" class="fw-bold fs-4 mt-2">Description</label>
                        <textarea class="form-control product-textarea w-100" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
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
                        <div class="d-grid gap-2 d-md-block mt-3">
                            <button class="btn btn-save px-4 fw-bold text-light br-10" type="button">Save Product</button>
                          </div>
                    </section>
                </div>
        </div>
    </div>
</div>
