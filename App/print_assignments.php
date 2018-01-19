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
			// echo $username;
			// echo $password;
			$query="SELECT Password FROM Acounts WHERE Username='".$username."'";
			$res=mysqli_query($db,$query);
			$res1=mysqli_fetch_assoc($res);
			$pass = $res1["Password"];
			//echo $pass;
			echo mc_decrypt($pass,ENCRYPTION_KEY);
			// $cnt=mysqli_num_rows($res);
			// if($cnt>0)
			// {
			// 	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
			// 	$test=$row["Password"];
			// 	// echo $test."<br>";
			// 	$passcrypt=mc_decrypt($row["Password"],ENCRYPTION_KEY);
			// 	// echo "Decrypted:" . mc_decrypt($test, ENCRYPTION_KEY)."<br>";
			// 	if($passcrypt==$password)
			// 	{
			// 		echo "Pass Match";
			// 		if($username != ""&& $password != "")
			// 		{
			// 	    	$class=$row["S.No."];

			// 	    	$query2="SELECT `Ass.No` FROM `Assignments` WHERE `Class_Id`='".$class."'";
			// 	    	$res2=mysqli_query($db,$query2);
			// 	    	$res2=mysqli_fetch_assoc($res2);
			// 	    	$cnt2=mysqli_num_rows($res2);
			// 	    	while($cnt2 >=0 )
			// 	    	{
			// 	    		$Ass_no=$res2["Ass.No"];
			// 	    		echo $Ass_no." ";
			// 	    		$cnt2--;
			// 	    	}
			// 	    	$cnt-- ;
			// 	    }

			// 	}
			//}
		}
	}

?>