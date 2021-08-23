
    <?php
        // Database Connection
        require '../include/config.php';


        //  Add Function 
        if(isset($_POST['add'])){

            $memberID  = $_POST['memberID'];
            $center  = $_POST['center'];
            $client      = $_POST['name'];
            $addLine1   = $_POST['addLine1'];
            $addLine2   = $_POST['addLine2'];
            $addLine3   = $_POST['addLine3'];
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

                if($_FILES["clientPro2"]["name"] != '')
                {
                    $test2 = explode('.', $_FILES["clientPro2"]["name"]);
                    $ext2 = end($test2);
                    //$name = rand(100, 999) . '.' . $ext;
                    $name2 = $memberID . '-2.' . $ext2;
                
                    $location2 = '../upload/' . $name2;
                    move_uploaded_file($_FILES["clientPro2"]["tmp_name"], $location2);
                }else{
                    $name2 ="100.jpg";
                }

                $insert = "INSERT INTO customer (memberID,center_id,name,NIC,addLine1,addLine2,addLine3,contact,contact2,image,image2) VALUES ('$memberID','$center','$client','$nic','$addLine1','$addLine2','$addLine3','$contact','$contact2','$name','$name2')";
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
            $center  = $_POST['center'];
            $client      = $_POST['name'];
            $addLine1   = $_POST['addLine1'];
            $addLine2   = $_POST['addLine2'];
            $addLine3   = $_POST['addLine3'];
            $nic       = $_POST['nic'];
            $contact   = $_POST['contact'];
            $contact2  = $_POST['contact2']; 

            $check= mysqli_query($conn, "SELECT * FROM customer WHERE id='$id'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $edit = "UPDATE customer 
                                    SET name   ='$client',
                                        center_id  ='$center',
                                        NIC  ='$nic',
                                        addLine1  ='$addLine1',
                                        addLine2  ='$addLine2',
                                        addLine2  ='$addLine2',
                                        contact  ='$contact',
                                        contact2  ='$contact2'
                                    WHERE cust_id=$id";

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

        //  Delete Function 
        if(isset($_POST['removeID'])){

            $id  = $_POST['removeID'];
            $query ="DELETE FROM customer WHERE cust_id='$id'";
            $result = mysqli_query($conn,$query);
            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

    ?>