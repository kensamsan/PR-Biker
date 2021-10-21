<!doctype html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <link rel="icon" href="Images/Bikers_favicon.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/admin/dashboard.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js" integrity="sha512-BqNYFBAzGfZDnIWSAEGZSD/QFKeVxms2dIBPfw11gZubWwKUjEgmFUtUls8vZ6xTRZN/jaXGHD/ZaxD9+fDo0A==" crossorigin="anonymous"></script>
</head>

<style>
    .dashboard-card {
        box-shadow: 0 0 5px 5px rgba(0, 0, 0, 0.058);
        background-color: white;
    }

    .dashboard-icon {
        height: 50px;
        font-size: 50px;
    }

    .dashboard-card .card-header {
        background-color: white;
    }

    .count-info{
      text-align: right;
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
                        <a href="">Dashboard</a>
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
                <caption><h2 class="pt-3 pl-3" style="font-weight: 900;">Dashboard Overview</h2></caption>
                <p class="dashed"></p>
                <main class="p-3">
                    <div class="row">
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card dashboard-card">
                                <div class="card-body d-flex">
                                    <i class="fas fa-receipt dashboard-icon"></i>
                                    <div class="count-info w-100 text-end">
                                        <h4>Invoice Total</h4>
                                        <h1>0</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card dashboard-card">
                                <div class="card-body d-flex">
                                    <i class="fas fa-hands-helping dashboard-icon"></i>
                                    <div class="count-info w-100 text-end">
                                        <h4>Paid Rent</h4>
                                        <h1>0</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card dashboard-card">
                                <div class="card-body d-flex">
                                    <i class="fas fa-ban dashboard-icon"></i>
                                    <div class="count-info w-100 text-end">
                                        <h4>Unpaid Total</h4>
                                        <h1>0</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card dashboard-card">
                                <div class="card-body d-flex">
                                    <i class="fas fa-clock dashboard-icon"></i>
                                    <div class="count-info w-100 text-end">
                                        <h4>Pending Rents</h4>
                                        <h1>0</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row flex-grow">
                        <div class="col mb-3 flex-grow">
                          <div class="card h-100 dashboard-card">
                            <div class="card-header">
                              Monthly Earnings
                          </div>
                              <div class="card-body">
                                  <canvas id="monthlyEarnings" class="rounded m-0" style="border: solid 1px #707070;"></canvas>
                              </div>
                          </div>
                      </div>
                        <div class="col mb-3 flex-grow">
                            <div class="card h-100 dashboard-card">
                                <div class="card-header">
                                    Popular Products
                                </div>
                                <div class="card-body px-0 pt-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Store</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Sample</td>
                                                <td>Sample</td>
                                                <td>Sample</td>
                                            </tr>
                                            <!-- If no data -->
                                            <!-- <tr>
                                              <td colspan="3" class="text-center">No data in table</td>
                                          </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-3 flex-grow">
                            <div class="card h-100 dashboard-card">
                                <div class="card-header">
                                    Quick Details
                                </div>
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <script>
      $(document).ready(() => {
          let target = $('#monthlyEarnings');
          let labels = [
            'Jan','Feb','Mar','Apr'
          ];
          let dataset = [{
              data: [
                  123, 567, 890
              ],
              borderColor: '#707070',
              backgroundColor: '#707070',
          }];
  
          new Chart(target, {
              type: 'bar',
              data: {
                  labels: labels,
                  datasets: dataset
              },
              options: {
                  plugins: {
                      legend: {
                          display: false
                      }
                  },
                  responsive: true,
                  maintainAspectRatio: false
              }
          });
  
          window.addEventListener('beforeprint', () => {
              myChart.resize(600, 600);
          });
  
          window.addEventListener('afterprint', () => {
              myChart.resize();
          });
      });
  </script>
</body>

</html>
