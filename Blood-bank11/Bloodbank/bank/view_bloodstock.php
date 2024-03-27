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
$b= $_POST['address'];
$c= $_POST['phone'];
  $query="UPDATE blood_stock set b_type='$a',b_section='$b',b_unit
  ='$c'   WHERE stock_id='$id'  ";//var_dump($reply);die();
  $res1 = mysqli_query($con,$query);

  if ($res1>0) {
        echo "<script> alert('Successfully updated the Details');</script>";
      } else {
        echo "<script> alert('Something went wrong, try again later...');</script>";  
      }
  
}
if(isset($_REQUEST['save'])) { 
  $id = $_POST['hid'];
  $query=mysqli_query($con,"DELETE FROM blood_stock WHERE stock_id='$id'");//var_dump($reply);die();
  //$res2 = mysql_query($query);

  if ($query) 
       {
	echo"<script>alert('successfully Removed One Row');</script>";	
	}
	else
	echo "failed";
}

 $llid=  $_SESSION['user_id'];
$query="SELECT * FROM blood_stock where bank='$llid' ";
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
			<h3>List BloodStocks</h3>
			</div>
			 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
               <th>Sl no</th>
				  <th>Blood Type</th>
                  <th>Blood Section</th> 
				  <th>Blood Unit</th>
                			  
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
					<td><?php echo $row['b_type'];?></td>
					<td><?php echo $row['b_section'];?></td>
					<td><?php echo $row['b_unit'];?></td>
					
		<td><a data-toggle="modal" data-target="#myModal-<?php echo $row['stock_id']; ?>" href="#" class="fa fa-pencil" style="color:green;font-size:24px"></a>
					
					<a style="color:#ff0coc !important:" data-toggle="modal" data-target="#delete-<?php echo $row['stock_id'] ?>" href="#"><i class="fa fa-trash" style="font-size:24px"></i></a>
					
				
					</td>
					
				</tr>
				
				<!-- Modal edit class-->
  <div  class="modal fade" id="myModal-<?php echo $row['stock_id'] ?>"  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit</h4>
        </div>
        <div class="modal-body">
       <form class="form-horizontal" method="post" action="#">
        	<input type="hidden" name="hid"  value="<?php echo $row['stock_id'];?>">
			    <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Blood Type</label>
					<div class="col-sm-9">
						<input type="text"  name="hname" placeholder="" class="form-control" required="required" value="<?php echo $row['b_type'];?>"> 		
					</div>
				</div><br><br>
			    <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Section</label>
					<div class="col-sm-9">
						<input type="text"  name="address" placeholder="" class="form-control" required="required" value="<?php echo $row['b_section'];?>"> 			
					</div>
				</div><br><br>          
			     <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Unit</label>
					<div class="col-sm-9">
						<input type="text"  name="phone" placeholder="" class="form-control" required="required" value="<?php echo $row['b_unit'];?>"> 		
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
  <div class="modal fade" id="delete-<?php echo $row['stock_id'] ?>"  role="dialog">
     <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
         <div class="modal-body">
       <form name="billing" method="post"  action="#">
  <input type="hidden"   name= "hid"  value="<?php echo $row['stock_id'];?>">
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>   
      </div>
        <div class="modal-footer ">
         <button name="save" type="submit" class="btn btn-success" ><span class="glyphicon 
		glyphicon-ok-sign"></span>Yes</button>
	<button type="button" class="btn btn-default" data-dismiss="modal" ><span class="glyphicon glyphicon-remove"></span>No</button>
      </div> 
	  </form>
        </div>
    <!-- /.modal-content --> 
  </div>
  
      <!-- /.modal-dialog --> 
	  
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