@extends('template.master')

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
                        <li class="active">SHIPPING INFORMATION</li>
                        <li>PAYMENT INFORMATION</li>
                    </ul>
                </div>
            </div>
        </div>
        {{ Form::open(array('route' => 'client-checkout-submit', 'method' => 'get','id'=>'submitForm')) }}
            <div class="row justify-content-center mb-5 pb-5">
            <input type="hidden" name="contact_number" value="{{$contact_number}}">
            <input type="hidden" name="billing_id" value="{{$billing_id}}">
            <input type="hidden" name="shipping" value="{{$shipping}}">

                <!-- Left Section -->
                <div class="col-lg-5 px-5 my-3 checkout-form">
                    <h3 class="text-bold mb-5 fst-italic"><b>PAYMENT INFORMATION</b></h5>
                    <div class="row mb-2">
                        <div class="col-4"><span class="text-bold">Contact Number</span></div>
                        <div class="col">{{$contact_number}}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4"><span class="text-bold">Billing Address</span></div>
                        <div class="col">{{\App\BillingAddress::find($billing_id)->address}}, {{\App\BillingAddress::find($billing_id)->brgy}} {{\App\BillingAddress::find($billing_id)->city}}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4"><span class="text-bold">Shipping Method</span></div>
                        @if($shipping=='provincial')
                            <div class="col">PROVINCIAL</div>
                        @elseif($shipping=='gma')
                            <div class="col">GREATER METRO MANILA</div>
                        @elseif($shipping=='courier')
                            <div class="col">GRAB/LALAMOVE</div>
                        @else
                            <div class="col">PICK UP AT STORE</div>
                        @endif
                        
                    </div>
                    <hr>
                    <p class="text-bold mb-4">CHOOSE PAYMENT METHOD <span class="text-required">*</span></p>
                    <div class="mb-lg-5">
                    <!-- GCash -->
                        <div class="row pb-0">
                            <div class="col">
                                <div class="custom-control custom-control-inline">
                                    <input type="radio" id="bank" name="payment_method" class="custom-control-input" required="required" value="bank" checked="checked" />
                                    <label class="custom-control-label" for="</form>">Bank Deposit/Online Fund Transfer</label>
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
                            <p class="pt-1">sample@email.com</p>
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
                        <hr>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-6 my-2">
                            <small><a href="/shipping" class="link-main-custom align-middle">RETURN TO SHIPPING</a></small>
                        </div>
                        <div class="col-lg-6 my-2">
                            <!-- <a href="#" class="btn btn-background float-lg-end">SUBMIT ORDER  &nbsp;<i class="fas fa-arrow-right"></i></a> -->
                            <input type="submit" id="cart_submit" value="SUBMIT ORDER" class="btn btn-shop" onclick="this.disabled=true;this.value='Submitted, please wait...';document.getElementById('submitForm').submit();" >
                        </div>
                    </div>
                </div>
                </form>
                <!-- Right Section -->
                @php
                    $tax = 0;
                    $gross_total = 0;
                    $tot = 0;
                @endphp
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
                                    @php 
                                       
                                          
                                      
                                        $gross_total = $gross_total + ($x->quantity*$x->price);
                                    @endphp
                                               

                                @endforeach
                              

                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <p class="px-2 mb-0"><span class="text-bold">SUBTOTAL</span><span class="float-end">₱ {{ number_format(\Cart::session(Auth::user()->id)->getSubTotal(),2) }}</span></p>
                   <!--  @if($shipping=='provincial')                 
                        <p class="px-2 mb-0">SHIPPING: <span class="ml-5">PROVINCIAL</span><span class="float-end">₱ 250</span></p>
                    @elseif($shipping=='gma')
                        <p class="px-2 mb-0">SHIPPING: <span class="ml-5">GREATER METRO MANILA</span><span class="float-end">₱ 250</span></p>
                    @elseif($shipping=='courier')
                        <div class="col">GRAB/LALAMOVE</div>
                    @else
                        <div class="col">PICK UP AT STORE</div>
                    @endif -->
                    @foreach(\Cart::session(Auth::user()->id)->getConditions() as $x)
                          
                        <p class="px-2 mb-0">Promo: <span class="ml-5">{{$x->getName() }}</span><span class="float-end">₱ {{$x->getValue() }}</span></p>         
               
                    @endforeach
                    
                    <br><br>
                   
                        <!-- <label class="smaller-label">₱ {{ number_format($gross_total,2) }}</label><br> -->
                        @foreach(\Cart::session(Auth::user()->id)->getConditions() as $x)
                            @if($x->getType()=='shipping_type')
                            @if( preg_match('/[-]/', $x->getValue() ) )
                               <!-- <label class="smaller-label"><br>₱ {{ number_format($x->getValue(),2) }}</label><br> -->
                            @else
                                <!-- <label class="smaller-label"><br>₱ {{ number_format($x->getCalculatedValue(\Cart::session(Auth::user()->id)->getSubTotal()),2) }}</label><br> -->
                            @endif
                                                                
                                @php
                                $tot = $tot + $x->getCalculatedValue(\Cart::session(Auth::user()->id)->getSubTotal());
                                @endphp
                                
                            @endif
                        @endforeach

                    <p class="px-2 py-3 total-bg"><span class="text-bold">TOTAL</span><span class="float-end" id="total">₱ {{number_format(\Cart::session(Auth::user()->id)->getTotal(),2)}}</span></p>

                     {{ Form::open(array('route' => 'client-apply-promo', 'method' => 'get' ,'id' => 'formPromo')) }}
                    <div class="row">
                        <div class="col-8">
                            <input type="text" name="code" id="code" class="form-control" placeholder="Promo Code / Discount Code">
                        </div>
                        <div class="col">
                            <button class="btn btn-apply form-control">APPLY</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
       @if(Session::has('error_message'))
            Swal.fire({
            // title: '<h3></h3>',
            html:
                '<h4>{{Session::get('error_message')}}</h4>',
            type: 'error',
            customClass: 'swal-wide',
            confirmButtonText: 'Ok',
            confirmButtonClass: 'btn-swal'             
        })
        @endif
</script>
@endsection