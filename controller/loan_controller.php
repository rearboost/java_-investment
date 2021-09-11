    <?php
        // Database Connection
        require '../include/config.php';
        
        // Insert Function 
        if(isset($_POST['add'])){

            $loanID         = $_POST['loanID'];
            $check= mysqli_query($conn, "SELECT * FROM loan WHERE loanID='$loanID' ");
            $count = mysqli_num_rows($check);

            if($count==0){

                $branch         = $_POST['branch'];
                $center         = $_POST['center'];
                $customer       = $_POST['customer'];
                $loan_type      = $_POST['loan_type'];
                $contractNo     = $_POST['contractNo'];
                $loanAmt        = $_POST['loanAmt'];
                $terms          = $_POST['terms'];
                $intRate        = $_POST['intRate'];
                $rental         = $_POST['rental'];
                $daily_rental   = $_POST['daily_rental'];
                $tot_amt        = $_POST['tot_amt'];
                $inspectionDate = $_POST['inspectionDate'];
                $disburseDate   = $_POST['disburseDate'];
                $gurantee1Name      = $_POST['gurantee1Name'];
                $gurantee1NIC       = $_POST['gurantee1NIC'];
                $gurantee1ContactNo = $_POST['gurantee1ContactNo'];
                $gurantee1ad1 = $_POST['gurantee1ad1'];
                $gurantee1ad2 = $_POST['gurantee1ad2'];
                $gurantee2Name      = $_POST['gurantee2Name'];
                $gurantee2NIC       = $_POST['gurantee2NIC'];
                $gurantee2ContactNo = $_POST['gurantee2ContactNo'];
                $gurantee2ad1 = $_POST['gurantee2ad1'];
                $gurantee2ad2 = $_POST['gurantee2ad2'];
                $loanStep       = $_POST['loanStep'];

                // customer details
                $cust_id       = $_POST['cust_id'];
                $contact1      = $_POST['contact1'];
                $contact2      = $_POST['contact2'];
                $addLine1       = $_POST['addLine1'];
                $addLine2       = $_POST['addLine2'];
                $addLine3       = $_POST['addLine3'];

                $year =  date("Y");
                $month = date("m");
                $createDate = date("Y-m-d");

                ///////////////summarry query starts///////////

                $querySummary = "SELECT id ,loanAMT FROM summary WHERE year='$year' AND month='$month' ";
                $resultSummary = mysqli_query($conn ,$querySummary);

                $countSummary =mysqli_num_rows($resultSummary);

                if($countSummary>0){

                    while($rowSummary = mysqli_fetch_array($resultSummary)){

                        $oldLoanAMT = $rowSummary['loanAMT'];
                        $id = $rowSummary['id'];
                    }

                    $newLoanAMT = ($oldLoanAMT +$loanAmt);

                    $queryRow ="UPDATE summary SET loanAMT='$newLoanAMT' WHERE id='$id' ";
                    $rowRow =mysqli_query($conn,$queryRow);

                }else{

                    $query ="INSERT INTO  summary (year,month,loanAMT,createDate)  VALUES (?,?,?,?)";

                    $stmt =mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$query))
                    {
                        echo "SQL Error";
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt,"ssss",$year,$month,$loanAmt,$createDate);
                        $result =  mysqli_stmt_execute($stmt);
                    }

                    for ($x = 1; $x < 13; $x++) {
                
                        if($month !=str_pad($x, 2, "0", STR_PAD_LEFT)){

                        $queryDefult ="INSERT INTO  summary (year,month,createDate)  VALUES (?,?,?)";

                        $stmt =mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$queryDefult))
                        {
                            echo "SQL Error";
                        }
                        else
                        {
                            mysqli_stmt_bind_param($stmt,"sss",$year,str_pad($x, 2, "0", STR_PAD_LEFT),$createDate);
                            $result =  mysqli_stmt_execute($stmt);
                        }

                        }
                    }
                }
                
                $insert = mysqli_query($conn,"INSERT INTO loan (loanID,branch,centerID,customerID,loanType,contractNo,loanAmt,terms,interestRate,rental,daily_rental,totalAmt,inspectionDate,disburseDate,gurantee1Name,gurantee1NIC,gurantee1ContactNo,gurantee1ad1,gurantee1ad2,gurantee2Name,gurantee2NIC,gurantee2ContactNo,gurantee2ad1,gurantee2ad2,loanStep,status) VALUES ('$loanID','$branch','$center','$cust_id','$loan_type','$contractNo','$loanAmt','$terms','$intRate','$rental','$daily_rental','$tot_amt','$inspectionDate','$disburseDate','$gurantee1Name','$gurantee1NIC','$gurantee1ContactNo','$gurantee1ad1','$gurantee1ad2','$gurantee2Name','$gurantee2NIC','$gurantee2ContactNo','$gurantee2ad1','$gurantee2ad2','$loanStep',1)");

                if($insert){
                    echo  1;
                    // $updateCustomer = mysqli_query($conn, "UPDATE customer SET contact =$contact1, contact2=$contact2, address='$address' WHERE cust_id=$cust_id");
                    // if($updateCustomer){ 
                    
                    // }else{
                    //     echo  0;
                    // }
                }else{
                    echo  mysqli_error($conn);		
                }

            }else{
                echo  0;
            }

        }

         // Update Function 
        if(isset($_POST['update'])){

            $loan_no         = $_POST['loan_no'];
            $check= mysqli_query($conn, "SELECT * FROM loan WHERE loan_no='$loan_no' ");
            $count = mysqli_num_rows($check);
            $row_check = mysqli_fetch_assoc($check);

            if($count!=0){

                $old_loanAmt  = $row_check['loanAmt']; 
                $loanID         = $_POST['loanID'];
                $branch         = $_POST['branch'];
                $center         = $_POST['center'];
                $loan_type      = $_POST['loan_type'];
                $contractNo     = $_POST['contractNo'];
                $loanAmt        = $_POST['loanAmt'];
                $terms          = $_POST['terms'];
                $intRate        = $_POST['intRate'];
                $rental         = $_POST['rental'];
                $daily_rental   = $_POST['daily_rental'];
                $tot_amt        = $_POST['tot_amt'];
                $inspectionDate = $_POST['inspectionDate'];
                $disburseDate   = $_POST['disburseDate'];
                $gurantee1Name   = $_POST['gurantee1Name'];
                $gurantee1NIC    = $_POST['gurantee1NIC'];
                $gurantee1ContactNo = $_POST['gurantee1ContactNo'];
                $gurantee1ad1 = $_POST['gurantee1ad1'];
                $gurantee1ad2 = $_POST['gurantee1ad2'];
                $gurantee2Name  = $_POST['gurantee2Name'];
                $gurantee2NIC   = $_POST['gurantee2NIC'];
                $gurantee2ContactNo = $_POST['gurantee2ContactNo'];
                $gurantee2ad1 = $_POST['gurantee2ad1'];
                $gurantee2ad2 = $_POST['gurantee2ad2'];
                $loanStep  = $_POST['loanStep'];
                $status    = $_POST['status'];
                $reason    = $_POST['reason'];

                $year =  date("Y");
                $month = date("m");
                $createDate = date("Y-m-d");

                ///////////////summarry query starts///////////

                $querySummary = "SELECT id ,loanAMT FROM summary WHERE year='$year' AND month='$month' ";
                $resultSummary = mysqli_query($conn ,$querySummary);

                $countSummary =mysqli_num_rows($resultSummary);

                if($countSummary>0){

                    while($rowSummary = mysqli_fetch_array($resultSummary)){

                        $oldLoanAMT = $rowSummary['loanAMT'];
                        $id = $rowSummary['id'];
                    }

                    if($old_loanAmt<$loanAmt){
                         $newLoanAMT = ($oldLoanAMT + ($loanAmt-$old_loanAmt));
                         $queryRow ="UPDATE summary SET loanAMT='$newLoanAMT' WHERE id='$id' ";
                         $rowRow =mysqli_query($conn,$queryRow);
                    }else if($old_loanAmt>$loanAmt){
                        $newLoanAMT = ($oldLoanAMT - ($old_loanAmt-$loanAmt));
                        $queryRow ="UPDATE summary SET loanAMT='$newLoanAMT' WHERE id='$id' ";
                        $rowRow =mysqli_query($conn,$queryRow);
                    }

                }else{

                    $query ="INSERT INTO  summary (year,month,loanAMT,createDate)  VALUES (?,?,?,?)";

                    $stmt =mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$query))
                    {
                        echo "SQL Error";
                    }
                    else
                    {
                        mysqli_stmt_bind_param($stmt,"ssss",$year,$month,$loanAmt,$createDate);
                        $result =  mysqli_stmt_execute($stmt);
                    }

                    for ($x = 1; $x < 13; $x++) {
                
                        if($month !=str_pad($x, 2, "0", STR_PAD_LEFT)){

                        $queryDefult ="INSERT INTO  summary (year,month,createDate)  VALUES (?,?,?)";

                        $stmt =mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$queryDefult))
                        {
                            echo "SQL Error";
                        }
                        else
                        {
                            mysqli_stmt_bind_param($stmt,"sss",$year,str_pad($x, 2, "0", STR_PAD_LEFT),$createDate);
                            $result =  mysqli_stmt_execute($stmt);
                        }

                        }
                    }
                }
                
                $update = mysqli_query($conn,"UPDATE loan SET branch='$branch',centerID ='$center',loanType ='$loan_type',contractNo = '$contractNo',loanAmt = '$loanAmt',terms = '$terms',interestRate = '$intRate',rental = '$rental',daily_rental ='$daily_rental',totalAmt = '$tot_amt',inspectionDate = '$inspectionDate',disburseDate = '$disburseDate',gurantee1Name = '$gurantee1Name',gurantee1NIC = '$gurantee1NIC',gurantee1ContactNo ='$gurantee1ContactNo', gurantee1ad1 ='$gurantee1ad1', gurantee1ad2='$gurantee1ad2',gurantee2Name = '$gurantee2Name',gurantee2NIC = '$gurantee2NIC',gurantee2ContactNo = '$gurantee2ContactNo', gurantee2ad1 = '$gurantee2ad1', gurantee2ad2='$gurantee2ad2',loanStep = '$loanStep',status = '$status',reason = '$reason' WHERE loan_no = '$loan_no'");

                if($update){
                    echo  1;
                }else{
                    echo  mysqli_error($conn);		
                }

            }else{
                echo  $loan_no;
            }

        }

    ?>