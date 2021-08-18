@extends ('template.user')

@section('content')
<link rel="stylesheet" href="/css/user.css">
<link rel="stylesheet" href="/css/main.css">

<style>
    @media (max-width: 991.98px) {
    #pass-header{
        display: none;
    }
 }

input[type=password] {
    height: 25px;
}
</style>
{{-- Main Content --}}

{{-- logo and header --}}
@include('template.whitebar')

{{-- user profile picture --}}
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-12">
                <div class="profile-card card">
                    <p class="fst-italic fs-5 ms-2 mt-2">Current Profile:</p>
                    <img src="/images/girl.png" class="card-img-top" alt="user's photo">
                    <div class="card-body">
                        <p class="card-text fw-bold fst-italic fs-5" id="user-name">Name</p>
                        <p class="card-text fw-normal fst-italic" id="user-email">bikername@gmail.com</p>
                    </div>
                </div>            
                <div class="col-12 d-grid gap-2 mt-2">
                    <button class="rounded-pill btn fst-italic fw-bold" id="btn-edit">
                        <a href="{{url('settings')}}">Edit Profile</a>
                    </button>
                    <button class="rounded-pill btn fst-italic fw-bold mb-3" id="btn-password">
                        <a href="{{url('password')}}">Change Password</a>
                    </button>
                </div>          
            </div>
            
            
            {{-- password settings form --}}
            <div class="col-lg-7 col-12 ms-1 mt-3 mb-5">
                <div class="headers col-sm-12 display-5 fw-bolder fst-italic" id="pass-header">
                    Change Password
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-12 text-center">
                        <label class="col-form-label">Current Password</label>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <input type="password" class="form-control rounded-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-12 text-center">
                        <label class="col-form-label">New Password</label>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <input type="password" class="form-control rounded-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-12 text-center">
                        <label class="col-form-label">Repeat New Password</label>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <input type="password" class="form-control rounded-3">
                    </div>
                </div>
            </div>          
        </div>
    </div>
</section>
@endsection
