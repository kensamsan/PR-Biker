<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bikers</title>

    <!-- Bootrsrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/main.css">

</head>

<body>

    <!--Dark navbar-->

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand"><img class="me-4" src="/images/navbarwhitebike.svg" alt="white logo">|</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{url('')}}" class="nav-link active" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('register')}}" class="nav-link">Marketplace</a>
                </ul>
            </div>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{url('login')}}" class="nav-link">Log-in</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('register')}}" class="nav-link">Register</a>
                </ul>
            </div>
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
