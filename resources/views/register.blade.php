@extends('template.master')

@section('content')
<link rel="stylesheet" href="/css/register.css">
<div class="bg-image">
        <div class="container-lg pt-5">
            <div class="row justify-content-center">


                <div class="col-lg-5">
                    <div class="mt-5 p-5 fs-1" id="logo">logo</div>
                </div>

                <div class="col-lg-7 col-md-8 col-sm-6">
                    <div class="mt-0 p-5 bg-light fst-italic" id="login-form">

                        <div class="login-form2">
                            <h1><b>REGISTER AN ACCOUNT:</b></h1>
                            <h4>
                                Get started by using existing social account:
                            </h4>
                            <div class="row my-3 mr-5">
                                <div class="col">
                                    <button type="submit"
                                        class="btn btn-custom btn-blue form-control border-0 fs-5">Facebook</button>
                                </div>
                                <div class="col">
                                    <button type="submit"
                                        class="btn btn-custom btn-red form-control border-0 fs-5">Gmail</button>
                                </div>
                                <div class="col-lg-3 col-sm-12"></div>
                            </div>

                            <div class="mb-3 justify-content-center">
                                <h4>Or Register Manually:</h4>
                            </div>

                        </div>
                        <form class="">
                            <div class="mb-1 ">
                                <input type="text" class="form-control" placeholder="Full name">
                            </div>
                            <div class="mb-1 ">
                                <input type="text" class="form-control" placeholder="Email Address">
                            </div>

                            <!-- create phone number here -->





                            <div class="mb-1 justify-content-center">
                                <input type="password" class="form-control" placeholder="Create Password">
                            </div>
                            <div class="mb-1 justify-content-center">
                                <input type="password" class="form-control" placeholder="Repeat Password">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Accept Terms and Conditions
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn form-control border-0 fs-4">REGISTER</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection