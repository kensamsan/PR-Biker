@extends('template.master')

@section('content')
<link rel="stylesheet" href="/css/register.css">
<link rel="stylesheet" href="/css/login.css">
<link rel="stylesheet" href="/css/main.css">
<div class="bg-image">
    <div class="container-fluid pt-5">
        <div class="row d-flex justify-content-around">
            <div class="col-lg-5">
                <div class=" align-self-center" id="logo-register"><img src="/images/whitelogo.svg" alt="white logo"></div>
                <p class="tagline text-center fs-4 fst-italic fw-bold">Shop, Buy and, Ride</p>
            </div>
            <div class="register-form col-lg-6 col-md-8 col-sm-12 mb-5">
                <div class="mt-5 p-5 bg-light mx-auto my-auto">
                    <div class="form-header">
                        <h1 class="fs-1 text-uppercase fst-italic fw-bolder">Register An Account:</h1>
                        <p class=" fs-4 fst-italic lead">Get started by using your existing social accounts:</p>
                    </div>
                    

                    {{--<div class="flex-row gap-2 d-md-block"> 
                        <div class=" gap-2 d-md-block pb-2">
                            <button class="btn-register fw-bold border-0 col-lg-4" id="btn-fb" type="button">Login via
                                FACEBOOK</button>
                            <button class="btn-register fw-bold border-0 col-lg-3" id="btn-gmail" type="button">Login
                                via Gmail</button>
                        </div>
                    </div>
                    --}}

                    <p class=" fs-4 fst-italic lead">Or Register Manually:</p>
                    <div>
                        <div class="row mt-2">
                            <div class="col-2">
                                <i class="fs-1 mb-2 bi bi-person"></i>
                            </div>
                            <div class="col-lg-7 mt-2">


                               <form class="" action="{{URL::to('/store')}" method="post">  <input class="rounded-3 form-control register-input" placeholder="Full Name">   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <i class="fs-1 bi bi-envelope"></i>
                            </div>
                            <div class="col-lg-7 mt-2">
                                <input class="rounded-3 form-control register-input" placeholder="Email">  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <i class="fs-1 bi bi-telephone"></i>
                            </div>
                            <div class="col-lg-7">
                                <div class="input-group mb-3 mt-2">
                                    <span class="input-group-text fw-bolder border-0" id="add-on">+639</span>
                                    <input type="text" class="form-control register-input" placeholder="Phone Number">
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <i class="fs-1 bi bi-lock"></i>
                            </div>
                            <div class="col-lg-7 mt-2">
                                <input type="password" class="rounded-3 form-control register-input" placeholder="Create Password">  
                            </div>
                        </div>
                        
                        </form>


                        <div class="row">
                            <div class="col-2 phone-number">                            
                            </div>
                            <div class="col-lg-7 mt-1">
                                <input type="password" class="rounded-3 form-control register-input" placeholder="Repeat Password">  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col mt-4">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="gridCheck">
                                  <label class="form-check-label fw-bolder fst-italic" for="gridCheck" id="terms">
                                    Accept Terms and Conditions
                                  </label>
                                </div>                                            
                            </div>
                            <div class="col-lg-5 col-12 mt-3">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-register me-md-2 fs-5 fw-bolder" id="btn-reg">REGISTER</button>
                                  </div>
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
