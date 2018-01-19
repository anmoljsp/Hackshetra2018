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
  session_start();
  unset($_SESSION['Username']);
  redirect('index.php');
?>