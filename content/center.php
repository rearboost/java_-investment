<?php
include('../include/config.php');
?>
<!DOCTYPE html>
<html>
  <?php include('../include/head.php'); 
      // Get Update Form Data
  if(isset($_GET['edit_id'])){

    $edit_id = $_GET['edit_id'];
    $sql=mysqli_query($conn,"SELECT * FROM center WHERE id='$edit_id'");  
    $numRows = mysqli_num_rows($sql); 
    if($numRows > 0) {
      while($row = mysqli_fetch_assoc($sql)) {
        $center_code   = $row['center_code'];
        $center_name   = $row['center_name'];
        $leader   = $row['leader'];
        $contact   = $row['contact'];
      }
    }
  }
  ?>
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
                    <ul class="quick-links">
                      <li><a href="#"> | SETTINGS</a></li>
                      <li><a href="#"> Create a center</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <h3 class="card-title">Add new center</h3>
                      <form class="form-sample" id="addCenter">
                        <?php

                          $sql ="SELECT id FROM center ORDER BY id DESC LIMIT 1";
                          $result=mysqli_query($conn,$sql);
                          $row_get = mysqli_fetch_assoc($result);
                          $count =mysqli_num_rows($result);

                          if($count==0){
                            $nextID = 1;
                          }else{
                            $nextID =$row_get['id']+1;
                          }

                           $nextID = sprintf('ANG%03d', $nextID);

                        ?>

                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Center Code</label>
                        <div class="col-sm-9">
                          <?php
                                $sql ="SELECT * FROM center ORDER BY id DESC LIMIT 1";
                                $result=mysqli_query($conn,$sql);
                                $row_get = mysqli_fetch_assoc($result);
                                $count =mysqli_num_rows($result);

                                if($count==0){
                                  $nextNo = 1;
                                }else{
                                  $nextNo =$row_get['id']+1;
                                }
                                 $nextcode = sprintf('ANG%03d', $nextNo);
                            ?>
                        
                            <input type="text" class="form-control" name="code" id="code" value="<?php echo $nextcode; ?>" readonly="" required>
                        </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Center Name</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" name="name" id="name" placeholder="Enter center name here.." value='<?php if(!empty($edit_id)){ echo $center_name; } ?>' required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Center Leader</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" name="leader" id="leader" placeholder="Enter leader name here.." value='<?php if(!empty($edit_id)){ echo $leader; } ?>' required>
                          </div>
                        </div>
                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Center Contact</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter contact no here.." value='<?php if(!empty($edit_id)){ echo $contact; } ?>' required>
                          </div>
                        </div>

                          <?php if (isset($_GET['edit_id'])): ?>
                              <input type="hidden" class="form-control" name="edit_id" value='<?php if(!empty($edit_id)){ echo $edit_id; } ?>' />
                              <input type="hidden" class="form-control" name="update" value="update" />
                              <button type="submit" class="btn btn-info btn-fw">Update</button>
                          <?php else: ?>
                              <input type="hidden" class="form-control" name="add" value="add" />
                              <button type="submit" class="btn btn-success mr-2">Save</button>
                          <?php endif ?>

                          <button type="button" onclick="cancelForm()" class="btn btn-primary mr-2">Cancel</button>
                      </form>
                      </div><!-- end column1-->

                    </div><!-- end row-->
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Available Centers</h4>
                     
                    <div class="table-responsive">         
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Center Code </th>
                          <th>Center Name </th>
                          <th>Center Leader </th>
                          <th>Center Contact </th>
                          <th> </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql=mysqli_query($conn,"SELECT * FROM center");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $center_code     = $row['center_code'];
                              $center_name  = $row['center_name'];
                              $leader     = $row['leader'];
                              $contact  = $row['contact'];

                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$center_code.' </td>';
                              echo ' <td>'.$center_name.' </td>';
                              echo ' <td>'.$leader.' </td>';
                              echo ' <td>'.$contact.' </td>';
                              echo '<td class="td-center"><button type="button" onclick="editForm('.$row["id"].')" class="btn btn-info btn-fw">Edit</button></td>';
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


$(function () {

    $('#addCenter').on('submit', function (e) {

      e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/center_controller.php',
            data: $('#addCenter').serialize(),
            success: function (data) {

                if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Items",
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
                    setTimeout(function(){ window.location.href = "center.php";; }, 2500);
                    
                }
                else{

                    swal({
                      title: "Good job !",
                      text: "Successfully Updated",
                      icon: "success",
                      button: "Ok !",
                      });
                      setTimeout(function(){ location.reload(); }, 2500);
                }
            }
          });
    });
  });

  function editForm(id){
      window.location.href = "center.php?edit_id=" + id;
  }

  function cancelForm(){
      window.location.href = "center.php";
  }


</script>



