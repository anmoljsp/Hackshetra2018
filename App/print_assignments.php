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
			$query="SELECT Password FROM Acounts WHERE Username='".$username."'";
			$res=mysqli_query($db,$query);
			$res1=mysqli_fetch_assoc($res);
			$pass = $res1["Password"];
			$pass = mc_decrypt($pass,ENCRYPTION_KEY);

			if($pass == $password)
			{
				$query1="SELECT `S.NO.` FROM `Acounts` WHERE `Username`='".$username."'";
		    	$res1=mysqli_query($db,$query1);
		    	$res1=mysqli_fetch_assoc($res1);
		    	$sid=$res1["S.No."];

		    	$query1="SELECT `*` FROM `Solutions` WHERE `Std_Id`='".$sid."'";
		    	$res1=mysqli_query($db,$query1);
		    	while ($row=mysqli_fetch_assoc($res1))
		    	{
		    		echo "<div style='float:left;'><table><tr>";
					echo "<td>Student ID:</td><td>";
					echo $row['Std_Id'];
					echo "</td></tr><tr><td>Solution Links:</td><td>";
					echo $row['Sol_Links'];
					echo "</td></tr></table></div>";
		    	}
			}

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