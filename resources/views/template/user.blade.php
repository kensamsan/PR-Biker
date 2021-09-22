<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bikers</title>
    <link rel="icon" href="Images/navbarwhitebike.svg">

    <!-- Bootrsrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/064c566762.js" crossorigin="anonymous"></script>
    {{-- Custom css --}}
    <link rel="stylesheet" href="/css/main.css">
</head>
<style>
    .user-photo {
        width: 25px;
        clip-path: circle();
    }
    .dropdown-menu {
        background-color: #212529;
        border-radius: 27px 0px 27px 27px;
    }
    .navbar a{
        color: #fff;
    }

    .navbar a:hover{
        color: #fff;
    }
    .dropdown-menu a:hover {
         background-color: rgba(221,213,205, 0.3);
    }
    .dropdown-item .bi {
        color: #EA5656;
    }

    .dropdown:hover>.dropdown-menu {
        display: block;
    }

</style>

<body>

    <!--Dark navbar-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand"><img class="me-4" src="/images/navbarwhitebike.svg" alt="white logo">|</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">

                <span class="navbar-toggler-icon"></span>
            </button>
           
           
        </div>
    </nav>

    {{-- Main content --}}
    <div id="content">
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

                    <p class="fw-normal fst-italic pe-3">&copy; 2021 Bikers &nbsp; &nbsp;</p>


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
