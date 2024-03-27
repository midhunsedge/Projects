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
                     <center><span style="font-size: x-large; font-weight: bold;" class="section">Blood Request</span> </center><a style="margin-left:1200px;color:green" href="viewRequest.php">View Request </a><br>
 <div class="item form-group">
 <div class="item form-group">
                     <br><br><br>   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Blood Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="t1" required="required" value="" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Unit<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="t2" required="required" value="" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="date" name="t6" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Blood Section<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control"   name="t7" rows="4" cols="10" style="width:580px;">
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
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Hospital Details<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="t3" required="required" value="" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Patiant Details<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <textarea name="t4"  required="required" value="" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>  
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Requested Blood Bank<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="t5"  style="" class="form-control" >
                        <option value="">--select--</option>
                        <?php $sql="select * from blood_bank";
					   $sqldata=mysqli_query($con,$sql);
					   while($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC))
					   {
						echo'<option value="'.$row['bank_id'].'">'.$row['bank_name'].'</option>';
					   }?>
                        </select>
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
    $e=$_REQUEST['t3'];
		$f=$_REQUEST['t4'];
		$h=$_REQUEST['t5'];
		$d=  $_SESSION['user_id'];
        $g= $_REQUEST['t6'];
        $i= $_REQUEST['t7'];
    
	$sql="INSERT INTO tbl_blood_request (blood_type,request_date,blood_section, unit,logid,	hospital_details,patient_details,status,bankid_id)
	VALUES
	('$b','$g','$i','$c','$d','$e','$f','1','$h')";
	$res=mysqli_query($con,$sql);
				if($res){ ?>
	<script>
	 alert('Registered Successfully');
	 location.href="bloodRequest.php";
	 </script>
	 <?php } else{?>
		 <script>
		 alert('Something went wrong, try again later... ');
		 location.href="bloodRequest.php";
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
		
