<?php
	error_reporting(0);
	include("../include/config.php");

	$id = $_POST['id'];

	$getData = mysqli_query($conn, "SELECT * FROM temp_collection WHERE id=$id");
	$data = mysqli_fetch_assoc($getData);

	$arrears = $data['Arrears'];
	$payable = $data['payable'];
	$balance = $data['balance'];

	$myObj->arrears  = $arrears;
	$myObj->payable  = $payable;
	$myObj->balance  = $balance;

	$myJSON = json_encode($myObj);

	echo $myJSON;

?>