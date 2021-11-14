@extends('layout.app')
@section('title', 'Product List')
@section('app_name', Session::get('software_name'))
@section('css')

    <style>
        body {
            overflow-x: hidden;
        }

        .list-group-custom>a.list-group-item {
            font-size: 1.6em;
        }

        .list-group-custom>a.list-group-item.active,
        .list-group-custom>a.list-group-item.active:focus,
        .list-group-custom>a.list-group-item.active:hover {
            background-color: #0063E0;
            border-color: #707070;
        }

        .custom-box {
            background: #FFFFFF 0% 0% no-repeat padding-box;
            border: 1px solid #C6C6C6;
            border-radius: 3px;
            padding: 10px 15px;
        }

        .text-field {
            font: normal 20px/30px Helvetica Neue;
            font-weight: 500;
            letter-spacing: 0px;
            color: #000000;
        }

        @media(min-width: 1200px) {
            .table-responsive {
                overflow: visible;
            }
        }

        @media(min-width: 768px) {
            .btn-edit {
                float: right;
            }

            div.dataTables_wrapper div.dataTables_paginate {
                margin-right: 20px !important;
            }

            table.dataTable {
                margin-top: -1px !important;
                margin-bottom: 0px !important;
            }
        }

        @media(max-width: 767px) {
            .btn-edit {
                text-align: center;
            }

            .table-responsive {
                margin-bottom: -10px;
            }

            #usersTable_wrapper {
                margin-right: -15px;
            }

            table.dataTable {
                margin-top: -2px !important;
                margin-bottom: 0px !important;
            }
        }

        .input-group .form-control {
            z-index: 0 !important;
        }

        .input-group-btn:last-child>.btn,
        .input-group-btn:last-child>.btn-group {
            z-index: 0 !important;
        }

        .panel-custom>.panel-heading {
            padding: 25px 15px 15px 15px;
        }

        .dataTables_wrapper>.table-scrollable {
            background-color: #EBEDEF;
        }

        div.table-responsive>div.dataTables_wrapper>div[class^="row"]:last-child {
            background-color: white;
        }

        .table>thead {
            background-color: #EBEDEF;
            color: black;
        }

        .table>thead>tr>th,
        .table>tbody>tr>th,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>tbody>tr>td,
        .table>tfoot>tr>td {
            vertical-align: middle;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            margin: 10px 0;
        }

        .pagination>.active>a,
        .pagination>.active>span,
        .pagination>.active>a:hover,
        .pagination>.active>span:hover,
        .pagination>.active>a:focus,
        .pagination>.active>span:focus {
            background-color: #1790da !important;
            border-color: #1790da !important;
        }

        .table-striped>tbody>tr:nth-of-type(even) {
            background-color: #fff;
        }

        .table-responsive {
            background-color: white;
            box-shadow: 0px 3px 6px #00000029;
        }

        .margin-right {
            margin-right: 2rem !important;
        }

    </style>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row" style="margin-top:30px;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="page-header d-flex">
                    <span class="align-items-center d-flex">
                        <a href="{{ route('admin-products.index') }}"><i class="fas fa-chevron-left fa-2x"></i></a>
                        <h2 class="margin-left-sm" style="margin:0px;">Add Product</h2>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default panel-custom">
                    <div class="panel-body">
                        <form method="post" action="{{ route('admin-products.store') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-4 margin-top margin-left">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" name="product_name" class="form-control"
                                        placeholder="Product Name">
                                    <span class="errors"
                                        style="color:#FF0000">{{ $errors->first('product_name') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 margin-top margin-left">
                                    <label for="yearpicker">Year</label>
                                    <br>
                                    <select name="yearpicker" id="yearpicker" class="form-control">
                                        <option>Year</option>
                                        @for ($i = 2000;
        $i <=
        Carbon\Carbon::now()->timezone('Asia/Manila')->format('Y');
        $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 margin-top margin-left">
                                    <label for="city">City</label>
                                    <input type="text" name="city" class="form-control" placeholder="Las Piñas City" disabled>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-lg-4 margin-top margin-left">
                                    <label for="barangay">Barangay</label>
                                    <Select type="text" name="barangay" class="form-control">
										<option>Barangay</option>
									</Select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-lg-4 margin-top margin-left">
                                    <label for="category_id">Categories</label> <br>
                                    <select class="form-control" name="category_id">
                                        @foreach ($categories as $x)
                                            <option value="{{ $x->id }}">{{ $x->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="errors"
                                        style="color:#FF0000">{{ $errors->first('category_id') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 margin-top margin-left">
                                    {{ Form::label('tag_id', 'Tags') }}
                                    @foreach ($tags as $x)
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="tag_id[]"
                                                    value="{{ $x->id }}">{{ $x->tag_name }}</label>
                                        </div>
                                    @endforeach
                                    <span class="errors"
                                        style="color:#FF0000">{{ $errors->first('category_name') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 margin-top margin-left">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                    <span class="errors"
                                        style="color:#FF0000">{{ $errors->first('description') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 margin-top margin-left">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" placeholder="Price" name="price" maxlength="7" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    {{-- <input type="text" class="form-control" placeholder="Price" name="price" data-mask
                                        data-mask-format="9999999.99" required> --}}
                                    <span class="errors"
                                        style="color:#FF0000">{{ $errors->first('price') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 margin-top margin-left">
                                    <label for="visibility">Visibility</label>
                                    <div class="d-flex">
                                        <input id="active" type="radio" name="visibility"
                                            value="active">&nbsp;active&nbsp;&nbsp;
                                        <input type="radio" name="visibility" value="inactive">&nbsp;inactive
                                    </div>
                                    <span class="errors"
                                        style="color:#FF0000">{{ $errors->first('visibility') }}</span>
                                </div>
                            </div>

                            <div class="row top10">
                                <div class="col-lg-4 margin-top margin-left margin-bottom">
                                    <input type="submit" class="btn btn-default btn-primary" value="Submit"
                                        onclick="this.disabled=true;this.value='Submitted, please wait...';this.form.submit();" />
                                </div>
                            </div>

                        </form>
                        @if (Session::has('flash_error'))
                            <div class="alert alert-danger">{{ Session::get('flash_error') }}</div>
                        @endif
                        @if ($errors->has())
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
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
@stop
