<?php 
// Database Connection
require '../include/config.php';
?>
<?php if (isset($_POST['center4']) && isset($_POST['fdate4']) && isset($_POST['tdate4'])): ?>
    <input type="hidden" value ='<?php echo $_POST['center4']; ?>' name="center4">
    <input type="hidden" value ='<?php echo $_POST['fdate4']; ?>' name="fdate4">
    <input type="hidden" value ='<?php echo $_POST['tdate4']; ?>' name="tdate4">

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Portfolio Report</h4>
          <?php
              $center = $_POST['center4'];
              $fdate  = $_POST['fdate4'];
              $tdate  = $_POST['tdate4'];

              $getName = mysqli_query($conn, "SELECT * FROM center WHERE center_code='$center'");
              $val = mysqli_fetch_assoc($getName);
              $centerName = $val['center_name'];
              $centerID   = $val['id'];
          ?>
            <center><b><h5> <?php echo $_POST['fdate4']; ?> &nbsp; to &nbsp; <?php echo $_POST['tdate4'] . ' In ' . $centerName . ' ['. $center. ']'; ?></h5></b></center>
            <br>
        
        
            <div class="row">
        
            <?php 

              $sql = mysqli_query($conn, "SELECT * FROM portfolio WHERE (date BETWEEN '$fdate' AND '$tdate') AND center_id=$centerID");
        
            ?>

            <div class="table-responsive">
                <div id="printablediv">
                <table class="table table-bordered" id="report_table">
                    <thead>
                        <tr>
                        <th style="display: none;"> # </th>
                        <th>Date</th>
                        <th style="text-align:right;">Outstanding</th>
                        <th style="text-align:right;">Bank</th>
                        <th style="text-align:right;">Other Investment (01)</th>
                        <th style="text-align:right;">Other Investment (02)</th>
                        <th style="text-align:right;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $numRows = mysqli_num_rows($sql); 
                        if($numRows > 0) {
                            $i = 1;

                            while($row = mysqli_fetch_assoc($sql)) {

                            $date           = $row['date'];
                            $outstanding    = $row['outstanding'];
                            $bank           = $row['bank'];
                            $other1         = $row['other1'];
                            $other2         = $row['other2'];
                            $total          = $row['total'];


                            echo ' <tr>';
                            echo ' <td style="display: none;">'.$i.' </td>';
                            echo ' <td>'.$date.' </td>';
                            echo ' <td style="text-align:right;">'.number_format($outstanding,2,'.',',').' </td>';
                            echo ' <td style="text-align:right;">'.number_format($bank,2,'.',',').' </td>';
                            echo ' <td style="text-align:right;">'.number_format($other1,2,'.',',').' </td>';
                            echo ' <td style="text-align:right;">'.number_format($other2,2,'.',',').' </td>';
                            echo ' <td style="text-align:right;">'.number_format($total,2,'.',',').' </td>';
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