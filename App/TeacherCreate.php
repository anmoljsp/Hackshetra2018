<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Add Teacher || Anonymous</title>
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
  </style>
</head>
<body style="margin:0px;padding:0px;color:white;background-repeat:no repeat;width:100%;">
<div  class="container" style="background-image: url('back.jpg');background-size: cover;margin:0px;padding:0px;width:100%;">
  <h1 style="text-align: center;font-size:300%;">Anonymous</h1>
  <br><br>
  <h2 style="text-align: center;">ADD TEACHER</h2>
  <br><br><br>
  <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4" style="text-align:center;background-color:rgba(0,0,0,0.5);">
	<form action="fillDetailsTeacher.php" method="POST" >
		<table>
			<tr>
				<td><input type="text" name="fname" placeholder="First Name"></td>
				<td><input type="text" name="lname" placeholder="Last Name"></td>
			</tr>
			<tr>
				<td>
					<input  type="text" name="email" placeholder="Email" length="10">
				</td>
			</tr>
			<tr>
				<td>
					<input  type="text" name="mobile_no" placeholder="Contact Number" length="10">
				</td>
			</tr>
			<tr>
				<td><input  type="text" name="username" placeholder="Username" length="10"></td>
			</tr>
			<tr>
				<td><input  type="password" name="password" placeholder="Password"></td>
			</tr>
			<tr>
				<td>
					<input  type="hidden" name="accType" value="Teacher">
				</td>
			</tr>
			<tr><td>Teacher Assignement</td></tr>
			<tr>
				<td>Class Assigned</td>
				<td>
					<input  type="text" name="C_Id" >
				</td>
			</tr>
			<tr>
				<td>Subject Assigned</td>
				<td>
					<input  type="text" name="S_Id" >
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Register" name="register" >
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
