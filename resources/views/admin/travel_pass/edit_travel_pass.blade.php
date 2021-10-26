@extends('layout.app')
@section('title', 'Edit Travel Pass')
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
    .btnDelete
    {
        padding-bottom: 6px;padding-top:6px;padding-right: 0;padding-left: 0;
    }
    .btnDeletePassenger
    {
        /*padding-bottom: 3px;padding-top:3px;padding-right: 2px;padding-left: 2px;*/
        color:#d9534f;
        opacity: 0.8;
        cursor: pointer;
    }
    .btnDeletePassenger:active,.btnDeletePassenger:focus,.btnDeletePassenger:hover
    {
        opacity: 1;
    }
    .passenger-header
    {
        margin-top:0px;
    }
</style>
@stop
@section('content')
    @php
        $passengerAttachmentsCtr = 0;
        if(count(old('passenger_government_id')) > 0)
        {
            foreach(old('passenger_government_id') as $key => $government_id)
            {
                if($errors->has('passenger_government_id.'.$key) && (strcasecmp($errors->first('passenger_government_id.'.$key),'The government id may not be greater than 2000 kilobytes.') == 0)) $passengerAttachmentsCtr++;
            }
        }
        if(count(old('passenger_medical_certificate')) > 0)
        {
            foreach(old('passenger_medical_certificate') as $key => $medical_certificate)
            {
                if($errors->has('passenger_medical_certificate.'.$key) && (strcasecmp($errors->first('passenger_medical_certificate.'.$key),'The medical certificate may not be greater than 2000 kilobytes.') == 0)) $passengerAttachmentsCtr++;
            }
        }
        if(count(old('passenger_travel_pass_or_travel_authority')) > 0)
        {
            foreach(old('passenger_travel_pass_or_travel_authority') as $key => $travel_pass_or_travel_authority)
            {
                if($errors->has('passenger_travel_pass_or_travel_authority.'.$key) && (strcasecmp($errors->first('passenger_travel_pass_or_travel_authority.'.$key),'The travel pass or travel authority may not be greater than 2000 kilobytes.') == 0)) $passengerAttachmentsCtr++;
            }
        }
    @endphp
