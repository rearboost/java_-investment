<?php
	error_reporting(0);
	include("../include/config.php");

	$customer = $_POST['customer'];

	// $get_Cid = mysqli_query($conn, "SELECT * FROM customer WHERE name='$customer'");
	// $cutomData = mysqli_fetch_assoc($get_Cid);
	// $customer_id = $cutomData['id'];

	$get_paw = mysqli_query($conn,"SELECT * FROM loan WHERE customerID = '$customer'");

	$data = mysqli_fetch_array($get_paw); 

	$loan_no 		= $data['loan_no'];
	$disburseDate 	= $data['disburseDate'];
	$rental 	 	= $data['rental'];
	$loanAmt 	 	= $data['loanAmt'];
	$terms 	 		= $data['terms'];
	
	$check_no = mysqli_query($conn,"SELECT * FROM (SELECT * FROM loan_installement WHERE loan_installement.loanNo = '$loan_no') V ORDER BY V.id DESC LIMIT 1;");

    $data1 = mysqli_fetch_array($check_no); 
    $renewCount = mysqli_num_rows($check_no);

	$li_date 		= $data1['li_date'];
	$total_paid  	= $data1['total_paid'];
	$arrears   	  	= $data1['arrears'];
	$outstanding   	= $data1['outstanding'];
	
	if($renewCount==0)
	{
		$newAmount  = $rental*$terms;	
		$total_paid = 0;	
		$pre_date 	= $disburseDate;	
		$arrears 	= 0;	
	}
	else
	{
	   	$newAmount 	= $outstanding;
	   	$total_paid = $total_paid;	
	   	$pre_date   = $li_date;	
		$arrears 	= $arrears;	
	}

	$myObj->loan_no 	= $loan_no;
	$myObj->rental 		= $rental;
	$myObj->newAmount 	= $newAmount;
	$myObj->arrears 	= $arrears;
	$myObj->total_paid 	= $total_paid;
	$myObj->pre_date 	= $pre_date;

	$myJSON = json_encode($myObj);

	echo $myJSON;

?>