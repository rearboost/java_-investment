<?php
    error_reporting(0);

	include("../include/config.php");

    if(isset($_POST['gurantee1NIC'])){

        $gurantee1NIC = $_POST['gurantee1NIC'];

        $getID = mysqli_query($conn, "SELECT * FROM customer WHERE NIC='$gurantee1NIC'");
        $get = mysqli_fetch_assoc($getID);

        $name 		= $get['name'];
        $contact 	= $get['contact'];
        $addLine1 	= $get['addLine1'];
        $addLine2 	= $get['addLine2'];

        $myObj->name  = $name;
        $myObj->contact  = $contact;
        $myObj->addLine1  = $addLine1;
        $myObj->addLine2  = $addLine2;

        $myJSON = json_encode($myObj);

	    echo $myJSON;

    }

    //////////////////

    if(isset($_POST['gurantee2NIC'])){

        $gurantee2NIC = $_POST['gurantee2NIC'];

        $getID = mysqli_query($conn, "SELECT * FROM customer WHERE NIC='$gurantee2NIC'");
        $get = mysqli_fetch_assoc($getID);

        $name 		= $get['name'];
        $contact 	= $get['contact'];
        $addLine1 	= $get['addLine1'];
        $addLine2 	= $get['addLine2'];

        $myObj->name  = $name;
        $myObj->contact  = $contact;
        $myObj->addLine1  = $addLine1;
        $myObj->addLine2  = $addLine2;

        $myJSON = json_encode($myObj);

	    echo $myJSON;

    }

	

	
?>