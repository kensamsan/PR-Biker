<!DOCTYPE html>
<html><head>
	<title>Travel Pass Document PDF</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
</head><body style="font-family: Century Gothic;">
	<div class="container-fluid" style="padding-right: 15px;
    padding-left: 40px;
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
						<tr>	
							<td colspan="9">	
								<hr style="margin-top:5px;margin-bottom: 20px;border-top: 20px solid #9a191f;margin-left:-5%;width:100%;">
							</td>
						</tr>
						<tr>
							<td colspan="">&nbsp;</td>
							<td colspan="2">
								<div style="width:200px">	
									<img src="{{ $url.'/uploads/balamban.png'}}" style="max-width: 200px;max-height: 116px;">
								</div>
				            </td>
				            <td colspan="3">
								<div style="width:200px;">	
									<img src="{{ $url.'/uploads/covid.png'}}" style="max-width: 200px;max-height: 116px;">
								</div>
				            </td>
				            <td colspan="2">
								<div style="width:200px">	
									<img src="{{ $url.'/uploads/ambisyo.png'}}" style="max-width: 200px;max-height: 126px;">
								</div>
				            </td>
				            <td colspan="">
				            	&nbsp;
				            </td>
						</tr>
						<tr>
							<td colspan="">&nbsp;</td>
							<td colspan="7">
								<div style="text-align:center;">
									<p style="font-size: 2.5em;color:#9A9A9A !important;"><strong>{{ (!empty($travel_pass->first_name) && !empty($travel_pass->last_name)) ? (ucwords(!empty($travel_pass->middle_name) ? $travel_pass->first_name.' '.substr($travel_pass->middle_name,0,1).'. '.$travel_pass->last_name : $travel_pass->first_name.' '.$travel_pass->last_name) ) : '&nbsp;'}}</strong></p>
								</div>
								
							</td>
							<td colspan="">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="">&nbsp;</td>
							<td colspan="7">
								<div style="text-align:center;">
									<img src="{{ $url.'/uploads/qrcode/'.$travel_pass->tracking_no.'.png'}}" class="img-responsive" width="325" height="325" style="border: 2px solid #9a191f;">
								</div>
								
							</td>
							<td colspan="">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="">&nbsp;</td>
							<td colspan="7">
								<div style="text-align:center;margin-top:30px;">
									<img src="{{ $url.'/uploads/santiago_logo.png'}}" width="150" height="150">
								</div>
								
							</td>
							<td colspan="">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="">&nbsp;</td>
							<td colspan="7">
								<div style="text-align:center;margin-top:30px;">
									 <p style="font-size: 1.5em;"><strong>SANTIAGO CITY</strong></p>
								</div>
							</td>
							<td colspan="">&nbsp;</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body></html>