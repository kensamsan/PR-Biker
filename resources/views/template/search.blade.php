<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<link rel="stylesheet" href="/css/search.css">

<nav class="navbar navbar-expand-lg lightnav border-bottom border-2">
    <div class="container-fluid">
        <div class="col-lg-3 col-sm-12">
            <img class="img-fluid" src="/images/navbarlogo.svg" id="white-logo">
        </div>
        <form class="row input-group search-location">
            <div class="col-lg-6 col-md-7 col-12">
                <input type="search" class="form-control fw-bold" placeholder="Search for an item" id="search-bar">
            </div>
            <div class="col-lg-3 col-md-7" id="location">
                <div class="input-group">
                    <input type="text" class="location-bar form-control fw-bold" placeholder="All locations">
                    <span class="input-group-text btn" id="basic-addon1">
                        <i class="bi bi-search"></i>
                    </span>
                </div>
            </div>
            <div class="col-lg-2">
                <a class="text-light mx-auto btn rounded-pill border-0 fs-5 fw-bold" id="btn-rent"
                    href="{{url('product')}}">
                    Rent a bike
                </a>
            </div>
            <div class="col-lg-1">
                <i class="fas fa-shopping-cart icon-color fs-5 pt-2" id="cart-size"></i>
            </div>
        </form>
    </div>
</nav>
