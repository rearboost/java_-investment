<?php
error_reporting(0);
	include("../include/config.php");

	$date = $_POST['date'];

	$getOut = mysqli_query($conn, "SELECT tot_outstanding FROM collection WHERE li_date<='$date' ORDER BY id DESC LIMIT 1");
	$get = mysqli_fetch_assoc($getOut);

	$tot_outstanding = $get['tot_outstanding'];

	$myObj->tot_outstanding = $tot_outstanding;
	
	$myJSON = json_encode($myObj);

	echo $myJSON;

?>