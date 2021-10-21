<!doctype html>
<html lang="en">

<head>
    <title>Product Details</title>
    <link rel="icon" href="Images/navbarwhitebike.svg">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/admin/users.css">
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

.btn1{
    color: #0AA500;
}
.btn2{
    color: #FF0000;
}
.btn1,.btn2{
    font-family: 'Poppins', sans-serif;
    font-weight:600;
    background-color: transparent;
    border: none;
}
.profile img{
    padding-top: 20pt;
    padding-bottom: 20pt;
    width: 70px;
}
.profile h4{
    font-family:'Poppins', sans-serif;
    font-weight: 600;
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
                <caption><h2 class="pt-3 pl-3" style="font-weight: 900;"><span><a href="{{url('products')}}" ><img src="Images/arrow-down-sign-to-navigate.png"  style="width: 15px;"></a></span> Product Details</h2></caption>
                <p class="dashed"></p>
              
                <!--  End Main Conent -->
                <div class="container-fluid pl-5">
                <div class="profile pt-2">
                    <h4>Product Photos</h4>
                    <img src="Images/lock-solid.png" alt="">
                </div>
                <h4 style="font-weight: 700;">Name</h4>
                <caption>Hiplok DX Bicycle U Lock</caption>
                <h4 style="font-weight: 700;">Description</h4>
                    <li>No Bracket Required - Integrated CLIP + RIDE system fits belts, bags & pockets</li>
                    <li> 3 x coded & replaceable keys</li>
                    
                    <h4 style="font-weight: 700;">Categories</h4>
                    <label class="container" style="font-size: 12pt;">Products
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
                      
                      <label class="container">Rentals
                        <input type="checkbox">
                        <span class="checkmark"></span>
                      </label>
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