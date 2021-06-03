<?php
// Database Connection
require '../include/config.php';
//  Update Function 
if(isset($_POST['add'])){

    $code        = $_POST['code'];
    $name        = $_POST['name'];


    $check= mysqli_query($conn, "SELECT * FROM center WHERE center_name='$name' AND center_code='$code'");
    $count = mysqli_num_rows($check);

    if($count==0){

        $insert = "INSERT INTO center(center_code,center_name) VALUES('$code','$name')";

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