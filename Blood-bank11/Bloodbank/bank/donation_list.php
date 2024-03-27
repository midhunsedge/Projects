<?php
ob_start();
session_start();
include("connect.php"); 
If(isset($_SESSION["user"])){
include_once 'header.php';
?>
<?php
if(isset($_POST['submit'])) { 
  $dnr_id=$_POST['donar_id'];
  	$targetDirectory = "../upload/";  // Specify the directory where the files will be stored
	$fileName = basename($_FILES["certificate"]["name"]);
	$tmpname=$_FILES["certificate"]["tmp_name"];
	$targetFilePath = $targetDirectory . $fileName;
	move_uploaded_file($tmpname, $targetFilePath);
	$pic=pathinfo($targetFilePath,PATHINFO_EXTENSION);
 	echo $dnr_id;
	$query="UPDATE donar_accept set `certificate`='$fileName' WHERE d_request_id ='$dnr_id'";
	$res1 = mysqli_query($con,$query);
	$sqlss = "SELECT * FROM donar_accept where d_request_id ='$dnr_id'";
// $data="SELECT bank_id FROM request_donation where d_request_id='$dnr_id'";
$resultss = mysqli_query($con, $sqlss);

  if ($res1>0) {
        echo "<script> alert('Successfully updated the Details');</script>";
      } else {
        echo "<script> alert('Something went wrong, try again later...');</script>";  
      }
  
}
// if ($resultss) {
//     while ($row = mysqli_fetch_assoc($resultss)) {
//         $bid = $row['bank_id'];
//         // Process the logid value
       
//     }
// }

// $query="SELECT * FROM donar_accept";
$query="SELECT accept_id,d_request_id,logid,donar_accept.status,donar_accept.certificate ,tbl_user_register.user_id, 
			tbl_user_register.f_name, tbl_user_register.l_name
			 FROM donar_accept
			 INNER JOIN tbl_user_register ON tbl_user_register.user_id = donar_accept.logid"
			 ;
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
				<th>Donar Name </th>
				<th>Blood Group</th>
                <th>Date </th> 
				<th>Download Certificate</th> 
                </tr>
                </thead>
              <tbody>
			  
			<?php 
				$i=1;
				$date=date("Y/m/d");
					  while($rows = mysqli_fetch_array($result))
 									   {
   			 ?>
			
				<tr>
					<td><?=$i;?></td>
					<td><?php echo $rows['f_name']." ".$rows['l_name'];?></td>
					<td><?php echo $rows['d_request_id'];?></td>
					<td><?php echo $date;?></td>
					<td>
						<form action="" method="POST" enctype="multipart/form-data">
						<input type="file" name="certificate">
					    <input type="text" value="<?php echo $rows['d_request_id']; ?> " name="donar_id" hidden>
					</td>
					<td>
						<input type="submit" value="submit" name="submit">
					</td>
					</form>
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