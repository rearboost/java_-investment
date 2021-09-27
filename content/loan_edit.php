<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';

    // // Get Edit Form Data
    if(isset($_GET['loan_id'])){

        $edit_id = $_GET['loan_id'];

        $sql_loan=mysqli_query($conn,"SELECT * FROM  loan WHERE loan_no ='$edit_id'");
        
        ////////////// LOAN DETAILS //////////////
        $numRows_loan = mysqli_num_rows($sql_loan); 
        if($numRows_loan > 0) {
          while($row_loan = mysqli_fetch_assoc($sql_loan)) {

            $loanID     = $row_loan['loanID'];
            $branch  = $row_loan['branch'];
            $centerID     = $row_loan['centerID'];
            $customerID     = $row_loan['customerID'];
            $loanType     = $row_loan['loanType'];
            $contractNo     = $row_loan['contractNo'];
            
            ////////////// CENTER DETAILS //////////////
            $sql_center=mysqli_query($conn,"SELECT * FROM center WHERE id='$centerID'");  
            $numRows_center = mysqli_num_rows($sql_center); 
            if($numRows_center > 0) {
                $row_center = mysqli_fetch_assoc($sql_center);
                $center_code   = $row_center['center_code'];
                $centernName   = $row_center['center_name'];
            }
            ////////////// CUSTOMER DETAILS //////////////
            $sql_customer=mysqli_query($conn,"SELECT * FROM  customer WHERE cust_id='$customerID'");  
            $numRows_customer = mysqli_num_rows($sql_customer); 
            if($numRows_customer > 0) {
                $row_customer = mysqli_fetch_assoc($sql_customer);
                $memberID   = $row_customer['memberID'];
                $cname   = $row_customer['name'];
                $NIC   = $row_customer['NIC'];
                $addLine1   = $row_customer['addLine1'];
                $addLine2   = $row_customer['addLine2'];
                $addLine3   = $row_customer['addLine3'];
                $contact   = $row_customer['contact'];
                $contact2   = $row_customer['contact2'];
            }
             ////////////// LOAN DETAILS //////////////
            $loanAmt      = $row_loan['loanAmt'];
            $terms      = $row_loan['terms']; 
            $interestRate      = $row_loan['interestRate'];
            $rental = $row_loan['rental'];
            $daily_rental = $row_loan['daily_rental'];
            $totalAmt  = $row_loan['totalAmt'];
            $inspectionDate  = $row_loan['inspectionDate'];
            $disburseDate = $row_loan['disburseDate'];
            $gurantee1Name = $row_loan['gurantee1Name'];
            $gurantee1NIC  = $row_loan['gurantee1NIC'];
            $gurantee1ad1 = $row_loan['gurantee1ad1'];
            $gurantee1ad2 = $row_loan['gurantee1ad2'];
            $gurantee1ContactNo = $row_loan['gurantee1ContactNo'];
            $gurantee2Name  = $row_loan['gurantee2Name'];
            $gurantee2NIC  = $row_loan['gurantee2NIC'];
            $gurantee2ContactNo  = $row_loan['gurantee2ContactNo'];
            $gurantee2ad1 = $row_loan['gurantee2ad1'];
            $gurantee2ad2 = $row_loan['gurantee2ad2'];
            $loanStep  = $row_loan['loanStep'];
            $status  = $row_loan['status'];
            $reason  = $row_loan['reason'];
          }
        }
    }

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
                      <li><a href="#"> | EDIT A LOAN</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

             <?php if (isset($_GET['loan_id'])): ?>
            <!-- Page Title Header Ends-->
              <form class="form-sample" id="loanEdit">
                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        
                            <input type="hidden" id="loan_no" name="loan_no" value="<?php echo $edit_id; ?>">
                            <input type="hidden" name="loanID" value="<?php echo $loanID; ?>">
                            <b><label class="col-sm-12 col-form-label" style="font-size: small;">LOAN ID - <?php  
                            echo $loanID; ?></label></b>


                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Branch</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="branch" value='<?php if(isset($branch)){echo $branch;} ?>' required/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Center</label>
                                <div class="col-sm-9">
                                 <select class="form-control" name="center" id="center" required>
                                        <?php
                                          
                                            if(isset($_GET['loan_id'])){

                                                echo '<option value ="'.$centerID.'">' . $center_code. ' | ' .$centernName.'</option>';
                                            }
                                            echo "<option value=''>--Select Center--</option>";
                                            $custom = "SELECT * FROM  center";
                                            $result = mysqli_query($conn,$custom);
                                            $numRows = mysqli_num_rows($result); 

                                            if($numRows > 0) {
                                              while($row = mysqli_fetch_assoc($result)) {
                                                if(isset($_GET['loan_id'])){

                                                  if($centerID != $row['id']){
                                                      echo '<option value ="'.$row["id"].'">' . $row["center_code"]. ' | ' .$row["center_name"].'</option>';
                                                  }

                                                }else{
                                                  echo '<option value ="'.$row["id"].'">' . $row["center_code"]. ' | ' .$row["center_name"].'</option>';
                                                }
                                              }
                                            }
                                        ?>
                                  </select>
                                </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Loan Type</label>
                                <div class="col-sm-9 mt-2">
                                    <label class="mr-5">
                                    <input type="radio" id="t1" name="loan_type" value="weekly" <?php if(isset($loanType)){  if($loanType=="weekly"){ echo "checked";}}else{echo "checked";} ?>> Weekly
                                    </label>

                                    <label class="mr-5">
                                    <input type="radio" id="t2" name="loan_type" value="monthly" <?php if(isset($loanType)){  if($loanType=="monthly"){ echo "checked";}} ?>> Monthly
                                    </label>

                                    <label class="mr-5">
                                    <input type="radio" id="t3" name="loan_type" value="yearly" <?php if(isset($loanType)){  if($loanType=="yearly"){ echo "checked";}} ?>> Yearly
                                    </label>
                                </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Contract No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="contractNo" id="contractNo" value='<?php if(isset($contractNo)){echo $contractNo;} ?>' readonly="" required/>
                                </div>
                                </div>
                            </div>

                            <!-- <hr>
                            <h4 class="card-title">Customer Details</h4> -->

                            <div class="col-md-12">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Customer</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="NIC" value='<?php if(isset($NIC)){echo $NIC;} ?>' readonly=""/>
                                </div>

                                <!-- <div class="col-sm-1 size">
                                    <i class="fa fa-plus-circle pointer" onclick="customerForm()"></i>
                                </div> -->
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div id="show" class="loan-validtion"></div>
                            </div>


                            <hr>
                            <!-- <h4 class="card-title">Loan Details</h4> -->

                            <div class="col-md-12">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Loan Amount</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control calRental" name="loanAmt" id="loanAmt" value='<?php if(isset($loanAmt)){echo $loanAmt;} ?>' required/>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Interest rate(%)</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control calRental" name="intRate" id="intRate" value='<?php if(isset($interestRate)){echo $interestRate;} ?>' required/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Terms (weeks)</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="terms" id="terms" value='<?php if(isset($terms)){echo $terms;} ?>' required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Rental</label>
                                    <div class="col-sm-3">
                                    <input type="text" class="form-control" name="rental" id="rental" value='<?php if(isset($rental)){echo $rental;} ?>'   required  readonly=""/>
                                    </div>
                                    <label class="col-sm-3 col-form-label">Daily Rental</label>
                                    <div class="col-sm-3">
                                    <input type="text" class="form-control" name="daily_rental" id="daily_rental" value='<?php if(isset($daily_rental)){echo $daily_rental;} ?>' required  readonly=""/>
                                    <input type="hidden" class="form-control" name="tot_amt" id="tot_amt" value='<?php if(isset($tot_amt)){echo $tot_amt;} ?>' required  readonly=""/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Inspection Date </label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name ="inspectionDate"  value='<?php if(isset($inspectionDate)){echo $inspectionDate;} ?>' required=""  />
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Disburse Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name ="disburseDate"  value='<?php if(isset($disburseDate)){echo $disburseDate;} ?>' required="" />
                                </div>
                                </div>
                            </div>
                        
                            <div class="col-md-12">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Gurantee Details (01)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="margin-bottom: 20px;" name="gurantee1Name" value='<?php if(isset($gurantee1Name)){echo $gurantee1Name;} ?>'  placeholder="Gurantee 01 Name" />
                                    <input type="text" class="form-control" style="margin-bottom: 20px;" name="gurantee1NIC" value='<?php if(isset($gurantee1NIC)){echo $gurantee1NIC;} ?>'  placeholder="Gurantee 01 NIC No" />
                                    <input type="text" class="form-control" style="margin-bottom: 20px;" name="gurantee1ContactNo" value='<?php if(isset($gurantee1ContactNo)){echo $gurantee1ContactNo;} ?>'  placeholder="Gurantee 01 Contact No" />
                                    <input type="text" class="form-control" style="margin-bottom: 20px;" name="gurantee1ad1" value='<?php if(isset($gurantee1ad1)){echo $gurantee1ad1;} ?>'  placeholder="Gurantee 01 Address Line 1" />
                                    <input type="text" class="form-control"  name="gurantee1ad2" value='<?php if(isset($gurantee1ad2)){echo $gurantee1ad2;} ?>'  placeholder="Gurantee 01 Address Line 2" />
                                </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Gurantee Details (02)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="margin-bottom: 20px;" name="gurantee2Name" value='<?php if(isset($gurantee2Name)){echo $gurantee2Name;} ?>'  placeholder="Gurantee 02 Name" />
                                    <input type="text" class="form-control" style="margin-bottom: 20px;" name="gurantee2NIC" value='<?php if(isset($gurantee2NIC)){echo $gurantee2NIC;} ?>'  placeholder="Gurantee 02 NIC No" />
                                    <input type="text" class="form-control" style="margin-bottom: 20px;" name="gurantee2ContactNo" value='<?php if(isset($gurantee2ContactNo)){echo $gurantee2ContactNo;} ?>'  placeholder="Gurantee 02 Contact No" />
                                    <input type="text" class="form-control" style="margin-bottom: 20px;" name="gurantee2ad1" value='<?php if(isset($gurantee2ad1)){echo $gurantee2ad1;} ?>' placeholder="Gurantee 02 Address Line 1" />
                                    <input type="text" class="form-control" name="gurantee2ad2" value='<?php if(isset($gurantee2ad2)){echo $gurantee2ad2;} ?>' placeholder="Gurantee 02 Address Line 2" />
                                </div>
                                </div>
                            </div>
                        
                            <div class="col-md-12">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">loan Step</label>
                                <div class="col-sm-9">
                                    <SELECT class="form-control" name="loanStep" id="loanStep" required="This field is required">
                                    <?php

                                        if(isset($loanStep)&& $loanStep!=0){

                                            echo '<option value ="'.$loanStep.'">Step' . $loanStep.'</option>';

                                            if($loanStep!=1){
                                                echo '<option value="1">Step 01</option>';
                                            }
                                            if($loanStep!=2){
                                                echo '<option value="2">Step 02</option>';
                                            }
                                            if($loanStep!=3){
                                                echo '<option value="3">Step 03</option>';
                                            }
                                            if($loanStep!=4){
                                                echo '<option value="4">Step 04</option>';
                                            }
                                            if($loanStep!=5){
                                                echo '<option value="5">Step 05</option>';
                                            }
                                            if($loanStep!=6){
                                                echo '<option value="6">Step 06</option>';
                                            }
                                            if($loanStep!=7){
                                                echo '<option value="7">Step 07</option>';
                                            }
                                            if($loanStep!=8){
                                                echo '<option value="8">Step 08</option>';
                                            }
                                            if($loanStep!=9){
                                                echo '<option value="9">Step 09</option>';
                                            }
                                            else if($loanStep!=10){
                                                echo '<option value="10">Step 10</option>';
                                            }

                                        }else{

                                            echo'
                                                <option selected="" disabled="">--Select Loan Step--</option>
                                                <option value="1">Step 01</option>
                                                <option value="2">Step 02</option>
                                                <option value="3">Step 03</option>
                                                <option value="4">Step 04</option>
                                                <option value="5">Step 05</option>
                                                <option value="6">Step 06</option>
                                                <option value="7">Step 07</option>
                                                <option value="8">Step 08</option>
                                                <option value="9">Step 09</option>
                                                <option value="10">Step 10</option>
                                            ';

                                        }
                                    ?>
                                    </SELECT>
                                </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">

                                 <SELECT class="form-control" name="status" id="status" required="This field is required">
                                    <?php

                                        if(isset($status)){

                                            if($status==1){
                                                $action = "Active";
                                            }else if($status==0){
                                                 $action = "Close";
                                            }else if($status==-1){
                                                 $action = "Reject";
                                            }

                                            echo '<option value ="'.$status.'">'.$action.'</option>';

                                            if($status!=1){
                                                echo '<option value="1">Active</option>';
                                            }
                                            if($status!=0){
                                                echo '<option value="0">Close</option>';
                                            }
                                            if($status!=-1){
                                                echo '<option value="-1">Reject</option>';
                                            }

                                        }else{

                                            echo'
                                                <option selected="" disabled="">--Select Loan Step--</option>
                                                <option value="1">Active</option>
                                                <option value="0">Close</option>
                                                <option value="-1">Reject</option>

                                            ';

                                        }
                                    ?>
                                    </SELECT>
                                    
                                </div>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Reason</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name ="reason"  value='<?php if(isset($reason)){echo $reason;} ?>' />
                                </div>
                                </div>
                            </div>
                    

                            <input type="hidden" class="form-control" name="edit_id" value='<?php if(isset($edit_id)){ echo $edit_id; } ?>' />
                            <input type="hidden" class="form-control" name="update" value="update" />
                            <button type="submit" class="btn btn-info btn-fw">Update</button>
                            <button type="button" onclick="cancelForm()" class="btn btn-danger btn-fw">Cancel</button>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-6 grid-margin stretch-card customer_section">
                    <div class="card">
                        <div class="card-body">
                        <h3 class="card-title">Customer Details</h3>

                            <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-5">
                                <div id="image"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Member ID</label>
                            <div class="col-sm-7">
                                    <b><label class="col-sm-8 col-form-label"><?php if(isset($memberID)){echo $memberID;} ?></label></b>
                            </div>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-7">
                                <b><label class="col-sm-8 col-form-label"><?php if(isset($cname)){echo $cname;} ?></label></b>
                            </div>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIC</label>
                            <div class="col-sm-7">
                                <b><label class="col-sm-8 col-form-label"><?php if(isset($NIC)){echo $NIC;} ?></label></b>
                            </div>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone No (01)</label>
                                <div class="col-sm-7">
                                    <b><label class="col-sm-8 col-form-label"><?php if(isset($contact)){echo $contact;} ?></label></b>
                                </div>
                            </div>
                            </div>

                            <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone No (01)</label>
                                <div class="col-sm-7">
                                    <b><label class="col-sm-8 col-form-label"><?php if(isset($contact2)){echo $contact2;} ?></label></b>
                                </div>
                            </div>
                            </div>

                            <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-7">
                                    <b><label class="col-sm-8 col-form-label" style="margin-bottom: 20px;"><?php if(isset($addLine1)){echo $addLine1;} ?></label></b>
                                    <b><label class="col-sm-8 col-form-label" style="margin-bottom: 20px;"><?php if(isset($addLine2)){echo $addLine2;} ?></label></b>
                                    <b><label class="col-sm-8 col-form-label"><?php if(isset($addLine3)){echo $addLine3;} ?></label></b>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>                
              </form>

            <?php else: ?>

            <?php endif ?>

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- include footer coe here -->
    <?php include('../include/footer-js.php');   ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>


  </body>
