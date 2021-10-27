<div class="mb-5">
    @for ($i = 0; $i < 2; $i++)
        <div class="row">
            @for ($j = 0; $j < 4; $j++)
                <div class="col-lg-3 col-md-6 col-12 pt-4">
                    <div class="card card-course images">
                        <div class="card-body">
                            <label>
                                <img src="/images/user1.png" alt="user photo" id="user-photo">
                                username
                                <p class="card-time lh-3" id="card-time">30 mins ago</p>
                            </label>
                            {{-- <div class="col img-modal" style="background: url('{{ asset("uploads/products/".$x->getProductImage()) }}') no-repeat center; background-size: cover; height: 300px;" data-src="{{ asset("uploads/products/".$x->getProductImage()) }}"></div> --}}
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