@extends('layout.app')
@section('title', 'View Travel Pass')
@section('app_name', Session::get('software_name'))
@section('css')
<style>
	.panel-card
	{
		margin-bottom: 20px;
	    background-color: #fff;
	    border: 1px solid transparent;
	    border-radius: 4px;
	    -webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 5px 0 rgba(0, 0, 0, 0.19);
	    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 5px 0 rgba(0, 0, 0, 0.19);
		padding: 15px 25px;
		border-color: #ddd;
	}
	.input-group .form-control {
        z-index: 0 !important;
    }
    .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
        z-index: 0 !important;
    }
    .flex-right
    {
    	height:100%;
        display:flex;
        display: -webkit-box;
        /*display: -moz-box;*/
        display: -ms-flexbox;
        display: -webkit-flex;
        -webkit-flex-direction: row;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-orient: horizontal;
        -moz-box-orient: horizontal;
        align-items: stretch;
        justify-content: stretch;
    }
    @media(min-width: 768px)
    {
    	.first-left
        {
            flex: 1;
        }
        .first-middle
        {
            flex: 5;
        }
        .first-right
        {
            flex: 1;
        }
        .flex-one
        {
        	height:100%;
            display:flex;
            display: -webkit-box;
            /*display: -moz-box;*/
            display: -ms-flexbox;
            display: -webkit-flex;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-box-orient: horizontal;
            -moz-box-orient: horizontal;
            align-items: stretch;
            justify-content: stretch;
        }
        .flex-two
        {
        	height:100%;
            display:flex;
            display: -webkit-box;
            /*display: -moz-box;*/
            display: -ms-flexbox;
            display: -webkit-flex;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-box-orient: horizontal;
            -moz-box-orient: horizontal;
            align-items: stretch;
            justify-content: space-between;
        }
        .flex-three
	    {
	    	height:100%;
            display:flex;
            display: -webkit-box;
            /*display: -moz-box;*/
            display: -ms-flexbox;
            display: -webkit-flex;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-orient: vertical;
            -moz-box-orient: vertical;
            align-items: center;
            justify-content: stretch;
	    }
    }
    @media(max-width: 767px)
    {
    	.flex-one
        {
        	height:100%;
            display:flex;
            display: -webkit-box;
            /*display: -moz-box;*/
            display: -ms-flexbox;
            display: -webkit-flex;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-orient: vertical;
            -moz-box-orient: vertical;
            align-items: stretch;
            justify-content: stretch;
        }
    	.first-left
        {
            flex: 1;
            display: none;
        }
        .first-middle
        {
            flex: 1;
        }
        .first-right
        {
            flex: 1;
        }
    	.flex-two
        {
        	height:100%;
            display:flex;
            display: -webkit-box;
            /*display: -moz-box;*/
            display: -ms-flexbox;
            display: -webkit-flex;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-orient: horizontal;
            -moz-box-orient: horizontal;
            align-items: stretch;
            justify-content: space-between;
        }
    }
    .flex-two > div.divider {
        flex-grow: 1;
       	border: 1px solid #00000029;
       	background-color: #fff;
        padding-top: 1px;
        padding-bottom: 1px;
    }
    .flex-two > div.divider-green
    {
    	background-color: #00B341;
    	border-color: #009336;
    }
    .flex-two > div
    {
        flex-basis: 100%;
        align-self: stretch;
    }
    .flex-two > div.divider
    {
        align-self: center;
        @if(strcasecmp($travel_pass->type,'incoming_visitor') == 0 || strcasecmp($travel_pass->type,'ofw') == 0 || strcasecmp($travel_pass->type,'pass_through') == 0)
            margin-left: -15%;
            margin-right: -15%;
        @else
            margin-left: -10%;
            margin-right: -10%;
        @endif
        
    }
    .flex-two > div:not(.divider)
    {
    	flex-basis: 90%;
    }
    .circle
    {
    	height: 25px;
		width: 25px;
		background-color: #fff;
		border: 1px solid #B2B2B2;
		border-radius: 50%;
		display: block;
		z-index: 2;
		margin: 0 auto;
		margin-bottom: 15px;
    }
    .green-circle
    {
    	background-color: #00B341;
    	border-color: #009336;
    }
    .red-circle
    {
    	background-color: #a94442;
    	border-color: #973d3b;
    }
    .gray-circle
    {
        background-color: #9A9A9A;
        border-color: #C6C6C6;
    }
    @media(min-width: 1385px)
    {
    	.flex-two > div.divider
    	{
    		margin-top: -45px;
    	}
    }
    @media(max-width: 1384px)
    {
    	.flex-two > div.divider
    	{
            @if(strcasecmp($travel_pass->type,'incoming_visitor') == 0 || strcasecmp($travel_pass->type,'ofw') == 0 || strcasecmp($travel_pass->type,'pass_through') == 0)
    		    margin-top: -45px;
            @else
                margin-top: -65px;
            @endif
    	}
    }
    @media(max-width: 767px)
    {
    	.flex-two > div.divider
    	{
    		margin-left: unset;
        	margin-right: unset;
        	margin-top: unset;
        	display: none;
    	}
    }
    @media(min-width: 1384px) and (max-width:1442px)
    {
    	.flex-two > div.divider
    	{
    		@if(strcasecmp($travel_pass->type,'incoming_visitor') == 0 || strcasecmp($travel_pass->type,'ofw') == 0 || strcasecmp($travel_pass->type,'pass_through') == 0)
                margin-top: -45px;
            @else
                margin-top: -65px;
            @endif
    	}
    }
    @media(min-width: 992px)
    {
    	.equal {
		  	display:flex;
	      	display: -webkit-box;
	        /*display: -moz-box;*/
	        display: -ms-flexbox;
	        display: -webkit-flex;
		  	flex-wrap: wrap;
		  	-webkit-flex-direction: row;
	        -ms-flex-direction: row;
	        flex-direction: row;
	        -webkit-box-orient: horizontal;
	        -moz-box-orient: horizontal;
	        align-items: stretch;
		}
		.last-row
		{
			margin-top: 15px;
		}
    }
    @media(min-width: 1200px)
    {
    	.attachment-text
    	{
    		text-align: left;
    		vertical-align: middle;
    	}
    	.attachment-button
    	{
    		text-align: right;
    	}
    	.row-margin
    	{
    		margin-bottom: 10px;
    	}
    }
    @media(max-width: 1199px)
    {
    	.attachment-text
    	{
    		text-align: center;
    	}
    	.attachment-button
    	{
    		text-align: center;
    	}
    }
    .btnActionHeader
	{
	   	float: right;
	}
	.table>thead
    {
    	background-color: #EBEDEF;
    	color: black;
    }
    .table-custom>tbody>tr>td, .table-custom>tbody>tr>th, .table-custom>tfoot>tr>td, .table-custom>tfoot>tr>th, .table-custom>thead>tr>td, .table-custom>thead>tr>th {
    	padding: 10px 15px;
    }
    .btn-fixed-width
    {
    	min-width: 148px;
    }
    input[type="file"]
    {
    	height: 36px;
    }
    .big-checkbox
    {
        margin: 2px 0 0;
        -ms-transform: scale(1.2); /* IE */
        -moz-transform: scale(1.2); /* FF */
        -webkit-transform: scale(1.2); /* Safari and Chrome */
        -o-transform: scale(1.2); /* Opera */
        transform: scale(1.2);
        margin-left: -18px !important;
    }
    a.btnAttachment:hover, a.btnAttachment:active, a.btnAttachment:active:focus
    {
        background-color: #15296d !important;
        color:white;
    }
