@extends('admin.admin-template.main')
@section('title', 'Users')

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

        .btn1,
        .btn2 {
            border: none;
            background-color: transparent;
        }

    </style>

    <caption>
        <h2 class="pt-3 ps-3" style="font-weight: 900;">Users</h2>
    </caption>
    <p class="dashed"></p>

    <section class="table-holder rounded mx-3 border border-2">
        <h3 class="ps-2 pt-2 border-bottom border-2 pb-2"><b>Users List</b></h3>
        <table class="table table-striped m-0">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">CONTACT</th>
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
                            <button type="button" class="btn1"><a href="/user-details">VIEW</a></button>
                            <button type="button" class="btn2"><a href="">DELETE</a></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Sample Contact</td>
                    <td>
                        <div class="col-md-9 text-right">
                            <button type="button" class="btn1"><a href="product-details.html">VIEW</a></button>
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
                            <button type="button" class="btn1"><a href="product-details.html">VIEW</a></button>
                            <button type="button" class="btn2"><a href="">DELETE</a></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

@endsection
