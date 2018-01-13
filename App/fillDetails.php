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
	echo "hey";
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
			$password=mc_encrypt($_POST["password"],ENCRYPTION_KEY);
			echo $password;

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
			    	$query1="INSERT INTO Acounts(First_Name, Last_Name, Username,Password,Account_Type,Contact_No,Email_Id) VALUES ('$fname','$lname','$uname','$password','$accType','$mobile_no','$email')";
			    	$res1=mysqli_query($db,$query1);
			    	if($res1)
			    	{
			      		echo "Done";
			      		$_SESSION["Username"]=$uname;
			      		redirect('UserHome.html');

			    	}

			    }

			}

		}
	}
?>