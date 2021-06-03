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
                      <li><a href="#"> | BORROWERS</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
           <div class="col-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Borrower Info</h4>
                        <form class="forms-sample" id="customerForm">
                          <div class="row">
                            <div class="col-md-6">
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
                          
                                <input type="hidden" name="memberID" id="memberID" value="<?php if(isset($_GET['edit_id'])){ echo $memberID;}else{echo $nextID;} ?>">

                                <b><label class="col-sm-12 col-form-label">MEMBER ID - <?php if(isset($_GET['edit_id'])){ echo $memberID;}else{
                                echo $nextID;} ?></label></b>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" value="<?php if(isset($_GET['edit_id'])){ echo $customer;} ?>" name="name" placeholder="customer name here.." required>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NIC No</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" value="<?php if(isset($_GET['edit_id'])){ echo $nic;} ?>" name="nic" required>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone No</label>
                                <div class="col-sm-9">
                                  <input type="number" class="form-control" name="contact" value="<?php if(isset($_GET['edit_id'])){ echo $contact;} ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10"  minlength="10" placeholder="xxx xxx xxxx" required>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Center</label>
                                <div class="col-sm-9">
                                  <SELECT class="form-control" name="center" required>
                                    
                                    <?php
                                      $center = "SELECT * FROM center";
                                      $result = mysqli_query($conn,$center);
                                      $numRows = mysqli_num_rows($result); 

                                      if(isset($_GET['edit_id'])){
                                      echo "<option value = ".$centerID.">" .$center_code.' | '. $center_name . "</option>";
                                      }
                                      echo "<option disabled>--Select Center--</option>";
                                      if($numRows > 0) {
                                      while($row = mysqli_fetch_assoc($result)) {
                                          
                                        echo '<option value ="'.$row["id"].'">' . $row["center_code"]. ' | ' .$row["center_name"];
                                          
                                      }
                                      }
                                  ?>
                                  </SELECT>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control" name="address" rows="2" placeholder="Address here.."><?php if(isset($_GET['edit_id'])){ echo $address;} ?></textarea>
                                </div>
                              </div>
                            </div>
                          </div>

                           <?php if (isset($_GET['edit_id'])): ?>
                              <input type="hidden" class="form-control" name="edit_id" value="<?php if(isset($_GET['edit_id'])){ echo $edit_id;} ?>" />
                              <input type="hidden" class="form-control" name="update" value="update" />
                              <button type="submit" class="btn btn-info btn-fw">Update</button>
                              <button type="button" onclick="cancelForm()" class="btn btn-primary btn-fw">Cancel</button>
                          <?php else: ?>
                              <input type="hidden" class="form-control" name="add" value="add" />
                              <button type="submit" class="btn btn-success mr-2">Save</button>
                          <?php endif ?>
                          <!-- <button class="btn btn-light">Cancel</button> -->
                      </form>
                    </div>
                </div>
            </div>
            <br>
            <br>
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
                          <th>Center</th>
                          <th>Customer</th>
                          <th>NIC </th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql=mysqli_query($conn,"SELECT * FROM customer A LEFT JOIN center B ON B.id=A.centerID");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $center   = $row['center_name'];
                              $name     = $row['name'];
                              $memberID = $row['memberID'];
                              $address  = $row['address'];
                              $nic      = $row['NIC'];
                              $contact  = $row['contact'];

                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$memberID.' </td>';
                              echo ' <td>'.$center.' </td>';
                              echo ' <td>'.$name.' </td>';
                              echo ' <td>'.$nic.' </td>';
                              echo ' <td>'.$contact.' </td>';
                              echo ' <td>'.$address.' </td>';
                              echo '<td class="td-center"><button type="button" onclick="editForm('.$row["cust_id"].')" class="btn btn-info btn-fw">Edit</button></td>';

                              echo '<td class="td-center"><button type="button" onclick="confirmation(event,'.$row["cust_id"].')" class="btn btn-secondary btn-fw">Delete</button></td>';
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

    $(function () {

        $('#customerForm').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/customer_controller.php',
            data: $('#customerForm').serialize(),
            success: function (data) {

                  if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Customer",
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
                    //window.location.href = "customer.php";
                    
                  }
               }
          });

        });

      });

   /////////////////////////////////////////////////// Form Submit Add  

    function confirmation(e,id) {
        var answer = confirm("Are you sure, you want to permanently delete this record?")
      if (!answer){
        e.preventDefault();
        return false;
      }else{
        myFunDelete(id)
      }
    }

    function myFunDelete(id){

      $.ajax({
            url:"../controller/customer_controller.php",
            method:"POST",
            data:{removeID:id},
            success:function(data){
                swal({
                title: "Good job !",
                text: "Successfully Removerd",
                icon: "success",
                button: "Ok !",
                });
                setTimeout(function(){ location.reload(); }, 2500);
                window.location.href = "customer.php";
            }
      });
    }

    function editForm(id){
        window.location.href = "customer.php?edit_id=" + id;
    }

    function cancelForm(){
        window.location.href = "customer.php";
    }

  </script>