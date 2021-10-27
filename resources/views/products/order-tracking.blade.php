@extends('template.master')
@section('content')
<style>
    .table-header{
    background-color: #EA5656;
}
.order-image{
    width: 90px;
    height: 90px;
}
</style>
<div class="container-fluid px-5">
    <h1 class=" headers lead fs-1 text-dark mb-0 mt-4">Order Tracking</h1>
    <div class="table-header mt-5 pb-0 px-3">
        <h1 class="lead fs-1 text-light mb-0 p-2">Orders</h1>
    </div>
    <div class="row p-2">
        <div class="col-lg-3 col-sm flex-column me-lg-5 m-0">
            <label class="fw-bold fs-3" for="">Order Number</label>
            <h5 class="fw-bold">21606JJK21NN1</h5>
            <a class="fw-bold text-uppercase btn form-control btn-background" href="#">View order</a>     
        </div>
        <div class="col-lg-2 col-sm pt-3">
            <img class="img-fluid order-image" src="/images/image-placeholder.jpeg" alt="">
        </div>
        <div class="col-lg-3 pt-3">
            <p class="mb-0">Product Name</p>
            <p class="fs-5">₱ 12,000</p>
        </div>
        <div class="col-lg-3 col-sm pt-3">
            <h5 class="fw-bold">Completed</h5>
            <small class="text-muted">Last Update: <br> 2021-01-01 01:01</small>
        </div>
    </div>
</div>
@endsection