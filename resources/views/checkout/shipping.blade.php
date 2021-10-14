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

<main>
<div class="container-fluid">
    <div class="row justify-content-center my-5">
        <div class="col-lg-6 text-center">
            <div class="progressbar-container">
                <ul class="progressbar w-100">
                    <li class="active">BILLING INFORMATION</li>
                    <li >SHIPPING INFORMATION</li>
                    <li>PAYMENT INFORMATION</li>
                </ul>
            </div>
        </div>
    </div>
    <form action="#">
        <div class="row justify-content-center mb-5 pb-5">
        
            <!-- Left Section -->
            <div class="col-lg-5 px-5 my-3 checkout-form">
                <h5 class="text-bold mb-5">SHIPPING INFORMATION</h5>
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
                <hr>
                <p class="text-bold mb-5">CHOOSE SHIPPING METHOD <span class="text-required">*</span></p>
                <div class="shipping-choices mb-lg-5 pb-lg-5">
                    <!-- Pick-up -->
                    <div class="row pb-0">
                        <div class="col">
                            <div class="custom-control custom-control-inline">
                                <input type="radio" id="pick-up" name="shipping" class="custom-control-input" required/>
                                <label class="custom-control-label" for="pick-up">Pick-up in store</label>
                            </div>
                        </div>
                        <div class="col text-right">PHP 0.00</label></div>
                    </div>
                    <!-- Grab -->
                    <div class="row mt-3 pb-0">
                        <div class="col">
                            <div class="custom-control custom-control-inline">
                                <input type="radio" id="grab" name="shipping" class="custom-control-input" data-target="#grabinfo" data-toggle="collapse" aria-expanded="false" required/>
                                <label class="custom-control-label" for="grab">Grab/Lalamove Delivery</label>
                            </div>
                        </div>
                        <div class="col text-right">PHP 0.00</label></div>
                    </div>
                    <div class="row collapse" id="grabinfo">
                        <div class="col">
                            <div class="pl-4 pt-2">
                                <small>
                                    Client is responsible for booking a pick up between 8am-6pm (Mon-Fri) <br>
                                    Name: Big Four Global Technologies <br>
                                    Address: 11 Nicanor Roxas St., Brgy San Isidro Labrador, Quezon City <br>
                                    Landmark: Beside Chuchu <br>
                                    Contact Number: 09312 345 6789 <br><br>
                                    <span class="text-required text-bold">NOTICE: Book only for pick up once your order status is ready ‘for pick up’. This will allow us time to prepare and process your orders.</span>
                                </small>
                            </div>
                        </div>
                    </div>
                    <!-- Greater Metro Manila -->
                    <div class="row mt-3 pb-0">
                        <div class="col">
                            <div class="custom-control custom-control-inline">
                                <input type="radio" id="manila" name="shipping" class="custom-control-input" data-target="#manilainfo" data-toggle="collapse" aria-expanded="false" required/>
                                <label class="custom-control-label" for="manila">Greater Metro Manila</label>
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
                                <input type="radio" id="provincial" name="shipping" class="custom-control-input" data-target="#provincialinfo" data-toggle="collapse" aria-expanded="false" required/>
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
               
                <div class="row mt-4 align-items-center">
                    <div class="col-lg-6 my-2">
                        <small><a href="#" class="link-main-custom align-middle">RETURN TO BILLING</a></small>
                    </div>
                    <div class="col-lg-6 my-2">
                        <a href="payment.html" class="btn btn-aguora-main float-lg-right">PROCEED TO PAYMENT &nbsp;<i class="fas fa-arrow-right"></i></a>
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
                                <td class="w-50"><p class="p-small"> <strong>Product Name</strong></p></td>
                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="Images/sample2.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small"> <strong>Product Name</strong></p></td>                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="Images/sample3.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small"> <strong>Product Name</strong></p></td>                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="Images/sample4.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small"> <strong>Product Name</strong></p></td>                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="Images/sample5.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small"> <strong>Product Name</strong></p></td>                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="Images/sample6.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small"> <strong>Product Name</strong></p></td>                                <td class="text-right w-75">x1 <br>
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