@extends('template.master')
@section('title', 'Billing Information')
@section('content')

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
<link rel="stylesheet" href="/css/store/checkout.css">

<main>
    {{-- Modal --}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add new Billing Address</h4>
                    <button type="button" class="close btn-background rounded border border-danger" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('route' => ['account.billing-address.store-modal-rent',Auth::user()->id], 'method' => 'store','files'=>true)) }}
                    <div class="row">
                        <div class="col-lg-12">
                            {{ Form::label('type', 'Type') }}
                            <select name="type" class="form-control">
                                <option value="home">Home</option>
                                <option value="work">Work</option>
                            </select>
                            <span class="errors" style="color:#FF0000">{{$errors->first('title')}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Form::label('first_name', 'Recipient First Name') }}
                            {{ Form::text('first_name',Auth::user()->first_name,array('class'=>'form-control span6','placeholder' => 'First Name','required'=>'required')) }}
                            <span class="errors" style="color:#FF0000">{{$errors->first('first_name')}}</span>
                        </div>
                        <div class="col-lg-6">
                            {{ Form::label('last_name', 'Recipient Last Name') }}
                            {{ Form::text('last_name',Auth::user()->last_name,array('class'=>'form-control span6','placeholder' => 'Last Name','required'=>'required')) }}
                            <span class="errors" style="color:#FF0000">{{$errors->first('address')}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {{ Form::label('address', 'Address') }}
                            {{ Form::text('address','',array('class'=>'form-control span6','placeholder' => 'Unit #,House #, building name,street','required'=>'required')) }}
                            <span class="errors" style="color:#FF0000">{{$errors->first('address')}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Form::label('brgy', 'Barangay') }}
                            {{ Form::text('brgy','',array('class'=>'form-control span6','placeholder' => 'Barangay','required'=>'required')) }}
                            <span class="errors" style="color:#FF0000">{{$errors->first('brgy')}}</span>
                        </div>
                        <div class="col-lg-6">
                            {{ Form::label('zip', 'Zip') }}
                            {{ Form::text('zip','',array('class'=>'form-control span6','placeholder' => 'Zip','required'=>'required')) }}
                            <span class="errors" style="color:#FF0000">{{$errors->first('zip')}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Form::label('region', 'Region') }}
                            {{ Form::text('region','',array('class'=>'form-control span6','placeholder' => 'Metro Manila/NCR','required'=>'required')) }}
                            <span class="errors" style="color:#FF0000">{{$errors->first('region')}}</span>
                        </div>
                        <div class="col-lg-6">
                            {{ Form::label('city', 'City') }}
                            {{ Form::text('city','',array('class'=>'form-control span6','placeholder' => 'City','required'=>'required')) }}
                            <span class="errors" style="color:#FF0000">{{$errors->first('city')}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::text('email',Auth::user()->email,array('class'=>'form-control span6','placeholder' => 'Email','required'=>'required')) }}
                            <span class="errors" style="color:#FF0000">{{$errors->first('email')}}</span>
                        </div>
                        <div class="col-lg-6">
                            {{ Form::label('contact', 'Contact No.') }}
                            {{ Form::number('contact',Auth::user()->contact,array('class'=>'form-control span6','placeholder' => 'Contact No.','required'=>'required')) }}
                            <span class="errors" style="color:#FF0000">{{$errors->first('contact')}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {{ Form::label('landmark', 'Landmark') }}
                            {{ Form::text('landmark','',array('class'=>'form-control span6','placeholder' => 'Landmark','required'=>'required')) }}
                            <span class="errors" style="color:#FF0000">{{$errors->first('landmark')}}</span>
                        </div>
                    </div>
                    <br />
                    <div class="row top10">
                        <div class="col-lg-4">

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-warning" value="Submit" />
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModalNumber" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel" style="float: left">Contact Number</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('route' => ['account.contact.store-modal',Auth::user()->id], 'method' => 'store','files'=>true)) }}

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="contact"><b>Contact Number</b></label>
                            {{ Form::text('contact','',array('class'=>'form-control span6','placeholder' => 'Contact No.','required'=>'required')) }}
                        </div>
                    </div>
                    <br />
                    <div class="row top10">
                        <div class="col-lg-4">

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-warning" value="Submit" />
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{-- main content --}}
    <div class="container-fluid pb-5 mb-5">
        <div class="row my-5 px-5">
            <div class="col-lg-12" id="cart-col">
                <h2 class="fw-bold"><b>Rent {{$rental->bike_name}}</b></h4>

                    <!-- Cart with items -->
                    <form method="post" action="{{ route('client-rental-submit') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="rental_id" value="{{$rental->id}}">
                        <input type="hidden" name="dt_from" value="{{$rental->dt_from}}">
                        <input type="hidden" name="dt_from_time" value="{{$rental->dt_from_time}}">
                        <input type="hidden" name="dt_to" value="{{$rental->dt_to}}">
                        <input type="hidden" name="dt_to_time" value="{{$rental->dt_to_time}}">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12 pt-4">
                                <h3 class="fw-bold mb-5 fst-italic"><b>BILLING INFORMATION</b></h5>

                                    <p style="color: #707070">Default Contact Number or <a href="#" class="updateNum"
                                            data-toggle="modal" data-target="#myModalNumber"
                                            style="color: #EA5656"><strong>@if(Auth::user()->contact=='') Add Number
                                                @else Update Number @endif </strong></a></p>
                                    <input type="text" name="contact_number" class="form-control mt-2"
                                        style="color: grey" value="{{Auth::user()->contact}}" required readonly="true">
                                    <p class="mt-3 mb-2"><span class="text-bold">Billing Address</span>
                                    </p>
                                    <p style="color: #707070">Default Address or <a href="#myModal" data-toggle="modal"
                                        style="color: #EA5656"><strong>Enter New Address</strong></a></p>
                                    <div class="row my-3">
                                        <div class="col">
                                            <select name="billing_id" class="form-control" required="true">
                                                @foreach($billingAddress as $x)
                                                <option value="{{$x->id}}" @if($x->id==$billingAddress->last()->id)
                                                    selected @endif>{{$x->address}} {{$x->city}} {{$x->zip}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                            </div>
                            <div class="col-lg-4 col-md-4 col-12 pt-4">

                                <p class="text-bold mb-5">CHOOSE SHIPPING METHOD <span class="text-required">*</span>
                                </p>
                                <div class="shipping-choices mb-lg-5 pb-lg-5">
                                    <!-- Pick-up -->
                                    <div class="row pb-0">
                                        <div class="col">
                                            <div class="custom-control custom-control-inline">
                                                <input type="radio" id="pick-up" name="shipping"
                                                    class="custom-control-input" required
                                                    onclick="shippingMethod('pick-up')" value="pick-up" />
                                                <label class="custom-control-label" for="pick-up">Pick-up in
                                                    store</label>
                                            </div>
                                        </div>
                                        <div class="col text-right">PHP 0.00</label></div>
                                    </div>
                                    <!-- Grab -->
                                    <div class="row mt-3 pb-0">
                                        <div class="col">
                                            <div class="custom-control custom-control-inline">
                                                <input type="radio" id="grab" name="shipping"
                                                    class="custom-control-input" data-target="#grabinfo"
                                                    data-toggle="collapse" aria-expanded="false" required
                                                    onclick="shippingMethod('courier')" value="courier" />
                                                <label class="custom-control-label" for="grab">Grab/Lalamove
                                                    Delivery</label>
                                            </div>
                                        </div>
                                        <div class="col text-right">PHP 0.00</label></div>
                                    </div>
                                    <!--  <div class="row collapse" id="grabinfo">
                                    <div class="col">
                                        <div class="pl-4 pt-2">
                                            <small>
                                                Client is responsible for booking a pick up between 8am-6pm (Mon-Fri) <br>
                                                Name: Big Four Global Technologies <br>
                                                Address: 11 Nicanor Roxas St., Brgy San Isidro Labrador, Quezon City <br>
                                                Landmark: Beside Chuchu <br>
                                                Contact Number: 09312 345 6789 <br><br>
                                                <span class="text-required text-bold">NOTICE: Book only for pick up once
                                                    your order status is ready ‘for pick up’. This will allow us time to
                                                    prepare and process your orders.</span>
                                            </small>
                                        </div>
                                    </div>
                                </div> -->
                                    <!-- Greater Metro Manila -->
                                    <div class="row mt-3 pb-0">
                                        <div class="col">
                                            <div class="custom-control custom-control-inline">
                                                <input type="radio" id="manila" name="shipping"
                                                    class="custom-control-input" data-target="#manilainfo"
                                                    data-toggle="collapse" aria-expanded="false" required
                                                    onclick="shippingMethod('gma')" value="gma" />
                                                <label class="custom-control-label" for="manila">Greater Metro
                                                    Manila</label>
                                            </div>
                                        </div>
                                        <div class="col text-right">PHP 150.00</label></div>
                                    </div>
                                    <div class="row collapse" id="manilainfo">
                                        <div class="col">
                                            <div class="pl-4 pt-2">
                                                <small>
                                                    INFO HERE
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Provincial -->
                                    <div class="row mt-3 pb-0">
                                        <div class="col">
                                            <div class="custom-control custom-control-inline">
                                                <input type="radio" id="provincial" name="shipping"
                                                    class="custom-control-input" data-target="#provincialinfo"
                                                    data-toggle="collapse" aria-expanded="false" required
                                                    onclick="shippingMethod('provincial')" value="provincial" />
                                                <label class="custom-control-label" for="provincial">Provincial</label>
                                            </div>
                                        </div>
                                        <div class="col text-right">PHP 250.00</label></div>
                                    </div>
                                    <div class="row collapse" id="provincialinfo">
                                        <div class="col">
                                            <div class="pl-4 pt-2">
                                                <small>
                                                    INFO HERE
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-4 col-12 pt-4">
                                <p class="text-bold mb-4">CHOOSE PAYMENT METHOD <span class="text-required">*</span></p>
                                <div class="mb-lg-5">
                                    <!-- GCash -->
                                    <div class="row pb-0">
                                        <div class="col">
                                            <div class="custom-control custom-control-inline">
                                                <input type="radio" id="bank" name="payment_method"
                                                    class="custom-control-input" required="required" value="bank"
                                                    checked="checked" />
                                                <label class="custom-control-label" for="</form>">Bank Deposit/Online
                                                    Fund Transfer</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 ps-lg-3 ps-4">
                                        <label>Bank Name:</label>
                                        <span class="text-uppercase">bpi</span>
                                        <br>
                                        <label>Account Name:</label>
                                        <span>Gabriel Carlos Jornales Checa</span>
                                        <br>
                                        <label>Account Number:</label>
                                        <span>0123456789</span>

                                    </div>
                                    <div class="mt-3 ps-lg-3 ps-4">
                                        <label class="fw-bold" for="">Send proof of payment:</label>
                                        <p class="pt-1">Rental Tracking > Upload Deposit Slip</p>
                                    </div>
                                    <div class="row collapse" id="gcashinfo">
                                        <div class="col">
                                            <div class="pl-4 pt-2">
                                                <small>
                                                    GCash Account <br>
                                                    Account Name: John Smith <br>
                                                    Phone Number: 000301208831 <br>
                                                    <br><br>
                                                    <span class="text-bold">Send proof of payment:</span>
                                                    Account > Orders and Tracking > View Order > Upload Receipt
                                                </small>
                                            </div>
                                        </div>
                                    </div><br>

                                </div>
                            </div>
                        </div>

                        <input type="submit" name="CHECKOUT">


            </div>

        </div>

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
 <!-- Bootstrap Script -->
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
 integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
 integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
 integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<script type="text/javascript">
    @if(Session::has('add_to_cart'))
    Swal.fire({
            title: '<strong>Added to Cart!</strong>',
            type: 'info',
            html: 'You can go to checkout or proceed to continue shopping',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: '<i class="fa fa-shopping-cart"></i> checkout!',
            confirmButtonAriaLabel: 'Proceed to Checkout',
            cancelButtonText: 'Continue Shopping',
            cancelButtonAriaLabel: 'Continue Shopping'
        })
        .then((result) => {
            if (result.value) {
                window.location.href = "{{Session::get('add_to_cart')}}";
            }
        });


    @endif
</script>
@endsection