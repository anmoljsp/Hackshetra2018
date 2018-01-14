<?php
	session_start();
	include("config.php");
	include("encryption.php");


	$class= $subject= "";
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST['submit']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password = mc_encrypt($password,ENCRYPTION_KEY);
			if($username != ""&& $password != "")
			{
		    	$query1="SELECT `S.No.` FROM `Acounts` WHERE `Username`='".$username."and Password ='".$password."'";
		    	$res1=mysqli_query($db,$query1);
		    	$res1=mysqli_fetch_assoc($res1);
		    	$class=$res1["S.No."];

		    	$query2="SELECT `Ass.No` FROM `Assignments` WHERE `Class_Id`='".$class."'";
		    	$res2=mysqli_query($db,$query2);
		    	$res2=mysqli_fetch_assoc($res2);
		    	$Ass_no=$res2["Ass.No"];

			}

		}

	}

?>