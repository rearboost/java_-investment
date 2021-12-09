<?php
    // Database Connection
    require '../include/config.php';
    require '../include/check.php';

    //  Add Function 
    if(isset($_POST['add'])){

        $bank          = $_POST['bank'];
        $textOther1    = $_POST['textOther1'];
        $other1        = $_POST['other1'];
        $textOther2    = $_POST['textOther2'];
        $other2        = $_POST['other2'];
        $textOther3    = $_POST['textOther3'];
        $other3        = $_POST['other3'];
        $textOther4    = $_POST['textOther4'];
        $other4        = $_POST['other4'];
        $textOther5   = $_POST['textOther5'];
        $other5        = $_POST['other5'];

        // $getcenter = mysqli_query($conn, "SELECT * FROM user WHERE username='$email'");
        // $fetchCenter = mysqli_fetch_assoc($getcenter);
        // $center = $fetchCenter['center_id'];

        $check= mysqli_query($conn, "SELECT * FROM portfolio");
	    $count = mysqli_num_rows($check);

        if($count==0){

            ///////  INSERT //////////
            $insert = "INSERT INTO portfolio (bank,textOther1,other1,textOther2,other2,textOther3,other3,textOther4,other4,textOther5,other5) VALUES ('$bank','$textOther1','$other1','$textOther2','$other2','$textOther3','$other3','$textOther4','$other4','$textOther5','$other5')";
            $result = mysqli_query($conn,$insert);
            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }

        }else{
            ///////  UPDATE //////////
            $update = mysqli_query($conn,"UPDATE portfolio SET bank='$bank',textOther1 ='$textOther1',other1 ='$other1',textOther2 = '$textOther2',other2 = '$other2',textOther3 = '$textOther3',other3 = '$other3',textOther4='$textOther4',other4 ='$other4',textOther5='$textOther5',other5='$other5'");
            if($update){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }
    }

    ///// Centers Summary
    if(isset($_POST['addCS'])){

        $ang1_Pay    = $_POST['ang1_Pay'];
        $ang2_Pay    = $_POST['ang2_Pay'];
        $ang3_Pay    = $_POST['ang3_Pay'];
        $ang4_Pay    = $_POST['ang4_Pay'];
        $ang5_Pay    = $_POST['ang5_Pay'];
        $ang6_Pay    = $_POST['ang6_Pay'];

        $check= mysqli_query($conn, "SELECT * FROM centersSummaryTB");
	    $count = mysqli_num_rows($check);

        if($count==0){

            ///////  INSERT //////////
            $insert = "INSERT INTO centersSummaryTB (ang1_Pay,ang2_Pay,ang3_Pay,ang4_Pay,ang5_Pay,ang6_Pay) VALUES ('$ang1_Pay','$ang2_Pay','$ang3_Pay','$ang4_Pay','$ang5_Pay','$ang6_Pay')";
            $result = mysqli_query($conn,$insert);
            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }

        }else{
            ///////  UPDATE //////////
            $update = mysqli_query($conn,"UPDATE centersSummaryTB SET ang1_Pay='$ang1_Pay',ang2_Pay ='$ang2_Pay',ang3_Pay ='$ang3_Pay',ang4_Pay = '$ang4_Pay',ang5_Pay = '$ang5_Pay',ang6_Pay = '$ang6_Pay'");
            if($update){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }
    }

?>