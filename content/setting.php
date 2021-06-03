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
                    <ul class="quick-links">
                      <li><a href="#"> | SETTINGS</a></li>
                      <li><a href="#"> USER SETTING</a></li>
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
                    <div class="col-md-7">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Add new user</h4>
                        </div>
                        <div class="modal-body">
                          <div class="card">
                            <div class="card-body">
                            <!-- <h4 class="card-title">Create New User</h4> -->
                            <form class="form-sample">
                              
                              <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Username</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="username" id="username" required>
                                  <label id="username_error" class="error" style="display: none;  color: red; padding-top:5px;">This field is required.</label>
                              </div>
                              </div>

                              <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Password</label>
                              <div class="col-sm-8">
                                  <input type="password" class="form-control" name="password" id="password" required>
                                  <label id="password_error" class="error" style="display: none;  color: red; padding-top:5px;">This field is required.</label>
                              </div>
                              </div>

                              <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Confirm Password</label>
                              <div class="col-sm-8">
                                  <input type="password" class="form-control" name="cpassword" id="cpassword" required>
                                  <label id="cpassword_error" class="error" style="display: none;  color: red; padding-top:5px;">This field is required.</label>
                                  <label id="confirm_error" class="error" style="display: none;  color: red; padding-top:5px;">Password does not match.</label>
                              </div>
                              </div>

                              <div class="form-group row">
                              <label class="col-sm-4 col-form-label">User Role</label>
                              <div class="col-sm-8">
                               <select class="form-control" name="level" id="level" required>
                                    <option value="0" selected="" disabled="">--Select User Role--</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                              </select>
                              <label id="level_error" class="error" style="display: none;  color: red; padding-top:5px;">This field is required.</label>
                              </div>
                              </div>

                              <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Center</label>
                              <div class="col-sm-8">
                               <select class="form-control" name="center" id="center" required>
                                    <option value="0" selected="" disabled="">--Select Center--</option> <?php
                                        $center = "SELECT * FROM center";
                                        $result = mysqli_query($conn,$center);
                                        $numRows = mysqli_num_rows($result); 
                        
                                          if($numRows > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                              echo "<option value = ".$row['id'].">" . $row['center_code'] . " | " . $row['center_name'] ."</option>";
                                              
                                            }
                                          }
                                    ?>
                              </select>
                              <label id="center_error" class="error" style="display: none;  color: red; padding-top:5px;">This field is required.</label>
                              </div>
                              </div>
                              <button type="button" id="form_btn_signin" name="form_btn_signin" onclick="new_user()" class="btn btn-success mr-2 fr" >Signin</button>      
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div><!-- end column1-->

                      <!-- Start column 2 -->
                      <div class="col-md-5">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Change Your Password</h4>
                        </div>
                        <div class="modal-body">
                          <div class="card">
                            <div class="card-body">
                            <form class="form-sample">
                              <div class="form-group">
                              <label class="col-sm-6 col-form-label">Old Password</label>
                              <div class="col-sm-12">
                                  <input type="password" class="form-control" name="oldpassword" id="oldpassword" required="">
                                  <label id="oldpassword_error" class="error" for="oldpassword" style="display: none;  color: red; padding-top:5px;">This field is required.</label>
                              </div>
                              </div>

                              <div class="form-group">
                              <label class="col-sm-6 col-form-label">New Password</label>
                              <div class="col-sm-12">
                                  <input type="password" class="form-control" name="newpassword" id="newpassword" required="">
                                  <label id="newpassword_error" class="error" for="newpassword" style="display: none;  color: red; padding-top:5px;">This field is required.</label>

                              </div>
                              </div>
                              <button type="button" id="cp_btn" name="cp_btn" onclick="cpForm()" class="btn btn-success mr-2 fr" >change Password</button>      
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div><!-- end 2nd column-->
                    </div><!-- end row-->
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

    // oldpassword and newpassword required
  $(document).ready(function(){
      // form1
     $('#oldpassword').keydown(function(){

       var val1 =$(this).val();

       if(val1==''){

       }
       else{
         $('#oldpassword_error').css("display", "none");
         $('#oldpassword').css("border", "1px solid #ced4da");
       }

     });
     $('#newpassword').keydown(function(){

       var val2 =$(this).val();

       if(val2==''){

       }
       else{
         $('#newpassword_error').css("display", "none");
         $('#newpassword').css("border", "1px solid #ced4da");
       }

     });

    // form2
    $('#username').keyup(function(){

       var val1 =$(this).val();

       if(val1==''){

       }
       else{
         $('#username_error').css("display", "none");
         $('#username').css("border", "1px solid #ced4da");
       }

     });
    
     $('#password').keyup(function(){

       var val2 =$(this).val();

       if(val2==''){

       }
       else{
         $('#password_error').css("display", "none");
         $('#password').css("border", "1px solid #ced4da");
       }

     });

     $('#cpassword').keydown(function(){

       var val2 =$(this).val();

       if(val2==''){

       }
       else{
         $('#cpassword_error').css("display", "none");
         $('#confirm_error').css("display", "none");
         $('#cpassword').css("border", "1px solid #ced4da");
       }

     });

     $('#level').click(function(){

       var val2 =$(this).val();

       if(val2==''){

       }
       else{
         $('#level_error').css("display", "none");
         $('#level').css("border", "1px solid #ced4da");
       }

     });

     $('#center').click(function(){

       var val2 =$(this).val();

       if(val2==''){

       }
       else{
         $('#center_error').css("display", "none");
         $('#center').css("border", "1px solid #ced4da");
       }

     });
  });

  // Change password ajax code
  function cpForm() {

    var oldpassword =document.getElementById('oldpassword').value;
    var oldpasswordcheck =document.getElementById('oldpassword').value;

    var newpassword =document.getElementById('newpassword').value;
    var newpasswordcheck =document.getElementById('newpassword').value;


    var cp_btn =document.getElementById('cp_btn').name;

    if(oldpasswordcheck=='' && newpasswordcheck==''){

     $('#newpassword_error').css("display", "inherit");
     $('#newpassword').css("border", "1px solid red");
     $('#oldpassword_error').css("display", "inherit");
     $('#oldpassword').css("border", "1px solid red");
    }
    else if (newpasswordcheck=='') {

      $('#newpassword_error').css("display", "inherit");
      $('#newpassword').css("border", "1px solid red");
    }
    else if (oldpasswordcheck=='') {
      $('#oldpassword_error').css("display", "inherit");
      $('#oldpassword').addClass('error');
      $('#oldpassword').css("border", "1px solid red");
    }
    else {
      $.ajax({
        url:"../controller/setting_controller.php",
        method:"POST",
        data:{oldpassword:oldpassword,newpassword:newpassword,cp_btn:cp_btn},
        success:function(data){

            if(data==0){

              swal({
                title: "Can't Change the Password !",
                text: "Old Password doesn't match.",
                icon: "error",
                button: "Ok !",
              });

            }else{
              swal({
              title: "Good job !",
              text: "Successfully change your password",
              icon: "success",
              button: "Ok !",
              });
              setTimeout(function(){ location.reload(); }, 2500);
              
            }
        }
     });
    }

  }



  function new_user() {

    var username =document.getElementById('username').value;
    var username_checked =document.getElementById('username').value;

    var password =document.getElementById('password').value;
    var password_checked =document.getElementById('password').value;

    var cpassword =document.getElementById('cpassword').value;
    var cpassword_checked =document.getElementById('cpassword').value;

    var level =document.getElementById('level').value;
    var level_checked =document.getElementById('level').value;

    var center =document.getElementById('center').value;
    var center_checked =document.getElementById('center').value;

    var form_btn_signin =document.getElementById('form_btn_signin').name;

  if(username_checked==''){
    $('#username_error').css("display", "inherit");
    $('#username').css("border", "1px solid red");

  }else if(password_checked==''){
    $('#password_error').css("display", "inherit");
    $('#password').css("border", "1px solid red");

  }else if(cpassword_checked==''){
    $('#cpassword_error').css("display", "inherit");
    $('#cpassword').css("border", "1px solid red");
    
  }else if(level_checked==''){
    $('#level_error').css("display", "inherit");
    $('#level').css("border", "1px solid red");
    
  }else if(center_checked==''){
  $('#center_error').css("display", "inherit");
  $('#center').css("border", "1px solid red");
  
  }else if(password_checked != cpassword_checked){
    $('#confirm_error').css("display", "inherit");
    $('#cpassword').css("border", "1px solid red");
  }else {

      $.ajax({
        url:"../controller/setting_controller.php",
        method:"POST",
        data:{username:username,password:password,level:level,center:center,form_btn_signin:form_btn_signin},
        success:function(data){

        // Message success call function
           //new_usercp();
           if(data==0){

              swal({
                title: "Can't signin!",
                text: "Username has already exist",
                icon: "error",
                button: "Ok !",
              });

            }else{
              swal({
              title: "Good job !",
              text: "Successfully Signin",
              icon: "success",
              button: "Ok !",
              });
              setTimeout(function(){ location.reload(); }, 2500);
              
            }
        }
     });

  }
  }



</script>



