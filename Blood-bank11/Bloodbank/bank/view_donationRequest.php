<?php
ob_start();
session_start();
include("connect.php"); 
if(isset($_GET['d_request_id'])){
	$id=$_GET['d_request_id'];
	$delete=mysqli_query($con,"DELETE FROM request_donation WHERE d_request_id='$id' ");
}
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

 $llid=  $_SESSION['user_id'];
$query="SELECT * FROM request_donation where bank_id='$llid' ";
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
			<h3>List Blood Donation Requests</h3>
			</div>
			 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
             <th>Sl no</th>
			     <th>Request Id</th>
				<th>Blood Type</th>
				<th>Unit</th>
                <th>Request Date</th> 
				
				
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
					<td name="del">#<?php echo $rows['d_request_id'];?></td>
					<td><?php echo $rows['blood_type'];?></td>
					<td><?php echo $rows['units'];?></td>
					<td><?php echo $rows['request_date'];?></td>
	
					
		<td><a  href="View_Accepted.php?id=<?php echo $rows['d_request_id'];?>" class="fa fa-pencil" style="color:green;font-size:14px">View Accepted Donor</a> 
		<!-- <a href="view_donationRequest.php" id='$id' class='btn btn-success' >Delete</a>	 -->
		<form action="" method="post">
			<input type="text" value="<?php echo $rows['d_request_id']?>" hidden>
		<input type="submit" value="Delete" class='btn btn-success' name="delete">	 
		</form>
		<?php 
		if(isset($_POST['delete'])){
			$id= $rows['d_request_id'];
			$delete=mysqli_query($con,"DELETE FROM request_donation WHERE d_request_id='$id' ");
}
		
		?>
		
</td>
		
					
				</tr>
				
				<!-- Modal edit class-->
  
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
		header("Location: index.php");
	}
?>