</style>
@stop
@section('content')
<div class="container-fluid">
	<div class="row" style="margin-top:30px;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">				
				<h2>Tracking # {{$travel_pass->tracking_no}}</h2> <small></small>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="flex-one">
						<div class="first-left">
							
						</div>
						<div class="first-middle">
							{{-- <div style="height: 2px;background: #e0e0e0;position: relative;margin: 0 auto;left: 0;right: 0;top: 40%;z-index: 1;">
							</div> --}}
							<div class="flex-two">
                                @if(strcasecmp($travel_pass->type,'incoming_visitor') == 0 || strcasecmp($travel_pass->type,'ofw') == 0 || strcasecmp($travel_pass->type,'pass_through') == 0)
                                    <div>
                                        <div class="flex-three">
                                            <div style="z-index:1;">
                                                @if((!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'cancelled') == 0 || strcasecmp($travel_pass->status,'rejected') == 0)) && (!empty($travel_pass_approve->status) && (strcasecmp($travel_pass_approve->status,'processing') == 0 || strcasecmp($travel_pass_approve->status,'verification') == 0 )))   
                                                    <div class="circle red-circle">
                                                    
                                                    </div>
                                                @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'processing') == 0 || strcasecmp($travel_pass->status,'vertification') == 0))
                                                    <div class="circle gray-circle">
                                                    
                                                    </div>
                                                @else
                                                    <div class="circle green-circle">
                                                    
                                                    </div>
                                                @endif
                                                
                                            </div>
                                            <div class="text-center">
                                                <p><strong>Processing</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                    @if((!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'cancelled') == 0 || strcasecmp($travel_pass->status,'rejected') == 0)) && (!empty($travel_pass_approve->status) && (strcasecmp($travel_pass_approve->status,'approved') == 0 || strcasecmp($travel_pass_approve->status,'released') == 0)))
                                        <div class="divider divider-green">
                                            
                                        </div>
                                    @else
                                        @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'approved') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                            <div class="divider divider-green">
                                                
                                            </div>
                                        @else
                                            <div class="divider">
                                                
                                            </div>
                                        @endif
                                    @endif
                                    <div>
                                        <div class="flex-three">
                                            <div style="z-index:1;">
                                                @if((!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'cancelled') == 0 || strcasecmp($travel_pass->status,'rejected') == 0)) && (!empty($travel_pass_approve->status)))
                                                    @if(strcasecmp($travel_pass_approve->status,'released') == 0 || strcasecmp($travel_pass_approve->status,'approved') == 0)
                                                        <div class="circle green-circle">
                                                            
                                                        </div>
                                                    @else
                                                        <div class="circle">
                                                            
                                                        </div>
                                                    @endif
                                                @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'released') == 0 || strcasecmp($travel_pass->status,'approved') == 0))
                                                    <div class="circle green-circle">
                                                            
                                                    </div>
                                                @else
                                                    <div class="circle">
                                                            
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="text-center">
                                                <p><strong>Approved</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                    @if((!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'cancelled') == 0 || strcasecmp($travel_pass->status,'rejected') == 0)) && (!empty($travel_pass_approve->status) && (strcasecmp($travel_pass_approve->status,'approved') == 0 || strcasecmp($travel_pass_approve->status,'released') == 0)))
                                        <div class="divider divider-green">
                                            
                                        </div>
                                    @else
                                        @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'approved') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                            <div class="divider divider-green">
                                                
                                            </div>
                                        @else
                                            <div class="divider">
                                                
                                            </div>
                                        @endif
                                    @endif
                                    <div>
                                        <div class="flex-three">
                                            <div style="z-index:1;">
                                                @if((!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'cancelled') == 0 || strcasecmp($travel_pass->status,'rejected') == 0)) && (!empty($travel_pass_approve->status)))
                                                    @if(strcasecmp($travel_pass_approve->status,'released') == 0)
                                                        <div class="circle green-circle">
                                                            
                                                        </div>
                                                    @elseif(strcasecmp($travel_pass_approve->status,'approved') == 0)
                                                        <div class="circle red-circle">
                                                            
                                                        </div>
                                                    @else
                                                        <div class="circle">
                                                            
                                                        </div>
                                                    @endif
                                                @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'released') == 0))
                                                    <div class="circle green-circle">
                                                            
                                                    </div>
                                                @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'approved') == 0))
                                                    <div class="circle gray-circle">
                                                            
                                                    </div>
                                                @else
                                                    <div class="circle">
                                                            
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="text-center">
                                                @if(strcasecmp($travel_pass->type,'pass_through') == 0)
                                                    <p><strong>Released</strong></p>
                                                @else
                                                    <p><strong>Released</strong></p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @else
    								<div>
    									<div class="flex-three">
    										<div style="z-index:1;">
    											@if((!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'cancelled') == 0 || strcasecmp($travel_pass->status,'rejected') == 0)) && (!empty($travel_pass_approve->status) && (strcasecmp($travel_pass_approve->status,'processing') == 0 || strcasecmp($travel_pass_approve->status,'verification') == 0)))
    												<div class="circle red-circle">
    												
    												</div>
    											@elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'processing') == 0 || strcasecmp($travel_pass->status,'verification') == 0))
                                                    <div class="circle gray-circle">
                                                    
                                                    </div>
                                                @else
    												<div class="circle green-circle">
    												
    												</div>
    											@endif
    											
    										</div>
    										<div class="text-center">
    											<p><strong>Processing</strong></p>
    										</div>
    									</div>
    								</div>
                                    @if((!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'cancelled') == 0 || strcasecmp($travel_pass->status,'rejected') == 0)) && (!empty($travel_pass_approve->status) && (strcasecmp($travel_pass_approve->status,'medical_assessment') == 0 || strcasecmp($travel_pass_approve->status,'waiting_for_payment') == 0 || strcasecmp($travel_pass_approve->status,'payment_paid') == 0 || strcasecmp($travel_pass_approve->status,'medical_certificate') == 0 || strcasecmp($travel_pass_approve->status,'released') == 0)))
                                        <div class="divider divider-green">
                                            
                                        </div>
                                    @else
                                        @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'medical_assessment') == 0 || strcasecmp($travel_pass->status,'waiting_for_payment') == 0 || strcasecmp($travel_pass->status,'payment_paid') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                            <div class="divider divider-green">
                                                
                                            </div>
                                        @else
                                            <div class="divider">
                                                
                                            </div>
                                        @endif
                                    @endif
    								<div>
    									<div class="flex-three">
    										<div style="z-index:1;">
                                                @if((!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'cancelled') == 0 || strcasecmp($travel_pass->status,'rejected') == 0)) && (!empty($travel_pass_approve->status)))
                                                    @if(strcasecmp($travel_pass_approve->status,'waiting_for_payment') == 0 || strcasecmp($travel_pass_approve->status,'payment_paid') == 0 || strcasecmp($travel_pass_approve->status,'medical_certificate') == 0 || strcasecmp($travel_pass_approve->status,'released') == 0)
                                                        <div class="circle green-circle">
                                                            
                                                        </div>
                                                    @elseif(strcasecmp($travel_pass_approve->status,'medical_assessment') == 0)
                                                        <div class="circle red-circle">
                                                            
                                                        </div>
                                                    @else
                                                        <div class="circle">
                                                            
                                                        </div>
                                                    @endif
                                                @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'waiting_for_payment') == 0 || strcasecmp($travel_pass->status,'payment_paid') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                                    <div class="circle green-circle">
                                                            
                                                    </div>
                                                @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'medical_assessment') == 0))
                                                    <div class="circle gray-circle">
                                                            
                                                    </div>
                                                @else
                                                    <div class="circle">
                                                            
                                                    </div>
                                                @endif
    										</div>
    										<div class="text-center">
    											<p><strong>For Medical Assessment</strong></p>
    										</div>
    									</div>
    								</div>
                                    @if((!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'cancelled') == 0 || strcasecmp($travel_pass->status,'rejected') == 0)) && (!empty($travel_pass_approve->status) && (strcasecmp($travel_pass_approve->status,'waiting_for_payment') == 0 || strcasecmp($travel_pass_approve->status,'payment_paid') == 0 || strcasecmp($travel_pass_approve->status,'medical_certificate') == 0 || strcasecmp($travel_pass_approve->status,'released') == 0)))
                                        <div class="divider divider-green">
                                            
                                        </div>
                                    @else
                                        @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'waiting_for_payment') == 0 || strcasecmp($travel_pass->status,'payment_paid') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                            <div class="divider divider-green">
                                                
                                            </div>
                                        @else
                                            <div class="divider">
                                                
                                            </div>
                                        @endif
                                    @endif
    								<div>
    									<div class="flex-three">
    										<div style="z-index:1;">
                                                @if((!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'cancelled') == 0 || strcasecmp($travel_pass->status,'rejected') == 0)) && (!empty($travel_pass_approve->status)))
                                                    @if(strcasecmp($travel_pass_approve->status,'medical_certificate') == 0 || strcasecmp($travel_pass_approve->status,'released') == 0  || strcasecmp($travel_pass_approve->status,'payment_paid') == 0)
                                                        <div class="circle green-circle">
                                                            
                                                        </div>
                                                    @elseif(strcasecmp($travel_pass_approve->status,'waiting_for_payment') == 0)
                                                        <div class="circle red-circle">
                                                            
                                                        </div>
                                                    @else
                                                        <div class="circle">
                                                            
                                                        </div>
                                                    @endif
                                                @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'payment_paid') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                                    <div class="circle green-circle">
                                                            
                                                    </div>
                                                @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'waiting_for_payment') == 0))
                                                    <div class="circle gray-circle">
                                                            
                                                    </div>
                                                @else
                                                    <div class="circle">
                                                            
                                                    </div>
                                                @endif
    										</div>
    										<div class="text-center">
    											<p><strong>Payment</strong></p>
    										</div>
    									</div>
    								</div>
                                    @if((!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'cancelled') == 0 || strcasecmp($travel_pass->status,'rejected') == 0)) && (!empty($travel_pass_approve->status) && (strcasecmp($travel_pass_approve->status,'payment_paid') == 0 || strcasecmp($travel_pass_approve->status,'medical_certificate') == 0 || strcasecmp($travel_pass_approve->status,'released') == 0)))
                                        <div class="divider divider-green">
                                            
                                        </div>
                                    @else
                                        @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'payment_paid') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                            <div class="divider divider-green">
                                                
                                            </div>
                                        @else
                                            <div class="divider">
                                                
                                            </div>
                                        @endif
                                    @endif
    								<div>
    									<div class="flex-three">
    										<div style="z-index:1;">
                                                @if((!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'cancelled') == 0 || strcasecmp($travel_pass->status,'rejected') == 0)) && (!empty($travel_pass_approve->status)))
                                                    @if(strcasecmp($travel_pass_approve->status,'medical_certificate') == 0 || strcasecmp($travel_pass_approve->status,'released') == 0)
                                                        <div class="circle green-circle">
                                                            
                                                        </div>
                                                    @elseif(strcasecmp($travel_pass_approve->status,'payment_paid') == 0)
                                                        <div class="circle red-circle">
                                                            
                                                        </div>
                                                    @else
                                                        <div class="circle">
                                                            
                                                        </div>
                                                    @endif
                                                @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                                    <div class="circle green-circle">
                                                            
                                                    </div>
                                                @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'payment_paid') == 0))
                                                    <div class="circle gray-circle">
                                                            
                                                    </div>
                                                @else
                                                    <div class="circle">
                                                            
                                                    </div>
                                                @endif
    										</div>
    										<div class="text-center">
    											<p><strong>Medical Certificate</strong></p>
    										</div>
    									</div>
    								</div>
                                    @if((!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'cancelled') == 0 || strcasecmp($travel_pass->status,'rejected') == 0)) && (!empty($travel_pass_approve->status) && (strcasecmp($travel_pass_approve->status,'medical_certificate') == 0 || strcasecmp($travel_pass_approve->status,'released') == 0)))
                                        <div class="divider divider-green">
                                            
                                        </div>
                                    @else
                                        @if(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                            <div class="divider divider-green">
                                                
                                            </div>
                                        @else
                                            <div class="divider">
                                                
                                            </div>
                                        @endif
                                    @endif
    								<div>
    									<div class="flex-three">
    										<div style="z-index:1;">
                                                @if((!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'cancelled') == 0 || strcasecmp($travel_pass->status,'rejected') == 0)) && (!empty($travel_pass_approve->status)))
                                                    @if(strcasecmp($travel_pass_approve->status,'released') == 0)
                                                        <div class="circle green-circle">
                                                            
                                                        </div>
                                                    @elseif(strcasecmp($travel_pass_approve->status,'medical_certificate') == 0)
                                                        <div class="circle red-circle">
                                                            
                                                        </div>
                                                    @else
                                                        <div class="circle">
                                                            
                                                        </div>
                                                    @endif
                                                @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'released') == 0))
                                                    <div class="circle green-circle">
                                                            
                                                    </div>
                                                @elseif(!empty($travel_pass->status) && (strcasecmp($travel_pass->status,'medical_certificate') == 0))
                                                    <div class="circle gray-circle">
                                                            
                                                    </div>
                                                @else
                                                    <div class="circle">
                                                            
                                                    </div>
                                                @endif
    										</div>
    										<div class="text-center">
    											<p><strong>Released</strong></p>
    										</div>
    									</div>
    								</div>
                                @endif
							</div>
						</div>
						<div class="first-right">
							<div class="flex-right">
								<div style="flex:1;align-self: flex-end;justify-content: stretch;">
                                    @if(strcasecmp($travel_pass->type,'incoming_visitor') != 0 && strcasecmp($travel_pass->type,'ofw') != 0 && strcasecmp($travel_pass->type,'pass_through') != 0)
    									@if(!empty($travel_pass->status) && strcasecmp($travel_pass->status,'released') != 0)
                                            @if((Session::get('is_allow_processing') > 0 && (strcasecmp($travel_pass->status,'processing') == 0 || strcasecmp($travel_pass->status,'verification') == 0)) || (Session::get('is_allow_medical_assessment') > 0 && strcasecmp($travel_pass->status,'medical_assessment') == 0) || (Session::get('is_allow_payment') > 0 && strcasecmp($travel_pass->status,'waiting_for_payment') == 0) || (Session::get('is_allow_medical_certificate') > 0 && strcasecmp($travel_pass->status,'payment_paid') == 0) || (Session::get('is_allow_released') > 0 && strcasecmp($travel_pass->status,'medical_certificate') == 0) || (Session::get('is_allow_released') > 0 && strcasecmp($travel_pass->status,'approved') == 0))
        										<div class="btn-group btnActionHeader">
        										  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        										    	Action <span class="caret"></span>
        										  	</button>
        										  	<ul class="dropdown-menu dropdown-menu-right">
        										  		@if(strcasecmp($travel_pass->status,'processing') == 0)
                                                            @if(Session::get('is_allow_processing') > 0)
                                                                @if((strcasecmp($travel_pass->type,'resident') == 0 || strcasecmp($travel_pass->type,'frequent_traveller') == 0) && (!empty($travel_pass_attachments->medical_certificate_issued_by_city_health_office)))
                                                                    <li>
                                                                        <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve With Valid Medical Certificate" data-toggle="modal" data-target="#confirmationApproveProcessingWithMedCertSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve with Med Cert.</a>
                                                                    </li>
                                                                    @if((strcasecmp($travel_pass->type,'resident') == 0) && (!empty($travel_pass_attachments->medical_certificate_issued_by_city_health_office)))
                                                                        <li>
                                                                            <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve With Invalid Medical Certificate" data-toggle="modal" data-target="#confirmationApproveProcessingWithInvalidMedCertSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve with Invalid Med Cert.</a>
                                                                        </li>
                                                                    @endif
                                                                @else
                										  			<li>
                										  				<a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve" data-toggle="modal" data-target="#confirmationApproveProcessingSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve</a>
                										  			</li>
                                                                @endif
                                                            @endif
                                                            @if(Session::get('is_allow_verification') > 0)
                                                                <li>
                                                                    <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Pending" data-toggle="modal" data-target="#confirmationApproveVerificationSection"><i class="fas fa-question-circle" aria-hidden="true"></i>&nbsp;Pending for Verification</a>
                                                                </li>
                                                            @endif
                                                            @if(Session::get('is_allow_processing') > 0)
            										  			<li>
            										  				<a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Reject" data-toggle="modal" data-target="#confirmationRejectProcessingSection"><i class="fas fa-times-circle" aria-hidden="true"></i>&nbsp;Reject</a>
            										  			</li>
                                                            @endif
                                                            @if(Session::get('is_allow_edit_travel_pass') > 0)
                                                                <li class="">
                                                                    <a href="{{ route('travel-passes.edit',$travel_pass->id) }}" class="btnDeleteTravelPass" title="Edit">
                                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit</a>
                                                                </li>
                                                            @endif
                                                        @elseif(strcasecmp($travel_pass->status,'verification') == 0)
                                                            @if(Session::get('is_allow_processing') > 0)
                                                                @if(Auth::user()->hasRole('superuser'))
                                                                    @if((strcasecmp($travel_pass->type,'resident') == 0 || strcasecmp($travel_pass->type,'frequent_traveller') == 0) && (!empty($travel_pass_attachments->medical_certificate_issued_by_city_health_office)))
                                                                        <li>
                                                                            <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve With Valid Medical Certificate" data-toggle="modal" data-target="#confirmationApproveProcessingWithMedCertSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve with Med Cert.</a>
                                                                        </li>
                                                                        @if((strcasecmp($travel_pass->type,'resident') == 0) && (!empty($travel_pass_attachments->medical_certificate_issued_by_city_health_office)))
                                                                            <li>
                                                                                <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve With Invalid Medical Certificate" data-toggle="modal" data-target="#confirmationApproveProcessingWithInvalidMedCertSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve with Invalid Med Cert.</a>
                                                                            </li>
                                                                        @endif
                                                                    @else
                                                                        <li>
                                                                            <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve" data-toggle="modal" data-target="#confirmationApproveProcessingSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve</a>
                                                                        </li>
                                                                    @endif
                                                                @else
                                                                    @if(!empty($travel_pass->approve_auth_id) && ($travel_pass->approve_auth_id == Auth::user()->id))
                                                                        @if((strcasecmp($travel_pass->type,'resident') == 0 || strcasecmp($travel_pass->type,'frequent_traveller') == 0) && (!empty($travel_pass_attachments->medical_certificate_issued_by_city_health_office)))
                                                                            <li>
                                                                                <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve With Valid Medical Certificate" data-toggle="modal" data-target="#confirmationApproveProcessingWithMedCertSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve with Med Cert.</a>
                                                                            </li>
                                                                            @if((strcasecmp($travel_pass->type,'resident') == 0) && (!empty($travel_pass_attachments->medical_certificate_issued_by_city_health_office)))
                                                                                <li>
                                                                                    <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve With Invalid Medical Certificate" data-toggle="modal" data-target="#confirmationApproveProcessingWithInvalidMedCertSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve with Invalid Med Cert.</a>
                                                                                </li>
                                                                            @endif
                                                                        @else
                                                                            <li>
                                                                                <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve" data-toggle="modal" data-target="#confirmationApproveProcessingSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve</a>
                                                                            </li>
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                            @endif
                                                            @if(Session::get('is_allow_edit_travel_pass') > 0)
                                                                <li class="">
                                                                    <a href="{{ route('travel-passes.edit',$travel_pass->id) }}" class="btnDeleteTravelPass" title="Edit">
                                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit</a>
                                                                </li>
                                                            @endif
                                                            <li>
                                                                <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Reject" data-toggle="modal" data-target="#confirmationRejectProcessingSection"><i class="fas fa-times-circle" aria-hidden="true"></i>&nbsp;Reject</a>
                                                            </li>
        										  		@elseif(strcasecmp($travel_pass->status,'medical_assessment') == 0)
                                                            @if(Session::get('is_allow_medical_assessment') > 0)
            										  			<li>
            										  				<a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Done" data-toggle="modal" data-target="#confirmationDoneMedicalAssessmentSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Done</a>
            										  			</li>
            										  			<li>
            										  				<a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Cancel" data-toggle="modal" data-target="#confirmationCancelMedicalAssessmentSection"><i class="fas fa-times-circle" aria-hidden="true"></i>&nbsp;Cancel</a>
            										  			</li>
                                                            @endif
                                                            @if(Session::get('is_allow_edit_travel_pass') > 0)
                                                                <li class="">
                                                                    <a href="{{ route('travel-passes.edit',$travel_pass->id) }}" class="btnDeleteTravelPass" title="Edit">
                                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit</a>
                                                                </li>
                                                            @endif
        										  		@elseif(strcasecmp($travel_pass->status,'waiting_for_payment') == 0)
                                                            @if(Session::get('is_allow_payment') > 0)
            										  			<li>
            											  			<a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Paid" data-toggle="modal" data-target="#confirmationPaidPaymentSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Paid</a>
            											  		</li>
            											  		<li>
            											  			<a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Cancel" data-toggle="modal" data-target="#confirmationCancelPaymentSection"><i class="fas fa-times-circle" aria-hidden="true"></i>&nbsp;Cancel</a>
            											  		</li>
                                                            @endif
                                                            @if(Session::get('is_allow_edit_travel_pass') > 0)
                                                                <li class="">
                                                                    <a href="{{ route('travel-passes.edit',$travel_pass->id) }}" class="btnDeleteTravelPass" title="Edit">
                                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit</a>
                                                                </li>
                                                            @endif
        											  	@elseif(strcasecmp($travel_pass->status,'payment_paid') == 0)
                                                            @if(Session::get('is_allow_medical_certificate') > 0)
            										  			{{-- <li>
            											  			<a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Upload" data-toggle="modal" data-target="#confirmationUploadMedicalCertificateSection"><i class="fas fa-upload" aria-hidden="true"></i>&nbsp;Upload Medical Certificate</a>
            											  		</li> --}}
                                                                <li>
                                                                    <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Release" data-toggle="modal" data-target="#confirmationReleaseMedicalCertificateSection"><i class="fas fa-paper-plane" aria-hidden="true"></i>&nbsp;Release Medical Certificate</a>
                                                                </li>
            											  		<li>
            											  			<a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Cancel" data-toggle="modal" data-target="#confirmationCancelMedicalCertificateSection"><i class="fas fa-times-circle" aria-hidden="true"></i>&nbsp;Cancel</a>
            											  		</li>
                                                            @endif
                                                            @if(Session::get('is_allow_edit_travel_pass') > 0)
                                                                <li class="">
                                                                    <a href="{{ route('travel-passes.edit',$travel_pass->id) }}" class="btnDeleteTravelPass" title="Edit">
                                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit</a>
                                                                </li>
                                                            @endif
        											  	@elseif(strcasecmp($travel_pass->status,'medical_certificate') == 0)
                                                            @if(Session::get('is_allow_released') > 0)
            										  			<li>
            											  			<a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Release" data-toggle="modal" data-target="#confirmationApproveReleaseTravelPassSection"><i class="fas fa-paper-plane" aria-hidden="true"></i>&nbsp;Release Travel Pass</a>
            											  		</li>
            											  		<li>
            											  			<a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Cancel" data-toggle="modal" data-target="#confirmationCancelReleaseTravelPassSection"><i class="fas fa-times-circle" aria-hidden="true"></i>&nbsp;Cancel</a>
            											  		</li>
                                                            @endif
                                                            @if(Session::get('is_allow_edit_travel_pass') > 0)
                                                                <li class="">
                                                                    <a href="{{ route('travel-passes.edit',$travel_pass->id) }}" class="btnDeleteTravelPass" title="Edit">
                                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit</a>
                                                                </li>
                                                            @endif
        											  	@else
                                                            {{-- <li>
                                                                <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Resend" data-toggle="modal" data-target="#confirmationResendAttachmentsSection"><i class="fas fa-paper-plane" aria-hidden="true"></i>&nbsp;Resend Attachments</a>
                                                            </li> --}}
                                                            @if(Session::get('is_allow_edit_travel_pass') > 0)
                                                                    <li class="">
                                                                        <a href="{{ route('travel-passes.edit',$travel_pass->id) }}" class="btnDeleteTravelPass" title="Edit">
                                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit</a>
                                                                    </li>
                                                                @endif
                                                            @if(Session::get('is_allow_delete_travel_pass') > 0)
            											  		<li class="">
            					                                    <a href="#" class="btnDeleteTravelPass" data-toggle="modal" data-target="#confirmationDeleteSection" data-name="{{ucwords($travel_pass->tracking_no)}}" id="{{$travel_pass->id}}">
            					                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp; Delete</a>
            					                                </li>
                                                            @endif
        										  		@endif
                                                        
        										  	</ul>
        										</div>
                                            @endif
                                        @else
                                            <div class="btn-group btnActionHeader">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    {{-- <li>
                                                        <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Resend" data-toggle="modal" data-target="#confirmationResendAttachmentsSection"><i class="fas fa-paper-plane" aria-hidden="true"></i>&nbsp;Resend Attachments</a>
                                                    </li> --}}
                                                     @if(Session::get('is_allow_edit_travel_pass') > 0)
                                                        <li class="">
                                                            <a href="{{ route('travel-passes.edit',$travel_pass->id) }}" class="btnDeleteTravelPass" title="Edit">
                                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit</a>
                                                        </li>
                                                    @endif
                                                    <li class="">
                                                        <a href="#" class="btnDeleteTravelPass" data-toggle="modal" data-target="#confirmationDeleteSection" data-name="{{ucwords($travel_pass->tracking_no)}}" id="{{$travel_pass->id}}">
                                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp; Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
    									@endif
                                    @else
                                        @if(!empty($travel_pass->status) && strcasecmp($travel_pass->status,'released') != 0)
                                            @if((Session::get('is_allow_processing') > 0 && (strcasecmp($travel_pass->status,'processing') == 0 || strcasecmp($travel_pass->status,'verification') == 0)) || (Session::get('is_allow_medical_assessment') > 0 && strcasecmp($travel_pass->status,'medical_assessment') == 0) || (Session::get('is_allow_payment') > 0 && strcasecmp($travel_pass->status,'waiting_for_payment') == 0) || (Session::get('is_allow_medical_certificate') > 0 && strcasecmp($travel_pass->status,'payment_paid') == 0) || (Session::get('is_allow_released') > 0 && strcasecmp($travel_pass->status,'medical_certificate') == 0) || (Session::get('is_allow_released') > 0 && strcasecmp($travel_pass->status,'approved') == 0))
                                                <div class="btn-group btnActionHeader">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        @if(strcasecmp($travel_pass->status,'processing') == 0)
                                                            @if(Session::get('is_allow_processing') > 0)
                                                                @if((strcasecmp($travel_pass->type,'resident') == 0 || strcasecmp($travel_pass->type,'frequent_traveller') == 0) && (!empty($travel_pass_attachments->medical_certificate_issued_by_city_health_office)))
                                                                    <li>
                                                                        <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve With Valid Medical Certificate" data-toggle="modal" data-target="#confirmationApproveProcessingWithMedCertSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve with Med Cert.</a>
                                                                    </li>
                                                                    @if((strcasecmp($travel_pass->type,'resident') == 0) && (!empty($travel_pass_attachments->medical_certificate_issued_by_city_health_office)))
                                                                        <li>
                                                                            <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve With Invalid Medical Certificate" data-toggle="modal" data-target="#confirmationApproveProcessingWithInvalidMedCertSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve with Invalid Med Cert.</a>
                                                                        </li>
                                                                    @endif
                                                                @else
                                                                    <li>
                                                                        @if(strcasecmp($travel_pass->type,'pass_through') == 0)
                                                                            <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve" data-toggle="modal" data-target="#confirmationApproveProcessingPassThroughSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve</a>
                                                                        @else
                                                                            <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve" data-toggle="modal" data-target="#confirmationApproveProcessingSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve</a>
                                                                        @endif
                                                                    </li>
                                                                @endif
                                                            @endif
                                                            @if(Session::get('is_allow_verification') > 0)
                                                                <li>
                                                                    <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Pending" data-toggle="modal" data-target="#confirmationApproveVerificationSection"><i class="fas fa-question-circle" aria-hidden="true"></i>&nbsp;Pending for Verification</a>
                                                                </li>
                                                            @endif
                                                            @if(Session::get('is_allow_processing') > 0)
                                                                <li>
                                                                    <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Reject" data-toggle="modal" data-target="#confirmationRejectProcessingSection"><i class="fas fa-times-circle" aria-hidden="true"></i>&nbsp;Reject</a>
                                                                </li>
                                                            @endif
                                                            @if(Session::get('is_allow_edit_travel_pass') > 0)
                                                                <li class="">
                                                                    <a href="{{ route('travel-passes.edit',$travel_pass->id) }}" class="btnDeleteTravelPass" title="Edit">
                                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit</a>
                                                                </li>
                                                            @endif
                                                        @elseif(strcasecmp($travel_pass->status,'verification') == 0)
                                                            @if(Session::get('is_allow_processing') > 0)
                                                                @if(Auth::user()->hasRole('superuser'))
                                                                    @if((strcasecmp($travel_pass->type,'resident') == 0 || strcasecmp($travel_pass->type,'frequent_traveller') == 0) && (!empty($travel_pass_attachments->medical_certificate_issued_by_city_health_office)))
                                                                        <li>
                                                                            <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve With Valid Medical Certificate" data-toggle="modal" data-target="#confirmationApproveProcessingWithMedCertSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve with Med Cert.</a>
                                                                        </li>
                                                                        @if((strcasecmp($travel_pass->type,'resident') == 0) && (!empty($travel_pass_attachments->medical_certificate_issued_by_city_health_office)))
                                                                            <li>
                                                                                <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve With Invalid Medical Certificate" data-toggle="modal" data-target="#confirmationApproveProcessingWithInvalidMedCertSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve with Invalid Med Cert.</a>
                                                                            </li>
                                                                        @endif
                                                                    @else
                                                                        <li>
                                                                            @if(strcasecmp($travel_pass->type,'pass_through') == 0)
                                                                                <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve" data-toggle="modal" data-target="#confirmationApproveProcessingPassThroughSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve</a>
                                                                            @else
                                                                                <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve" data-toggle="modal" data-target="#confirmationApproveProcessingSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve</a>
                                                                            @endif
                                                                        </li>
                                                                    @endif
                                                                @else
                                                                    @if(!empty($travel_pass->approve_auth_id) && ($travel_pass->approve_auth_id == Auth::user()->id))
                                                                        @if((strcasecmp($travel_pass->type,'resident') == 0 || strcasecmp($travel_pass->type,'frequent_traveller') == 0) && (!empty($travel_pass_attachments->medical_certificate_issued_by_city_health_office)))
                                                                            <li>
                                                                                <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve With Valid Medical Certificate" data-toggle="modal" data-target="#confirmationApproveProcessingWithMedCertSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve with Med Cert.</a>
                                                                            </li>
                                                                            @if((strcasecmp($travel_pass->type,'resident') == 0) && (!empty($travel_pass_attachments->medical_certificate_issued_by_city_health_office)))
                                                                                <li>
                                                                                    <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve With Invalid Medical Certificate" data-toggle="modal" data-target="#confirmationApproveProcessingWithInvalidMedCertSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve with Invalid Med Cert.</a>
                                                                                </li>
                                                                            @endif
                                                                        @else
                                                                            <li>
                                                                                @if(strcasecmp($travel_pass->type,'pass_through') == 0)
                                                                                    <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve" data-toggle="modal" data-target="#confirmationApproveProcessingPassThroughSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve</a>
                                                                                @else
                                                                                    <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Approve" data-toggle="modal" data-target="#confirmationApproveProcessingSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Approve</a>
                                                                                @endif
                                                                            </li>
                                                                        @endif
                                                                    @else
                                                                    @endif
                                                                @endif
                                                                <li>
                                                                    <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Reject" data-toggle="modal" data-target="#confirmationRejectProcessingSection"><i class="fas fa-times-circle" aria-hidden="true"></i>&nbsp;Reject</a>
                                                                </li>
                                                            @endif
                                                            @if(Session::get('is_allow_edit_travel_pass') > 0)
                                                                <li class="">
                                                                    <a href="{{ route('travel-passes.edit',$travel_pass->id) }}" class="btnDeleteTravelPass" title="Edit">
                                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit</a>
                                                                </li>
                                                            @endif
                                                        @elseif(strcasecmp($travel_pass->status,'approved') == 0)
                                                            @if(Session::get('is_allow_released') > 0)
                                                                <li>
                                                                    @if(strcasecmp($travel_pass->type,'pass_through') != 0)
                                                                        <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Release" data-toggle="modal" data-target="#confirmationApproveReleaseTravelPassSection"><i class="fas fa-paper-plane" aria-hidden="true"></i>&nbsp;Release Travel Pass</a>
                                                                    @else
                                                                        <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Release" data-toggle="modal" data-target="#confirmationApproveReleasePassThroughTravelPassSection"><i class="fas fa-paper-plane" aria-hidden="true"></i>&nbsp;Release QR Code</a>
                                                                    @endif
                                                                </li>
                                                                <li>
                                                                    <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Cancel" data-toggle="modal" data-target="#confirmationCancelReleaseTravelPassSection"><i class="fas fa-times-circle" aria-hidden="true"></i>&nbsp;Cancel</a>
                                                                </li>
                                                            @endif  
                                                            @if(Session::get('is_allow_edit_travel_pass') > 0)
                                                                <li class="">
                                                                    <a href="{{ route('travel-passes.edit',$travel_pass->id) }}" class="btnDeleteTravelPass" title="Edit">
                                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit</a>
                                                                </li>
                                                            @endif
                                                        @else
                                                            {{-- <li>
                                                                <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Resend" data-toggle="modal" data-target="#confirmationResendAttachmentsSection"><i class="fas fa-paper-plane" aria-hidden="true"></i>&nbsp;Resend Attachments</a>
                                                            </li> --}}
                                                            @if(Session::get('is_allow_edit_travel_pass') > 0)
                                                                <li class="">
                                                                    <a href="{{ route('travel-passes.edit',$travel_pass->id) }}" class="btnDeleteTravelPass" title="Edit">
                                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit</a>
                                                                </li>
                                                            @endif
                                                            <li class="">
                                                                <a href="#" class="btnDeleteTravelPass" data-toggle="modal" data-target="#confirmationDeleteSection" data-name="{{ucwords($travel_pass->tracking_no)}}" id="{{$travel_pass->id}}">
                                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp; Delete</a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            @endif
                                        @else
                                            <div class="btn-group btnActionHeader">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    {{-- <li>
                                                        <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Resend" data-toggle="modal" data-target="#confirmationResendAttachmentsSection"><i class="fas fa-paper-plane" aria-hidden="true"></i>&nbsp;Resend Attachments</a>
                                                    </li> --}}
                                                     @if(Session::get('is_allow_edit_travel_pass') > 0)
                                                        <li class="">
                                                            <a href="{{ route('travel-passes.edit',$travel_pass->id) }}" class="btnDeleteTravelPass" title="Edit">
                                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit</a>
                                                        </li>
                                                    @endif
                                                    <li class="">
                                                        <a href="#" class="btnDeleteTravelPass" data-toggle="modal" data-target="#confirmationDeleteSection" data-name="{{ucwords($travel_pass->tracking_no)}}" id="{{$travel_pass->id}}">
                                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp; Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    @endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row equal">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="panel panel-default" style="height: 100%;">
				<div class="panel-body" style="padding: 15px 20px;height: 100%;">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h4><strong>Basic Information</strong></h4>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
							<p>Full Name:</p>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
							<p style="color:#373A3C;font-weight: 600;">{{ucwords($travel_pass->full_name)}}</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
							<p>Contact Number:</p>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
							<p style="color:#373A3C;font-weight: 600;">{{!empty($travel_pass->contact_no) ? $travel_pass->contact_no : 'None' }}</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
							<p>Email:</p>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
							<p style="color:#373A3C;font-weight: 600;">{{$travel_pass->email}}&nbsp;</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
							<p>Address:</p>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
							<p style="color:#373A3C;font-weight: 600;">{{$travel_pass->residence.' '.$travel_pass->barangay.' '.$travel_pass->municipality_city.' '.$travel_pass->province}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="panel panel-default" style="height: 100%;">
				<div class="panel-body" style="padding: 15px 20px;height:100%;">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h4><strong>Travel Details</strong></h4>
						</div>
					</div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <p>Travel Pass Type:</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <p style="color:#373A3C;font-weight: 600;">
                                @if(!empty($travel_pass->type))
                                    @if(strcasecmp($travel_pass->type,'resident') == 0)
                                        Local Traveller
                                    @elseif(strcasecmp($travel_pass->type,'incoming_visitor') == 0)
                                        Incoming Visitor
                                    @elseif(strcasecmp($travel_pass->type,'frequent_traveller') == 0)
                                        Frequent Traveller
                                    @elseif(strcasecmp($travel_pass->type,'pass_through') == 0)
                                        Pass Through
                                    @else
                                        {{strtoupper($travel_pass->type)}}
                                    @endif
                                @else
                                    None
                                @endif
                            </p>
                        </div>
                    </div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
							<p>Place of Origin:</p>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
							<p style="color:#373A3C;font-weight: 600;">{{ucwords($travel_pass->place_of_origin)}}</p>
						</div>
					</div>
    					<div class="row">
    						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            @if(strcasecmp($travel_pass->type,'pass_through') != 0)
    							<p>Departure Date:</p>
                            @else
                                <p>Date:</p>
                            @endif
    						</div>
    						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
    							<p style="color:#373A3C;font-weight: 600;">{{!empty($travel_pass->departure_date) ? \Carbon\Carbon::parse($travel_pass->departure_date)->format('F d, Y') : '&nbsp;'}}</p>
    						</div>
    					</div>
                    @if(strcasecmp($travel_pass->type,'pass_through') == 0)
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Entry Point:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{ucwords($travel_pass->entry_point)}}</p>
                            </div>
                        </div>
                    @endif
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
							<p>Place of Destination:</p>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
							<p style="color:#373A3C;font-weight: 600;">{{ucwords($travel_pass->place_of_destination)}}</p>
						</div>
					</div>
                    @if(strcasecmp($travel_pass->type,'pass_through') != 0)
    					<div class="row">
    						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
    							<p>Return Date:</p>
    						</div>
    						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
    							<p style="color:#373A3C;font-weight: 600;">{{!empty($travel_pass->return_date) ? \Carbon\Carbon::parse($travel_pass->return_date)->format('F d, Y') : '&nbsp;'}}</p>
    						</div>
    					</div>
                    @else
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Exit Point:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{ucwords($travel_pass->exit_point)}}</p>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <p>Mode of Transport:</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <p style="color:#373A3C;font-weight: 600;">
                                @if(count($current_mode_of_transports) > 0)
                                    @foreach($current_mode_of_transports as $key => $mode_of_transport)
                                        {{!empty($mode_of_transport) ? ucwords($mode_of_transport) : 'None'}}{{(!empty($current_model_types[$key]) && strcasecmp($current_model_types[$key], 'none') != 0) ? '('.ucwords($current_model_types[$key]).')' : '&nbsp;' }}
                                        @if(!empty($current_plate_nos) && strcasecmp($current_plate_nos[$key], 'none') != 0)
                                        / Plate No. {{strtoupper($current_plate_nos[$key])}}
                                        @endif
                                        @if($key != (count($current_mode_of_transports) - 1))
                                            <br>
                                        @endif
                                    @endforeach
                                @else
                                    {{!empty($travel_pass->mode_of_transport) ? ucwords($travel_pass->mode_of_transport) : 'None'}}{{!empty($travel_pass->model_type) ? '('.ucwords($travel_pass->model_type).')' : '&nbsp;' }}
                                    @if(!empty($travel_pass->plate_no))
                                        / Plate No. {{ strtoupper($travel_pass->plate_no) }}
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>
                    @if(strcasecmp($travel_pass->type,'pass_through') == 0)
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Time Entry:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{!empty($travel_pass->entry_point_time) ? \Carbon\Carbon::parse($travel_pass->entry_point_time)->format('h:i A') : '&nbsp;'}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Time Exit:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{!empty($travel_pass->exit_point_time) ? \Carbon\Carbon::parse($travel_pass->exit_point_time)->format('h:i A') : '&nbsp;'}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>ETA:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{ !empty($eta) ? $eta : 'None' }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Given Time Travel:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{ !empty($travel_pass->time_travel) ? $travel_pass->time_travel.' min(s)' : '&nbsp;' }}</p>
                            </div>
                        </div>
                    @endif
                    @if(strcasecmp($travel_pass->type,'pass_through') != 0)
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <p>Purpose of Travel:</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <p style="color:#373A3C;font-weight: 600;">{{!empty($travel_pass->purpose) ? ucwords($travel_pass->purpose) : 'None'}}</p>
                        </div>
                    </div>
                    @endif
                    @if(!empty($travel_pass->remarks) && strcasecmp($travel_pass->type,'pass_through') != 0)
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <p>Remarks:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                <p style="color:#373A3C;font-weight: 600;">{{strtoupper($travel_pass->remarks)}}{{ (!empty($travel_pass->is_issuance) && strcasecmp($travel_pass->is_issuance,'yes') == 0) ? '(Rapid test on next issuance)' : '&nbsp;' }}</p>
                            </div>
                        </div>
                    @endif
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="panel panel-default" style="height: 100%;">
				<div class="panel-body" style="padding: 15px 20px;height:100%;">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h4><strong>Required Attachments</strong></h4>
						</div>
					</div>
					<div class="row row-margin">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
							<p class="attachment-text" style="margin-top:10px;">Government ID:</p>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
							<div class="attachment-button" style="margin-bottom: 10px;">
								@if(!empty($travel_pass_attachments->government_id))
                                    <div class="btn-group" role="group" aria-label="...">
                                        <a href="{{route('travel-passes.show.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'gid'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                        @if(Session::get('is_allow_download_attachment') > 0)
                                            <a href="{{route('travel-passes.download.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'gid'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                            </a>
                                        @endif
                                        @if(Session::get('is_allow_print_attachment') > 0)
                                            <a href="{{route('travel-passes.print.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'gid'])}}" class="btn btn-default btnAttachment" target="_blank"><i class="fa fa-print"></i>
                                            </a>
                                        @endif
                                    </div>
								@else
									<a href="#" class="btn btn-default">&nbsp;Pending&nbsp;</a>
                                    {{-- btn-fixed-width --}}
								@endif
							</div>
						</div>
					</div>
                    @if(!empty($travel_pass) && (strcasecmp($travel_pass->type,'ofw') == 0 || strcasecmp($travel_pass->type,'incoming_visitor') == 0 || strcasecmp($travel_pass->type,'pass_through') == 0))
                        <div class="row row-margin">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <p class="attachment-text" style="margin-top:10px;">Medical Certifcate:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="attachment-button" style="margin-bottom: 10px;">
                                    @if(!empty($travel_pass_attachments->old_medical_certificate))
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="{{route('travel-passes.show.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'omc'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            @if(Session::get('is_allow_download_attachment') > 0)
                                                <a href="{{route('travel-passes.download.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'omc'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                                </a>
                                            @endif
                                            @if(Session::get('is_allow_print_attachment') > 0)
                                                <a href="{{route('travel-passes.print.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'omc'])}}" class="btn btn-default btnAttachment" target="_blank"><i class="fa fa-print"></i>
                                                </a>
                                            @endif
                                        </div>
                                    @else
                                        <a href="#" class="btn btn-default">&nbsp;Pending&nbsp;</a>
                                        {{-- btn-fixed-width --}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(strcasecmp($travel_pass->type,'incoming_visitor') == 0)
                        <div class="row row-margin">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <p class="attachment-text" style="margin-top:10px;">Barangay Certificate:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="attachment-button" style="margin-bottom: 10px;">
                                    @if(!empty($travel_pass_attachments->barangay_certificate))
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="{{route('travel-passes.show.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'bc'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            @if(Session::get('is_allow_download_attachment') > 0)
                                                <a href="{{route('travel-passes.download.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'bc'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                                </a>
                                            @endif
                                            @if(Session::get('is_allow_print_attachment') > 0)
                                                <a href="{{route('travel-passes.print.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'bc'])}}" class="btn btn-default btnAttachment" target="_blank"><i class="fa fa-print"></i>
                                                </a>
                                            @endif
                                        </div>
                                    @else
                                        <a href="#" class="btn btn-default">&nbsp;Pending&nbsp;</a>
                                        {{-- btn-fixed-width --}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(strcasecmp($travel_pass->type,'incoming_visitor') != 0 && strcasecmp($travel_pass->type,'ofw') != 0 && strcasecmp($travel_pass->type,'pass_through') != 0)
    					<div class="row row-margin">
    						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    							<p class="attachment-text" style="margin-top:10px;">BHERT Health Declaration:</p>
    						</div>
    						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    							<div class="attachment-button" style="margin-bottom: 10px;">
    								@if(!empty($travel_pass_attachments->bhert_health_declaration))
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="{{route('travel-passes.show.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'bhd'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            @if(Session::get('is_allow_download_attachment') > 0)
                                                <a href="{{route('travel-passes.download.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'bhd'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                                </a>
                                            @endif
                                            @if(Session::get('is_allow_print_attachment') > 0)
                                                <a href="{{route('travel-passes.print.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'bhd'])}}" class="btn btn-default btnAttachment" target="_blank"><i class="fa fa-print"></i>
                                                </a>
                                            @endif
                                        </div>
    								@else
    									<a href="#" class="btn btn-default">&nbsp;Pending&nbsp;</a>
                                        {{-- btn-fixed-width --}}
    								@endif
    							</div>
    						</div>
    					</div>
                    @endif
					@if(!empty($travel_pass) && (strcasecmp($travel_pass->type,'ofw') == 0))
						<div class="row row-margin">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
								<p class="attachment-text" style="margin-top:10px;">Certificate of Employment:</p>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
								<div class="attachment-button" style="margin-bottom: 10px;">
									@if(!empty($travel_pass_attachments->certificate_of_employment))
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="{{route('travel-passes.show.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'coe'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            @if(Session::get('is_allow_download_attachment') > 0)
                                                <a href="{{route('travel-passes.download.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'coe'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                                </a>
                                            @endif
                                            @if(Session::get('is_allow_print_attachment') > 0)
                                                <a href="{{route('travel-passes.print.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'coe'])}}" class="btn btn-default btnAttachment" target="_blank"><i class="fa fa-print"></i>
                                                </a>
                                            @endif
                                        </div>
									@else
										<a href="#" class="btn btn-default">&nbsp;Pending&nbsp;</a>
                                        {{-- btn-fixed-width --}}
									@endif
								</div>
							</div>
						</div>
					@endif
                    @if(strcasecmp($travel_pass->type,'frequent_traveller') == 0)
                        <div class="row row-margin">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <p class="attachment-text" style="margin-top:10px;">Rapid Test Result:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="attachment-button" style="margin-bottom: 10px;">
                                    @if(!empty($travel_pass_attachments->rapid_test_result))
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="{{route('travel-passes.show.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'rtr'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                            @if(Session::get('is_allow_download_attachment') > 0)
                                                <a href="{{route('travel-passes.download.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'rtr'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                                </a>
                                            @endif
                                            @if(Session::get('is_allow_print_attachment') > 0)
                                                <a href="{{route('travel-passes.print.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'rtr'])}}" class="btn btn-default btnAttachment" target="_blank"><i class="fa fa-print"></i>
                                                </a>
                                            @endif
                                        </div>
                                    @else
                                        <a href="#" class="btn btn-default">&nbsp;Pending&nbsp;</a>
                                        {{-- btn-fixed-width --}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(strcasecmp($travel_pass->type,'incoming_visitor') != 0 && strcasecmp($travel_pass->type,'ofw') != 0 && strcasecmp($travel_pass->type,'pass_through') != 0)
                        @if((strcasecmp($travel_pass->type,'resident') == 0 || strcasecmp($travel_pass->type,'frequent_traveller') == 0) && (!empty($travel_pass_attachments->medical_certificate_issued_by_city_health_office)))
                            <div class="row row-margin">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <p class="attachment-text" style="margin-top:10px;">Medical Certificate Issued By City Health Office:</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <div class="attachment-button" style="margin-bottom: 10px;">
                                        @if(!empty($travel_pass_attachments->medical_certificate_issued_by_city_health_office))
                                            <div class="btn-group" role="group" aria-label="...">
                                                <a href="{{route('travel-passes.show.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'mccho'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                                @if(Session::get('is_allow_download_attachment') > 0)
                                                    <a href="{{route('travel-passes.download.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'mccho'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                                    </a>
                                                @endif
                                                @if(Session::get('is_allow_print_attachment') > 0)
                                                    <a href="{{route('travel-passes.print.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'mccho'])}}" class="btn btn-default btnAttachment" target="_blank"><i class="fa fa-print"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        @else
                                            <a href="#" class="btn btn-default">&nbsp;Pending&nbsp;</a>
                                            {{-- btn-fixed-width --}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if((strcasecmp($travel_pass->type,'resident') == 0) && (!empty($travel_pass_attachments->medical_certificate_issued_by_city_health_office)) && (!empty($travel_pass_attachments->is_valid_medical_certificate_issued_by_city_health_office) && strcasecmp($travel_pass_attachments->is_valid_medical_certificate_issued_by_city_health_office,'no') == 0))
                                <div class="row row-margin">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                        <p class="attachment-text" style="margin-top:10px;">Medical Certificate:</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                        <div class="attachment-button" style="margin-bottom: 10px;">
                                            @if(!empty($travel_pass_attachments->new_medical_certificate))
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <a href="{{route('travel-passes.show.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'nmc'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                                    @if(Session::get('is_allow_download_attachment') > 0)
                                                        <a href="{{route('travel-passes.download.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'nmc'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                                        </a>
                                                    @endif
                                                    @if(Session::get('is_allow_print_attachment') > 0)
                                                        <a href="{{route('travel-passes.print.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'nmc'])}}" class="btn btn-default btnAttachment" target="_blank"><i class="fa fa-print"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            @else
                                                <a href="#" class="btn btn-default">&nbsp;Pending&nbsp;</a>
                                                {{-- btn-fixed-width --}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
        					<div class="row row-margin">
        						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        							<p class="attachment-text" style="margin-top:10px;">Medical Certificate:</p>
        						</div>
        						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
        							<div class="attachment-button" style="margin-bottom: 10px;">
        								@if(!empty($travel_pass_attachments->new_medical_certificate))
                                            <div class="btn-group" role="group" aria-label="...">
                                                <a href="{{route('travel-passes.show.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'nmc'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                                @if(Session::get('is_allow_download_attachment') > 0)
                                                    <a href="{{route('travel-passes.download.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'nmc'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                                    </a>
                                                @endif
                                                @if(Session::get('is_allow_print_attachment') > 0)
                                                    <a href="{{route('travel-passes.print.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'nmc'])}}" class="btn btn-default btnAttachment" target="_blank"><i class="fa fa-print"></i>
                                                    </a>
                                                @endif
                                            </div>
        								@else
        									<a href="#" class="btn btn-default">&nbsp;Pending&nbsp;</a>
                                            {{-- btn-fixed-width --}}
        								@endif
        							</div>
        						</div>
        					</div>
                        @endif
                    @endif
                    @if(strcasecmp($travel_pass->type,'pass_through') != 0)
    					<div class="row row-margin">
    						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    							<p class="attachment-text" style="margin-top:10px;">Travel Pass:</p>
    						</div>
    						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    							<div class="attachment-button" style="margin-bottom: 10px;">
    								@if(!empty($travel_pass->status) && strcasecmp($travel_pass->status,'released') == 0)
                                        <div class="btn-group" role="group" aria-label="...">
                                                <a href="{{route('travel-passes.show.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'tpd'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                                @if(Session::get('is_allow_download_attachment') > 0)
                                                    <a href="{{route('travel-passes.download.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'tpd'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                                    </a>
                                                @endif
                                                @if(Session::get('is_allow_print_attachment') > 0)
                                                    <a href="{{route('travel-passes.print.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'tpd'])}}" class="btn btn-default btnAttachment" target="_blank"><i class="fa fa-print"></i>
                                                    </a>
                                                @endif
                                            </div>
    								@else
    									<a href="#" class="btn btn-default">&nbsp;Pending&nbsp;</a>
                                        {{-- btn-fixed-width --}}
    								@endif
    							</div>
    						</div>
    					</div>
    					<div class="row row-margin">
    						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    							<p class="attachment-text" style="margin-top:10px;">QR CODE:</p>
    						</div>
    						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    							<div class="attachment-button" style="margin-bottom: 10px;">
    								@if(!empty($travel_pass->status) && strcasecmp($travel_pass->status,'released') == 0)
                                        <div class="btn-group" role="group" aria-label="...">
                                                <a href="{{route('travel-passes.show.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'qrc'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                                @if(Session::get('is_allow_download_attachment') > 0)
                                                    <a href="{{route('travel-passes.download.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'qrc'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                                    </a>
                                                @endif
                                                @if(Session::get('is_allow_print_attachment') > 0)
                                                    <a href="{{route('travel-passes.print.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'qrc'])}}" class="btn btn-default btnAttachment" target="_blank"><i class="fa fa-print"></i>
                                                    </a>
                                                @endif
                                            </div>
    								@else
    									<a href="#" class="btn btn-default">&nbsp;Pending&nbsp;</a>
                                        {{-- btn-fixed-width --}}
    								@endif
    							</div>
    						</div>
    					</div>
                    @else
                        <div class="row row-margin">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <p class="attachment-text" style="margin-top:10px;">Travel Pass/Travel Authority:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="attachment-button" style="margin-bottom: 10px;">
                                    @if(!empty($travel_pass_attachments->travel_pass_or_travel_authority))
                                        <div class="btn-group" role="group" aria-label="...">
                                                <a href="{{route('travel-passes.show.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'tpta'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                                @if(Session::get('is_allow_download_attachment') > 0)
                                                    <a href="{{route('travel-passes.download.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'tpta'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                                    </a>
                                                @endif
                                                @if(Session::get('is_allow_print_attachment') > 0)
                                                    <a href="{{route('travel-passes.print.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'tpta'])}}" class="btn btn-default btnAttachment" target="_blank"><i class="fa fa-print"></i>
                                                    </a>
                                                @endif
                                            </div>
                                    @else
                                        <a href="#" class="btn btn-default">&nbsp;Pending&nbsp;</a>
                                        {{-- btn-fixed-width --}}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row row-margin">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <p class="attachment-text" style="margin-top:10px;">QR CODE:</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="attachment-button" style="margin-bottom: 10px;">
                                    @if(!empty($travel_pass->status) && strcasecmp($travel_pass->status,'released') == 0)
                                        <div class="btn-group" role="group" aria-label="...">
                                                <a href="{{route('travel-passes.show.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'qrc'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                                @if(Session::get('is_allow_download_attachment') > 0)
                                                    <a href="{{route('travel-passes.download.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'qrc'])}}" class="btn btn-default btnAttachment" target="_blank"><span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                                    </a>
                                                @endif
                                                @if(Session::get('is_allow_print_attachment') > 0)
                                                    <a href="{{route('travel-passes.print.attachment',['id' => $travel_pass->id,'tracking_no' => $travel_pass->tracking_no,'attachment'=>'qrc'])}}" class="btn btn-default btnAttachment" target="_blank"><i class="fa fa-print"></i>
                                                    </a>
                                                @endif
                                            </div>
                                    @else
                                        <a href="#" class="btn btn-default">&nbsp;Pending&nbsp;</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
				</div>
			</div>
		</div>
	</div>
	<div class="row equal last-row">
        @if(strcasecmp($travel_pass->type,'pass_through') == 0)
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-default" style="height: 100%;">
                    <div class="panel-body" style="padding: 15px 20px;height:100%;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h5><strong>Passenger(s)</strong></h5>
                            </div>
                        </div>
                        @foreach($passengers as $passenger)
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <p class="attachment-text" style="margin-top:10px;">{{ ucwords($passenger->first_name.' '.$passenger->last_name) }} </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <div class="attachment-button" style="margin-bottom: 10px;">
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="{{ route('travel-passes.passenger.show.attachment',['id' => $travel_pass->id,'passenger_id'=>$passenger->id,'attachment' => 'gid','tracking_no' => $travel_pass->tracking_no]) }}" class="btn btn-default btnAttachment" target="_blank" title="Government ID">
                                                <i class="fas fa-id-card" aria-hidden="true" ></i>
                                            </a>
                                            <a href="{{ route('travel-passes.passenger.show.attachment',['id' => $travel_pass->id,'passenger_id'=>$passenger->id,'attachment' => 'omc','tracking_no' => $travel_pass->tracking_no]) }}" class="btn btn-default btnAttachment" target="_blank" title="Medical Certificate">
                                                <i class="fas fa-file-medical" aria-hidden="true" ></i>
                                            </a>
                                            <a href="{{ route('travel-passes.passenger.show.attachment',['id' => $travel_pass->id,'passenger_id'=>$passenger->id,'attachment' => 'tpta','tracking_no' => $travel_pass->tracking_no]) }}" class="btn btn-default btnAttachment" target="_blank" title="Travel Pass/Travel Authority">
                                                <i class="fas fa-file" aria-hidden="true" ></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
		<div class="@if(strcasecmp($travel_pass->type,'pass_through') == 0) col-xs-12 col-sm-12 col-md-8 col-lg-8 @else col-xs-12 col-sm-12 col-md-12 col-lg-12 @endif">
			<div class="panel panel-default" @if(strcasecmp($travel_pass->type,'pass_through') == 0) style="height:100%;" @endif>
				<div class="panel-heading">
					<h4 class="panel-title">
						<strong>Travel Pass Transactions</strong>
					</h4>
				</div>
				<table class="table table-custom">
					<thead>
						<tr>
							<th width="20%">Date</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						@forelse($travel_pass_transactions as $key => $transaction)
							<tr>
								<td style="vertical-align: middle;">
									<p style="margin-bottom: unset;">{{\Carbon\Carbon::parse($transaction->created_at)->format('F d, Y')}}</p>
									<p>{{\Carbon\Carbon::parse($transaction->created_at)->format('h:i A')}}</p>
								</td>
								<td style="vertical-align: middle;">
									<p style="margin-bottom: 0px;">
										{{ucwords($transaction->description)}}
									</p>
                                    <p style="font-size:0.9em;">
                                        @if(!empty($transaction->admin))
                                            @if(!empty($transaction->admin->middle_name))
                                                {{ ucwords($transaction->admin->first_name).' '.ucwords(substr($transaction->admin->middle_name,0,1).'.').' '.ucwords($transaction->admin->last_name)}}
                                            @else
                                                {{ ucwords($transaction->admin->first_name).' '.ucwords($transaction->admin->last_name)}}
                                            @endif
                                        @else
                                            &nbsp;
                                        @endif
                                    </p>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="2">No available data in table.</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="confirmationResendAttachmentsSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
                {{ Form::open(array('route' => ['travel-passes.resend.attachments'],'method' => 'POST','files' => true,'class'=>'travelPassForm')) }}
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Resend Attachments</h4>
                            </div>
                            <div class="modal-body">
                                {{Form::hidden('travel_pass_id',null)}}
                                <div class="form-group {{ $errors->first('email_address') ? 'has-error' : '' }}">
                                    <label class="control-label">Email Address</label>
                                    {{Form::email('email_address',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Email Address','formnovalidate'=>'formnovalidate'])}}
                                    @if($errors->first('email_address'))
                                        <p class="help-block text-danger">{{$errors->first('email_address')}}</p>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->first('email_address_confirmation') ? 'has-error' : '' }}">
                                    <label class="control-label">Confirm Email</label>
                                    {{Form::email('email_address_confirmation',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Email Address','formnovalidate'=>'formnovalidate'])}}
                                    @if($errors->first('email_address_confirmation'))
                                        <p class="help-block text-danger">{{$errors->first('email_address_confirmation')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary btnSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
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
								Are you sure you want to <strong>delete</strong> travel pass #<strong class="travelPassFullName"></strong>? 
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
							<a href="#" id="btnDeleteTravelPass" class="btn btn-danger">Yes</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="confirmationApproveProcessingPassThroughSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
                {{ Form::open(array('route' => ['travel-passes.approve.processing.pass.through'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Time Travel</h4>
                            </div>
                            <div class="modal-body">
                                {{Form::hidden('travel_pass_id',null)}}
                                <div class="form-group {{!empty($errors->first('time_travel')) ? 'has-error' : ''}}">
                                    <label>Minutes</label>
                                    {{Form::select('time_travel',['15' => '15 mins','30' => '30 mins'],NULL,['class'=>'form-control'])}}
                                    @if($errors->first('time_travel'))
                                        <p class="help-block text-danger">{{$errors->first('time_travel')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success btnSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="confirmationApproveProcessingSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
				{{ Form::open(array('route' => ['travel-passes.approve.processing'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Confirmation</h4>
							</div>
							<div class="modal-body">
								{{Form::hidden('travel_pass_id',null)}}
								<p>
									Are you sure you want to <strong>approve</strong> this travel pass application #<strong class="userFullName"></strong>?
								</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary btnSubmit">Yes</button>
							</div>
						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="confirmationApproveVerificationSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
                {{ Form::open(array('route' => ['travel-passes.approve.verification'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Pending For Verification</h4>
                            </div>
                            <div class="modal-body">
                                {{Form::hidden('travel_pass_id',null)}}
                                <div class="form-group {{!empty($errors->first('reason')) ? 'has-error' : ''}}">
                                    <label>Reason</label>
                                    {{Form::text('reason',null,['class'=>'form-control'])}}
                                    @if($errors->first('reason'))
                                        <p class="help-block text-danger">{{$errors->first('reason')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary btnSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="confirmationApproveProcessingWithMedCertSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
                {{ Form::open(array('route' => ['travel-passes.approve.processing.with.med.cert'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Confirmation</h4>
                            </div>
                            <div class="modal-body">
                                {{Form::hidden('travel_pass_id',null)}}
                                {{ Form::hidden('validity','yes') }}
                                <p>
                                    Are you sure you want to <strong>approve</strong> this travel pass application #<strong class="userFullName"></strong>?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary btnSubmit">Yes</button>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="confirmationApproveProcessingWithInvalidMedCertSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
                {{ Form::open(array('route' => ['travel-passes.approve.processing.with.med.cert'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Confirmation</h4>
                            </div>
                            <div class="modal-body">
                                {{Form::hidden('travel_pass_id',null)}}
                                {{ Form::hidden('validity','no') }}
                                <p>
                                    Are you sure you want to <strong>approve</strong> this travel pass application #<strong class="userFullName"></strong> with <strong>invalid</strong> medical certificate?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary btnSubmit">Yes</button>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="confirmationRejectProcessingSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
				{{ Form::open(array('route' => ['travel-passes.reject.processing'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Confirmation</h4>
							</div>
							<div class="modal-body">
								{{Form::hidden('travel_pass_id',null)}}
								<p>
									Are you sure you want to <strong>reject</strong> this travel pass application #<strong class="userFullName"></strong>?
								</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary btnSubmit">Yes</button>
							</div>
						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="confirmationDoneMedicalAssessmentSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
				{{ Form::open(array('route' => ['travel-passes.done.medical.assessment'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Confirmation</h4>
							</div>
							<div class="modal-body">
								{{Form::hidden('travel_pass_id',null)}}
                                <div class="form-group {{!empty($errors->first('age')) ? 'has-error' : ''}}">
                                    <label>Age</label>
                                    {{Form::number('age',null,['class'=>'form-control','required'=>true,'max'=>'999'])}}
                                    @if($errors->first('age'))
                                        <p class="help-block text-danger">{{$errors->first('age')}}</p>
                                    @endif
                                </div>
								{{-- <p>
									Are you sure you want this travel pass application #<strong class="userFullName"></strong> to set as done with the medical assessment?
								</p> --}}
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary btnSubmit">Yes</button>
							</div>
						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="confirmationCancelMedicalAssessmentSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
				{{ Form::open(array('route' => ['travel-passes.cancel.medical.assessment'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Confirmation</h4>
							</div>
							<div class="modal-body">
								{{Form::hidden('travel_pass_id',null)}}
								<p>
									Are you sure you want to <strong>cancel</strong> this travel pass application #<strong class="userFullName"></strong>?
								</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary btnSubmit">Yes</button>
							</div>
						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="confirmationPaidPaymentSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
				{{ Form::open(array('route' => ['travel-passes.paid.payment'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Payment</h4>
							</div>
							<div class="modal-body">
								{{Form::hidden('travel_pass_id',null)}}
								<div class="form-group {{!empty($errors->first('or_no')) ? 'has-error' : ''}}">
									<label>OR No.</label>
									{{Form::text('or_no',null,['class'=>'form-control','required'=>true])}}
									@if($errors->first('or_no'))
                                        <p class="help-block text-danger">{{$errors->first('or_no')}}</p>
                                    @endif
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary btnSubmit">Yes</button>
							</div>
						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="confirmationCancelPaymentSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
				{{ Form::open(array('route' => ['travel-passes.cancel.payment'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Confirmation</h4>
							</div>
							<div class="modal-body">
								{{Form::hidden('travel_pass_id',null)}}
								<p>
									Are you sure you want to <strong>cancel</strong> this travel pass application #<strong class="userFullName"></strong>?
								</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary btnSubmit">Yes</button>
							</div>
						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="confirmationReleaseMedicalCertificateSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
                {{ Form::open(array('route' => ['travel-passes.release.medical.certificate'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Release Medical Certificate</h4>
                            </div>
                            <div class="modal-body">
                                {{Form::hidden('travel_pass_id',null)}}
                                <div class="form-group {{!empty($errors->first('valid_until')) ? 'has-error' : ''}}">
                                    <label>Valid Until</label>
                                    {{Form::select('valid_until',['7' => '7 days','14' => '14 days'],NULL,['class'=>'form-control','required'])}}
                                    @if($errors->first('valid_until'))
                                        <p class="help-block text-danger">{{$errors->first('valid_until')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary btnSubmit">Yes</button>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="confirmationUploadMedicalCertificateSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
				{{ Form::open(array('route' => ['travel-passes.upload.medical.certificate'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Upload File</h4>
							</div>
							<div class="modal-body">
								<button type="reset" class="hidden btnResetUpload">Reset</button>
								{{Form::hidden('travel_pass_id',null)}}
								<div class="form-group {{!empty($errors->first('medical_certificate')) ? 'has-error' : ''}}">
									<label>Medical Certificate</label>
									{{Form::file('medical_certificate',['class'=>'form-control','required'])}}
									@if($errors->first('medical_certificate'))
                                        <p class="help-block text-danger">{{$errors->first('medical_certificate')}}</p>
                                    @endif
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary btnSubmit">Yes</button>
							</div>
						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="confirmationCancelMedicalCertificateSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
				{{ Form::open(array('route' => ['travel-passes.cancel.medical.certificate'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Confirmation</h4>
							</div>
							<div class="modal-body">
								{{Form::hidden('travel_pass_id',null)}}
								<p>
									Are you sure you want to <strong>cancel</strong> this travel pass application #<strong class="userFullName"></strong>?
								</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary btnSubmit">Yes</button>
							</div>
						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="confirmationApproveReleaseTravelPassSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
				{{ Form::open(array('route' => ['travel-passes.approve.release.travel.pass'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Confirmation</h4>
							</div>
							<div class="modal-body">
								{{Form::hidden('travel_pass_id',null)}}
                                {{-- @if(strcasecmp($travel_pass->type,'resident') == 0) --}}
                                    <div class="form-group">
                                        <label class="control-label">Remarks</label>
                                        <select name="remarks" required class="form-control">
                                            <option value="REPORT TO BHERT">REPORT TO BHERT</option>
                                            <option value="FACILITY QUARANTINE">FACILITY QUARANTINE</option>
                                            <option value="HOME QUARANTINE">HOME QUARANTINE</option>
                                            <option value="WITH RAPID TEST">WITH RAPID TEST</option>
                                            <option value="WITH SWAB TEST">WITH SWAB TEST</option>
                                        </select>
                                    </div>
                                    <div class="checkbox {{ $errors->first('is_issuance') ? 'has-error' : '' }}" style="margin-bottom: 30px;">
                                        <label class="checkbox-label" style="margin-left: 0">
                                            <input type="checkbox" name="is_issuance" value="yes" class="big-checkbox">
                                            <span class="checkbox-custom rectangular"></span>
                                            &nbsp;Rapid test on next issuance
                                        </label>
                                    </div>
                                {{-- @else
                                    <p>
                                        Are you sure you want to release travel pass application #<strong class="userFullName"></strong>?
                                    </p>
                                @endif --}}
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                {{-- @if(strcasecmp($travel_pass->type,'resident') == 0) --}}
								    <button type="submit" class="btn btn-primary btnSubmit">Submit</button>
                                {{-- @else
                                    <button type="submit" class="btn btn-primary btnSubmit">Yes</button>
                                @endif --}}
							</div>
						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="confirmationApproveReleasePassThroughTravelPassSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
                {{ Form::open(array('route' => ['travel-passes.approve.release.travel.pass'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Confirmation</h4>
                            </div>
                            <div class="modal-body">
                                {{Form::hidden('travel_pass_id',null)}}
                                <p>
                                    Are you sure you want to <strong>release</strong> travel pass application #<strong class="userFullName"></strong>?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary btnSubmit">Yes</button>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="confirmationCancelReleaseTravelPassSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
				{{ Form::open(array('route' => ['travel-passes.cancel.release.travel.pass'],'method' => 'PUT','files' => true,'class'=>'travelPassForm')) }}
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Confirmation</h4>
							</div>
							<div class="modal-body">
								{{Form::hidden('travel_pass_id',null)}}
								<p>
									Are you sure you want to <strong>cancel</strong> this travel pass application #<strong class="userFullName"></strong>?
								</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary btnSubmit">Yes</button>
							</div>
						</div>
					</div>
				{{ Form::close() }}
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
		@if(Session::has('flash_error'))
			Swal.fire(
			  'Error',
			  '{{Session::get('flash_error')}}',
			  'error'
			)
		@endif
		@if($errors->any())
			Swal.fire(
			  'There is an error.',
			  'Please check all of your input.',
			  'error'
			)
		@endif
        $('#confirmationResendAttachmentsSection').on("change",'input[name="email_address"]', function(event) { 
                if($('input[name="email_address_confirmation"]').val())
                {
                    if($(this).val() !== $('input[name="email_address_confirmation"]').val())
                    {
                        if($(this).parent().hasClass('has-error'))
                        {

                        }
                        else
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length)
                        {
                            $(this).siblings('.help-block').html('The email address confirmation does not match.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The email address confirmation does not match.</p>');
                        }
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        else
                        {

                        }
                        if($(this).siblings('.help-block').length)
                        {
                            $(this).siblings('.help-block').remove();
                        }
                    }
                }
                else
                {
                    if($(this).parent().hasClass('has-error'))
                    {
                        $(this).parent().removeClass('has-error');
                    }
                    else
                    {

                    }
                    if($(this).siblings('.help-block').length)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $('#confirmationResendAttachmentsSection').on("change",'input[name="email_address_confirmation"]', function(event){
                    if($(this).val() !== $('input[name="email_address"]').val())
                    {
                        if($('input[name="email_address"]').parent().hasClass('has-error'))
                        {

                        }
                        else
                        {
                            $('input[name="email_address"]').parent().addClass('has-error');
                        }
                        if($('input[name="email_address"]').siblings('.help-block').length)
                        {
                            $('input[name="email_address"]').siblings('.help-block').html('The email address confirmation does not match.')
                        }
                        else
                        {
                            $('input[name="email_address"]').parent().append('<p class="help-block text-danger">The email address confirmation does not match.</p>');
                        }
                    }
                    else
                    {
                        if($('input[name="email_address"]').parent().hasClass('has-error'))
                        {
                            $('input[name="email_address"]').parent().removeClass('has-error');
                        }
                        else
                        {

                        }
                        if($('input[name="email_address"]').siblings('.help-block').length)
                        {
                            $('input[name="email_address"]').siblings('.help-block').remove();
                        }
                    }
            });
		$('.travelPassForm').on('click','.btnSubmit',function(){
			$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
			$(this).attr('disabled',true);
			$(this).siblings('.btn').attr('disabled',true);
			$(this).parents('form').submit();
		});
		$('.btnDeleteTravelPass').click(function(){
			$('.travelPassFullName').html($(this).data('name'));
			$('#btnDeleteTravelPass').attr('href','/travel-passes/' + $(this).attr('id') + '/delete');
		});
		$('#btnDeleteTravelPass').click(function(){
			$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
			$(this).attr('disabled',true);
		});
        $('#confirmationResendAttachmentsSection').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var travelPassId = button.data('id');
            var trackingNo = button.data('name');
            var modal = $(this);
            modal.find('.modal-body .userFullName').html(trackingNo);
            modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
        });
        $('#confirmationResendAttachmentsSection').on('hidden.bs.modal', function (event) {
            var modal = $(this);
            modal.find('.modal-body .userFullName').html('');
            modal.find('.modal-body input[name="travel_pass_id"]').val('');
        });
		$('#confirmationApproveProcessingSection').on('show.bs.modal', function (event) {
		  	var button = $(event.relatedTarget);
			var travelPassId = button.data('id');
			var trackingNo = button.data('name');
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html(trackingNo);
		  	modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
		});
		$('#confirmationApproveProcessingSection').on('hidden.bs.modal', function (event) {
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html('');
		  	modal.find('.modal-body input[name="travel_pass_id"]').val('');
		});
        $('#confirmationApproveProcessingPassThroughSection').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var travelPassId = button.data('id');
            var trackingNo = button.data('name');
            var modal = $(this);
            modal.find('.modal-body .userFullName').html(trackingNo);
            modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
        });
        $('#confirmationApproveProcessingPassThroughSection').on('hidden.bs.modal', function (event) {
            var modal = $(this);
            modal.find('.modal-body .userFullName').html('');
            modal.find('.modal-body input[name="travel_pass_id"]').val('');
        });
        $('#confirmationApproveProcessingWithMedCertSection').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var travelPassId = button.data('id');
            var trackingNo = button.data('name');
            var modal = $(this);
            modal.find('.modal-body .userFullName').html(trackingNo);
            modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
        });
        $('#confirmationApproveProcessingWithMedCertSection').on('hidden.bs.modal', function (event) {
            var modal = $(this);
            modal.find('.modal-body .userFullName').html('');
            modal.find('.modal-body input[name="travel_pass_id"]').val('');
        });
        $('#confirmationApproveProcessingWithInvalidMedCertSection').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var travelPassId = button.data('id');
            var trackingNo = button.data('name');
            var modal = $(this);
            modal.find('.modal-body .userFullName').html(trackingNo);
            modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
        });
        $('#confirmationApproveProcessingWithInvalidMedCertSection').on('hidden.bs.modal', function (event) {
            var modal = $(this);
            modal.find('.modal-body .userFullName').html('');
            modal.find('.modal-body input[name="travel_pass_id"]').val('');
        });
        $('#confirmationApproveVerificationSection').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var travelPassId = button.data('id');
            var trackingNo = button.data('name');
            var modal = $(this);
            modal.find('.modal-body .userFullName').html(trackingNo);
            modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
        });
        $('#confirmationApproveVerificationSection').on('hidden.bs.modal', function (event) {
            var modal = $(this);
            modal.find('.modal-body .userFullName').html('');
            modal.find('.modal-body input[name="travel_pass_id"]').val('');
        });
		$('#confirmationRejectProcessingSection').on('show.bs.modal', function (event) {
		  	var button = $(event.relatedTarget);
			var travelPassId = button.data('id');
			var trackingNo = button.data('name');
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html(trackingNo);
		  	modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
		});
		$('#confirmationRejectProcessingSection').on('hidden.bs.modal', function (event) {
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html('');
		  	modal.find('.modal-body input[name="travel_pass_id"]').val('');
		});
		$('#confirmationDoneMedicalAssessmentSection').on('show.bs.modal', function (event) {
		  	var button = $(event.relatedTarget);
			var travelPassId = button.data('id');
			var trackingNo = button.data('name');
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html(trackingNo);
		  	modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
		});
		$('#confirmationDoneMedicalAssessmentSection').on('hidden.bs.modal', function (event) {
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html('');
		  	modal.find('.modal-body input[name="travel_pass_id"]').val('');
		});
		$('#confirmationCancelMedicalAssessmentSection').on('show.bs.modal', function (event) {
		  	var button = $(event.relatedTarget);
			var travelPassId = button.data('id');
			var trackingNo = button.data('name');
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html(trackingNo);
		  	modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
		});
		$('#confirmationCancelMedicalAssessmentSection').on('hidden.bs.modal', function (event) {
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html('');
		  	modal.find('.modal-body input[name="travel_pass_id"]').val('');
		});
		$('#confirmationPaidPaymentSection').on('show.bs.modal', function (event) {
		  	var button = $(event.relatedTarget);
			var travelPassId = button.data('id');
			var trackingNo = button.data('name');
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html(trackingNo);
		  	modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
		});
		$('#confirmationPaidPaymentSection').on('hidden.bs.modal', function (event) {
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html('');
		  	modal.find('.modal-body input[name="travel_pass_id"]').val('');
		  	modal.find('.modal-body input[name="or_no"]').val('');
		});
		$('#confirmationCancelPaymentSection').on('show.bs.modal', function (event) {
		  	var button = $(event.relatedTarget);
			var travelPassId = button.data('id');
			var trackingNo = button.data('name');
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html(trackingNo);
		  	modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
		});
		$('#confirmationCancelPaymentSection').on('hidden.bs.modal', function (event) {
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html('');
		  	modal.find('.modal-body input[name="travel_pass_id"]').val('');
		});
		$('#confirmationUploadMedicalCertificateSection').on('show.bs.modal', function (event) {
		  	var button = $(event.relatedTarget);
			var travelPassId = button.data('id');
			var trackingNo = button.data('name');
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html(trackingNo);
		  	modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
		});
		$('#confirmationUploadMedicalCertificateSection').on('hidden.bs.modal', function (event) {
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html('');
		  	modal.find('.modal-body input[name="travel_pass_id"]').val('');
		  	modal.find('.modal-body input[name="or_no"]').val('');
		  	modal.find('.modal-body .btnResetUpload').click();
		});
        $('#confirmationReleaseMedicalCertificateSection').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var travelPassId = button.data('id');
            var trackingNo = button.data('name');
            var modal = $(this);
            modal.find('.modal-body .userFullName').html(trackingNo);
            modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
        });
        $('#confirmationReleaseMedicalCertificateSection').on('hidden.bs.modal', function (event) {
            var modal = $(this);
            modal.find('.modal-body .userFullName').html('');
            modal.find('.modal-body input[name="travel_pass_id"]').val('');
        });
		$('#confirmationCancelMedicalCertificateSection').on('show.bs.modal', function (event) {
		  	var button = $(event.relatedTarget);
			var travelPassId = button.data('id');
			var trackingNo = button.data('name');
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html(trackingNo);
		  	modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
		});
		$('#confirmationCancelMedicalCertificateSection').on('hidden.bs.modal', function (event) {
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html('');
		  	modal.find('.modal-body input[name="travel_pass_id"]').val('');
		});
		$('#confirmationApproveReleaseTravelPassSection').on('show.bs.modal', function (event) {
		  	var button = $(event.relatedTarget);
			var travelPassId = button.data('id');
			var trackingNo = button.data('name');
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html(trackingNo);
		  	modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
		});
		$('#confirmationApproveReleaseTravelPassSection').on('hidden.bs.modal', function (event) {
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html('');
		  	modal.find('.modal-body input[name="travel_pass_id"]').val('');
		});
		$('#confirmationCancelReleaseTravelPassSection').on('show.bs.modal', function (event) {
		  	var button = $(event.relatedTarget);
			var travelPassId = button.data('id');
			var trackingNo = button.data('name');
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html(trackingNo);
		  	modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
		});
		$('#confirmationCancelReleaseTravelPassSection').on('hidden.bs.modal', function (event) {
		  	var modal = $(this);
		  	modal.find('.modal-body .userFullName').html('');
		  	modal.find('.modal-body input[name="travel_pass_id"]').val('');
		});
        $('#confirmationApproveReleasePassThroughTravelPassSection').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var travelPassId = button.data('id');
            var trackingNo = button.data('name');
            var modal = $(this);
            modal.find('.modal-body .userFullName').html(trackingNo);
            modal.find('.modal-body input[name="travel_pass_id"]').val(travelPassId);
        });
        $('#confirmationApproveReleasePassThroughTravelPassSection').on('hidden.bs.modal', function (event) {
            var modal = $(this);
            modal.find('.modal-body .userFullName').html('');
            modal.find('.modal-body input[name="travel_pass_id"]').val('');
        });
	});
</script>
@stop