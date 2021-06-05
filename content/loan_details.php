<?php
	error_reporting(0);
	include("../include/config.php");

	$contractNo = $_POST['contractNo'];

	$sql = mysqli_query($conn, "SELECT * FROM customer C INNER JOIN loan L ON C.cust_id=L.customerID WHERE L.contractNo='$contractNo'");

	$data  =mysqli_fetch_assoc($sql);

	$name 	 		= $data['name'];
	$nic 	 		= $data['NIC'];
	$branch 		= $data['branch'];
	$centerID 		= $data['centerID'];

	$center = mysqli_query($conn, "SELECT * FROM center WHERE id='$centerID'");
	$row = mysqli_fetch_assoc($center);


	$center_code 	= $row['center_code'];
	$center_name 	= $row['center_name'];

	$loanAmt 		= $data['loanAmt'];
	$terms 			= $data['terms'];
	$interestRate 	= $data['interestRate'];
	$rental 		= $data['rental'];
	$disburseDate 	= $data['disburseDate'];
	$gurantee1 		= $data['gurantee1'];
	$gurantee2 		= $data['gurantee2'];
	$loanStep 		= $data['loanStep'];
	$loan_no		= $data['loan_no'];

	$Payment = mysqli_query($conn, "SELECT * FROM loan_installement WHERE loanNo='$loan_no' ORDER BY id DESC LIMIT 1");
	$detail = mysqli_fetch_assoc($Payment);
	$count = mysqli_num_rows($Payment);

	$last_date = $detail['li_date'];
	$RenewAmt = $detail['outstanding'];
	$TotalPaid = $detail['total_paid'];

?>
<table border="0">
	<tr><td>Customer </td><td><?php echo  '  : '. $name . ' [' . $nic . ']'; ?></td></tr>
	<tr><td>Branch </td><td><?php echo  ' :  '. $branch . ' [' . $center_code . ' - ' . $center_name . ']'; ?></td></tr>
	<tr><td>Date </td><td><?php echo  ' :  '. $disburseDate; ?></td></tr>
	<tr><td>Loan Amt </td><td><?php echo  ' :  '. $loanAmt; ?></td></tr>
	<tr><td>Rental </td><td><?php echo  ' :  '. $rental. ' [' . $terms . ' weeks]'; ?></td></tr>
	<tr><td>Guarantee 01 </td><td><?php echo  ' :  '. $gurantee1; ?></td></tr>
	<tr><td>Guarantee 02 </td><td><?php echo  ' :  '. $gurantee2; ?></td></tr>
	<tr><td>Loan Step </td><td><?php echo  ' :  0'. $loanStep; ?></td></tr>
</table>

<br>
	<p><strong>Payment Details</strong></p>
	<?php
	if($count==0){
		echo '<p><center>No available transactions..</center></p>';
	}else{
	?>

<table border="0">
	<tr><td>Last Renewing On</td><td><?php echo  ' : '. $last_date; ?></td></tr>
	<tr><td>Outstanding</td><td><?php echo  ' : '. $RenewAmt; ?></td></tr>
	<tr><td>Total Paid</td><td><?php echo  ' : '. $TotalPaid; ?></td></tr>
</table>

	<?php } ?>
<!-- <p><strong> Customer : </strong><?php //echo $name . ' [' . $nic . ']'; ?> </p>
<p><strong> Pawning Date : </strong><?php //echo $mortgageDate; ?> </p>
<p><strong> Rescue Date : </strong><?php //echo $rescueDate; ?> </p>
<p><strong> Item Details : </strong><?php //echo $itemDetail; ?> </p>
<p><strong> Weight : </strong><?php //echo $weight; ?> </p>
<p><strong> Interest Rate : </strong><?php //echo $interestRate; ?> </p>
<p><strong> Time period : </strong><?php //echo $timePeriod; ?> </p>
<p><strong> Advance : </strong><?php //echo $mortgageAdvance; ?> </p> -->