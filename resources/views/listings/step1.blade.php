@extends('template.master')
@section('title', 'Rent Date')
@section('content')

    <link rel="stylesheet" href="/css/store/checkout.css">
    <main>
        <div class="container-fluid pb-5 mb-5">
            <div class="row my-5 px-5">
                <div class="col-lg-9" id="cart-col">
                    <h2>Rent&nbsp;<b>{{ $rental->bike_unit }}</b></h2>
                        <!-- Cart with items -->
                        <form method="post" action="{{ route('client-rental-information') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="rental_id" value="{{ $rental->id }}">
                                <div class="col-lg-4">
                                    {{ Form::label('dt_from', 'From') }}
                                    <input type="date" name="dt_from" class="form-control my-2" required>
                                    <input type="time" name="dt_from_time" class="form-control" required>
                                </div>
                                <div class="col-lg-4 mt-4">
                                    {{ Form::label('dt_to', 'To') }}
                                    <input type="date" name="dt_to" class="form-control my-2" required>
                                    <input type="time" name="dt_to_time" class="form-control" required>
                                </div>
                            <input class="btn-background fw-bold border-0 mt-3 rounded p-2" type="submit" name="CHECKOUT">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
        @if (Session::has('add_to_cart'))
            Swal.fire({
            title: '<strong>Added to Cart!</strong>',
            type: 'info',
            html:
            'You can go to checkout or proceed to continue shopping',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:
            '<i class="fa fa-shopping-cart"></i> checkout!',
            confirmButtonAriaLabel: 'Proceed to Checkout',
            cancelButtonText:
            'Continue Shopping',
            cancelButtonAriaLabel: 'Continue Shopping'
            })
            .then((result) => {
            if (result.value) {
            window.location.href = "{{ Session::get('add_to_cart') }}";
            }
            });
        @endif
    </script>
@endsection
