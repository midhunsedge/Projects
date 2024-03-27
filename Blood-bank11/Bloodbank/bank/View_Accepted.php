<?php
ob_start();
session_start();
include("connect.php"); 
If(isset($_SESSION["user"])){
include_once 'header.php';
?>
<?php


 $llid=  $_GET['id'];
$query="SELECT *,donar_accept.status as sts FROM donar_accept LEFT JOIN tbl_user_register ON tbl_user_register.user_id= donar_accept.logid where d_request_id='$llid' ";
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
			<h3>List Accepted Users</h3>
			</div>
			 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
             <th>Sl no</th>
				<th>Request Id</th>
				<th>User Details</th>
                <th>Status</th> 
				
				
				
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
					<td><?php echo $rows['d_request_id'];?></td>
					<td><?php echo $rows['f_name'];?>
					<br><?php echo $rows['ph'];?><br>
					<?php echo $rows['b_group'];?></td>
					
				<td><?php echo $rows['sts'];?></td>
		
					
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