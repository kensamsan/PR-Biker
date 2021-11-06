@extends('template.master')
@section('title', 'Register')
@section('content')
<link rel="stylesheet" href="/css/register.css">
<link rel="stylesheet" href="/css/login.css">

<link rel="icon" href="Images/navbarwhitebike.svg">
<div class="bg-image">
    <div class="container-fluid pt-5">
        <div class="row d-flex justify-content-around">
            <div class="col-lg-5">
                <div class=" align-self-center" id="logo-register"><img src="/images/whitelogo.svg" alt="white logo"></div>
                <p class="tagline text-center fs-4 fst-italic fw-bold">Shop, Buy and, Ride</p>
            </div>
            <div class="register-form col-lg-6 col-md-8 col-sm-12 mb-5 pb-5">
                <div class="mt-5 p-5 bg-light mx-auto my-auto">
                    <div class="form-header">
                        <h1 class="fs-1 text-uppercase fst-italic fw-bolder">Register An Account:</h1>
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

                    <div>
                    <form class="" action="{{ route('store-account') }}" method="post">
                    {{ csrf_field() }}
                        <div class="row mt-2">
                            <div class="col-2">
                                <i class="fs-1 mb-2 icons-register bi bi-person"></i>
                            </div>
                            <div class="col mt-2">
                                 <input class="rounded-3 form-control register-input" style="text-transform: capitalize;" placeholder="First Name" name="first_name">   
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-2">
                                <i class="fs-1 mb-2 icons-register bi bi-person"></i>
                            </div>
                            <div class="col mt-2">
                                 <input class="rounded-3 form-control register-input" style="text-transform: capitalize;" placeholder="Middle Name" name="middle_name">   
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-2">
                                <i class="fs-1 mb-2 icons-register bi bi-person"></i>
                            </div>
                            <div class="col mt-2">
                                 <input class="rounded-3 form-control register-input" style="text-transform: capitalize;" placeholder="Last Name" name="last_name">   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <i class="fs-1 icons-register bi bi-envelope"></i>
                            </div>
                            <div class="col mt-2">
                                <input class="rounded-3 form-control register-input" placeholder="Email Address"  name="email">  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <i class="fs-1 icons-register bi bi-telephone"></i>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3 mt-2">
                                    <span class="rounded input-group-text fw-bolder border-0 me-2" id="add-on" >+639</span>
                                    <input type="text" class="rounded form-control register-input" maxlength="9" placeholder="Phone Number"  name="contact">  
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <i class="fs-1 icons-register bi bi-lock"></i>
                            </div>
                            <div class="col mt-2">
                                <input type="password" class="rounded-3 form-control register-input" placeholder="Create Password"  name="password">  
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-2 phone-number">                            
                            </div>
                            <div class="col mt-1">
                                <input type="password" class="rounded-3 form-control register-input" placeholder="Repeat Password"  name="password_confirmation">  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7 col mt-4">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                  <label class="form-check-label fw-bolder fst-italic" for="gridCheck" id="terms" >
                                    Accept Terms and Conditions
                                  </label>
                                </div>                                            
                            </div>
                            <div class="col-lg-5 col-12 mt-3">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-register me-md-2 fs-5 fw-bolder px-5" id="btn-reg">REGISTER</button>
                                </div>
                            </div>
                        </div>
                        </form>
                        @if(Session::has('flash_error'))
                            <div class="alert alert-danger">{{Session::get('flash_error')}}</div>
                        @endif
                        @if($errors->has())
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
