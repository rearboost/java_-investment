<?php 
// Database Connection
require '../include/config.php';
?>
<?php if (isset($_POST['center2']) && isset($_POST['fdate2']) && isset($_POST['tdate2'])): ?>
    <input type="hidden" value ='<?php echo $_POST['center2']; ?>' name="center2">
    <input type="hidden" value ='<?php echo $_POST['fdate2']; ?>' name="fdate2">
    <input type="hidden" value ='<?php echo $_POST['tdate2']; ?>' name="tdate2">

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Investment Report</h4>
          <?php
              $center = $_POST['center2'];
              $fdate  = $_POST['fdate2'];
              $tdate  = $_POST['tdate2'];

              $getName = mysqli_query($conn, "SELECT * FROM center WHERE center_code='$center'");
              $val = mysqli_fetch_assoc($getName);
              $centerName = $val['center_name'];
              $centerID   = $val['id'];
          ?>
            <center><b><h5> <?php echo $_POST['fdate2']; ?> &nbsp; to &nbsp; <?php echo $_POST['tdate2'] . ' In ' . $centerName . ' ['. $center. ']'; ?></h5></b></center>
            <br>
        
        
            <div class="row">
        
            <?php 

              $sql = mysqli_query($conn, "SELECT * FROM loan WHERE (disburseDate BETWEEN '$fdate' AND '$tdate') AND centerId=$centerID");
        
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
                        <th>Loan Step</th>
                        <th>Loan Type</th>
                        <th>Disburse Date</th>
                        <th style="text-align:right;">Loan Amount</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $numRows = mysqli_num_rows($sql); 
                        if($numRows > 0) {
                            $i = 1;

                            while($row = mysqli_fetch_assoc($sql)) {

                            $customerID  = $row['customerID'];

                            $getCustomer = mysqli_query($conn, "SELECT * FROM customer WHERE cust_id = $customerID");
                            $cus_data = mysqli_fetch_assoc($getCustomer);

                            $NIC      = $cus_data['NIC'];
                            $customer = $cus_data['name'];

                            $contractNo     = $row['contractNo'];
                            $step           = $row['loanStep'];
                            $loanType       = $row['loanType'];
                            $disburseDate   = $row['disburseDate'];
                            $loanAmt        = $row['loanAmt'];
                            $status         = $row['status'];

                            echo ' <tr>';
                            echo ' <td style="display: none;">'.$i.' </td>';
                            echo ' <td>'.$NIC.' </td>';
                            echo ' <td>'.$customer.' </td>';
                            echo ' <td>'.$contractNo.' </td>';
                            echo ' <td>'.$step.' </td>';
                            echo ' <td>'.$loanType.' </td>';
                            echo ' <td>'.$disburseDate.' </td>';
                            echo ' <td style="text-align:right;">'.number_format($loanAmt,2,'.',',').' </td>';
                            if($status==1){
                              echo ' <td><label class="badge badge-warning" style="font-size:12px;">'."Active".'</label> </td>';
                            }else{
                              echo ' <td><label class="badge badge-danger" style="font-size:12px;">'."Closed".'</label> </td>';
                            }
                            echo ' </tr>';
                            $i++;
                            }
                        }else{
                          echo '<tr>';
                          echo '<td colspan="8" class="text-center" style="color:red;">No data found</td>';
                          echo '</tr>';
                        }
                        ?>
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