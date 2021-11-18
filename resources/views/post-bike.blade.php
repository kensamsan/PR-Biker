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
        <h1 class=" headers lead fs-1 text-dark mb-0 mt-4">Post A Bike</h1>
        <div class="row p-2">
            {{ Form::open(['url' => '/post-bike-submit', 'method' => 'post', 'files' => true]) }}

            <div class="row">
                <div class="col-lg-4">
                    {{ Form::label('bike_name', 'Bike Owner') }}
                    {{ Form::text('bike_name', '', ['class' => 'form-control span6', 'placeholder' => 'Owner Name']) }}
                    <span class="errors" style="color:#FF0000">{{ $errors->first('bike_name') }}</span>
                </div>
                <div class="col-lg-4">
                    {{ Form::label('bike_unit', 'Bike Unit') }}
                    {{ Form::text('bike_unit', '', ['class' => 'form-control span6', 'placeholder' => 'Bike Unit']) }}
                    <span class="errors" style="color:#FF0000">{{ $errors->first('bike_unit') }}</span>
                </div>
                <div class="col-lg-4">
                    {{ Form::label('images', 'Images') }} <br>
                    <input type="file" name="images[]" multiple accept="image/png, image/jpeg" required>
                    <br>
                    <span class="errors" style="color:#FF0000">{{ $errors->first('bike_image') }}</span>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-4">
                    {{ Form::label('City', 'City') }}
                    <input type="text" class="form-control" value="Las Piñas City" disabled>
                </div>
                <!-- <div class="col-lg-4">
                    {{ Form::label('brgy', 'Barangay') }}
                    <input type="text" name="brgy" value="{{Auth::user()->getBillingAddressBrgy() }}" readonly="true" class="form-control">
                </div> -->
            </div>
            <div class="row mt-2">
                <div class="col-lg-8">

                    {{ Form::label('Address', 'Address') }}
                    <select name="address" class="form-control" required="true">
                        @foreach($billingAddress as $x)
                        <option value="{{$x->id}}" @if($x->id==$billingAddress->last()->id)
                            selected @endif>{{$x->address}} {{$x->city}} {{$x->zip}} {{ $x->brgy}}</option>
                        @endforeach
                    </select>
                    <!-- <input type="text" name="address" value="{{Auth::user()->getBillingAddress() }}" readonly="true" class="form-control"> -->
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4">
                    {{ Form::label('price', 'Price') }}
                    <input type="number" class="form-control" placeholder="Price" name="price" maxlength="7" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    <span class="errors" style="color:#FF0000">{{ $errors->first('price') }}</span>
                </div>
                <div class="col-lg-4">
                    {{ Form::label('description', 'Description') }}
                    <textarea class="form-control remove-resize" name="description" required></textarea>
                    <span class="errors" style="color:#FF0000">{{ $errors->first('description') }}</span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4" type="number">
                    {{ Form::label('fb_url', 'Facebook URL') }}
                    <input type="text" class="form-control" placeholder="Facebook URL" name="fb_url">
                    <span class="errors" style="color:#FF0000">{{ $errors->first('fb_url') }}</span>
                </div>
                <div class="col-lg-4">
                    {{ Form::label('contact_number', 'Contact Number') }}
                    <input type="text" class="form-control" placeholder="" name="contact_number">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4 mb-5">
                    <input type="submit" class="btn btn-background" value="Submit"
                        onclick="this.disabled=true;this.value='Submitting, please wait...';this.form.submit();" />
                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    @if(Session::has('flash_error'))
    Swal.fire({
        // title: '<h3></h3>',
        html: '<h4>IMAGE REQUIRED{{Session::get('
        flash_error ')}}</h4>',
        type: 'error',
        customClass: 'swal-wide',
        confirmButtonText: 'Ok',
        confirmButtonClass: 'btn-swal'
    })
    @endif
 
</script>
@endsection
