<?php
	session_start();
	function redirect($url,$permanent=false)
	{
		if($permanent)
		{
			header('HTTP/1.1 301 Moved Permanently');
		}
		header('Location: '.$url);
		exit();
	}

// if(!isset($_SESSION['Username'])){
// 		redirect("index.php");
// 	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Anonymous</title>
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
input{
  color:black;
}
  </style>
</head>
<body style="margin:0px;padding:0px;color:white;background-repeat:no repeat;width:100%;background-image: url('back.jpg');background-size: cover;">
  <nav class="navbar navbar-default fixed">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Anonymous</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="createAssignments.php">New Assignment</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
<div  class="container" style="margin:0px;padding:0px;width:100%;min-height:100%;">
  <br><br><br><br><br>
  <div class="row" style="min-height:100%vh;">
    <div class="col-sm-3">
      <div style="width:100%;height:100%;background-color:#0074D9;">

<?php 
// session_start();
include("config.php");

$username = $_SESSION["Username"];

$query1="SELECT `S.No.` FROM `Acounts` WHERE `Username`='".$username."'";
$res1=mysqli_query($db,$query1);
$res1=mysqli_fetch_assoc($res1);
$sno=$res1["S.No."];
echo $sno;
$query1="SELECT * FROM `Assignments` WHERE `T_No`='".$sno."'";
$res1=mysqli_query($db,$query1);
while ($row = mysqli_fetch_assoc($res1))
{
  echo "<div style='float:left;'><table><tr>";
  echo $row['Ass_Link'];
  echo "</td></tr><tr><td>Ass_No:</td><td>";
  echo $row['Ass_No'];
  echo "</td></tr></table></div>";
}

?>
        

<br><br><br><br><br>
</div>
</div>
<div class="col-sm-1"></div>

<div class="col-sm-6" style="text-align:center;background-color:rgba(0,0,0,0.5);">
      <br><br><br><br><br><br><br><br><br><br>
</div>
<div class="col-sm-1">
<button 
      
    </div>
</div>
</div>
</body>
</html>