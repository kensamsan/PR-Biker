<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<link rel="stylesheet" href="/css/search.css">

<form method="post" action="{{ route('search-rent-bike') }}">
    <nav class="navbar navbar-expand-lg ps-lg-4 border-bottom border-2">
        <div class="container-fluid pe-0 pe-lg-3 ps-4 ps-lg-3">
            <div class="row align-items-center w-100">
                <div class="col-lg-3 text-lg-start text-center">
                    <a href="{{url('')}}"><img src="/images/navbarlogo.svg" alt="" class="img-fluid"></a>       
                </div>
                {{ csrf_field() }}
                <div id="search-item" class="col-lg-4 mb-3 mb-lg-0">
                    <div class="input-group mt-0">
                        <input style="background:#F3F3F5" name="search" type="text" class="form-control fw-bold m-0" placeholder="Search for available Bikes for Rent" aria-label="Username" aria-describedby="basic-addon1">
                         <button type="submit" class="btn btn-background">Submit</button>
                    </div>
                </div>
                <div class="col-lg-3 mb-3 mb-lg-0">
                    <div class="input-group">
                        <select name="brgy" style="color:gray; padding-left:25px;" type="text" class="location-bar form-control fw-bold m-0">
                            <option value="-1">Barangays of Las Piñas City</option>
                            <option value="ALMANZA DOS">ALMANZA DOS</option>
                            <option value="ALMANZA UNO">ALMANZA UNO</option>
                            <option value="B. F. INTERNATIONAL VILLAGE">B. F. INTERNATIONAL VILLAGE</option>
                            <option value="DANIEL FAJARDO">DANIEL FAJARDO</option>
                            <option value="ELIAS ALDANA">ELIAS ALDANA</option>
                            <option value="ILAYA">ILAYA</option>
                            <option value="MANUYO DOS">MANUYO DOS</option>
                            <option value="MANUYO UNO">MANUYO UNO</option>
                            <option value="PAMPLONA DOS">PAMPLONA DOS</option>
                            <option value="PAMPLONA TRES">PAMPLONA TRES</option>
                            <option value="PAMPLONA UNO">PAMPLONA UNO</option>
                            <option value="PILAR">PILAR</option>
                            <option value="PULANG LUPA DOS">PULANG LUPA DOS</option>
                            <option value="PULANG LUPA UNO">PULANG LUPA UNO</option>
                            <option value="TALON DOS">TALON DOS</option>
                            <option value="TALON KUATRO">TALON KUATRO</option>
                            <option value="TALON SINGKO">TALON SINGKO</option>
                            <option value="TALON TRES">TALON TRES</option>
                            <option value="TALON UNO">TALON UNO</option>
                            <option value="ZAPOTE">ZAPOTE</option>  
                        </select>
                       
                    </div>
                </div>
          
                <div class="col-lg-2 d-flex align-items-center" id="cart-area">
                    <a class="text-light btn w-100 rounded-pill border-0 fs-6 fw-bold btn-background me-3" id="btn-rent" href="{{url('rent')}}"> Rent a bike</a>
                    <a href="{{url('cart')}}"><i class="fas fa-shopping-cart icon-color fs-5" id="cart-size"></i></a>
                </div>
            </div>
        </div>
    </nav>    
</form>
