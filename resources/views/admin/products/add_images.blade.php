@extends('layout.app')
@section('title', 'Users List')
@section('app_name', Session::get('software_name'))
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
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
	<div class="row" style="margin-top: 30px";>
		<div class="col-lg-12">
			<h1 class="page-header">
				<small><a href="{{ route('admin-products.index') }}">Products</a> > {{$p->product_name}}</small>
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="">
				&nbsp; 
			</h1>
			@if(Session::has('flash_message'))
				<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{Session::get('flash_message')}}
				</div>
			@endif

			@if(Session::has('flash_error'))
				<div class="alert alert-danger">{{Session::get('flash_error')}}</div>
			@endif
		</div>
	</div>
	<div class="container-fluid">
	  <div class="panel panel-default"  style="width: 70%; margin: auto;">
		<div class="panel-heading text-center">
			<h3>Media</h3>			
		</div>
		<div class="panel-body">
			{{ Form::open(array('route' => array('admin-products.product-image.store',$product_id), 'method' => 'store','files'=>true,'class'=>'dropzone','id'=>'dropzone')) }}

			{{ Form::close() }}
	
		</div>
		</div>
	  </div>
</div>
@stop
@section('script')
<script>
	Dropzone.options.dropzone =
		 {

			renameFile: function(file) {
				var dt = new Date();
				var time = dt.getTime();
			   return time+file.name;
			},
			acceptedFiles: ".jpeg,.jpg,.png,.gif",
			addRemoveLinks: true,
			timeout: 50000,
			removedfile: function(file) 
			{
				console.log(file);
				if(file.media_id==undefined)
				{
					
					
					var name = file.upload.filename;
					$.ajax({
						headers: {
									'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
								},
						type: 'POST',
						url: '/delete_product-image/'+{{$product_id}},
						
						data: {filename: name},
						success: function (data){
							console.log("File has been successfully removed!!");
						},
						error: function(e) {
							console.log(e);
						}});

				}
				else
				{
				
					var name = file.filename;
					$.ajax({
					headers: {
								'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
							},
					type: 'GET',
					url: '/api/delete_product-image/'+file.media_id,
					
					data: {filename: name},
					success: function (data){
						console.log("File has been successfully removed!!");
					},
					error: function(e) {
						console.log(e);
					}});

						
				}

				var fileRef;
					return (fileRef = file.previewElement) != null ? 
					fileRef.parentNode.removeChild(file.previewElement) : void 0;
				
				
			},
	   
			success: function(file, response) 
			{
				console.log(response);
			},
			error: function(file, response)
			{
			   return false;
			}
			,

			init: function() {
			thisDropzone = this;

			

			@foreach($product_image as $x)

				var mockFile{{$x->id}} = { 
					name: "{{ $x->file_name }}",
					size: 100 ,
					 kind: 'image',
					accepted: true ,
					media_id: "{{$x->id}}", 
					dataURL: '/uploads/products/{{ $x->file_name }}'
				};		
				this.files.push(mockFile{{$x->id}}); 			 
				thisDropzone.emit("addedfile", mockFile{{$x->id}});
			    thisDropzone.files.push(mockFile{{$x->id}});
			    thisDropzone.createThumbnailFromUrl(mockFile{{$x->id}},
			    thisDropzone.options.thumbnailWidth, thisDropzone.options.thumbnailHeight,
			    thisDropzone.options.thumbnailMethod, true, function (thumbnail) {
			        thisDropzone.emit('thumbnail', mockFile{{$x->id}}, thumbnail);
			    });

			    thisDropzone.emit("complete", mockFile{{$x->id}});
			@endforeach

				
			},

		};


</script>
@stop