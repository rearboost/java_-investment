    <?php
        // Database Connection
        require '../include/config.php';
        
        // Update Function 
        if(isset($_POST['add'])){

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
            $gurantee1      = $_POST['gurantee1'];
            $gurantee2      = $_POST['gurantee2'];
            $loanStep       = $_POST['loanStep'];

            // customer details
            $cust_id       = $_POST['cust_id'];
            $contact1      = $_POST['contact1'];
            $contact2      = $_POST['contact2'];
            $address       = $_POST['address'];


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


            $insert = mysqli_query($conn,"INSERT INTO loan (branch,centerID,customerID,loanType,contractNo,loanAmt,terms,interestRate,rental,daily_rental,totalAmt,inspectionDate,disburseDate,gurantee1,gurantee2,loanStep,status) VALUES ('$branch','$center','$cust_id','$loan_type','$contractNo','$loanAmt','$terms','$intRate','$rental','$daily_rental','$tot_amt','$inspectionDate','$disburseDate','$gurantee1','$gurantee2','$loanStep',1)");

            if($insert){
                $updateCustomer = mysqli_query($conn, "UPDATE customer SET contact =$contact1, contact2=$contact2, address='$address' WHERE cust_id=$cust_id");
                if($updateCustomer){ 
                    echo  1;
                }else{
                    echo  0;
                }
            }else{
                echo  mysqli_error($conn);		
            }

        }

    ?>