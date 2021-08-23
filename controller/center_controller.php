<?php
// Database Connection
require '../include/config.php';
         //  Add Function 
        if(isset($_POST['add'])){

            $code        = $_POST['code'];
            $name        = $_POST['name'];
            $leader        = $_POST['leader'];
            $contact        = $_POST['contact'];

            $check= mysqli_query($conn, "SELECT * FROM center WHERE center_name='$name' AND center_code='$code'");
            $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO center(center_code,center_name,leader,contact) VALUES('$code','$name','$leader','$contact')";

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

        //  Update Function 
        if(isset($_POST['update'])){

            $id        = $_POST['edit_id'];
            $name      = $_POST['name'];
            $leader    = $_POST['leader'];
            $contact   = $_POST['contact'];

            $check= mysqli_query($conn, "SELECT * FROM center WHERE id='$id'");
		    $count = mysqli_num_rows($check);

            if($count>0){

                $edit = "UPDATE center 
                                    SET center_name   ='$name',
                                        leader  ='$leader',
                                        contact  ='$contact'
                                    WHERE id=$id";

                $result = mysqli_query($conn,$edit);
                if($result){
                    echo  2;
                }else{
                    echo  mysqli_error($conn);		
                }

            }else{
                echo 0;
            }
        }

?>