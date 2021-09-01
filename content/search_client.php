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
                      <li><a href="#"> CLIENT</a></li>
                      <li><a href="#"> SEARCH A CLIENT </a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="col-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                    <strong><h3><i class="mdi mdi-account" aria-hidden="true"></i>
                      Client Profile</h3></strong>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Client NIC Number</label>
                                <div class="col-sm-7">
                                <input list="brow" class="form-control" name="customer" id="customer" required>
                                  <datalist id="brow">
                                    <?php
                                      $custom = "SELECT * FROM customer";
                                      $result = mysqli_query($conn,$custom);
                                      $numRows = mysqli_num_rows($result); 
                      
                                      if($numRows > 0) {
                                          while($row1 = mysqli_fetch_assoc($result)) {
                                              echo '<option value ="'.$row1["NIC"].'">';
                                          }
                                      }
                                    ?>
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
            
            <form class="forms-sample" id="report_form" style="margin: 0 0.7%;">

                <input type="hidden" value ='<?php echo $_GET['view_id']; ?>' name="customer">
                <?php 

                  $NIC = $_GET['view_id'];

                  $getCustomer = mysqli_query($conn, "SELECT * FROM customer WHERE NIC='$NIC'");
                  $row1 = mysqli_fetch_assoc($getCustomer);
                    
                  $cust_id  = $row1['cust_id'];
                  $name     = $row1['name'];
                  $memberID = $row1['memberID'];
                  $addLine1  = $row1['addLine1'];
                  $addLine2  = $row1['addLine2'];
                  $addLine3  = $row1['addLine3'];
                  $nic      = $row1['NIC'];
                  $contact  = $row1['contact'];
                  $contact2 = $row1['contact2'];
                  $image    = $row1['image'];
                  $image2   = $row1['image2'];

                  //////////////
                  $getCustomerLoan = mysqli_query($conn, "SELECT * FROM loan WHERE customerID='$cust_id' AND status =1");
                  $row2 = mysqli_fetch_assoc($getCustomerLoan);
                  $countLoan =mysqli_num_rows($getCustomerLoan); 
                  if($countLoan>0){

                    $gurantee1Name  = $row2['gurantee1Name'];
                    $gurantee1NIC = $row2['gurantee1NIC'];
                    $gurantee1ContactNo  = $row2['gurantee1ContactNo'];
                    $gurantee2Name   = $row2['gurantee2Name'];
                    $gurantee2NIC   = $row2['gurantee2NIC'];
                    $gurantee2ContactNo   = $row2['gurantee2ContactNo'];
                  }
              
                ?>
                <div class="row">
                <div class="col-lg-2 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <br>
                      <h5>  Display Profile </h5> <hr>
                      <div class="row">
                        <?php
                        echo '<img src="../upload/'.$image.'" height="60%" width="60%" alt="'.$image.'">';
                        ?>
                      </div>
                      <p></p>
                      <div class="row">
                        <?php
                        echo '<img src="../upload/'.$image2.'" height="60%" width="60%" alt="'.$image2.'">';
                        ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-10 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        <br>
                        <h5>Client Information </h5> <hr>
                        <div class="row">
                          <div class="table-responsive mb-5">
                          <table class="table" border="0">
                            <tr>
                              <th>Member ID  </th>
                              <td><?php echo ' : ' . $memberID; ?></td>
                            </tr>
                            <tr>
                              <th>Name  </th>
                              <td><?php echo ' : ' . $name; ?></td>
                            </tr>
                            <tr>
                              <th>NIC  </th>
                              <td><?php echo ' : ' . $nic; ?></td>
                            </tr>
                            <tr>
                              <th>Address  </th>
                              <td><?php echo ' : ' . $addLine1.", ".$addLine2.", ".$addLine3; ?></td>
                            </tr>
                            <tr>
                              <th>Contact 01  </th>
                              <td><?php echo ' : ' . $contact; ?></td>
                            </tr>
                            <tr>
                              <th>Contact 02  </th>
                              <td><?php echo ' : ' . $contact2; ?></td>
                            </tr>

                            <?php if ($countLoan>0): ?>
                              <tr>
                                <th> </th>
                                <td></td>
                              </tr>
                              <tr>
                                <th>Gurantee 01 Name  </th>
                                <td><?php echo ' : ' . $gurantee1Name; ?></td>
                              </tr>
                              <tr>
                                <th>Gurantee 01 NIC No  </th>
                                <td><?php echo ' : ' . $gurantee1NIC; ?></td>
                              </tr>
                              <tr>
                                <th>Gurantee 01 Contact No  </th>
                                <td><?php echo ' : ' . $gurantee1ContactNo; ?></td>
                              </tr>

                              <tr>
                                <th>Gurantee 02 Name  </th>
                                <td><?php echo ' : ' . $gurantee2Name; ?></td>
                              </tr>
                              <tr>
                                <th>Gurantee 02 NIC No  </th>
                                <td><?php echo ' : ' . $gurantee2NIC; ?></td>
                              </tr>
                              <tr>
                                <th>Gurantee 02 Contact No  </th>
                                <td><?php echo ' : ' . $gurantee2ContactNo; ?></td>
                              </tr>

                            <?php else: ?>

                            <?php endif ?>

                             

                          </table>
                      </div>
                          

                       <!-- loan details of selected customer -->
                        <div class="table-responsive">
                            <div id="printablediv">
                            <table class="table table-bordered" id="loan_table">
                                <thead>
                                    <tr>
                                      <th colspan="6" class="text-center">Loan Summary</th>
                                    </tr>
                                    <tr>
                                    <th style="display: none;"> # </th>
                                    <th>Loan index </th>
                                    <th>Loan type</th>
                                    <th>Contract no</th>
                                    <th>Disburse Date</th>
                                    <th>Loan Amount</th>
                                    <th>Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM loan WHERE customerID ='$cust_id' ");
                                    $numRows = mysqli_num_rows($sql); 
                                
                                    if($numRows > 0) {
                                        $i = 1;

                                        while($row2 = mysqli_fetch_assoc($sql)) {

                                        $loan_no      = $row2['loan_no'];
                                        $loanID      = $row2['loanID'];
                                        $loanType     = $row2['loanType'];
                                        $contractNo   = $row2['contractNo'];
                                        $disburseDate = $row2['disburseDate'];
                                        $loanAmt      = $row2['loanAmt'];
                                        $status       = $row2['status'];

                                        echo ' <tr>';
                                        echo ' <td style="display: none;">'.$i.' </td>';
                                        echo ' <td>'.$loanID.' </td>';
                                        echo ' <td>'.$loanType.' </td>';
                                        echo ' <td>'.$contractNo.' </td>';
                                        echo ' <td>'.$disburseDate.' </td>';
                                        echo ' <td>'.number_format($loanAmt, 2, '.', ',').' </td>';
                                        if($status==1){
                                            echo ' <label class="badge badge-warning" style="font-size:12px;">'."Active".'</label> ';
                                        }else if($status==0){
                                            echo ' <label class="badge badge-danger" style="font-size:12px;">'."Closed".'</label> ';
                                        }else{
                                            echo ' <label class="badge badge-dark" style="font-size:12px;">'."Rejected".'</label> ';
                                        }
                                        echo ' </tr>';
                                        $i++;
                                        }
                                    }else{
                                      echo ' <tr>';
                                      echo ' <td  class="text-center" colspan="6" style="color:red;">'."Loan options are not available under this client".' </td>';
                                      echo ' </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            </div>
                            <br>                      
                        </div> 

                        <!-- payment of selected customer -->
                        <div class="table-responsive">
                            <div id="printablediv">
                            <table class="table table-bordered" id="payment_table">
                                <thead>
                                    <tr>
                                      <th colspan="5" class="text-center">Client Transaction Summary</th>
                                    </tr>
                                    <tr>
                                    <th style="display: none;"> # </th>
                                    <th>Contract no </th>
                                    <th>Payment date</th>
                                    <th>Payment</th>
                                    <th>Arrears</th>
                                    <th>Outstanding</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql2 = mysqli_query($conn, "SELECT * FROM loan L RIGHT JOIN loan_installement I ON L.loan_no = I.loanNo WHERE L.customerID ='$cust_id' ORDER BY loanNo ASC");
                                    $numRows2 = mysqli_num_rows($sql2); 
                                
                                    if($numRows2 > 0) {
                                        $i = 1;

                                        while($row3 = mysqli_fetch_assoc($sql2)) {

                                        $contractNo    = $row3['contractNo'];
                                        $li_date       = $row3['li_date'];
                                        $paid          = $row3['paid'];
                                        $arrears       = $row3['arrears'];
                                        $outstanding   = $row3['outstanding'];

                                        echo ' <tr>';
                                        echo ' <td style="display: none;">'.$i.' </td>';
                                        echo ' <td>'.$contractNo.' </td>';
                                        echo ' <td>'.$li_date.' </td>';
                                        echo ' <td>'.number_format($paid, 2, '.', ',').' </td>';
                                        echo ' <td>'.number_format($arrears, 2, '.', ',').' </td>';
                                        echo ' <td>'.number_format($outstanding, 2, '.', ',').' </td>';
                                        echo ' </tr>';
                                        $i++;
                                        }
                                    }else{
                                      echo ' <tr>';
                                      echo ' <td  class="text-center" colspan="5" style="color:red;">'."No available Payments yet".' </td>';
                                      echo ' </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            </div>
                            <br>                      
                        </div> 

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
    $("#customer").on('change',function(){

      var customer = $(this).val();
      if(customer){     
        window.location.href = "search_client.php?view_id="+ customer;
      }

    });

    function cancelForm(){

        window.location.href = "search_client.php";
    }

    // function printDiv(divID)
    // {
     
    //     //Get the HTML of div
    //     var divElements = document.getElementById(divID).innerHTML;
    //     //Get the HTML of whole page
    //     var oldPage = document.body.innerHTML;

    //     //Reset the page's HTML with div's HTML only
    //     document.body.innerHTML =
    //         "<html><head><title></title></head><body>" +
    //         divElements + "</body>";

    //     //Print Page
    //     window.print();

    //     //Restore orignal HTML
    //     document.body.innerHTML = oldPage;

    // }


  </script>