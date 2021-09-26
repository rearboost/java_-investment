<?php
include('../include/config.php');
?>
<!DOCTYPE html>
<html>
    <?php //include('../include/head.php'); ?>
    <!-- include head code here -->
    <?php  include('../include/head.php');   ?>
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

                $year = date('Y');
                $month = date('m');

                //////////// card 1 /////////////
                $loan_count = mysqli_query($conn, "SELECT COUNT(loan_no) as tot_loan FROM loan WHERE year='$year' AND month='$month' GROUP BY month AND year");
                $dataCount = mysqli_fetch_assoc($loan_count);
                $card_1 = $dataCount['tot_loan'];
                if($card_1==""){$card_1=0;}
              
                //////////// card 1.1 /////////////
                $loan_amount = mysqli_query($conn, "SELECT loanAMT FROM summary WHERE year='$year' AND month='$month' ");
                $getAMT = mysqli_fetch_assoc($loan_amount);
                $loanAMT = $getAMT['loanAMT'];
                

                //////////// card 2 /////////////
                $insatllements = mysqli_query($conn, "SELECT SUM(tot_collection) as tot_paid FROM collection WHERE year='$year' AND month='$month' GROUP BY month AND year");
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
              <div class="col-md-2 grid-margin stretch-card">
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
                      <p class="text-white mb-0">This Month Ongoning Loans</p>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-md-3 grid-margin stretch-card">
                <div class="card text-white">
                  <div class="card-body badge-warning">
                    <div class="d-flex justify-content-between pb-2 align-items-center">
                      <div class="icon-holder">
                        <i class="mdi mdi-animation" style="font-size: 3em;"></i>
                      </div>
                      <h2 class="font-weight-semibold mb-0"><?php echo number_format($loanAMT,2,'.',',')?></h2>
                    </div>
                    <div class="d-flex justify-content-between">
                      <h5 class="font-weight-semibold mb-0"></h5>
                      <p class="text-white mb-0">This month Loans Total Amount </p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- 2nd card  -->
              <div class="col-md-3 grid-margin stretch-card">
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
                          <p class="mb-0"> Active Clients</p>
                        </div>
                        <h4 class="font-weight-semibold"><?php echo $active;?></h4>
                        <div class="progress progress-md">
                          <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $active_per.'%';?>" aria-valuenow="<?php echo $active_per;?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col-md-6 mt-4 mt-md-0">
                        <div class="d-flex align-items-center pb-2">
                          <i class="mdi mdi-account" style="color: red; font-size: 2em;"></i>
                          <p class="mb-0">Deactive Clients</p>
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

              <!-- Area Chart -->
              <div class="col-md-9 col-sm">
                <div class="card shadow mb-7">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Loans and Debt Collection Overview</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <div class="chart-area">
                      <!-- <canvas id="myAreaChart"></canvas> -->
                      <?php 

                          $year =  date("Y");

                          $query="SELECT  SUBSTRING('JAN FEB MAR APR MAY JUN JUL AUG SEP OCT NOV DEC ', (month * 4) - 3, 3)
                          AS  monthName,loanAMT,debtAMT
                          FROM  summary WHERE year='$year' ORDER BY month ASC ";
                          $result=mysqli_query($conn,$query);
                          $chart_data='';
                          //$row=$result->fetch_assoc();
                          while($row=mysqli_fetch_array($result)){

                              $chart_data .= "{ y:'".$row["monthName"]."', a:".$row["loanAMT"].", b:".$row["debtAMT"]."}, ";
                          }

                      ?>
                      <div id="myfirstchart" style="height: 250px;"></div> 
                      <!-- <div class="ml-auto"> 
                        <canvas height="120" id="realtime-statistics"></canvas>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-3 col-sm">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Calendar</h6>
                    
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">

                    <script language="javascript" type="text/javascript">
                        var day_of_week = new Array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
                        var month_of_year = new Array('January','February','March','April','May','June','July','August','September','October','November','December');

                        //  DECLARE AND INITIALIZE VARIABLES
                        var Calendar = new Date();

                        var year = Calendar.getFullYear();     // Returns year
                        var month = Calendar.getMonth();    // Returns month (0-11)
                        var today = Calendar.getDate();    // Returns day (1-31)
                        var weekday = Calendar.getDay();    // Returns day (1-31)

                        var DAYS_OF_WEEK = 7;    // "constant" for number of days in a week
                        var DAYS_OF_MONTH = 31;    // "constant" for number of days in a month
                        var cal;    // Used for printing

                        Calendar.setDate(1);    // Start the calendar day at '1'
                        Calendar.setMonth(month);    // Start the calendar month at now


                        /* VARIABLES FOR FORMATTING
                        NOTE: You can format the 'BORDER', 'BGCOLOR', 'CELLPADDING', 'BORDERCOLOR'
                              tags to customize your caledanr's look. */

                        var TR_start = '<TR>';
                        var TR_end = '</TR>';
                        var highlight_start = '<TD WIDTH="30"><TABLE style="width: 100%;" CELLSPACING=0 BORDER=1 BGCOLOR=42c765 BORDERCOLOR=CCCCCC><TR><TD WIDTH=20><B><CENTER>';
                        var highlight_end   = '</CENTER></TD></TR></TABLE></B>';
                        var TD_start = '<TD WIDTH="30"><CENTER>';
                        var TD_end = '</CENTER></TD>';

                        /* BEGIN CODE FOR CALENDAR
                        NOTE: You can format the 'BORDER', 'BGCOLOR', 'CELLPADDING', 'BORDERCOLOR'
                        tags to customize your calendar's look.*/

                        cal =  '<TABLE BORDER=1 CELLSPACING=0 CELLPADDING=0 BORDERCOLOR=BBBBBB style="width: 100%;"><TR><TD>';
                        cal += '<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=2 style="width: 100%;">' + TR_start;
                        cal += '<TD COLSPAN="' + DAYS_OF_WEEK + '" BGCOLOR="#42c765"><CENTER><B>';
                        cal += month_of_year[month]  + '   ' + year + '</B>' + TD_end + TR_end;
                        cal += TR_start;

                        //   DO NOT EDIT BELOW THIS POINT  //

                        // LOOPS FOR EACH DAY OF WEEK
                        for(index=0; index < DAYS_OF_WEEK; index++)
                        {

                        // BOLD TODAY'S DAY OF WEEK
                        if(weekday == index)
                        cal += TD_start + '<B>' + day_of_week[index] + '</B>' + TD_end;

                        // PRINTS DAY
                        else
                        cal += TD_start + day_of_week[index] + TD_end;
                        }

                        cal += TD_end + TR_end;
                        cal += TR_start;

                        // FILL IN BLANK GAPS UNTIL TODAY'S DAY
                        for(index=0; index < Calendar.getDay(); index++)
                        cal += TD_start + '  ' + TD_end;

                        // LOOPS FOR EACH DAY IN CALENDAR
                        for(index=0; index < DAYS_OF_MONTH; index++)
                        {
                        if( Calendar.getDate() > index )
                        {
                          // RETURNS THE NEXT DAY TO PRINT
                          week_day =Calendar.getDay();

                          // START NEW ROW FOR FIRST DAY OF WEEK
                          if(week_day == 0)
                          cal += TR_start;

                          if(week_day != DAYS_OF_WEEK)
                          {

                          // SET VARIABLE INSIDE LOOP FOR INCREMENTING PURPOSES
                          var day  = Calendar.getDate();

                          // HIGHLIGHT TODAY'S DATE
                          if( today==Calendar.getDate() )
                          cal += highlight_start + day + highlight_end + TD_end;

                          // PRINTS DAY
                          else
                          cal += TD_start + day + TD_end;
                          }

                          // END ROW FOR LAST DAY OF WEEK
                          if(week_day == DAYS_OF_WEEK)
                          cal += TR_end;
                          }

                          // INCREMENTS UNTIL END OF THE MONTH
                          Calendar.setDate(Calendar.getDate()+1);

                        }// end for loop

                        cal += '</TD></TR></TABLE></TABLE>';

                        //  PRINT CALENDAR
                        document.write(cal);

                        //  End -->
                        </script>
                          <br/>
                        <div style="clear:both">
                      </div>
                      <div>
                      </div>

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
  // $(document).ready( function () {
  //     $('#myTable').DataTable();
  // });

  var data = [
    <?php echo $chart_data; ?>
  ],

  //console.log("data",data);
  config = {
    data: data,
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Total loans', 'Total Collection'],
    fillOpacity: 0.6,
    hideHover: 'auto',
    behaveLikeLine: true,
    resize: true,
    pointFillColors:['#ffffff'],
    pointStrokeColors: ['black'],
    lineColors:['gray','red']
    };

    config.element = 'myfirstchart';
    Morris.Bar(config);
    config.element = 'stacked';
    config.stacked = true;
</script>