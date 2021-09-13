<?php 
// Database Connection
require '../include/config.php';
?>
<?php if (isset($_POST['center4'])): ?>
    <input type="hidden" value ='<?php echo $_POST['center4']; ?>' name="center4">
   
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Portfolio Report</h4>
          <?php
              $center = $_POST['center4'];
              // $fdate  = $_POST['fdate4'];
              // $tdate  = $_POST['tdate4'];

              $getName = mysqli_query($conn, "SELECT * FROM center WHERE center_code='$center'");
              $val = mysqli_fetch_assoc($getName);
              $centerName = $val['center_name'];
              $centerID   = $val['id'];
          ?>
            <center><b><h5> <?php echo $centerName . ' [ '. $center. ' ]'; ?></h5></b></center>
            <br>
      
            <div class="row">
        
            <?php 
              $sql = mysqli_query($conn, "SELECT * FROM loan WHERE centerID=$centerID AND status=1");
            ?>

            <div class="table-responsive">
                <div id="printablediv">
                <table class="table table-bordered" id="report_table">
                    <thead>
                        <tr>
                        <th style="display: none;"> # </th>
                        <th>Contract No</th>
                        <th>Customer</th>
                        <th>NIC</th>
                        <th>Rental</th>
                        <th>Arrears</th>
                        <th>Balance</th>
                        <th>Loan Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $numRows = mysqli_num_rows($sql); 
                        if($numRows > 0) {

                            $i = 1;
                            $totalRental = 0;
                            $totalArrears = 0;
                            $totalLoanAmt = 0;
                            $total_due = 0;

                            while($row = mysqli_fetch_assoc($sql)) {

                            $loan_no      = $row['loan_no'];
                            $contractNo   = $row['contractNo'];
                            $customerID   = $row['customerID'];
                            $loanAmt      = $row['loanAmt'];
                            $rental = $row['rental'];

                            $totalRental = $totalRental + $rental;
                            $totalLoanAmt = $totalLoanAmt + $loanAmt;

                            $fetchInst = mysqli_query($conn, "SELECT * FROM loan_installement WHERE loanNo='$loan_no' ORDER BY id DESC LIMIT 1");
                            $count2 = mysqli_num_rows($fetchInst);
                              
                            if(!$count2==0){
                              $row2 = mysqli_fetch_assoc($fetchInst);
                              
                              $arrears  = $row2['arrears'];
                              $balance  = $row2['outstanding'];
                              $bef_date = $row2['li_date'];
                            }else{
                              $arrears  = 0;
                              $balance  = $row['totalAmt'];
                              $bef_date = $row['disburseDate'];
                            }

                            $totalArrears = $totalArrears + $arrears;

                            $cus = mysqli_query($conn, "SELECT C.name AS customer,C.NIC AS NIC , C.contact FROM customer C INNER JOIN loan L ON C.cust_id = L.customerID WHERE L.loan_no=$loan_no");
                            $cusRow = mysqli_fetch_assoc($cus);

                            $customer = $cusRow['customer'];
                            $NIC      = $cusRow['NIC'];

                            $total_due = $total_due + $balance;

                            echo ' <tr>';
                            echo ' <td style="display: none;">'.$i.' </td>';
                            echo ' <td>'.$contractNo.' </td>';
                            echo ' <td>'.$customer.' </td>';
                            echo ' <td>'.$NIC.' </td>';
                            echo ' <td style="text-align:right;">'.number_format($rental,2,'.',',').' </td>';
                            echo ' <td style="text-align:right;">'.number_format($arrears,2,'.',',').' </td>';
                            echo ' <td style="text-align:right;">'.number_format($balance,2,'.',',').' </td>';
                            echo ' <td style="text-align:right;">'.number_format($loanAmt,2,'.',',').' </td>';
                            echo ' </tr>';
                            $i++;
                            }
                        }else{
                          echo '<tr>';
                          echo '<td colspan="8" class="text-center" style="color:red;">No data found</td>';
                          echo '</tr>';
                        }
                        ?>
                        <tr>
                        <th style="display: none;"></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th style="text-align:right;"><?php if(isset($totalRental)){echo number_format($totalRental,2,'.',',');} ?></th>
                        <th style="text-align:right;"><?php if(isset($totalArrears)){echo number_format($totalArrears,2,'.',',');} ?></th>
                        <th style="text-align:right;"><?php if(isset($total_due)){echo number_format($total_due,2,'.',',');} ?></th>
                        <th style="text-align:right;"><?php if(isset($totalLoanAmt)){echo number_format($totalLoanAmt,2,'.',',');} ?></th>
                        </tr>
                    </tbody>
                </table>
                <br>
                <b><p>Total Collection :  <?php if(isset($total_due)){ echo number_format($total_due,2,'.',',');} ?> </p></b>
                </div>
                <br>
                <button type="button"  onclick="javascript:printDiv('printablediv');" class="btn btn-info btn-fw" >PRINT</button>                          
                <button type="button"  onclick="cancelTab()" class="btn btn-danger btn-fw" >Cancel</button>                          
            </div> 
       </div>
     </div>
   </div>
   
<?php else: ?>

<?php endif ?>

<script>
      function printDiv(divID)
    {
     
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;

    }

    function cancelTab(){
      window.location.href = "report.php";
    }
</script>