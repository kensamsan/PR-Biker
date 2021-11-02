@extends('template.master')
@section('content')
    <link rel="stylesheet" href="/css/home.css">
    <div id="banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-5 ms-4">
                    <a href="{{ route('post-bike') }}"><button class="btn fs-5 fst-italic rounded-pill" id="btn-now">POST YOUR BIKE</button></a>
                    <a href="{{ route('rent-bike') }}"><button class="btn fs-5 fst-italic rounded-pill" id="btn-now">RENT AVAILABLE BIKES</button></a>
                    
                </div>
            </div>
        </div>
    </div>
   
    <script src="/js/modal.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script type="text/javascript">
        $(document).ready(function(){
        @if(Session::has('flash_message'))
            Swal.fire(
              'Success',
              '{{Session::get('flash_message')}}',
              'success'
            )
        @endif
        @if(Session::has('register_ok'))
                Swal.fire({
                title: 'Thank you for Registering!',
                html:
             
                    'We sent a confirmation email to<br/>' +
                    '{{Session::get('email')}}<br/>' +
                    'Please check mail',
                type: 'success',
                confirmButtonText: 'Okay'
                })
         @endif
        @if(Session::has('flash_error'))
            Swal.fire(
              'Error',
              '{{Session::get('flash_error')}}',
              'error'
            )
        @endif
       
    });
    </script>
@endsection
