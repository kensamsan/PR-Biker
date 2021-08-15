@extends ('template.user')

@section('content')
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="/css/user.css">


{{-- Main Content --}}
<div class="container-fluid mt-5">
    <div class="row ms-1">
        <div class="col-lg-2 col my-2 mt-3 float-start" id="logo">
            <img src="/images/navbarlogo.svg" alt="logo">
        </div>
        <div class="col-lg-9  mt-4 my-2 float-start">
            <div class="headers fs-2" id="user-settings">USER SETTINGS</div>
        </div>
    </div>
    <hr>
</div>


{{-- user profile picture --}}
<section>
    <div class="container-fluid">

        <div class="row">
            <div id="current-profile" class="col-lg-2 col-sm-6 pt-2 profile">
                <p class="fst-italic fs-5 ms-3 mt-2">Current Profile:</p>
                <img class="rounded mx-auto d-block mb-2" id="user-avatar" src="/images/girl.png"
                    alt="user's photo">
                <p class="ms-3 mt-4 fs-5 fw-bold fst-italic" id="user-name">Name</p>
                <p class="ms-3" id="user-email">bikername@gmail.com</p>

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
            <div class="main-form col-lg-8 col-sm-12 ms-2">
                <div class="headers col-sm-12 display-5 fst-italic d-block" id="edit-header">
                    Edit Profile
                </div>

                {{-- public profile form --}}

                <div class="row">
                    <div class="form-headers col-sm-6 display-6 fs-5 mt-4">Public Profile</div>
                </div>
                <hr>

                <form>
                    <div class="row">                       
                        <label class="col-lg-2 col-sm-3 col-form-label">Username</label>                       
                        <div class="col-lg-4">
                            <input type="username" class="form-control rounded-3">
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-lg-2 col-sm-4 col-form-label">First Name</label>
                        <div class="col-lg-4">
                            <input type="public-profile" class="form-control me-5 rounded-3">
                        </div>

                        <label class="col-lg-2 col-sm-4 col-form-label">Last Name</label>
                        <div class="col-lg-4">
                            <input type="public-profile" class="form-control rounded-3">
                        </div>
                    </div>

                    <div class="row mb-4 p-3">
                        <div class="me-1 col-lg-2 col-sm-3">
                            <label class="col-form-label">Gender</label>
                        </div>

                        <div class="col-lg-4">
                            <select id="inputState" class="form-select rounded-2 fs-6">
                                <option selected>Choose...</option>
                                <option value="1">Female</option>
                                <option value="2">Male</option>
                            </select>
                        </div>
                    </div>
                </form>


                {{-- location form --}}
                <div class="form-headers display-6 fs-5">Location</div>
                <hr>

                <form class="row">
                    <div class="row">
                        <div class="col-lg-2 col-sm-4">
                            <label class="col-form-label">Home Address</label>
                        </div>

                        <div class="pb-2 col-lg-2 col-sm-9">
                            <input type="address" class="form-control rounded-3">
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-lg-2 col-sm-4 col-form-label">
                            Barangay No.
                        </label>
                        <div class="col-lg-4">
                            <input type="home-address" class="form-control me-5 rounded-3">
                        </div>

                        <label class=" col-lg-2 col-sm-4 col-form-label">Zip No.</label>
                        <div class="col-lg-1">
                            <input type="home-address" class="form-control rounded-3">
                        </div>
                    </div>

                    <div class="row mb-4 p-3">
                        <div class="me-3 col-lg-2 col-sm-3">
                            <label class="col-form-label">City/State</label>
                        </div>

                        <div class="col-lg-9">
                            <select id="inputState" class="form-select fs-6">
                                <option value="1">Manila</option>
                                <option value="2">Quezon City</option>
                                <option value="3">Mandaluyong</option>
                                <option value="4">Marikina</option>
                                <option value="5">Las Piñas</option>
                                <option value="6">Cavite</option>
                            </select>
                        </div>
                    </div>
                </form>

                {{-- Private Information --}}

                <div class="form-headers display-6 fs-5">Private Information</div>
                <hr>

                <form>
                    <div class="row mb-5">
                        <div class="row">
                            <div class="col-lg-2 col-sm-4">
                                <label class="col-form-label">Email Address</label>
                            </div>

                            <div class="pb-2 col-lg-1 col-md-6 col-sm-9">
                                <input type="address" class="form-control rounded-3">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>



@endsection
