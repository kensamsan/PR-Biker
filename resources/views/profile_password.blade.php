@extends('template.master')
@section('title', 'Profile')
@section('content')
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/user.css">
    <link rel="icon" href="Images/navbarwhitebike.svg">
    <style>
        .caption {
            display: none;
            transition: background-color .5s;
        }

        .caption-cam {
            float: right;
            display: block;
            color: #fff;
            position: absolute;
            /* bottom: 5px; */
            bottom: -25px;
            left: 7px;
            transition: bottom .5s;
        }

        .img_caption:hover .caption-cam {
            bottom: 8px
        }

        .img_caption:hover .caption {
            display: block;
            height: 45px;
            /* height: 50px; */
            width: 100%;
            background-color: #cccccc42;
            background-color: #00000042;
            position: absolute;
            bottom: 0;
            margin: 0;
            /* border-bottom-left-radius: 8px; */
            /* border-bottom-right-radius: 8px; */
            padding-top: 15px;
            color: #fff;
            cursor: pointer;
            text-align: center;
        }

        .caption:hover {
            /* background-color: #00000042 !important; */
            background-color: #00000069 !important;
        }

        .fields-boi>.row>.col-md-3,
        .fields-boi>.row>.col-md-4,
        .fields-boi>.row>.col-md-6 {
            padding-top: 20px;
        }

        .formError {
            z-index: 0 !important;
        }

        .formError .formErrorContent {
            z-index: 0 !important;
        }

        .input-group .form-control {
            z-index: 0 !important;
        }

        .usetwentyfour {
            width: 350px !important;
            height: 420px !important;
        }

        .img_caption {
            overflow: hidden;
            position: relative;
            outline: 5px solid #f1f2f6;
        }

    </style>

    <div class="container-fluid mx-3 mt-5 mb-5">
    {{ Form::open(array('route' => array('profile.password.update'),'files' => true,'method' => 'put','id'=>'editUserPasswordForm')) }}
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #fff">
                        <h4 class="panel-title">
                            <i class="fa fa-info-circle"></i> {{$user->first_name}} {{$user->middle_name}} {{$user->last_name}} 
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group {{ $errors->first('old_password') ? 'has-error' : '' }} ">
                                    {{ Form::label('old_password', 'Old Password', array('class'=>'control-label')) }}
                                    {{ Form::password('old_password',array('class'=>'form-control validate[required]','placeholder' => 'Old Password')) }}
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group {{ $errors->first('new_password') ? 'has-error' : '' }} ">
                                    {{ Form::label('new_password', 'New Password', array('class'=>'control-label')) }}
                                    {{ Form::password('new_password',array('class'=>'form-control validate[required]','placeholder' => 'New Password','id'=>'pass')) }}
                                </div>  
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group {{ $errors->first('new_password_confirmation') ? 'has-error' : '' }} ">
                                    {{ Form::label('new_password_confirmation', 'Password Confirmation', array('class'=>'control-label')) }}
                                    {{ Form::password('new_password_confirmation',array('class'=>'form-control validate[equals[pass]]','placeholder' => 'New Password Confirmation')) }}
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-offset-9 col-md-3 col-lg-offset-9 col-lg-3">
                                <button type="submit" class="btn btn-success btn-block btnUserSubmit">
                                    &nbsp;Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
       
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            @if (Session::has('flash_message'))
                Swal.fire(
                'Success',
                '{{ Session::get('
                            flash_message ') }}',
                'success'
                )
            @endif


        });
    </script>
@endsection
