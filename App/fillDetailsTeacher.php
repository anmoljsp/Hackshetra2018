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
  if(!isset($_SESSION['Username']){

  	redirect("index.php");
  }
	include("config.php");
	include("encryption.php");
	
	$fname= $lname= $uname= $password= "";
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
			$C_Id=$_POST["C_Id"];
			$S_Id=$_POST["S_Id"];
			$password=mc_encrypt($_POST["password"],ENCRYPTION_KEY);
			$accType=$_POST["accType"];
			// echo $password;

			if($uname != ""&&$fname != ""&& $lname != ""&& $accType != ""&& $password != "")
			{
				
				$query="SELECT * FROM Accounts WHERE Username= '".$uname."'";
				
				$res=mysqli_query($db,$query);
				if(mysqli_num_rows($res))
			    {
			      echo "Username taken!";
			      redirect('TeacherCreate.php');
			    }
			    else
			    {
			    	$query1="INSERT INTO Acounts(First_Name, Last_Name, Username,Password,Account_Type,Contact_No,Email_Id) VALUES ('$fname','$lname','$uname','$password','$accType','$mobile_no','$email')";
			    	$res1=mysqli_query($db,$query1);
			    	if($res1)
			    	{
			      		$query3="SELECT `S.No.` FROM `Acounts` ORDER BY `S.No.` DESC LIMIT 1";
			      		$res3=mysqli_query($db,$query3);
			      		$res3=mysqli_fetch_assoc($res3);
			      		$T_Id=$res3["S.No."];
			      		$query2="INSERT INTO `Teacher-Details`(T_No,Class_Id,Subject_Code) VALUES ('$T_Id','$C_Id','$S_Id')";
			    		$res2=mysqli_query($db,$query2);
			    		if($res2)
			    		{
			    			echo "Succesful Result";
			    			redirect('TeacherCreate.php');
			    		}
			    		else
			    		{
			    			echo "Error";
			    			echo("Error description: " . mysqli_error($db));
			    		}
			    	}

			    }

			}

		}
	}
?>