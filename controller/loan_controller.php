    <?php
        // Database Connection
        require '../include/config.php';
        
        // Update Function 
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
                $gurantee2Name      = $_POST['gurantee2Name'];
                $gurantee2NIC       = $_POST['gurantee2NIC'];
                $gurantee2ContactNo = $_POST['gurantee2ContactNo'];
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
                
                $insert = mysqli_query($conn,"INSERT INTO loan (loanID,branch,centerID,customerID,loanType,contractNo,loanAmt,terms,interestRate,rental,daily_rental,totalAmt,inspectionDate,disburseDate,gurantee1Name,gurantee1NIC,gurantee1ContactNo,gurantee2Name,gurantee2NIC,gurantee2ContactNo,loanStep,status) VALUES ('$loanID','$branch','$center','$cust_id','$loan_type','$contractNo','$loanAmt','$terms','$intRate','$rental','$daily_rental','$tot_amt','$inspectionDate','$disburseDate','$gurantee1Name','$gurantee1NIC','$gurantee1ContactNo','$gurantee2Name','$gurantee2NIC','$gurantee2ContactNo','$loanStep',1)");

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

    ?>