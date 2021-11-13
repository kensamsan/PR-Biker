@extends('template.master')
@section('title', 'Address')
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
           {{ Form::open(['route' => ['account.billing-address.store', $user->id], 'method' => 'store', 'files' => true]) }}
                        <div class="row">
                            <div class="col-lg-12">
                                {{ Form::label('type', 'Type') }}
                                <select name="type" class="form-control">
                                    <option value="home">Home</option>
                                    <option value="work">Work</option>
                                </select>
                                <span class="errors" style="color:#FF0000">{{ $errors->first('title') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                {{ Form::label('first_name', 'Recipient First Name') }}
                                {{ Form::text('first_name', $user->first_name, ['class' => 'form-control span6', 'placeholder' => 'First Name', 'required' => 'required']) }}
                                <span class="errors"
                                    style="color:#FF0000">{{ $errors->first('first_name') }}</span>
                            </div>
                            <div class="col-lg-6">
                                {{ Form::label('last_name', 'Recipient Last Name') }}
                                {{ Form::text('last_name', $user->last_name, ['class' => 'form-control span6', 'placeholder' => 'Last Name', 'required' => 'required']) }}
                                <span class="errors" style="color:#FF0000">{{ $errors->first('address') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                {{ Form::label('address', 'Address') }}
                                {{ Form::text('address', '', ['class' => 'form-control span6', 'placeholder' => 'Unit #,House #, building name,street', 'required' => 'required']) }}
                                <span class="errors" style="color:#FF0000">{{ $errors->first('address') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                {{ Form::label('brgy', 'Barangay') }}
                                <select name="brgy" class="form-control">
                                    <option value="ALMANZA DOS">ALMANZA DOS</option>
                                    <option value="ALMANZA UNO">ALMANZA UNO</option>
                                    <option value="B. F. INTERNATIONAL VILLAGE">B. F. INTERNATIONAL VILLAGE</option>
                                    <option value="DANIEL FAJARDO">DANIEL FAJARDO</option>
                                    <option value="ELIAS ALDANA">ELIAS ALDANA</option>
                                    <option value="ILAYA">ILAYA</option>
                                    <option value="MANUYO DOS">MANUYO DOS</option>
                                    <option value="MANUYO UNO">MANUYO UNO</option>
                                    <option value="PAMPLONA DOS">PAMPLONA DOS</option>
                                    <option value="PAMPLONA TRES">PAMPLONA TRES</option>
                                    <option value="PAMPLONA UNO">PAMPLONA UNO</option>
                                    <option value="PILAR">PILAR</option>
                                    <option value="PULANG LUPA DOS">PULANG LUPA DOS</option>
                                    <option value="PULANG LUPA UNO">PULANG LUPA UNO</option>
                                    <option value="TALON DOS">TALON DOS</option>
                                    <option value="TALON KUATRO">TALON KUATRO</option>
                                    <option value="TALON SINGKO">TALON SINGKO</option>
                                    <option value="TALON TRES">TALON TRES</option>
                                    <option value="TALON UNO">TALON UNO</option>
                                    <option value="ZAPOTE">ZAPOTE</option>  
                                </select>
                          
                                <span class="errors" style="color:#FF0000">{{ $errors->first('brgy') }}</span>
                            </div>
                            <div class="col-lg-6">
                                {{ Form::label('zip', 'Zip') }}
                                {{ Form::text('zip', '', ['class' => 'form-control span6', 'placeholder' => 'Zip', 'required' => 'required']) }}
                                <span class="errors" style="color:#FF0000">{{ $errors->first('zip') }}</span>
                            </div>
                        </div>
                   
                        <div class="row">
                            <div class="col-lg-6">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::text('email', $user->email, ['class' => 'form-control span6', 'placeholder' => 'Email', 'required' => 'required']) }}
                                <span class="errors" style="color:#FF0000">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="col-lg-6">
                                {{ Form::label('contact', 'Contact No.') }}
                                {{ Form::number('contact', $user->contact, ['class' => 'form-control span6', 'placeholder' => 'Contact No.', 'required' => 'required']) }}
                                <span class="errors" style="color:#FF0000">{{ $errors->first('contact') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                {{ Form::label('landmark', 'Landmark') }}
                                {{ Form::text('landmark', '', ['class' => 'form-control span6', 'placeholder' => 'Landmark']) }}
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
                    <div style="border-top:none;" class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><a style="text-decoration:none; color:black;" href="{{ route('account.billing-address.index',[Auth::user()->id])}}">Close</a></button>
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
