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

	$username = $_SESSION['Username'];
	//$username = "abhi";
	$class = $_POST['Class'];
	$subject = $_POST['Subject'];
	$file_name = $_POST['AssId'];
	$data = $_POST['area2'];
	// echo $class;
	// echo $subject;
	// echo $file_name;
	// echo $data;

	$id = $class."_".$file_name."_".$username;
	//echo $id;
	$_SESSION["id"] = $id;
	$_SESSION["class"] = $class;
	$_SESSION["subject"] = $subject;
	$_SESSION["AssID"] = $file_name;
	

	$file = fopen($id,'a+');
	fwrite($file,$data);
	fclose($file);
	// echo "Submitted1";
	redirect('../fillSolutions.php');
?>
