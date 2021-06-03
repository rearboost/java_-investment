
    <?php
        // Database Connection
        require '../include/config.php';


        //  Add Function 
        if(isset($_POST['add'])){

            $memberID  = $_POST['memberID'];
            $name      = $_POST['name'];
            $address   = $_POST['address'];
            $nic       = $_POST['nic'];
            $contact   = $_POST['contact'];
            $center    = $_POST['center'];

            $check= mysqli_query($conn, "SELECT * FROM customer WHERE memberID='$memberID' AND centerID='$center' AND name='$name' AND address='$address' AND NIC='$nic' AND contact='$contact'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO customer (memberID,centerID,name,NIC,address,contact) VALUES ('$memberID','$center','$name','$nic','$address','$contact')";
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
            $memberID  = $_POST['memberID'];
            $name      = $_POST['name'];
            $address   = $_POST['address'];
            $nic       = $_POST['nic'];
            $contact   = $_POST['contact'];
            $center    = $_POST['center'];

            $check= mysqli_query($conn, "SELECT * FROM customer WHERE memberID='$memberID' AND centerID='$center' AND name='$name' AND address='$address' AND NIC='$nic' AND contact='$contact'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $edit = "UPDATE customer 
                                    SET name   ='$name',
                                        address  ='$address',
                                        NIC  ='$nic',
                                        contact  ='$contact',
                                        centerID = $center
                                    WHERE cust_id=$id";

                $result = mysqli_query($conn,$edit);
                if($result){
                    echo  1;
                }else{
                    echo  mysqli_error($conn);		
                }

            }else{
                echo 0;
            }
        }

        //  Delete Function 
        if(isset($_POST['removeID'])){

            $id       = $_POST['removeID'];
            $query ="DELETE FROM customer WHERE cust_id='$id'";
            $result = mysqli_query($conn,$query);
            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

    ?>