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

// if(!isset($_SESSION['Username'])){
// 		redirect("index.php");
// 	}

$class= $subject= "";
// $Username=$_SESSION['Username'];
$Username = "abhi";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_POST['submit']))
	{
		$class=$_POST["Class"];
		$subject=$_POST["Subject"];
		$assignment=$_POST["Assignment"];
		// echo $assignment;

		if($class != ""&&$subject != "")
		{
	    	$query1="SELECT `Class_Id` FROM `Classes` WHERE `Class_Name`='".$class."'";
	    	$res1=mysqli_query($db,$query1);
	    	$res1=mysqli_fetch_assoc($res1);
	    	$class=$res1["Class_Id"];
	    	// echo $class;

	    	$query2="SELECT `Subject_Id` FROM `Subjects` WHERE `Subject_Name`='".$subject."'";
	    	$res2=mysqli_query($db,$query2);
	    	$res2=mysqli_fetch_assoc($res2);
	    	$subject=$res2["Subject_Id"];
	    	// echo $subject;

	    	$query3="SELECT `S.No.` FROM `Acounts` WHERE `Username`='".$Username."'";
      		$res3=mysqli_query($db,$query3);
      		$res3=mysqli_fetch_assoc($res3);
      		$T_Id=$res3["S.No."];
      		echo $T_Id;

	    	$query4="INSERT INTO `Assignments`(Class_Id, Subject_Code, T_No,Ass_Link) VALUES ('$class','$subject','$T_Id','$assignment')";
	    	$res4=mysqli_query($db,$query4);

	    	// if($res4)
	    	// {
	     //  		redirect('UserHome.html');
	     //  		echo $password;

	    	// }
    		// else
    		// {
    		// 	echo "Error";
    		// 	echo("Error description: " . mysqli_error($db));
    		// }

		}

	}

}

?>