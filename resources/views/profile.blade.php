@extends('template.master')
@section('title', 'Profile')
@section('content')
<link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/user.css">
<link rel="icon" href="Images/navbarwhitebike.svg">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 mt-3">
            <img class="img-fluid" src="/images/navbarlogo.svg" alt="logo">
        </div>
        <div class="col-lg-4 col-6 mt-2">
            <div class="headers fs-1 fst-italic lead" id="user-settings">YOUR PROFILE</div>
        </div>
    </div>
    <hr>
</div>

<div class="row ms-4">
    <div class="headers col-lg-6 pt-3">
        <h1 class="fst-italic fw-bolder">Current Listings</h1>
    </div>
</div>
<div class="container-fluid mx-3 mt-3 mb-5">
    <div class="row my-auto w-100">
        <div class="col-lg-9 listing-container shadow p-4">
            
        </div>

        <div class="col-lg-3">
                <div class="profile-card card" id="product-profile">
                    <p class="fst-italic fs-5 ms-2 mt-2">Your Profile:</p>
                    <img src="/uploads/users/{{Auth::user()->photo}}" class="card-img-top" alt="user's photo">
                    <div class="card-body">
                        <p class="card-text fw-bold fst-italic fs-5" id="user-name">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                        <p class="card-text fw-normal fst-italic" id="user-email">{{Auth::user()->email}}</p>
                        <a class="fw-normal fs-6 fst-italic lead mt-5 me-1" href="{{url('settings')}}"><i class="bi bi-gear me-1"></i>Tweak your profile</a>
                        <a class="fw-normal fs-6 fst-italic lead mt-5" href="{{url('my-orders')}}"><i class="bi bi-gear me-1"></i>My Orders</a>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

@endsection
