<?php
ob_start();
session_start();
 include 'connect.php'; 
If(isset($_SESSION["user_id"])){
	$userid=$_SESSION['user_id'];
	include_once 'innerhead.php';
	
if(isset($_GET['del'])){
	$station_id= $_GET['del'];
	$query = "Update donar_accept set 	status='Accept',logid=$userid where accept_id='$station_id'";
	
			$res = mysqli_query($con,$query);
if($res)
{
    //echo "row deleted";
    echo "<script>alert('Accept the Request');window.location.href='viewDonation.php'</script>";

}
 }
 
 if(isset( $_GET['del1'])){
	$station_id= $_GET['del1'];
	$query = "Update donar_accept set 	status='Reject' where accept_id='$station_id'";
	
			$res = mysqli_query($con,$query);
if($res)
{
    //echo "row deleted";
    echo "<script>alert('Reject the Request');window.location.href='viewDonation.php'</script>";

}
 }	
	
	
	
	?>
	
	
<style>
.button__badge {
  background-color: #fa3e3e;
  border-radius: 2px;
  color: white;
 
  padding: 1px 3px;
  font-size: 10px;
  
  position: absolute;
  top: 0px;
  right:5px;
}
</style>


<section id="service" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<h2 class="ser-title">Donor Request</h2>
					
					<hr class="botm-line">
					<img src="img/message.jpg" class="img-responsive" >
				</div>
				<div class="col-md-8 col-sm-8">
					<div class="service-info">
						
						<div class="icon-info">
					<table class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Sl no</th>
				<th>Blood Type</th>
				<th>Unit</th>
                <th>Request Date</th> 
				
				<th>Blood Bank</th>
				<th>Status</th>
				<th>Action</th> 
				</tr>
                </thead>
              <tbody>
			  
			<?php 
			$sql="SELECT *,donar_accept.status as sts, request_donation.status as rstat from  donar_accept LEFT JOIN request_donation  ON request_donation.d_request_id= donar_accept.d_request_id INNER JOIN blood_bank ON blood_bank.logid= request_donation.bank_id ";
$result = mysqli_query($con,$sql);
if($result){
$count=mysqli_num_rows($result);
if($count==0){ 
	echo '<tr><td></td><td></td><td></td><td></td><td></td><td></td>
					<td> No Details Available.. </td><td></td><td></td></tr></tbody></table>'; } 
					 else{ $i=1;
			 while($rows= mysqli_fetch_array($result)){
				 ?>
   		
			
				<tr>
				<td><?=$i;?></td>
					<td><?php echo $rows['blood_type'];?></td>
					<td><?php echo $rows['units'];?></td>
					<td><?php echo $rows['request_date'];?></td>
					<td><?php echo $rows['bank_name'];?></td>
					<td><?php if($rows['sts']==1){echo "Waiting";} 
						  else if($rows['sts']==3)
						  {
							  echo " Donated";
						  }
						   else if($rows['sts']=="Accept")
						  {
							  echo "You are Accepted ";
						  }
						  ?></td>
			<td>  <a href="viewDonation.php?del=<?php echo $rows['accept_id']; ?>"><button class="btn btn-success">Accept</button></a>
    <!--<a href="viewDonation.php?del1=<?php echo $rows['accept_id']; ?>"><button class="btn btn-danger">Reject</button></a>-->
			</td>			  
						  
						  
						  
			</tr><?php $i++; } 
			?>
							</tbody>
							</table>
						<?php }?>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
	</section>
<?php include_once 'footer.php';
}   }
else{
	header("Location: index.php");
}
 
?>