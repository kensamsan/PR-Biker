@extends('admin.admin-template.main')
@section('title', 'Products')

@section('body')

    <style>
        .table-holder {
            background-color: white;
        }

        .btn1 a {
            color: #0AA500;
        }

        .btn2 a {
            color: #FF0000;
        }

        .btn3 a {
            color: blue;
        }

        .btn1,
        .btn2,
        .btn3 {
            border: none;
            background-color: transparent;
        }

    </style>

    <caption>
        <h2 class="pt-3 ps-3" style="font-weight: 900;">Products</h2>
    </caption>
    <p class="dashed"></p>

    <section class="table-holder rounded mx-3 border border-2">
        <h3 class="ps-2 pt-2 border-bottom border-2 pb-2"><b>Product List</b></h3>
        <table class="table table-striped m-0">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <div class="row">
                    </div>
                    <td>Mark</td>
                    <td>Sample Contact</td>
                    <td>
                        <div class="col-md-9 text-right">
                            <button type="button" class="btn1"><a href="/product-details">VIEW</a></button>
                            <button type="button" class="btn3"><a href="/add-product">ADD</a></button>
                            <button type="button" class="btn2"><a href="">DELETE</a></button>
                        </div>
                    </td>
                    </div>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Sample Contact</td>
                    <td>
                        <div class="col-md-9 text-right">
                            <button type="button" class="btn1"><a href="/product-details">VIEW</a></button>
                            <button type="button" class="btn3"><a href="">ADD</a></button>
                            <button type="button" class="btn2"><a href="">DELETE</a></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry the Bird</td>
                    <td>Sample Contact</td>
                    <td>
                        <div class="col-md-9 text-right">
                            <button type="button" class="btn1"><a href="/product-details">VIEW</a></button>
                            <button type="button" class="btn3"><a href="">ADD</a></button>
                            <button type="button" class="btn2"><a href="">DELETE</a></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

@endsection
