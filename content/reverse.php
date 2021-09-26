<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';
     $row_num = 0;

  ?>
  <!-- include head code here -->
  <?php  include('../include/head.php');   ?>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                      <li><a href="#"> | DEBT COLLECTION REVERSE</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <!-- <form class="form-sample" id="collectionForm"> -->
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                    <h3 class="card-title">Search a receipt</h3>

                    <div class="row">

                      <div class="col-md-2">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Create Date </label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control" name="createDate" id="createDate" value="<?php echo date("Y-m-d"); ?>"/>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">MSU Code </label>
                            <div class="col-sm-8">
                               <input list="brow" class="form-control" name="center" id="center" >
                                <datalist id="brow">
                                <?php
                                  $center = "SELECT DISTINCT(C.center_code) AS center_code FROM center C INNER JOIN loan L ON C.id=L.centerID AND L.status=1";
                                  $result = mysqli_query($conn,$center);
                                  $numRows = mysqli_num_rows($result); 
                  
                                  if($numRows > 0) {
                                      while($dl = mysqli_fetch_assoc($result)) {
                                          echo '<option value ="'.$dl["center_code"].'">';
                                      }
                                  }
                                ?>
                                </datalist> 
                            </div>
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Contract No </label>
                            <div class="col-sm-7">
                               <input list="brow_loan" class="form-control" name="contractNo" id="contractNo" >
                                <datalist id="brow_loan" style="height: 100px;">
                                <?php
                                  $loan = "SELECT contractNo FROM loan WHERE status=1";
                                  $result = mysqli_query($conn,$loan);
                                  $numRows = mysqli_num_rows($result); 
                  
                                  if($numRows > 0) {
                                      while($dl = mysqli_fetch_assoc($result)) {
                                          echo '<option value ="'.$dl["contractNo"].'">';
                                      }
                                  }
                                ?>
                                </datalist> 
                            </div>
                           <div class="col-sm-1 size">
                                <i class="fa fa-plus-circle pointer" onclick="ShowForm()"></i>   
                            </div>
                        </div>
                      </div>

                    </div>
                    </div>
                  </div>
                </div>
              </div>

              <div id="show">
              <?php if (isset($_GET['createDate']) && isset($_GET['center']) && isset($_GET['contractNo'])): ?>
              
                  <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <!-- <h5 class="card-title"></h5>
                          <div class="card-scroll"></div> -->
                          
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group row">
                                  <?php 

                                  $center_code = $_GET['center']; 
                                  $createDate =  $_GET['createDate'];
                                  $contractNo =  $_GET['contractNo'];

                                  ///////////////////////// CENTER DETAILS  /////////////////////////

                                  $getCenter = mysqli_query($conn, "SELECT * FROM center WHERE center_code='$center_code'");
                                  $cd = mysqli_fetch_assoc($getCenter);

                                  $center_id   = $cd['id'];
                                  $center_name = $cd['center_name'];
                                  $leader      = $cd['leader'];
                                  $contact     = $cd['contact'];
                                
                                  ///////////////////////// LOAN DETAILS  /////////////////////////

                                  $getLoan = mysqli_query($conn, "SELECT * FROM loan WHERE contractNo='$contractNo' AND centerID = $center_id");
                                  $lo = mysqli_fetch_assoc($getLoan);
                                  $loanID   = $lo['loanID'];
                                  $loan_no   = $lo['loan_no'];
                                  $loanAmt  = $lo['loanAmt'];
                                  $rental = $lo['rental'];

                                  ///////////////////////// LOAN INSTALLMENT DETAILS  /////////////////////////

                                  $fetchData = mysqli_query($conn, "SELECT * FROM loan_installement WHERE loanNo='$loan_no' AND li_date='$createDate'");
                                  $count1 = mysqli_num_rows($fetchData);

                                 ///TRUNCATE TABLE FIRST
                                  $sql ="TRUNCATE TABLE temp_collection";
                                  $result=mysqli_query($conn,$sql);
                        
                                  if($count1>0){

                                    while($row1 = mysqli_fetch_assoc($fetchData)){

                                        $loan_ins_id      = $row1['id'];
                                        $collectionID      = $row1['collectionID'];
                                        $li_date   = $row1['li_date'];
                                        $paid   = $row1['paid'];
                                        $arrears      = $row1['arrears'];
                                        $outstanding = $row1['outstanding'];
                                        $loanNo = $row1['loanNo'];                            
                                    }
                                  }

                                  ?>
                               
                                  <div class="col-md-3">
                                    <label class="col-sm-12 col-form-label"><strong>Formed Date : </strong> <?php echo $createDate; ?> </label>
                                  </div>

                                  <div class="col-md-3">
                                    <label class="col-sm-12 col-form-label"><strong>MSU Name : </strong> <?php echo $center_name; ?> </label>
                                  </div>

                                  <div class="col-md-4">
                                    <label class="col-sm-12 col-form-label"><strong>MSU Leader : </strong> <?php echo $leader .' [' . $contact . ']' ; ?> </label>
                                  </div>

                                  <div class="col-md-2">
                                    <label class="col-sm-12 col-form-label"><strong>Status : </strong> Active</label>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <hr><br>

                          <?php if ($count1>0): ?>

                          <div class="row">
                            <!-- <div class="col-md-12" style="height: 240px; overflow-y: auto;"> -->
                            <div class="col-md-12">
                            <!-- <div id="here"> -->

                              <input type="hidden" id="myitemjson" name="myitemjson"/>
                              <div class="table-responsive">          
                                <table id="example" class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th style="text-align:;">Loan No</th>
                                    <th style="text-align:left;">Date</th>
                                    <th style="text-align:left;">Customer</th>
                                    <th style="text-align:left;">Contact</th>
                                    <th style="text-align:left;">NIC</th>
                                    <th style="text-align:right;">Payment</th>
                                    <th style="text-align:right;">Rental</th>
                                    <th style="text-align:right;">Loan Amount</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php

                                    ///////////  CUSTOMER DERATILS  ///////////
                                    $cus = mysqli_query($conn, "SELECT C.name AS customer,C.NIC AS NIC , C.contact FROM customer C INNER JOIN loan L ON C.cust_id = L.customerID WHERE L.loan_no=$loanNo");
                                    $cusRow = mysqli_fetch_assoc($cus);
                                
                                    $customer = $cusRow['customer'];
                                    $NIC      = $cusRow['NIC'];
                                    $contact      = $cusRow['contact'];

                                    echo ' <tr>';
                                    echo ' <td>'.$loanID.'</td>';
                                    echo ' <td>'.$createDate.'</td>';
                                    echo ' <td>'.$customer.'</td>';
                                    echo ' <td>'.$contact.'</td>';
                                    echo ' <td>'.$NIC.'</td>';
                                    echo ' <td style="text-align:right;">'.number_format($paid, 2, '.', ',').'</td>';
                                    echo ' <td style="text-align:right;">'.number_format($rental, 2, '.', ',').'</td>';
                                    echo ' <td style="text-align:right;">'.number_format($loanAmt, 2, '.', ',').'</td>';
                                    echo ' </tr>';

                                   
                                ?>
                                </tbody>
                                </table>
                              </div>
                              <br><br>

                            <!--</div>
                              <input type="hidden" class="form-control" name="add" value="add" /> -->
                            <form id="reverse_form">

                                <input type="hidden" class="form-control" name="center_id" id="center_id" value="<?php echo $center_id; ?>" />
                                <input type="hidden" class="form-control" name="li_date" id="li_date" value="<?php echo $createDate; ?>" />
                                <input type="hidden" class="form-control" name="paid" id="paid" value="<?php echo $paid; ?>" />
                                <input type="hidden" class="form-control" name="loan_ins_id" id="loan_ins_id" value="<?php echo $loan_ins_id; ?>" />
                                <input type="hidden" class="form-control" name="rental" id="rental" value="<?php echo $rental; ?>" />
                                <input type="hidden" class="form-control" name="balance" id="balance" value="<?php echo $outstanding; ?>" />
                                <input type="hidden" class="form-control" name="loan_no" id="loan_no" value="<?php echo $loan_no; ?>" />

                              <!-- <input type="number" name="" id="test" value="0"> -->
                              <input type="hidden" class="form-control" name="reverse" value="reverse" />
                              <button type="submit" class="btn btn-danger btn-fw">Reverse</button>
                              <button type="button" class="btn btn-primary btn-fw" onclick="cancelForm()">Cancel</button>        

                            </form>
                                  
                            </div>
                          </div>

                          <?php else: ?>
                            <center><b><?php  echo "No data found !! "; ?></b></center>
                          <?php endif ?>

                        </div>
                      </div>
                    </div>
                  </div>
                  </div> 
                <!-- </form>
               -->
            <?php else: ?>
            <?php endif ?>
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
    //////////////////////// CLEAR THE LOCAL STORAGE ////////////////////////
    localStorage.clear();
  
    $(document).ready( function () {
      //tmpEmpty();
      $('#myTable').DataTable();
    }); 
    
    function ShowForm(){

      var center = $('#center').val();
      var createDate = $('#createDate').val();
      var contractNo = $('#contractNo').val();

      if(center&&createDate&&contractNo){
        window.location.href = "reverse.php?center="+center+"&createDate="+createDate+"&contractNo="+contractNo;

      }else{
          alert('Selcet MSU Code and loan ID First');
      }
    }


    //Reverse Item Form
    $(function () {

    $('#reverse_form').on('submit', function (e) {
      e.preventDefault();

        var paid   = $('#paid').val();

        swal({
            title: "Are you sure?",
            text: "Once submit, you will not be able to recover this details !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willReverse) => {
            if (willReverse) {
              
               if(paid!=""){

                      $.ajax({
                        type: 'post',
                        url: '../controller/debt_collection_controller.php',
                        data: $('#reverse_form').serialize(),
                        success: function (data) {

                            if(data==1){
                            
                                swal("Successfully Submited !", {
                                icon: "success",
                                });
                            }
                            // Location refech
                            setTimeout(function(){location.reload(); },3000);
                        }
                    });
                
              }else{
                  alert('Required Field is Empty');
              }
            } 
        });

      });
    });

    function cancelForm(){
        window.location.href = "reverse.php";
    }

</script>