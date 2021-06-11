<?php
	include("../include/config.php");

	$NIC = $_POST['NIC'];

	$getID = mysqli_query($conn, "SELECT * FROM customer WHERE NIC='$NIC'");
	$get = mysqli_fetch_assoc($getID);
	$cust_id = $get['cust_id'];


	$check_id =mysqli_query($conn,"SELECT status
	FROM loan
	WHERE customerID ='$cust_id'
	ORDER BY loan_no DESC 
	LIMIT 1;");

    $data = mysqli_fetch_array($check_id); 

	$status = $data['status'];

    if(empty($status))
	{	
		echo  1;	
	}else{
	   
		if($status==0){

			echo 1;	
		}else{

			echo 0;
		}
	}

	// 0 = Already You have a loan
	// 1 = You can get a loan

?>