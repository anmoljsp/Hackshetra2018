<?php
session_start();
$error="";
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
// echo $_SESSION["Username"];
$uname=$password="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	
	if(isset($_POST["login"]))
	{
		$uname=mysqli_real_escape_string($db,$_POST["uname"]);
		// $_SESSION["Username"]=$uname;
		$password=mysqli_real_escape_string($db,$_POST["password"]);
		

		$query="SELECT Password,Account_Type FROM Acounts WHERE Username='".$uname."'";
		$res=mysqli_query($db,$query);
		$cnt=mysqli_num_rows($res);
		if($cnt>0)
		{
			$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
			// $test=$row["Password"];
			// echo $test."<br>";
			$accType=$row["Account_Type"];
			$passcrypt=mc_decrypt($row["Password"],ENCRYPTION_KEY);
			if($passcrypt==$password)
			{
				echo "Pass Match";
				$_SESSION["Username"]=$uname;
				if($accType=="Student")
					redirect('StudentHome.php');
				else if($accType=="Teacher")
					redirect('TeacherHome.php');
				else if($accType=="Admin")
					redirect("AdminHome.php");
			}
			else
			{
				echo "Incorrect Password"."<br>";
			}
		}
		else
		{
			echo "Unidentified Username";
		}		
	}

}
?>