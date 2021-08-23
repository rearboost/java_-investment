<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';

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
                      <li><a href="#"> | CREATE A LOAN</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <form class="form-sample" id="loanAdd">
              <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        <?php
                          $get_id = mysqli_query($conn, "SELECT loan_no FROM loan ORDER BY loan_no DESC LIMIT 1");

                          $data = mysqli_fetch_assoc($get_id);

                          $next_id = $data['loan_no']+1;

                          $loanID = sprintf('LON-%05d', $next_id);

                        ?>
                        <input type="hidden" id="loan_no" value="<?php echo $next_id; ?>">
                        <input type="hidden" name="loanID" value="<?php echo $loanID; ?>">
                        <b><label class="col-sm-12 col-form-label" style="font-size: small;">LOAN ID - <?php  
                        echo $loanID; ?></label></b>


                          <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Branch</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="branch" value="Nugegoda" required/>
                                </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Center</label>
                              <div class="col-sm-9">
                              <SELECT class="form-control" name="center" id="center" required>
                                <option disabled="" selected="">--Select Center--</option>
                                <?php
                                  $custom = "SELECT * FROM center";
                                  $result = mysqli_query($conn,$custom);
                                  $numRows = mysqli_num_rows($result); 
                  
                                  if($numRows > 0) {
                                      while($row1 = mysqli_fetch_assoc($result)) {
                                          echo '<option value ="'.$row1["id"].'">' . $row1["center_code"]. ' | ' .$row1["center_name"].'</option>';
                                      }
                                  }
                                ?>
                              </SELECT>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Loan Type</label>
                              <div class="col-sm-9 mt-2">
                                <label class="mr-5">
                                <input type="radio" id="t1" name="loan_type" value="weekly" checked=""> Weekly
                                </label>

                                <label class="mr-5">
                                <input type="radio" id="t2" name="loan_type" value="monthly"> Monthly
                                </label>

                                <label class="mr-5">
                                <input type="radio" id="t3" name="loan_type" value="yearly"> Yearly
                                </label>
                              </div>
                             </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Contract No</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="contractNo" id="contractNo" readonly="" required/>
                              </div>
                             </div>
                          </div>

                        <!-- <hr>
                        <h4 class="card-title">Customer Details</h4> -->

                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Customer</label>
                              <div class="col-sm-8">
                                  <input list="brow" class="form-control" name="customer" id="customer" required>
                                    <datalist id="brow">
                                    <?php
                                      $custom = "SELECT * FROM customer";
                                      $result = mysqli_query($conn,$custom);
                                      $numRows = mysqli_num_rows($result); 
                      
                                      if($numRows > 0) {
                                          while($dl = mysqli_fetch_assoc($result)) {
                                              echo '<option value ="'.$dl["NIC"].'">';
                                          }
                                      }
                                    ?>
                                    </datalist> 
                              </div>

                              <div class="col-sm-1 size">
                                  <i class="fa fa-plus-circle pointer" onclick="customerForm()"></i>
                              </div>
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
                                <input type="text" class="form-control calRental" name="loanAmt" id="loanAmt" required/>
                              </div>
                             </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Interest rate(%)</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control calRental" name="intRate" id="intRate" required/>
                                </div>
                            </div>
                          </div>
                        
                          <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Terms (weeks)</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="terms" id="terms" required/>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Rental</label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control" name="rental" id="rental" required  readonly=""/>
                                </div>
                                <label class="col-sm-3 col-form-label">Daily Rental</label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control" name="daily_rental" id="daily_rental" required  readonly=""/>
                                  <input type="hidden" class="form-control" name="tot_amt" id="tot_amt" required  readonly=""/>
                                </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                              <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Inspection Date </label>
                              <div class="col-sm-9">
                                  <input type="date" class="form-control" name ="inspectionDate" required="" />
                              </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Disburse Date</label>
                              <div class="col-sm-9">
                                  <input type="date" class="form-control" name ="disburseDate" value="<?php echo date("Y-m-d"); ?>" required="" />
                              </div>
                              </div>
                          </div>
                       
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Gurantee Details (01)</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" style="margin-bottom: 20px;" name="gurantee1Name" placeholder="Gurantee 01 Name" required/>
                                <input type="text" class="form-control" style="margin-bottom: 20px;" name="gurantee1NIC" placeholder="Gurantee 01 NIC No" required/>
                                <input type="text" class="form-control" name="gurantee1ContactNo" placeholder="Gurantee 01 Contact No" required/>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Gurantee Details (02)</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" style="margin-bottom: 20px;" name="gurantee2Name" placeholder="Gurantee 02 Name" required/>
                                <input type="text" class="form-control" style="margin-bottom: 20px;" name="gurantee2NIC" placeholder="Gurantee 02 NIC No" required/>
                                <input type="text" class="form-control" name="gurantee2ContactNo" placeholder="Gurantee 02 Contact No" required/>
                              </div>
                            </div>
                          </div>
                       
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">loan Step</label>
                              <div class="col-sm-9">
                                <SELECT class="form-control" name="loanStep" id="loanStep" required="This field is required">
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
                                </SELECT>
                              </div>
                            </div>
                          </div>

                        <input type="hidden" class="form-control" name="add" value="add" />
                        <button type="submit" class="btn btn-primary btn-fw">SAVE</button>
                        <button type="button" onclick="cancelForm()" class="btn btn-danger btn-fw">Cancel</button>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 grid-margin stretch-card customer_section" hidden>
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
                            <input type="hidden" class="form-control" name="cust_id" id="cust_id" readonly=""/>
                            <input type="text" class="form-control" id="ID" readonly=""/>
                          </div>
                        </div>
                        </div>

                        <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" id="client" readonly=""/>
                          </div>
                        </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone No (01)</label>
                            <div class="col-sm-7">
                              <input type="number" class="form-control" name="contact1" id="contact1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10"  minlength="10" required="" >
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone No (01)</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="contact2" id="contact2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10"  minlength="10"/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="address" id="address" required="" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

              </div>                
            </form>

           <!--  <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Loan Details</h4>
                    
                    <div class="table-responsive">          
                    <table id="myTable" class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="display: none;"> # </th>
                          <th> # </th>
                          <th>Customer</th>
                          <th>Center</th>
                          <th>Contract #</th>
                          <th>Amount </th>
                          <th>Terms</th>
                          <th>Interest Rate(%)</th>
                          <th>Rental</th>
                          <th>Disburse Date</th>
                          <th>Print</th>
                        </tr>
                      </thead>
                      <tbody> -->
                        <?php
                          // $sql=mysqli_query($conn,"SELECT * FROM customer C INNER JOIN loan L ON C.cust_id=L.customerID WHERE L.status=1 ORDER BY L.loan_no DESC");
                          
                          // $numRows = mysqli_num_rows($sql); 
                    
                          // if($numRows > 0) {
                          //   $i = 1;
                          //   while($row = mysqli_fetch_assoc($sql)) {

                          //   $name   = $row['name'];

                          //   // $custom = myswqli_query($conn, "SELECT * FROM customer WHERE cust_id='$customerID' ");
                          //   // $customData = mysqli_fetch_assoc($custom);
                          //   // $name = $customData['name'];

                          //   $centerID     = $row['centerID'];

                          //   $center = mysqli_query($conn, "SELECT * FROM center WHERE id='$centerID' ");
                          //   $centerData = mysqli_fetch_assoc($center);
                          //   $centername = $centerData['center_name'];

                          //   $loan_no      = $row['loan_no'];   
                          //   $contractNo   = $row['contractNo'];   
                          //   $loanAmt      = $row['loanAmt'];
                          //   $terms        = $row['terms'];
                          //   $interestRate = $row['interestRate'];
                          //   $rental       = $row['rental'];
                          //   $disburseDate = $row['disburseDate'];

                          //     echo ' <tr>';
                          //     echo ' <td style="display: none;">'.$i.' </td>';
                          //     echo ' <td>'.$loan_no.' </td>';
                          //     echo ' <td>'.$name.' </td>';
                          //     echo ' <td>'.$centername.' </td>';
                          //     echo ' <td>'.$contractNo.' </td>';
                          //     echo ' <td>'.$loanAmt.' </td>';
                          //     echo ' <td>'.$terms.' </td>';
                          //     echo ' <td>'.$interestRate.' </td>';
                          //     echo ' <td>'.$rental.' </td>';
                          //     echo ' <td>'.$disburseDate.' </td>';
                              
                          //     echo '<td class="td-center"><button type="button" onclick="printForm('.$row["loan_no"].')" name="print" class="btn btn-primary btn-fw">PRINT</button></td>';
                              
                          //     echo ' </tr>';
                          //     $i++;
                          //   }
                          // }
                        ?>
                      <!-- </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
             
             
            </div> -->
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
              $('#address').val(obj.address);
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

        $('#loanAdd').on('submit', function (e) {

          var center = $('#center').val();
          var customer = $('#customer').val();
          var loanStep = $('#loanStep').val();

          if(center!='' || customer!='' || loanStep!=''){
          
          e.preventDefault();

          var loan_no= $('#loan_no').val();

              $.ajax({
                type: 'post',
                url: '../controller/loan_controller.php',
                data: $('#loanAdd').serialize(),
                success: function (data) {

                        swal({
                          title: "Good job !",
                          text: "Successfully Submited",
                          icon: "success",
                          button: "Ok !",
                          });
                          //setTimeout(function(){ location.reload(); }, 2500);
                          //setTimeout(function(){window.open('receipt?id='+mid, '_blank'); }, 100);

                          setTimeout(function(){ location.reload(); }, 2500);
                    //}
                }
              });

          }else{
            alert('Required Field is Empty');
          }


        });
      });


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

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Borrower Registration</h4>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
            <!-- <h4 class="card-title">Customer Register</h4> -->
            <!-- <p class="card-description"> Basic form elements </p> -->
            <form class="forms-sample" id="customerAdd">
              <div class="form-group">
                      
                <?php

                  $sql ="SELECT cust_id FROM customer ORDER BY cust_id DESC LIMIT 1";
                  $result=mysqli_query($conn,$sql);
                  $row_get = mysqli_fetch_assoc($result);
                  $count =mysqli_num_rows($result);

                  if($count==0){
                    $nextmemberID = 1;
                  }else{
                    $nextmemberID =$row_get['cust_id']+1;
                  }
                  $nextID = sprintf('JI-%05d', $nextmemberID);

                ?>
            
                  <input type="hidden" name="memberID" id="memberID" value="<?php echo $nextID; ?>">

                  <b><label class="col-sm-12 col-form-label">MEMBER ID - <?php echo $nextID; ?></label></b>
                </div>

                <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" class="form-control" name="name" placeholder="customer name here.." required>
                </div>

                <div class="form-group">
                <label for="exampleInputEmail3">NIC No</label>
                <input type="text" class="form-control" name="nic" required>
                </div>

                <div class="form-group">
                <label for="exampleInputName1">Phone No (01)</label>
                <input type="number" class="form-control" name="contact" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10"  minlength="10" placeholder="xxx xxx xxxx" required>
                </div>

                <div class="form-group">
                <label for="exampleInputName1">Phone No (02)</label>
                <input type="number" class="form-control" name="contact2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10"  minlength="10" placeholder="xxx xxx xxxx">
                </div>

                <div class="form-group">
                <label for="exampleTextarea1">Address</label>
                <textarea class="form-control" name="address" rows="2" placeholder="Address here.."></textarea>
                </div>


                <div class="form-group">
                <label for="exampleInputName1">Client Profile</label>
                  <input type="file" style="border: inherit;" name="clientPro" accept="image/*" onchange="document.getElementById('output1').src = window.URL.createObjectURL(this.files[0])" class="form-control" />
                  <p></p>
                  <img id="output1" src='<?php echo '../assets/images/default-image.jpg'; ?>'  width="100" height="100">
                  <br><br>

                  <input type="file" style="border: inherit;" name="clientPro2" accept="image/*" onchange="document.getElementById('output2').src = window.URL.createObjectURL(this.files[0])" class="form-control" />
                  <p></p>
                  <img id="output2" src='<?php  echo '../assets/images/default-image.jpg'; ?>'  width="100" height="100">
                </div>

                <input type="hidden" class="form-control" name="add" value="add" />
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <!-- <button class="btn btn-light">Cancel</button> -->
            </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


