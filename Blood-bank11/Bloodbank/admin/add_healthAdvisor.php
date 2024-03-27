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
   // $b = $_POST['username'];
    $c = $_POST['password'];
    $d = $_POST['desi'];
    $e = $_POST['phone'];
    $f = $_POST['emil'];
    $file=$_FILES['po']['name'];
    $file1=$_FILES['po']['tmp_name'];
    copy($file1,"images/".$file);
    //$q1 = "SELECT * from tbl_login where username=$b AND password=$c";
    //$q2 = "SELECT * from tbl_hospital where hname=$a AND address=$d AND phone=$e";
    //$r1 = mysql_query($q1);
    //$r2 = mysql_query($q2);
    //var_dump(mysqli_num_rows($r1)).die();
    //if ($r1 > 0 && $r2 > 0) {
      $query1 = "INSERT INTO tbl_login(username,password,role) VALUES('$f','$c','3')";
      //echo "INSERT INTO tbl_login(username,password,role) VALUES('','$b','$c','4')"; die();
      $res1 = mysqli_query($con,$query1);
      $id = mysqli_insert_id($con);
      $query = "INSERT INTO tbl_staff(logid,staff_name,staff_phone,staff_email,designation,status,staff_photo) VALUES('$id','$a','$e','$f','$d','Active','$file')";
      
      $res = mysqli_query($con,$query);
      //$hid=mysql_insert_id();
      if ($res1 > 0 && $res > 0) {
       
        //header('Location:food.php');
        echo "<script>alert('successfully Added  Details');</script>";
      } else {
        echo "<script> alert('Username ALready Present');</script>";
      }
  }
  ?>
  <div class="right_col" role="main">
    <div class="row">
      <div class="page-title">
        <div class="title_left">
          <h3> Health Advisor</h3>
        </div>

        <div class="title_right">Enter the Details
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">

        <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2> Add Health Advisor</h2>

              <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>
            <div class="x_content">
              <br />
              <form class="form-horizontal form-label-left" name="register" onsubmit="return validateForm();" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-3">Staff Name</label>
                  <div class="col-md-9 col-sm-9 col-xs-9">
                    <input type="text" name="hname" id="form-field-1" placeholder="" class="form-control" onBlur="checkchr(this)" required />
                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>
               
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-3">Contact Number</label>
                  <div class="col-md-9 col-sm-9 col-xs-9">
                    <input type="number" name="phone" id="form-field-1" placeholder="" class="form-control" onBlur="checkph(this)" />
                    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                  </div>
                  </div>
				 
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-3">Designation</label>
                  <div class="col-md-9 col-sm-9 col-xs-9">
                    <input type="text" name="desi" id="form-field-1" placeholder="" class="form-control"  />
                    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                  </div>
                  </div>  
				  <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-3">Image</label>
                  <div class="col-md-9 col-sm-9 col-xs-9">
                    <input type="file" name="po" id="form-field-1" placeholder="" class="form-control"  />
                    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                  </div>
                  </div>    
				  
				  
				  <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-3">Email(Email as Login Username)</label>
                  <div class="col-md-9 col-sm-9 col-xs-9">
                    <input type="email" name="emil" id="form-field-1" placeholder="" class="form-control" required />
                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div> 
				  
               <!-- <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-3">User Name</label>
                  <div class="col-md-9 col-sm-9 col-xs-9">
                    <input type="text" name="username" id="form-field-1" placeholder="" class="form-control" required />
                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>-->
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-3">Password</label>
                  <div class="col-md-9 col-sm-9 col-xs-9">
                    <input type="password" name="password" id="form-field-1" placeholder="" class="form-control" required />
                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
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