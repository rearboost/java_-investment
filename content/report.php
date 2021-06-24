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
              <!-- <div class="row">
                <div class="col-lg-3 grid-margin stretch-card"> -->
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
                <div class="content">
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


              <div id="show">
              <?php if (isset($_GET['createDate']) && isset($_GET['center'])): ?>
              
              <?php else: ?>
              <?php endif ?>
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



</script>