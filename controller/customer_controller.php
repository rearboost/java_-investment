
    <?php
        // Database Connection
        require '../include/config.php';


        //  Add Function 
        if(isset($_POST['add'])){

            $memberID  = $_POST['memberID'];
            $client      = $_POST['name'];
            $address   = $_POST['address'];
            $nic       = $_POST['nic'];
            $contact   = $_POST['contact'];
            $contact2  = $_POST['contact2'];

            $check= mysqli_query($conn, "SELECT * FROM customer WHERE memberID='$memberID' AND name='$client' AND address='$address' AND NIC='$nic' AND contact='$contact' AND contact2='$contact2'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                if($_FILES["clientPro"]["name"] != '')
                {
                    $test = explode('.', $_FILES["clientPro"]["name"]);
                    $ext = end($test);
                    //$name = rand(100, 999) . '.' . $ext;
                    $name = $memberID . '.' . $ext;
                
                    $location = '../upload/' . $name;
                    move_uploaded_file($_FILES["clientPro"]["tmp_name"], $location);
                }else{
                    $name ="100.jpg";
                }

                $insert = "INSERT INTO customer (memberID,name,NIC,address,contact,contact2,image) VALUES ('$memberID','$client','$nic','$address','$contact','$contact2','$name')";
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
            $client      = $_POST['name'];
            $address   = $_POST['address'];
            $nic       = $_POST['nic'];
            $contact   = $_POST['contact'];
            $center    = $_POST['center'];

            $check= mysqli_query($conn, "SELECT * FROM customer WHERE memberID='$memberID' AND centerID='$center' AND name='$client' AND address='$address' AND NIC='$nic' AND contact='$contact'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $edit = "UPDATE customer 
                                    SET name   ='$client',
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