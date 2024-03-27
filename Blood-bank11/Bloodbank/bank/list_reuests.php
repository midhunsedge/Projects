<?php
ob_start();
session_start();
include("connect.php"); 
If(isset($_SESSION["user"])){
include_once 'header.php';
?>
<?php
if(isset($_REQUEST['b'])) { 
$id = $_POST['hid'];
$a= $_POST['hname'];

  $query="UPDATE tbl_blood_request set status='$a'   WHERE request_id ='$id'  ";//var_dump($reply);die();
  $res1 = mysqli_query($con,$query);

  if ($res1>0) {
        echo "<script> alert('Successfully updated the Details');</script>";
      } else {
        echo "<script> alert('Something went wrong, try again later...');</script>";  
      }
  
}
$bid='';
 $llid=  $_SESSION['user_id'];
 $sqlss = "SELECT bank_id FROM blood_bank where logid ='$llid'";
$resultss = mysqli_query($con, $sqlss);

if ($resultss) {
    while ($row = mysqli_fetch_assoc($resultss)) {
        $bid = $row['bank_id'];
        // Process the logid value
       
    }
}
 
$query="SELECT * FROM tbl_blood_request where bankid_id='$bid' ";
$result = mysqli_query($con,$query);


?> 
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>DASHBOARD</h3>
              </div>

              <div class="title_right">
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
<div class="gallery" >
<div class="container">
	<div class="row">



		<div class="col-xs-12 col-xs-offset-0">
		 <div class="page-content">
			<div class="page-header">
			<h3>List BloodRequests</h3>
			</div>
			 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
             <th>Sl no</th>
				<th>Blood Type</th>
				<th>Unit</th>
                <th>Request Date</th> 
				<th>Blood Section</th> 
				<th>Hospital Details</th> 
				<th>Patiant Details</th>
				
				<th>Status</th>
				<th>Action</th> 
                </tr>
                </thead>
              <tbody>
			  
			<?php 
				$i=1;
				
					  while($rows = mysqli_fetch_array($result))
 									   {
   			 ?>
			
				<tr>
					<td><?=$i;?></td>
					<td><?php echo $rows['blood_type'];?></td>
					<td><?php echo $rows['unit'];?></td>
					<td><?php echo $rows['request_date'];?></td>
					<td><?php echo $rows['blood_section'];?></td>
					<td><?php echo $rows['hospital_details'];?></td>
					<td><?php echo $rows['patient_details'];?></td>
				
					<td><?php if($rows['status']==1){echo "Waiting";} 
						  else if($rows['status']==3)
						  {
							  echo " Donated ";
						  }
						   else if($rows['status']==2)
						  {
							  echo "Accepted";
						  }
						  ?></td>
					
					<td>
						<?php if($rows['status'] != 3) { ?>
							<a data-toggle="modal" data-target="#myModal-<?php echo $rows['request_id']; ?>" href="#" class="fa fa-pencil" style="color:green;font-size:24px"></a>	
						<?php } ?> 
					</td>
					
				</tr>
				
				<!-- Modal edit class-->
  <div  class="modal fade" id="myModal-<?php echo $rows['request_id'] ?>"  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Request Status</h4>
        </div>
        <div class="modal-body">
       <form class="form-horizontal" method="post" action="#">
        	<input type="hidden" name="hid"  value="<?php echo $rows['request_id'];?>">
			    <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Status</label>
					<div class="col-sm-9">
						<select type="text"  name="hname" class="form-control"> 
						<?php if ($rows['status'] == 1 ) { ?>
						<option value="2">Accept request  </option>
						<?php } else  if ($rows['status'] == 2 ) {  ?>
							<option value="3">Donated</option>
						<?php } ?>
</select>						
					</div>
				</div><br><br>
			   
			<input type="submit" class="btn btn-success" name="b" value="update">
                       </form>
        <div class="modal-footer">
        </div>
        </div>
        </div>
    </div>
  </div> 
  <!---------------------------------------->
 
  <!--------end modal-------------->
						<?php } ?>
												</tbody>
				</table>
		 </div>
		</div>
	</div>
	<div class="clearfix"> </div>
</div>
</div>
</div>
          </div>
        </div>
		<script type="text/javascript">
  function checkchr(a)
{
	var x=a.value;
	var letters=/^[A-Za-z ]+$/;
	if(!x.match(letters))
	{
		alert("please input alphabets");
		a.value=" ";
		a.focus();
	}
	
}
function checkph(a)
{
	var x=a.value;
	if(isNaN(x))
	{
		a.value=" ";
		a.focus();
	}
	else if(x.length>=10 && x.length<=11)
	{
	}
	else
		alert("enter 10 or 11 digits");
		
		
}
</script>
		<?php 
include_once 'footer.php';
	}
	else{
		header("Location: ../index.php");
	}
?>