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
              <div class="col-md-3" style="height: 405px; overflow-y: auto;">
                <button type="button" class="collapsible">Repayment Report</button>
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

                </div><br>
                
                <button type="button" class="collapsible">Investment Report</button>
                <div class="content">
                  <div class="form-group">
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
                  <button type="button" class="btn btn-outline-primary btn-fw" onclick="newPortfolio()">
                      <i class="mdi mdi-plus"></i>Add New Portfolio</button>
                  <div class="form-group">
                      <label class="col-form-label">MSU</label>
                      <input list="brow4" class="form-control" name="center4" id="center4" required>
                        <datalist id="brow4">
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
                      <input type="date" class="form-control" name="fromDate4" id="fromDate4" required="">
                  </div>


                  <div class="form-group">
                      <label class="col-form-label">Date To</label>
                      <input type="date" class="form-control" name="ToDate4" id="ToDate4" required="">
                  </div>

                  <button type="button" onclick="generatePortfolio()" class="btn btn-primary btn-fw">Generate</button>
                </div><br>
              </div>
              
            <div class="col-lg-9 grid-margin stretch-card">
              <div id="show">
              
              </div> 
            </div> 

            </div> 
            
            </form>
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
      }else{
        $('.MSU3').prop('hidden', false);
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
      }else if(level3=='MSU'){
        center3 = $('#center3').val();
      }

      var fdate3  = $('#fromDate3').val();
      var tdate3  = $('#ToDate3').val();


      if(center3 && fdate3 && tdate3){ 

          $.ajax({
              url:"Receipt_report.php",
              method:"POST",
              data:{"center3":center3,"fdate3":fdate3,"tdate3":tdate3},
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
      var fdate4  = $('#fromDate4').val();
      var tdate4  = $('#ToDate4').val();

      if(center4 && fdate4 && tdate4){ 
          $.ajax({
              url:"portfolio_report.php",
              method:"POST",
              data:{"center4":center4,"fdate4":fdate4,"tdate4":tdate4},
              success:function(data){
                $('#show').html(data);
              }
          });
      }else{
         alert("Please select date range with Your center");
      }

    }



</script>