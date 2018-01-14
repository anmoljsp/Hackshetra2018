<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Register || Anonymous</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/color/jquery.color-2.1.2.js"></script>
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <style type="text/css">
      li{
        padding-bottom: 45px;
        font-size: 150%;
        font-family: calibri;
      }
      a{
        color:white;
      }
      html, body {
    max-width: 100%;
    overflow-x: hidden;
}
table,tr,td{
  text-align:center;padding:10px;
}
.slideanim {visibility:hidden;}
.slide {
    /* The name of the animation */
    animation-name: slide;
    -webkit-animation-name: slide;
    /* The duration of the animation */
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    /* Make the element visible */
    visibility: visible;
}

/* Go from 0% to 100% opacity (see-through) and specify the percentage from when to slide in the element along the Y-axis */
@keyframes slide {
    0% {
        opacity: 0;
        transform: translateY(70%);
    }
    100% {
        opacity: 1;
        transform: translateY(0%);
    }
}
@-webkit-keyframes slide {
    0% {
        opacity: 0;
        -webkit-transform: translateY(70%);
    }
    100% {
        opacity: 1;
        -webkit-transform: translateY(0%);
    }
}
  </style>
</head>
<body style="margin:0px;padding:0px;color:white;background-repeat:no repeat;width:100%;">
<div  class="container" style="background-image: url('back.jpg');background-size: cover;margin:0px;padding:0px;width:100%;">
  <h1 style="text-align: center;font-size:300%;">Anonymous</h1>
  <br><br>
  <h2 style="text-align: center;">REGISTER</h2>
  <br><br><br>
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4" style="text-align:center;background-color:rgba(0,0,0,0.5);">
	<form action="fillDetails.php" method="POST" >
		<table>
			<tr>
				<td><input type="text" name="fname" placeholder="First Name" style="color:black;"></td>
				<td><input type="text" name="lname" placeholder="Last Name" style="color:black;"></td>
			</tr>
			<tr>
				<td>
					<input  type="text" name="email" placeholder="Email" length="10" style="color:black;">
				</td>
			</tr>
			<tr>
				<td>
					<input  type="text" name="mobile_no" placeholder="Contact Number" length="10" style="color:black;">
				</td>
			</tr>
			<tr>
				<td><input  type="text" name="username" placeholder="Username" length="10" style="color:black;"></td>
			</tr>
			<tr>
				<td><input  type="password" name="password" placeholder="Password" style="color:black;"></td>
			</tr>
			<tr>
				<td>
					<input  type="hidden" name="accType" value="Student" style="color:black;">
				</td>
			</tr>
			<tr>
				<td>
					<input  type="text" name="class" placeholder="Class-Name" style="color:black;">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Register" name="register" style="color:black;">
				</td>
			</tr>
		</table>
	</form>

</div>
<div class="col-sm-4"></div>
	</div>
	<br><br><br><br><br>

</div>
</body>
</html>
