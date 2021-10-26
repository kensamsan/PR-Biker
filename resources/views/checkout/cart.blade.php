@extends('template.master')
@section('content')

<link rel="stylesheet" href="/css/store/checkout.css">

<main>
    <div class="container-fluid pb-5 mb-5">
        <div class="row my-5 px-5">
            <div class="col-lg-9" id="cart-col">
                <h2 class="fw-bold"><b>CART ITEMS</b></h4>
                    <!-- Cart with items -->
                    @if(\Cart::session(Auth::user()->id)->getContent()->count()>0)
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th class="th-lg">Product</th>
                        <th>Qty</th>
                        <th></th>
                        <th>Price</th>
                        <th>Qty Price</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach(\Cart::session(Auth::user()->id)->getContent() as $x)
                        <tr>
                            <td>
                            
                                <img src="/uploads/products/{{ App\Product::find($x->id)->getProductImage() }}" style="width:100px;height:100px;float:left;padding-right: 0px;margin-right: 15px;object-fit:cover;">
                                <p><strong><a href="/product/{{ App\Product::find($x->id)->first()->id or 0 }}" style="color: #F2B533;">{{ $x->name }}</a></strong></p>
                            </td>
                            <td style="width: 100px;">
                                <input type="text" class="form-control" value="{{ $x->quantity }}" readonly="true">
                            </td>
                            <td>
                                <a href="{{ route('add-qty',$x->id) }}" style="color: #F2B533;"><i class="fa fa-plus-circle"></i></a>
                                <a href="{{ route('sub-qty',$x->id) }}" style="color: #F2B533;"><i class="fa fa-minus-circle"></i></a>
                            </td>
                            <td>₱ {{ number_format($x->price,2) }}</td>
                            <td>₱ {{ number_format($x->price*$x->quantity,2) }}</td>
                            <td><a href="{{ route('client-remove-item',$x->id) }}" style="color: #F2B533;"><i class="fa fa-times"></i> remove</a></td>
                      </tr>


                    @endforeach

                  

                </tbody>
                
                <tfoot>
                    @if(count(\Cart::session(Auth::user()->id)->getConditions())>0)
                    <tr>
                        <td colspan="3">&nbsp;</td>
                        <td>
                            <strong>PROMO</strong>
                        </td>
                        <td>
                        &nbsp;
                        </td>
                    </tr>

                    @endif
                    @foreach(\Cart::session(Auth::user()->id)->getConditions() as $x)
                    <tr>
                        <td colspan="3">&nbsp;</td>
                        <td>
                            <strong>{{$x->getName()}}</strong>
                            <br/>
                            {{$x->getAttributes()['description']}}
                        </td>
                        <td>
                        @if($x->getTarget()=='total')
                        ₱ {{ number_format($x->getCalculatedValue(\Cart::session(Auth::user()->id)->getTotal()),2) }}
                        @else
                        ₱ {{ number_format($x->getCalculatedValue(\Cart::session(Auth::user()->id)->getSubTotal()),2) }}
                        @endif
                        </td>
                    </tr>
                    @endforeach

                    
                  <tr>
                    <td colspan="3">&nbsp;</td>
                    <td><strong>Subtotal</strong></td>
                    <td>₱ {{ number_format(\Cart::session(Auth::user()->id)->getSubTotal(),2) }}</td>
                    <td>&nbsp;</td>
                  </tr>
                </tfoot>
            </table>
            
            <a href="{{ route('client-checkout-information') }}" style="float: right"><button class="btn btn-shop">CHECKOUT</button></a>
            </div>
            @else
            <h3 style="margin: auto;width: 50%;border: 3px ;padding: 10px;">There are no items in your shopping cart</h3>
            @endif
            </div>
           <!--  <div class="col-lg-3 cart-info">
                <div class="card">
                    <div class="card-body">
                        <h4 class="fw-bold mb-3 text-uppercase headers">order summary</h4>
                        <p class="card-text text-uppercase fw-bold pt-3">Items<span class="float-end">₱
                                20,000</span>
                        </p>
                        <hr>
                        <label class="card-text text-uppercase fw-bold">sub total</label>
                        <p class="card-text text-muted pt-3">Price<span class="float-end">₱
                            20,000</span>
                        </p>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fw-bold rounded">Promotional Code</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <label class="card-text text-uppercase fw-bold pt-2">total</label>
                        <p class="card-text text-muted pt-3">Sub Total<span class="float-end">₱
                            20,000</span>
                        </p>
                        <p class="card-text text-muted">Delivery Fee<span class="float-end">₱
                            20,000</span>
                        </p>
                        <p class="card-text text-muted">Discount<span class="float-end">₱
                            20,000</span>
                        </p>
                        <p class="card-text fw-bold float-end fs-5">P 0.00</p>
                        <div class="text-center d-grid gap-2 col-12">
                            <a href="{{url('billing')}}" class="btn btn-background">CHECKOUT</a>
                        </div>
                        
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    @if(Session::has('add_to_cart'))
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
                 window.location.href = "{{Session::get('add_to_cart')}}";
            }
            });
          

    @endif
</script>
@endsection
