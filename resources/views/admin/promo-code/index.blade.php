@extends('layout.app')
@section('title', 'Users List')
@section('app_name', Session::get('software_name'))
@section('css')
<style>
	.list-group-custom > a.list-group-item
	{
		font-size: 1.6em;
	}
	.list-group-custom > a.list-group-item.active, .list-group-custom > a.list-group-item.active:focus, .list-group-custom > a.list-group-item.active:hover {
		background-color: #0063E0;
    	border-color: #707070;
	}
	.custom-box
	{
		background: #FFFFFF 0% 0% no-repeat padding-box;
		border: 1px solid #C6C6C6;
		border-radius: 3px;
		padding: 10px 15px;
	}
	.text-field
	{
		font: normal 20px/30px Helvetica Neue;
		font-weight: 500;
		letter-spacing: 0px;
		color: #000000;
	}
	@media(min-width: 1200px)
    {
    	.table-responsive {
            overflow: visible;
        }
    }
	@media(min-width: 768px)
	{
		.btn-edit
		{
			float: right;
		}
		 div.dataTables_wrapper div.dataTables_paginate {
	    	margin-right:20px !important;
	    }
	    table.dataTable {
	    	margin-top: -1px !important;
	    	margin-bottom: 0px !important;
	    }
	}
	@media(max-width: 767px)
	{
		.btn-edit
		{
			text-align: center;
		}
		.table-responsive
    	{
    		margin-bottom: -10px;
    	}
	    #usersTable_wrapper
	    {
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
    .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
        z-index: 0 !important;
    }
	.panel-custom > .panel-heading
	{
		padding: 25px 15px 15px 15px;
	}
	.dataTables_wrapper > .table-scrollable{
    	background-color: #EBEDEF;
    }
    div.table-responsive>div.dataTables_wrapper>div[class^="row"]:last-child {
    	background-color: white;
    }
    .table>thead
    {
    	background-color: #EBEDEF;
    	color: black;
    }
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    	vertical-align: middle;
    }
    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    	margin: 10px 0;
    }
	.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus
	{
		background-color: #1790da !important;
    	border-color: #1790da !important;
	}
	.table-striped > tbody > tr:nth-of-type(even) {
	    background-color: #fff;
	}
	.table-responsive
	{
		background-color:white;
		box-shadow: 0px 3px 6px #00000029;
	}
</style>
@stop
@section('content')
<div id="confirmationGrade" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Confirmation</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<p>
					Delete this Promo Code?
				</p>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
				<a href="#" id="btnDeletePromoCode" class="btn btn-danger">Delete</a>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				<small>Promo Code</small>
			</h1>
			@if(Session::has('flash_message'))
				<div class="alert alert-success">{{Session::get('flash_message')}}</div>
			@endif

			@if(Session::has('flash_error'))
				<div class="alert alert-danger">{{Session::get('flash_error')}}</div>
			@endif
			<ol class="breadcrumb">
				<li class="active">
					<i class="fa fa-search"></i> Promo Code Search
				</li>
			</ol>
		</div>
	</div>
	<div class="row">
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default panel-custom">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-md-3 col-lg-3">
							{{ Form::open(array('route' => 'admin.promo-codes.index', 'method' => 'get')) }} 
		
								<div class="col-md-12">
								
									<div class="input-group" >
										{{ Form::text('search','',array('class'=>'form-control span6','placeholder' => 'Search', 'style'=>'height:35px')) }}
									

										<span class="input-group-btn">
											{{ Form::button('Search <i class="fa fa-search"></i>', array('class'=>'btn btn-primary btn-search-member' ,'type' => 'submit', 'style' => 'height: 35px')) }}
										</span>
									</div>
							    </div>	    
							
								{{ Form::close() }}
					    </div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
							<a class="btn btn-success addBtn" href="{{route('admin.promo-codes.create')}}">
								<i class="fa fa-plus-circle"></i> Add Promo Code
							</a>
						</div>
					</div>
				</div>
				<div class="panel-body" style="padding:0px;">
					<div class="table-responsive">
						<table class="table table-striped" id="usersTable">
							<thead>
								<tr style="border: 1px solid black;">
									<th>Code</th>
									<th>Description</th>
									<th>Type</th>
									<th>Value</th>
									<th>Order</th>
									<th>From</th>
									<th>To</th>
									<th>status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							@foreach ($promo_codes as $x)
								<tr style="border: 1px solid black;">
									<td>{{ $x->code }} @if($x->banner==1) <span class="label label-default">banner</span> @endif</td>
									<td>{{ $x->description }}</td>
									<td>{{ $x->type }}</td>
									<td>{{ $x->value }}</td>
									<td>{{ $x->order }}</td>
									<td>{{ $x->date_from }}</td>
									<td>{{ $x->date_to }}</td>
									<td>
										@if($x->active==0)
											<span class="label label-danger">Inactive</span>
										@else
											<span class="label label-success">Active</span>	
										@endif
									</td>
									
									<td>
										<div class="btn-group" role="group" aria-label="...">
											@if($x->active==0)
												<a  class="btn btn-danger " href="{{ route('admin.promo-codes.active',$x->id) }}"><i class="fas fa-pencil-alt"></i> Toggle</a>
											@else
												<a  class="btn btn-success " href="{{ route('admin.promo-codes.inactive',$x->id) }}"><i class="fas fa-pencil-alt"></i> Toggle</a>
											@endif
							<!-- 				<a  class="btn btn-warning " href="{{ route('set-banner',$x->id) }}"><i class="fas fa-pencil-alt"></i> Set Banner</a>	 -->
											<a  class="btn btn-default " href="{{ route('admin.promo-codes.edit',$x->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>	
											<a  class="btn btn-danger btnDeletePromoCode" href="#" id="{{$x->id}}" data-toggle="modal" data-target="#confirmationGrade"><i class="fas fa-times-circle"></i> Delete</a>					
										</div>
									</td>
								</tr>
								@endforeach 
								
							</tbody>
						</table>
						<div style="text-align: center">
							{{ $promo_codes->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
@stop
@section('script')
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
	
</script>
@stop