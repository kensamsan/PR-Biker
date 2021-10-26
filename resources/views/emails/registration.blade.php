<!DOCTYPE html>
<html lang="en-US">
<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta charset="text/html">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="//db.onlinewebfonts.com/c/d5029302cca7df63f92b945defedea3e?family=CeraGR-Black" rel="stylesheet" type="text/css"/> 
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style type="text/css">
    	html, body {
                /*height: 100%;*/
            }

            body {
 /*               margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 700;
                font-family: 'Lato';*/
                background-color: #F7F0E7;
                padding: 50px;
            }

            .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}

.container {
    background-color: #F3E8D9;

}
.container-outer {
    background-color: #F7F0E7;
    padding: 100px;
}
	    	
 .font-cera {
    color: #5D5D5D;font-family: CeraGR-Black ;font-weight: 0;letter-spacing: 0.9px;font-size: 20px;
}
.padd-bot {
    
} 
    </style>
</head>
<body>
    <div class="container-outer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class="col-md-4">
                    <a href="https://www.retandro.com"><img src="http://www.retandro.com/uploads/rlogo.png" style="width: 161px;height: 161px" class="center"></a>
                </div>
                <div class="col-md-4">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img src="http://www.retandro.com/uploads/head.jpg" class="center">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: center;">

                    <p class="font-cera">Please confirm and verify your email address.</p>
                    <p class="font-cera">Click this link <a href="{{$url}}/verify/{{ $verification_code }} ">Verify Email </a></p>             
                </div>
            </div>
            <div class="row" style="margin-bottom: 50px;">
                <div class="col-md-12">
                    <a href="https://www.instagram.com/retandro/">
                        <img src="http://www.retandro.com/uploads/instag.jpg" class="center">
                    </a>
                </div>
            </div>
            <div class="row" style="margin-bottom: 50px;">
                <div class="col-md-12">
                    &nbsp;<br/>
                    &nbsp;<br/>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

