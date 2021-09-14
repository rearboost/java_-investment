<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';

  ?>
  <!-- include head code here -->
  <?php  include('../include/head.php');   ?>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
  .collapsible {
    background-color: #777;
    color: white;
    cursor: pointer;
    padding: 12px;
    margin-bottom: 2px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 16px;
  }

  .active, .collapsible:hover {
    background-color: #555;
  }

  .content {
    padding: 0 18px;
    display: none;
    overflow: hidden;
    background-color: #f1f1f1;
  }
  </style>
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
                      <li><a href="#"> | REPORT VIEWER</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <form class="form-sample" id="reportForm">
              <div class="row">
               <!--  <div class="col-lg-3 grid-margin stretch-card"> -->
              <div class="col-md-2" style="height: 650px; overflow-y: auto;">
                <!-- <button type="button" class="collapsible">Repayment Report</button>
                <div class="content">
                  <div class="form-group">
                      <label class="col-form-label">MSU</label>
                      <input list="brow1" class="form-control" name="center1" id="center1" required>
                        <datalist id="brow1">
                        <?php
                          $center = "SELECT * FROM center";
                          $result = mysqli_query($conn,$center);
                          $numRows = mysqli_num_rows($result); 
          
                          if($numRows > 0) {
                              while($d1 = mysqli_fetch_assoc($result)) {
                                  echo '<option value ="'.$d1["center_code"].'">';
                              }
                          }
                        ?>
                        </datalist> 
                  </div>

                  <div class="form-group">
                      <label class="col-form-label">Date from</label>
                      <input type="date" class="form-control" name="fromDate1" id="fromDate1" required="">
                  </div>


                  <div class="form-group">
                      <label class="col-form-label">Date To</label>
                      <input type="date" class="form-control" name="ToDate1" id="ToDate1" required="">
                  </div>

                  <button type="button" onclick="generateRepayment()" class="btn btn-primary btn-fw">Generate</button>

                </div><br> -->
                
                <button type="button" class="collapsible">Investment Report</button>
                <div class="content">
                  <div class="form-group">
                      <label class="col-form-label">Level</label>
                      <input list="brow1" class="form-control" name="level2" id="level2" required>
                        <datalist id="brow1">
                          <option value ="Branch">
                          <option value ="MSU">
                       </datalist> 
                  </div>
                   <div class="form-group MSU2" hidden="">
                      <label class="col-form-label">MSU</label>
                      <input list="brow2" class="form-control" name="center2" id="center2" required>
                        <datalist id="brow2">
                        <?php
                          $center = "SELECT * FROM center";
                          $result = mysqli_query($conn,$center);
                          $numRows = mysqli_num_rows($result); 
          
                          if($numRows > 0) {
                              while($d1 = mysqli_fetch_assoc($result)) {
                                  echo '<option value ="'.$d1["center_code"].'">';
                              }
                          }
                        ?>
                        </datalist> 
                  </div>
                  <div class="form-group">
                      <label class="col-form-label">Date from</label>
                      <input type="date" class="form-control" name="fromDate2" id="fromDate2" required="">
                  </div>
                  <div class="form-group">
                      <label class="col-form-label">Date To</label>
                      <input type="date" class="form-control" name="ToDate2" id="ToDate2" required="">
                  </div>
                  <button type="button" onclick="generateInvestment()" class="btn btn-primary btn-fw">Generate</button>
                </div><br>

                <button type="button" class="collapsible">Receipt Report</button>
                <div class="content">
                  <div class="form-group">
                      <label class="col-form-label">Level</label>
                      <input list="brow0" class="form-control" name="level3" id="level3" required>
                        <datalist id="brow0">
                          <option value ="Branch">
                          <option value ="MSU">
                          <option value ="Contract">
                        </datalist> 
                  </div>
                  <div class="form-group MSU3" hidden="">
                      <label class="col-form-label">MSU</label>
                      <input list="brow3" class="form-control" name="center3" id="center3" required>
                        <datalist id="brow3">
                        <?php
                          $center = "SELECT * FROM center";
                          $result = mysqli_query($conn,$center);
                          $numRows = mysqli_num_rows($result); 
          
                          if($numRows > 0) {
                              while($d1 = mysqli_fetch_assoc($result)) {
                                  echo '<option value ="'.$d1["center_code"].'">';
                              }
                          }
                        ?>
                        </datalist> 
                  </div>
                  <div class="form-group Contract" hidden="">
                      <label class="col-form-label">Contract No </label>
                      <input list="brow4" class="form-control" name="contractNo3" id="contractNo3" required>
                        <datalist id="brow4">
                        <?php
                          $center = "SELECT * FROM  loan";
                          $result = mysqli_query($conn,$center);
                          $numRows = mysqli_num_rows($result); 
          
                          if($numRows > 0) {
                              while($d1 = mysqli_fetch_assoc($result)) {
                                  echo '<option value ="'.$d1["contractNo"].'">';
                              }
                          }
                        ?>
                        </datalist> 
                  </div>
                  <div class="form-group">
                      <label class="col-form-label">Date from</label>
                      <input type="date" class="form-control" name="fromDate3" id="fromDate3" required="">
                  </div>
                  <div class="form-group">
                      <label class="col-form-label">Date To</label>
                      <input type="date" class="form-control" name="ToDate3" id="ToDate3" required="">
                  </div>
                  <button type="button" onclick="generateReceipt()" class="btn btn-primary btn-fw">Generate</button>
                  </div><br>
                  <button type="button" class="collapsible">Portfolio</button>
                  <div class="content"><br>
                    <!-- <button type="button" class="btn btn-outline-primary btn-fw" onclick="newPortfolio()">
                        <i class="mdi mdi-plus"></i>Add New Portfolio</button> -->
                    <div class="form-group">
                        <label class="col-form-label">MSU</label>
                        <input list="brow5" class="form-control" name="center4" id="center4" required>
                          <datalist id="brow5">
                          <?php
                            $center = "SELECT * FROM center";
                            $result = mysqli_query($conn,$center);
                            $numRows = mysqli_num_rows($result); 
            
                            if($numRows > 0) {
                                while($d1 = mysqli_fetch_assoc($result)) {
                                    echo '<option value ="'.$d1["center_code"].'">';
                                }
                            }
                          ?>
                          </datalist> 
                    </div>

                    <!-- <div class="form-group">
                        <label class="col-form-label">Date from</label>
                        <input type="date" class="form-control" name="fromDate4" id="fromDate4" required="">
                    </div>


                    <div class="form-group">
                        <label class="col-form-label">Date To</label>
                        <input type="date" class="form-control" name="ToDate4" id="ToDate4" required="">
                    </div> -->
                    <button type="button" onclick="generatePortfolio()" class="btn btn-primary btn-fw">Generate</button>
                  </div>
                  <br>
              </div>
            </form>
            <div class="col-lg-7 grid-margin stretch-card">
              <div id="show" style="width: 100%;">
              
              </div>
            </div> 

            <div class="col-lg-3 grid-margin stretch-card" style="height: 510px;">   
              <div class="card">
                  <div class="card-body">
                    <b><center><h4 class="card-title">Portfolio</h4></center></b>
                      <form class="forms-sample" id="portfolioForm">

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
                                          $outstanding = $outstanding + $balance;
                                     }
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
                        
                              <label class="col-sm-6 col-form-label">Outstanding</label>
                              <div class="col-sm-6">
                              <input type="hidden" name="date" id="date" value="<?php if(isset($outstanding)){ echo $today; }?>">
                              <input type="hidden" name="outstanding" id="outstanding" value="<?php if(isset($outstanding)){  echo $outstanding;} ?>">
                              <input type="text" class="form-control text-right" name="" id="" value="<?php   if(isset($outstanding)){ echo number_format($outstanding,2,'.',',');}?>" required="" readonly="">
                              </div>
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
                                <input type="text" class="form-control text-right" name="total" id="total" required="" value="<?php  if(isset($total)){ echo number_format((float)($total+$outstanding), 2, '.', '');  } ?>" readonly="">
                              </div>
                            </div>
                          </div>
                        </div>

                        <input type="hidden" class="form-control" name="add" value="add" />
                        <button type="submit" class="btn btn-success mr-2">Save</button>
                        <!-- <button class="btn btn-light">Cancel</button> -->
                    </form>

                 </div> 
              </div> 
            </div> 

            </div> 
            
           
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <!-- include footer coe here -->
           
            <!-- partial -->
          </div>
          <?php include('../include/footer.php');   ?>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
      
    </div>

     
    <!-- container-scroller -->
    <!-- include footer coe here -->
    <?php include('../include/footer-js.php');   ?>

    <script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    }
    </script>
  </body>
