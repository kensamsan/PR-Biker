@extends ('template.user')

@section('content')
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="/css/user.css">


{{-- custom css --}}
<style>

    input[type=password] {
        /* width: 300px; */
        height: 25px;
    }

    .form {
        margin-bottom: 400px !important;
    }

    .btn-change {
        background: #EA5656;
        font-size: 15px;
        height: 25px;
        padding: 0px 15px 0px 15px !important;
    }

    #current-profile {
        margin: 0 50px 0px!important;
    }

</style>



{{-- Main Content --}}
<div class="container">
    <div class="row">
        <div class="col-lg-1 my-2">
            <div class="fs-1">logo</div>
        </div>
        <div class="col-lg-4 col-12 mt-4 my-2">
            <div class=" headers fs-2 mx-0">USER SETTINGS</div>
        </div>
    </div>
    <hr>
</div>

{{-- user profile picture --}}
<section>
    <div class="container">
        <div class="row">
            <div id="current-profile" class="col-lg-3 col-sm-6 pt-2 profile">
                <p class="fst-italic fs-5 ms-3">Current Profile:</p>
                <img class="rounded mx-auto d-block mb-2" id="user-avatar" src="/images/girl.png"
                    alt="user's photo">
                <p class="ms-3 fs-5 fw-bold fst-italic">Name</p>
                <p class="ms-3" style="font-weight: 490;">bikername@gmail.com</p>

                {{-- profile buttons --}}

                <div class="flex-column d-grid d-block gap-2 mt-3">
                    <button class="rounded-pill btn fst-italic fw-bold mt-5" id="btn-edit">
                        <a class="btn-edit-a" href="{{url('#')}}">Edit Profile</a>
                    </button>
                    <button class="rounded-pill btn fst-italic fw-bold" id="btn-password">
                        <a href="{{url('password')}}">Change Password</a>
                    </button>
                </div>
            </div>  
            
            {{-- user settings form --}}
            <div class="col-lg-6 ms-2">

                <div class="headers col-sm-12 display-5 fw-bolder fst-italic d-block">
                    Change Password
                </div>


                {{-- public profile form --}}
                <form class="form mt-2">
                    <div class="row">
                        <div class="col-lg-4 col-sm-3 text-center">
                            <label class="col-form-label">Current Password</label>
                        </div>
                        <div class="col-lg-6 col-10">
                            <input type="password" class="form-control rounded-3">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-3 text-center">
                            <label class="col-form-label">New Password</label>
                        </div>
                        <div class="col-lg-6 col-10">
                            <input type="password" class=" form-control rounded-3">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-3 text-center">
                            <label class="col-form-label">Repeat New Password</label>
                        </div>
                        <div class="col-lg-6 col-10">
                            <input type="password" class=" form-control rounded-3">
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-5">

                        </div>
                        <div class="col-lg-3">
                            <button class="rounded-pill btn btn-change text-uppercase fw-bold form-control" type="button">Change Password</button>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</section>



@endsection
