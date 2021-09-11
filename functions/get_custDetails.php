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
	$addLine1 	= $get['addLine1'];
	$addLine2 	= $get['addLine2'];
	$addLine3 	= $get['addLine3'];

	//GET ACTIVE LOAN AMOUNT
	$getLoan = mysqli_query($conn, "SELECT * FROM  loan WHERE customerID='$cust_id' AND status=1");
	$loanCount =mysqli_num_rows($getLoan);

	$myObj->cust_id  	= $cust_id;
	$myObj->memberID  	= $memberID;
	$myObj->name  		= $name;
	$myObj->contact  	= $contact;
	$myObj->contact2  	= $contact2;
	$myObj->addLine1  	= $addLine1;
	$myObj->addLine2  	= $addLine2;
	$myObj->addLine3  	= $addLine3;
	$myObj->loanCount  	= $loanCount;
	
	$myJSON = json_encode($myObj);

	echo $myJSON;

?>