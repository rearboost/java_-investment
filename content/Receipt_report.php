<?php 
// Database Connection
require '../include/config.php';
?>
<?php if (isset($_POST['center3']) && isset($_POST['fdate3']) && isset($_POST['tdate3'])): ?>
    <input type="hidden" value ='<?php echo $_POST['center3']; ?>' name="center3">
    <input type="hidden" value ='<?php echo $_POST['fdate3']; ?>' name="fdate3">
    <input type="hidden" value ='<?php echo $_POST['tdate3']; ?>' name="tdate3">

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Receipt Report</h4>
          <?php

              $fdate  = $_POST['fdate3'];
              $tdate  = $_POST['tdate3'];
              $level3  = $_POST['level3'];
                

              if($_POST['center3']=="all"){
                $center = "Nugegoda";
            ?>
                <center><b><h5> <?php echo $_POST['fdate3']; ?> &nbsp; to &nbsp; <?php echo $_POST['tdate3'] . ' In ' .  $center; ?></h5></b></center>
            <?php

              }else{
                $center = $_POST['center3'];

                $getName = mysqli_query($conn, "SELECT * FROM center WHERE center_code='$center'");
                $val = mysqli_fetch_assoc($getName);
                $centerName = $val['center_name'];
                $centerID   = $val['id'];
            ?>

                <center><b><h5> <?php echo $_POST['fdate3']; ?> &nbsp; to &nbsp; <?php echo $_POST['tdate3'] . ' In ' . $centerName . ' [ '. $center. ' ]'; ?></h5></b></center>
            <?php
              }
              
          ?>
            <br>
        
        
            <div class="row">
        
            <?php 

            if($level3=="all"){

             // $q1 = "SELECT * FROM loan A INNER JOIN loan_installement B ON A.loan_no = B.loanNo WHERE (B.li_date BETWEEN '$fdate' AND '$tdate') AND A.branch='$center'";

              $sql = mysqli_query($conn, "SELECT * FROM loan A INNER JOIN loan_installement B ON A.loan_no = B.loanNo WHERE (B.li_date BETWEEN '$fdate' AND '$tdate') AND A.branch='$center'");

            }else if($level3=="MSU"){

             // $q1 = "SELECT * FROM loan A INNER JOIN loan_installement B ON A.loan_no = B.loanNo WHERE (B.li_date BETWEEN '$fdate' AND '$tdate') AND A.centerId='$centerID'";

              $sql = mysqli_query($conn, "SELECT * FROM loan A INNER JOIN loan_installement B ON A.loan_no = B.loanNo WHERE (B.li_date BETWEEN '$fdate' AND '$tdate') AND A.centerId='$centerID' AND B.paid !=0");
            }
            else if($level3=="Contract"){

              $contractNo = $_POST['center3'];

             // $q1 = "SELECT * FROM loan A INNER JOIN loan_installement B ON A.loan_no = B.loanNo WHERE (B.li_date BETWEEN '$fdate' AND '$tdate') AND A.contractNo='$contractNo'";

              $sql = mysqli_query($conn, "SELECT * FROM loan A INNER JOIN loan_installement B ON A.loan_no = B.loanNo WHERE (B.li_date BETWEEN '$fdate' AND '$tdate') AND A.contractNo='$contractNo'");
            }
        
            ?>

            <div class="table-responsive">
                <div id="printablediv">
                <table class="table table-bordered" id="report_table">
                    <thead>
                        <tr>
                        <th style="display: none;"> # </th>
                        <th>NIC</th>
                        <th>Name</th>
                        <th>Contract No</th>
                        <th style="text-align:right;">Loan Amount</th>
                        <th style="text-align:right;">Collect Amount</th>
                        <th>collected date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $numRows = mysqli_num_rows($sql); 
                        if($numRows > 0) {
                            $i = 1;
                            $toatLoanAmt = 0;
                            $toatPaid = 0;

                            while($row = mysqli_fetch_assoc($sql)) {

                            $customerID  = $row['customerID'];

                            $getCustomer = mysqli_query($conn, "SELECT * FROM customer WHERE cust_id = $customerID");
                            $cus_data = mysqli_fetch_assoc($getCustomer);

                            $NIC      = $cus_data['NIC'];
                            $customer = $cus_data['name'];
                            $contractNo = $row['contractNo'];
                            $loanAmt    = $row['loanAmt'];
                            $loan_no    = $row['loan_no'];

                            $toatLoanAmt = $toatLoanAmt + $loanAmt;

                            $getpayment = mysqli_query($conn, "SELECT * FROM loan_installement WHERE loanNo = '$loan_no' ORDER BY id DESC LIMIT 1");
                            $PCount = mysqli_num_rows($getpayment);

                            if($PCount>0){
                                
                                while($pay_data = mysqli_fetch_assoc($getpayment)) {

                                $paid   = $pay_data['paid'];
                                $li_date= $pay_data['li_date'];

                                $toatPaid = $toatPaid + $paid;

                                echo ' <tr>';
                                echo ' <td style="display: none;">'.$i.' </td>';
                                echo ' <td>'.$NIC.' </td>';
                                echo ' <td>'.$customer.' </td>';
                                echo ' <td>'.$contractNo.' </td>';
                                echo ' <td style="text-align:right;">'.number_format($loanAmt,2,'.',',').' </td>';
                                echo ' <td style="text-align:right;">'.number_format($paid,2,'.',',').' </td>';
                                echo ' <td>'.$li_date.' </td>';
                                echo ' </tr>';
                                }
                            
                            $i++;
                            }else{
                                $paid     = 0;
                                $li_date  = "0000-00-00";

                                echo ' <tr>';
                                echo ' <td style="display: none;">'.$i.' </td>';
                                echo ' <td>'.$NIC.' </td>';
                                echo ' <td>'.$customer.' </td>';
                                echo ' <td>'.$contractNo.' </td>';
                                echo ' <td style="text-align:right;">'.number_format($loanAmt,2,'.',',').' </td>';
                                echo ' <td style="text-align:right;">'.number_format($paid,2,'.',',').' </td>';
                                echo ' <td>'.$li_date.' </td>';
                                echo ' </tr>';
                            }
                            $i++;
                            }
                        }else{
                          echo '<tr>';
                          echo '<td colspan="8" class="text-center" style="color:red;">No data found</td>';
                          echo '</tr>';
                        }
                        ?>
                        <tr>
                        <th style="display: none;"> # </th>
                        <th></th>
                        <th></th>
                        <th>Total Amount</th>
                        <th style="text-align:right;"><?php if(isset($toatLoanAmt)){ echo number_format($toatLoanAmt,2,'.',',');} ?></th>
                        <th style="text-align:right;"><?php if(isset($toatPaid)){ echo number_format($toatPaid,2,'.',',');} ?></th>
                        <th></th>
                        </tr>
                    </tbody>
                </table>
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