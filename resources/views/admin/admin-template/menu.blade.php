<nav class="side-menu d-flex flex-column px-0 mx-0">
    <div class="logo">
        <img class="p-2 img-fluid mx-auto mt-2 d-block " src="images/Group 29.png" alt="biker's logo" style="width: 75%;">
    </div>
    <hr class="mb-2 mx-0">

    <!-- menu links -->
    <div class="menu-links d-flex flex-column pt-2 font-weight-bold">
    <a href="{{url('dashboard')}}">Dashboard</a>
        <a class="mt-3 " href="{{url('users')}}">Users</a>
        <span class="mt-3 ">Listings</span>
        <a class="pl-4 mt-2" href="{{url('products')}}"><small>Products</small></a>
        <a class="pl-4 " href="{{url('rental')}}"><small>Rentals</small></a>
        <span class="mt-3" href="">Reporters</span>
        <a class="pl-4 mt-2 " href="{{url('costumer')}}"><small>Customers</small></a>
    </div>
    <div class="d-flex flex-column-reverse h-100 text-center pb-3" style="flex: 1;">
        <small>© 2021 Bikers</small>
    </div>
</nav>