@extends('layout.app')
@section('title', 'Product List')
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
	<div class="row" style="margin-top:30px;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">				
				<h2>Tag Create</h2> <small></small>
			</div>
		</div>
	</div>
	<div class="row">
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default panel-custom">
				<div class="panel-heading">
					
				</div>
				<div class="panel-body" style="padding:0px;">
					{{ Form::open(array('route' => ['admin.tag.update',$t->id], 'method' => 'put','files'=>true)) }}
						<div class="row">
							<div class="col-lg-12">
								{{ Form::label('tag_name', 'Tag Name') }}
									{{ Form::text('tag_name',$t->tag_name,array('class'=>'form-control span6','placeholder' => 'Tag Name')) }}
								<span class="errors" style="color:#FF0000">{{$errors->first('tag_name')}}</span>
							</div>
						</div>
						

					<!-- 	<div class="row">
							<div class="col-lg-12">
								{{ Form::label('slider', 'Tag Photo') }}
								<div  class="img_caption" style=" height: 500px; width: 100%; overflow: hidden; position: relative; outline: 5px solid #f1f2f6;">
									<img src="{{URL::asset('/uploads/default.png' ) }}" id="slider_image" class="img-responsive" alt=""  style="  height: auto; width: 100%;">
									<label for="slider_id" class="caption"><i class="fa fa-camera hidden"></i><i class="fa fa-camera"></i> Add Photo</label>
									
								</div>
								{!! Form::file('photo', array('id'=>'slider_id', 'class'=>'hidden')) !!} 
							<span class="errors" style="color:#FF0000">{{$errors->first('employee_photo')}}</span>					 
							</div>
						</div>
 -->

						<div class="row top10">
							<div class="col-lg-4">
								<input type="submit" class="btn btn-success btn-lg" value="Submit" onclick="this.disabled=true;this.value='Submitted, please wait...';this.form.submit();" />
							</div>
						</div>
						{!! Form::close() !!}
					  @if(Session::has('flash_error'))
                            <div class="alert alert-danger">{{Session::get('flash_error')}}</div>
                        @endif
                        @if($errors->has())
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
    $(function() {
        $('#discount_type').change(function(){
            $('.dc_type').hide();
            $('#' + $(this).val()).show();
        });
    });

	// $(document).ready(function() {
	//   $('#description').summernote({
	//   height: 200,

	// 	});

	// });
	
</script>
@stop