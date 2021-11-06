@extends('template.master')
@section('title', 'Billing Information')
@section('content')

<link rel="stylesheet" href="/css/store/checkout.css">
<link rel="stylesheet" href="/css/store/store.css">
<link rel="stylesheet" href="/css/store/normalize.css">

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

<main>

<!-- Button trigger modal -->

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
            {{ Form::open(array('route' => 'client-checkout-shipping', 'method' => 'get' ,'id'=>'submitForm')) }}
                <div class="row justify-content-center mb-5 pb-5">
                
                    <!-- Left Section -->
                    <div class="col-lg-5 px-5 my-3 checkout-form">
                        <h3 class="fw-bold mb-5 fst-italic"><b>BILLING INFORMATION</b></h5>
                      
                        <p style="color: #707070">Contact Number <a href="#" class="updateNum" data-toggle="modal" data-target="#myModalNumber" style="color: #EA5656"><strong>@if(Auth::user()->contact=='') Add Number @else Update Number @endif </strong></a></p>
                        <input type="text" name="contact_number" class="form-control mt-2" style="color: grey" value="{{Auth::user()->contact}}" required readonly="true">
                        <p class="mt-3 mb-2"><span class="text-bold">Billing Address</span> 
                        </p>
                       <p style="color: #707070">Select a shipping address from your address book or <br><a href="#myModal" data-toggle="modal" style="color: #EA5656"><strong>Enter new address</strong></a></p>
                        <div class="row my-3">
                            <div class="col">
                                <select name="billing_id" class="form-control" required="true">
                                    @foreach($billingAddress as $x)
                                        <option value="{{$x->id}}" @if($x->id==$billingAddress->last()->id) selected @endif>{{$x->address}} {{$x->city}} {{$x->zip}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <p class="text-bold mt-3 mb-2">Note</p>
                        <textarea class="form-control remove-resize" id="exampleFormControlTextarea1" rows="5"></textarea>

                        <div class="row mt-4 align-items-center">
                            <div class="col-lg-6 my-2">
                                <small><a href="{{ route('client-view-cart') }}" class="link-main-custom align-middle">RETURN TO CART</a></small>
                            </div>
                            <div class="col-lg-6 my-2">
                                  <input type="submit" value="CONTINUE TO SHIPPING" class="btn btn-shop" onclick="this.disabled=true;this.value='Submitted, please wait...';document.getElementById('submitForm').submit();" >
                             
                            </div>
                        </div>
                    </div>
                    <!-- Right Section -->
                    <div class="col-lg-5 px-5 my-3">
                        <div class="cart-items-container">
                            <table class="table table-borderless">
                                <tbody>
                                    @foreach(\Cart::session(Auth::user()->id)->getContent() as $x)

                                        <tr>
                                            <td>
                                                <img  src="/uploads/products/{{App\Product::find($x->id)->getProductImage()}}" class="shipping-img mr-3" style="float: left;width:75px;height:75px">
                                            </td>
                                            <td class="w-50"><p class="p-small">{{$x->name}}</p></td>
                                            <td class="text-right w-75">x{{$x->qty}} <br>
                                                <span class="text-bold">₱ {{number_format($x->price)}}</span>
                                            </td>
                                        </tr>

                                       

                                    @endforeach

                                  
                                    
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <p class="px-2"><span class="text-bold">SUBTOTAL</span><span class="float-end">₱ {{ number_format(\Cart::session(Auth::user()->id)->getSubTotal(),2) }}</span></p>
                    </div>
                </div>
            </form>
        </div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add new Billing Address</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
       {{ Form::open(array('route' => ['account.billing-address.store-modal',$user->id], 'method' => 'store','files'=>true)) }}
                <div class="row">
                    <div class="col-lg-12">
                        {{ Form::label('type', 'Type') }}
                        <select name="type" class="form-control">
                            <option value="home">Home</option>
                            <option value="work">Work</option>                                      
                        </select>
                        <span class="errors" style="color:#FF0000">{{$errors->first('title')}}</span>
                    </div>
                </div>
                <div class="row">
                                <div class="col-lg-6">
                                    {{ Form::label('first_name', 'Recipient First Name') }}
                                    {{ Form::text('first_name',$user->first_name,array('class'=>'form-control span6','placeholder' => 'First Name','required'=>'required')) }}
                                    <span class="errors" style="color:#FF0000">{{$errors->first('first_name')}}</span>
                                </div>
                                <div class="col-lg-6">
                                    {{ Form::label('last_name', 'Recipient Last Name') }}
                                    {{ Form::text('last_name',$user->last_name,array('class'=>'form-control span6','placeholder' => 'Last Name','required'=>'required')) }}
                                    <span class="errors" style="color:#FF0000">{{$errors->first('address')}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    {{ Form::label('address', 'Address') }}
                                    {{ Form::text('address','',array('class'=>'form-control span6','placeholder' => 'Unit #,House #, building name,street','required'=>'required')) }}
                                    <span class="errors" style="color:#FF0000">{{$errors->first('address')}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    {{ Form::label('brgy', 'Barangay') }}
                                    {{ Form::text('brgy','',array('class'=>'form-control span6','placeholder' => 'Barangay','required'=>'required')) }}
                                    <span class="errors" style="color:#FF0000">{{$errors->first('brgy')}}</span>
                                </div>
                                <div class="col-lg-6">
                                    {{ Form::label('zip', 'Zip') }}
                                    {{ Form::text('zip','',array('class'=>'form-control span6','placeholder' => 'Zip','required'=>'required')) }}
                                    <span class="errors" style="color:#FF0000">{{$errors->first('zip')}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    {{ Form::label('region', 'Region') }}
                                    {{ Form::text('region','',array('class'=>'form-control span6','placeholder' => 'Metro Manila/NCR','required'=>'required')) }}
                                    <span class="errors" style="color:#FF0000">{{$errors->first('region')}}</span>
                                </div>
                                <div class="col-lg-6">
                                    {{ Form::label('city', 'City') }}
                                    {{ Form::text('city','',array('class'=>'form-control span6','placeholder' => 'City','required'=>'required')) }}
                                    <span class="errors" style="color:#FF0000">{{$errors->first('city')}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    {{ Form::label('email', 'Email') }}
                                    {{ Form::text('email',$user->email,array('class'=>'form-control span6','placeholder' => 'Email','required'=>'required')) }}
                                    <span class="errors" style="color:#FF0000">{{$errors->first('email')}}</span>
                                </div>
                                <div class="col-lg-6">
                                    {{ Form::label('contact', 'Contact No.') }}
                                    {{ Form::number('contact',$user->contact,array('class'=>'form-control span6','placeholder' => 'Contact No.','required'=>'required')) }}
                                    <span class="errors" style="color:#FF0000">{{$errors->first('contact')}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    {{ Form::label('landmark', 'Landmark') }}
                                    {{ Form::text('landmark','',array('class'=>'form-control span6','placeholder' => 'Landmark','required'=>'required')) }}
                                    <span class="errors" style="color:#FF0000">{{$errors->first('landmark')}}</span>
                                </div>
                            </div>
                <br/>
                <div class="row top10">
                    <div class="col-lg-4">
                        
                    </div>
                </div>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-background" value="Submit"/>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

<div class="modal fade" id="myModalNumber" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" style="float: left">Contact Number</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
       {{ Form::open(array('route' => ['account.contact.store-modal',$user->id], 'method' => 'store','files'=>true)) }}
                
                <div class="row">
                    <div class="col-lg-12">
                        <label for="contact"><b>Contact Number</b></label>
                        {{ Form::text('contact','',array('class'=>'form-control span6','placeholder' => 'Contact No.','required'=>'required')) }}
                    </div>
                </div>
                <br/>
                <div class="row top10">
                    <div class="col-lg-4">
                        
                    </div>
                </div>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-background" value="Submit"/>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


    </main>

    <!-- Bootstrap Script -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@endsection