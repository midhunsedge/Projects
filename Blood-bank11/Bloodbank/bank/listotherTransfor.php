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
$a= $_POST['sts'];

  $query="UPDATE branch_transfor set status='$a'  WHERE transfor_id ='$id'  ";//var_dump($reply);die();
  $res1 = mysqli_query($con,$query);

  if ($res1>0) {
        echo "<script> alert('Successfully updated the Details');</script>";
      } else {
        echo "<script> alert('Something went wrong, try again later...');</script>";  
      }
  
}
if(isset($_REQUEST['save'])) { 
  $id = $_POST['hid'];
  $query=mysqli_query($con,"DELETE FROM branch_transfor WHERE transfor_id ='$id'");//var_dump($reply);die();
  //$res2 = mysql_query($query);

  if ($query) 
       {
	echo"<script>alert('successfully Removed One Row');</script>";	
	}
	else
	echo "failed";
}

 $llid=  $_SESSION['user_id'];
$query="SELECT * FROM branch_transfor LEFT JOIN blood_bank ON blood_bank.logid= branch_transfor.requested_branch where request_branch='$llid' ";
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
			<h3> Other Branch Transfor Requests</h3>
			</div>
			 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
               <th>Sl no</th>
				  <th>Requested Branch </th>
				  <th>Blood Type</th> 
                  <th>Blood Section</th> 
				  <th>Blood Unit</th>
                 <th>Request Date</th>	
                 <th>Status</th>					 
                 <th>Action</th>
                </tr>
                </thead>
              <tbody>
			  
			<?php 
				$i=1;
				while($row = mysqli_fetch_array($result))
 									   {
   			 ?>
			
				<tr>
					<td><?php echo $i++;?></td>
					<td><?php echo $row['bank_name'];?>
					<br><?php echo $row['phone'];?></td>
					<td><?php echo $row['blood_type'];?></td>
					<td><?php echo $row['section'];?></td>
					<td><?php echo $row['unit'];?></td>
					<td><?php echo $row['request_date'];?></td>
					<td><?php echo $row['status'];?></td>
					
		<td>	
		<?php if($row['status']=="waiting") { ?> 
		<a data-toggle="modal" data-target="#myModal-<?php echo $row['transfor_id']; ?>" href="#" class="fa fa-pencil" style="color:green;font-size:24px"></a>
		<?php } ?>	
					</td>
					
				</tr>
				

  <!---------------------------------------->
 <div  class="modal fade" id="myModal-<?php echo $row['transfor_id'] ?>"  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Accept/Reject</h4>
        </div>
        <div class="modal-body">
       <form class="form-horizontal" method="post" action="#">
        	<input type="hidden" name="hid"  value="<?php echo $row['transfor_id'];?>">
			      
			     <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Status</label>
					<div class="col-sm-9">
						<select type="text"  name="sts" placeholder="" class="form-control" required="required" >
						<option value="Accepted">Accepted</option>
						<option value="Rejected">Rejected</option>
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