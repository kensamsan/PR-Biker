<!DOCTYPE html>
<html><head>
	<title>Travel Pass Document PDF</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
</head><body style="font-family: Century Gothic;">
	<div class="container-fluid" style="padding-right: 15px;
    padding-left: 10px;
    margin-right: auto;
    margin-left: auto;">
		<div class="row" style="margin-right: -15px;
    margin-left: -15px;">
			<div class="col-xs-12" style="position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;float: left;width:100%;">
				<table>
					<tbody>
						<tr >
							<td colspan="2"><img src="{{ $url.'/uploads/santiago_logo.png'}}" height="100px" width="100px"></td>
							<td colspan="5">
								<div class="" style="width:450px;text-align:center;">
				                    <p class="text-center" style="font-size:17px;font-family: garamond;">Republic of the Philippines</p>
				                    <p class="text-center" style="font-size:17px;font-family: garamond;font-weight: bold;">CITY OF SANTIAGO</p>
				                    <p class="text-center" style="font-size:15px;font-family: garamond;font-weight: bold;">LOCAL TASK FORCE AGAINST COVID-19</p>
				                </div>
				            </td>
				            <td colspan="2">
				            	<img src="{{ $url.'/uploads/balamban.png'}}" height="105" width="200" style="margin-left:-70px;">
				            </td>
						</tr>
						<tr>
							<td colspan="9">
								<hr style="border-color:black;margin-top:5px;margin-bottom: 5px;margin-left:-5%;width:95%;">
								<hr style="border-color:black;margin-top:5px;margin-bottom: 5px;margin-left:-5%;width:95%;">
							</td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td colspan="5">
								<div class="text-center" style="text-align:center;">
					                <h5 style="font-size:14px;font-family: Century Gothic;font-weight: bold;margin-top:0px;">TRAVEL PASS<br>{{\Carbon\Carbon::parse($travel_pass->created_at)->format('Y')}}-{{\Carbon\Carbon::parse($travel_pass->created_at)->format('m')}}-{{\Carbon\Carbon::parse($travel_pass->created_at)->format('d')}}-{{!empty($travel_pass->tracking_no) ? substr($travel_pass->tracking_no,8) : 'xxxx-xx-xx-xxx'}}</h5>
					            </div>
					        </td>
					        <td colspan="2">
					            	
					        </td>
				        </tr>
				        <tr>
							<td colspan=""></td>
							<td colspan="7">
								<div class="" style="width:640px;margin-left:-25px;">
									<p style="font-size:15px;margin: 0;text-indent:25px;line-height: 1.42857143;font-family: Century Gothic !important;text-align: justify;">
					                    <b>THIS IS TO CERTIFY</b> that based on records, <b>{{ (!empty($travel_pass->first_name) && !empty($travel_pass->last_name)) ? (strtoupper(!empty($travel_pass->middle_name) ? $travel_pass->first_name.' '.substr($travel_pass->middle_name,0,1).'. '.$travel_pass->last_name : $travel_pass->first_name.' '.$travel_pass->last_name) ) : '&nbsp;'}}</b> is a bonafide resident of Santiago City.
					                </p>
				            	</div>
					        </td>
					        <td colspan="">
					            	
					        </td>
				        </tr>
				        <tr>
							<td colspan=""></td>
							<td colspan="7">
								<div class="" style="width:640px;margin-left:-25px;">
									<p style="font-size:15px;margin: 0;text-indent:25px;line-height: 1.42857143;font-family: Century Gothic;text-align: justify;">
					                    Pursuant to existing laws, ordinances, rules and regulations, the above-named person is allowed to <b>TRAVEL</b> subject to the following:
					                </p>
					                <ol style="font-family: Century Gothic;font-size:15px;margin-top:10px;">
					                    <li>With BHERT Health Declaration and Medical Certification</li>
					                    <li>Travel Details
					                        <ol style="font-size:15px;list-style-type: lower-alpha;font-family: Century Gothic;margin-top: 0;margin-bottom: 5px;">
					                            <li>Departure: <b>{{!empty($travel_pass->departure_date) ? \Carbon\Carbon::parse($travel_pass->departure_date)->format('F d, Y') : '&nbsp;'}}</b></li>
					                            <li>Expected arrival in Santiago City: <b>{{ !empty($travel_pass->return_date) ? \Carbon\Carbon::parse($travel_pass->return_date)->format('F d, Y') : '&nbsp;' }}</b></li>
					                            <li>Destination: <b>{{!empty($travel_pass->place_of_destination) ? ucwords($travel_pass->place_of_destination) : '&nbsp;' }}</b></li>
					                            <li>Mode of Transportation: <b>{{ $mode_of_transport_text}}</b></li>
					                        </ol>
					                    </li>
					                    <li>
					                        Purpose of Travel: <b>{{!empty($purpose->name) ? ucwords($purpose->name) : '&nbsp;'}}</b>
					                    </li>
					                    <li>
					                        Remarks: <b>{{!empty($travel_pass->remarks) ? strtoupper($travel_pass->remarks) : '&nbsp;'}}{{ (!empty($travel_pass->is_issuance) && strcasecmp($travel_pass->is_issuance,'yes') == 0) ? ',RAPID TEST ON NEXT ISSUANCE' : '&nbsp;' }}</b>
					                    </li>
					                </ol>
				            	</div>
					        </td>
					        <td colspan="">
					            	
					        </td>
				        </tr>
				        <tr>
							<td colspan=""></td>
							<td colspan="7">
								<div class="" style="width:640px;margin-left:-25px;">
									<p style="font-size:15px;margin: 0 0 10px;text-indent:25px;line-height: 1.42857143;font-family: Century Gothic !important;text-align: justify;">
					                    This <b>TRAVEL PASS</b> is valid for single use only and shall be used to accomplish/perform the holder’s purpose. The unauthorized use of this <b>TRAVEL PASS</b> shall make the holder liable under existing laws and regulations. Any alteration on this document shall make this <b>TRAVEL PASS</b> INVALID.
					                </p>
				            	</div>
					        </td>
					        <td colspan="">
					            	
					        </td>
				        </tr>
				        <tr>
							<td colspan=""></td>
							<td colspan="7">
								<div class="" style="width:640px;margin-left:-25px;">
									<p style="font-size:15px;margin: 0 0 10px;text-indent:25px;line-height: 1.42857143;font-family: Century Gothic !important;text-align: justify;">
					                    Issued this {{\Carbon\Carbon::now()->format('jS')}} of {{\Carbon\Carbon::now()->format('F, Y')}} at City of Santiago.
					                </p>
				            	</div>
					        </td>
					        <td colspan="">
					            	
					        </td>
				        </tr>
				        <tr>
							<td colspan="5">
								<div style="margin-top:20px;">
		                            <p style="font-size:15px;margin-bottom: 0px;"><b>ENGR. PAULINO M. TAN</b></p>
		                            <p style="font-size:15px;margin-bottom: 0px;margin-top:2px;">City Administrator</p>
		                            {{-- <p style="margin-bottom: 0px;margin-top:2px;">Member, Local Task Force Against Covid-19</p> --}}
		                            <img src="{{ $url.'/uploads/mayor_signature.png'}}" style="position: absolute;width:180px;top:-40px;">
		                        </div>
		                        <div style="margin-top:40px;">
		                        	<p style="font-size:15px;border-top: 1px solid black;"><b>Printed Name and Signature of Applicant</b></p>
		                        </div>
					        </td>
					        <td colspan="4">
					           	<div style="text-align:center;">
				                    <p style="font-size:15px;margin-bottom: 5px;">Scan QR Code To Verify</p>
				                    <img src="{{ $url.'/uploads/qrcode/'.$travel_pass->tracking_no.'.png'}}" class="img-responsive" width="100" height="100" style="border: 2px solid #9a191f;" alt="QR CODE HERE">
				                </div>
					        </td>
				        </tr>
				        <tr>
							<td colspan="9">
								<p style="color:#FF3333 !important;font-size:0.8em;margin-top:20px;margin-bottom: 0px;"><b>**The bearer of this document is required to closely coordinate with the BHERT for Monitoring</b></p>
					        </td>
				        </tr>
				        <tr>
							<td colspan="9">
								<hr style="font-size:15px;border-color:black !important;0px;margin-left:-5%;width:95%;margin-top:40px;margin-bottom: 0px;">
							</td>
						</tr>
						<tr>
							<td colspan="5">
								<div style="font-size:12px;">
									<p style="margin-top: 0px;margin-bottom: 0px;">CITY GOVERNMENT OF SANTIAGO<br>City Hall, San Andres, Santiago City</p>
								</div>
							</td>
							<td colspan="3">
								<div style="font-size:12px;">
									<p style="margin-top: 0px;margin-bottom: 0px;text-align: right;">Tel. No.: (078) 305-1104<br>Telefax No.: (078) 305-2770</p>
								</div>
							</td>
							<td>
								
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body></html>