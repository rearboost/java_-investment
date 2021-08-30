<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';
     
    // // Get Update Form Data
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
                $name   = $row_customer['name'];
                $NIC   = $row_customer['NIC'];
                $addLine1   = $row_customer['addLine1'];
                $addLine2   = $row_customer['addLine2'];
                $addLine3   = $row_customer['addLine3'];
                $contact   = $row_customer['contact'];
                $contact2   = $row_customer['contact2'];
            }
             ////////////// LOAN DETAILS //////////////
            $loanAmt      = number_format($row_loan['loanAmt'], 2, '.', ',');
            $terms      = $row_loan['terms']; 
            $interestRate      = number_format($row_loan['interestRate'], 2, '.', ',');
            $rental =  number_format($row_loan['rental'], 2, '.', ',');
            $daily_rental = number_format($row_loan['daily_rental'], 2, '.', ',');
            $totalAmt  = number_format($row_loan['totalAmt'], 2, '.', ',');
            $inspectionDate  = $row_loan['inspectionDate'];
            $disburseDate = $row_loan['disburseDate'];
            $gurantee1Name = $row_loan['gurantee1Name'];
            $gurantee1NIC  = $row_loan['gurantee1NIC'];
            $gurantee1ContactNo = $row_loan['gurantee1ContactNo'];
            $gurantee2Name  = $row_loan['gurantee2Name'];
            $gurantee2NIC  = $row_loan['gurantee2NIC'];
            $gurantee2ContactNo  = $row_loan['gurantee2ContactNo'];
            $loanStep  = $row_loan['loanStep'];
            $status  = $row_loan['status'];
          
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
                      <li><a href="#"> | DETAILS A LOAN</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <?php if (isset($_GET['loan_id'])): ?>

                <form class="form-sample" id="loanAdd">
                    <div class="row">
                        <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" id="loan_no" value="<?php echo $next_id; ?>">
                                <b><label class="col-sm-12 col-form-label" style="font-size: small;">LOAN ID - <?php  
                                if(isset($loanID)){echo $loanID;} ?></label></b>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Branch</label>
                                        <div class="col-sm-9">
                                             <b><label class="col-sm-3 col-form-label"><?php if(isset($branch)){echo $branch;} ?></label></b>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Center</label>
                                    <div class="col-sm-9">
                                        <b>                                        <label class="col-sm-8 col-form-label"><?php if(isset($center_code)){echo $center_code.' ( '.$centernName.' )';} ?></label></b>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Loan Type</label>
                                    <div class="col-sm-9">
                                        <b><label class="col-sm-3 col-form-label"><?php if(isset($loanType)){echo $loanType;} ?></label></b>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Contract No</label>
                                    <div class="col-sm-9">
                                        <b><label class="col-sm-3 col-form-label"><?php if(isset($contractNo)){echo $contractNo;} ?></label></b>
                                    </div>
                                    </div>
                                </div>

                                <!-- <hr>
                                <h4 class="card-title">Customer Details</h4> -->
                                <div class="col-md-12">
                                    <div id="show" class="loan-validtion"></div>
                                </div>

                                <hr>
                                <!-- <h4 class="card-title">Loan Details</h4> -->

                                <div class="col-md-12">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Loan Amount</label>
                                    <div class="col-sm-9">
                                        <b><label class="col-sm-3 col-form-label"><?php if(isset($loanAmt)){echo $loanAmt;} ?></label></b>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Interest rate(%)</label>
                                        <div class="col-sm-9">
                                            <b><label class="col-sm-3 col-form-label"><?php if(isset($interestRate)){echo $interestRate;} ?></label></b>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Terms (weeks)</label>
                                        <div class="col-sm-9">
                                           <b><label class="col-sm-3 col-form-label"><?php if(isset($terms)){echo $terms;} ?></label></b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Rental</label>
                                        <div class="col-sm-3">
                                             <b><label class="col-sm-8 col-form-label"><?php if(isset($rental)){echo $rental;} ?></label></b>
                                        </div>
                                        <label class="col-sm-3 col-form-label">Daily Rental</label>
                                        <div class="col-sm-3">
                                             <b><label class="col-sm-8 col-form-label"><?php if(isset($daily_rental)){echo $daily_rental;} ?></label></b>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Inspection Date </label>
                                    <div class="col-sm-9">
                                        <b><label class="col-sm-3 col-form-label"><?php if(isset($inspectionDate)){echo $inspectionDate;} ?></label></b>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Disburse Date</label>
                                    <div class="col-sm-9">
                                        <b><label class="col-sm-8 col-form-label"><?php if(isset($disburseDate)){echo $disburseDate;} ?></label></b>
                                    </div>
                                    </div>
                                </div>

                                <?php if (!empty($gurantee1Name)): ?>
                            
                                <div class="col-md-12">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Gurantee Details (01)</label>
                                    <div class="col-sm-9">
                                        <b><label class="col-sm-8 col-form-label" style="margin-bottom: 20px;"><?php if(isset($gurantee1Name)){echo $gurantee1Name;} ?></label></b>
                                        <b><label class="col-sm-8 col-form-label" style="margin-bottom: 20px;"><?php if(isset($gurantee1NIC)){echo $gurantee1NIC;} ?></label></b>
                                        <b><label class="col-sm-8 col-form-label"><?php if(isset($gurantee1ContactNo)){echo $gurantee1ContactNo;} ?></label></b>
                                    </div>
                                    </div>
                                </div>

                                <?php else: ?>

                                <?php endif ?>

                                 <?php if (!empty($gurantee2Name)): ?>

                                <div class="col-md-12">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Gurantee Details (02)</label>
                                    <div class="col-sm-9">
                                        <b><label class="col-sm-8 col-form-label" style="margin-bottom: 20px;"><?php if(isset($gurantee2Name)){echo $gurantee2Name;} ?></label></b>
                                        <b><label class="col-sm-8 col-form-label" style="margin-bottom: 20px;"><?php if(isset($gurantee2NIC)){echo $gurantee2NIC;} ?></label></b>
                                        <b><label class="col-sm-8 col-form-label"><?php if(isset($gurantee2ContactNo)){echo $gurantee2ContactNo;} ?></label></b>
                                    </div>
                                    </div>
                                </div>

                                <?php else: ?>

                                <?php endif ?>
                            
                                <div class="col-md-12">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">loan Step</label>
                                    <div class="col-sm-9">
                                         <b><label class="col-sm-8 col-form-label"><?php if(isset($loanStep)){echo $loanStep;} ?></label></b>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        
                                         <?php
                                         if(isset($status)){

                                            if($status==1){
                                                echo ' <label class="badge badge-warning" style="font-size:12px;">'."Active".'</label> ';
                                            }else{
                                                echo ' <label class="badge badge-danger" style="font-size:12px;">'."Closed".'</label> ';
                                            }
                                         }
                                         ?>
                                    </div>
                                    </div>
                                </div>

                                <button type="button" onclick="cancelForm()" class="btn btn-danger btn-fw">Cancel</button>
                            </div>
                        </div>
                        </div>

                        <div class="col-lg-6 grid-margin stretch-card customer_section" >
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
                                    <b><label class="col-sm-8 col-form-label"><?php if(isset($name)){echo $name;} ?></label></b>
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

    function cancelForm(){
        window.location.href = "loan.php";
    }

    // print bill //////
    function printForm(id){
      //window.open('receipt?id='+id, '_blank');
      window.location.href = "loan.php";
    }

    function customerForm(){
        $('#myModal').modal('show');
    }


</script>


  