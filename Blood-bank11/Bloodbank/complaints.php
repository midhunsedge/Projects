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
                     <center><span style="font-size: x-large; font-weight: bold;" class="section">Complaints</span> </center><a style="margin-left:1200px;color:green" href="viewComplaints.php">View Complaints </a><br>
 <div class="item form-group">
 <div class="item form-group">
                     <br><br><br>   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Subject<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="t1" required="required" value="" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                 
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Message<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="t2" required="required" value="" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
					  
					
                    
					  
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send" name="submit" type="submit" class="btn btn-success">Save</button>
                        </div>
                      </div>

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
		$b = $_REQUEST['t1'];
		$c = $_REQUEST['t2'];
        
		$d=  $_SESSION['user_id'];
        $g=date('Y-m-d');
    
	$sql="INSERT INTO tbl_complaints (logid,subject,message,reply)
	VALUES
	('$d','$b','$c','Not Yet Seen')";
	$res=mysqli_query($con,$sql);
				if($res){ ?>
	<script>
	 alert('Send Successfully');
	 location.href="complaints.php";
	 </script>
	 <?php } else{?>
		 <script>
		 alert('Something went wrong, try again later... ');
		 location.href="complaints.php";
		 </script>
	<?php
	//echo "Your message has been received";
	
	}
        
		
	}		
	?>	
<?php
}
else{
header('location:index.php');	
}
?>		
		
