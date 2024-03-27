<?php
ob_start();
session_start();
 include 'connect.php'; 
If(isset($_SESSION["user_id"])){
	$userid=$_SESSION['user_id'];
	include_once 'innerhead.php';
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
					<h2 class="ser-title">Complaint List </h2>
					
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
				<th>Subject</th>
				<th>Message</th>
                <th>Reply</th> 
				
				</tr>
                </thead>
              <tbody>
			  
			<?php 
			$sql="SELECT * from  tbl_complaints where logid='$userid'  ";
$result = mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
if($count==0){ 
	echo '<tr><td></td><td></td>
					<td> No Details Available.. </td><td></td><td></td></tr></tbody></table>'; } 
					 else{ $i=1;
			 while($rows= mysqli_fetch_array($result)){
				 ?>
   		
			
				<tr>
				<td><?=$i;?></td>
					<td><?php echo $rows['subject'];?></td>
					<td><?php echo $rows['message'];?></td>
					<td><?php echo $rows['reply'];?></td>
					  
						  
						  
						  
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
}  
else{
	header("Location: index.php");
}
 if(isset( $_GET['del'])){
	$station_id= $_GET['del'];
  $sql="delete from tbl_blood_request where request_id=".$station_id."";
$ex=mysqli_query($con,$sql);
if($ex)
{
    //echo "row deleted";
    echo "<script>alert('Details deleted');window.location.href='viewRequest.php'</script>";

}
 }
?>