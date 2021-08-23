<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';
    
    // // Get Update Form Data
    if(isset($_GET['edit_id'])){

        $edit_id = $_GET['edit_id'];
        $sql=mysqli_query($conn,"SELECT A.* ,b.center_code , b.center_name 
                          FROM customer A
                          INNER JOIN center B
                          ON A.center_id = B.id WHERE A.cust_id ='$edit_id'");  

        $numRows = mysqli_num_rows($sql); 
        if($numRows > 0) {
          while($row = mysqli_fetch_assoc($sql)) {

            $memberID     = $row['memberID'];
            $center_id  = $row['center_id'];
            $center_code  = $row['center_code'];
            $center_name     = $row['center_name'];
            $cname     = $row['name'];
            $nic     = $row['NIC'];
            $addLine1      = $row['addLine1'];
            $addLine2      = $row['addLine2'];
            $addLine3      = $row['addLine3'];
            $contact       = $row['contact'];
            $contact2      = $row['contact2'];
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
                      <li><a href="#"> | CREATE A CLIENT</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
           <div class="col-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Client Info</h4>
                        <form class="forms-sample" id="customerForm">
                          <div class="row"></div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                
                              <?php
                              ///////////////////////////
                               if (isset($_GET['edit_id'])){
                                  $nextID = $memberID;

                               }else{

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
                                  echo '<input type="hidden" name="memberID" id="memberID" value='.$nextID.'>';
                               }
                               ///////////////////////////

                              ?>
                          
                                <b><label class="col-sm-12 col-form-label">MEMBER ID - <?php  
                                echo $nextID; ?></label></b>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Center</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="center" id="center" required>
                                        <?php
                                            $custom = "SELECT * FROM  center";
                                            $result = mysqli_query($conn,$custom);
                                            $numRows = mysqli_num_rows($result); 

                                            if(isset($_GET['edit_id'])){
                                               echo '<option value ="'.$center_id.'">' . $center_code. ' | ' .$center_name.'</option>';
                                            }
                                            echo "<option value=''>--Select Center--</option>";
                                            if($numRows > 0) {
                                              while($row = mysqli_fetch_assoc($result)) {
                                                if(isset($_GET['edit_id'])){

                                                  if($center_id != $row['id']){
                                                      echo '<option value ="'.$row["id"].'">' . $row["center_code"]. ' | ' .$row["center_name"].'</option>';
                                                  }

                                                }else{
                                                  echo '<option value ="'.$row["id"].'">' . $row["center_code"]. ' | ' .$row["center_name"].'</option>';
                                                }
                                              }
                                            }
                                        ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="name" placeholder="customer name here.." value='<?php if(!empty($edit_id)){ echo $cname; } ?>' required>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NIC No</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="nic" value='<?php if(!empty($edit_id)){ echo $nic; } ?>' required>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone No (01)</label>
                                <div class="col-sm-9">
                                  <input type="number" class="form-control" name="contact" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10"  minlength="10" placeholder="xxx xxx xxxx"  value='<?php if(!empty($edit_id)){ echo $contact; } ?>' required>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone No (02)</label>
                                <div class="col-sm-9">
                                  <input type="number" class="form-control" name="contact2" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10"  minlength="10" value='<?php if(!empty($edit_id)){ echo $contact2; } ?>' placeholder="xxx xxx xxxx">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" style="margin-bottom: 20px;" name="addLine1" placeholder="address line 01 .." value='<?php if(!empty($edit_id)){ echo $addLine1; } ?>' required>
                                  
                                  <input type="text" class="form-control" style="margin-bottom: 20px;" name="addLine2" placeholder="address line 02 .." value='<?php if(!empty($edit_id)){ echo $addLine2; } ?>' >

                                  <input type="text" class="form-control" name="addLine3" placeholder="address line 03 .." value='<?php if(!empty($edit_id)){ echo $addLine3; } ?>' >
                                  <!-- <textarea class="form-control" name="address" rows="2" placeholder="Address here.."></textarea> -->
                                </div>
                              </div>
                            </div>

                            <?php if (!isset($_GET['edit_id'])): ?>
                              <div class="col-md-6">
                                  <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Client Profile</label>
                                  <div class="col-sm-4">
                                      <input type="file" style="border: inherit;" name="clientPro" accept="image/*" onchange="document.getElementById('output1').src = window.URL.createObjectURL(this.files[0])" class="form-control" />
                                      <p></p>
                                      <img id="output1" src='<?php  echo '../assets/images/default-image.jpg'; ?>'  width="100" height="100">
                                  </div>

                                  <div class="col-sm-4">
                                      <input type="file" style="border: inherit;" name="clientPro2" accept="image/*" onchange="document.getElementById('output2').src = window.URL.createObjectURL(this.files[0])" class="form-control" />
                                      <p></p>
                                      <img id="output2" src='<?php  echo '../assets/images/default-image.jpg'; ?>'  width="100" height="100">
                                  </div>
                                  </div>
                              </div>
                            <?php else: ?>

                            <?php endif ?>

                          </div>


                          <?php if (isset($_GET['edit_id'])): ?>
                              <input type="hidden" class="form-control" name="edit_id" value='<?php if(!empty($edit_id)){ echo $edit_id; } ?>' />
                              <input type="hidden" class="form-control" name="update" value="update" />
                              <button type="submit" class="btn btn-info btn-fw">Update</button>
                          <?php else: ?>
                              <input type="hidden" class="form-control" name="add" value="add" />
                              <button type="submit" class="btn btn-success mr-2">Save</button>
                          <?php endif ?>


                          <button type="button" onclick="cancelForm()" class="btn btn-primary btn-fw">Cancel</button>
                          <!-- <button class="btn btn-light">Cancel</button> -->
                      </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Client Info</h4>
                        <div class="row">
                          <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <h4 class="card-title">All Available Client</h4>
                                
                                <div class="table-responsive">         
                                <table class="table table-bordered" id="myTable">
                                  <thead>
                                    <tr>
                                      <th> # </th>
                                      <th>Member ID </th>
                                      <th>Name </th>
                                      <th>NIC </th>
                                      <th>Phone No (01) </th>
                                      <th></th>
                                      <th> </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $sql=mysqli_query($conn,"SELECT * FROM customer");
                                      
                                      $numRows = mysqli_num_rows($sql); 
                                
                                      if($numRows > 0) {
                                        $i = 1;
                                        while($row = mysqli_fetch_assoc($sql)) {

                                          $memberID     = $row['memberID'];
                                          $name  = $row['name'];
                                          $NIC  = $row['NIC'];
                                          $contact  = $row['contact'];

                                          echo ' <tr>';
                                          echo ' <td>'.$i.' </td>';
                                          echo ' <td>'.$memberID.' </td>';
                                          echo ' <td>'.$name.' </td>';
                                          echo ' <td>'.$NIC.' </td>';
                                          echo ' <td>'.$contact.' </td>';
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

          var data = new FormData($("#customerForm")[0]);

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

                  }else if(data==2){

                    swal({
                    title: "Good job !",
                    text: "Successfully Updated",
                    icon: "success",
                    button: "Ok !",
                    });
                    setTimeout(function(){ window.location.href = "customer.php";; }, 2500);
                    
                  }
                  
                  else{

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

   /////////////////////////////////////////////////// Form Submit Delete  

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
                setTimeout(function(){ window.location.href = "customer.php"; }, 2500);
                
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