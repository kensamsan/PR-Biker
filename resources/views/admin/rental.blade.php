<!doctype html>
<html lang="en">

<head>
    <title>Rentals</title>
    <link rel="icon" href="Images/Bikers_favicon.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/admin/rental.css">
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

.card{
    margin-left: 10pt;
    border-radius: 1vh;
    width: 69rem;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

table {
  border-collapse: collapse;
  width: 100%;
}

table tr th{
    font-family: 'Poppins', sans-serif;
    color: #707070;
    font-weight: 900;
    text-align: center;
    border: solid 1px;
    border-left: hidden;
    border-right: hidden;
    
}

td, th {
  border: 1px solid #f1f1f1;
  color: #707070;
  text-align: left;
  padding: 4px;
  text-align: center;
}

tr:nth-child(even) {
  background-color: #f3f3f3;
}

.btn1 a{
    color: #0AA500;
}
.btn2 a{
    color: #FF0000;
}
.btn1,.btn2{
    font-family: 'Poppins', sans-serif;
    font-weight:600;
    background-color: transparent;
    border: none;
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
                @include('admin.admin-template.main')
                <!-- Main Conent -->
                <caption><h2 class="pt-3 pl-3" style="font-weight: 900;">Rentals</h2></caption>
                <p class="dashed"></p>
                <div class="card">
                  <div class="card-body">
                    <table>
                        <h4 style="font-weight: 900; color: #707070;">Rentals List</h4>
                        <tr>
                          <th>ID</th>
                          <th>NAME</th>
                          <th>PRICE</th>
                          <th>ACTION</th>
                        </div>
                        </td>
                        </tr>
                        <tr>
                          <td>1001</td>
                          <td>Triban RC 100 Road Bike</td>
                          <td>PHP 2,500.00</td>
                          <td><div class="col-md-9 text-right">
                            <button type="button" class="btn1"><a href="{{url('rental-details')}}">VIEW</a></button>
                            <button type="button" class="btn2"><a href="">DELETE</a></button>
                        </div>
                        </td>
                        </tr>
                        <tr>
                          <td>1002</td>
                          <td>ROCKRIDER SPORT TRAIL 100 BLACK</td>
                          <td>PHP 2,500.00</td>
                          <td><div class="col-md-9 text-right">
                            <button type="button" class="btn1"><a href="rental-details.html">VIEW</a></button>
                            <button type="button" class="btn2"><a href="">DELETE</a></button>
                        </div>
                        </td>
                        </tr>
                      </table>
                  </div>
                </div>
                <!--  End Main Conent -->
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