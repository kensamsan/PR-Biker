@extends('layout.app')
@section('title', 'Travel Pass List')
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
	    .sort-icon
		{
			position: relative;
			top:0;
			right:0;
			float:right;
		}
    }
    @media (max-width: 767px)
    {
    	.table-responsive
    	{
    		margin-top: 10px;
    	}
	    #travelPassesTable_wrapper
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
	.btnView,.btnView:active,.btnView:focus
	{
		color: #333;
	    background-color: #fff;
	    border-color: #ccc;
	}
	.btnDelete,.btnDelete:active,.btnDelete:focus
	{
		color: #333;
	    background-color: #fff;
	    border-color: #ccc;
	}
	select#cases + .btn-group > .multiselect-container > li > a > label input[type="checkbox"]
	{
		visibility: hidden;
	}
	select#cases + .btn-group > .multiselect-container > li > a > label.active:before
	{
		font-family: "FontAwesome";
	   	content: "\f00c";
	   	/*display: inline-block;*/
	   	/*padding-right: 3px;*/
	   	/*vertical-align: middle;*/
	   	/*font-weight: 900;*/
	   	/*margin-top: -2px;*/
	   	margin-left: -10px;
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
</style>
<link href="{{ URL::asset('css/bootstrap-multiselect.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
<div class="container-fluid">
	<div class="row" style="margin-top:30px;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">				
				<h2>Travel Pass List</h2> <small></small>
			</div>
		</div>
	</div>
	@if(count($errors->all()) > 0)
	    <div class="row">
	        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	            <div class="alert alert-danger">
	                @foreach ($errors->all() as $message)
	                    {{$message}}<br>
	                @endforeach
	            </div>  
	       	</div>
	    </div>
	@endif
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
			{{ Form::open(array('route' => ['travel-passes.index'],'method' => 'GET','class'=>'travelPassForm')) }}
				<div class="col-xs-12 col-sm-8 col-md-4 col-lg-3">
						<input type="hidden" name="sort_by" value="{{ Request::get('sort_by') }}">
						<input type="hidden" name="status[]" value="{{ Request::get('status[]') }}">
				        <div class="form-group">
				            <div class="input-group">
					            <input type="text" class="form-control" placeholder="Search for..." name="search" value="{{ Request::get('search') }}">
					            <span class="input-group-btn">
					                    <button class="btn btn-default btnSearch" style="color:white; background-color:#222;" type="submit"><i class="fa fa-search" style="font-size: 16px;"></i></button>
					            </span>
				            </div>
				        </div>
			        
			    </div>
			    <div class="col-xs-12 col-sm-4 col-md-6 col-lg-9">
			   	 	<div class="form-group pull-right">
						<select id="status" name="status[]" multiple="multiple">
							@if(Session::get('is_allow_processing') > 0)
								<option value="processing" {{ in_array('processing',$temp_arr) ? 'selected' :'' }}>Processing</option>
							@endif
							@if(Session::get('is_allow_verification') > 0)
								<option value="verification" {{ in_array('verification',$temp_arr) ? 'selected' :'' }}>Verification</option>
							@endif
							@if(Session::get('is_allow_processing') > 0)
								<option value="approved" {{ in_array('approved',$temp_arr) ? 'selected' :'' }}>Approved</option>
							@endif
							@if(Session::get('is_allow_medical_assessment') > 0)
								<option value="medical_assessment" {{ in_array('medical_assessment',$temp_arr) ? 'selected' :'' }}>Medical Assessment</option>
							@endif
							@if(Session::get('is_allow_payment') > 0)
								<option value="waiting_for_payment" {{ in_array('waiting_for_payment',$temp_arr) ? 'selected' :'' }}>Waiting for Payment</option>
							@endif
							@if(Session::get('is_allow_medical_certificate') > 0)
								<option value="payment_paid" {{ in_array('payment_paid',$temp_arr) ? 'selected' :'' }}>Payment Paid</option>
							@endif
							@if(Session::get('is_allow_released') > 0)
								<option value="medical_certificate" {{ in_array('medical_certificate',$temp_arr) ? 'selected' :'' }}>Medical Certificate</option>
							@endif
							@if(Session::get('is_allow_processing') > 0)
								<option value="released" {{ in_array('released',$temp_arr) ? 'selected' :'' }}>Released</option>
							@endif
							@if(Session::get('is_allow_processing') > 0)
								<option value="cancelled" {{ in_array('cancelled',$temp_arr) ? 'selected' :'' }}>Cancelled</option>
								<option value="rejected" {{ in_array('rejected',$temp_arr) ? 'selected' :'' }}>Rejected</option>
							@endif
						</select>
					</div>
			    </div>
			{{ Form::close() }}
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-hover" id="travelPassesTable">
					<thead>
						<tr>
							@if(Request::get('sort_by')!='tracking_no.asc')
								<th>
									<a class="sort-asc" href="{{ URL::route('travel-passes.index',['sort_by'=>'tracking_no.asc',
									'search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" ),
									'status' =>  (isset($_GET["status"]) ? $_GET["status"]:"" ),
									]) }}">Tracking Number&nbsp;
									</a>
								</th>
							@else
								<th>
									<a class="sort-desc" href="{{ URL::route('travel-passes.index',['sort_by'=>'tracking_no.desc',
									'search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" ),
									'status' =>  (isset($_GET["status"]) ? $_GET["status"]:"" )]) }}">Tracking Number&nbsp;
									</a>
								</th>
							@endif
							@if(Request::get('sort_by')!='first_name.asc')
								<th><a class="sort-asc" href="{{ URL::route('travel-passes.index',['sort_by'=>'first_name.asc',
									'search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" ),
									'status' =>  (isset($_GET["status"]) ? $_GET["status"]:"" )]) }}">Name</a></th>
							@else
								<th><a class="sort-desc" href="{{ URL::route('travel-passes.index',['sort_by'=>'first_name.desc',
									'search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" ),
									'status' =>  (isset($_GET["status"]) ? $_GET["status"]:"" )]) }}">Name</a></th>
							@endif
							@if(Request::get('sort_by')!='contact_no.asc')
								<th><a class="sort-asc" href="{{ URL::route('travel-passes.index',['sort_by'=>'contact_no.asc',
									'search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" ),
									'status' =>  (isset($_GET["status"]) ? $_GET["status"]:"" )]) }}">Contact Number</a></th>
							@else
								<th><a class="sort-desc" href="{{ URL::route('travel-passes.index',['sort_by'=>'contact_no.desc',
									'search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" ),
									'status' =>  (isset($_GET["status"]) ? $_GET["status"]:"" )]) }}">Contact Number</a></th>
							@endif
							@if(Request::get('sort_by')!='barangay.asc')
								<th><a class="sort-asc" href="{{ URL::route('travel-passes.index',['sort_by'=>'barangay.asc',
									'search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" ),
									'status' =>  (isset($_GET["status"]) ? $_GET["status"]:"" )]) }}">Barangay</a></th>
							@else
								<th><a class="sort-desc" href="{{ URL::route('travel-passes.index',['sort_by'=>'barangay.desc',
									'search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" ),
									'status' =>  (isset($_GET["status"]) ? $_GET["status"]:"" )]) }}">Barangay</a></th>
							@endif
							@if(Request::get('sort_by')!='departure_date.asc')
								<th><a class="sort-asc" href="{{ URL::route('travel-passes.index',['sort_by'=>'departure_date.asc',
									'search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" ),
									'status' =>  (isset($_GET["status"]) ? $_GET["status"]:"" )]) }}">Date of Travel</a></th>
							@else
								<th><a class="sort-desc" href="{{ URL::route('travel-passes.index',['sort_by'=>'departure_date.desc',
									'search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" ),
									'status' =>  (isset($_GET["status"]) ? $_GET["status"]:"" )]) }}">Date of Travel</a></th>
							@endif							
							@if(Request::get('sort_by')!='place_of_destination.asc')
								<th><a class="sort-asc" href="{{ URL::route('travel-passes.index',['sort_by'=>'place_of_destination.asc',
									'search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" ),
									'status' =>  (isset($_GET["status"]) ? $_GET["status"]:"" )]) }}">Destination</a></th>
							@else
								<th><a class="sort-desc" href="{{ URL::route('travel-passes.index',['sort_by'=>'place_of_destination.desc',
									'search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" ),
									'status' =>  (isset($_GET["status"]) ? $_GET["status"]:"" )]) }}">Destination</a></th>
							@endif
							@if(Request::get('sort_by')!='status.asc')
								<th><a class="sort-asc" href="{{ URL::route('travel-passes.index',['sort_by'=>'status.asc',
									'search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" ),
									'status' =>  (isset($_GET["status"]) ? $_GET["status"]:"" )]) }}">Status</a></th>
							@else
								<th><a class="sort-desc" href="{{ URL::route('travel-passes.index',['sort_by'=>'status.desc',
									'search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" ),
									'status' =>  (isset($_GET["status"]) ? $_GET["status"]:"" )]) }}">Status</a></th>
							@endif
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@forelse($travel_passes as $key=>$travel_pass)
							<tr>
								<td>{{$travel_pass->tracking_no}}</td>
								<td>
									{{-- {{ucwords($travel_pass->full_name)}} --}}
									{{ucwords($travel_pass->first_name)}} {{!empty($travel_pass->middle_name) ? substr($travel_pass->middle_name,0,1).'.' : ''}} {{ucwords($travel_pass->last_name)}} 
								</td>
								<td>{{!empty($travel_pass->contact_no) ? $travel_pass->contact_no : 'None' }}</td>
								<td>{{$travel_pass->barangay}}</td>
								<td>{{\Carbon\Carbon::parse($travel_pass->departure_date)->format('M d, Y')}}</td>
								<td>
									@if(strlen($travel_pass->place_of_destination) > 20)
										{{ substr($travel_pass->place_of_destination, 0,20).'...' }}

									@else
										{{$travel_pass->place_of_destination}}
									@endif
								</td>
								<td>
									@if(!empty($travel_pass))
										@if(strcasecmp($travel_pass->type,'incoming_visitor') != 0 && strcasecmp($travel_pass->type,'ofw') != 0)
                                            @if(strcasecmp($travel_pass->status,'processing') == 0)
                                                <span class="dot blue-dot"></span>&nbsp;Processing
                                            @elseif(strcasecmp($travel_pass->status,'approved') == 0)
                                                <span class="dot yellow-dot"></span>&nbsp;Approved
                                            @elseif(strcasecmp($travel_pass->status,'verification') == 0)
                                                <span class="dot blue-dot"></span>&nbsp;For Verification
                                            @elseif(strcasecmp($travel_pass->status,'medical_assessment') == 0)
                                                <span class="dot yellow-dot"></span>&nbsp;Medical Assessment
                                            @elseif(strcasecmp($travel_pass->status,'waiting_for_payment') == 0)
                                                <span class="dot"></span>&nbsp;Waiting for Payment
                                            @elseif(strcasecmp($travel_pass->status,'payment_paid') == 0)
                                                <span class="dot black-dot"></span>&nbsp;Payment Paid
                                            @elseif(strcasecmp($travel_pass->status,'medical_certificate') == 0)
                                                <span class="dot orange-dot"></span>&nbsp;Medical Certificate
                                            @elseif(strcasecmp($travel_pass->status,'released') == 0)
                                                <span class="dot green-dot"></span>&nbsp;Released
                                            @else
                                                <span class="dot red-dot"></span>&nbsp;{{ucwords($travel_pass->status)}}
                                            @endif
                                        @else
                                            @if(strcasecmp($travel_pass->status,'processing') == 0)
                                                <span class="dot blue-dot"></span>&nbsp;Processing
                                            @elseif(strcasecmp($travel_pass->status,'verification') == 0)
                                                <span class="dot blue-dot"></span>&nbsp;For Verification
                                            @elseif(strcasecmp($travel_pass->status,'approved') == 0)
                                                <span class="dot yellow-dot"></span>&nbsp;Approved
                                            @elseif(strcasecmp($travel_pass->status,'released') == 0)
                                                <span class="dot green-dot"></span>&nbsp;Released
                                            @else
                                                <span class="dot red-dot"></span>&nbsp;{{ucwords($travel_pass->status)}}
                                            @endif
                                        @endif
									@else
										No Status
									@endif
								</td>
								<td>
									<div class="btn-group" role="group" aria-label="...">
										<a href="{{route('travel-passes.show',$travel_pass->id)}}" class="btn btn-primary btnView">
											<span class="glyphicon glyphicon-eye-open" aria-hidden="true" ></span>
										</a>
										@if(Session::get('is_allow_delete_travel_pass') > 0)
											<a href="#" class="btn btn-danger btnDeleteTravelPass btnDelete" data-toggle="modal" data-target="#confirmationDeleteSection" data-name="{{ucwords($travel_pass->tracking_no)}}" id="{{$travel_pass->id}}">
												<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
											</a>
										@endif
									</div>
									{{-- <div class="btn-group">
			                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                                Action <span class="caret"></span>
			                            </button>
			                            <ul class="dropdown-menu dropdown-menu-right">
			                                <li>
			                                    <a href="{{route('travel-passes.show',$travel_pass->id)}}" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp; View Details</a>
			                                </li>
			                                <li class="">
			                                    <a href="#" class="btnDeleteTravelPass" data-toggle="modal" data-target="#confirmationDeleteSection" data-name="{{ucwords($travel_pass->tracking_no)}}" id="{{$travel_pass->id}}">
			                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp; Delete</a>
			                                </li>
			                            </ul>
			                        </div> --}}
								</td>
							</tr>
						@empty
							<tr class="text-center">
								<td colspan="8">
									No available data.
								</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
			<div class="laravel-pagination" style="text-align: center">
				{{ $travel_passes->appends(
					[
						'sort_by' =>  (isset($_GET["sort_by"]) ? $_GET["sort_by"]:"" ),
						'search' =>  (isset($_GET["search"]) ? $_GET["search"]:"" ),
						'status' =>  (isset($_GET["status"]) ? $_GET["status"]:"" ),
					])->links() }}
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
								Are you sure you want to delete travel pass #<strong class="travelPassFullName"></strong>? 
							</p>
						</div>
						<div class="modal-footer">
							<a href="#" id="btnDeleteTravelPass" class="btn btn-danger">Yes</a>
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
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-multiselect.js') }}"></script>
<script>
	var selected_arr = [];
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
        // let travelPassesTable = $('#travelPassesTable').DataTable({
        //     "columnDefs": [
        //         { "orderable": false , "targets": 7 },
        //         { "type" : 'date', 'targets': [4] }
        //       ],
        //     "order": [],
        //     "filter": true,
        //     "paging" : true,
        //     "lengthChange": false,
        //     "info" : false,
        //     "pagingType": "simple_numbers"
        // });
        // $('#travelPassesTable_filter').remove();
        // $('.btnSearch').on('click',function(){
        	
        // 	travelPassesTable.search($('input[name="search"]').val()).draw();
        // 	// travelPassesTable.search($('input[name="search"]').val()).draw();
        // 	if(selected_arr.length > 0)
        // 	{
        // 		travelPassesTable.column(6).search(selected_arr.join('|'),true,false).draw();
        // 	}
        // });
        $(document).on("keypress", "input[name='search']", function(e) {
		    if (e.which == 13) {
		         $('.btnSearch').trigger('click');
		    }
		});
		$('#status').multiselect({
    		buttonClass: 'btn btn-default',
    		includeSelectAllOption: true,
    		dropRight: true,
    		buttonText: function(options) {
		        if (options.length == 0) {
		          return 'Please select status(es)';
		        }
		        else if (options.length > 2) {
		          return options.length + ' selected status(es)';
		        }
		        else {
		          var selected = '';
		          options.each(function() {
		            selected += $(this).text() + ' and ';
		          });
		          return selected.substr(0, selected.length -4);
		        }
		      },
		    onChange: function(element, checked) {
                var brands = $('#status option:selected');
                $('.multiselect-native-select').children('#status').next('.btn-group').find('.multiselect-container label.active').removeClass('active');
                // selected_arr.length = 0;
		        $(brands).each(function(index, brand){
                	let input = $('.multiselect-container input[value="' + $(this).val() + '"]');
                	$(input).parents('label').addClass('active');
		            // selected_arr.push($(this).val());
		        });
		        // console.log(selected_arr.join('|'));
		        // travelPassesTable.search($('input[name="search"]').val()).draw();
		        // if(selected_arr.length > 0)
		        // {	
        		// 	travelPassesTable.column(6).search(selected_arr.join('|'),true,false).draw();	
		        // }
		        // else
		        // {
		        // 	travelPassesTable.column(6).search('').draw();
		        // }
		        $('.travelPassForm').submit();
            },
            onSelectAll: function(){
            	var brands = $('#status option:selected');
            	$('.multiselect-native-select').children('#status').next('.btn-group').find('.multiselect-container label.active').removeClass('active');
                selected_arr.length = 0;
		        $(brands).each(function(index, brand){
		        	let input = $('.multiselect-container input[value="' + $(this).val() + '"]');
                	$(input).parents('label').addClass('active');
		            selected_arr.push($(this).val());
		        });
		        // travelPassesTable.search($('input[name="search"]').val()).draw();
        		// travelPassesTable.column(6).search(selected_arr.join('|'),true,false).draw();
        		$('.travelPassForm').submit();
            },
            onDeselectAll: function(){
            	$('.multiselect-native-select').children('#status').next('.btn-group').find('.multiselect-container label.active').removeClass('active');
          //   	travelPassesTable.search($('input[name="search"]').val()).draw();
        		// travelPassesTable.column(6).search('').draw();
        		$('.travelPassForm').submit();
            },
    	});
		$('.multiselect-native-select .btn-group').on('show.bs.dropdown', function(e) {
			$(this).find('.dropdown-menu').first().stop(true, true).slideDown(100);
		});
		$('.multiselect-native-select .btn-group').on('hide.bs.dropdown', function(e) {
			$(this).find('.dropdown-menu').first().stop(true, true).slideUp(100);
		});
		$('div.laravel-pagination ul.pagination li:first-child span').html('Previous');
		$('div.laravel-pagination ul.pagination li:last-child span').html('Next');
		$('div.laravel-pagination ul.pagination li:first-child a').html('Previous');
		$('div.laravel-pagination ul.pagination li:last-child a').html('Next');
    });
	$('.btnDeleteTravelPass').click(function(){
		$('.travelPassFullName').html($(this).data('name'));
		$('#btnDeleteTravelPass').attr('href','/travel-passes/' + $(this).attr('id') + '/delete');
	});
	$('#btnDeleteTravelPass').click(function(){
		$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
		$(this).attr('disabled',true);
	});

</script>
@stop