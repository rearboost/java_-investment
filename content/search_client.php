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
                    <h4 class="card-title">Customer Data</h4>
                     
                    <div class="table-responsive">         
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Member #</th>
                          <th>Image</th>
                          <th>Customer</th>
                          <th>NIC </th>
                          <th>Contact 01</th>
                          <th>Contact 02</th>
                          <th>Address</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql=mysqli_query($conn,"SELECT * FROM customer C LEFT JOIN loan L ON C.cust_id=L.customerID");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $name     = $row['name'];
                              $memberID = $row['memberID'];
                              $address  = $row['address'];
                              $nic      = $row['NIC'];
                              $contact  = $row['contact'];
                              $contact2 = $row['contact2'];
                              $image    = $row['image'];

                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$memberID.' </td>';
                              echo ' <td><img src="../upload/'.$image.' "style="border-radius:0;"></td>';
                              echo ' <td>'.$name.' </td>';
                              echo ' <td>'.$nic.' </td>';
                              echo ' <td>'.$contact.' </td>';
                              echo ' <td>'.$contact2.' </td>';
                              echo ' <td>'.$address.' </td>';
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