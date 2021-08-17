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
  }
</style>

<nav class="navbar navbar-expand-lg bg-light lightnav">
    <div class="container-fluid">
        <div class="col-lg-3 col-sm-12">
            <img src="images/navbarlogo.svg" id="white-logo">
        </div>
        <form class="input-group">
            <div class="col-lg-6 col-12 ms-2 mt-1">
                <input type="search" class="form-control fw-bold" placeholder="Search for an item" id="search-bar">
            </div>
            <div class="row">
                <div class="col-lg-6 col-12" id="location">
                    <div class="input-group mb-3">
                        <input type="text" class="location-bar form-control fw-bold" placeholder="All locations">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="input-group-text bi bi-search"></i>
                        </span>
                    </div>
                </div>
               
                <div class="col mt-1">
                    <button class="mx-auto btn btn-rent rounded-pill border-0 fs-5 fw-bold" id="btn-rent">
                        Rent a bike
                    </button>
                </div>     
            </div>
        </form>
    </div>
</nav>
