<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <title>Bikers</title>
    <link rel="icon" href="/images/Bikers_favicon.png">
    

    <!-- Bootrsrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/064c566762.js" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/main.css">

</head>
<style>
    .user-photo {
        width: 25px;
        clip-path: circle();
    }
    .dropdown-menu {
        background-color: #212529 !important;
        border-radius: 27px 0px 27px 27px;
    }
    .navbar a{
        color: #fff;
    }

    .navbar a:hover{
        color: #fff;
        border-radius: 27px 0px 27px 27px;
    }
    .dropdown-menu a:hover {
         background-color: rgba(221,213,205, 0.3);
    }
    .dropdown-item .bi {
        color: #EA5656;
    }
</style>
<body class="d-flex flex-column min-100-vh">
    <!--Dark navbar-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('')}}"><img class="me-4" src="/images/navbarwhitebike.svg" alt="white logo">|</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{url('')}}" class="nav-link active" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('marketplace')}}" class="nav-link">Marketplace</a>
                </ul>
            </div>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link fw-bold text-light" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/images/image-placeholder.jpeg" class="user-photo" alt="user's photo"> {{Auth::user()->full_name}} 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{url('profile')}}">
                                    <i class="me-1 bi bi-person"></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{url('settings')}}">
                                    <i class="fw-bold me-1 bi bi-gear"></i>
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{url('my-orders')}}">
                                    <i class="fw-bold me-1 bi bi-truck"></i>
                                    Order Tracking
                                </a>
                            </li> 
                            <li>
                                <a class="dropdown-item" href="{{url('my-listings')}}">
                                    <i class="fw-bold me-1 bi bi-truck"></i>
                                    My Listings
                                </a>
                            </li>  
                            <li>
                                <a class="dropdown-item" href="{{url('my-rentals')}}">
                                    <i class="fw-bold me-1 bi bi-truck"></i>
                                    Rental Tracking
                                </a>
                            </li>  
                            <li>
                                <a class="dropdown-item" href="{{url('logout')}}">
                                <i class="fw-bold me-1 bi bi-box-arrow-right"></i>
                                Logout
                                </a>
                            </li>                     
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{url('login')}}" class="nav-link">Log-in</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('register')}}" class="nav-link">Register</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @if (!Request::is('profile')&&!Request::is('login')&&!Request::is('register')&&!Request::is('order-tracking'))
        @include('template.search')
    @endif
    {{-- Main content --}}
    <div class="flex-grow-1" id="content">
        @yield ('content')
    </div>

    <!--Footers-->
    <footer class="pt-5 pb-3">
        <div class="container-fluid">

            <h2><b>FOLLOW US:</b> </h2>
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-instagram"></a>
            <a href="#" class="fa fa-twitter"></a>

            <div class="col-lg-0 pt-3">

                <div class="d-flex justify-content">

                    <p class="fw-normal fst-italic">&copy; 2021 Bikers &nbsp; &nbsp;</p>


                    <a href="#NeedHelps?" class="footer-link fw-normal">&nbsp; Need help? &nbsp; &#8226; &nbsp; </a>
                    <a href="#contactus" class="footer-link fw-normal">&nbsp; Contact us &nbsp; &#8226; &nbsp;</a>
                    <a href="#Terms" class="footer-link fw-normal">&nbsp; Terms &nbsp; &#8226; &nbsp;</a>
                    <a href="#Privacy" class="footer-link fw-normal">&nbsp; Privacy &nbsp;</a>

                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
   

</body>

</html>
