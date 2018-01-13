<?php
  
?>
<!DOCTYPE html>
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
  <h2 style="text-align: center;font-size:300%;">Anonymous</h2>
  <br><br><br><br><br>
  <div class="row" style="margin-top:30px;">
    <div class="col-sm-4"></div>
    
    <div class="col-sm-4" style="text-align:center;background-color:rgba(0,0,0,0.5);">
      <p style="font-size:150%;">LOGIN</p>
<form action="loginVerify.php" method ="POST" >
    <fieldset>
      <table>
        <tr>
          <td>Username</td>
          <td><input type="text" name ="uname"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="password" ></td>
        </tr>
        <tr>
         <td colspan="2"><input type="submit" value="Login" name="login" style="color:black;"></td>
        </tr>
      </table>
    </fieldset>
  </form>
  <p><a href="register.php">Create a new account?</a></p>
</div>
<div class="col-sm-4">
      
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br>
<center>
<a href="#about"><span class="glyphicon glyphicon-chevron-down" style="font-size:40px;"></span></a>
</center>
</div>
<div class="container" style="background-image: url('back.jpg');background-size: cover;margin:0px;padding:0px;width:100%;" id="about">
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-6">
  <ul style="margin-top:150px;">
        <li class="slideanim">Cross-internet plagiarism detection capabilities</li>
        <li class="slideanim">Your assignments would never be stolen</li>
        <li class="slideanim">Real time bi-directional notifications</li>
        <li class="slideanim">Evaluate,edit and grade assignments online</li>
        <li class="slideanim">Share files locally without internet</li>
      </ul>
    </div>
    <div class="col-sm-4">
        <img src="three-way-hand-shake.png" class="slideanim" style="width:100%;margin-top:175px;">
    </div>
    <div class="col-sm-1"></div>
  </div>
  <br><br><br><br><br>

</div>
<script type="text/javascript">

  $(window).scroll(function() {
  $(".slideanim").each(function(){
    var pos = $(this).offset().top;

    var winTop = $(window).scrollTop();
    if (pos < winTop + 600) {
      $(this).addClass("slide");
    }
  });
}); 

</script>
</body>
</html>