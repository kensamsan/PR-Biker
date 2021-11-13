@extends('template.master')
@section('title', 'Post A Bike')
@section('content')

    <style>
        .table-header {
            background-color: #EA5656;
        }

        .order-image {
            width: 90px;
            height: 90px;
        }
    </style>

    <div class="container-fluid px-5">
        <h1 class=" headers lead fs-1 text-dark mb-0 mt-4">Create Address</h1>
        <div class="row p-2">
           {{ Form::open(['route' => ['account.billing-address.update', $user->id,$billingAddress->id], 'method' => 'PUT', 'files' => true]) }}
                        <div class="row">
                            <div class="col-lg-12">
                                {{ Form::label('type', 'Type') }}
                                <select name="type" class="form-control">
                                    <option value="home" @if($billingAddress->type=='home') selected @endif>Home</option>
                                    <option value="work" @if($billingAddress->type=='work') selected @endif>Work</option>
                                </select>
                                <span class="errors" style="color:#FF0000">{{ $errors->first('title') }}</span>
                            </div>
                        </div>
                     
                        <div class="row">
                            <div class="col-lg-12">
                                {{ Form::label('address', 'Address') }}
                                {{ Form::text('address', $billingAddress->address, ['class' => 'form-control span6', 'placeholder' => 'Unit #,House #, building name,street', 'required' => 'required']) }}
                                <span class="errors" style="color:#FF0000">{{ $errors->first('address') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                {{ Form::label('brgy', 'Barangay') }}
                                <select name="brgy" class="form-control">
                                    <option value="ALMANZA DOS" @if($billingAddress->brgy=='ALMANZA DOS') selected @endif >ALMANZA DOS</option>
                                    <option value="ALMANZA UNO" @if($billingAddress->brgy=='ALMANZA UNO') selected @endif >ALMANZA UNO</option>
                                    <option value="B. F. INTERNATIONAL VILLAGE" @if($billingAddress->brgy=='B. F. INTERNATIONAL VILLAGE') selected @endif>B. F. INTERNATIONAL VILLAGE</option>
                                    <option value="DANIEL FAJARDO" @if($billingAddress->brgy=='DANIEL FAJARDO') selected @endif>DANIEL FAJARDO</option>
                                    <option value="ELIAS ALDANA" @if($billingAddress->brgy=='ELIAS ALDANA') selected @endif>ELIAS ALDANA</option>
                                    <option value="ILAYA" @if($billingAddress->brgy=='ILAYA') selected @endif>ILAYA</option>
                                    <option value="MANUYO DOS" @if($billingAddress->brgy=='MANUYO DOS') selected @endif>MANUYO DOS</option>
                                    <option value="MANUYO UNO" @if($billingAddress->brgy=='MANUYO UNO') selected @endif>MANUYO UNO</option>
                                    <option value="PAMPLONA DOS" @if($billingAddress->brgy=='MANUYO DOS') selected @endif>PAMPLONA DOS</option>
                                    <option value="PAMPLONA TRES" @if($billingAddress->brgy=='MANUYO TRES') selected @endif>PAMPLONA TRES</option>
                                    <option value="PAMPLONA UNO" @if($billingAddress->brgy=='MANUYO UNO') selected @endif>PAMPLONA UNO</option>
                                    <option value="PILAR" @if($billingAddress->brgy=='PILAR') selected @endif >PILAR</option>
                                    <option value="PULANG LUPA DOS" @if($billingAddress->brgy=='PULANG LUPA DOS') selected @endif >PULANG LUPA DOS</option>
                                    <option value="PULANG LUPA UNO" @if($billingAddress->brgy=='PULANG LUPA DOS') selected @endif>PULANG LUPA UNO</option>
                                    <option value="TALON DOS" @if($billingAddress->brgy=='TALON DOS') selected @endif >TALON DOS</option>
                                    <option value="TALON KUATRO" @if($billingAddress->brgy=='TALON KUATRO') selected @endif  >TALON KUATRO</option>
                                    <option value="TALON SINGKO" @if($billingAddress->brgy=='TALON SINGKO') selected @endif >TALON SINGKO</option>
                                    <option value="TALON TRES" @if($billingAddress->brgy=='TALON TRES') selected @endif>TALON TRES</option>
                                    <option value="TALON UNO" @if($billingAddress->brgy=='TALON UNO') selected @endif >TALON UNO</option>
                                    <option value="ZAPOTE" @if($billingAddress->brgy=='ZAPOTE') selected @endif>ZAPOTE</option>  
                                </select>
                          
                                <span class="errors" style="color:#FF0000">{{ $errors->first('brgy') }}</span>
                            </div>
                            <div class="col-lg-6">
                                {{ Form::label('zip', 'Zip') }}
                                {{ Form::text('zip', $billingAddress->zip, ['class' => 'form-control span6', 'placeholder' => 'Zip', 'required' => 'required']) }}
                                <span class="errors" style="color:#FF0000">{{ $errors->first('zip') }}</span>
                            </div>
                        </div>
                   
                        <div class="row">
                          
                            <div class="col-lg-6">
                                {{ Form::label('contact', 'Contact No.') }}
                                {{ Form::number('contact', $billingAddress->contact, ['class' => 'form-control span6', 'placeholder' => 'Contact No.', 'required' => 'required']) }}
                                <span class="errors" style="color:#FF0000">{{ $errors->first('contact') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                {{ Form::label('landmark', 'Landmark') }}
                                {{ Form::text('landmark', $billingAddress->landmark, ['class' => 'form-control span6', 'placeholder' => 'Landmark']) }}
                                <span class="errors"
                                    style="color:#FF0000">{{ $errors->first('landmark') }}</span>
                            </div>
                        </div>
                        <br />
                        <div class="row top10">
                            <div class="col-lg-4">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-background" value="Submit" />
                    </div>
                    {!! Form::close() !!}

        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            $('#province').on('change', function() {
                console.log($(this).val());
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'GET',
                    url: '/api/fetch-cities/' + $(this).val(),
                    success: function(data) {
                        $('#city').children().remove();
                        $.each(data.cities, function(key, value) {
                            $("#city").append(`<option value="` + value.id + `">` +
                                value.name + `</option>`);
                        });
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
                console.log('adas');
            });
        });

        // Activate masking
        $(document).on('ready load click focus', "[data-mask]", (e) => {
            let obj = $(e.currentTarget);
            if (!obj.attr('data-masked')) {
                obj.inputmask('mask', {
                    'mask': obj.attr('data-mask-format'),
                    'removeMaskOnSubmit': true,
                    'autoUnmask': true
                });

                obj.attr('data-masked', 'true');
            }
        });
    </script>
@endsection
