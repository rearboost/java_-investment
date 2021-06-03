<?php	
	//error_reporting(0);
	require '../include/config.php';

	if(isset($_GET['center'])){	
		$center = $_GET['center'];

		$get_customers = mysqli_query($conn, "SELECT * FROM customer WHERE centerID='$center'");
		$count = mysqli_num_rows($get_customers);

		if($count>0){
			echo '<option selected="" disabled="">--Select Customer--</option>';
			while($row = mysqli_fetch_array($get_customers)){
				echo '<option value ="'.$row['cust_id'].'" >'.$row['memberID'].' | ' . $row['name'].'</option>';
			}
		}else{
			echo '<option>No customers available</option>';
		}
		
	}else{
		echo '<h1> Error</h1>';
	}



?>