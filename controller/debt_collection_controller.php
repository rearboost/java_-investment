    <?php
        // Database Connection
        require '../include/config.php';
        require '../include/check.php';

        if(isset($_POST['checkFlag'])){
            $Availability = mysqli_query($conn, "SELECT * FROM temp_collection");
            $RowCount = mysqli_num_rows($Availability);

            if($RowCount==0){
                echo 1;
            }else{
                echo 0;
            }
        }

        // // Row Add Function 
        // if(isset($_POST['addrow'])){

        //     $li_date     = $_POST['li_date'];
        //     $payment     = $_POST['payment'];
        //     $arrears     = $_POST['arrears'];
        //     $totalPaid   = $_POST['totalPaid'];
        //     $outstanding = $_POST['outstanding'];
        //     $loan_no     = $_POST['loan_no'];

        //     $checkSql = mysqli_query($conn, "SELECT * FROM temp_collection WHERE li_date='$li_date' AND loanNo=$loan_no ");
        //     $count1 = mysqli_num_rows($checkSql);

        //     if($count1>0){
        //         echo 2;
        //     }else{
        //         $tempInsert = mysqli_query($conn, "INSERT INTO temp_collection(li_date,paid,arrears,total_paid,outstanding,loanNo) VALUES('$li_date','$payment','$arrears','$totalPaid','$outstanding',$loan_no)");
                
        //         if($tempInsert){
        //             echo 1;
        //         }else{
        //             echo  mysqli_error($conn);
        //         }
        //     }
            
        // }

        /////////Add function from dashboard items

        // Table Empty Function 
        if(isset($_POST['tmpEmpty'])){
            
            $empty_temp = "TRUNCATE temp_collection;";
            mysqli_query($conn,$empty_temp);   
            
        }

       

        // Save Function 
        if(isset($_POST['save'])){

            $li_date   = $_POST['li_date'];
            $center_id = $_POST['center_id'];

            $date_val = explode('-', $li_date);
            $year  = $date_val['0'];
            $month = $date_val['1'];

            $getTot = mysqli_query($conn, "SELECT SUM(paid) AS tot_collection, SUM(Arrears) AS tot_arrears, SUM(balance) AS tot_outstanding FROM temp_collection");
            $getData = mysqli_fetch_assoc($getTot);

            // $cdate          = $getData['cdate'];
            $tot_collection = $getData['tot_collection'];
            $tot_arrears    = $getData['tot_arrears'];
            $tot_outstanding= $getData['tot_outstanding'];

            $user= $_SESSION['username'];
            $getcenter=mysqli_query($conn,"SELECT * FROM user WHERE username='$user'");
            $centerData = mysqli_fetch_assoc($getcenter);
            $center_id = $centerData['center_id'];
            
            $sql_collect = mysqli_query($conn,"INSERT INTO collection(centerID,li_date,year,month,tot_collection,tot_arrears,tot_outstanding) VALUES ($center_id,'$li_date','$year','$month','$tot_collection','$tot_arrears','$tot_outstanding')");


            //// update Summary ////

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

                $newDebtAMT = ($oldDebtAMT +$tot_collection);

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
                    mysqli_stmt_bind_param($stmt,"ssss",$year,$month,$tot_collection,$createDate);
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

            //// insert data to the loan installements table from temp_collection table

            $sqlMax =mysqli_query($conn,"SELECT id FROM collection ORDER BY id DESC LIMIT 1");
            $row_get = mysqli_fetch_assoc($sqlMax);
            $collectionID = $row_get['id'];

            $sql_temp=mysqli_query($conn,"SELECT * FROM temp_collection");
            $numRows = mysqli_num_rows($sql_temp); 

            if($numRows > 0) {

                while($row = mysqli_fetch_assoc($sql_temp)) {

                    $paid        =$row['paid'];
                    $arrears     =$row['Arrears'];
                    $outstanding =$row['balance'];
                    $loanNo      =$row['loan_no'];

                    // update status when outstandin=0

                    if($outstanding<=0){
                        $updateStatus = mysqli_query($conn, "UPDATE loan status=0 WHERE loan_no=$loanNo ");
                    }
                    
                    $sqlInst = "INSERT INTO loan_installement (collectionID,  li_date,paid,arrears,outstanding,loanNo) VALUES ('$collectionID','$li_date','$paid','$arrears','$outstanding','$loanNo')";
                    mysqli_query($conn,$sqlInst);
                }
            }

            if($sql_collect){
                
                echo 1;

            }else{
                echo  mysqli_error($conn);		
            }
        }
       
    ?>