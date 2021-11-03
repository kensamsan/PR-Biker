@extends('template.master')
@section('title', 'Rent')
@section('content')
<style>
   #content {
    display: flex;
    justify-content: center;
    flex-direction: column;
}
</style>
<h1 class="text-dark fs-2 text-center fw-bold">What do you want to do?</h1>
<div class="d-flex my-5 justify-content-center align-items-center">
    <div class="d-grid gap-2 d-md-block">
        <a href="{{ route('post-bike') }}" class="btn btn-background px-5 btn-lg fs-2 fw-bold mx-5">POST YOUR BIKE</a>
        <a href="{{ route('rent-bike') }}" class="btn btn-background px-5 btn-lg fs-2 fw-bold">RENT AVAILABLE BIKES</a>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">
    $(document).ready(function () {
        @if(Session::has('flash_message'))
        Swal.fire(
            'Success',
            '{{Session::get('
            flash_message ')}}',
            'success'
        )
        @endif
        @if(Session::has('register_ok'))
        Swal.fire({
            title: 'Thank you for Registering!',
            html:

                'We sent a confirmation email to<br/>' +
                '{{Session::get('
            email ')}}<br/>' +
            'Please check mail',
            type: 'success',
            confirmButtonText: 'Okay'
        })
        @endif
        @if(Session::has('flash_error'))
        Swal.fire(
            'Error',
            '{{Session::get('
            flash_error ')}}',
            'error'
        )
        @endif

    });
</script>
@endsection