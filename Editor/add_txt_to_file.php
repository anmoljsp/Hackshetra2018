<?php
	$data = $_POST['area2'];
	$file = fopen('mydata.txt','a+');
	fwrite($file,$data);
	fclose($file);
	echo "Submitted";
?>