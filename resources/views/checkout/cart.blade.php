@extends('template.master')


@section('content')

<link rel="stylesheet" href="/css/store/checkout.css">
<link rel="stylesheet" href="/css/store/main.css">
<link rel="stylesheet" href="/css/store/normalize.css">

<main>
    <div class="container-fluid mb-">
    <div class="row my-5 px-5">
        <div class="col-lg-9" id="cart-col">   
            <h2 class="fw-bold"><b>CART ITEMS</b></h4>
            <!-- Cart with items -->
            <table class="table table-cart">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">PRODUCT DETAILS</th>
                        <th scope="col"></th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center align-middle"><a href="#" class="cart-remove"><i class="fas fa-times"></i></a></td>
                        <td><img src="Images/sample1.svg" alt="Product Name" class="cart-table-image"></td>
                        <td class="w-50 align-middle">Product Name</td>
                        <td class="align-middle">
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
                            </div>
                        </td>
                        <td class="align-middle">₱ 20,000</td>
                        <td class="align-middle">₱ 20,000</td>
                    </tr>
                    <td class="text-center align-middle"><a href="#" class="cart-remove"><i class="fas fa-times"></i></a></td>
                        <td><img src="Images/sample1.svg" alt="Product Name" class="cart-table-image"></td>
                        <td class="w-50 align-middle">Product Name</td>
                        <td class="align-middle">
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
                            </div>
                        </td>
                        <td class="align-middle">₱ 20,000</td>
                        <td class="align-middle">₱ 20,000</td>
                </tbody>
            </table>
            <!-- Cart without items -->
            <!-- <div class="text-center align-middle w-100">
                <h1 class="h-banner text-center mb-0 text-muted">Your cart is empty :(</h1>
                <h3 class="text-muted">Go to Store and Start Shopping Now!</h3>
            </div> -->
        </div>
        <div class="col-lg-3 cart-info">
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="text-bold mb-3">Cart Total</h4>
                    <p class="p-large pb-2 border-bottom">Subtotal <span class="float-right">₱ 20,000</span></p>
                    <p class="p-large pb-2 border-bottom">Shipping <span class="float-right">---</span></p>
                    <p class="text-muted">Note: Shipping Fees are not reflected on cart items. Total Shipping Fees will becomputed upon order verification. </p>
                    <p class="text-bold"><span class="text-blue">Total</span><span class="float-right">₱ 20,000</span></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </main>
    @endsection