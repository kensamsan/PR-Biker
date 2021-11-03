@extends('layout.app')
@section('title', 'Users List')
@section('app_name', Session::get('software_name'))
@section('css')
<style>
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
</style>
@stop
@section('content')
<div class="container-fluid">
	<div class="row" style="margin-top:30px;">
		<div class="col-lg-12">
			<div class="page-header">				
				<h2>Rentals List</h2> <small></small>
			</div>
		</div>
	</div>
	<div class="row">

		<div class="col-lg-12">
			<div class="panel panel-default panel-custom">
				<div class="panel-heading">
					<div class="row">
						<div class="col-lg-4">
							<form method="get" action="{{ route('admin-rentals.index') }}">
								{{csrf_field()}}
								<input type="text" class="form-control" placeholder="Search for..." name="search"
									value="{{ Request::get('search') }}">
								<input type="submit" name="" value="submit" class="btn btn-primary btn-admin-submit">
								</span>
							</form>
						</div>
					</div>
				</div>
				<div class="panel-body" style="padding:0px;">
					<div class="table-responsive">
						<table class="table table-striped" id="usersTable">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Unit</th>
									<th>Price</th>
									<th>Status</th>
									<th>Payment</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($rentals as $p)
								<tr>
									<td>{{$p->id}}</td>
									<td>{{$p->bike_name}}</td>
									<td>{{$p->bike_unit}}</td>
									<td>{{$p->price}}</td>
									<td>{{$p->status}}</td>
									<td>{{$p->payment_status}}</td>
									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-primary btn-sm dropdown-toggle"
												data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Action <span class="caret"></span>
											</button>
											<ul class="dropdown-menu dropdown-menu-right">
												@if($p->status=='waiting-ship')

												<li>
													<a target="_blank"
														href="/uploads/deposit/{{$p->getDepositImage() }}"><span
															class="glyphicon glyphicon-eye-open"
															aria-hidden="true"></span>&nbsp; View Deposit</a>
												</li>

												<li>
													<a target="_blank"
														href="{{route('admin-rentals.approve-payment',$p->id)}}"><span
															class="glyphicon glyphicon-eye-open"
															aria-hidden="true"></span>&nbsp; Approve Payment</a>
												</li>


												@endif

												@if($p->status=='in-transit')

												<li>
													<a href="{{route('admin-rentals.delivered',$p->id)}}"><span
															class="glyphicon glyphicon-eye-open"
															aria-hidden="true"></span>&nbsp; SET Delivered</a>
												</li>

												@endif

												@if($p->status=='waiting-approval')

												<li>
													<a href="{{route('admin-rentals.approve',$p->id)}}"><span
															class="glyphicon glyphicon-eye-open"
															aria-hidden="true"></span>&nbsp; Approve</a>
												</li>

												@endif




												<li>
													<a href="{{route('admin-rentals.cancel',$p->id)}}"><span
															class="glyphicon glyphicon-eye-open"
															aria-hidden="true"></span>&nbsp; Cancel</a>
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
			<div id="confirmationDeleteSection" class="modal fade" role="dialog" data-backdrop="static"
				data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Confirmation</h4>
						</div>
						<div class="modal-body">
							<p>
								Are you sure you want to delete <strong class="userFullName"></strong>?
							</p>
						</div>
						<div class="modal-footer">
							<a href="#" id="btnDeleteUser" class="btn btn-danger">Yes</a>
							<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="confirmationActiveSection" class="modal fade" role="dialog" data-backdrop="static"
				data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Confirmation</h4>
						</div>
						<div class="modal-body">
							<p>
								Are you sure you want to set <strong class="userFullName"></strong> as active?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<a href="#" id="btnActiveUser" class="btn btn-primary">Yes</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="confirmationInactiveSection" class="modal fade" role="dialog" data-backdrop="static"
				data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Confirmation</h4>
						</div>
						<div class="modal-body">
							<p>
								Are you sure you want to set <strong class="userFullName"></strong> as inactive?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<a href="#" id="btnInactiveUser" class="btn btn-primary">Yes</a>
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
	$(window).on('resize', function () {
		if ($(this).width() < 768) {
			if (!$('.addBtn').hasClass('btn-block')) {
				$('.addBtn').addClass('btn-block');
			}
		} else if ($(this).width() > 767 && $(this).width() < 992) {
			if (!$('.addBtn').hasClass('btn-block')) {
				$('.addBtn').addClass('btn-block');
			}
		} else if ($(this).width() > 991 && $(this).width() < 1200) {
			if ($('.addBtn').hasClass('btn-block')) {
				$('.addBtn').removeClass('btn-block');
			}
		} else {
			if ($('.addBtn').hasClass('btn-block')) {
				$('.addBtn').removeClass('btn-block');
			}
		}
	});
	if ($(window).width() < 768) {
		if (!$('.addBtn').hasClass('btn-block')) {
			$('.addBtn').addClass('btn-block');
		}
	} else if ($(window).width() > 767 && $(window).width() < 992) {
		if (!$('.addBtn').hasClass('btn-block')) {
			$('.addBtn').addClass('btn-block');
		}
	} else if ($(window).width() > 991 && $(window).width() < 1200) {
		if ($('.addBtn').hasClass('btn-block')) {
			$('.addBtn').removeClass('btn-block');
		}
	} else {
		if ($('.addBtn').hasClass('btn-block')) {
			$('.addBtn').removeClass('btn-block');
		}
	}
	$(document).ready(function () {
		@if(Session::has('flash_message'))
		Swal.fire(
			'Success',
			'{{Session::get('
			flash_message ')}}',
			'success'
		)
		@endif
		@if(Session::has('flash_error'))
		Swal.fire(
			'Error',
			'{{Session::get('
			flash_error ')}}',
			'error'
		)
		@endif
		let usersTable = $('#usersTable').DataTable({
			"columnDefs": [{
				"orderable": false,
				"targets": [4]
			}, ],
			"order": [
				[0, "desc"]
			],
			"filter": true,
			"paging": true,
			"lengthChange": false,
			"info": false,
			"pagingType": "simple_numbers"
		});
		$('#usersTable_filter').remove();
		$('.btnSearch').on('click', function () {
			usersTable.search($('input[name="search"]').val()).draw();
		});
		$(document).on("keypress", "input[name='search']", function (e) {
			if (e.which == 13) {
				$('.btnSearch').trigger('click');
			}
		});
		$('.btnDeleteUser').click(function () {
			$('#confirmationDeleteSection .userFullName').html($(this).data('name'));
			$('#btnDeleteUser').attr('href', '/settings/users/' + $(this).attr('id') + '/delete');
		});
		$('.btnActiveUser').click(function () {
			$('#confirmationActiveSection .userFullName').html($(this).data('name'));
			$('#btnActiveUser').attr('href', '/admin-products-visibility/' + $(this).attr('id') +
				'/active');
		});
		$('.btnInactiveUser').click(function () {
			$('#confirmationInactiveSection .userFullName').html($(this).data('name'));
			$('#btnInactiveUser').attr('href', '/admin-products-visibility/' + $(this).attr('id') +
				'/inactive');
		});
		$('#btnDeleteUser').click(function () {
			$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
			$(this).attr('disabled', true);
		});
		$('#btnActiveUser').click(function () {
			$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
			$(this).attr('disabled', true);
		});
		$('#btnInactiveUser').click(function () {
			$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
			$(this).attr('disabled', true);
		});
	});
</script>
@stop