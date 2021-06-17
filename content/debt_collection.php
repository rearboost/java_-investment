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
            <form class="form-sample" id="collectionForm">
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                    <h3 class="card-title">Collection form</h3>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Create Date </label>

                            <div class="col-sm-9">
                              <input type="date" class="form-control" name="createDate" id="createDate" value="<?php echo date("Y-m-d"); ?>"/>
                            </div>

                            <div class="col-sm-1 size">
                              <i class="fa fa-plus-circle pointer" onclick="ShowForm()"></i>   
                            </div>

                        </div>
                      </div>
                    </div>

                      
                    </div>
                  </div>
                </div>
              </div>

              <div id="show">
              <?php if (isset($_GET['createDate'])): ?>
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <!-- <h5 class="card-title"></h5>
                      <div class="card-scroll"></div> -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                              <input type="hidden" class="form-control" name="li_date" id="li_date" value="<?php echo $_GET['createDate']; ?>" />
                              <label class="col-sm-1 col-form-label">Customer</label>
                              <div class="col-sm-2">
                                <input list="brow" class="form-control" name="customer" id="customer" required>
                                <datalist id="brow">
                                <?php
                                  $custom = "SELECT * FROM customer C INNER JOIN loan L ON C.cust_id=L.customerID AND L.status=1";
                                  $result = mysqli_query($conn,$custom);
                                  $numRows = mysqli_num_rows($result); 
                  
                                  if($numRows > 0) {
                                      while($dl = mysqli_fetch_assoc($result)) {
                                          echo '<option value ="'.$dl["NIC"].'">';
                                      }
                                  }
                                ?>
                                </datalist> 
                                <input type="hidden" id="loan_no" name="loan_no">
                              </div>

                              <label class="col-sm-0.5 col-form-label">Payment</label>
                              <div class="col-sm-2">
                                <input type="number" class="form-control" name ="payment" id ="payment"  placeholder="LKR.0.00"/>
                              </div>

                              <label class="col-sm-0.5 col-form-label">Arrears</label>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" name="arrears"  id="arrears" placeholder="LKR.0.00" readonly=""/>
                              </div>

                              <label class="col-sm-1 col-form-label">Outstanding</label>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" name="outstanding"  id="outstanding" placeholder="LKR.0.00" readonly=""/>
                                <input type="hidden" class="form-control" name="totalPaid"  id="totalPaid" placeholder="LKR.0.00"/>
                              </div>

                              <div class="col-sm-1 size">
                                <i class="fa fa-plus-circle pointer" onclick="AddRow()"></i>   
                              </div>

                          </div>
                        </div>
                      </div>
                      <hr><br>


                      <div class="row">
                        <div class="col-md-12" style="height: 240px; overflow-y: auto;">
                         <div id="here">
                                      
                            <div class="table-responsive">          
                              <table id="example" class="table table-bordered">
                              <thead>
                                <tr>
                                  <th style="text-align:center;">Customer</th>
                                  <th style="text-align:center;">Payment</th>
                                  <th style="text-align:center;">Total Paid</th>
                                  <th style="text-align:center;">Arrears</th>
                                  <th style="text-align:center;">Outstanding</th>
                                  <th style="text-align:center;">DELETE</th>  
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  $sql=mysqli_query($conn,"SELECT * FROM temp_data");
                                  
                                    $numRows = mysqli_num_rows($sql); 
                              
                                    if($numRows > 0) {

                                      $total_amt = 0;
                                      $total_arr = 0;
                                      $total_p = 0;
                                      $total_out = 0;

                                      while($row = mysqli_fetch_assoc($sql)) {

                                        $loanNo = $row['loanNo'];

                                        $cus = mysqli_query($conn, "SELECT C.NIC AS customer FROM customer C INNER JOIN loan L ON C.cust_id = L.customerID WHERE L.loan_no=$loanNo");
                                        $cusRow = mysqli_fetch_assoc($cus);

                                        $customer = $cusRow['customer'];

                                        $paid       = $row['paid'];
                                        $arrears    = $row['arrears'];
                                        $total_paid = $row['total_paid'];
                                        $outstanding= $row['outstanding'];

                                        $id         = $row['id'];

                                      echo ' <tr>';
                                      echo ' <td>'.$customer.' </td>';
                                      echo ' <td style="text-align:right;">'.number_format($paid,2,'.',',').' </td>';
                                      echo ' <td style="text-align:right;">'.number_format($total_paid,2,'.',',').' </td>';
                                      echo ' <td style="text-align:right;">'.number_format($arrears,2,'.',',').' </td>';
                                      echo ' <td style="text-align:right;">'.number_format($outstanding,2,'.',',').' </td>';
                                      echo '<td class="td-center"><button class="btn-edit" id="DeleteButton" onclick="removeForm('.$id.')">Delete</button></td>';
                                      echo ' </tr>';

                                       
                                         $total_amt = $total_amt + $paid;
                                         $total_arr = $total_arr + ($arrears);
                                         $total_p   = $total_p + $total_paid;
                                         $total_out = $total_out + $outstanding;

                                      }
                                      echo ' <tr style="background-color:#DAF7A6;">';
                                        echo ' <th>Total </th>';
                                        echo ' <th style="text-align:right;">'.number_format($total_amt,2,'.',',').' </th>';
                                        echo ' <th style="text-align:right;">'.number_format($total_p,2,'.',',').' </th>';
                                        echo ' <th style="text-align:right;">'.number_format($total_arr,2,'.',',').' </th>';
                                        echo ' <th style="text-align:right;">'.number_format($total_out,2,'.',',').' </th>';
                                        echo ' <th style="text-align:right;"> </th>';
                                        
                                        echo ' </tr>';
                                    }
                                  ?>
                              </tbody>
                              </table>
                            </div>
                            <br><br>
                            <!-- <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Total Collection</label>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" name="total_amt"  id="total_amt" placeholder="LKR.0.00" value="<?php // echo number_format($total_amt,2,'.',',') ;?>" readonly=""/>
                              </div>
                              <label class="col-sm-2 col-form-label">Total Arrears</label>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" name="total_arr"  id="total_arr" placeholder="LKR.0.00" value="<?php // echo number_format($total_arr,2,'.',',') ;?>" readonly=""/>
                              </div>
                            </div> -->
                         </div>

                          <input type="hidden" class="form-control" name="add" value="add" />
                          <button type="submit" class="btn btn-primary btn-fw" onclick="saveForm()">FINISH</button>
                          <button type="button" onclick="cancelForm()" class="btn btn-danger btn-fw">Cancel</button>
                        </div>
                      </div><!-- end 2nd row-->

                    </div>
                  </div>
                </div>
              </div>
              </div> 
            </form>
            <?php else: ?>
            <?php endif ?>
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


    var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
    
        $(document).ready(function() {
           tmpEmpty();

           $("#customer").focus();


          $("#customer").keypress(function(e){
              if (e.which == 13) 
              {    
                    $("#payment").focus();
              };
          });

          $("#payment").keypress(function(e){
              if (e.which == 13) 
              {
                 AddRow();
              };
          });

       
    });

    function ShowForm(){
      var createDate = $('#createDate').val();

      if(createDate){
        window.location.href = "debt_collection.php?createDate="+createDate;

      }else{
          alert('Selcet Date First');
      }
    }

    $('#customer').on('change',function(){
        var currentDate = $('#li_date').val();

        $.ajax({
            type: 'post',
            url: '../functions/get_renewingDetail.php',
            data: {customer:this.value},
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
                //var weeks = Math.round(Number(diffDays)/7);

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

      var customer = $('#customer').val();
      var payment = this.value;
      var currentDate = $('#li_date').val();

      $.ajax({
            type: 'post',
            url: '../functions/get_renewingDetail.php',
            data: {customer:customer},
            success: function (response) {

                var obj = JSON.parse(response);

                var rental      = obj.rental
                var daily_rental= obj.daily_rental
                var newAmount   = obj.newAmount
                var old_arrears = obj.arrears
                var total_paid  = obj.total_paid
                var pre_date    = obj.pre_date
//alert(old_arrears)
                const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds

                const firstDate = new Date(pre_date);
                const secondDate = new Date(currentDate);

                const diffDays = Math.round(Math.abs((firstDate - secondDate) / oneDay)); 
                //var weeks = Math.round(Number(diffDays)/7);
//alert(diffDays)
//alert(daily_rental)
                var tot_amount = Number(daily_rental)*Number(diffDays);
//alert(tot_amount)
                var tot_arrears = ((Number(old_arrears)+Number(tot_amount))-Number(payment)).toFixed(2);

                var outstanding = (Number(newAmount)-Number(payment)).toFixed(2);
                var totalPaid = (Number(total_paid)+Number(payment)).toFixed(2);
//alert(tot_arrears)
                $('#arrears').val(tot_arrears);
                $('#outstanding').val(outstanding);
                $('#totalPaid').val(totalPaid);

            }
        });
    });

    function AddRow(){
      var addrow  ="addrow";

      var loan_no= $('#loan_no').val();
      var li_date= $('#li_date').val();
      var payment= $('#payment').val();
      var arrears= $('#arrears').val();
      var totalPaid= $('#totalPaid').val();
      var outstanding= $('#outstanding').val();

      if(loan_no!='' && li_date !='' && numberRegex.test(payment) && arrears!='' && totalPaid!='' && outstanding!=''){

       $.ajax({
            type: 'post',
            url: '../controller/debt_collection_controller.php',
            data: {addrow:addrow,li_date:li_date,payment:payment,arrears:arrears,totalPaid:totalPaid,outstanding:outstanding,loan_no:loan_no},
            success: function (data) {

                if(data==2){

                   swal({
                      title: "This customer is already exist !",
                      text: "Duplicate",
                      icon: "error",
                      button: "Ok !",
                    });

                }else{

                    $('#customer').val("")
                    $('#loan_no').val("")
                    $('#payment').val("")
                    $('#arrears').val("")
                    $('#totalPaid').val("")
                    $('#outstanding').val("")

                    $( "#here" ).load(window.location.href + " #here" );
                    //$("#gross").val(data);
                    //$("#total").val(data);
                    $("#customer").focus();
                }            
              } 
        });     
      }
    }


    function tmpEmpty() {

      var tmpEmpty  ="tmpEmpty";

        $.ajax({
            type: 'post',
            url: '../controller/debt_collection_controller.php',
            data: {tmpEmpty:tmpEmpty},
            success: function (data) {

                 $( "#here" ).load(window.location.href + " #here" );
              } 
        });
    }

     /////////// Remove the Row 
    function removeForm(id){

        var removeRow  ="removeRow";

         $.ajax({
            type: 'post',
            url: '../controller/debt_collection_controller.php',
            data: {removeRow:removeRow,id:id},
            success: function (data) {
                $( "#here" ).load(window.location.href + " #here" );
                // $("#gross").val(data);
                // $("#total").val(data)
              } 
        });
    }

    function saveForm(){

        var save  ="save";
    
        var li_date= $('#li_date').val();

          $.ajax({
              type: 'post',
              url: '../controller/debt_collection_controller.php',
              data: {save:save,li_date:li_date},
              success: function (data) {
                
                  swal({
                  title: "Good job !",
                  text: "Successfully Submited",
                  icon: "success",
                  button: "Ok !",
                  });
                  setTimeout(function(){ location.reload(); }, 2500);
              }

          });  
    }

    ////////////////////// Form Submit Add  /////////////////////////////


    // $(function () {

    //     $('#collectionForm').on('submit', function (e) {

    //       e.preventDefault();

    //         $.ajax({
    //           type: 'post',
    //           url: '../controller/debt_collection_controller.php',
    //           data: $('#collectionForm').serialize(),
    //           success: function (data) {

    //             swal({
    //               title: "Good job !",
    //               text: "Successfully Submited",
    //               icon: "success",
    //               button: "Ok !",
    //               });

    //               setTimeout(function(){ location.reload(); }, 2500);
                  
    //           }
    //         });


    //     });
    // });


    function cancelForm(){
        window.location.href = "debt_collection.php";
    }



</script>