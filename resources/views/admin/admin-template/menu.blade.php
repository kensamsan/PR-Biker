<style>
    .menu-links a{
        text-decoration: none;
    }
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
        <a class="ps-4 mt-2 " href="{{url('costumer')}}"><small>Customers</small></a>
    </div>
    <div class="d-flex flex-column-reverse h-100 text-center pb-3" style="flex: 1;">
        <small>© 2021 Bikers</small>
    </div>
</nav>