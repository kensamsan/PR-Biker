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



<div class="container-fluid">
<br/>
<br/>
<h3 class="title-style">Upload Deposit Slip <span style="float:right;font-weight:normal;font-size:16px;color:grey;text-decoration:underline">Order id# {{$order->order_id}}</span></h3>
		<hr>
		<div class="row">
			<div class="col">
				{{ Form::open(array('route' => 'order-deposit-submit', 'method' => 'store','files'=>true)) }}
				<div class="row">
					<div class="col-lg-12">
						<input type="hidden" name="order_id" value="{{$order->id}}">
						{!! Form::file('deposit_photo', array('id'=>'deposit_photo','required'=>'required')) !!} 
					<span class="errors" style="color:#FF0000">{{$errors->first('employee_photo')}}</span>		
					</div>
				</div>
				<br/>
				<div class="row top10">
					<div class="col-lg-3">
						<input type="submit" class="btn btn-shop w-100" id="deposit_submit" value="Submit" onclick="this.disabled=true;this.value='Submitted, please wait...';this.form.submit();" disabled="true" />
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
</div>
	
	

</div>
@stop
@section('script')
<script>
$(document).ready(function () {
	$("#deposit_photo").on('change',function(event){
			filename=$(this).val();
		if(filename!==''){
			$("#deposit_submit").attr('disabled',false);
		}
	});
});
</script>
@stop