@extends('template.master')

@section('content')

<link rel="stylesheet" href="/css/login.css">

<div class="bg-image">
        <div class="container-lg pt-5">
            <div class="row justify-content-center">

                <div class="col-lg-5">
                    <div class="mt-5 p-5 fs-1" id="logo">logo</div>
                </div>

                <!-- login form -->

                <div class="col-lg-6 col-md-8 col-sm-6">
                    <div class="mt-5 p-5 bg-light fst-italic" id="login-form">
                        <h1>LOGIN YOUR ACCOUNT</h1>

                        <form>
                            <div class="mb-3 ">
                                <input type="email" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="mb-3 justify-content-center">
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                            <a href="#">Forgot Password?</a>
                            <button type="submit" class="btn btn border-0 fs-4">LOGIN</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection