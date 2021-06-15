<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';
    
    // Get Update Form Data
    if(isset($_GET['edit_id'])){

        $edit_id = $_GET['edit_id'];
        $sql=mysqli_query($conn,"SELECT A.name as customer, A.address as address, A.NIC as NIC, A.contact as contact, A.memberID as memberID, B.id as id, B.center_code as center_code, B.center_name as center_name FROM customer A LEFT JOIN center B ON B.id=A.centerID WHERE cust_id='$edit_id'");  
        $numRows = mysqli_num_rows($sql); 
        if($numRows > 0) {
          while($row = mysqli_fetch_assoc($sql)) {
            $centerID     = $row['id'];
            $center_code  = $row['center_code'];
            $center_name  = $row['center_name'];
            $memberID     = $row['memberID'];
            $customer     = $row['customer'];
            $address      = $row['address'];
            $nic          = $row['NIC'];
            $contact      = $row['contact'];
          }
        }
    }

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
                      <li><a href="#"> | CLIENT DETAILS</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Search Customer Data</h4>
                     
                    <div class="table-responsive">         
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th style="display:none;"> # </th>
                          <th> # </th>
                          <th>Member #</th>
                          <th>Image</th>
                          <th>Center</th>
                          <th>Customer</th>
                          <th>NIC </th>
                          <th>Contact 01</th>
                          <th>Contact 02</th>
                          <th>Address</th>

                          <th>Disburse Date</th>
                          <th>Loan</th>
                          <th>Rental</th>
                          <th>Status</th>

                          <th>Total Paid</th>
                          <th>Arrears</th>
                          <th>Outstanding</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql=mysqli_query($conn,"SELECT * FROM customer C RIGHT JOIN loan L ON C.cust_id=L.customerID ORDER BY L.loan_no DESC");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $loan_no  = $row['loan_no'];

                              $name     = $row['name'];
                              $memberID = $row['memberID'];
                              $address  = $row['address'];
                              $nic      = $row['NIC'];
                              $contact  = $row['contact'];
                              $contact2 = $row['contact2'];
                              $image    = $row['image'];

                              $centerID    = $row['centerID'];
                              $getCenter = mysqli_query($conn, "SELECT * FROM center WHERE id=$centerID");
                              $row1 = mysqli_fetch_assoc($getCenter);
                              $center_name = $row1['center_name'];

                              $loanAmt     = $row['loanAmt'];
                              $disburseDate= $row['disburseDate'];
                              $rental      = $row['rental'];
                              $status      = $row['status'];


                              $getPayment = mysqli_query($conn, "SELECT * FROM loan_installement WHERE loanNo=$loan_no ORDER BY id DESC LIMIT 1");
                              $row2 = mysqli_fetch_assoc($getPayment);
                              $check = $row2['outstanding'];
                              if(empty($check)){
                                $total_paid   = 0;
                                $arrears      = 0;
                                $outstanding  = 0;
                              }else{
                                $total_paid   = $row2['total_paid'];
                                $arrears      = $row2['arrears'];
                                $outstanding  = $row2['outstanding'];
                              }

                              echo ' <tr>';
                              echo ' <td style="display:none;">'.$i.' </td>';
                              echo ' <td>'.$loan_no.' </td>';
                              echo ' <td>'.$memberID.' </td>';
                              echo ' <td><img src="../upload/'.$image.' "style="border-radius:0;"></td>';
                              echo ' <td>'.$center_name.' </td>';
                              echo ' <td>'.$name.' </td>';
                              echo ' <td>'.$nic.' </td>';
                              echo ' <td>'.$contact.' </td>';
                              echo ' <td>'.$contact2.' </td>';
                              echo ' <td>'.$address.' </td>';

                              echo ' <td>'.$disburseDate.' </td>';
                              echo ' <td style="text-align:right;">'.number_format($loanAmt, 2, '.', ',').' </td>';
                              echo ' <td style="text-align:right;">'.number_format($rental, 2, '.', ',').' </td>';

                              if($status==1){
                                echo ' <td><label class="badge badge-warning" style="font-size:14px;">'."Active".'</label> </td>';
                              }else{
                                echo ' <td><label class="badge badge-danger" style="font-size:14px;">'."Closed".'</label> </td>';
                              }

                              echo ' <td style="text-align:right;">'.number_format($total_paid, 2, '.', ',').' </td>';
                              echo ' <td style="text-align:right;">'.number_format($arrears, 2, '.', ',').' </td>';
                              echo ' <td style="text-align:right;">'.number_format($outstanding, 2, '.', ',').' </td>';
                              //echo '<td class="td-center"><button type="button" onclick="editForm('.$row["cust_id"].')" class="btn btn-info btn-fw"> Edit</button></td>';

                              //echo '<td class="td-center"><button type="button" onclick="confirmation(event,'.$row["cust_id"].')" class="btn btn-secondary btn-fw">Delete</button></td>';
                              echo ' </tr>';
                              $i++;
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                    </div>
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
      $('#myTable').DataTable();
    });
  
    /////////////////////////////////////////////////// Form Submit Add  

  </script>