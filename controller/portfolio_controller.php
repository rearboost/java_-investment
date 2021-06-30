<?php
    // Database Connection
    require '../include/config.php';
    require '../include/check.php';

    //  Add Function 
    if(isset($_POST['add'])){

        $date           = $_POST['date'];
        $outstanding    = $_POST['outstanding'];
        $bank           = $_POST['bank'];
        $other1         = $_POST['other1'];
        $other2         = $_POST['other2'];
        $total          = $_POST['total'];

        $getcenter = mysqli_query($conn, "SELECT * FROM user WHERE username='$email'");
        $fetchCenter = mysqli_fetch_assoc($getcenter);
        $center = $fetchCenter['center_id'];

        $check= mysqli_query($conn, "SELECT * FROM portfolio WHERE outstanding='$outstanding' AND bank='$bank' AND other1='$other1' AND other2='$other2' AND total='$total'");
	    $count = mysqli_num_rows($check);

        if($count==0){

            $insert = "INSERT INTO portfolio (center_id,date,outstanding,bank,other1,other2,total) VALUES ('$center','$date','$outstanding','$bank','$other1','$other2','$total')";
            $result = mysqli_query($conn,$insert);
            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }else{
            echo 0;
        }
    }


?>