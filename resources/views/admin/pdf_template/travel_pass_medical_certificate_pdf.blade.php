<!DOCTYPE html>
<html><head>
	<title>Travel Pass Medical Certificate PDF</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
</head><body style="font-family: Century Gothic;">
	<table style="margin-top:-20px;">
		<tbody>
			<tr>
				<td colspan="2">
					<div>
						<img src="{{ $url.'/uploads/santiago_logo.png'}}" height="150px" width="150px" style="margin-left:-10px">
					</div>
				</td>
				<td colspan="6" style="">
					<div class="" style="text-align:center;margin-left:-20px;width:450px;">
				        <p class="text-center" style="font-size:20px;font-family: Garamond;">Republic of the Philippines</p>
				        <p class="text-center" style="font-size:22px;font-family: Garamond;font-weight: bold;">CITY OF SANTIAGO</p>
				       	<p class="text-center" style="font-size:20px;font-family: Garamond;font-weight: bold;">OFFICE OF THE CITY HEALTH CENTER</p>
				    </div>
				</td>
				<td colspan="2" >
					<div style="">
				    	<img src="{{ $url.'/uploads/cho_logo.png'}}" height="157px" width="157px" style="margin-left:-20px;">
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="10">
					<hr style="border-color:black;margin-top:5px;margin-bottom: 5px;margin-left:-25px;">
					<hr style="border-color:black;margin-top:5px;margin-bottom: 5px;margin-left:-25px;">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					
				</td>
				<td colspan="6">
					<div class="text-center" style="text-align:right;margin-right:-170px;">
					    <p style="font-size:14px;font-family: Times New Roman;text-align: right;line-height: 1.42857143;letter-spacing: 0.4;margin-top:0;margin-bottom: 0;margin-right:30	px;"><strong>City Health Office {{ \Carbon\Carbon::today()->year }}-{{ !empty($med_cet_control_no) ? $med_cet_control_no : 'xxxxx' }}</strong></p>
					 </div>
				</td>
				<td colspan="2">
					
				</td>
			</tr>
			<tr>
				<td colspan="2">
					
				</td>
				<td colspan="6">
					<div class="text-center" style="text-align:center;margin-left:-20px;">
					    <h5 style="font-size:24px;font-family: Times New Roman;font-weight: bold;margin-top:0px;margin-bottom: 10px;letter-spacing: 0.4;">MEDICAL CERTIFICATE</h5>
					 </div>
				</td>
				<td colspan="2">
					
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td colspan="8">
					<div class="" style="width:600px;margin-left:-25px;">
						<p style="margin: 0;line-height: 1.42857143;font-family: Calibri !important;text-align: justify;font-size:18px;letter-spacing: 0.4;">To whom it may concern:
					    </p>
				    </div>
				</td>
				<td>
					
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td colspan="8">
					<div class="" style="width:600px;margin-left:-25px;">
						<p style="text-indent:50px;font-size:16px;font-family: Calibri;text-align: justify;line-height: 1.42857143;letter-spacing: 0.4;margin-bottom:10px;">This is to certify that <u> <strong>&nbsp;{{ (!empty($travel_pass->first_name) && !empty($travel_pass->last_name)) ? (strtoupper(!empty($travel_pass->middle_name) ? $travel_pass->first_name.' '.substr($travel_pass->middle_name,0,1).'. '.$travel_pass->last_name : $travel_pass->first_name.' '.$travel_pass->last_name) ) : '&nbsp;'}}&nbsp;</strong> </u> , <u> <strong>&nbsp;{{!empty($travel_pass->age) ? $travel_pass->age : '&nbsp;'}}</strong> </u> y/o, from <u> &nbsp;{{!empty($travel_pass->barangay) ? $travel_pass->barangay : '&nbsp;'}}&nbsp; </u> , Santiago City, consult here at the City Health Office <strong>on <u> &nbsp;&nbsp;{{\Carbon\Carbon::now()->format('M. d')}} </u> , {{\Carbon\Carbon::now()->format('Y')}}</strong> due to / for Medical and Physical examination</p>
				    </div>
				</td>
				<td>
					
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td colspan="8">
					<div class="" style="width:600px;margin-left:-25px;">
						<p style="font-size:16px;font-family: Arial;text-align: justify;line-height: 1.42857143;letter-spacing: 0.4;">Diagnosis: <strong style="font-size:17px;">Essentially normal findings at the time of examination.</strong></p>
				    </div>
				</td>
				<td>
					
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td colspan="4">
					<div class="" style="width:300px;margin-left:-25px;margin-top:45px;">
						<p style="font-size:16px;font-family: Arial;text-align: justify;line-height: 1.42857143;letter-spacing: 0.4;">Valid Until: <u>&nbsp;&nbsp;{{!empty($certificate_valid_until) ? \Carbon\Carbon::parse($certificate_valid_until)->format('M. d Y') : '&nbsp;'}}&nbsp;&nbsp;</u></p>
				    </div>
				</td>
				<td colspan="4">
					<div class="" style="width:300px;margin-left:0px;">
						<p style="font-size:16px;font-family: Arial;text-align: center;line-height: 1.42857143;letter-spacing: 0.4;"><strong>GENARO N. MANALO, M.D.</strong><br>City Health Officer</p>
						<img src="{{ $url.'/uploads/cho_signature.png'}}" style="position: absolute;width:200px;top:-35px;margin-left:40px;">
				    </div>
				</td>
				<td>
					
				</td>
			</tr>
		</tbody>
	</table>
</body></html>