<!DOCTYPE html>
<html lang="en" style="height: 100%;">
<body style="height: 100%;margin: 0;padding: 0;width: 100%;color: #000000;display: table;font-weight: 100;font-family: 'Lato';box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 5px 0 rgba(0, 0, 0, 0.19);">
	<div class="container" style="padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;text-align: center;display: table-cell;vertical-align: middle;">
		<div class="content" style="text-align: center;display: inline-block;    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 5px 0 rgba(0, 0, 0, 0.19);border-color: #ddd;">
    		<div style="padding: 30px 45px;
  border-bottom: 1px solid #B0BEC5;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;">
    			<h4 style="margin-top: 0;
  margin-bottom: 0;
  font-size: 30px;
  color: #191970;">{{Session::get('software_name')}}</h4>
    		</div>
    		<div class="title" style="font-size: 30px;margin-bottom: 40px;margin-top: 40px;padding: 15px;margin-left:30px;margin-right:30px;">
    			<p style="text-align: left;">Hi <b>{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}</b>,</p>
    			<p style="text-align: left;">You requested to reset your password for your <b>{{Session::get('software_name')}}</b> account. Click the button below to reset it.</p>
    			<div style="margin-right: -15px;margin-left: -15px;margin-top:40px;margin-bottom: 40px;">
    				<div style="position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
    					<a href="{{route('user.forgot.reset.password',['token' => $tokenData->token,'email'=>$user->email])}}" style="color:#5fa1fc;display: inline-block;padding: 20px 40px;margin-bottom: 0;font-size: 20px;font-weight: normal;line-height: 1.42857143;text-align: center;white-space: nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action: manipulation;cursor: pointer;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;background-image: none;border: 1px solid transparent;border-radius: 4px;color: #fff;background-color: #5fa1fc;border-color: #ccc;text-decoration:none;"><b>Reset Password</b></a>
    				</div>
    			</div>
    			<hr>
    			<p style="font-size: 24px;text-align: left;">If you did not request a password reset, please ignore this email or reply to let us know.</p>
    			<p style="font-size: 24px;text-align: left;">Thanks,</p>
    			<p style="font-size: 24px;text-align: left;">{{Session::get('company_name')}}</p>
    			<p style="font-size: 24px;text-align: left;"><b>P.S.</b> We also love hearing from you and helping you with any issues you have. Please reply to this email if you want to ask a question or just say hi.</p>
    			<hr>
    			<p style="text-align: left;font-size: 20px;">If you're having trouble clicking the password reset link, copy and paste the URL below</p>
    			<p style="text-align: left;font-size: 14px;">{{route('user.forgot.reset.password',['token' => $tokenData->token,'email'=>$user->email])}}</p>
    		</div>
    		<div style="padding: 10px 15px;background-color: #f5f5f5;border-top: 1px solid #ddd;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px;color: #191970;">
    			<p style="font-size: 16px;">Santiagueño Disiplinado, COVID-19 Kaya Natin!</p>
    		</div>
		</div>
	</div>
</body>
</html>