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
                <div class="col-lg-4 mb-3">
                    {{ Form::label('bike_name', 'Bike Name') }}
                    {{ Form::text('bike_name', '', ['class' => 'form-control span6', 'placeholder' => 'Bike Name']) }}
                    <span class="errors" style="color:#FF0000">{{ $errors->first('bike_name') }}</span>
                </div>
                <div class="col-lg-4">
                    {{ Form::label('bike_unit', 'Bike Unit') }}
                    {{ Form::text('bike_unit', '', ['class' => 'form-control span6', 'placeholder' => 'Bike Unit']) }}
                    <span class="errors" style="color:#FF0000">{{ $errors->first('bike_unit') }}</span>
                </div>
                <div class="col-lg-4">
                    {{ Form::label('images', 'Images') }}
                    <input type="file" name="images[]" multiple accept="image/png, image/jpeg">
                    <span class="errors" style="color:#FF0000">{{ $errors->first('bike_name') }}</span>
                </div>
            </div>



            <div class="row top10">
                <div class="col-lg-4 mb-3">

                    {{ Form::label('City', 'City') }}
                    <input type="text" class="form-control" value="Las Piñas City" disabled>
                    {{-- <select name="province" id="province" class="form-control">
                        <option></option>
                        @foreach ($provinces as $x)
                            <option value="{{ $x->id }}">{{ $x->name }}</option>
                        @endforeach
                    </select> --}}
                </div>
                <div class="col-lg-4">
                    {{ Form::label('Barangay', 'Barangay') }}
                    <select name="Barangay" id="Barangay" class="form-control" required> </select>
                </div>
                <!-- 
                    <div class="col-lg-4">
                        {{ Form::label('dt_from', 'From') }}
                        <input type="date" name="dt_from" class="form-control">
                        <input type="time" name="dt_from_time" class="form-control">
               
                      
                    </div> -->
            </div>

            <div class="row">
                <div class="col-lg-4" type="number">
                    {{ Form::label('price', 'Price') }}
                    <input type="text" class="form-control" placeholder="Price" name="price_value" data-mask
                    data-mask-format="9999999.99">
                    {{-- {{ Form::text('price','',array('class'=>'form-control span6','placeholder' => 'Price')) }} --}}
                    <span class="errors" style="color:#FF0000">{{ $errors->first('price') }}</span>
                </div>
                <div class="col-lg-4">
                    {{ Form::label('description', 'Description') }}
                    <textarea class="form-control remove-resize" name="description"></textarea>
                </div>

                <!-- <div class="col-lg-4">
                        {{ Form::label('dt_to', 'To') }}
                        <input type="date" name="dt_to" class="form-control">
                        <input type="time" name="dt_to_time" class="form-control">
                      
                    </div> -->
            </div>


            <div class="row top10">
                <div class="col-lg-4 mb-5">
                    <input type="submit" class="btn btn-background" value="Submit"
                        onclick="this.disabled=true;this.value='Submitted, please wait...';this.form.submit();" />
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
@endsection
