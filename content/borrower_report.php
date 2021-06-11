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
                      <li><a href="#"> REPORT</a></li>
                      <li><a href="#"> CLIENT REPORT</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="col-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                    <!-- <h4 class="card-title">Job Status report</h4> -->
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Select Borrower Type</label>
                                    <div class="col-sm-7">
                                        <input list="brow" class="form-control" name="type" id="type" required>
                                          <datalist id="brow">
                                               <option value ="All">
                                               <option value ="Active">
                                               <option value ="Deactive">
                                          </datalist> 
                                    </div>
                                </div>
                                <button type="button" onclick="cancelForm()" class="btn btn-warning btn-fw">Cancel</button>                        
                            </div>
                        </div>
                  </div>
                </div>
            </div>
            <br>

            <?php if (isset($_GET['view_id'])): ?>
            
            <form class="forms-sample" id="report_form">

                <input type="hidden" value ='<?php echo $_GET['view_id']; ?>' name="type">

                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        <center><b><h5><?php echo $_GET['view_id']; ?> Borrowers</h5></b></center>
                        <br>
                        <div class="row">
                    
                        <?php 

                        $type = $_GET['view_id'];
                        //   $sql_buyerName=mysqli_query($conn,"SELECT * FROM po_entering WHERE status='$poNo'");
                        //   $row_buyerName= mysqli_fetch_assoc($sql_buyerName);
                        //   $bpo_no = $row_buyerName['bpo_no'];

                        if($type =='All'){

                          $sql = mysqli_query($conn, "SELECT * FROM customer");

                        }else if($type =='Active'){

                          $sql = mysqli_query($conn, "SELECT * FROM customer C INNER JOIN loan L ON C.cust_id=L.customerID WHERE L.status='1'");

                        }else if($type =='Deactive'){

                          $sql = mysqli_query($conn, "SELECT * FROM customer C INNER JOIN loan L ON C.cust_id=L.customerID WHERE L.status='0' AND C.cust_id NOT IN (SELECT customerID FROM loan WHERE status='1')");
                        }
                    
                        ?>

                       <!-- <h4 class="card-title">Materials</h4> -->
                        <div class="table-responsive">
                            <div id="printablediv">
                            <table class="table table-bordered" id="costing_bom_table">
                                <thead>
                                    <tr>
                                    <th> # </th>
                                    <th>Member # </th>
                                    <th>Center</th>
                                    <th>Name</th>
                                    <th>NIC</th>
                                    <th>Contact </th>
                                    <th>Address </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    $numRows = mysqli_num_rows($sql); 
                                
                                    if($numRows > 0) {
                                        $i = 1;

                                        while($row = mysqli_fetch_assoc($sql)) {

                                        $memberID  = $row['memberID'];
                                        $centerID   = $row['centerID'];
                                        $name = $row['name'];
                                        $NIC = $row['NIC'];
                                        $contact = $row['contact'];
                                        $address = $row['address'];

                                        $center = mysqli_query($conn, "SELECT * FROM center WHERE id='$centerID'");
                                        $detail = mysqli_fetch_assoc($center);

                                        $center_name = $detail['center_name'];

                                        echo ' <tr>';
                                        echo ' <td>'.$i.' </td>';
                                        echo ' <td>'.$memberID.' </td>';
                                        echo ' <td>'.$center_name.' </td>';
                                        echo ' <td>'.$name.' </td>';
                                        echo ' <td>'.$NIC.' </td>';
                                        echo ' <td>'.$contact.' </td>';
                                        echo ' <td>'.$address.' </td>';
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
                            <br>
                            <br>                       
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
   
    ////////////// status get  ///////////////////////
    $("#type").on('change',function(){

      var type = $(this).val();
      if(type){     
        window.location.href = "borrower_report.php?view_id=" + type;
      }
    });

    function cancelForm(){

        window.location.href = "borrower_report.php";
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