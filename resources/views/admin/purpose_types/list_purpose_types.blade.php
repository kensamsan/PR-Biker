@extends('layout.app')
@section('title', 'Purpose of Travel List')
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
	    #purposeTypeTable_wrapper
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
				<h2>Purpose of Travel List</h2> <small></small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
			<div class="list-group list-group-custom">
			  	<a href="{{route('settings.manage.profile')}}" class="list-group-item">
			    	<i class="fa fa-fw fa-user-circle"></i>&nbsp;<small>Manage Profile</small>
			  	</a>
			  	@if(Session::get('is_allow_users') > 0)
				  	<a href="{{route('settings.users.index')}}" class="list-group-item">
				    	<i class="fa fa-fw fa-users"></i>&nbsp;<small>Users List</small>
				  	</a>
			  	@endif
			  	@if(Session::get('is_allow_activity_logs') > 0)
				  	<a href="{{route('settings.activity.logs.index')}}" class="list-group-item">
				    	<i class="fa fa-fw fa-clipboard-list"></i>&nbsp;<small>Activity Logs</small>
				  	</a>
			  	@endif
			  	@if(Session::get('is_allow_purpose_types') > 0)
				  	<a href="{{route('settings.purpose.types.index')}}" class="list-group-item active">
				    	<i class="fa fa-fw fa-list-ul"></i>&nbsp;<small>Purpose of Travel List</small>
				  	</a>
			  	@endif
			  	@if(Session::get('is_allow_check_points') > 0)
				  	<a href="{{route('settings.check.points.index')}}" class="list-group-item">
				    	<i class="fa fa-fw fa-map-pin"></i>&nbsp;<small>Checkpoint List</small>
				  	</a>
			  	@endif
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
			<div class="panel panel-default panel-custom">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-md-5 col-lg-4">
							<div class="form-group">
						        <div class="input-group">
						            <input type="text" class="form-control" placeholder="Search for..." name="search" value="{{ Request::get('search') }}">
						            <span class="input-group-btn">
						                <button class="btn btn-default btnSearch" style="color:white; background-color:#222;" type="button"><i class="fa fa-search" style="font-size: 16px;"></i></button>
						            </span>
						        </div>
							</div>
					    </div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
							<a class="btn btn-success addBtn" href="{{route('settings.purpose.types.create')}}">
								<i class="fa fa-plus-circle"></i> Add Travel Type
							</a>
						</div>
					</div>
				</div>
				<div class="panel-body" style="padding:0px;">
					<div class="table-responsive">
						<table class="table table-striped" id="purposeTypeTable">
							<thead>
								<tr>
									<th>Name</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($purpose_types as $purpose_type)
									<tr>
										<td>{{ucwords($purpose_type->name)}}</td>
										<td>
											@if($purpose_type->status === 0 )
												Inactive
											@else
												Active
											@endif
										</td>
										<td>
											<div class="btn-group">
					                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					                                Action <span class="caret"></span>
					                            </button>
					                            <ul class="dropdown-menu dropdown-menu-right">
					                            	<li>
					                                    <a href="{{route('settings.purpose.types.edit',$purpose_type->id)}}" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp; View Details</a>
					                                </li>
					                                <li>
					                                    @if($purpose_type->status === 0 )
															<a href="#" id="{{$purpose_type->id}}" class="btnActivePurposeType" data-name="{{ucwords($purpose_type->name)}}" title="Active" data-toggle="modal" data-target="#confirmationActiveSection"><i class="fa fa-toggle-on" aria-hidden="true"></i>&nbsp; Set Active</a>
														@else
															<a href="#" id="{{$purpose_type->id}}" class="btnInactivePurposeType" data-name="{{ucwords($purpose_type->name)}}" title="Inactive" data-toggle="modal" data-target="#confirmationInactiveSection"><i class="fa fa-toggle-off" aria-hidden="true"></i>&nbsp; Set Inactive</a>
														@endif
				    	                            </li>
					                                <li class="">
					                                    <a href="#" class="btnDeletePurposeType" data-toggle="modal" data-target="#confirmationDeleteSection" data-name="{{ucwords($purpose_type->name)}}" id="{{$purpose_type->id}}">
					                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp; Delete</a>
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
								Are you sure you want to delete <strong class="purposeFullName"></strong>?
							</p>
						</div>
						<div class="modal-footer">
							<a href="#" id="btnDeletePurposeType" class="btn btn-danger">Yes</a>
							<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="confirmationActiveSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Confirmation</h4>
						</div>
						<div class="modal-body">
							<p>
								Are you sure you want to set <strong class="purposeFullName"></strong> as active?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<a href="#" id="btnActivePurposeType" class="btn btn-primary">Yes</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="confirmationInactiveSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Confirmation</h4>
						</div>
						<div class="modal-body">
							<p>
								Are you sure you want to set <strong class="purposeFullName"></strong> as inactive?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<a href="#" id="btnInactivePurposeType" class="btn btn-primary">Yes</a>
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
	$(document).ready(function(){
		@if(Session::has('flash_message'))
			Swal.fire(
			  'Success',
			  '{{Session::get('flash_message')}}',
			  'success'
			)
		@endif
		let purposeTypeTable = $('#purposeTypeTable').DataTable({
            "columnDefs": [
                { "orderable": false , "targets": [2] },
              ],
            "order": [[ 0, "desc" ]],
            "filter": true,
            "paging" : true,
            "lengthChange": false,
            "info" : false,
            "pagingType": "simple_numbers"
        });
        $('#purposeTypeTable_filter').remove();
        $('.btnSearch').on('click',function(){
        	purposeTypeTable.search($('input[name="search"]').val()).draw();
        });
        $(document).on("keypress", "input[name='search']", function(e) {
		    if (e.which == 13) {
		         $('.btnSearch').trigger('click');
		    }
		});
		$('.btnDeletePurposeType').click(function(){
			$('#confirmationDeleteSection .purposeFullName').html($(this).data('name'));
			$('#btnDeletePurposeType').attr('href','/settings/purpose-types/' + $(this).attr('id') + '/delete');
		});
		$('.btnActivePurposeType').click(function(){
			$('#confirmationActiveSection .purposeFullName').html($(this).data('name'));
			$('#btnActivePurposeType').attr('href','/settings/purpose-types/' + $(this).attr('id') + '/activate');
		});
		$('.btnInactivePurposeType').click(function(){
			$('#confirmationInactiveSection .purposeFullName').html($(this).data('name'));
			$('#btnInactivePurposeType').attr('href','/settings/purpose-types/' + $(this).attr('id') + '/deactivate');
		});
		$('#btnDeletePurposeType').click(function(){
			$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
			$(this).attr('disabled',true);
		});
		$('#btnActivePurposeType').click(function(){
			$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
			$(this).attr('disabled',true);
		});
		$('#btnInactivePurposeType').click(function(){
			$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
			$(this).attr('disabled',true);
		});
	});
</script>
@stop