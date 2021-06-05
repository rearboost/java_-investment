<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';

  ?>
  <!-- include head code here -->
  <?php  include('../include/head.php');   ?>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                      <li><a href="#"> | DEBT COLLECTION</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <form class="form-sample" id="renewingForm">
              <div class="row">
                <div class="col-lg-7 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                    <h3 class="card-title">Collection form</h3>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Date </label>
                                <div class="col-sm-9">
                                  <input type="date" class="form-control" name="li_date" id="li_date" value="<?php echo date("Y-m-d"); ?>"/>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Customer</label>
                              <div class="col-sm-9">
                                <SELECT class="form-control" name="customer" id="customer" required>
                                <option disabled="" selected="">--Select Customer--</option>
                                <?php
                                  $fetchCustomer = "SELECT DISTINCT(C.cust_id) as cust_id, C.memberID as memberID, C.name as name FROM customer C INNER JOIN loan L ON C.cust_id=L.customerID AND L.status=1";
                                  //$fetchCustomer = "SELECT * FROM customer C INNER JOIN loan L ON C.cust_id==L.customerID AND L.status=1";
                                

                                  $result = mysqli_query($conn,$fetchCustomer);
                                  $numRows = mysqli_num_rows($result); 
                  
                                  if($numRows > 0) {
                                      while($row = mysqli_fetch_assoc($result)) {
                                          echo '<option value ="'.$row["cust_id"].'">' . $row["memberID"]. ' | ' .$row["name"];
                                      }
                                  }
                                ?>
                                </SELECT>
                              </div>
                            </div>
                            </div>
                          </div>
                          <?php
                          $get_id = mysqli_query($conn, "SELECT id FROM loan_installement ORDER BY id DESC LIMIT 1");

                          $data = mysqli_fetch_assoc($get_id);

                          $next_id = $data['id']+1;
                          ?>
                          <input type="hidden" id="instID" value="<?php echo $next_id; ?>"/>
                          <input type="hidden" id="loan_no" name="loan_no" />
                                

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Contrat No </label>
                              <div class="col-sm-9">
                                <SELECT class="form-control" name="contractNo" id="contractNo" required>
                                  <option disabled="" selected="">--Select Contrat No--</option>
                                </SELECT>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Payment</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name ="payment" id ="payment"  placeholder="LKR.0.00"/>
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Outstanding</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="outstanding"  id="outstanding" placeholder="LKR.0.00" readonly=""/>
                                <input type="hidden" class="form-control" name="totalPaid"  id="totalPaid" placeholder="LKR.0.00"/>
                            </div>
                          </div>
                        </div>
                        </div>


                        <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Arrears</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="arrears"  id="arrears" placeholder="LKR.0.00" readonly=""/>
                            </div>
                          </div>
                        </div>
                        </div>

                        <input type="hidden" class="form-control" name="add" value="add" />
                        <button type="submit" class="btn btn-info btn-fw">PRINT</button>
                        <button type="button" onclick="cancelForm()" class="btn btn-primary btn-fw">Cancel</button>
                      
                    </div>
                  </div>
                </div>

                <div class="col-lg-5 grid-margin stretch-card">
                  <div class="card" style="padding:0px;width: 100%;height: 400px;overflow-x: hidden;overflow-y: auto;">
                    <div class="card-body">
                      <h5 class="card-title" style="text-align: center;">Loan Details</h5>
                      <div class="card-scroll">
                        <div id="detail_section"></div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
            </form>

            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Payment collected details</h4>
                    
                    <div class="table-responsive">          
                    <table id="myTable" class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="display:none;"> # </th>
                          <th> # </th>
                          <th>Customer</th>
                          <th>Contarct #</th>
                          <th>Date</th>
                          <th>Payment </th>
                          <th>Arrears </th>
                          <th>Total Paid</th>
                          <th>Outstanding</th>                          
                          <th>Print</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql=mysqli_query($conn,"SELECT * FROM loan_installement I INNER JOIN loan L ON L.loan_no=I.loanNo ORDER BY I.id DESC");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $customerID      = $row['customerID'];

                              $custom = mysqli_query($conn, "SELECT name FROM customer WHERE cust_id='$customerID' ");
                              $row1 = mysqli_fetch_assoc($custom);

                              $name     = $row1['name'];

                              $id           = $row['id'];
                              $contractNo   = $row['contractNo'];   
                              $li_date      = $row['li_date'];
                              $paid         = $row['paid'];
                              $arrears      = $row['arrears'];
                              $total_paid   = $row['total_paid'];
                              $outstanding   = $row['outstanding'];

                              echo ' <tr>';
                              echo ' <td style="display:none;">'.$i.' </td>';
                              echo ' <td>'.$id.' </td>';
                              echo ' <td>'.$name.' </td>';
                              echo ' <td>'.$contractNo.' </td>';
                              echo ' <td>'.$li_date.' </td>';
                              echo ' <td>'.$paid.' </td>';
                              echo ' <td>'.$arrears.' </td>';
                              echo ' <td>'.$total_paid.' </td>';
                              echo ' <td>'.$outstanding.' </td>';
                              //echo '<td class="td-center"><button type="button" onclick="editForm('.$row["M_id"].')" class="btn btn-info btn-fw">Edit</button></td>';
                              
                              echo '<td class="td-center"><button type="button" onclick="printForm('.$row["id"].')" name="print" class="btn btn-primary btn-fw">PRINT</button></td>';
                              
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
    
    //var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;

    $('#customer').on('change',function(){

        var customer = this.value;
        if(customer){
          
          $.get(
            "../functions/get_contractNo.php",
            {customer:customer},
            function (data) { 
              $('#contractNo').html(data);
            }
          );
             
        }else{
          $('#contractNo').html('<option>Select customer First</option>');
        }

    });

    $('#contractNo').on('change',function(){
        var currentDate = $('#li_date').val();
        
       $.ajax({
              url:"loan_details.php",
              method:"POST",
              data:{"contractNo":this.value},
              success:function(data){
                $('#detail_section').html(data);
              }
        });


        $.ajax({
            type: 'post',
            url: '../functions/get_renewingDetail.php',
            data: {contractNo:this.value},
            success: function (response) {

                var obj = JSON.parse(response);

                var rental      = obj.rental
                var newAmount   = obj.newAmount
                var old_arrears = obj.arrears
                var total_paid  = obj.total_paid
                var pre_date    = obj.pre_date
                var loan_no     = obj.loan_no

                $('#loan_no').val(loan_no);

                const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds

                const firstDate = new Date(pre_date);
                const secondDate = new Date(currentDate);

                const diffDays = Math.round(Math.abs((firstDate - secondDate) / oneDay)); 
                var weeks = Math.round(Number(diffDays)/7);

                // alert(months)
                var tot_arrears = Number(old_arrears).toFixed(2);
                var outstanding = Number(newAmount).toFixed(2);
                $('#arrears').val(tot_arrears);
                $('#outstanding').val(outstanding);

            }
        });
     });

    ///// calculate the renew amount /////////////////
    $('#payment').on('keyup',function(){

      var contractNo = $('#contractNo').val();
      var payment = this.value;
      var currentDate = $('#li_date').val();

      $.ajax({
            type: 'post',
            url: '../functions/get_renewingDetail.php',
            data: {contractNo:contractNo},
            success: function (response) {

                var obj = JSON.parse(response);

                var rental      = obj.rental
                var newAmount   = obj.newAmount
                var old_arrears = obj.arrears
                var total_paid  = obj.total_paid
                var pre_date    = obj.pre_date

                const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds

                const firstDate = new Date(pre_date);
                const secondDate = new Date(currentDate);

                const diffDays = Math.round(Math.abs((firstDate - secondDate) / oneDay)); 
                var weeks = Math.round(Number(diffDays)/7);

                var tot_amount = Number(rental)*Number(weeks);
                var tot_arrears = ((Number(old_arrears)+Number(tot_amount))-Number(payment)).toFixed(2);

                var outstanding = (Number(newAmount)-Number(payment)).toFixed(2);
                var totalPaid = (Number(total_paid)+Number(payment)).toFixed(2);

                $('#arrears').val(tot_arrears);
                $('#outstanding').val(outstanding);
                $('#totalPaid').val(totalPaid);

            }
        });
    });

    ////////////////////// Form Submit Add  /////////////////////////////


    $(function () {

        $('#renewingForm').on('submit', function (e) {

          e.preventDefault();

          var rid= $('#rid').val();

            $.ajax({
              type: 'post',
              url: '../controller/collection_controller.php',
              data: $('#renewingForm').serialize(),
              success: function (data) {

                swal({
                  title: "Good job !",
                  text: "Successfully Submited",
                  icon: "success",
                  button: "Ok !",
                  });
                  //setTimeout(function(){ location.reload(); }, 2500);
                  //setTimeout(function(){window.open('receipt?id='+rid, '_blank'); }, 100);

                  setTimeout(function(){ location.reload(); }, 2500);
                  
              }
            });


        });
      });


    function cancelForm(){
        window.location.href = "collection.php";
    }

    // print bill //////
    function printForm(id){
      //window.open('receipt?id='+id, '_blank');
      window.location.href = "collection.php";
    }


</script>