<?php 
// Database Connection
require '../include/config.php';
?>
<?php if (isset($_POST['newPortfolio'])): ?>

<div class="col-12 offset-8">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Add New Portfolio</h4>
            <form class="forms-sample" id="portfolioForm">

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    
                  <?php
                    $today = date('Y-m-d');

                    $sql ="SELECT tot_outstanding FROM collection WHERE li_date<='$today' ORDER BY id DESC LIMIT 1";
                    $result   =mysqli_query($conn,$sql);
                    $row_get  =mysqli_fetch_assoc($result);
                    $count    =mysqli_num_rows($result);

                    if($count==0){
                      $outstanding = 0;
                    }else{
                      $outstanding =$row_get['tot_outstanding'];
                    }

                  ?>
              
                    <label class="col-sm-5 col-form-label">Outstanding</label>
                    <div class="col-sm-7">
                    <input type="hidden" name="date" id="date" value="<?php echo $today?>">
                    <input type="hidden" name="outstanding" id="outstanding" value="<?php echo $outstanding ?>">
                    <input type="text" class="form-control text-right" name="" id="" value="<?php echo number_format($outstanding,2,'.',',')?>" required="" readonly="">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Cash In Bank</label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control text-right calc" name="bank" id="bank" required="">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Investment (1)</label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control text-right calc" name="other1" id="other1" required="">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label"> Investments(2)</label>
                    <div class="col-sm-7">
                      <input type="number" class="form-control text-right calc" name="other2" id="other2" required="">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Total Amount</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control text-right" name="total" id="total" required="" readonly="">
                    </div>
                  </div>
                </div>
              </div>

              <input type="hidden" class="form-control" name="add" value="add" />
              <button type="submit" class="btn btn-success mr-2">Save</button>
              <!-- <button class="btn btn-light">Cancel</button> -->
          </form>
        </div>
    </div>
</div>
   
<?php else: ?>

<?php endif ?>

<script>

  $('.calc').on('keyup',function(){
      var bank   = $('#bank').val();
      var other1 = $('#other1').val();
      var other2 = $('#other2').val();

      var date   = $('#date').val();
      $.ajax({
          type: 'post',
          url: '../functions/getOutstanding_func.php',
          data: {date:date},
          success: function (response) {

              var obj = JSON.parse(response);
              var outstanding = obj.tot_outstanding
              var total = (Number(outstanding)+Number(bank)+Number(other1)+Number(other2)).toFixed(2);

              $('#total').val(total);
              
          }
      });
  });


  $(function () {

    $('#portfolioForm').on('submit', function (e) {
      
      e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/portfolio_controller.php',
            data: $('#portfolioForm').serialize(),
            success: function (data) {
              alert(data)
              swal({
                title: "Good job !",
                text: "Successfully Submited",
                icon: "success",
                button: "Ok !",
              });

              setTimeout(function(){ location.reload(); }, 2500);
                
            }
          });
      });
  });
</script>