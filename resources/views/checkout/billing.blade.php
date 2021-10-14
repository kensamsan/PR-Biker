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
                    <p class="product-name mb-0">Lenovo G25-10 24.5" Full-HD Gaming Monitor 144Hz 1ms G-SYNC HDMI Display Port Height Adjust VESA</p>
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
    <a class="btn btn-aguora-main btn-view-cart form-control" href="checkout/cart.html">VIEW CART</a>
</div>
</nav>

<!-- Content Here -->
<main>
<div class="container-fluid">
    <div class="row justify-content-center my-5">
        <div class="col-lg-6 text-center">
            <div class="progressbar-container pt-5">
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
                <h5 class="text-bold mb-5">BILLING INFORMATION</h5>
                <p class="mb-2"><span class="text-bold">Contact Number</span> 
                    <a href="#" class="float-right link-main-blue">UPDATE</a>
                </p>
                <input type="text" class="form-control" id="number">
                <p class="mt-3 mb-2"><span class="text-bold">Billing Address</span> 
                    <a href="#" class="float-right link-main-blue">CHANGE ADDRESS</a>
                </p>
                <input type="text" class="form-control" id="address">
                <p class="text-bold mt-3 mb-2">Note</p>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>

                <div class="row mt-4 align-items-center">
                    <div class="col-lg-6 my-2">
                        <small><a href="#" class="link-main-custom align-middle">RETURN TO CART</a></small>
                    </div>
                    <div class="col-lg-6 my-2">
                        <a href="#" class="btn btn-aguora-main float-lg-right">SHIPPING &nbsp;<i class="fas fa-arrow-right"></i></a>
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
                                <td class="w-50"><p class="p-small text-bold">Product Name</p></td>
                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="Images/sample2.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small text-bold">Product Name</p></td>
                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="Images/sample3.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small text-bold">Product Name</p></td>
                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="Images/sample4.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small text-bold">Product Name</p></td>
                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="Images/sample5.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small text-bold">Product Name</p></td>
                                <td class="text-right w-75">x1 <br>
                                    <span class="text-bold">₱ 20,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="Images/sample6.svg" alt="Product Name" class="cart-table-image"></td>
                                <td class="w-50"><p class="p-small text-bold">Product Name</p></td>
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
                <a href="#" class="text-bold link-main-custom">RETURN POLICY</a>
                <a href="#" class="text-bold link-main-custom float-right">FAQs</a>
            </div>
        </div>
    </form>
</div>
</main>

@endsection