<?php
    // Database Connection
    require '../include/config.php';
    
    // Update Function 
    if(isset($_POST['add'])){

        $li_date       = $_POST['li_date'];
        $customer      = $_POST['customer'];
        //$loan_no       = $_POST['loan_no'];
        $contractNo    = $_POST['contractNo'];
        $payment       = $_POST['payment'];
        $outstanding   = $_POST['outstanding'];
        $totalPaid     = $_POST['totalPaid'];
        $arrears       = $_POST['arrears'];

        
        $year =  date("Y");
        $month = date("m");
        $createDate = date("Y-m-d");

        $querySummary = "SELECT id ,debtAMT FROM summary WHERE year='$year' AND month='$month' ";
        $resultSummary = mysqli_query($conn ,$querySummary);

        $countSummary =mysqli_num_rows($resultSummary);

        if($countSummary>0){

            while($rowSummary = mysqli_fetch_array($resultSummary)){

                $oldDebtAMT = $rowSummary['debtAMT'];
                $id = $rowSummary['id'];
            }

            $newDebtAMT = ($oldDebtAMT +$payment);

            $queryRow ="UPDATE summary SET debtAMT='$newDebtAMT' WHERE id='$id' ";
            $rowRow =mysqli_query($conn,$queryRow);

        }else{

            $query ="INSERT INTO  summary (year,month,debtAMT,createDate)  VALUES (?,?,?,?)";

            $stmt =mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$query))
            {
                echo "SQL Error";
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"ssss",$year,$month,$payment,$createDate);
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

        $loan = mysqli_query($conn,"SELECT loan_no FROM loan WHERE contractNo='$contractNo' ");
        $row_l = mysqli_fetch_assoc($loan);
        $loan_no = $row_l['loan_no'];

        $insert = "INSERT INTO loan_installement (li_date,month,year,paid,arrears,total_paid,outstanding,loanNo) VALUES ('$li_date','$month','$year','$payment','$arrears','$totalPaid','$outstanding','$loan_no')";

        $result = mysqli_query($conn,$insert);

        if($outstanding <= 0){
            $update_status = mysqli_query($conn,"UPDATE loan SET status =0 WHERE loan_no=$loan_no");
        }

        if($result){
            echo  1;
        }else{
            echo  mysqli_error($conn);		
        }
        
    }

?>