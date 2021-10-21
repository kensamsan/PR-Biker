@extends('template.master')

@section('content')

<link rel="stylesheet" href="/css/store/checkout.css">
<link rel="stylesheet" href="/css/store/store.css">
<link rel="stylesheet" href="/css/store/normalize.css">

<main>
        <div class="container-fluid">
            <div class="row justify-content-center my-5">
                <div class="col-lg-6 text-center">
                    <div class="progressbar-container">
                        <ul class="progressbar w-100">
                            <li class="">BILLING INFORMATION</li>
                            <li>SHIPPING INFORMATION</li>
                            <li>PAYMENT INFORMATION</li>
                        </ul>
                    </div>
                </div>
            </div>
            <form action="#">
                <div class="row justify-content-center mb-5 pb-5">
                
                    <!-- Left Section -->
                    <div class="col-lg-5 px-5 my-3 checkout-form">
                        <h3 class="fw-bold mb-5 fst-italic"><b>BILLING INFORMATION</b></h5>
                        <p class="mb-2"><span class="text-bold">Contact Number</span> 
                        </p>
                        <input type="text" class="form-control" id="number">
                        <p class="mt-3 mb-2"><span class="text-bold">Billing Address</span> 
                        </p>
                        <input type="text" class="form-control" id="address">
                        <p class="text-bold mt-3 mb-2">Note</p>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>

                        <div class="row mt-4 align-items-center">
                            <div class="col-lg-6 my-2">
                                <small><a href="/cart" class="link-main-custom align-middle">RETURN TO CART</a></small>
                            </div>
                            <div class="col-lg-6 my-2">
                                <a href="#" class="btn btn-background float-lg-end">SHIPPING &nbsp;<i class="fas fa-arrow-right"></i></a>
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
                                        <td class="w-50"><p class="p-small">Lenovo G25-10 24.5" Full-HD Gaming Monitor 144Hz 1ms G-SYNC HDMI Display Port Height Adjust VESA</p></td>
                                        <td class="text-right w-75">x1 <br>
                                            <span class="text-bold">₱ 20,000</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="../images/image-placeholder.jpeg" alt="Product Name" class="cart-table-image"></td>
                                        <td class="w-50"><p class="p-small">Lenovo G25-10 24.5" Full-HD Gaming Monitor 144Hz 1ms G-SYNC HDMI Display Port Height Adjust VESA</p></td>
                                        <td class="text-right w-75">x1 <br>
                                            <span class="text-bold">₱ 20,000</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="../images/image-placeholder.jpeg" alt="Product Name" class="cart-table-image"></td>
                                        <td class="w-50"><p class="p-small">Lenovo G25-10 24.5" Full-HD Gaming Monitor 144Hz 1ms G-SYNC HDMI Display Port Height Adjust VESA</p></td>
                                        <td class="text-right w-75">x1 <br>
                                            <span class="text-bold">₱ 20,000</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="../images/image-placeholder.jpeg" alt="Product Name" class="cart-table-image"></td>
                                        <td class="w-50"><p class="p-small">Lenovo G25-10 24.5" Full-HD Gaming Monitor 144Hz 1ms G-SYNC HDMI Display Port Height Adjust VESA</p></td>
                                        <td class="text-right w-75">x1 <br>
                                            <span class="text-bold">₱ 20,000</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="../images/image-placeholder.jpeg" alt="Product Name" class="cart-table-image"></td>
                                        <td class="w-50"><p class="p-small">Lenovo G25-10 24.5" Full-HD Gaming Monitor 144Hz 1ms G-SYNC HDMI Display Port Height Adjust VESA</p></td>
                                        <td class="text-right w-75">x1 <br>
                                            <span class="text-bold">₱ 20,000</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="../images/image-placeholder.jpeg" alt="Product Name" class="cart-table-image"></td>
                                        <td class="w-50"><p class="p-small">Lenovo G25-10 24.5" Full-HD Gaming Monitor 144Hz 1ms G-SYNC HDMI Display Port Height Adjust VESA</p></td>
                                        <td class="text-right w-75">x1 <br>
                                            <span class="text-bold">₱ 20,000</span>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <p class="px-2"><span class="text-bold">SUBTOTAL</span><span class="float-right">₱ 20,000</span></p>
                        <p class="px-2 py-3 total-bg"><span class="text-bold">TOTAL</span><span class="float-right">₱ 20,000</span></p>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection