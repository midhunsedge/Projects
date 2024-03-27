<?php
session_start();
if (isset($_SESSION['user_id'])){
//echo "Welcome ".$_SESSION['user_id'];
?>
<?php include 'connect.php';?>
 <?php include 'innerhead.php';?> 
 
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content"><br><br>

                    <form class="form-horizontal form-label-left" method="post" action="" >
                      <!-- <span class="section">MY PROFILE</span> -->
                      <center><span style="font-size: x-large; font-weight: bold;" class="section">MY PROFILE</span></center><br><br>
		<?php
$id = $_GET['user_id'];
 
$sre="select *  from tbl_user_register where user_id='$id'";
$res=mysqli_query($con,$sre);
while($row=mysqli_fetch_array($res))
{
?>   			   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="f_name" placeholder="hospitalname" value="<?php echo $row[2];?>" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email" name="address" required="required"  value="<?php echo $row[4];?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required"  value="<?php echo $row[8];?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Phone Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="ph" required="required" value="<?php echo $row[7];?>"  id="phn" onblur="auphoness();" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Blood Group <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="t1" required="required" value="<?php echo $row[5];?>"  class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>
					 
					  
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Age <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="t2" required="required" value="<?php echo $row[6];?>"  class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
					  
                      <div class="item form-group">
                      
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send" name="submit" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
<?php }?>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
		
		
	<?php
	if(isset($_REQUEST['submit'])) {
		
		
		
		$a = $_POST['f_name'];
		$b = $_POST['address'];
		$c = $_POST['email'];
    $d = $_POST['ph'];
 $t2 = $_POST['t2'];

	$query = "Update tbl_user_register set f_name='$a',address='$b',email='$c',ph='$d',age='$t2' where user_id='$id'";
	
			$res = mysqli_query($con,$query);
			if ($res>0) {
				 echo '<script language="javascript">';
				 echo 'alert("Successfully updated"); location.href="userhome.php"';
        echo '</script>';} 
		else {
				echo "<script> alert('Something went wrong, try again later...');</script>";	
			}
		
	}		
	?>	
		<?php
}
else{
header('location:index.php');	
}
?>	

<script>
function auphoness()
    {
    var x =document.getElementById("phn").value;
    var letters=/^\d{10}$/;
    if(!x.match(letters))
    {
    alert("please Add 10 Digit phone number");
    $("#phn").val('');
    }
    
    }
	</script>