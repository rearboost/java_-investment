<?php	
	//error_reporting(0);
	require '../include/config.php';

	if(isset($_GET['customer'])){	
		$customer = $_GET['customer'];

		$get_val = mysqli_query($conn, "SELECT contractNo FROM loan WHERE customerID='$customer'");
		$count = mysqli_num_rows($get_val);

		// if($count==1){
		// 	while($row = mysqli_fetch_array($get_val)){
		// 		echo '<option value ="'.$row['contractNo'].'" selected>'.$row['contractNo'].'</option>';
		// 	}
		// }else 
		if($count>0){
			echo '<option selected="" disabled="">Select Contrat No </option>';
			while($row = mysqli_fetch_array($get_val)){
				echo '<option value ="'.$row['contractNo'].'" >'.$row['contractNo'].'</option>';
			}
		}else{
			echo '<option>No data available</option>';
		}
		
	}else{
		echo '<h1> Error</h1>';
	}



?>