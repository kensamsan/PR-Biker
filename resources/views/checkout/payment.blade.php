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
        <form action="#">
            <div class="row justify-content-center mb-5 pb-5">

                <!-- Left Section -->
                <div class="col-lg-5 px-5 my-3 checkout-form">
                    <h3 class="text-bold mb-5 fst-italic"><b>PAYMENT INFORMATION</b></h5>
                    <div class="row mb-2">
                        <div class="col-4"><span class="text-bold">Contact Number</span></div>
                        <div class="col">0966-701-1409</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4"><span class="text-bold">Billing Address</span></div>
                        <div class="col">123 Street St., Building, Brrgy. Baranagay, Exmaple City</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4"><span class="text-bold">Shipping Method</span></div>
                        <div class="col">GRAB/LALAMOVE</div>
                    </div>
                    <hr>
                    <p class="text-bold mb-5">CHOOSE PAYMENT METHOD <span class="text-required">*</span></p>
                    <div class="mb-lg-5">
                    <!-- GCash -->
                        <div class="row mt-3 pb-0">
                            <div class="col">
                                <div class="custom-control custom-control-inline">
                                    <input type="radio" id="gcash" name="gcash" class="custom-control-input" data-target="#gcashinfo" data-toggle="collapse" aria-expanded="false" required />
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
                        <!-- <div class="form-check mb-3">
                        </div> -->
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-6 my-2">
                            <small><a href="/shipping" class="link-main-custom align-middle">RETURN TO SHIPPING</a></small>
                        </div>
                        <div class="col-lg-6 my-2">
                            <a href="#" class="btn btn-background float-lg-end">PROCEED TO PAYMENT &nbsp;<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Right Section -->
                <div class="col-lg-5 px-5 my-3">
                    <div class="cart-items-container">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td><img src="../images/image-placeholder.jpeg" alt="Product Name" class="cart-table-image"></td>
                                    <td class="w-50">
                                        <p class="p-small">Lenovo G25-10 24.5" Full-HD Gaming Monitor 144Hz 1ms G-SYNC HDMI Display Port Height Adjust VESA</p>
                                    </td>
                                    <td class="text-right w-75">x1 <br>
                                        <span class="text-bold">₱ 20,000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="../images/image-placeholder.jpeg" alt="Product Name" class="cart-table-image"></td>
                                    <td class="w-50">
                                        <p class="p-small">Lenovo G25-10 24.5" Full-HD Gaming Monitor 144Hz 1ms G-SYNC HDMI Display Port Height Adjust VESA</p>
                                    </td>
                                    <td class="text-right w-75">x1 <br>
                                        <span class="text-bold">₱ 20,000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="../images/image-placeholder.jpeg" alt="Product Name" class="cart-table-image"></td>
                                    <td class="w-50">
                                        <p class="p-small">Lenovo G25-10 24.5" Full-HD Gaming Monitor 144Hz 1ms G-SYNC HDMI Display Port Height Adjust VESA</p>
                                    </td>
                                    <td class="text-right w-75">x1 <br>
                                        <span class="text-bold">₱ 20,000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="../images/image-placeholder.jpeg" alt="Product Name" class="cart-table-image"></td>
                                    <td class="w-50">
                                        <p class="p-small">Lenovo G25-10 24.5" Full-HD Gaming Monitor 144Hz 1ms G-SYNC HDMI Display Port Height Adjust VESA</p>
                                    </td>
                                    <td class="text-right w-75">x1 <br>
                                        <span class="text-bold">₱ 20,000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="../images/image-placeholder.jpeg" alt="Product Name" class="cart-table-image"></td>
                                    <td class="w-50">
                                        <p class="p-small">Lenovo G25-10 24.5" Full-HD Gaming Monitor 144Hz 1ms G-SYNC HDMI Display Port Height Adjust VESA</p>
                                    </td>
                                    <td class="text-right w-75">x1 <br>
                                        <span class="text-bold">₱ 20,000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="../images/image-placeholder.jpeg" alt="Product Name" class="cart-table-image"></td>
                                    <td class="w-50">
                                        <p class="p-small">Lenovo G25-10 24.5" Full-HD Gaming Monitor 144Hz 1ms G-SYNC HDMI Display Port Height Adjust VESA</p>
                                    </td>
                                    <td class="text-right w-75">x1 <br>
                                        <span class="text-bold">₱ 20,000</span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <p class="px-2 mb-0"><span class="text-bold">SUBTOTAL</span><span class="float-end">₱ 20,000</span></p>
                    <p class="px-2 mb-0">SHIPPING: <span class="ml-5">GRAB/LALAMOVE</span><span class="float-end">₱ 0</span></p>
                    <br><br>
                    <p class="px-2 py-3 total-bg"><span class="text-bold">TOTAL</span><span class="float-end">₱ 20,000</span></p>
                </div>
            </div>
        </form>
    </div>
</main>

@endsection