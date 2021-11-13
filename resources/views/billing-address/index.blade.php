@extends('template.master')
@section('title', 'Address')
@section('content')
<link rel="stylesheet" href="/css/profile.css">
<link rel="icon" href="Images/navbarwhitebike.svg">
<div class="row ms-4">
    <div class="headers col-lg-6 mt-5">
        <h1 class="fst-italic fw-bolder">My Address</h1>
    </div>
</div>
<div class="container-fluid d-flex justify-content-evenly mt-3 mb-5">

        <div class="col-lg-5 listing-container shadow p-3">
            <button class="btn btn-background"><a style="text-decoration:none;" href="{{ route('account.billing-address.create',[Auth::user()->id]) }}">Add Address</a></button>
        <table class="table table-hover">
                <tr>
                    <th>Address</th>
                    <th>Brgy</th>
                    <th>Contact Number</th>
                    <th></th>
                </tr>
                @foreach($billingAddress as $x)
                <tr>
                    <td style="color: black!important">{{ $x->address }}</td>
                    <td style="color: black!important">{{ $x->brgy }}</td>
                    <td style="color: black!important">{{ $x->contact }}</td>
                    <td>
                        <a href="{{ route('account.billing-address.edit',[Auth::user()->id,$x->id]) }}">
                            <button  class="btn btn-details form-control">View</button>
                        </a>
                    </td>
                </tr>
                @endforeach 
            </table>
    </div>
</div>

@endsection
