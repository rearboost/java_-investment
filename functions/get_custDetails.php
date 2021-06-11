<?php
error_reporting(0);
	include("../include/config.php");

	$NIC = $_POST['NIC'];

	$getID = mysqli_query($conn, "SELECT * FROM customer WHERE NIC='$NIC'");
	$get = mysqli_fetch_assoc($getID);

	$cust_id 	= $get['cust_id'];
	$memberID 	= $get['memberID'];
	$name 		= $get['name'];
	$contact 	= $get['contact'];
	$contact2 	= $get['contact2'];
	$address 	= $get['address'];

	$myObj->cust_id  	= $cust_id;
	$myObj->memberID  	= $memberID;
	$myObj->name  		= $name;
	$myObj->contact  	= $contact;
	$myObj->contact2  	= $contact2;
	$myObj->address  	= $address;
	
	$myJSON = json_encode($myObj);

	echo $myJSON;

?>