<!doctype html>
<html lang="en">

<head>
    <title>Users</title>
    <link rel="icon" href="Images/Bikers_favicon.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/admin/users.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<style>
    /* .card {
        border-radius: 1vh;
        width: 69rem;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    } */

    table {
        border-collapse: collapse;
        width: 100%;
    }

    table tr th {
        font-family: 'Poppins', sans-serif;
        color: #707070;
        font-weight: 900;
        text-align: center;
        border: solid 1px;
        border-left: hidden;
        border-right: hidden;

    }

    td,
    th {
        border: 1px solid #f1f1f1;
        color: #707070;
        text-align: left;
        padding: 4px;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f3f3f3;
    }

    .btn1 a {
        color: #0AA500;
    }

    .btn2 a {
        color: #FF0000;
    }

    .btn1,
    .btn2 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        background-color: transparent;
        border: none;
    }

</style>

<body>
    <div class="container-fluid px-0">
        <div class="d-flex flex-row px-0 mx-0">
            <div class="col-lg-2 px-0">
                <!-- Side Menu -->
                <nav class="side-menu d-flex flex-column px-0 mx-0">
                    <div class="logo">
                        <img class="p-2 img-fluid mx-auto mt-2 d-block " src="images/Group 29.png" alt="biker's logo"
                            style="width: 75%;">
                    </div>
                    <hr class="mb-2 mx-0">

                    <!-- menu links -->
                    <div class="menu-links d-flex flex-column pt-2 font-weight-bold">
                        <a href="{{ url('dashboard') }}">Dashboard</a>
                        <a class="mt-3 " href="{{ url('users') }}">Users</a>
                        <span class="mt-3 ">Listings</span>
                        <a class="pl-4 mt-2" href="{{ url('products') }}"><small>Products</small></a>
                        <a class="pl-4 " href="{{ url('rental') }}"><small>Rentals</small></a>
                        <span class="mt-3" href="">Reports</span>
                        <a class="pl-4 mt-2 " href="{{ url('costumer') }}"><small>Costumers</small></a>
                    </div>
                    <div class="d-flex flex-column-reverse h-100 text-center pb-3" style="flex: 1;">
                        <small>© 2021 Bikers</small>
                    </div>
                </nav>
            </div>

            <!-- Navbar -->
            <div class="col-lg px-0">
                <nav class="navbar navbar-expand-lg navbar-light " style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1)">
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <i class="fas fa-list-ul h3"></i>
                        <ul class="navbar-nav mt-2 mt-lg-0 ml-auto">
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
                    </div>
                </nav>
                <caption>
                    <h2 class="pt-3 pl-3" style="font-weight: 900;">Users</h2>
                </caption>
                <p class="dashed"></p>
                <!-- Main Conent -->
                <div class="card">
                    <div class="card-body">
                        <table>
                            <h4 style="font-weight: 900; color: #707070;">User List</h4>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>CONTACT</th>
                                <th>ACTION</th>
                    </div>
                    </td>
                    </tr>
                    <tr>
                        <td>1001</td>
                        <td>Mark Joseph</td>
                        <td>sample_email@email.com</td>
                        <td>
                            <div class="col-md-9 text-right">
                                <button type="button" class="btn1"><a
                                        href="user-details.html">VIEW</a></button>
                                <button type="button" class="btn2"><a href="">DELETE</a></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1002</td>
                        <td>Mark Joseph</td>
                        <td>sample_email@email.com</td>
                        <td>
                            <div class="col-md-9 text-right">
                                <button type="button" class="btn1"><a
                                        href="user-details.html">VIEW</a></button>
                                <button type="button" class="btn2"><a href="">DELETE</a></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1003</td>
                        <td>Mark Joseph</td>
                        <td>sample_email@email.com</td>
                        <td>
                            <div class="col-md-9 text-right">
                                <button type="button" class="btn1"><a
                                        href="user-details.html">VIEW</a></button>
                                <button type="button" class="btn2"><a href="">DELETE</a></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1004</td>
                        <td>Mark Joseph</td>
                        <td>sample_email@email.com</td>
                        <td>
                            <div class="col-md-9 text-right">
                                <button type="button" class="btn1"><a
                                        href="user-details.html">VIEW</a></button>
                                <button type="button" class="btn2"><a href="">DELETE</a></button>
                            </div>
                        </td>
                    </tr>
                    </table>
                </div>
            </div>
            <!--  End Main Conent -->
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
