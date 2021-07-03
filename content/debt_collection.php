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
                      <li><a href="#"> | DEBT COLLECTION</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <form class="form-sample" id="collectionForm">
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                    <h3 class="card-title">Create a receipt</h3>

                    <div class="row">

                      <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Create Date </label>

                            <div class="col-sm-8">
                              <input type="date" class="form-control" name="createDate" id="createDate" value="<?php echo date("Y-m-d"); ?>"/>
                            </div>

                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">MSU Code </label>
                            <div class="col-sm-7">
                              <input list="brow" class="form-control" name="center" id="center" required>
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
              <?php if (isset($_GET['createDate']) && isset($_GET['center'])): ?>
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

                              $getCenter = mysqli_query($conn, "SELECT * FROM center WHERE center_code='$center_code'");
                              $cd = mysqli_fetch_assoc($getCenter);

                              $center_id   = $cd['id'];
                              $center_name = $cd['center_name'];
                              $leader      = $cd['leader'];
                              $contact     = $cd['contact'];

                              $fetchData = mysqli_query($conn, "SELECT * FROM loan WHERE centerID=$center_id AND status=1");
                              $count1 = mysqli_num_rows($fetchData);

                              ///TRUNCATE TABLE FIRST
                              $sql ="TRUNCATE TABLE temp_collection";
                              $result=mysqli_query($conn,$sql);

                              if($count1>0){
                                while($row1 = mysqli_fetch_assoc($fetchData)){
                                    $loan_no      = $row1['loan_no'];
                                    $contractNo   = $row1['contractNo'];
                                    $customerID   = $row1['customerID'];
                                    $loanAmt      = $row1['loanAmt'];
                                    $daily_rental = $row1['daily_rental'];

                            
                                    $fetchInst = mysqli_query($conn, "SELECT * FROM loan_installement WHERE loanNo='$loan_no' ORDER BY id DESC LIMIT 1");
                                    $count2 = mysqli_num_rows($fetchInst);
                                    if(!$count2==0){
                                      $row2 = mysqli_fetch_assoc($fetchInst);

                                      $arrears  = $row2['arrears'];
                                      $balance  = $row2['outstanding'];
                                      $bef_date = $row2['li_date'];
                                    }else{
                                      $arrears  = 0;
                                      $balance  = $row1['totalAmt'];
                                      $bef_date = $row1['disburseDate'];
                                    }


                                    $pre_date   = strtotime($bef_date);
                                    $now_date   = strtotime($createDate);
                                    $Days = round(($now_date-$pre_date) / (60 * 60 * 24));

                                    $payable= $daily_rental * $Days;

                                    // echo '<p>'.$loan_no.' | </p>';
                                    // echo '<p>'.$contractNo.' | </p>';
                                    // echo '<p>'.$customerID.' | </p>';
                                    // echo '<p>'.$loanAmt.' | </p>';
                                    // echo '<p>'.$arrears.' | </p><br>';
                                    // echo '<p>'.$arrears.' | </p><br>';
                                    // echo '<p>'.$bef_date.' | </p><br>';
                                    // echo '<p>'.$payable.' | </p><br>';
                                
                                    $insert = mysqli_query($conn, "INSERT INTO temp_collection(loan_no,contractNo,customerID,loanAmt,Arrears,balance,payable) VALUES($loan_no,'$contractNo',$customerID,'$loanAmt','$arrears','$balance','$payable')");
                               
                                   // if($insert){
                                   //  echo 1;
                                   // }

                                }
                              }
                              
                              


                              ?>
                              <input type="hidden" class="form-control" name="center_id" id="center_id" value="<?php echo $center_id; ?>" />
                              <input type="hidden" class="form-control" name="li_date" id="li_date" value="<?php echo $createDate; ?>" />

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

                      <div class="row">
                        <!-- <div class="col-md-12" style="height: 240px; overflow-y: auto;"> -->
                        <div class="col-md-12">
                         <!-- <div id="here"> -->

                          <input type="hidden" id="myitemjson" name="myitemjson"/>
                          <div class="table-responsive">          
                            <table id="example" class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="text-align:center;">Loan Index</th>
                                <th style="text-align:center;">Customer</th>
                                <th style="text-align:center;">Payment</th>
                                <th style="text-align:center;">Payable</th>
                                <th style="text-align:center;">Arrears</th>
                                <th style="text-align:center;">Balance</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql=mysqli_query($conn,"SELECT * FROM temp_collection");
                            
                              $row_num = mysqli_num_rows($sql); 
                        
                              if($row_num > 0) {

                                // $total_amt = 0;
                                // $total_arr = 0;
                                // $total_p = 0;
                                // $total_out = 0;

                                while($row = mysqli_fetch_assoc($sql)) {

                                  $loanNo = $row['loan_no'];

                                  $cus = mysqli_query($conn, "SELECT C.name AS customer,C.NIC AS NIC FROM customer C INNER JOIN loan L ON C.cust_id = L.customerID WHERE L.loan_no=$loanNo");
                                  $cusRow = mysqli_fetch_assoc($cus);
                                 
                                  $customer = $cusRow['customer'];
                                  $NIC      = $cusRow['NIC'];

                                  $id       = $row['id'];
                                  $paid     = $row['paid'];
                                  $payable  = $row['payable'];
                                  $arrears  = $row['Arrears'];
                                  $balance  = $row['balance'];


                                echo ' <tr>';
                                echo ' <td>'.$loanNo.'</td>';
                                echo ' <td>'.$customer.' ['.$NIC .'] </td>';
                                echo ' <td style="text-align:right;">
                                       <input type = "number" class="form-control text-right check"  name = '.$id.' id="pay'.$id.'">
                                 </td>';
                                echo ' <td style="text-align:right;">
                                <input type = "number" class="form-control text-right" id="payable'.$id.'" value="'.$payable.'" readonly>
                                </td>';
                                echo ' <td style="text-align:right;">
                                <input type = "number" class="form-control text-right" id="arrears'.$id.'" value="'.$arrears.'" readonly>
                                </td>';
                                echo ' <td style="text-align:right;">
                                <input type = "number" class="form-control text-right" id="balance'.$id.'" value="'.$balance.'" readonly>
                                </td>';
                                echo ' </tr>';

                                }
                              }else{
                                echo ' <tr style="background-color:#DAF7A6;">';
                                  echo ' <th colspan ="5">No data </th>';
                                echo ' </tr>';
                              }
                            ?>
                            </tbody>
                            </table>
                          </div>
                          <br><br>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Total Collection</label>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" name="total_amt"  id="total_amt" value="0" readonly=""/>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Total Arrears</label>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" name="total_arr"  id="total_arr" value="0" readonly=""/>
                              </div>
                            </div>
                             <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Total Balance</label>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" name="total_out"  id="total_out" value="0" readonly=""/>
                              </div>
                            </div>
                         <!--</div>

                           <input type="hidden" class="form-control" name="add" value="add" /> -->

                          <!-- <input type="number" name="" id="test" value="0"> -->
                          <button type="button" class="btn btn-primary btn-fw" onclick="saveForm()">FINISH</button>
                          <button type="button" onclick="cancelForm()" class="btn btn-danger btn-fw">Cancel</button>
                        </div>
                      </div><!-- end 2nd row-->

                    </div>
                  </div>
                </div>
              </div>
              </div> 
            </form>
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
  
    //////////////////////////////////////////////////////////// 

    $('.check').keyup(function(event){
        var this_id = $(this).attr("name");
        total(this_id);
    });

    function total(this_id){

        var payment = Number($('#pay'+this_id).val()).toFixed(2);
        var payable = Number($('#payable'+this_id).val()).toFixed(2);
        var arrears = Number($('#arrears'+this_id).val()).toFixed(2);
        var balance = Number($('#balance'+this_id).val()).toFixed(2);   

        //if(Number(payment)<=Number(payable)){

           /////// localStorage  ///////
          if(localStorage.getItem('payable'+this_id)==null){
           
            //localStorage.setItem('pay'+this_id, payment);
            localStorage.setItem('payable'+this_id, payable);
            localStorage.setItem('arrears'+this_id, arrears);
            localStorage.setItem('balance'+this_id, balance);
          }

          //var get_payment   = localStorage.getItem('pay'+this_id);
          var get_payable   = localStorage.getItem('payable'+this_id);
          var get_arrears   = localStorage.getItem('arrears'+this_id);
          var get_balance   = localStorage.getItem('balance'+this_id);

          if(Number(payment)<=Number(payable)){
            $('#payable'+this_id).val(Number(get_payable-payment).toFixed(2));
          }else{
            $('#payable'+this_id).val(Number(0).toFixed(2));
          }
          if(payment==0){
            $('#arrears'+this_id).val(Number(Number(get_arrears)+(0)).toFixed(2));
            $('#balance'+this_id).val(Number(Number(get_balance)+(0)).toFixed(2));
          }else{
            $('#arrears'+this_id).val(Number(Number(get_arrears)+(get_payable-payment)).toFixed(2));
          }
          $('#balance'+this_id).val(Number(get_balance-payment).toFixed(2));

          //////////////////////// GET TOTALS ////////////////////////
          var count = "<?php echo $row_num; ?>";
          var total_amt = 0;
          var total_arr = 0;
          var total_out = 0;
          for(var i =1;i<=count;i++){
            total_amt = total_amt + Number($('#pay'+i).val());
            total_arr = total_arr + Number($('#arrears'+i).val());
            total_out = total_out + Number($('#balance'+i).val());
          }
          $('#total_amt').val(Number(total_amt).toFixed(2));
          $('#total_arr').val(Number(total_arr).toFixed(2));
          $('#total_out').val(Number(total_out).toFixed(2));
        //}
        
    }

     function store(){

      var array=[];
      var table = $("#example");

      table.find('tr:gt(0)').each(function (i) {

          var $tds = $(this).find('td'),
          loanNo   = $tds.eq(0).text();
          paid     = $tds.eq(2).find("input").val();
          arrears  = $tds.eq(4).find("input").val();
          balance  = $tds.eq(5).find("input").val();

          var z={"loanNo":loanNo,"paid":paid,"arrears":arrears,"balance":balance};

          array.push({loanNo:loanNo,paid:paid,arrears:arrears,balance:balance});

      });

      console.log(JSON.stringify(array, null, 1));
      $('#myitemjson').val(JSON.stringify(array));

    }

    ////////////////////////////////////////////////////////////  

    $(document).ready( function () {
      //tmpEmpty();
      $('#myTable').DataTable();
    }); 
    
    $('#center').on('change',function(){

      var flag = this.value;

      var checkFlag  ="checkFlag";
      if(flag!=''){

       $.ajax({
            type: 'post',
            url: '../controller/debt_collection_controller.php',
            data: {checkFlag:checkFlag,flag:flag},
            success: function (data) {

                if(data==0){

                   swal({
                      title: "Another user access this page. Please try again later !",
                      text: "Access Denied",
                      icon: "error",
                      button: "Ok !",
                    });

                }else{
                   ShowForm();
                }            
            }
        });     
      }
    });

    function ShowForm(){
      var center = $('#center').val();
      var createDate = $('#createDate').val();

      if(center&&createDate){
        window.location.href = "debt_collection.php?center="+center+"&createDate="+createDate;

      }else{
          alert('Selcet MSU Code First');
      }
    }

    function tmpEmpty() {

      var tmpEmpty  ="tmpEmpty";

        $.ajax({
            type: 'post',
            url: '../controller/debt_collection_controller.php',
            data: {tmpEmpty:tmpEmpty},
            success: function (data) {
                 //$( "#here" ).load(window.location.href + " #here" );
            } 
        });
    }

    function saveForm(){

        store();

        var save  ="save";
    
        var li_date   = $('#li_date').val();
        var center_id = $('#center_id').val();

        var total_amt = $('#total_amt').val();
        var total_arr = $('#total_arr').val();
        var total_out = $('#total_out').val();

        var AllData = $('#myitemjson').val();

          $.ajax({
              type: 'post',
              url: '../controller/debt_collection_controller.php',
              data: {save:save,li_date:li_date,center_id:center_id,total_amt:total_amt,total_arr:total_arr,total_out:total_out,AllData:AllData},
              success: function (data) {
                
                  swal({
                  title: "Good job !",
                  text: "Successfully Submited",
                  icon: "success",
                  button: "Ok !",
                  });
                  setTimeout(function(){ cancelForm(); }, 2500);
              }

          });  
    }

    function cancelForm(){
        window.location.href = "debt_collection.php";
    }



</script>