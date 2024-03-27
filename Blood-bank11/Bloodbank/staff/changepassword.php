<?php 
ob_start();
session_start();
if(isset($_SESSION["user"])){
  $hid = $_SESSION["user"]; 
//var_dump($hid).die();
?>
<?php include 'connect.php';?>
<?php include 'header.php';?>
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" method="post" action="" >
                      <span style="font-size: x-large; font-weight: bold;" class="section">ChangePassword</span>
		<?php

?>  	
<input type="hidden" value="<?php echo $row['user_id'];?>" name="user_id">	  
 <div class="item form-group">
 <div class="item form-group">
                     <br><br><br>   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Current Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="cpass" name="cpass" required="required" value="" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">New Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="npass" name="npass" required="required" value="" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Confirm Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="cnpass" name="cnpass" required="required" value="" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send" name="submit" type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include 'footer.php';?>
        <!-- /page content -->
        <?php
	if(isset($_REQUEST['submit'])) {
		//$a = $_POST['user_id'];	
		$b = $_REQUEST['cpass'];
		$c = $_REQUEST['npass'];
    $e=  $_REQUEST['cnpass'];
		$d=  $_SESSION['user'];
        //var_dump($b,$c,$e).die();
        if($c!=$e){
            echo '<script language="javascript">';
            echo 'alert("Confirm Password and New Password are not same pls try once again...."); location.href="changepassword.php"';
            echo '</script>';
        }else{
            //$query="UPDATE user_notification set status=$status WHERE not_id='$id' ";
		$query = "UPDATE tbl_login set password='$e' WHERE id='$d'";
		//var_dump($query).die();
			$res = mysql_query($query);
            //var_dump($res).die();
			if ($res>0) {
				 echo '<script language="javascript">';
				 echo 'alert("Password Changed Successfully"); location.href="changepassword.php"';
                echo '</script>';
		    }		
		    else {
				echo "<script> alert('Something went wrong, try again later...');</script>";	
			}
        }
		
	}		
	?>	
<?php
}
else{
header('location:index.php');	
}
?>		
		
