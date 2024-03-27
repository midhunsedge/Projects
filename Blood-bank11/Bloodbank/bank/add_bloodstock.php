<?php
ob_start();
session_start();
if (isset($_SESSION["user"])) {
  include_once 'header.php';
  include_once 'connect.php';
?>
  <?php
  if (isset($_REQUEST['add_hospital'])) {
    $a = $_POST['hname'];
  
    $d = $_POST['address'];
    $e = $_POST['phone'];
   $id=  $_SESSION['user_id'];
   
  
      $query = "INSERT INTO blood_stock(b_type,b_section,b_unit,bank) VALUES('$a','$d','$e','$id')";
      
      $res = mysqli_query($con,$query);
      //$hid=mysql_insert_id();
      if ( $res > 0) {
       
        //header('Location:food.php');
        echo "<script>alert('successfully Added Blood Stock Details');</script>";
      } else {
        echo "<script> alert('Username ALready Present');</script>";
      }
  }
  ?>
  <div class="right_col" role="main">
    <div class="row">
      <div class="page-title">
        <div class="title_left">
          <h3> Blood Stocks</h3>
        </div>

        <div class="title_right">Enter the Details
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">

        <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2> Add Blood Stocks</h2>

              <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>
            <div class="x_content">
              <br />
              <form class="form-horizontal form-label-left" name="register" onsubmit="return validateForm();" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-3">Blood Type</label>
                  <div class="col-md-9 col-sm-9 col-xs-9">
                    <input type="text" name="hname" id="form-field-1" placeholder="" class="form-control" required />
                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-3">Blood Section</label>
               <select class="form-control"   name="address" rows="4" cols="10" style="width:580px;">
                  <option>Whole blood</option>
                  <option>Platelet Concentration</option>
                  <option>Single Donor Platelet</option>
                  <option>Packed cell</option>
                  <option>Fresh Frozen Plasma</option>
                  <option>Plasmapheresis</option>
                  <option>Cryo Precipitate</option>
                  <option>Leucapheresis</option>
               </select>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-3">Blood Unit</label>
                  <div class="col-md-9 col-sm-9 col-xs-9">
                    <input type="text" name="phone" id="form-field-1" placeholder="" class="form-control"  />
                    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                  </div>
                  </div>
				  
				 
			
                <!-- <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-3">Contact Number</label>
                  <div class="col-md-9 col-sm-9 col-xs-9">
                    <input type="number" name="phone" id="form-field-1" placeholder="" class="form-control" onBlur="checkph(this)" />
                    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                  </div>
                  </div> -->
                  
                <div class="ln_solid"></div>


                <div class="form-group">
                  <div class="col-md-9 col-md-offset-3">
                    <button type="submit" onclick="cancelFunction()" class="btn btn-primary">Cancel</button>
                    <button type="submit" name="add_hospital" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script type="text/javascript">
    function checkchr(a) {
      var x = a.value;
      var letters = /^[A-Za-z ]+$/;
      if (!x.match(letters)) {
        alert("please input alphabets");
        a.value = " ";
        a.focus();
      }

    }

    function checkph(a) {
      var x = a.value;
      if (isNaN(x)) {
        a.value = " ";
        a.focus();
      } else if (x.length >= 10 && x.length <= 11) {} else
        alert("enter 10 or 11 digits");


    }
  </script>
<?php
  include_once 'footer.php';
} else {
  header("Location: index.php");
}
?>