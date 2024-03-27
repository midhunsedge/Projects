<?php
ob_start();
session_start();
if (isset($_SESSION["user"])) {
  include_once 'header.php';
  include_once 'connect.php';
?>
  <?php
  if (isset($_REQUEST['add_hospital'])) {
   
  
    $d = $_POST['address'];
    $id=  $_SESSION['user_id'];
   $e=date('Y-m-d');
  
      $query = "INSERT INTO health_tips(staff_id,message,tip_date) VALUES('$id','$d','$e')";
      
      $res = mysqli_query($con,$query);
      //$hid=mysql_insert_id();
      if ( $res > 0) {
       
        //header('Location:food.php');
        echo "<script>alert('successfully Added Health Tip Details');</script>";
      } else {
        echo "<script> alert('Username ALready Present');</script>";
      }
  }
  ?>
  <div class="right_col" role="main">
    <div class="row">
      <div class="page-title">
        <div class="title_left">
          <h3> Health Tips</h3>
        </div>

        <div class="title_right">Enter the Details
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">

        <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2> Add Health Tip</h2>

              <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>
            <div class="x_content">
              <br />
              <form class="form-horizontal form-label-left" name="register" onsubmit="return validateForm();" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

               
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-3">Tip Message</label>
                  <div class="col-md-9 col-sm-9 col-xs-9">
                    <textarea name="address" class="form-control" required="required" rows="4" cols="10" required></textarea>
                    <span class="fa fa-location-arrow form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>
            
				  
				 
			
              
                  
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