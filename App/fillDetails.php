<?php
	include("config.php");
	include("encryption.php");
	function redirect($url,$permanent=false)
	{
		if($permanent)
		{
			header('HTTP/1.1 301 Moved Permanently');
		}
		header('Location: '.$url);
		exit();
	}
	$fname= $lname= $uname= $password= "";
	// echo "hey";
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST['register']))
		{
			$fname=$_POST["fname"];
			$lname=$_POST["lname"];
			$uname=$_POST["username"];
			$email=$_POST["email"];
			$mobile_no=$_POST["mobile_no"];
			$accType=$_POST["accType"];
			$C_Name=$_POST["class"];
			$password=mc_encrypt($_POST["password"],ENCRYPTION_KEY);
			// echo $password;

			if($uname != ""&&$fname != ""&& $lname != ""&& $accType != ""&& $password != "")
			{
				
				$query="SELECT * FROM Accounts WHERE Username= '".$uname."'";
				
				$res=mysqli_query($db,$query);
				if(mysqli_num_rows($res))
			    {
			      echo "Username taken!";
			      redirect('register.php');
			    }
			    else
			    {
			    	$query2="SELECT `Class_Id` FROM `Classes` WHERE `Class_Name`='".$C_Name."'";
			    	$res2=mysqli_query($db,$query2);
			    	$res2=mysqli_fetch_assoc($res2);
			    	$class=$res2["Class_Id"];
			    	$query1="INSERT INTO Acounts(First_Name, Last_Name, Username,Password,Account_Type,Contact_No,Email_Id) VALUES ('$fname','$lname','$uname','$password','$accType','$mobile_no','$email')";
			    	$res1=mysqli_query($db,$query1);
			    	if($res1)
			    	{
			      		echo "Done";
			      		$query3="SELECT `S.No.` FROM `Acounts` ORDER BY `S.No.` DESC LIMIT 1";
			      		$res3=mysqli_query($db,$query3);
			      		if(!$res3)
			      			echo "Error here";
			      		$res3=mysqli_fetch_assoc($res3);
			      		$Std_Id=$res3["S.No."];
			      		$query4="INSERT INTO `Student-Details`(Std_Id,Class_Id) VALUES ('$Std_Id','$class')";
			    		$res4=mysqli_query($db,$query4);
			    		if(!$res4)
			    		{
			    			echo "Error";
			    			echo("Error description: " . mysqli_error($db));
			    		}
			      		// redirect('UserHome.html');
			      		// echo $password;

			    	}

			    }

			}

		}
	}
?>