</html>


  <script>
    $(document).ready( function () {
      $('#myTable').DataTable();
    });
    
    //var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
    

    $('#center').on('change',function(){
       var center = $(this).val();
        $.ajax({

            url: '../functions/create_contractNo.php',
            method:"POST",
            data:{center:center},
            success: function (response) {
                var obj = JSON.parse(response);

                const zeroPad = (num, places) => String(num).padStart(places, '0');

                var max_loan_no = obj.max_loan_no
                var center_name = obj.center_name

                // const string = center_name;
                // const usingSplit = string.split('');

                // var firstChar = usingSplit[0];
                // var secondChar = usingSplit[2];
                var str = center_name.toUpperCase();

                var firstChar  = str.charAt(0);
                var secondChar  = str.charAt(2);


                $('#contractNo').val(firstChar+secondChar+zeroPad(max_loan_no, 5));
            }
        });
    });

    $('#customer').on('change',function(){
        
        var NIC = this.value;
        $.ajax({
            url: '../functions/cust_loan_verify.php',
            method:"POST",
            data:{NIC:NIC},
            success: function (response) {//response is value returned from php 
              //alert(response)
              //$('#show').html(response);
              $("#show").removeAttr('class');
              if(response==1){
                 $('.customer_section').prop('hidden', false);
                 $('#show').html("");
                 $("#show").css({"color": "green"});
              }else{
                 $('.customer_section').prop('hidden', true);
                 $('#show').html("Already You have a loan");
                 $("#show").css({"color": "red"});
                 $('#customer').val('');
                 setTimeout(function(){ $("#customer_loan").val("");  $('#show').html("") }, 1500);
                 
              }
              $("#show").css({"padding": "5px" , "font-size":"small"});
            }
        });

        $.ajax({
            url: '../functions/get_custDetails.php',
            method:"POST",
            data:{NIC:NIC},
            success: function (response) {
              var obj = JSON.parse(response);


              $('#cust_id').val(obj.cust_id);
              $('#ID').val(obj.memberID);
              $('#client').val(obj.name);
              $('#contact1').val(obj.contact);
              $('#contact2').val(obj.contact2);
              $('#addLine1').val(obj.addLine1);
              $('#addLine2').val(obj.addLine2);
              $('#addLine3').val(obj.addLine3);
            }
        });

        if(NIC){
            $.get(
                "../functions/get_profile.php",
                {NIC:NIC},
                function (data) { 
                  $('#image').html(data);
                }
            );
        }
    });

    $('.calRental').on('keyup',function(){

        var center     = $('#center').val();
        var customer   = $('#customer').val();
        var contractNo = $('#contractNo').val();

        if(center=='' || contractNo==''){
            alert('Select center First');
            $('#loanAmt').val('');
            $('#rental').val('');

        }else if(customer==''){
            alert('Select customer First');
            $('#loanAmt').val('');
            $('#rental').val('');
        }else{

        var loanAmt = $('#loanAmt').val();

        $('#rental').val(loanAmt);
      }
    });


    $('#terms').on('keyup',function(){

        var center     = $('#center').val();
        var customer   = $('#customer').val();
        var contractNo = $('#contractNo').val();

        if(center=='' || contractNo==''){
            alert('Select center First');
            $('#loanAmt').val('');
            $('#rental').val('');

        }else if(customer==''){
            alert('Select customer First');
            $('#loanAmt').val('');
            $('#rental').val('');
        }else{

            var loanAmt = $('#loanAmt').val();
            var intRate = $('#intRate').val();
            var terms   = $('#terms').val();

            var type_value;
            var no;

            if (document.getElementById('t1').checked) {
              type_value = document.getElementById('t1').value;
              no = terms;
            }
            else if(document.getElementById('t2').checked) {
              type_value = document.getElementById('t2').value;
              no = terms/4;
            }
            else if(document.getElementById('t3').checked) {
              type_value = document.getElementById('t3').value;
              no = terms/48;
            }


            var interest = Number(loanAmt)*Number(intRate/100)*Number(terms/4);
            var tot_amt = (Number(loanAmt)+Number(interest));
            var rental = (Math.round(Number(tot_amt)/Number(no))).toFixed(2);

            var month = Number(terms)/4;
            var monthly_rental = Number(tot_amt) / Number(month);
            //var daily_rental = (Math.round(Number(monthly_rental)/30)).toFixed(2);
            var daily_rental = (Math.ceil(Number(monthly_rental)/30)).toFixed(2);

            //var totalLoanAmt = 

            $('#tot_amt').val(tot_amt.toFixed(2));
            $('#rental').val(rental);
            $('#daily_rental').val(daily_rental);
        }
    });


    ////////////////////// Form Submit Add  /////////////////////////////

    $(function () {

        $('#customerAdd').on('submit', function (e) {

          e.preventDefault();
          var data = new FormData($("#customerAdd")[0]);
          $.ajax({
            type: 'post',
            url: '../controller/customer_controller.php',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            success: function (data) {
                  if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Client Already Exist.",
                      icon: "error",
                      button: "Ok !",
                    });

                  }else{
                    swal({
                    title: "Good job !",
                    text: "Successfully Submited",
                    icon: "success",
                    button: "Ok !",
                    });
                    setTimeout(function(){ location.reload(); }, 2500);
                    
                  }
               }
          });

       });
    });

    ///////////////////////////////////////////////////

    $(function () {

        $('#loanEdit').on('submit', function (e) {

          var center = $('#center').val();
          var customer = $('#customer').val();
          var loanStep = $('#loanStep').val();

          var answer = confirm("Are you sure, you want to submit this record ?")
          if (!answer){
            e.preventDefault();
            return false;
          }else{

            if(center!='' || customer!='' || loanStep!='')
            {
                e.preventDefault();
                var loan_no= $('#loan_no').val();
                $.ajax({
                  type: 'post',
                  url: '../controller/loan_controller.php',
                  data: $('#loanEdit').serialize(),
                  success: function (data) {

                      if(data==0){
                          swal({
                            title: "Error !",
                            text: "Client Already Error.",
                            icon: "error",
                            button: "Ok !",
                          });

                      }else{
                        swal({
                        title: "Good job !",
                        text: "Successfully Updated!",
                        icon: "success",
                        button: "Ok !",
                        });
                        //setTimeout(function(){ location.reload(); }, 2500);
                        //setTimeout(function(){window.open('receipt?id='+mid, '_blank'); }, 100);
                        setTimeout(function(){ location.reload(); }, 2500);

                      }
                  }
                });

            }else{
              alert('Required Field is Empty');
            }
          }
        });
    });

    function cancelForm(){
        window.location.href = "loan.php";
    }

</script>
