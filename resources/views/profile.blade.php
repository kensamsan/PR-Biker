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
        {{ Form::open(['route' => ['my-profile.update'], 'method' => 'put', 'files' => true, 'id' => 'createUsersForm']) }}
        <div class="row my-auto w-100">
            <div class="col-lg-9 listing-container shadow p-4 mx-auto">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #fff">
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h4><strong>Personal Information</strong></h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group {{ $errors->first('last_name') ? 'has-error' : '' }} ">
                                    {{ Form::label('last_name', 'Last Name', ['class' => 'control-label']) }}
                                    {{ Form::text('last_name', $user->last_name, ['class' => 'form-control validate[required]', 'placeholder' => 'Last Name']) }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group {{ $errors->first('first_name') ? 'has-error' : '' }} ">
                                    {{ Form::label('first_name', 'First Name', ['class' => 'control-label']) }}
                                    {{ Form::text('first_name', $user->first_name, ['class' => 'form-control validate[required]', 'placeholder' => 'First Name']) }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group {{ $errors->first('middle_name') ? 'has-error' : '' }} ">
                                    {{ Form::label('middle_name', 'Middle Name', ['class' => 'control-label']) }}
                                    {{ Form::text('middle_name', $user->middle_name, ['class' => 'form-control validate[required]', 'placeholder' => 'Middle Name']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group {{ $errors->first('contact_no') ? 'has-error' : '' }} ">
                                    {{ Form::label('contact_no', 'Contact No.', ['class' => 'control-label']) }}
                                    {{ Form::text('contact_no', $user->contact, ['class' => 'form-control validate[required]', 'placeholder' => 'Contact No.']) }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-4">
                                <div class="form-group {{ $errors->first('email_address') ? 'has-error' : '' }} ">
                                    {{ Form::label('email_address', 'Email Address', ['class' => 'control-label']) }}
                                    {{ Form::email('email_address', $user->email, ['class' => 'form-control validate[required,custom[email]]', 'placeholder' => 'Email Address', 'formnovalidate' => 'formnovalidate']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                                <h4><strong>Account Information</strong></h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-4">
                                <div class="form-group {{ $errors->first('username') ? 'has-error' : '' }} ">
                                    {{ Form::label('username', 'Username', ['class' => 'control-label']) }}
                                    {{ Form::text('username', $user->username, ['class' => 'form-control validate[required]', 'placeholder' => 'Username']) }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-4">
                                <div class="form-group {{ $errors->first('username') ? 'has-error' : '' }} ">
                                    {{ Form::label('bank_details', 'BPI - Bank Details', ['class' => 'control-label']) }}
                                    <input class="form-control" name="bank_details" value="{{ $user->bank_details }}" type="number" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    <span class="errors" style="color:#FF0000">{{ $errors->first('bank_details') }}</span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="form-group {{ $errors->first('username') ? 'has-error' : '' }} ">
                                    {{ Form::label('id_photo', 'Identification Card', ['class' => 'control-label']) }}
                                    <br>
                                    <img src="{{ URL::asset('/uploads/users/' . $user->id_photo) }}"
                                        class="img-responsive " alt="" style="width:400px;height:200px">
                                    <br>{!! Form::file('id_photo', ['id' => 'id_photo', 'class' => 'hidden']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                                <h4><strong>Profile Picture</strong></h4>
                                <hr>
                            </div>
                            <div class="col-lg-6 mt-3">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div
                                                class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-10 col-md-offset-1 col-lg-6 col-lg-offset-3">
                                                <div class="form-group">
                                                    <div class="img_caption">
                                                        <img src="{{ URL::asset('/uploads/users/' . $user->photo) }}"
                                                            id="prof_id" class="img-responsive req_file_view2" alt=""
                                                            style=" width: auto; background-color: #f8f8f8; margin: 0 auto;">
                                                        <label for="image_id" class="caption text-center">
                                                            Update Photo
                                                        </label>
                                                        {!! Form::file('photo', ['id' => 'image_id', 'class' => 'hidden']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer mt-3">
                                        <a style="text-decoration:none; color:black;" href="{{ route('account.profile.password')}}"><i class="fas fa-lock me-2"></i>Change
                                            Password</a>
                                            <br>
                                        <a style="text-decoration:none; color:black;" href="{{ route('account.billing-address.index', [Auth::user()->id])}}"><i class="fas fa-address-book me-2"></i>Billing Address</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-offset-9 col-md-3 col-lg-offset-10 col-lg-2">
                                <button type="submit" class="btn btn-background btn-block btnUserSubmit mt-3">
                                    &nbsp;Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

           


        </div>
        {!! Form::close() !!}
    </div>


    <script>
        $('#prof_id').css('width', $('.img_caption').width());
        $('#prof_id').css('height', $('.img_caption').width());
        $(window).on('resize', function() {
            $('#prof_id').css('width', $('.img_caption').width());
            $('#prof_id').css('height', $('.img_caption').width());
        });

        function readURL(input) {
            var defaultUser = '{{ asset('/uploads/users/' . $user->photo) }}';
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {

                    $('#prof_id').attr('src', e.target.result);

                }

                reader.readAsDataURL(input.files[0]);
            } else {
                $('#prof_id').attr('src', defaultUser);
            }
        }
        $("#image_id").change(function() {
            readURL(this);
        });
        $('#createUsersForm').validationEngine('attach', {
            promptPosition: "inline",
            scroll: false,
            onValidationComplete: function(form, status) {
                if (status === true) {
                    $('.btnUserSubmit').html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
                    $('.btnUserSubmit').attr('disabled', true);
                    return true;
                } else {
                    $('.btnUserSubmit').attr('disabled', false);
                }
            }
        });
    </script>

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
