<link rel="stylesheet" href="/css/admin/users.css">

@extends('admin.admin-template.main')
@section('title', 'Costumer Details')

@section('body')

    <h3 class="ps-2 pt-4 pb-2 fs-2"><a href="/costumer"><i class="fas fa-chevron-left me-3 text-dark"></i></a><b>Costumer Details</b></h3>
    <p class="dashed"></p>
    
    <div class="row mx-5 my-5">
        <div class="container-fluid pl-5">
            <div class="profile pt-2">
                <h4>Profile Photo</h4>
                <img class="user-profilephoto" src="Images/image-placeholder.jpeg" alt="">
            </div>
            <h4 style="font-weight: 700;">Name</h4>
            <caption>Customer Name</caption>
            <h4 class="mt-3" style="font-weight: 700;">Concern</h4>
            <caption>8 Don Manolo Blvd, Cupang, Muntinlupa, 1770 Metro Manila</caption>
        </div>
    </div>

@endsection
