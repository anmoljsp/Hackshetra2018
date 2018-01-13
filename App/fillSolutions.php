<?php
session_start();
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
// if(!isset($_SESSION['Username']){
// 	redirect("index.php");
// }
	$class= $subject= "";
	$Username=$_SESSION['Username'];
	echo "hey";
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST['submit']))
		{
			$class=$_POST["Class"];
			$subject=$_POST["Subject"];
			$assId=$_POST["AssId"];
			$solution=$_POST["Solutions"];
			echo "Here it is";
			if($class != ""&&$subject != "")
			{
				echo "I am";
		    	$query1="SELECT `Class_Id` FROM `Classes` WHERE `Class_Name`='".$class."'";
		    	$res1=mysqli_query($db,$query);
		    	$res1=mysqli_fetch_assoc($res1);
		    	$class=$res1["Class_Id"];
		    	$query2="SELECT `Subject_Id` FROM `Subjects` WHERE `Subject_Name`='".$subject."'";
		    	$res2=mysqli_query($db,$query2);
		    	$res2=mysqli_fetch_assoc($res2);
		    	$subject=$res2["Subject_Id"];
		    	// $query3="SELECT `S.No.` FROM `Acounts` WHERE `Username`='".$Username."'";
	      // 		$res3=mysqli_query($db,$query3);
	      // 		$res3=mysqli_fetch_assoc($res3);
	      		// $Std_Id=$res3["S.No."];
	      		$Std_Id='16';
		    	$query4="INSERT INTO `Solutions`(`Class_Id`, `Subject_Code`,`AssId` `Std_Id`,`Sol_Link`) VALUES ('$class','$subject','$assId','$Std_Id','$solution')";
		    	$res4=mysqli_query($db,$query4);
		    	if($res4)
		    	{
		      		redirect('UserHome.html');
		      		// echo $password;

		    	}
	    		else
	    		{
	    			echo "Error";
	    			echo("Error description: " . mysqli_error($db));
	    		}

			}

		}

	}
?>