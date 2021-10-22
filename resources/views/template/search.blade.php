<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<link rel="stylesheet" href="/css/search.css">

<form action="#">
    <nav class="navbar navbar-expand-lg ps-lg-4 border-bottom border-2">
        <div class="container-fluid pe-0 pe-lg-3 ps-4 ps-lg-3">
            <div class="row align-items-center w-100">
                <div class="col-lg-3 text-lg-start text-center">
                    <a href="{{url('')}}"><img src="/images/navbarlogo.svg" alt="" class="img-fluid"></a>       
                </div>
                <div id="search-item" class="col-lg-4 mb-3 mb-lg-0">
                    <input type="search" class="form-control fw-bold" placeholder="Search for an item" id="search-bar">
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0">
                    <div class="input-group">
                        <input type="text" class="location-bar form-control fw-bold" placeholder="All locations">
                        <span class="input-group-text btn" id="basic-addon1">
                            <i class="bi bi-search"></i>
                        </span>
                    </div>
                </div>
                <div class="col-lg-2 d-flex align-items-center" id="cart-area">
                    <a class="text-light btn w-100 rounded-pill border-0 fs-6 fw-bold btn-background me-3" id="btn-rent" href="{{url('product')}}"> Rent a bike</a>
                    <a href="{{url('cart')}}"><i class="fas fa-shopping-cart icon-color fs-5" id="cart-size"></i></a>
                </div>

            </div>
        </div>
    </nav>    
</form>