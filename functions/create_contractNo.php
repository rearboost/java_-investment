<?php
	error_reporting(0);
	include("../include/config.php");

	$center = $_POST['center'];

	$get_Cid = mysqli_query($conn, "SELECT * FROM center WHERE id='$center'");
	$centerData = mysqli_fetch_assoc($get_Cid);
	$center_name = $centerData['center_name'];

	$get_loan = mysqli_query($conn,"SELECT loan_no FROM loan ORDER BY loan_no DESC LIMIT 1");
	$data = mysqli_fetch_array($get_loan); 
	$count = mysqli_num_rows($get_loan);

	if($count==0){
		$max_loan_no = 1;
	}else{
		$max_loan_no = $data['loan_no']+1;
	}


	$myObj->max_loan_no  = $max_loan_no;
	$myObj->center_name  = $center_name;

	$myJSON = json_encode($myObj);

	echo $myJSON;

?>