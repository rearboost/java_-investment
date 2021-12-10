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
                      <li><a href="#"> | Summary & Portfolio</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div style="display: flex;">
               <div class="col-4 stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Centers Summary</h4>
                      <form class="forms-sample" id="centersSummaryForm">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <?php

                                ///////////////// OUTSTANDING ///////////////////
                                $today = date('Y-m-d');
                                $total_Pay = 0;
                                $total_Ban = 0;
                              
                                //////////////////  GET Portfolio DETAILS ///////////
                                $sql_p=mysqli_query($conn,"SELECT * FROM centersSummaryTB");  
                                $numRows = mysqli_num_rows($sql_p); 
                                if($numRows > 0) {

                                    while($row = mysqli_fetch_assoc($sql_p)) {  

                                      $ang1_Pay      = $row['ang1_Pay'];
                                      $ang2_Pay      = $row['ang2_Pay'];
                                      $ang3_Pay      = $row['ang3_Pay'];
                                      $ang4_Pay      = $row['ang4_Pay'];
                                      $ang5_Pay      = $row['ang5_Pay'];
                                      $ang6_Pay      = $row['ang6_Pay'];
                                      $ang7_Pay      = $row['ang7_Pay'];

                                      $total_Pay =  $ang1_Pay +  $ang2_Pay +  $ang3_Pay +  $ang4_Pay +  $ang5_Pay +  $ang6_Pay + $ang7_Pay; 
                                  
                                      //// TOTAL 
                                      // $total = $bank+$other1+$other2+$other3+$other4+$other5;
                                    }
                                }

                              ?>
                      
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <!-- ///////////////////////////////////////////// -->
                              <?php

                                  $centerID = "1";
                                  $outstandingANG01 = 0;
                                  $sql_bal = mysqli_query($conn, "SELECT * FROM loan WHERE centerID=$centerID AND status=1");
                                  ////////
                                  while($row = mysqli_fetch_assoc($sql_bal)) {
                                      $loan_no      = $row['loan_no'];

                                      $fetchInst = mysqli_query($conn, "SELECT * FROM loan_installement WHERE loanNo='$loan_no' ORDER BY id DESC LIMIT 1");
                                      $count2 = mysqli_num_rows($fetchInst);
                                        if(!$count2==0){
                                          $row2 = mysqli_fetch_assoc($fetchInst);
                                          $balance01  = $row2['outstanding'];
                                        }else{
                                          $balance01  = $row['totalAmt'];
                                        }
                                        $outstandingANG01 = $outstandingANG01 + $balance01;
                                       
                                    }
                                     $ang1_Ban = $outstandingANG01 - $ang1_Pay;
                                     
                              ?>
                               <!-- ///////////////////////////////////////////// -->

                              
                              <label class="col-sm-3 col-form-label">ANG 01</label>
                              <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right" id="outstandingANG01" value="<?php  if(isset($outstandingANG01)){ echo $outstandingANG01;  } ?>" readonly>
                              </div>
                               <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number"  step="any" class="form-control text-right" name="ang1_Pay" id="ang1_Pay" value="<?php  if(isset($ang1_Pay)){ echo $ang1_Pay;  } ?>" required="">
                              </div>
                               <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right"  value="<?php  if(isset($ang1_Ban)){ echo $ang1_Ban;  } ?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                               <!-- ///////////////////////////////////////////// -->
                               <?php

                                  $centerID = "2";
                                  $outstandingANG02 = 0;
                                  $sql_bal = mysqli_query($conn, "SELECT * FROM loan WHERE centerID=$centerID AND status=1");
                                  ////////
                                  while($row = mysqli_fetch_assoc($sql_bal)) {
                                      $loan_no      = $row['loan_no'];

                                      $fetchInst = mysqli_query($conn, "SELECT * FROM loan_installement WHERE loanNo='$loan_no' ORDER BY id DESC LIMIT 1");
                                      $count2 = mysqli_num_rows($fetchInst);
                                        if(!$count2==0){
                                          $row2 = mysqli_fetch_assoc($fetchInst);
                                          $balance02  = $row2['outstanding'];
                                        }else{
                                          $balance02  = $row['totalAmt'];
                                        }
                                        $outstandingANG02 = $outstandingANG02 + $balance02;
                                    }
                                    $ang2_Ban = $outstandingANG02 - $ang2_Pay;
                                    
                              ?>
                               <!-- ///////////////////////////////////////////// -->

                              <label class="col-sm-3 col-form-label">ANG 02</label>
                              <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right"  id="outstandingANG02" value="<?php  if(isset($outstandingANG02)){ echo $outstandingANG02;  } ?>" readonly>
                              </div>
                               <div class="col-sm-3"  style="display: inherit; padding-left: inherit;">
                                 <input type="number" step="any" class="form-control text-right" name="ang2_Pay" id="ang2_Pay" value="<?php  if(isset($ang2_Pay)){ echo $ang2_Pay;  } ?>" required="">
                              </div>
                               <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right" name="ang2_Ban" id="ang2_Ban" value="<?php  if(isset($ang2_Ban)){ echo $ang2_Ban;  } ?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                               <!-- ///////////////////////////////////////////// -->
                               <?php

                                  $centerID = "3";
                                  $outstandingANG03 = 0;
                                  $sql_bal = mysqli_query($conn, "SELECT * FROM loan WHERE centerID=$centerID AND status=1");
                                  ////////
                                  while($row = mysqli_fetch_assoc($sql_bal)) {
                                      $loan_no      = $row['loan_no'];

                                      $fetchInst = mysqli_query($conn, "SELECT * FROM loan_installement WHERE loanNo='$loan_no' ORDER BY id DESC LIMIT 1");
                                      $count2 = mysqli_num_rows($fetchInst);
                                        if(!$count2==0){
                                          $row2 = mysqli_fetch_assoc($fetchInst);
                                          $balance03  = $row2['outstanding'];
                                        }else{
                                          $balance03  = $row['totalAmt'];
                                        }
                                        $outstandingANG03 = $outstandingANG03 + $balance03;
                                    }
                                    $ang3_Ban = $outstandingANG03 - $ang3_Pay;
                                    
                              ?>
                               <!-- ///////////////////////////////////////////// -->

                              <label class="col-sm-3 col-form-label">ANG 03</label>
                              <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right calc" id="outstandingANG03" value="<?php  if(isset($outstandingANG03)){ echo $outstandingANG03;  } ?>" readonly>
                              </div>
                               <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" step="any" class="form-control text-right" name="ang3_Pay" id="ang3_Pay" value="<?php  if(isset($ang3_Pay)){ echo $ang3_Pay;  } ?>" required="">
                              </div>
                               <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right" name="ang3_Ban" id="ang3_Ban" value="<?php  if(isset($ang3_Ban)){ echo $ang3_Ban;  } ?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                               <!-- ///////////////////////////////////////////// -->
                               <?php

                                  $centerID = "4";
                                  $outstandingANG04 = 0;
                                  $sql_bal = mysqli_query($conn, "SELECT * FROM loan WHERE centerID=$centerID AND status=1");
                                  ////////
                                  while($row = mysqli_fetch_assoc($sql_bal)) {
                                      $loan_no      = $row['loan_no'];

                                      $fetchInst = mysqli_query($conn, "SELECT * FROM loan_installement WHERE loanNo='$loan_no' ORDER BY id DESC LIMIT 1");
                                      $count2 = mysqli_num_rows($fetchInst);
                                        if(!$count2==0){
                                          $row2 = mysqli_fetch_assoc($fetchInst);
                                          $balance04  = $row2['outstanding'];
                                        }else{
                                          $balance04  = $row['totalAmt'];
                                        }
                                        $outstandingANG04 = $outstandingANG04 + $balance04;
                                    }
                                    $ang4_Ban = $outstandingANG04 - $ang4_Pay;
                                   
                              ?>
                               <!-- ///////////////////////////////////////////// -->

                              <label class="col-sm-3 col-form-label">ANG 04</label>
                              <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right" id="outstandingANG04" value="<?php  if(isset($outstandingANG04)){ echo $outstandingANG04;  } ?>" readonly>
                              </div>
                               <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" step="any" class="form-control text-right" name="ang4_Pay" id="ang4_Pay" value="<?php  if(isset($ang4_Pay)){ echo $ang4_Pay;  } ?>" required="">
                              </div>
                               <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right" name="ang4_Ban" id="ang4_Ban" value="<?php  if(isset($ang4_Ban)){ echo $ang4_Ban;  } ?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                                <!-- ///////////////////////////////////////////// -->
                               <?php

                                  $centerID = "5";
                                  $outstandingANG05 = 0;
                                  $sql_bal = mysqli_query($conn, "SELECT * FROM loan WHERE centerID=$centerID AND status=1");
                                  
                                  while($row = mysqli_fetch_assoc($sql_bal)) {
                                      $loan_no      = $row['loan_no'];

                                      $fetchInst = mysqli_query($conn, "SELECT * FROM loan_installement WHERE loanNo='$loan_no' ORDER BY id DESC LIMIT 1");
                                      $count2 = mysqli_num_rows($fetchInst);
                                        if(!$count2==0){
                                          $row2 = mysqli_fetch_assoc($fetchInst);
                                          $balance05  = $row2['outstanding'];
                                        }else{
                                          $balance05  = $row['totalAmt'];
                                        }
                                        $outstandingANG05 = $outstandingANG05 + $balance05;
                                    }
                                    $ang5_Ban = $outstandingANG05 - $ang5_Pay;
                                  
                              ?>
                               <!-- ///////////////////////////////////////////// -->
                              <label class="col-sm-3 col-form-label">ANG 05</label>
                              <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right"  id="outstandingANG05" value="<?php  if(isset($outstandingANG05)){ echo $outstandingANG05;  } ?>" readonly>
                              </div>
                               <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" step="any" class="form-control text-right" name="ang5_Pay" id="ang5_Pay" value="<?php  if(isset($ang5_Pay)){ echo $ang5_Pay;  } ?>" required="">
                              </div>
                               <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right" name="ang5_Ban" id="ang5_Ban" value="<?php  if(isset($ang5_Ban)){ echo $ang5_Ban;  } ?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                               <!-- ///////////////////////////////////////////// -->
                               <?php

                                  $centerID = "6";
                                  $outstandingANG06 = 0;
                                  $sql_bal = mysqli_query($conn, "SELECT * FROM loan WHERE centerID=$centerID AND status=1");
                                  ////////
                                  while($row = mysqli_fetch_assoc($sql_bal)) {
                                      $loan_no      = $row['loan_no'];

                                      $fetchInst = mysqli_query($conn, "SELECT * FROM loan_installement WHERE loanNo='$loan_no' ORDER BY id DESC LIMIT 1");
                                      $count2 = mysqli_num_rows($fetchInst);
                                        if(!$count2==0){
                                          $row2 = mysqli_fetch_assoc($fetchInst);
                                          $balance06  = $row2['outstanding'];
                                        }else{
                                          $balance06  = $row['totalAmt'];
                                        }
                                        $outstandingANG06 = $outstandingANG06 + $balance06;
                                    }
                                    $ang6_Ban = $outstandingANG06 - $ang6_Pay;

                              ?>
                               <!-- ///////////////////////////////////////////// -->
                              <label class="col-sm-3 col-form-label">ANG 06</label>
                              <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right" id="outstandingANG06" value="<?php  if(isset($outstandingANG06)){ echo $outstandingANG06;  } ?>" readonly>
                              </div>
                               <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" step="any" class="form-control text-right" name="ang6_Pay" id="ang6_Pay" value="<?php  if(isset($ang6_Pay)){ echo $ang6_Pay;  } ?>" required="">
                              </div>
                               <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right" name="ang6_Ban" id="ang6_Ban" value="<?php  if(isset($ang6_Ban)){ echo $ang6_Ban;  } ?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                          <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                               <!-- ///////////////////////////////////////////// -->
                               <?php

                                  $centerID = "7";
                                  $outstandingANG07 = 0;
                                  $sql_bal = mysqli_query($conn, "SELECT * FROM loan WHERE centerID=$centerID AND status=1");
                                  ////////
                                  while($row = mysqli_fetch_assoc($sql_bal)) {
                                      $loan_no      = $row['loan_no'];

                                      $fetchInst = mysqli_query($conn, "SELECT * FROM loan_installement WHERE loanNo='$loan_no' ORDER BY id DESC LIMIT 1");
                                      $count2 = mysqli_num_rows($fetchInst);
                                        if(!$count2==0){
                                          $row2 = mysqli_fetch_assoc($fetchInst);
                                          $balance07 = $row2['outstanding'];
                                        }else{
                                          $balance07  = $row['totalAmt'];
                                        }
                                        $outstandingANG07 = $outstandingANG07 + $balance07;
                                    }
                                    $ang7_Ban = $outstandingANG07 - $ang7_Pay;

                              ?>
                               <!-- ///////////////////////////////////////////// -->
                              <label class="col-sm-3 col-form-label">ANG 07</label>
                              <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right" id="outstandingANG07" value="<?php  if(isset($outstandingANG07)){ echo $outstandingANG07;  } ?>" readonly>
                              </div>
                               <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" step="any" class="form-control text-right" name="ang7_Pay" id="ang7_Pay" value="<?php  if(isset($ang7_Pay)){ echo $ang7_Pay;  } ?>" required="">
                              </div>
                               <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right" name="ang7_Ban" id="ang7_Ban" value="<?php  if(isset($ang7_Ban)){ echo $ang7_Ban;  } ?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php 
                              //////////////////////////////////////
                              $outstanding = $outstandingANG01 + $outstandingANG02 + $outstandingANG03 + $outstandingANG04 + $outstandingANG05 + $outstandingANG06 + $outstandingANG07;
                              $total_Ban = $outstanding - $total_Pay;
                              //////////////////////////////////////
                        ?>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Total</label>
                              <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right calc"  value="<?php  if(isset($outstanding)){ echo $outstanding;  } ?>" readonly>
                              </div>
                               <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" step="any" class="form-control text-right calc" name="total_Pay" id="total_Pay" value="<?php  if(isset($total_Pay)){ echo $total_Pay;  } ?>" required="">
                              </div>
                               <div class="col-sm-3" style="display: inherit; padding-left: inherit;">
                                 <input type="number" class="form-control text-right calc" name="total_Ban" id="total_Ban" value="<?php  if(isset($total_Ban)){ echo $total_Ban;  } ?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>

                        <input type="hidden" class="form-control" name="addCS" value="addCS" />
                        <button type="submit" class="btn btn-success mr-2">Save</button>
                        <!-- <button class="btn btn-light">Cancel</button> -->
                    </form>
                      
                    </div>
                </div>
               </div>
               <br>
               <div class="col-4 stretch-card">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Outside Cash</h4>
                      <form class="forms-sample" id="outsideCashForm">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              
                            <?php

                               ///////////////// OUTSTANDING ///////////////////
                               $today = date('Y-m-d');
                               $outstanding = 0;
                               $sql = mysqli_query($conn, "SELECT * FROM center");
                               $numRows = mysqli_num_rows($sql);
                               if($numRows > 0) {

                                  while($row = mysqli_fetch_assoc($sql)) {

                                    $centerID = $row['id'];
                                    $totalBalance = 0 ;
                                    $sql_bal = mysqli_query($conn, "SELECT * FROM loan WHERE centerID=$centerID AND status=1");

                                    ////////
                                    while($row = mysqli_fetch_assoc($sql_bal)) {
                                        $loan_no      = $row['loan_no'];

                                        $fetchInst = mysqli_query($conn, "SELECT * FROM loan_installement WHERE loanNo='$loan_no' ORDER BY id DESC LIMIT 1");
                                        $count2 = mysqli_num_rows($fetchInst);
                                         if(!$count2==0){
                                            $row2 = mysqli_fetch_assoc($fetchInst);
                                            $balance  = $row2['outstanding'];
                                          }else{
                                            $balance  = $row['totalAmt'];
                                          }
                                           $totalBalance  =   $totalBalance + $balance;
                                         
                                     }
                                      $outstanding = $outstanding + $totalBalance;
                                  }
                               } 
                             
                              //////////////////  GET Portfolio DETAILS ///////////
                              $sql_p=mysqli_query($conn,"SELECT * FROM portfolio");  
                              $numRows = mysqli_num_rows($sql_p); 
                              if($numRows > 0) {

                                  while($row = mysqli_fetch_assoc($sql_p)) {  
                                    $bank      = $row['bank'];
                                    $textOther1  = $row['textOther1'];
                                    $other1      = $row['other1'];
                                    $textOther2  = $row['textOther2'];
                                    $other2      = $row['other2'];
                                    $textOther3  = $row['textOther3'];
                                    $other3      = $row['other3'];
                                    $textOther4  = $row['textOther4'];
                                    $other4      = $row['other4'];
                                    $textOther5  = $row['textOther5'];
                                    $other5      = $row['other5'];
                                    //// TOTAL 
                                    $total = $bank+$other1+$other2+$other3+$other4+$other5;
                                  }
                               }

                            ?>
                        
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-6 col-form-label">Cash In Bank</label>
                              <div class="col-sm-6" style="display: inherit;">
                                 <input type="number" class="form-control text-right calc" name="bank" id="bank" value="<?php  if(isset($bank)){ echo $bank;  } ?>" required="">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <!-- <label class="col-sm-4 col-form-label">Other (1)</label> -->
                              <div class="col-sm-12" style="display: inherit; padding: 0px;">
                                <div class="col-sm-6" ><input type="text"  class="form-control" name="textOther1" id="textOther1" value="<?php  if(isset($textOther1)){ echo $textOther1;  } ?>" required=""></div>
                                <div class="col-sm-6" ><input type="number" class="form-control text-right calc" name="other1" id="other1" value="<?php  if(isset($other1)){ echo $other1;  } ?>" required=""></div>                              
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <!-- <label class="col-sm-4 col-form-label">Other (2)</label> -->
                              <div class="col-sm-12" style="display: inherit; padding: 0px;">
                                 <div class="col-sm-6" ><input type="text"   class="form-control" name="textOther2" id="textOther2" required="" value="<?php  if(isset($textOther2)){ echo $textOther2;  } ?>"></div>
                                 <div class="col-sm-6" ><input type="number"   class="form-control text-right calc" name="other2" id="other2" value="<?php  if(isset($other2)){ echo $other2;  } ?>" required=""></div>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <!-- <label class="col-sm-4 col-form-label">Other (3)</label> -->
                              <div class="col-sm-12" style="display: inherit; padding: 0px;">
                                 <div class="col-sm-6" ><input type="text"  class="form-control" name="textOther3" id="textOther3" required="" value="<?php  if(isset($textOther3)){ echo $textOther3;  } ?>"></div>
                                 <div class="col-sm-6" ><input type="number"  class="form-control text-right calc" name="other3" id="other3" value="<?php  if(isset($other3)){ echo $other3;  } ?>" required=""></div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <!-- <label class="col-sm-4 col-form-label">Other (3)</label> -->
                              <div class="col-sm-12" style="display: inherit; padding: 0px;">
                                 <div class="col-sm-6" ><input type="text"  class="form-control" name="textOther4" id="textOther4" required="" value="<?php  if(isset($textOther4)){ echo $textOther4;  } ?>"></div>
                                 <div class="col-sm-6" ><input type="number"  class="form-control text-right calc" name="other4" id="other4" value="<?php  if(isset($other4)){ echo $other4;  } ?>" required=""></div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <!-- <label class="col-sm-4 col-form-label">Other (3)</label> -->
                              <div class="col-sm-12" style="display: inherit; padding: 0px;">
                                 <div class="col-sm-6" ><input type="text"  class="form-control" name="textOther5" id="textOther5" required="" value="<?php  if(isset($textOther5)){ echo $textOther5;  } ?>"></div>
                                 <div class="col-sm-6" ><input type="number"  class="form-control text-right calc" name="other5" id="other5" value="<?php  if(isset($other5)){ echo $other5;  } ?>" required=""></div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-6 col-form-label">Total Amount</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control text-right" name="total" id="total" required="" value="<?php  if(isset($total)){ echo number_format((float)($total), 2, '.', '');  } ?>" readonly="">
                              </div>
                            </div>
                          </div>
                        </div>

                        <input type="hidden" class="form-control" name="add" value="add" />
                        <button type="submit" class="btn btn-primary btn-fw">Save</button>
                        <!-- <button class="btn btn-light">Cancel</button> -->
                      </form>
                    
                    </div>
                </div>
              </div>
              <!-- ////////// -->
               <div class="col-2 stretch-card">
                <div class="card" style="height: 243px; border: 1px solid;">
                    <div class="card-body">
                      <h4 class="card-title">Portfolio</h4>
                      <form class="forms-sample" id="portfolioForm">
                       
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-6 col-form-label">Portfolio</label>
                              <div class="col-sm-6" style="display: inherit;">
                                 <?php  if(isset($outstanding)){ echo number_format($outstanding,2,'.',',');  } ?>
                              </div>
                            </div>
                          </div>
                        </div>

                         <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-6 col-form-label">Outside Cash</label>
                              <div class="col-sm-6" style="display: inherit;">
                                <?php   if(isset($total)){ echo number_format($total,2,'.',',');  } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr style="border: 1px solid;">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-6 col-form-label"><b>Profit</b></label>
                              <div class="col-sm-6" style="display: inherit;">
                                <b><?php   if(isset($total)){ echo  number_format(($total+$outstanding),2,'.',',');   } ?></b>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- <button class="btn btn-light">Cancel</button> -->
                      </form>
                    
                    </div>
                </div>
              </div>



            </div> 
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
    $(document).ready( function () {
      
      ////////////////////
      $('#ang1_Pay').keyup(function() {
          var ang1_Pay = this.value;
          var outstandingANG01 = $('#outstandingANG01').val();
          var ang1_Ban = outstandingANG01 - ang1_Pay
          $('#ang1_Ban').val(ang1_Ban)
          getPayToatal();

      });

      ////////////////////
      $('#ang2_Pay').keyup(function() {
          var ang2_Pay = this.value;
          var outstandingANG02 = $('#outstandingANG02').val();
          var ang2_Ban = outstandingANG02 - ang2_Pay
          $('#ang2_Ban').val(ang2_Ban)
          getPayToatal();

      });

       ////////////////////
      $('#ang3_Pay').keyup(function() {
          var ang3_Pay = this.value;
          var outstandingANG03 = $('#outstandingANG03').val();
          var ang3_Ban = outstandingANG03 - ang3_Pay
          $('#ang3_Ban').val(ang3_Ban)
          getPayToatal();

      });

       ////////////////////
      $('#ang4_Pay').keyup(function() {
          var ang4_Pay = this.value;
          var outstandingANG04 = $('#outstandingANG04').val();
          var ang4_Ban = outstandingANG04 - ang4_Pay
          $('#ang4_Ban').val(ang4_Ban)
          getPayToatal();

      });

      ////////////////////
      $('#ang5_Pay').keyup(function() {
          var ang5_Pay = this.value;
          var outstandingANG05 = $('#outstandingANG05').val();
          var ang5_Ban = outstandingANG05 - ang5_Pay
          $('#ang5_Ban').val(ang5_Ban)
          getPayToatal();

      });

       ////////////////////
      $('#ang6_Pay').keyup(function() {
          var ang6_Pay = this.value;
          var outstandingANG06 = $('#outstandingANG06').val();
          var ang6_Ban = outstandingANG06 - ang6_Pay
          $('#ang6_Ban').val(ang6_Ban)
          getPayToatal();
      });

       ////////////////////
      $('#ang7_Pay').keyup(function() {
          var ang7_Pay = this.value;
          var outstandingANG07 = $('#outstandingANG07').val();
          var ang7_Ban = outstandingANG07 - ang7_Pay
          $('#ang7_Ban').val(ang7_Ban)
          getPayToatal();
      });


    });

    function getPayToatal(){

       var total_Pay= Number($('#ang1_Pay').val()) + Number($('#ang2_Pay').val()) + Number($('#ang3_Pay').val()) + Number($('#ang4_Pay').val()) + Number($('#ang5_Pay').val()) + Number($('#ang6_Pay').val()) +  Number($('#ang7_Pay').val())
        $('#total_Pay').val(total_Pay)

    }
  
    /////////////////////////////////////////////////// Form Submit Add  

     $(function () {

        $('#centersSummaryForm').on('submit', function (e) {

          e.preventDefault();

            $.ajax({
              type: 'post',
              url: '../controller/portfolio_controller.php',
              data: $('#centersSummaryForm').serialize(),
              success: function (data) {

                  swal("Successfully Submited !", {
                    icon: "success",
                  });
                  setTimeout(function(){ location.reload(); }, 2500);
                  
              }
            });


        });
      });

   /////////////////////////////////////////////////// Form Submit Delete  

    ///////// Portfolio /////////

     $('.calc').on('keyup',function(){
      var bank   = $('#bank').val();
      var other1 = $('#other1').val();
      var other2 = $('#other2').val();
      var other3 = $('#other3').val();
      var other4 = $('#other4').val();
      var other5 = $('#other5').val();

      var date   = $('#date').val();
      $.ajax({
          type: 'post',
          url: '../functions/getOutstanding_func.php',
          data: {date:date},
          success: function (response) {

              var obj = JSON.parse(response);
             // var outstanding = obj.tot_outstanding
              var total = (Number(bank)+Number(other1)+Number(other2)+Number(other3)+Number(other4)+Number(other5)).toFixed(2);

              $('#total').val(total);
          }
      });
     });


    $(function () {

      $('#outsideCashForm').on('submit', function (e) {
        
        e.preventDefault();

            $.ajax({
              type: 'post',
              url: '../controller/portfolio_controller.php',
              data: $('#outsideCashForm').serialize(),
              success: function (data) {
               
                swal("Successfully Submited !", {
                  icon: "success",
                });
                setTimeout(function(){ location.reload(); }, 2500);
                  
              }
            });
        });
    });



  </script>