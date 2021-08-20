<style>
@media (max-width: 575.98px) { 
    #btn-rent {
       margin-top: 2rem!important;
    }
    #white-logo {
       display: none;
    }
 } 
 @media (max-width: 991.98px) { 
    #white-logo {
       display: none;
    }
    #btn-rent {
       margin-top: 2rem!important;
    }
  }

  #btn-rent a {
      color: #ffffff;

  }
</style>

<nav class="navbar navbar-expand-lg bg-light lightnav">
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
                        <span class="input-group-text" id="basic-addon1">
                            <i class="input-group-text bi bi-search"></i>
                        </span>
                    </div>
                </div>             
                <div class="col-lg-3">
                    <a class="text-light mx-auto btn btn-rent rounded-pill border-0 fs-5 fw-bold" id="btn-rent" 
                    href="{{url('product')}}">
                    Rent a bike
                    </a>               
                </div>     
        </form>
    </div>
</nav>
