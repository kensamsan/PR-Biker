<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="Images/Bikers_favicon.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/admin/dashboard.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"
        integrity="sha512-BqNYFBAzGfZDnIWSAEGZSD/QFKeVxms2dIBPfw11gZubWwKUjEgmFUtUls8vZ6xTRZN/jaXGHD/ZaxD9+fDo0A=="
        crossorigin="anonymous"></script>
        <title>Bikers @yield('title')</title>
</head>
<body>
    
    <div class="container-fluid p-0">
        <div class="d-flex flex-row px-0 mx-0">
            <div class="col-lg-2 px-0">
                <!-- Side Menu -->
                <style>
                    .menu-links a{text-decoration: none;}
                </style>
                
                <nav class="side-menu d-flex flex-column px-0 mx-0">
                    <div class="logo">
                        <img class="p-2 img-fluid mx-auto mt-2 d-block " src="images/Group 29.png" alt="biker's logo" style="width: 75%;">
                    </div>
                    <hr class="mb-2 mx-0">
                
                    <!-- menu links -->
                    <div class="menu-links d-flex flex-column pt-2">
                    <a href="{{url('dashboard')}}"><b>Dashboard</b></a>
                        <a class="mt-3 " href="{{url('users')}}"><b>Users</b></a>
                        <span class="mt-3"><b>Listings</b></span>
                        <a class="ps-4 mt-2" href="{{url('products')}}"><small>Products</small></a>
                        <a class="ps-4 " href="{{url('rental')}}"><small>Rentals</small></a>
                        <span class="mt-3" href=""><b>Reporters</b></span>
                        <a class="ps-4 mt-2 " href="{{url('costumer')}}"><small>Costumers</small></a>
                    </div>
                    <div class="d-flex flex-column-reverse h-100 text-center pb-3" style="flex: 1;">
                        <small>© 2021 Bikers</small>
                    </div>
                </nav>
            </div>
            <div class="col-lg px-0 mx-0">
                <nav class="navbar navbar-expand-lg navbar-light " style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1)">
                    <ul class="navbar-nav mt-2 mt-lg-0 ms-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">
                                <img class="notif-bell" src="Images/bell.png" alt="">
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="admin-photo img-fluid pr-2" src="Images/account.png" alt="admin photo">
                                <span>Admin</span>
                            </a>
                            <div class="dropdown-menu w-10" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Logout</a>
                            </div>
                        </li>
                    </ul>
                </nav>
               
                <div class="body">
                    @yield('body')
                </div>
    
    
            </div>
        </div>
    </div>
    
</body>
</html>