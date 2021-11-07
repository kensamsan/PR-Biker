@extends('template.master')
@section('title', 'Shipping Information')

<link rel="stylesheet" href="/css/store/checkout.css">
<link rel="stylesheet" href="/css/store/store.css">
<link rel="stylesheet" href="/css/store/normalize.css">

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row justify-content-center my-5">
                <div class="col-lg-6 text-center">
                    <div class="progressbar-container">
                        <ul class="progressbar w-100">
                            <li class="active">BILLING INFORMATION</li>
                            <li>SHIPPING INFORMATION</li>
                            <li>PAYMENT INFORMATION</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{ Form::open(array('route' => 'client-checkout-payment', 'method' => 'get')) }}
           
            <input type="hidden" name="contact_number" value="{{$contact_number}}">
            <input type="hidden" name="billing_id" value="{{$billing_id}}">

            <form action="#">
                <div class="row justify-content-center mb-5 pb-5">
                    <!-- Left Section -->
                    <div class="col-lg-5 px-5 my-3 checkout-form">
                        <h3 class="fw-bold mb-5 fst-italic"><b>SHIPPING INFORMATION</b></h5>
                            <div class="row mb-2">
                                <div class="col-4"><span class="text-bold">Contact Number</span></div>
                                <div class="col">{{$contact_number}}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4"><span class="text-bold">Billing Address</span></div>
                                <div class="col">{{\App\BillingAddress::find($billing_id)->address}}, {{\App\BillingAddress::find($billing_id)->brgy}} {{\App\BillingAddress::find($billing_id)->city}}</div>
                            </div>
                            <hr>
                            <p class="text-bold mb-5">CHOOSE SHIPPING METHOD <span class="text-required">*</span></p>
                            <div class="shipping-choices mb-lg-5 pb-lg-5">
                                <!-- Pick-up -->
                                <div class="row pb-0">
                                    <div class="col">
                                        <div class="custom-control custom-control-inline">
                                            <input type="radio" id="pick-up" name="shipping" class="custom-control-input"
                                                required onclick="shippingMethod('pick-up')" value="pick-up" />
                                            <label class="custom-control-label" for="pick-up">Pick-up in store</label>
                                        </div>
                                    </div>
                                    <div class="col text-right">PHP 0.00</label></div>
                                </div>
                                <!-- Grab -->
                                <div class="row mt-3 pb-0">
                                    <div class="col">
                                        <div class="custom-control custom-control-inline">
                                            <input type="radio" id="grab" name="shipping" class="custom-control-input"
                                                data-target="#grabinfo" data-toggle="collapse" aria-expanded="false"
                                                required onclick="shippingMethod('courier')" value="courier" />
                                            <label class="custom-control-label" for="grab">Lalamove</label>
                                        </div>
                                    </div>
                                    <div class="col text-right">PHP 250.00</label></div>
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
                                {{-- <div class="row mt-3 pb-0">
                                    <div class="col">
                                        <div class="custom-control custom-control-inline">
                                            <input type="radio" id="manila" name="shipping" class="custom-control-input"
                                                data-target="#manilainfo" data-toggle="collapse" aria-expanded="false"
                                                required  onclick="shippingMethod('gma')" value="gma" />
                                            <label class="custom-control-label" for="manila">Greater Metro Manila</label>
                                        </div>
                                    </div>
                                    <div class="col text-right">PHP 150.00</label></div>
                                </div> --}}
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
                                {{-- <div class="row mt-3 pb-0">
                                    <div class="col">
                                        <div class="custom-control custom-control-inline">
                                            <input type="radio" id="provincial" name="shipping" class="custom-control-input"
                                                data-target="#provincialinfo" data-toggle="collapse" aria-expanded="false"
                                                required  onclick="shippingMethod('provincial')" value="provincial" />
                                            <label class="custom-control-label" for="provincial">Provincial</label>
                                        </div>
                                    </div>
                                    <div class="col text-right">PHP 250.00</label></div>
                                </div> --}}
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

                            <div class="row mt-4 align-items-center">
                                <div class="col-lg-6 my-2">
                                    <small><a href="{{ route('client-view-cart') }}" class="link-main-custom align-middle">RETURN TO CART</a></small>
                                </div>
                                <div class="col-lg-6 my-2">
                                     <input type="submit" value="CONTINUE TO PAYMENT" class="btn btn-shop" onclick="required()"><br>
                                </div>
                            </div>
                    </div>
                    <!-- Right Section -->
                    <div class="col-lg-5 px-5 my-3">
                        <div class="cart-items-container">
                            <table class="table table-borderless">
                                <tbody>
                                     @foreach(\Cart::session(Auth::user()->id)->getContent() as $x)

                                        <tr>
                                            <td>
                                                <img  src="/uploads/products/{{App\Product::find($x->id)->getProductImage()}}" class="shipping-img mr-3" style="float: left;width:75px;height:75px">
                                            </td>
                                            <td class="w-50"><p class="p-small">{{$x->name}}</p></td>
                                            <td class="text-right w-75">x{{$x->qty}} <br>
                                                <span class="text-bold">₱ {{number_format($x->price)}}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <p class="px-2 mb-0">
                            <span class="text-bold">SUBTOTAL</span>
                            <span class="float-end">₱ {{ number_format(\Cart::session(Auth::user()->id)->getSubTotal(),2) }}</span>
                        </p>
                        <p class="px-2 mb-0"> SHIPPING : 
                                <span class="ml-5" id="shippingLabel">Lalamove</span>
                                <span class="float-end" id="shippingValue">₱ 0</span>
                        </p>
                        <br><br>
                        <p class="px-2 py-3 total-bg">
                            <span class="text-bold">TOTAL</span>
                            <span class="float-end" id="shippingTotal">₱ {{ number_format(\Cart::session(Auth::user()->id)->getSubTotal(),2) }}</span>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </main>
<script type="text/javascript">
    function shippingMethod(val)
    {
      
        var subtotal = {{ \Cart::getSubTotal() }};
        if(val=='pick-up')
        {            
            $('#shippingLabel').text("PICK UP AT STORE");
            $('#shippingValue').text("₱ 0");
            subtotal = subtotal+0;
            $('#shippingTotal').text("₱ "+ subtotal);
        }
        else if(val=='courier')
        {
            $('#shippingLabel').text("LALAMOVE");
            $('#shippingValue').text("₱ 250.00");
            subtotal = subtotal+250;
            $('#shippingTotal').text("₱ "+ subtotal);
        }
        else if(val=='gma')
        {
            $('#shippingLabel').text("GREATER METRO MANILA");
            $('#shippingValue').text("₱ 150");
            subtotal = subtotal+150;
            $('#shippingTotal').text("₱ "+ subtotal);
        }
        else
        {
            $('#shippingLabel').text("PROVINCIAL");
            $('#shippingValue').text("₱ 250");
            subtotal = subtotal+250;
            $('#shippingTotal').text("₱ "+ subtotal);
        }
    }
</script>

@endsection