<div class="container-fluid">
	<div class="row" style="margin-top:30px;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">				
				<h2>Edit Tracking # {{$travel_pass->tracking_no}}</h2> <small></small>
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
                                    <div class="btn-group btnActionHeader">
        								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        									Action <span class="caret"></span>
        								</button>
        								<ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a href="#" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Update" data-toggle="modal" data-target="#confirmationUpdateSection"><i class="fas fa-check-circle" aria-hidden="true"></i>&nbsp;Submit</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('travel-passes.show',$travel_pass->id) }}" data-id="{{$travel_pass->id}}" data-name="{{ $travel_pass->tracking_no }}" title="Cancel"><i class="fas fa-times-circle" aria-hidden="true"></i>&nbsp;Cancel</a>
                                            </li>
        								</ul>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="row equal">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {{ Form::open(array('route' => ['travel-passes.update','id' => $travel_pass->id],'files' => true,'id'=>'travelPassForm','class'=>'travelPassForm','method' => 'PUT')) }}
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
            						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <label class="control-label">Last Name</label>
            							<div class="form-group {{ $errors->first('last_name') ? 'has-error' : '' }}">
                                            {{Form::text('last_name',(!empty(old('last_name')) ? old('last_name') : $travel_pass->last_name),['class'=>'form-control  validate[required]','placeholder' => 'Last Name'])}}
                                            @if($errors->first('last_name'))
                                                <p class="help-block text-danger">{{$errors->first('last_name')}}</p>
                                            @endif
                                        </div>
            						</div>
            					</div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <label class="control-label">First Name</label>
                                        <div class="form-group {{ $errors->first('first_name') ? 'has-error' : '' }}">
                                            {{Form::text('first_name',(!empty(old('first_name')) ? old('first_name') : $travel_pass->first_name),['class'=>'form-control  validate[required]','placeholder' => 'First Name'])}}
                                            @if($errors->first('first_name'))
                                                <p class="help-block text-danger">{{$errors->first('first_name')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <label class="control-label">Middle Name</label>
                                        <div class="form-group {{ $errors->first('middle_name') ? 'has-error' : '' }}">
                                            {{Form::text('middle_name',(!empty(old('middle_name')) ? old('middle_name') : $travel_pass->middle_name),['class'=>'form-control  validate[required]','placeholder' => 'Middle Name'])}}
                                            @if($errors->first('middle_name'))
                                                <p class="help-block text-danger">{{$errors->first('middle_name')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if(strcasecmp($travel_pass->status, 'waiting_for_payment') == 0 || strcasecmp($travel_pass->status, 'payment_paid') == 0 || strcasecmp($travel_pass->status, 'medical_certificate') == 0 ||  strcasecmp($travel_pass->status, 'released') == 0)
                                    @if(strcasecmp($travel_pass->type,'incoming_visitor') != 0 && strcasecmp($travel_pass->type,'ofw') != 0 && strcasecmp($travel_pass->type,'pass_through') != 0 )
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <label class="control-label">Age</label>
                                                <div class="form-group {{ $errors->first('age') ? 'has-error' : '' }}">
                                                    {{Form::number('age',(!empty(old('age')) ? old('age') : $travel_pass->age),['class'=>'form-control  validate[required]','placeholder' => 'Age'])}}
                                                    @if($errors->first('age'))
                                                        <p class="help-block text-danger">{{$errors->first('age')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
            					<div class="row">
            						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            							<div class="form-group {{ $errors->first('contact_no') ? 'has-error' : '' }}">
                                            <label class="control-label">Contact No.</label>
                                            {{Form::text('contact_no',(!empty(old('contact_no')) ? old('contact_no') : $travel_pass->contact_no),['class'=>'form-control  validate[required]','placeholder' => 'Contact No'])}}
                                            @if($errors->first('contact_no'))
                                                <p class="help-block text-danger">{{$errors->first('contact_no')}}</p>
                                            @endif
                                        </div>
            						</div>
            					</div>
            					<div class="row">
            						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            							<div class="form-group {{ $errors->first('email_address') ? 'has-error' : '' }}">
                                            <label class="control-label">Email</label>
                                            {{Form::email('email_address',(!empty(old('email')) ? old('email') : $travel_pass->email),['class'=>'form-control  validate[required]','placeholder' => 'Email Address','formnovalidate'=>'formnovalidate'])}}
                                            @if($errors->first('email_address'))
                                                <p class="help-block text-danger">{{$errors->first('email_address')}}</p>
                                            @endif
                                        </div>
            						</div>
            					</div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group {{ $errors->first('email_address_confirmation') ? 'has-error' : '' }}">
                                            <label class="control-label">Email Confirmation</label>
                                            {{Form::email('email_address_confirmation',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Email Confirmation','formnovalidate'=>'formnovalidate'])}}
                                            @if($errors->first('email_address_confirmation'))
                                                <p class="help-block text-danger">{{$errors->first('email_address_confirmation')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
            					<div class="row">
            						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            							<div class="form-group {{ $errors->first('residence') ? 'has-error' : '' }}">
                                            <label class="control-label">Residence</label>
                                            {{Form::text('residence',(!empty(old('residence')) ? old('residence') : $travel_pass->residence),['class'=>'form-control  validate[required]','placeholder' => 'Residence'])}}
                                            @if($errors->first('residence'))
                                                <p class="help-block text-danger">{{$errors->first('residence')}}</p>
                                            @endif
                                        </div>
            						</div>
            					</div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group {{ $errors->first('barangay') ? 'has-error' : '' }}">
                                            <label class="control-label">Barangay</label>
                                            @if(strcasecmp($travel_pass->type,'resident') == 0 || strcasecmp($travel_pass->type,'frequent_traveller') == 0)
                                                {{ Form::select('barangay',['' => 'Select Barangay'] + $barangays,(!empty(old('barangay')) ? old('barangay') : $travel_pass->barangay),['class'=>'form-control']) }}
                                            @else
                                                {{Form::text('barangay',(!empty(old('barangay')) ? old('barangay') : $travel_pass->barangay),['class'=>'form-control  validate[required]','placeholder' => 'Barangay'])}}
                                            @endif
                                            @if($errors->first('barangay'))
                                                <p class="help-block text-danger">{{$errors->first('barangay')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group {{ $errors->first('municipality_city') ? 'has-error' : '' }}">
                                            <label class="control-label">Municipality/City</label>
                                            {{Form::text('municipality_city',(!empty(old('municipality_city')) ? old('municipality_city') : $travel_pass->municipality_city),['class'=>'form-control  validate[required]','placeholder' => 'Municipality/City'])}}
                                            @if($errors->first('municipality_city'))
                                                <p class="help-block text-danger">{{$errors->first('municipality_city')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <label class="control-label">Province</label>
                                        <div class="form-group {{ $errors->first('province') ? 'has-error' : '' }}">
                                            {{Form::text('province',(!empty(old('province')) ? old('province') : $travel_pass->province),['class'=>'form-control  validate[required]','placeholder' => 'Province'])}}
                                            @if($errors->first('province'))
                                                <p class="help-block text-danger">{{$errors->first('province')}}</p>
                                            @endif
                                        </div>
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
            						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <label class="control-label">Place of Origin</label>
            							<div class="form-group {{ $errors->first('place_of_origin') ? 'has-error' : '' }}">
                                            {{Form::text('place_of_origin',(!empty(old('place_of_origin')) ? old('place_of_origin') : $travel_pass->place_of_origin),['class'=>'form-control  validate[required]','placeholder' => 'Place of Origin'])}}
                                            @if($errors->first('place_of_origin'))
                                                <p class="help-block text-danger">{{$errors->first('place_of_origin')}}</p>
                                            @endif
                                        </div>
            						</div>
            					</div>
                					<div class="row">
                						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <label class="control-label">@if(strcasecmp($travel_pass->type,'pass_through') != 0) Departure Date @else Date Entry @endif</label>
                							<div class="form-group {{ $errors->first('departure_date') ? 'has-error' : '' }}">
                                                {{Form::date('departure_date',(!empty(old('departure_date')) ? old('departure_date') : $travel_pass->departure_date),['class'=>'form-control  validate[required]'])}}
                                                @if($errors->first('departure_date'))
                                                    <p class="help-block text-danger">{{$errors->first('departure_date')}}</p>
                                                @endif
                                            </div>
                						</div>
                					</div>
                                @if(strcasecmp($travel_pass->type,'pass_through') == 0)
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <label class="control-label">Entry Point</label>
                                            <div class="form-group {{ $errors->first('entry_point') ? 'has-error' : '' }}">
                                                {{ Form::select('entry_point',['' => 'Select Entry Point'] + $check_points_arr,(!empty(old('entry_point')) ? old('entry_point') : $travel_pass->entry_point),['class'=>'form-control','id'=>'start'])}}
                                                @if($errors->first('entry_point'))
                                                    <p class="help-block text-danger">{{$errors->first('entry_point')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
            					<div class="row">
            						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <label class="control-label">Place of Destination</label>
                                        <div class="form-group {{ $errors->first('place_of_destination') ? 'has-error' : '' }}">
            							     {{Form::text('place_of_destination',(!empty(old('place_of_destination')) ? old('place_of_destination') : $travel_pass->place_of_destination),['class'=>'form-control  validate[required]','placeholder' => 'Place of Destination'])}}
                                            @if($errors->first('place_of_destination'))
                                                <p class="help-block text-danger">{{$errors->first('place_of_destination')}}</p>
                                            @endif
                                        </div>
            						</div>
            					</div>
                                @if(strcasecmp($travel_pass->type,'pass_through') != 0)
                					<div class="row">
                						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <label class="control-label">Return Date</label>
                							<div class="form-group {{ $errors->first('return_date') ? 'has-error' : '' }}">
                                                {{Form::date('return_date',(!empty(old('return_date')) ? old('return_date') : $travel_pass->return_date),['class'=>'form-control  validate[required]'])}}
                                                @if($errors->first('return_date'))
                                                    <p class="help-block text-danger">{{$errors->first('return_date')}}</p>
                                                @endif
                                            </div>
                						</div>
                					</div>
                                @else
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <label class="control-label">Exit Point</label>
                                            <div class="form-group {{ $errors->first('exit_point') ? 'has-error' : '' }}">
                                                {{ Form::select('exit_point',['' => 'Select Exit Point'] + $check_points_arr,(!empty(old('exit_point')) ? old('exit_point') : $travel_pass->exit_point),['class'=>'form-control','id'=>'start'])}}
                                                @if($errors->first('exit_point'))
                                                    <p class="help-block text-danger">{{$errors->first('exit_point')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(strcasecmp($travel_pass->type,'resident') == 0 || strcasecmp($travel_pass->type,'frequent_traveller') == 0)
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 vehicle-column">
                                            @if($errors->any())
                                                @if(count(old('mode_of_transport')) >0)
                                                    @foreach(old('mode_of_transport') as $key=>$mode_of_transport)
                                                        <div class="row row-vehicle">
                                                            <div class="@if($key != 0) col-xs-10 col-sm-10 col-md-10 col-lg-10 @else col-xs-12 col-sm-12 col-md-12 col-lg-12 @endif">
                                                                <div class="form-group {{ $errors->first('mode_of_transport.'.$key) ? 'has-error' : '' }}">
                                                                    <label class="control-label">Mode of Transport </label>
                                                                    {{ Form::select('mode_of_transport[ ]',['' => 'Select Mode of Transport'] + $mode_of_transport_arr,old('mode_of_transport.'.$key),['class'=>'form-control'])}}
                                                                    @if($errors->first('mode_of_transport.'.$key))
                                                                        <p class="help-block text-danger">{{$errors->first('mode_of_transport.'.$key)}}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            @if($key != 0)
                                                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                                                    <div class="form-group">
                                                                        <label>&nbsp;</label>
                                                                        <button type="button" class="btn btn-danger btn-block btnDelete"><i class="fa fa-times-circle" aria-hidden="true" ></i></button>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="form-group {{ $errors->first('plate_no.'.$key) ? 'has-error' : '' }}">
                                                                    <label class="control-label">Plate No</label>
                                                                    {{Form::text('plate_no[ ]',old('plate_no.'.$key),['class'=>'form-control  validate[required]','placeholder' => 'Plate No'])}}
                                                                    @if($errors->first('plate_no.'.$key))
                                                                        <p class="help-block text-danger">{{$errors->first('plate_no.'.$key)}}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="form-group {{ $errors->first('model_type.'.$key) ? 'has-error' : '' }}">
                                                                    <label class="control-label">Model/Type</label>
                                                                    {{Form::text('model_type[ ]',old('model_type.'.$key),['class'=>'form-control  validate[required]','placeholder' => 'Model/Type'])}}
                                                                    @if($errors->first('model_type.'.$key))
                                                                        <p class="help-block text-danger">{{$errors->first('model_type.'.$key)}}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            @else
                                                @if(count($current_mode_of_transports) > 0)
                                                    @foreach($current_mode_of_transports as $key => $mode_transport)
                                                        <div class="row row-vehicle">
                                                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                                                <div class="form-group {{ $errors->first('mode_of_transport.'.$key) ? 'has-error' : '' }}">
                                                                    <label class="control-label">Mode of Transport</label>
                                                                    {{ Form::select('mode_of_transport[ ]',['' => 'Select Mode of Transport'] + $mode_of_transport_arr,$mode_transport,['class'=>'form-control'])}}
                                                                    @if($errors->first('mode_of_transport.'.$key))
                                                                        <p class="help-block text-danger">{{$errors->first('mode_of_transport.'.$key)}}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            @if($key != 0)
                                                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                                                    <div class="form-group">
                                                                        <label>&nbsp;</label>
                                                                        <button type="button" class="btn btn-danger btn-block btnDelete"><i class="fa fa-times-circle" aria-hidden="true" ></i></button>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="form-group {{ $errors->first('plate_no.'.$key) ? 'has-error' : '' }}">
                                                                    <label class="control-label">Plate No</label>
                                                                    {{Form::text('plate_no[ ]',$current_plate_nos[$key],['class'=>'form-control  validate[required]','placeholder' => 'Plate No'])}}
                                                                    @if($errors->first('plate_no.'.$key))
                                                                        <p class="help-block text-danger">{{$errors->first('plate_no.'.$key)}}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="form-group {{ $errors->first('model_type.'.$key) ? 'has-error' : '' }}">
                                                                    <label class="control-label">Model/Type</label>
                                                                    {{Form::text('model_type[ ]',$current_model_types[$key],['class'=>'form-control  validate[required]','placeholder' => 'Model/Type'])}}
                                                                    @if($errors->first('model_type.'.$key))
                                                                        <p class="help-block text-danger">{{$errors->first('model_type.'.$key)}}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="row row-vehicle">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group {{ $errors->first('mode_of_transport.0') ? 'has-error' : '' }}">
                                                                <label class="control-label">Mode of Transport</label>
                                                                {{ Form::select('mode_of_transport[ ]',['' => 'Select Mode of Transport'] + $mode_of_transport_arr,$travel_pass->mode_of_transport,['class'=>'form-control'])}}
                                                                @if($errors->first('mode_of_transport.0'))
                                                                        <p class="help-block text-danger">{{$errors->first('mode_of_transport.0')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group {{ $errors->first('plate_no.0') ? 'has-error' : '' }}">
                                                                <label class="control-label">Plate No</label>
                                                                {{Form::text('plate_no[ ]',$travel_pass->plate_no,['class'=>'form-control  validate[required]','placeholder' => 'Plate No'])}}
                                                                @if($errors->first('plate_no.0'))
                                                                        <p class="help-block text-danger">{{$errors->first('plate_no.0')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group {{ $errors->first('model_type.0') ? 'has-error' : '' }}">
                                                                <label class="control-label">Model/Type</label>
                                                                {{Form::text('model_type[ ]',$travel_pass->model_type,['class'=>'form-control  validate[required]','placeholder' => 'Model/Type'])}}
                                                                @if($errors->first('model_type.0'))
                                                                    <p class="help-block text-danger">{{$errors->first('model_type.0')}}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group ">
                                                <button type="button" class="btn btn-default btnAddVehicle">Add More Vehicle</button>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @if($errors->any())
                                        @if(count(old('mode_of_transport')) > 0)
                                            @foreach(old('mode_of_transport') as $key => $mode_of_transport)
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <label class="control-label">Mode of Transport</label>
                                                        <div class="form-group {{ $errors->first('mode_of_transport.'.$key) ? 'has-error' : '' }}">
                                                            {{ Form::select('mode_of_transport[ ]',['' => 'Select Mode of Transport'] + $mode_of_transport_arr,$mode_of_transport,['class'=>'form-control'])}}
                                                            @if($errors->first('mode_of_transport.'.$key))
                                                                <p class="help-block text-danger">{{$errors->first('mode_of_transport.'.$key)}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <label class="control-label">Plate No</label>
                                                        <div class="form-group {{ $errors->first('plate_no.'.$key) ? 'has-error' : '' }}">
                                                            {{Form::text('plate_no[ ]',old('plate_no.'.$key),['class'=>'form-control  validate[required]','placeholder' => 'Plate No'])}}
                                                            @if($errors->first('plate_no.'.$key))
                                                                <p class="help-block text-danger">{{$errors->first('plate_no.'.$key)}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <label class="control-label">Model/Type</label>
                                                        <div class="form-group {{ $errors->first('model_type.'.$key) ? 'has-error' : '' }}">
                                                            {{Form::text('model_type[ ]',old('model_type.'.$key),['class'=>'form-control  validate[required]','placeholder' => 'Model/Type'])}}
                                                            @if($errors->first('model_type'))
                                                                <p class="help-block text-danger">{{$errors->first('model_type.'.$key)}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <label class="control-label">Mode of Transport</label>
                                                    <div class="form-group {{ $errors->first('mode_of_transport') ? 'has-error' : '' }}">
                                                        {{ Form::select('mode_of_transport[ ]',['' => 'Select Mode of Transport'] + $mode_of_transport_arr,$travel_pass->mode_of_transport,['class'=>'form-control'])}}
                                                        @if($errors->first('mode_of_transport'))
                                                            <p class="help-block text-danger">{{$errors->first('mode_of_transport')}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <label class="control-label">Plate No</label>
                                                    <div class="form-group {{ $errors->first('plate_no') ? 'has-error' : '' }}">
                                                        {{Form::text('plate_no[ ]',$travel_pass->plate_no,['class'=>'form-control  validate[required]','placeholder' => 'Plate No'])}}
                                                        @if($errors->first('plate_no'))
                                                            <p class="help-block text-danger">{{$errors->first('plate_no')}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <label class="control-label">Model/Type</label>
                                                    <div class="form-group {{ $errors->first('model_type') ? 'has-error' : '' }}">
                                                        {{Form::text('model_type[ ]',$travel_pass->model_type,['class'=>'form-control  validate[required]','placeholder' => 'Model/Type'])}}
                                                        @if($errors->first('model_type'))
                                                            <p class="help-block text-danger">{{$errors->first('model_type')}}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <label class="control-label">Mode of Transport</label>
                                                <div class="form-group {{ $errors->first('mode_of_transport') ? 'has-error' : '' }}">
                                                    {{ Form::select('mode_of_transport[ ]',['' => 'Select Mode of Transport'] + $mode_of_transport_arr,(!empty(old('mode_of_transport')) ? old('mode_of_transport') : $travel_pass->mode_of_transport),['class'=>'form-control'])}}
                                                    @if($errors->first('mode_of_transport'))
                                                        <p class="help-block text-danger">{{$errors->first('mode_of_transport')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <label class="control-label">Plate No</label>
                                                <div class="form-group {{ $errors->first('plate_no') ? 'has-error' : '' }}">
                                                    {{Form::text('plate_no[ ]',(!empty(old('plate_no')) ? old('plate_no') : $travel_pass->plate_no),['class'=>'form-control  validate[required]','placeholder' => 'Plate No'])}}
                                                    @if($errors->first('plate_no'))
                                                        <p class="help-block text-danger">{{$errors->first('plate_no')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <label class="control-label">Model/Type</label>
                                                <div class="form-group {{ $errors->first('model_type') ? 'has-error' : '' }}">
                                                    {{Form::text('model_type[ ]',(!empty(old('model_type')) ? old('model_type') : $travel_pass->model_type),['class'=>'form-control  validate[required]','placeholder' => 'Model/Type'])}}
                                                    @if($errors->first('model_type'))
                                                        <p class="help-block text-danger">{{$errors->first('model_type')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                @if(strcasecmp($travel_pass->type,'pass_through') != 0)
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <label class="control-label">Purpose of Travel</label>
                                            <div class="form-group {{ $errors->first('purpose_type_id') ? 'has-error' : '' }}">
                                                {{ Form::select('purpose_type_id',['' => 'Select Purpose'] + $purpose_types,(!empty(old('purpose_type_id')) ? old('purpose_type_id') : $travel_pass->purpose_type_id),['class'=>'form-control'])}}
                                                @if($errors->first('purpose_type_id'))
                                                    <p class="help-block text-danger">{{$errors->first('purpose_type_id')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    {{-- <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <label class="control-label">Time Entry</label>
                                                <div class="form-group {{ $errors->first('entry_time') ? 'has-error' : '' }}">
                                                {{Form::time('entry_time',(!empty(old('entry_time')) ? old('entry_time') : \Carbon\Carbon::parse($travel_pass->entry_point_time)->format('H:i')),['class'=>'form-control  validate[required]','placeholder' => 'Time Entry'])}}
                                                @if($errors->first('entry_time'))
                                                    <p class="help-block text-danger">{{$errors->first('entry_time')}}</p>
                                                @endif
                                            </div>
                                         </div>
                                    </div> --}}
                                    {{-- <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <label class="control-label">Time Exit</label>
                                                <div class="form-group {{ $errors->first('exit_time') ? 'has-error' : '' }}">
                                                {{Form::time('exit_time',(!empty(old('exit_time')) ? old('exit_time') : \Carbon\Carbon::parse($travel_pass->exit_point_time)->format('H:i')),['class'=>'form-control  validate[required]','placeholder' => 'Time Exit'])}}
                                                @if($errors->first('exit_time'))
                                                    <p class="help-block text-danger">{{$errors->first('exit_time')}}</p>
                                                @endif
                                            </div>
                                         </div>
                                    </div> --}}
                                    @if(strcasecmp($travel_pass->status,'processing') != 0)
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <label class="control-label">Given Time Travel</label>
                                                <div class="form-group {{ $errors->first('time_travel') ? 'has-error' : '' }}">
                                                    {{Form::select('time_travel',['15' => '15 mins','30' => '30 mins'],!empty(old('time_travel')) ? old('time_travel') : NULL,['class'=>'form-control'])}}
                                                    @if($errors->first('time_travel'))
                                                        <p class="help-block text-danger">{{$errors->first('time_travel')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                @if(strcasecmp($travel_pass->status, 'released') == 0 && strcasecmp($travel_pass->type,'pass_through') != 0)
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <label class="control-label">Remarks</label>
                                            <div class="{{ $errors->first('remarks') ? 'has-error' : '' }}">
                                                {{ Form::select('remarks',['REPORT TO BHERT' => 'REPORT TO BHERT','FACILITY QUARANTINE'=>'FACILITY QUARANTINE','HOME QUARANTINE'=>'HOME QUARANTINE','WITH RAPID TEST'=>'WITH RAPID TEST','WITH SWAB TEST'=>'WITH SWAB TEST'],(!empty(old('remarks')) ? old('remarks') : $travel_pass->remarks),['class'=>'form-control']) }}
                                                @if($errors->first('remarks'))
                                                    <p class="help-block text-danger">{{$errors->first('remarks')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                           <div class="checkbox {{ $errors->first('declaration_and_data_privacy') ? 'has-error' : '' }}" style="margin-bottom: 30px;">
                                                <label class="checkbox-label" style="margin-left: 0">
                                                    <input type="checkbox" name="is_issuance" value="yes" class="big-checkbox" {{ (($errors->any() && !empty(old('is_issuance')) && strcasecmp(old('is_issuance'),'yes') == 0) || (!$errors->any() && !empty($travel_pass->is_issuance) && strcasecmp($travel_pass->is_issuance,'yes') == 0)) ? 'checked':'' }}>
                                                    <span class="checkbox-custom rectangular"></span>
                                                        &nbsp;Rapid test on next issuance
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                {{-- @if(strcasecmp($travel_pass->status,'payment_paid') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0)
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <h4><strong>Payment Details</strong></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                           <div class="form-group {{ $errors->first('or_no') ? 'has-error' : '' }}">
                                            {{Form::text('or_no',(!empty(old('or_no')) ? old('or_no') : $travel_pass->or_no),['class'=>'form-control  validate[required]','placeholder' => 'OR No.'])}}
                                            @if($errors->first('or_no'))
                                                <p class="help-block text-danger">{{$errors->first('or_no')}}</p>
                                            @endif
                                        </div>
                                        </div>
                                    </div>
                                @endif --}}
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
            						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            							<div class="form-group {{ $errors->first('government_id') ? 'has-error' : '' }}">
                                            <label class="control-label">Government ID</label>
                                            {{Form::file('government_id',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                            @if($errors->first('government_id'))
                                                <p class="help-block text-danger">{{$errors->first('government_id')}}</p>
                                            @endif
                                        </div>
            						</div>
            					</div>
                                @if(!empty($travel_pass) && (strcasecmp($travel_pass->type,'ofw') == 0 || strcasecmp($travel_pass->type,'incoming_visitor') == 0 || strcasecmp($travel_pass->type,'pass_through') == 0))
                                    <div class="row row-margin">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                           <div class="form-group {{ $errors->first('medical_certificate') ? 'has-error' : '' }}">
                                                <label class="control-label">Medical Certificate</label>
                                                {{Form::file('medical_certificate',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                @if($errors->first('medical_certificate'))
                                                    <p class="help-block text-danger">{{$errors->first('medical_certificate')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(strcasecmp($travel_pass->type,'incoming_visitor') == 0)
                                    <div class="row row-margin">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group {{ $errors->first('barangay_certificate') ? 'has-error' : '' }}">
                                                <label class="control-label">Barangay Certificate</label>
                                                {{Form::file('barangay_certificate',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                @if($errors->first('barangay_certificate'))
                                                    <p class="help-block text-danger">{{$errors->first('barangay_certificate')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(strcasecmp($travel_pass->type,'incoming_visitor') != 0 && strcasecmp($travel_pass->type,'ofw') != 0 && strcasecmp($travel_pass->type,'pass_through') != 0)
                					<div class="row row-margin">
                						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                							<div class="form-group {{ $errors->first('bhert_health_declaration') ? 'has-error' : '' }}">
                                                <label class="control-label">BHERT Health Declaration</label>
                                                {{Form::file('bhert_health_declaration',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                @if($errors->first('bhert_health_declaration'))
                                                    <p class="help-block text-danger">{{$errors->first('bhert_health_declaration')}}</p>
                                                @endif
                                            </div>
                						</div>
                					</div>
                                @endif
            					@if(!empty($travel_pass) && (strcasecmp($travel_pass->type,'ofw') == 0))
            						<div class="row row-margin">
            							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            								<p class="attachment-text">Certificate of Employment:</p>
            							</div>
            							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            								<div class="form-group {{ $errors->first('certificate_of_employment') ? 'has-error' : '' }}">
                                                <label class="control-label">Certificate of Employment</label>
                                                {{Form::file('certificate_of_employment',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                @if($errors->first('certificate_of_employment'))
                                                    <p class="help-block text-danger">{{$errors->first('certificate_of_employment')}}</p>
                                                @endif
                                            </div>
            							</div>
            						</div>
            					@endif
                                @if(strcasecmp($travel_pass->type,'frequent_traveller') == 0)
                                    <div class="row row-margin">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group {{ $errors->first('rapid_test_result') ? 'has-error' : '' }}">
                                                <label class="control-label">Rapid Test Result</label>
                                                {{Form::file('rapid_test_result',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                @if($errors->first('rapid_test_result'))
                                                    <p class="help-block text-danger">{{$errors->first('rapid_test_result')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(strcasecmp($travel_pass->type,'pass_through') == 0)
                                    <div class="row row-margin">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group {{ $errors->first('travel_pass_or_travel_authority') ? 'has-error' : '' }}">
                                                <label class="control-label">Travel Pass / Travel Authority</label>
                                                {{Form::file('travel_pass_or_travel_authority',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                @if($errors->first('travel_pass_or_travel_authority'))
                                                    <p class="help-block text-danger">{{$errors->first('travel_pass_or_travel_authority')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(!empty($travel_pass) && (strcasecmp($travel_pass->type,'resident') == 0 || strcasecmp($travel_pass->type,'frequent_traveller') == 0) && (strcasecmp($travel_pass->status,'processing') == 0 || strcasecmp($travel_pass->status,'verification') == 0 || strcasecmp($travel_pass->status,'medical_certificate') == 0 || strcasecmp($travel_pass->status,'released') == 0))
                                    <div class="row row-margin">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group {{ $errors->first('medical_certificate_issued_by_city_health_office') ? 'has-error' : '' }}">
                                                <label class="control-label">Medical Certificate Issued By City Health Office</label>
                                                {{Form::file('medical_certificate_issued_by_city_health_office',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                @if($errors->first('medical_certificate_issued_by_city_health_office'))
                                                    <p class="help-block text-danger">{{$errors->first('medical_certificate_issued_by_city_health_office')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
            				</div>
            			</div>
            		</div>
            	</div>
                @if(strcasecmp($travel_pass->type,'pass_through') == 0)
                    <div class="row last-row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Passenger List</h5>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-passenger">
                                            @if($errors->any())
                                                @if(count(old('passenger_first_name')) >0)
                                                    @foreach(old('passenger_first_name') as $key=>$passenger_first_name)
                                                        <div class="passenger-container">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <h4 class="text-subheader passenger-header">Passenger {{ ($key+1) }} <i class="fa fa-times-circle btnDeletePassenger" aria-hidden="true" ></i></h4>
                                                                        {{ Form::hidden('passenger_id[ ]',old('passenger_id.'.$key)) }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                                    <div class="form-group {{ $errors->first('passenger_first_name.'.$key) ? 'has-error' : '' }}">
                                                                        <label class="control-label">First Name</label>
                                                                        {{Form::text('passenger_first_name[ ]',old('passenger_first_name.'.$key),['class'=>'form-control  validate[required]','placeholder' => 'First Name'])}}
                                                                        @if($errors->first('passenger_first_name.'.$key))
                                                                            <p class="help-block text-danger">{{$errors->first('passenger_first_name.'.$key)}}</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                                    <div class="form-group {{ $errors->first('passenger_middle_name') ? 'has-error' : '' }}">
                                                                        <label class="control-label">Middle Name</label>
                                                                        {{Form::text('passenger_middle_name[ ]',old('passenger_middle_name.'.$key),['class'=>'form-control  validate[required]','placeholder' => 'Middle Name'])}}
                                                                        @if($errors->first('passenger_middle_name'))
                                                                            <p class="help-block text-danger">{{$errors->first('passenger_middle_name')}}</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                                    <div class="form-group {{ $errors->first('passenger_last_name.'.$key) ? 'has-error' : '' }}">
                                                                        <label class="control-label">Last Name</label>
                                                                        {{Form::text('passenger_last_name[ ]',old('passenger_last_name.'.$key),['class'=>'form-control  validate[required]','placeholder' => 'Last Name'])}}
                                                                        @if($errors->first('passenger_last_name.'.$key))
                                                                            <p class="help-block text-danger">{{$errors->first('passenger_last_name.'.$key)}}</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                                    <div class="form-group {{ $errors->first('passenger_government_id.'.$key) ? 'has-error' : '' }}">
                                                                        <label class="control-label"><span>*</span>Government Issued ID with picture</label>
                                                                        {{Form::file('passenger_government_id[ ]',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                                        @if($errors->first('passenger_government_id.'.$key))
                                                                            <p class="help-block text-danger">{{$errors->first('passenger_government_id.'.$key)}}</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                                    <div class="form-group {{ $errors->first('passenger_medical_certificate.'.$key) ? 'has-error' : '' }}">
                                                                        <label class="control-label"><span>*</span>Medical Certificate<br></label>
                                                                        {{Form::file('passenger_medical_certificate[ ]',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                                        @if($errors->first('passenger_medical_certificate.'.$key))
                                                                            <p class="help-block text-danger">{{$errors->first('passenger_medical_certificate.'.$key)}}</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                                    <div class="form-group {{ $errors->first('passenger_travel_pass_or_travel_authority.'.$key) ? 'has-error' : '' }}">
                                                                        <label class="control-label"><span>*</span>Travel Pass / Travel Authority</label>
                                                                        {{Form::file('passenger_travel_pass_or_travel_authority[ ]',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                                        @if($errors->first('passenger_travel_pass_or_travel_authority.'.$key))
                                                                            <p class="help-block text-danger">{{$errors->first('passenger_travel_pass_or_travel_authority.'.$key)}}</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            @else
                                                @if(count($travel_pass_passengers) >0)
                                                    @foreach($travel_pass_passengers as $key=>$passenger)
                                                        <div class="passenger-container">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <h4 class="text-subheader passenger-header">Passenger {{ ($key+1) }} <i class="fa fa-times-circle btnDeletePassenger" aria-hidden="true" ></i></h4>
                                                                        {{ Form::hidden('passenger_id[ ]',$passenger->id) }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label">First Name</label>
                                                                        {{Form::text('passenger_first_name[ ]',$passenger->first_name,['class'=>'form-control  validate[required]','placeholder' => 'First Name'])}}
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Middle Name</label>
                                                                        {{Form::text('passenger_middle_name[ ]',$passenger->middle_name,['class'=>'form-control  validate[required]','placeholder' => 'Middle Name'])}}
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Last Name</label>
                                                                        {{Form::text('passenger_last_name[ ]',$passenger->last_name,['class'=>'form-control  validate[required]','placeholder' => 'Last Name'])}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label"><span>*</span>Government Issued ID with picture</label>
                                                                        {{Form::file('passenger_government_id[ ]',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                                    <div class="form-group">
                                                                        <label class="control-label"><span>*</span>Medical Certificate<br></label>
                                                                        {{Form::file('passenger_medical_certificate[ ]',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                                    <div class="form-group ">
                                                                        <label class="control-label"><span>*</span>Travel Pass / Travel Authority</label>
                                                                        {{Form::file('passenger_travel_pass_or_travel_authority[ ]',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group text-center" style="margin-bottom: 30px;">
                                                <button type="button" class="btn btn-primary btn-add-passenger">Add Passenger</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            {{ Form::close()}}
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="confirmationUpdateSection" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close closeUpdateBtn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                Are you sure you want to update travel pass #<strong class="travelPassFullName"></strong>? 
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                            <a href="#" id="btnUpdateTravelPass" class="btn btn-primary">Yes</a>
                        </div>
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
 <script src="{{asset('assets/robinherborts-inputmask/dist/jquery.inputmask.js')}}" type="text/javascript"></script>
<script>
	$(document).ready(function(){
        $('.vehicle-column').on('click','.btnDelete',function(){
            $(this).parents('.row-vehicle').remove();
        });
        $('.btnAddVehicle').on('click',function()
            {
                var label1 = $('<label>').addClass('control-label').html('Mode of Transport');
                var input1 = $('{{ Form::select('mode_of_transport[ ]',['' => 'Select Mode of Transport'] + $mode_of_transport_arr,null,['class'=>'form-control'])}}');
                var formgroup1 = $('<div>').addClass('form-group').append(label1).append(input1);
                var col1 = $('<div>').addClass('col-xs-10 col-sm-10 col-md-10 col-lg-10').append(formgroup1);
                var label2 = $('<label>').addClass('control-label').html('Plate No');
                var input2 = $('{{Form::text('plate_no[ ]',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Plate No'])}}');
                var formgroup2 = $('<div>').addClass('form-group').append(label2).append(input2);
                var col2 = $('<div>').addClass('col-xs-12 col-sm-12 col-md-12 col-lg-12').append(formgroup2);
                var label3 = $('<label>').addClass('control-label').html('Model/Type');
                var input3 = $('{{Form::text('model_type[ ]',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Model/Type'])}}');
                var formgroup3 = $('<div>').addClass('form-group').append(label3).append(input3);
                var col3 = $('<div>').addClass('col-xs-12 col-sm-12 col-md-12 col-lg-12').append(formgroup3);
                var delBtn = $('<button>').addClass('btn btn-danger btn-block btnDelete').attr('type','button').html('<i class="fa fa-times-circle" aria-hidden="true" ></i>');
                var label4 = $('<label>').html('&nbsp;');
                $(delBtn).on('click',function(){
                    $(this).parents('.row-vehicle').remove();
                });
                var formgroup4 =  $('<div>').addClass('form-group').append(label4).append(delBtn);
                var col4 = $('<div>').addClass('col-xs-2 col-sm-2 col-md-2 col-lg-2').append(formgroup4);
                var row = $('<div>').addClass('row row-vehicle').append(col1).append(col4).append(col2).append(col3);
                $('.vehicle-column').append(row);
            });
        $('input[name="contact_no"]').inputmask('mask', {'mask' : "+63999-999-9999",'removeMaskOnSubmit' : true,'autoUnmask':true});
            $('input[name="contact_no"').on('change',function(){
                 var value = $(this).val();
                if(value.length < 10)
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
                            $(this).siblings('.help-block').html('Please complete your contact no.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">Please complete your contact no.</p>');
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
            $('input[name="email_address"]').on("change", function(event) { 
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
            $('input[name="email_address_confirmation"]').on("change", function(event){
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
            @if((!empty($errors->first('government_id')) && (strcasecmp($errors->first('government_id'),'The government id may not be greater than 2000 kilobytes.') == 0)) || (!empty($errors->first('bhert_health_declaration')) && (strcasecmp($errors->first('bhert_health_declaration'),'The bhert health declaration may not be greater than 2000 kilobytes.') == 0)) || (!empty($errors->first('rapid_test_result')) && (strcasecmp($errors->first('rapid_test_result'),'The rapid test result may not be greater than 2000 kilobytes.') == 0)) || (!empty($errors->first('barangay_certificate')) && (strcasecmp($errors->first('barangay_certificate'),'The barangay certificate may not be greater than 2000 kilobytes.') == 0)) || (!empty($errors->first('certificate_of_employment')) && (strcasecmp($errors->first('certificate_of_employment'),'The certificate of employment may not be greater than 2000 kilobytes.') == 0)) || (!empty($errors->first('medical_certificate')) && (strcasecmp($errors->first('medical_certificate'),'The medical certificate may not be greater than 2000 kilobytes.') == 0)) || ($passengerAttachmentsCtr > 0))
                Swal.fire(
                    'There is an error.',
                    'The file size you uploaded is more than 2mb.',
                    'error'
                );
            @else
                Swal.fire(
                    'There is an error.',
                    'Please check all of your input.',
                    'error'
                );
            @endif
		@endif
        // $('.travelPassForm').on('change','select[name="mode_of_transport[ ]"]',function(){
        //     if($(this).val() == 'Cargo Vehicle' || $(this).val() == 'Motorcycle' || $(this).val() == 'Private Vehicle' || $(this).val() == 'Tricycle')
        //     {
        //         $(this).parents('.row-vehicle').find('input[name="plate_no[ ]"]').prop('readonly',false);
        //         $(this).parents('.row-vehicle').find('input[name="model_type[ ]"]').prop('readonly',false);
        //     }
        //     else
        //     {
        //         $(this).parents('.row-vehicle').find('input[name="plate_no[ ]"]').prop('readonly',true);
        //         $(this).parents('.row-vehicle').find('input[name="model_type[ ]"]').prop('readonly',true);
        //     }
        // });
		$('.travelPassForm').on('click','.btnSubmit',function(){
			$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
			$(this).attr('disabled',true);
			$(this).siblings('.btn').attr('disabled',true);
			$(this).parents('form').submit();
		});
        $('#confirmationUpdateSection').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var travelPassId = button.data('id');
            var trackingNo = button.data('name');
            var modal = $(this);
            modal.find('.modal-body .travelPassFullName').html(trackingNo);
        });
        $('#btnUpdateTravelPass').click(function(){
            $(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
            $('.closeUpdateBtn').attr('disabled',true);
            $('.closeUpdateBtn').hide();
            $(this).siblings('button.btn').attr('disabled',true);
            $(this).attr('disabled',true);
            $('#travelPassForm').submit();
        });
		$('.btnDeleteTravelPass').click(function(){
			$('.travelPassFullName').html($(this).data('name'));
			$('#btnDeleteTravelPass').attr('href','/travel-passes/' + $(this).attr('id') + '/delete');
		});
		$('#btnDeleteTravelPass').click(function(){
			$(this).html('<i class="fa fa-spinner fa-spin"></i> &nbsp;Loading');
			$(this).attr('disabled',true);
		});

            $("input[name='government_id']").on("change",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The government id may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The government id may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
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
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $("input[name='bhert_health_declaration']").on("change",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The bhert health declration may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The bhert health declration may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
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
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $("input[name='rapid_test_result']").on("change",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The rapid test result may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The rapid test result may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
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
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $("input[name='medical_certificate']").on("change",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The medical certificate may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The rmedical certificate may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
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
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $("input[name='certificate_of_employment']").on("change",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The certificate of employment may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The rcertificate of employment may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
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
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $("input[name='barangay_certificate']").on("change",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The barangay certificate may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The barangay certificate may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
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
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
        $("input[name='medical_certificate_issued_by_city_health_office']").on("change",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The medical certificate issued by city health office may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The medical certificate issued by city health office may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
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
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $("input[name='travel_pass_or_travel_authority']").on("change",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The travel pass or travel authority may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The travel pass or travel authority may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
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
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
        $('#travelPassForm').on('click','.btn-add-passenger',function(){
                $('.btn-add-passenger').attr('disabled',true);
                var firstName = $('<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><div class="form-group"><label class="control-label">First Name</label>{{Form::text('passenger_first_name[ ]',NULL,['class'=>'form-control  validate[required]','placeholder' => 'First Name'])}}</div></div>');
                var middleName = $('<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><div class="form-group"><label class="control-label">Middle Name</label>{{Form::text('passenger_middle_name[ ]',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Middle Name'])}}</div></div>');
                var lastName = $('<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><div class="form-group"><label class="control-label">Last Name</label>{{Form::text('passenger_last_name[ ]',NULL,['class'=>'form-control  validate[required]','placeholder' => 'Last Name'])}}</div></div>');
                var secondRow = $('<div class="row"></div>').append(firstName).append(middleName).append(lastName);
                var headerTemp = $('<h4></h4>').addClass('text-subheader passenger-header').html('Passenger ' + ($('.passenger-header').length + 1 ) + '&nbsp;<i class="fa fa-times-circle btnDeletePassenger" aria-hidden="true" ></i>');
                var headerFormGroup = $('<div class="form-group"></div>').append(headerTemp).append('{{ Form::hidden('passenger_id[ ]',NULL) }}');
                var headerColumn = $('<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>').append(headerFormGroup);
                var firstRow = $('<div class="row"></div>').append(headerColumn);
                var governmentIdPassenger = $('<div class="row"><div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><div class="form-group"><label class="control-label"><span>*</span>Government Issued ID with picture</label>{{Form::file('passenger_government_id[ ]',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}</div></div><div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><div class="form-group"><label class="control-label"><span>*</span>Medical Certificate</label>{{Form::file('passenger_medical_certificate[ ]',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}</div></div><div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"><div class="form-group"><label class="control-label"><span>*</span>Travel Pass / Travel Authority</label>{{Form::file('passenger_travel_pass_or_travel_authority[ ]',['class'=>'form-control  validate[required]','accept' =>'image/jpeg,image/jpg,image/png,application/pdf'])}}</div></div></div>');
                // var medicalCertificatePassenger = $('<div class="row"></div>');
                // var travelPassPassenger = $('<div class="row"></div>');
                var passengerContainer = $('<div class="passenger-container"></div>').append(firstRow).append(secondRow).append(governmentIdPassenger);
                $('.col-passenger').append(passengerContainer);
                $('.btn-add-passenger').attr('disabled',false);
            });
            $('#travelPassForm').on('click','.btnDeletePassenger',function(){
                $(this).parents('.passenger-container').remove();
                var ctr = 1;
                $('.passenger-header').each(function(){
                    $(this).html('Passenger ' + ctr + '&nbsp;<i class="fa fa-times-circle btnDeletePassenger" aria-hidden="true" ></i>');
                    ++ctr;
                });
            });
            $('#travelPassForm').on("change","input[name='passenger_government_id[ ]']",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The government id may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The government id may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
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
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $('#travelPassForm').on("change","input[name='passenger_medical_certificate[ ]']",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The medical certificate may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The medical certificate may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
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
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
            $('#travelPassForm').on("change","input[name='passenger_travel_pass_or_travel_authority[ ]']",function ()
            {
                if(this.files && this.files[0])
                {
                    if(this.files[0].size > 2000000)
                    {
                        if(!$(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().addClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
                        {
                            $(this).siblings('.help-block').html('The travel pass or travel authority may not be greater than 2000 kilobytes.')
                        }
                        else
                        {
                            $(this).parent().append('<p class="help-block text-danger">The travel pass or travel authority may not be greater than 2000 kilobytes.</p>');
                        }
                        $(this).val(null);
                    }
                    else
                    {
                        if($(this).parent().hasClass('has-error'))
                        {
                            $(this).parent().removeClass('has-error');
                        }
                        if($(this).siblings('.help-block').length > 0)
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
                    if($(this).siblings('.help-block').length > 0)
                    {
                        $(this).siblings('.help-block').remove();
                    }
                }
            });
	});
</script>
@stop