<!doctype html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <link rel="icon" href="Images/navbarwhitebike.svg">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/admin/dashboard.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<style>

.card-counter{
  border: #707070;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

table {
  border-collapse: collapse;
  width: 100%;
}

table tr th{
    font-family: 'Poppins', sans-serif;
    color: #707070;
    font-size: 9pt;
    font-weight:800;
    text-align: center;
    border: solid 1px;
    border-left: hidden;
    border-right: hidden;
   
    
}

#tag{
  font-size: 10pt;
  font-weight: 600;
  color: #707070;
  background-color: #d8d8d8;
  padding: 6pt;
  text-align: center;
}

td, th {
  border: 1px solid #f1f1f1;
  color: #707070;
  text-align: left;
  padding: 4px;
 
}

tr:nth-child(even) {
  background-color: #f3f3f3;
}


.items ul li{
  display: inline-block;
  font-size: 10pt;
  font-weight: 500;
  padding-top: 25vh;
  padding-left: 0;
  text-indent: 12pt;
}


</style>

<body>
    <div class="container-fluid px-0">
        <div class="d-flex flex-row px-0 mx-0">
            <div class="col-lg-2 px-0">
                <!-- Side Menu -->
                @include('admin.admin-template.menu')
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

                <!-- Main Conent -->
                <caption><h2 class="pt-3 pl-3" style="font-weight: 900;">Dashboard Overview</h2></caption>
                <p class="dashed"></p>
                <div class="container pt-2">
                    <div class="row">
                    <div class="col-md-3">
                      <div class="card-counter icon">
                        <i class="icon"><img src="Images/receipt-solid.png" alt=""></i>
                        <span class="count-name">Invoice Total</span>
                        <span class="count-numbers">10</span>
                        
                      </div>
                    </div>
                
                    <div class="col-md-3">
                      <div class="card-counter icon">
                        <i class="icon"><img src="Images/hands-helping-solid.png" alt=""></i>
                        <span class="count-name">Paid Rents</span>
                        <span class="count-numbers">20</span>
                      </div>
                    </div>
                
                    <div class="col-md-3">
                      <div class="card-counter icon">
                        <i class="icon"><img src="Images/ban-solid.png" alt=""></i>
                        <span class="count-name">Unpaid Total</span>
                        <span class="count-numbers">30</span>
                      </div>
                    </div>
                
                    <div class="col-md-3">
                      <div class="card-counter icon">
                        <i class="icon"><img src="Images/clock-solid.png" alt=""></i>
                        <span class="count-name">Pending Rets</span>
                        <span class="count-numbers">40</span>
                      </div>
                    </div>

                    <div class="col-md-3 pt-5">
                        <div class="card-counter" style="width: 22rem; padding-bottom: 15rem;">
                            <div class="monthly">
                          <h6>Monthly Earnings</h6>
                          <p class="dashed"></p>
                          <div class="items">
                            <ul>
                              <li>Jan</li>
                              <li>Feb</li>
                              <li>Mar</li>
                              <li>Apr</li>
                              <li>May</li>
                              <li>Jun</li>
                            </ul>
                          </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-3 pt-5">
                        <div class="card-counter" style="margin-left: 45%; width: 26.5rem; margin-right: 0; padding-bottom: 15rem;">
                            <div class="popular">
                          <h6>Popular Products</h6>
                          <table>
                            <tr>
                              <th>Products</th>
                              <th>Store</th>
                              <th>Actions</th>
                            </tr>
                        </table>
                        <div id="tag">No Availve Data in Table</div>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-3 pt-5">
                        <div class="card-counter " style="margin-left: 47vh; width: 15rem; padding-bottom: 15rem;">
                            <div class="popular">
                          <h6>Quick Details</h6>
                          <p class="dashed"></p>
                        </div>
                        </div>
                    </div>

                    </div>
                  </div>
                </div>
                <!--  End Main Conent -->
            </div>
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