<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
    <meta name="description" content="{{ Session::get('software_description') }}">
    <meta name="author" content="Aguora IT Solutions & Technology">
    <link rel="icon" href="/images/Bikers_favicon.png">
    <title>@yield('title') | {{ Session::get('software_name') }}</title>

    {{-- Google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/sb-admin.css') }}" rel="stylesheet" media="  ">
    <link href="{{ URL::asset('css/normalize.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('assets/fontawesome-free-5.15.1-web/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::asset('assets/DataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/validationEngine.jquery.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="apple-touch-icon-precomposed" sizes="57x57"
        href='{{ asset('/uploads/' . Session::get('company_logo')) }}' />
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('/uploads/' . Session::get('company_logo')) }}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('/uploads/' . Session::get('company_logo')) }}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('/uploads/' . Session::get('company_logo')) }}" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60"
        href="{{ asset('/uploads/' . Session::get('company_logo')) }}" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
        href="{{ asset('/uploads/' . Session::get('company_logo')) }}" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76"
        href="{{ asset('/uploads/' . Session::get('company_logo')) }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152"
        href="{{ asset('/uploads/' . Session::get('company_logo')) }}" />
    <link rel="icon" href="{{ asset('/uploads/' . Session::get('company_logo')) }}" sizes="196x196" />
    <link rel="icon" href="{{ asset('/uploads/' . Session::get('company_logo')) }}" sizes="96x96" />
    <link rel="icon" href="{{ asset('/uploads/' . Session::get('company_logo')) }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('/uploads/' . Session::get('company_logo')) }}" sizes="16x16" />
    <link rel="icon" href="{{ asset('/uploads/' . Session::get('company_logo')) }}" sizes="128x128" />
    <meta name="application-name" content="{{ Session::get('software_name') }}" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ Session::get('company_logo') }}" />
    <meta name="msapplication-square70x70logo" content="{{ Session::get('company_logo') }}" />
    <meta name="msapplication-square150x150logo" content="{{ Session::get('company_logo') }}" />
    <meta name="msapplication-wide310x150logo" content="{{ Session::get('company_logo') }}" />
    <meta name="msapplication-square310x310logo" content="{{ Session::get('company_logo') }}" />
    @yield('css')
    <style>
        * {
            font-family: 'Poppins', 'sans-serif';
        }

        .side-nav>li>ul>li>a.active,
        .side-nav>li>ul>li>a.active:focus,
        .side-nav>li>ul>li>a.active:active,
        .side-nav>li>ul>li>a.active:active:focus,
        .side-nav>li>ul>a:active,
        .side-nav>li>ul>a:active:focus,
        .side-nav>li>ul>a:active:hover,
        .side-nav>li>ul>li>a:focus:hover {
            background-color: #EA5656 !important;
            color: #fff;
        }

        .side-nav>li>ul>li>a:active,
        .side-nav>li>ul>li>a:focus {
            background-color: transparent !important;
            color: #fff;
        }

        .side-nav>li>a,
        .side-nav>li>ul>li>a {
            font-weight: 700;

        }

        .side-nav>li>a {
            font-size: 15px;
        }

        .side-nav>li>ul>li>a {
            font-size: 1em;
        }

        @media (min-width: 768px) {

            .navbar-inverse {
                background-color: white;
                /*border-color: #222;*/
            }

            .navbar-fixed-top {
                border: 0;
            }

            .navbar-header {
                background-color: #222;
                border-color: #080808;
            }

            .navbar-inverse .navbar-right>li>a {
                color: #252529;
            }

            .navbar-inverse .navbar-right>li>a:hover,
            .navbar-inverse .navbar-right>li>a:focus,
            .navbar-inverse .navbar-right>li>a:active {
                background: #252529;
                color: #e7e7e7;
            }

            .navbar-brand {
                border-bottom: 1px solid rgba(245, 245, 245, .1);
            }

            .dropdown-right>.active>a,
            .dropdown-right>.active>a:focus,
            .dropdown-right>.active>a:hover {
                text-decoration: none;
                color: #fff;
                background-color: #080808;
                outline: 0;
            }
        }

        @media only screen and (max-width: 768px) and (min-width: 320px) {
            p.navbar-text {
                padding-left: 15px;
            }
        }

        .panel-shadow {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 5px 0 rgba(0, 0, 0, 0.19);
        }

        .panel-heading {
            border-bottom: 2px solid transparent;
        }

        .panel-default>.panel-heading {
            background-color: white;
        }

        .panel-default {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 5px 0 rgba(0, 0, 0, 0.19);
        }

        .navbar-inverse .navbar-nav>.active>a,
        .navbar-inverse .navbar-nav>.active>a:focus,
        .navbar-inverse .navbar-nav>.active>a:hover {
            background-color: #EA5656 !important;
        }

        .navbar-inverse .navbar-nav>.active>a:active:focus,
        .navbar-inverse .navbar-nav>.active>a:focus:hover {
            background-color: transparent;
        }

        .navbar-inverse .side-nav>li>a {
            color: white;
        }

        .navbar-inverse .side-nav>li>a:active:hover,
        .navbar-inverse .side-nav>li>a:active:focus,
        .navbar-inverse .side-nav>li>a:focus {
            background-color: transparent !important;
        }

        .navbar-inverse .side-nav>li>a:focus:hover {
            background-color: #EA5656 !important;
        }

        .navbar-inverse .side-nav>li.active>a:active,
        .navbar-inverse .side-nav>li.active>a:focus:hover {
            background-color: #EA5656 !important;
        }

        @media (max-width: 309px) {
            .navbar-brand {
                font-size: 12px !important;
                max-width: 75vw !important;
            }
        }

        .navbar-nav>li>a.btn-menu,
        .navbar-nav>li>a.btn-menu:focus {
            color: #000000;
            font-size: 16px;
        }

        .navbar-nav>li>a.btn-menu:hover,
        .navbar-nav>li>a.btn-menu:active {
            color: #0063e0;
        }

        @media(min-width: 768px) {
            .hide-side {
                left: 0px;
            }

            .show-side {
                left: 251px;
            }

            .side-nav>li>a {
                padding: 10px 15px;
            }
        }

        .page-header {
            border-color: #C9D1DA;
        }

        @media(min-width: 768px) {
            .aguora-footer-big {
                bottom: 0;
                left: 0;
                position: fixed;
                width: 251px;
                color: #f5f5f5;
            }
        }

        @media(max-height: 416px) {
            .aguora-footer-big {
                position: relative;
                display: flex;
                text-align: center;
                vertical-align: middle;
                padding-top: 10px;
                padding-bottom: 10px;
            }

            .text-footer {
                margin: 0 auto;
            }
        }

        @media(max-width: 235px) {
            .navbar-brand {
                letter-spacing: 2px !important;
                max-width: 130px !important;
                font-size: 1em !important;
                line-height: 1em !important;
            }
        }

        @media(min-width: 236px) {
            .navbar-brand {
                width: 251px;
                letter-spacing: 4.6px;
            }
        }

        .swal2-popup {
            font-size: 1.4rem !important;
        }

        .help-block {
            margin: 0;
            padding: 4px 10px 4px 10px;
            font-size: 13px;
        }

        .dot {
            height: 15px;
            width: 15px;
            border-radius: 50%;
            display: inline-block;
            background-color: #bbb;
            border: 1px solid #eee;
            vertical-align: middle;
            margin-top: -2px;
        }

        .red-dot {
            background-color: rgba(204, 4, 32, 0.8);
            border: 1px solid rgba(204, 4, 32, 1);
        }

        .orange-dot {
            background-color: rgba(255, 97, 0, 0.8);
            border: 1px solid rgba(255, 97, 0, 0.1);
        }

        .violet-dot {
            background-color: #6222FF;
            border: 1px solid #501CD0;
        }

        .blue-dot {
            background-color: rgba(0, 140, 248, 0.8);
            border: 1px solid rgba(0, 140, 248, 1);
        }

        .yellow-dot {
            background-color: rgba(255, 255, 0, 0.8);
            border: 1px solid rgba(255, 255, 0, 1);
        }

        .green-dot {
            background-color: rgba(8, 167, 48, 0.8);
            border: 1px solid rgba(8, 167, 48, 1);
        }

        .black-dot {
            background-color: rgba(50, 59, 66, 0.8);
            border: 1px solid rgba(50, 59, 66, 1);
        }

        .navbar-brand {
            padding: 10px 15px;
        }

        .img-fluid {
            max-width: 75%;
            height: auto;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-admin-submit {
            margin-top: 2rem !important;
        }

        .margin-top {
            margin-top: 2rem !important;
        }

        .margin-top-lg {
            margin-top: 8rem !important;
        }

        .margin-left {
            margin-left: 3.5rem !important;
        }

        .margin-left-sm {
            margin-left: 1rem !important;
        }

        .margin-bottom {
            margin-bottom: 2rem !important;
        }

        .margin-bottom-sm {
            margin-bottom: 1rem !important;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .no-border {
            border: none !important;
        }

        .d-flex {
            display: flex;
        }

        .align-items-center {
            align-items: center;
        }

        .justify-content-center {
            justify-content: center;
        }

        .d-block {
            display: block;
        }

        .fa-chevron-left {
            color: #000000;
        }

        .remove-resize {
            resize: none;
        }

    </style>

</head>

<body style="background-color:#f5f5f5;">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"
            style="box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 5px 0 rgba(0, 0, 0, 0.19);">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"
                    style="background-color:white;">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar" style="background-color:#222;"></span>
                    <span class="icon-bar" style="background-color:#222;"></span>
                    <span class="icon-bar" style="background-color:#222;"></span>
                </button>
                <a class="text-center navbar-brand" href="{{ route('dashboard.index') }}"><img class="img-fluid"
                        src="/images/admin-bikers.png" alt=""></a>

            </div>
            <div>
                {{-- Collapse --}}
                <ul class="nav navbar-nav navbar-left hidden-xs" style="margin:0px;">
                    <li>
                        <a href="#" class="btn-menu">
                            <span class="glyphicon glyphicon-menu-hamburger"></span>
                        </a>
                    </li>
                </ul>
                {{-- Dropdown --}}
                <ul class="nav navbar-nav navbar-right hidden-xs" style="margin-right:0px;">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false" style="font-size:20px;">
                            <img src="{{ asset('/uploads/users/' . Auth::user()->photo) }}"
                                class="img-responsive pull-left img-circle text-center"
                                style="display:block;margin-top:-2px;margin-right:5px;height:30px;width:30px;">
                            {{ Auth::user()->username }} <i class="fas fa-fw fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-right">
                            {{-- <li class="{{(\Request::route()->getName() == 'profile') ? 'active' : ''}}"><a href="{{route('profile')}}" class="{{(\Request::route()->getName() == 'profile') ? 'active' : ''}}"><i class="fa fa-user"></i> Edit Profile</a></li> --}}
                            <li><a href="{{ route('logout') }}"><i class="fas fa-fw fa-sign-out-alt"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav show-side" style="color:white !important;">
                    <p class="navbar-text" style="font-size:10px;">MENU</p>
                    <li class="{{ \Request::route()->getName() == 'dashboard.index' ? 'active' : '' }}">
                        <a href="{{ route('dashboard.index') }}">Dashboard</a>
                    </li>

                    <li
                        class="{{ \Request::route()->getName() == 'admin.orders.index' || \Request::route()->getName() == 'admin.orders.edit' || \Request::route()->getName() == 'admin.orders.show' ? 'active' : '' }}">
                        <a href="{{ route('admin.orders.index') }}">Orders</a>
                    </li>

                    <li
                        class="{{ \Request::route()->getName() == 'users.index' || \Request::route()->getName() == 'users.edit' || \Request::route()->getName() == 'users.show' ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}">Users</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.promo-codes.index') }}"><i class="fa fa-bullhorn"></i>&nbsp; Promo
                            Code</a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('admin.tag.index') }}">Tags</a>
                    </li> --}}

                    <li class="" id="listSettings"><a href="javascript:;" data-toggle="collapse"
                            data-target="#listings">Listings <i class="fa fa-fw fa-caret-left pull-right"
                                id="caret-icon"></i></a>
                        <ul id="listings"
                            class="collapse {{ \Request::route()->getName() == 'activity_logs.index' || \Request::route()->getName() == 'settings.index' ? 'in' : '' }}">

                            <li>
                                <a class="{{ \Request::route()->getName() == 'admin-products.index' ? 'active' : '' }}"
                                    href="{{ route('admin-products.index', ['product']) }}">Products</a>
                            </li>
                            <li>
                                <a class="{{ \Request::route()->getName() == 'admin-rentals.index' ? 'active' : '' }}"
                                    href="{{ route('admin-rentals.index', ['rentals']) }}">Rentals</a>
                            </li>
                        </ul>
                    </li>

                    {{-- <li class="" id="listSettings"><a href="javascript:;" data-toggle="collapse"
                            data-target="#settings">Settings <i class="fa fa-fw fa-caret-left pull-right"
                                id="caret-icon"></i></a>
                        <ul id="settings"
                            class="collapse {{ \Request::route()->getName() == 'activity_logs.index' || \Request::route()->getName() == 'settings.index' ? 'in' : '' }}">
                            <li>
                                <a class="{{ \Request::route()->getName() == 'settings.activity.logs.index' ? 'active' : '' }}" href="{{ route('settings.activity.logs.index') }}">Application</a>
                            </li> -->
                            <li>
                                <a class="{{ \Request::route()->getName() == 'categories.index' ? 'active' : '' }}"
                                    href="{{ route('categories.index') }}">Categories</a>
                            </li>
                            <li>
                                <a class="{{ \Request::route()->getName() == 'roles.index' ? 'active' : '' }}"
                                    href="{{ route('roles.index') }}">Roles</a>
                            </li>
                            <li>
                                <a class="{{ \Request::route()->getName() == 'settings.activity.logs.index' ? 'active' : '' }}"
                                    href="{{ route('settings.activity.logs.index') }}">Activity Log</a>
                            </li>
                        </ul>
                    </li> --}}


                    <li
                        class="hidden-md hidden-sm hidden-lg {{ \Request::route()->getName() == 'profile' ? 'active' : '' }}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#logged_user"><img
                                src="{{ asset('/uploads/users/' . Auth::user()->photo) }}"
                                class="img-responsive pull-left img-circle text-center"
                                style="display:block;margin-top:-2px;margin-right:5px;top:5px;height:25px;width:25px;">
                            {{ Auth::user()->username }} <i class="fas fa-fw fa-caret-down"></i></a>
                        <ul id="logged_user"
                            class="collapse {{ \Request::route()->getName() == 'profile' ? 'in' : '' }}">
                            {{-- <li class="{{(\Request::route()->getName() == 'profile') ? 'active' : ''}}"><a href="{{route('profile')}}" class="{{(\Request::route()->getName() == 'profile') ? 'active' : ''}}"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li> --}}
                            <li><a href="{{ route('logout') }}"><i class="fas fa-fw fa-sign-out-alt"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                    <li class="hidden-md hidden-sm hidden-lg text-center aguora-footer-small" style="margin-top:10px;">
                        <p class="text-footer" style="color:white;font-size:11px;"> &#9400; 2019
                            {{ Session::get('company_name') }}</p>
                    </li>
                    {{-- <div class="text-center  hidden-xs aguora-footer-big">
                        <p class="text-footer" style="font-size:11px;;"> &#9400; {{\Carbon\Carbon::now()->year}} {{Session::get('company_name')}}</p>
                    </div> --}}
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            <!-- END SIDE BARRRRRRRRRRRRRRRRRRRRRRRRR -->
        </nav>

        <div id="page-wrapper" style="background-color:#f5f5f5;">

            @yield('content')
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/moment.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap/bootstrap-datetimepicker.js') }}"></script>


    @include('include.js')
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Input Mask 5.0.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>


    @yield('script')
    <script type="text/javascript">
        $('.btn-menu').click(function() {
            if ($('.side-nav').hasClass('show-side')) {
                $('.side-nav').addClass('hide-side');
                $('#wrapper').css('padding-left', '0px');
                $('.side-nav').removeClass('show-side');
                $('.navbar-brand').hide();
                @if (\Request::route()->getName() == 'dashboard.index')
                    // $('.panel-daily-cases').css('height',(($('.row-temp').outerHeight() + 85) + 'px'));
                @endif
            } else {
                $('.side-nav').addClass('show-side');
                $('#wrapper').css('padding-left', '251px');
                $('.side-nav').removeClass('hide-side');
                $('.navbar-brand').show();
                @if (\Request::route()->getName() == 'dashboard.index')
                    // $('.panel-daily-cases').css('height','620px');
                @endif
            }
        });
        $(window).on('resize', function() {
            if ($(this).width() < 768) {
                if (!$('.side-nav').hasClass('show-side')) {
                    if (!$(".navbar-brand").is(":visible")) {
                        $('.navbar-brand').show();
                    }
                }
                $('#wrapper').css('padding-left', '0px');
            } else {

                if (!$('.side-nav').hasClass('show-side')) {
                    if ($(".navbar-brand").is(":visible")) {
                        $('.navbar-brand').hide();
                    }
                } else {
                    $('#wrapper').css('padding-left', '251px');
                    if (!$(".navbar-brand").is(":visible")) {
                        $('.navbar-brand').show();
                    }
                }
            }
        });
    </script>
</body>

</html>
