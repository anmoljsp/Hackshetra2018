<?php
	function redirect($url,$permanent=false)
	{
		if($permanent)
		{
			header('HTTP/1.1 301 Moved Permanently');
		}
		header('Location: '.$url);
		exit();
	}

	$file_name = $_POST['file_name'];
	$data = $_POST['area2'];
	$file = fopen($file_name,'a+');
	fwrite($file,$data);
	fclose($file);
	echo "Submitted1";
	redirect('../App/createAssignments.php');
	//redirect('UserHome.html');
?>
