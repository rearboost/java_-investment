<?php
include('../include/config.php');
?>
<!DOCTYPE html>
<html>
    <?php include('../include/head.php'); ?>
<body>
<div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <!-- include nav code here -->
      <?php  include('../include/nav.php');   ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
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
                    <!-- <ul class="quick-links">
                      <li><a href="#">ICE Market data</a></li>
                      <li><a href="#">Own analysis</a></li>
                      <li><a href="#">Historic market data</a></li>
                    </ul>
                    <ul class="quick-links ml-auto">
                      <li><a href="#">Settings</a></li>
                      <li><a href="#">Analytics</a></li>
                      <li><a href="#">Watchlist</a></li>
                    </ul> -->
                  </div>
                </div>
              </div>
            </div>

            <?php
                //////////// card 1 /////////////
                $loan_count = mysqli_query($conn, "SELECT loan_no FROM loan WHERE status=1");
                $card_1 = mysqli_num_rows($loan_count); 

                //////////// card 2 /////////////
                $year = date('Y');
                $month = date('m');
                $insatllements = mysqli_query($conn, "SELECT SUM(paid) as tot_paid FROM loan_installement WHERE year='$year' AND month='$month' GROUP BY month AND year");
                $data = mysqli_fetch_assoc($insatllements);
                $card_2 = $data['tot_paid'];

                //////////// card 3 /////////////


                $All_custom = mysqli_query($conn, "SELECT DISTINCT(cust_id) AS customer FROM customer");
                $all = mysqli_num_rows($All_custom); 

                $A_custom = mysqli_query($conn, "SELECT * FROM customer C INNER JOIN loan L ON C.cust_id=L.customerID WHERE L.status='1'");
                $active = mysqli_num_rows($A_custom); 

                $D_custom = mysqli_query($conn, "SELECT * FROM customer C INNER JOIN loan L ON C.cust_id=L.customerID WHERE L.status='0' AND C.cust_id NOT IN (SELECT customerID FROM loan WHERE status='1')");
                $deactive = mysqli_num_rows($D_custom); 


                $active_per = ($active*100/$all);
                //$active_per = 50;
                $deactive_per = ($deactive*100/$all);
                //$deactive_per = 30;


            ?>

            <div class="row">
              <!-- 1st card  -->
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card text-white">
                  <div class="card-body badge-dark">
                    <div class="d-flex justify-content-between pb-2 align-items-center">
                      <div class="icon-holder">
                        <i class="mdi mdi-ballot-outline" style="font-size: 3em;"></i>
                      </div>
                      <h2 class="font-weight-semibold mb-0"><?php echo $card_1;?></h2>
                    </div>
                    <div class="d-flex justify-content-between">
                      <h5 class="font-weight-semibold mb-0"></h5>
                      <p class="text-white mb-0">Ongoning Loans</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- 2nd card  -->
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card text-white">
                  <div class="card-body badge-success">
                    <div class="d-flex justify-content-between pb-2 align-items-center">
                      <div class="icon-holder">
                        <i class="mdi mdi-calendar-multiple-check" style="font-size: 3em;"></i>
                      </div>
                      <h2 class="font-weight-semibold mb-0"><?php echo number_format($card_2,2,'.',',');?></h2>
                    </div>
                    <div class="d-flex justify-content-between">
                      <h5 class="font-weight-semibold mb-0"></h5>
                      <p class="text-white mb-0">This month collection</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="d-flex align-items-center pb-2">
                          <i class="mdi mdi-account-check" style="color: green; font-size: 2em;"></i>
                          <p class="mb-0"> Active borrowers</p>
                        </div>
                        <h4 class="font-weight-semibold"><?php echo $active;?></h4>
                        <div class="progress progress-md">
                          <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $active_per.'%';?>" aria-valuenow="<?php echo $active_per;?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col-md-6 mt-4 mt-md-0">
                        <div class="d-flex align-items-center pb-2">
                          <i class="mdi mdi-account" style="color: red; font-size: 2em;"></i>
                          <p class="mb-0">Deactive borrowers</p>
                        </div>
                        <h4 class="font-weight-semibold"><?php echo $deactive;?></h4>
                        <div class="progress progress-md">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $deactive_per.'%';?>" aria-valuenow="<?php echo $deactive_per;?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            

            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Loans & Debt collection overview</h4>
                    
                    <!-- bar chart in here -->

                  </div>
                </div>
              </div>
             
             
            </div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->

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
  // function SendMsg(id){
  //     window.location.href = "home.php?msg_id=" + id;
  // }
  $(document).ready( function () {
      $('#myTable').DataTable();
  });
</script>