</html>


  <script>
    $(document).ready( function () {
      $('#myTable').DataTable();
    }); 

    $('#level3').on('change',function(){
      var level3 = this.value;

      //var center;
      if(level3=="Branch"){
        $('.MSU3').prop('hidden', true);
        //center = 'all';
      }else if(level3=="Contract"){
        $('.MSU3').prop('hidden', true);
        $('.Contract').prop('hidden', false);
      }
      else{
        $('.MSU3').prop('hidden', false);
      }
    });

    /////////////////////////////////

    $('#level2').on('change',function(){
      var level2 = this.value;
      //var center;

      if(level2=="Branch"){
        $('.MSU2').prop('hidden', true);
        //center = 'all';
      }else{
        $('.MSU2').prop('hidden', false);
      }
    });

    function generateRepayment(){
      var center1 = $('#center1').val();
      var fdate1  = $('#fromDate1').val();
      var tdate1  = $('#ToDate1').val();

      if(center1 && fdate1 && tdate1){ 
          $.ajax({
              url:"Repayment_report.php",
              method:"POST",
              data:{"center1":center1,"fdate1":fdate1,"tdate1":tdate1},
              success:function(data){
                $('#show').html(data);
              }
          });
      }else{
         alert("Please select date range with Your center");
      }

    }


    function generateInvestment(){

      var center2 = $('#center2').val();
      var fdate2  = $('#fromDate2').val();
      var tdate2  = $('#ToDate2').val();

      if(center2 && fdate2 && tdate2){ 
          $.ajax({
              url:"investment_report.php",
              method:"POST",
              data:{"center2":center2,"fdate2":fdate2,"tdate2":tdate2},
              success:function(data){
                $('#show').html(data);
              }
          });
      }else{
         alert("Please select date range with Your center");
      }

    }


    function generateReceipt(){
      var level3  = $('#level3').val();
      var center3;

      if(level3=='Branch'){
        center3 = "all";
      }else if(level3=='Contract'){
        center3 = $('#contractNo3').val();
      }
      else if(level3=='MSU'){
        center3 = $('#center3').val();
      }

      var fdate3  = $('#fromDate3').val();
      var tdate3  = $('#ToDate3').val();

      if(center3 && fdate3 && tdate3){ 

          $.ajax({
              url:"Receipt_report.php",
              method:"POST",
              data:{"center3":center3,"fdate3":fdate3,"tdate3":tdate3,level3:level3},
              success:function(data){
                $('#show').html(data);
              }
          });
      }else{
         alert("Please select date range with Your center");
      }

    }

    function newPortfolio(){
      var newPortfolio = "newPortfolio";

      $.ajax({
          url:"portfolio.php",
          method:"POST",
          data:{"newPortfolio":newPortfolio},
          success:function(data){
            $('#show').html(data);
          }
      });
    }

    function generatePortfolio(){
      var center4 = $('#center4').val();
      // var fdate4  = $('#fromDate4').val();
      // var tdate4  = $('#ToDate4').val();

      if(center4){ 
          $.ajax({
              url:"portfolio_report.php",
              method:"POST",
              data:{"center4":center4},
              success:function(data){
                $('#show').html(data);
              }
          });
      }else{
         alert("Please select date range with Your center");
      }
    }

    ///////// Portfolio /////////

     $('.calc').on('keyup',function(){
      var bank   = $('#bank').val();
      var outstanding = $('#outstanding').val();
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
              var total = (Number(outstanding)+Number(bank)+Number(other1)+Number(other2)+Number(other3)+Number(other4)+Number(other5)).toFixed(2);

              $('#total').val(total);
          }
      });
     });


    $(function () {

      $('#portfolioForm').on('submit', function (e) {
        
        e.preventDefault();

            $.ajax({
              type: 'post',
              url: '../controller/portfolio_controller.php',
              data: $('#portfolioForm').serialize(),
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