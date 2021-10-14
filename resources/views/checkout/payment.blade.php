@extends('template.master')


@section('content')

<link rel="stylesheet" href="/css/store/checkout.css">
<link rel="stylesheet" href="/css/store/main.css">
<link rel="stylesheet" href="/css/store/normalize.css">
<link rel="stylesheet" href="/css/store/sidebar.css">


<style>
  .btn span.icon a{
    background:tomato;
    text-decoration: none;
    padding-top: 5pt;
    color: #fff;
    float: left;
    width: 100%;
    height: 40px;
  }

  textarea {
  width: 92%;
  height: 100px;
  margin-left: 15px;
  padding: 10px 20px;
  box-sizing: border-box;
  border: 2px solid rgb(197, 197, 197);
  border-radius: 4px;
  background-color: #ffffff;
  font-size: 16px;
  resize: none;
}

</style>
<!--White navbar-->
@include('template.search')
<button class="btn btn-main-cart btn-transparent mt-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="/images/shopping-cart-solid.png" alt="Cart"><span class="badge badge-warning" id="cartCount">10</span>
</button>
<div class="dropdown-menu dropdown-menu-right mr-lg-3 cart-menu">
    <div class="cart-container">
        <ul class="cart-list">
            <li class="cart-item mx-2 d-flex">
                <img src="images/image-placeholder.jpeg" alt="Product Name" class="cart-image">
                <div class="item-info ml-3">
                    <a href="#" class="cart-remove"><i class="fas fa-times"></i></a>
                    <p class="product-name mb-0">Product Name</p>
                    <label class="product-price">₱ 12,000</label>
                    <div class="input-group form-inline w-100 d-flex btn-qty">
                        <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary btn-minus">
                            <i class="fa fa-minus"></i>
                        </button>
                        </div>
                        <input class="fw-50 quantity" min="0" name="quantity" value="1" type="number" disabled>
                        <div class="input-group-append">
                        <button class="btn btn-outline-secondary btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                        </div>
                        <label class="ml-auto">Total: ₱</label>
                    </div>
                    
                </div>
            </li>
        </ul>
    </div>
    <hr>
    <div class="w-100 text-right">
        <label>Total: <span class="text-bold">₱ 20,000</span></label>
    </div>
    <a class="btn btn-aguora-main btn-view-cart form-control" href="../checkout/cart.html">VIEW CART</a>
</div>
</nav>

<!-- Content Here -->
<main>
<div class=" pt-5 container-fluid">
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
    <form action="#">
        <div class="row justify-content-center mb-5 pb-5">
        
            <!-- Left Section -->
            <div class="col-lg-5 px-5 my-3 checkout-form">
                <h5 class="text-bold mb-5">PAYMENT INFORMATION</h5>
                <div class="row mb-2">
                    <div class="col-4"><span class="text-bold">Contact Number</span></div>
                    <div class="col">0966-701-1409</div>
                    <div class="col-2 text-right"><a href="#" class="link-main-blue">CHANGE</a></div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><span class="text-bold">Billing Address</span></div>
                    <div class="col">123 Street St., Building, Brrgy. Baranagay, Exmaple City</div>
                    <div class="col-2 text-right"><a href="#" class="link-main-blue">CHANGE</a></div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><span class="text-bold">Shipping Method</span></div>
                    <div class="col">GRAB/LALAMOVE</div>
                    <div class="col-2 text-right"><a href="#" class="link-main-blue">CHANGE</a></div>
                </div>
                <hr>
                <p class="text-bold mb-5">CHOOSE PAYMENT METHOD <span class="text-required">*</span></p>
                <div class="mb-lg-5">
                    <!-- Grab -->
                    <div class="row mt-3 pb-0">
                        <div class="col">
                            <div class="custom-control custom-control-inline">
                                <input type="radio" id="bank" name="bank" class="custom-control-input" data-target="#bankinfo" data-toggle="collapse" aria-expanded="false" required/>
                                <label class="custom-control-label" for="bank">Bank Deposit/Online Fund Transfer</label>
                            </div>
                        </div>
                    </div>
                    <div class="row collapse" id="bankinfo">
                        <div class="col">
                            <div class="pl-4 pt-2">
                                <small>
                                    Bank Name: BPI <br>
                                    Account Name: John Smith <br>
                                    Account Number: 000301208831 <br>
                                    <br><br>
                                    <span class="text-bold">Send proof of payment:</span>
                                    Account > Orders and Tracking > View Order > Upload Deposit Slip
                                </small>
                            </div>
                        </div>
                    </div>
                     <!-- GCash -->
                     <div class="row mt-3 pb-0">
                        <div class="col">
                            <div class="custom-control custom-control-inline">
                                <input type="radio" id="gcash" name="gcash" class="custom-control-input" data-target="#gcashinfo" data-toggle="collapse" aria-expanded="false" required/>
                                <label class="custom-control-label" for="gcash">Bank Deposit/Online Fund Transfer</label>
                            </div>
                        </div>
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
                    <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="owner">
                    <label class="form-check-label" for="owner">I agree to the terms and services and will adhere to them unconditionally. 
                        <a href="#" class="link-main-blue"><span class="text-bold text-blue">(Read the terms of service)</span></a>
                    </label>
                </div>
               </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 my-2">
                        <small><a href="#" class="link-main-custom align-middle">RETURN TO BILLING</a></small>
                    </div>
                    <div class="col-lg-6 my-2">
                        <a href="#" class="btn btn-aguora-main float-lg-right">PROCEED TO PAYMENT &nbsp;<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- Right Section -->
            <div class="col-lg-5 px-5 my-3">
                <div class="cart-items-container">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td><img src="Images/sample1.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small"> <strong>Product Name</strong> </p></td>
                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="Images/sample2.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small"> <strong>Product Name</strong> </p></td>
                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="Images/sample3.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small"> <strong>Product Name</strong> </p></td>
                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="Images/sample4.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small"> <strong>Product Name</strong> </p></td>
                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="Images/sample5.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small"> <strong>Product Name</strong> </p></td>
                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="Images/sample6.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small"> <strong>Product Name</strong> </p></td>
                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <hr>
                <p class="px-2 mb-0"><span class="text-bold">SUBTOTAL</span><span class="float-right">₱ 20,000</span></p>
                <p class="px-2 mb-0">SHIPPING <span class="ml-5">GRAB/LALAMOVE</span><span class="float-right">₱ 0</span></p>
                <br><br>
                <p class="px-2 py-3 total-bg"><span class="text-bold">TOTAL</span><span class="float-right">₱ 20,000</span></p>
                <a href="#" class="text-bold link-main-custom">RETURN POLICY</a>
                <a href="#" class="text-bold link-main-custom float-right">FAQs</a>
            </div>
        </div>
    </form>
</div>
</main>
@endsection