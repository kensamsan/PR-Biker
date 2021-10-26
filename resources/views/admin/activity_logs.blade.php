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
	@media(min-width: 992px)
	{
		.bottom-pagination
		{
			float:right;
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
	    #activityLogsTable_wrapper
	    {
	    	margin-right: -15px;
	    }
	    table.dataTable {
	    	margin-top: -2px !important;
	    	margin-bottom: 0px !important;
	    }
	    .col-pagination
	    {
	    	text-align: center;
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
	.table thead > tr> th > a.sort-desc:after
	{
		content: "\e155";
		position: absolute;
	    bottom: 8px;
	    right: 8px;
	    display: block;
	    font-family: 'Glyphicons Halflings';
	    opacity: 0.5;
	}
	.table thead > tr> th > a.sort-asc:after
	{
		content: "\e156";
		position: absolute;
	    bottom: 8px;
	    right: 8px;
	    display: block;
	    font-family: 'Glyphicons Halflings';
	    opacity: 0.5;
	}
	.table thead > tr> th > a.sort:after
	{
		opacity: 0.2;
    	content: "\e150";
		position: absolute;
	    bottom: 8px;
	    right: 8px;
	    display: block;
	    font-family: 'Glyphicons Halflings';
	    opacity: 0.5;
	}
	.table thead > tr> th> a
	{
		color:black;
		font-weight: bold;
		text-decoration: none;
	}
	.table thead > tr> th> a:hover
	{
	 	color:gray;
	}
	.table-hover > tbody > tr:hover
	{
		background-color:#EBEDEF;
	}
	.table thead > tr> th
	{
		position: relative;
		padding-right: 30px;
	}
	.table thead > tr> th > a
	{
		width: 25px;
	}
	.table
	{
		margin-bottom: 0px;
	}
</style>
@stop
@section('content')
<div class="container-fluid">
	<div class="row" style="margin-top:30px;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">				
				<h2>Activity Logs</h2> <small></small>
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
				  	<a href="{{route('settings.activity.logs.index')}}" class="list-group-item active">
				    	<i class="fa fa-fw fa-clipboard-list"></i>&nbsp;<small>Activity Logs</small>
				  	</a>
			  	@endif
			  	@if(Session::get('is_allow_purpose_types') > 0)
				  	<a href="{{route('settings.purpose.types.index')}}" class="list-group-item">
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
					{{ Form::open(array('route' => ['settings.activity.logs.index'], 'method' => 'GET','id'=>'filterCategoryForm')) }}
						<input type="hidden" name="sort_by" value="{{ Request::get('sort_by') }}">
		        		<div class="row">
				            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				                <div class="form-group">
				                	<div class="input-group">
				                        {{ Form::text('search',Request::get('search'), ['id'=>'search','class' => 'form-control']) }}
				                        <span class="input-group-btn">
							                <button class="btn btn-default btnSearch" style="color:white; background-color:#222;" type="submit"><i class="fa fa-search" style="font-size: 16px;"></i></button>
							            </span>
						        	</div>
				                </div>
				            </div>
				        </div>
			    	{!! Form::close() !!}
				</div>
				<div class="panel-body" style="padding:0px;">
					<div class="table-responsive">
						<table class="table table-striped" id="activityLogsTable">
							<thead>
								<tr>
									<th>
										@if(Request::get('sort_by')=='username.asc')
											<a class="sort-desc" href="{{ URL::route('settings.activity.logs.index',['sort_by'=>'username.desc','search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" )]) }}">
												Username&nbsp;
											</a>
										@elseif(Request::get('sort_by')=='username.desc')
											<a class="sort-asc" href="{{ URL::route('settings.activity.logs.index',['sort_by'=>'username.asc','search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" )]) }}">
												Username&nbsp;
											</a>
										@else
											<a class="sort" href="{{ URL::route('settings.activity.logs.index',['sort_by'=>'username.desc','search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" )]) }}">
												Username&nbsp;
											</a>
										@endif
									</th>
									<th >
										@if(Request::get('sort_by')=='entry.asc')
											<a class="sort-desc" href="{{ URL::route('settings.activity.logs.index',['sort_by'=>'entry.desc','search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" )]) }}">
												Entry&nbsp;
											</a>
										@elseif(Request::get('sort_by')=='entry.desc')
											<a class="sort-asc" href="{{ URL::route('settings.activity.logs.index',['sort_by'=>'entry.asc','search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" )]) }}">
												Entry&nbsp;
											</a>
										@else
											<a class="sort" href="{{ URL::route('settings.activity.logs.index',['sort_by'=>'entry.desc','search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" )]) }}">
												Entry&nbsp;
											</a>
										@endif
									</th>
									{{-- <th >Comment</th> --}}
									<th>
										@if(Request::get('sort_by')=='family.asc')
											<a class="sort-desc" href="{{ URL::route('settings.activity.logs.index',['sort_by'=>'family.desc','search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" )]) }}">
												Categories&nbsp;
											</a>
										@elseif(Request::get('sort_by')=='family.desc')
											<a class="sort-asc" href="{{ URL::route('settings.activity.logs.index',['sort_by'=>'family.asc','search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" )]) }}">
												Categories&nbsp;
											</a>
										@else
											<a class="sort" href="{{ URL::route('settings.activity.logs.index',['sort_by'=>'family.desc','search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" )]) }}">
												Categories&nbsp;
											</a>
										@endif
									</th>
									<th >
										@if(Request::get('sort_by')=='created_at.asc')
											<a class="sort-desc" href="{{ URL::route('settings.activity.logs.index',['sort_by'=>'created_at.desc','search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" )]) }}">
												Created At&nbsp;
											</a>
										@elseif(Request::get('sort_by')=='created_at.desc')
											<a class="sort-asc" href="{{ URL::route('settings.activity.logs.index',['sort_by'=>'created_at.asc','search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" )]) }}">
												Created At&nbsp;
											</a>
										@else
											<a class="sort" href="{{ URL::route('settings.activity.logs.index',['sort_by'=>'created_at.desc','search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" )]) }}">
												Created At&nbsp;
											</a>
										@endif
									</th>
								</tr>
							</thead>
							<tbody>
								 @foreach($activity_logs as $activity_log)
									<tr>
								  		<td>{{ $activity_log->username }}</td>
								  		<td>{{ $activity_log->entry }}</td>
								  		{{-- <td>{{ !empty($activity_log->comment) ? $activity_log->comment : 'none' }}</td> --}}
								  		<td>{{ $activity_log->family }}</td>
								  		<td>{{ $activity_log->created_at }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-pagination">
							@if ($activity_logs->hasPages())
		                        <ul class="pagination bottom-pagination">
		                            {{-- Previous Page Link --}}
		                            @if($activity_logs->currentPage() === 1)
		                                <li class="disabled"><span>Previous</span></li>
		                            @else
		                                <li><a href="{{ $activity_logs->appends(['search' => Request::get('search'),'sort_by' =>  (isset($_GET["sort_by"]) ? $_GET["sort_by"]:"")])->previousPageUrl() }}" rel="prev">Previous</a></li>
		                            @endif

		                            @if($activity_logs->currentPage() > 3)
		                                <li class="hidden-xs"><a href="{{ $activity_logs->appends(['search' => Request::get('search'),'sort_by' =>  (isset($_GET["sort_by"]) ? $_GET["sort_by"]:"")])->url(1) }}">1</a></li>
		                            @endif
		                            @if($activity_logs->currentPage() > 4)
		                                <li class="disabled"><span>...</span></li>
		                            @endif
		                            @foreach(range(1, $activity_logs->lastPage()) as $i)
		                                @if($i >= $activity_logs->currentPage() - 1 && $i <= $activity_logs->currentPage() + 1)
		                                    @if ($i == $activity_logs->currentPage())
		                                        <li class="active"><span>{{ $i }}</span></li>
		                                    @else
		                                        <li><a href="{{ $activity_logs->appends(['search' => Request::get('search'),'sort_by' =>  (isset($_GET["sort_by"]) ? $_GET["sort_by"]:"")])->url($i) }}">{{ $i }}</a></li>
		                                    @endif
		                                @endif
		                            @endforeach
		                            @if($activity_logs->currentPage() < $activity_logs->lastPage() - 3)
		                                <li class="disabled"><span>...</span></li>
		                            @endif
		                            @if($activity_logs->currentPage() < $activity_logs->lastPage() - 2)
		                                <li class="hidden-xs"><a href="{{ $activity_logs->appends(['search' => Request::get('search'),'sort_by' =>  (isset($_GET["sort_by"]) ? $_GET["sort_by"]:"")])->url($activity_logs->lastPage()) }}">{{ $activity_logs->lastPage() }}</a></li>
		                            @endif

		                            {{-- Next Page Link --}}
		                            @if ($activity_logs->hasMorePages())
		                                <li><a href="{{ $activity_logs->appends(['search' => Request::get('search'),'sort_by' =>  (isset($_GET["sort_by"]) ? $_GET["sort_by"]:"")])->nextPageUrl() }}" rel="next">Next</a></li>
		                            @else
		                                <li class="disabled"><span>Next</span></li>
		                            @endif
		                        </ul>
		                    @endif
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
	$(document).ready(function(){
		@if(Session::has('flash_message'))
			Swal.fire(
			  'Success',
			  '{{Session::get('flash_message')}}',
			  'success'
			)
		@endif
		// let activityLogsTable = $('#activityLogsTable').DataTable({
  //           // "columnDefs": [
  //           //     { "orderable": false , "targets": [4] },
  //           //   ],
  //           "order": [[ 3, "desc" ]],
  //           "filter": true,
  //           "paging" : true,
  //           "lengthChange": false,
  //           "info" : false,
  //           "pagingType": "simple_numbers"
  //       });
  //       $('#activityLogsTable_filter').remove();
  //       $('.btnSearch').on('click',function(){
  //       	activityLogsTable.search($('input[name="search"]').val()).draw();
  //       });
        $(document).on("keypress", "input[name='search']", function(e) {
		    if (e.which == 13) {
		         $('.btnSearch').trigger('click');
		    }
		});
	});
</script>
@stop