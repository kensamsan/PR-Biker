@extends('template.master')
@section('content')

<link rel="stylesheet" href="/css/store/checkout.css">

<main>
    <div class="container-fluid pb-5 mb-5">
        <div class="row my-5 px-5">
            <div class="col-lg-9" id="cart-col">
                <h2 class="fw-bold"><b>CART ITEMS</b></h4>
                    <!-- Cart with items -->
                    <table class="table table-cart border-top border-2">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col-5">PRODUCT DETAILS</th>
                                <th scope="col"></th>
                                <th scope="col">QUANTITY</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center align-middle">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>
                                <td><img src="Images/sample1.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50 align-middle">Product Name</td>
                                <td class="align-middle">
                                    <form>
                                        <input class="rounded border-1 w-50" value="0" type="number" id="quantity"
                                            name="quantity" min="1" max="10">
                                    </form>
                                </td>
                                <td class="align-middle">₱ 20,000</td>
                                <td class="align-middle">₱ 20,000</td>
                            </tr>
                            <td class="text-center align-middle">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                </div>
                            </td>
                            <td><img src="Images/sample1.svg" alt="Product Name" class="cart-table-image"></td>
                            <td class="w-50 align-middle">Product Name</td>
                            <td class="align-middle">
                                <form class="rounded">
                                    <input class="rounded border-1 w-50" value="0" type="number" id="quantity"
                                        name="quantity" min="1" max="10">
                                </form>
                            </td>
                            <td class="align-middle">₱ 20,000</td>
                            <td class="align-middle">₱ 20,000</td>
                        </tbody>
                    </table>
            </div>
            <div class="col-lg-3 cart-info">
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
            </div>
        </div>
    </div>
</main>
@endsection
