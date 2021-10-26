@extends('layout.app')
@section('title', 'Roles List')
@section('app_name', Session::get('software_name'))
@section('css')
<style type="text/css">
	.input-group .form-control {
        z-index: 0 !important;
    }
    .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
        z-index: 0 !important;
    }
    @media(min-width: 1200px)
    {
    	.table-responsive {
            overflow: visible;
        }
    }
    @media (min-width: 768px) {
        /*.table-responsive {
            overflow: visible;
        }*/
         div.dataTables_wrapper div.dataTables_paginate {
	    	margin-right:20px !important;
	    }
	    table.dataTable {
	    	margin-top: -1px !important;
	    	margin-bottom: 0px !important;
	    }
    }
    @media (max-width: 767px)
    {
    	.table-responsive
    	{
    		margin-top: 10px;
    	}
	    #rolesTable_wrapper
	    {
	    	margin-right: -15px;
	    }
	    table.dataTable {
	    	margin-top: -2px !important;
	    	margin-bottom: 0px !important;
	    }
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
				<h2>Roles</h2> <small></small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-5 col-lg-4">
            {{-- {{ Form::open(array('route' => ['roles.index'], 'method' => 'GET')) }} --}}
	            <div class="form-group">
	                <div class="input-group">
	                	<span class="input-group-btn input-group-clear" style="display:none;">
		               		<button type="button" class="btn btn-danger btnClear" style="color:white"><i class="fa fa-times" style="font-size:16px;"></i></button>
		               	</span>
	                   	{{-- @if(!empty(Request::get('search')))
		                    <span class="input-group-btn">
		                        <a class="btn btn-danger" style="color:white;" href="{{route('roles.index')}}"><i class="fa fa-times" style="font-size: 16px;"></i></a>
		                    </span>
		                @endif --}}
	                    <input type="text" class="form-control" placeholder="Search for..." name="search" value="{{ Request::get('search') }}">
	                        <span class="input-group-btn">
	                            <button class="btn btn-default btnSearch" style="color:white; background-color:#222;" type="button"><i class="fa fa-search" style="font-size: 16px;"></i></button>
	                        </span>
	                </div>
	            </div>
	        {{-- {!! Form::close() !!} --}}
	    </div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
			<a class="btn btn-success addBtn" href="{{route('roles.create')}}">
				<i class="fa fa-plus-circle"></i> Add Role
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="table-responsive">
						<table class="table table-striped" id="rolesTable">
							<thead>
							  	<tr>
									<th >Role Name</th>
									<th >Actions</th>
							  	</tr>
							</thead>
							<tbody>
							  	@foreach($roles as $role)
									<tr>
								  		<td>{{ $role->name }}</td>
								  		<td>
								  			<div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   	 Actions <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li>
                                                        <a href="{{ route('roles.edit.privilege',$role->id) }}" class=""><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>&nbsp; Privileges</a>
                                                    </li>
                                                    <li>
                                                    	<a href="{{ route('roles.edit',$role->id) }}" class=""><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit</a>
                                                    </li>
                                                    <li role="separator" class="divider"></li>
                                                    <li>
                                                    	<a href="#" class="btnDeleteRole" data-toggle="modal" data-target="#confirmationDeleteSection" data-name="{{$role->name}}" id="{{ $role->id }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp; Delete</a>
                                                    </li>
                                                </ul>
                                            </div> 
								  		</td>
									</tr>
							  	@endforeach
							</tbody>
						</table>
					</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="confirmationDeleteSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Confirmation</h4>
						</div>
						<div class="modal-body">
							<p>
								Are you sure you want to delete <strong class="roleFullName"></strong> role?
							</p>
						</div>
						<div class="modal-footer">
							<a href="#" id="btnDeleteRole" class="btn btn-danger">Yes</a>
							<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
<script>
	$(window).on('resize', function(){
        if($(this).width() < 768)
        {
            if(!$('.addBtn').hasClass('btn-block'))   
            {
                $('.addBtn').addClass('btn-block');
            }
        }
        else if($(this).width() > 767 && $(this).width() < 992)
        {
           	if(!$('.addBtn').hasClass('btn-block'))   
	        {
	            $('.addBtn').addClass('btn-block');
	        }
        }
        else if($(this).width() > 991 && $(this).width() < 1200)
        {
            if($('.addBtn').hasClass('btn-block'))
            {
                $('.addBtn').removeClass('btn-block');
            }
        }
        else
        {
            if($('.addBtn').hasClass('btn-block'))
            {
                $('.addBtn').removeClass('btn-block');
            }
        }
    });
    if($(window).width() < 768)
    {
        if(!$('.addBtn').hasClass('btn-block'))   
        {
            $('.addBtn').addClass('btn-block');
        }
    }
    else if($(window).width() > 767 && $(window).width() < 992)
    {
        if(!$('.addBtn').hasClass('btn-block'))   
        {
            $('.addBtn').addClass('btn-block');
        }
    }
    else if($(window).width() > 991 && $(window).width() < 1200)
    {
        if($('.addBtn').hasClass('btn-block'))
        {
            $('.addBtn').removeClass('btn-block');
        }
    }
    else
    {
        if($('.addBtn').hasClass('btn-block'))
        {
            $('.addBtn').removeClass('btn-block');
        }
    }
    $(document).ready(function()
    {
    	@if(Session::has('flash_message'))
			Swal.fire(
			  'Success',
			  '{{Session::get('flash_message')}}',
			  'success'
			)
		@endif
            // $('#activityLogsTable').DataTable({});
        let rolesTable = $('#rolesTable').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": 1 }
              ],
            "order": [[ 0, "desc" ]],
            "filter": true,
            "paging" : true,
            "lengthChange": false,
            "info" : false,
            "pagingType": "simple_numbers"
        });
        $('#rolesTable_filter').remove();
        $('.btnSearch').on('click',function(){
        	rolesTable.search($('input[name="search"]').val()).draw();
        	if($('input[name="search"]').val())
        	{
        		$('.input-group-clear').show();
        	}
        	else
        	{
        		$('.input-group-clear').hide();
        	}
        });
        $('.btnClear').on('click',function(){
        	$('input[name="search"]').val('');
        	rolesTable.search($('input[name="search"]').val()).draw();
        	$('.input-group-clear').hide();
        });
        $(document).on("keypress", "input[name='search']", function(e) {
		     if (e.which == 13) {
		         $('.btnSearch').trigger('click');
		     }
		});
    });
	$('.btnDeleteRole').click(function(){
		$('.roleFullName').html($(this).data('name'));
		$('#btnDeleteRole').attr('href','/roles/' + $(this).attr('id') + '/delete');
	});
	$('#btnDeleteRole').click(function(){
		$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
		$(this).attr('disabled',true);
	});
</script>
@stop