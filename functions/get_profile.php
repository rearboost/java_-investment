<?php	
	//error_reporting(0);
	require '../include/config.php';

	if(isset($_GET['NIC'])){	
		$NIC = $_GET['NIC'];

		$get_img = mysqli_query($conn, "SELECT * FROM customer WHERE NIC='$NIC'");
		$data = mysqli_fetch_assoc($get_img);

		$image = $data['image'];
		echo '<img src="../upload/'.$image.'" width="130" height="130"/>';
		
	}else{
		echo '<h1> Error</h1>';
	}



?>