<?php
 include 'connect.php'; 

	?>

<style>
</style>

                       <center> <form >
                         <table border="0"><tr><td  style="border-top:none;"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Search Blood</label></td>
                       <td  style="border-top:none;"> <select name="bd" class="form-control" style="width:200px;">
                        <option>Select</option>
                        ><?php $sbd="SELECT distinct(b_group) from  blood_stock";
						$sresult = mysql_query($sbd);
						while($ro= mysql_fetch_array($sresult)){
						
						?>
                        <option><?php echo $ro['b_group'];?></option>
                        <?php }?>
                        </select></td></tr>
                        <tr><td style="border-top:none;"></td><td  style="border-top:none;"><input type="submit" name="sb" value="Search" class="btn btn-success"/></td></tr></table>
                        </form>
                        <p></p>
					<table class="table table-bordered table-striped" style="width:500px !important;">
                <thead>
                <tr>
				<th>Blood Group</th>
				 <th>Hospiatl</th>
                 <th>Address</th> 
				 <th>Contact</th> 
				</tr>
                </thead>
              <tbody>
			  
			<?php
			if(isset($_REQUEST['sb'])) 
			{
			$blood=$_REQUEST['bd'];
			$sql="SELECT * from  tbl_hospital INNER JOIN blood_stock ON tbl_hospital.uid= blood_stock.hospital where b_group='$blood'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count==0){ 
	echo '<tr>
	<td></td>
	<td></td>
	<td> No Message Available.. </td>
	<td></td>
	<td></td>
	</tr>
	</tbody>
	</table>'; } 
					 else{ 
			 while($rows= mysql_fetch_array($result)){
				 ?>
   		
			
				<tr>
					<td><?php echo $rows['b_group'];?></td>
					<td><?php echo $rows['hname'];?></td>
					<td><?php echo $rows['address'];?></td>
					<td><?php echo $rows['phone'];?></td>
			</tr><?php } 
			?>
							</tbody>
							</table>
						<?php }}?>
			
</center>