<!DOCTYPE html>
<html lang="en">
 <?php
    // Database Connection
    require '../include/config.php';
  ?>
  <!-- include head code here -->
  <?php  include('../include/head.php');   ?>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <!-- include nav code here -->
      <?php  include('../include/nav.php');   ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <!-- include sidebar code here -->
        <?php  include('../include/sidebar.php');   ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a href="#"> | REPORT</a></li>
                      <li><a href="#"> | LOAN REPORT</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="col-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                    <form>
                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group row">
                                <div class="col-sm-12">
                                <SELECT class="form-control" name="center" id="center" required>
                                  <option disabled="" selected="">--Choose a  Center--</option>
                                  <?php
                                    $custom = "SELECT * FROM center";
                                    $result = mysqli_query($conn,$custom);
                                    $numRows = mysqli_num_rows($result); 
                    
                                    if($numRows > 0) {
                                        while($row1 = mysqli_fetch_assoc($result)) {
                                            echo '<option value ="'.$row1["id"].'">' . $row1["center_code"]. ' | ' .$row1["center_name"];
                                        }
                                    }
                                  ?>
                                </SELECT>
                                </div>
                              </div>
                              <button type="button" onclick="cancelForm()" class="btn btn-warning btn-fw">Cancel</button>  
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">From </label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="fdate" id="fdate">
                                    </div>    
                                </div>                       
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">To </label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tdate" id="tdate">
                                    </div>    
                                </div>                        
                            </div>
                            <div class="col-md-1">
                               <div class="form-group row">
                                 <button type="button" id="view_btn" class="btn btn-primary btn-fw">View</button>  
                               </div>                        
                            </div>
                        </div>
                      </form>
                  </div>
                </div>
            </div>
            <br>

            <?php if (isset($_GET['view_id']) && isset($_GET['view_id1']) && isset($_GET['view_id2'])): ?>
            
            <form class="forms-sample" id="profit_form">

                <input type="hidden" value ='<?php echo $_GET['view_id']; ?>' name="center">
                <input type="hidden" value ='<?php echo $_GET['view_id1']; ?>' name="fdate">
                <input type="hidden" value ='<?php echo $_GET['view_id2']; ?>' name="tdate">

                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <?php
                          $center = $_GET['view_id'];
                          $fdate = $_GET['view_id1'];
                          $tdate = $_GET['view_id2'];

                          $getName = mysqli_query($conn, "SELECT * FROM center WHERE id=$center ");
                          $val = mysqli_fetch_assoc($getName);
                          $centerName = $val['center_name'];
                          $centerCode = $val['center_code'];
                      ?>
                        <center><b><h5> <?php echo $_GET['view_id1']; ?> &nbsp; to &nbsp; <?php echo $_GET['view_id2'] . ' In ' . $centerName . ' ['. $centerCode. ']'; ?></h5></b></center>
                        <br>
                    
                    
                        <div class="row">
                    
                        <?php 

                        //if(isset($_GET['view_btn'])){

                          $sql = mysqli_query($conn, "SELECT disburseDate,SUM(loanAmt) as total_loan FROM loan WHERE (disburseDate BETWEEN '$fdate' AND '$tdate') AND centerId=$center GROUP BY disburseDate");

                          // $total = mysqli_query($conn, "SELECT SUM(loanAmt) as totalAmt FROM loan WHERE (disburseDate BETWEEN '$fdate' AND '$tdate') AND centerId=$center GROUP BY centerId");
                          // $printTot = mysqli_fetch_assoc($total);
                          // $amt = $printTot['totalAmt'];

                        //}
                    
                        ?>

                       <!-- <h4 class="card-title">Materials</h4> -->
                        <div class="table-responsive">
                            <div id="printablediv">
                            <table class="table table-bordered" id="costing_bom_table">
                                <thead>
                                    <tr>
                                    <th style="display: none;"> # </th>
                                    <th>Date</th>
                                    <th style="text-align:right;">Loan Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    $numRows = mysqli_num_rows($sql); 
                                    if($numRows > 0) {
                                        $i = 1;
                                        $amt=0;

                                        while($row = mysqli_fetch_assoc($sql)) {

                                        $disburseDate  = $row['disburseDate'];
                                        $total_loan = $row['total_loan'];
                                        $amt=$amt+$total_loan;

                                        echo ' <tr>';
                                        echo ' <td style="display: none;">'.$i.' </td>';
                                        echo ' <td>'.$disburseDate.' </td>';
                                        echo ' <td style="text-align:right;">'.number_format($total_loan,2,'.',',').' </td>';
                                        echo ' </tr>';
                                        $i++;
                                        }
                                        echo ' <tr style="background-color:#CC9CD6;">';
                                        echo ' <td style="display: none;">'.$i.' </td>';
                                        echo ' <th>Total </th>';
                                        echo ' <th style="text-align:right;">'.number_format($amt, 2, '.', ',').' </th>';
                                        echo ' </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            </div>

                            <br>
                             
                            <button type="button"  onclick="javascript:printDiv('printablediv');" class="btn btn-info btn-fw" >PRINT</button>                          
                        </div> 
                   </div>
                 </div>
               </div>
              </div>
            </form>
           <?php else: ?>

           <?php endif ?>
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <!-- include footer coe here -->
          <?php include('../include/footer.php');   ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- include footer coe here -->
    <?php include('../include/footer-js.php');   ?>

  </body>
</html>


<script>

    $("#view_btn").on('click',function(){

      var center = $('#center').val();
      var fdate = $('#fdate').val();
      var tdate = $('#tdate').val();

      if(center && fdate && tdate){      
        window.location.href = "loan_report.php?view_id="+center+"&view_id1="+fdate+"&view_id2="+ tdate;
      }else{
        alert("Please select date range with Your center");
      }
    });


    function cancelForm(){

        window.location.href = "loan_report.php";
    }

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


  </script>