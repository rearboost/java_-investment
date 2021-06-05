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
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Select From Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="fdate" id="fdate">
                                    </div>    
                                </div>
                                <button type="button" onclick="cancelForm()" class="btn btn-warning btn-fw">Cancel</button>                        
                            </div>
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Select To Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="tdate" id="tdate">
                                    </div>    
                                </div>                        
                            </div>
                            <div class="col-md-2">
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

            <?php if (isset($_GET['view_id1']) && isset($_GET['view_id2'])): ?>
            
            <form class="forms-sample" id="profit_form">

                <input type="hidden" value ='<?php echo $_GET['view_id1']; ?>' name="fdate">
                <input type="hidden" value ='<?php echo $_GET['view_id2']; ?>' name="tdate">

                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        <center><b><h5> <?php echo $_GET['view_id1']; ?> &nbsp; to &nbsp; <?php echo $_GET['view_id2']; ?></h5></b></center>
                        <br>
                    
                    
                        <div class="row">
                    
                        <?php 

                        //if(isset($_GET['view_btn'])){

                          $fdate = $_GET['view_id1'];
                          $tdate = $_GET['view_id2'];

                          $sql = mysqli_query($conn, "SELECT disburseDate,SUM(loanAmt) as total_loan FROM loan WHERE disburseDate BETWEEN '$fdate' AND '$tdate' GROUP BY disburseDate");
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
                                    <th>Loan Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    $numRows = mysqli_num_rows($sql); 
                                
                                    if($numRows > 0) {
                                        $i = 1;

                                        while($row = mysqli_fetch_assoc($sql)) {

                                        $disburseDate  = $row['disburseDate'];
                                        $total_loan = number_format($row['total_loan'],2,'.',',');

                                        

                                        echo ' <tr>';
                                        echo ' <td style="display: none;">'.$i.' </td>';
                                        echo ' <td>'.$disburseDate.' </td>';
                                        echo ' <td>'.$total_loan.' </td>';
                                        echo ' </tr>';
                                        $i++;
                                        }
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

      var fdate = $('#fdate').val();
      var tdate = $('#tdate').val();

      if(fdate && tdate){      
        window.location.href = "loan_report.php?view_id1="+fdate+"&view_id2="+ tdate;
      }else{
        alert("Please select date range first");
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