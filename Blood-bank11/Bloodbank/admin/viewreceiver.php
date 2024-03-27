<?php
ob_start();
session_start();
if (isset($_SESSION['user'])){
echo "Welcome ".$_SESSION['user'];
?>
 
 <?php include 'connect.php';?>
 <?php include 'header.php';?>
 <div class="right_col" role="main">
          <div class="">
            
 <div class="clearfix"></div>
 <div class="row">
 <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
                  <div class="x_title">
                    <h2>List Registered  Users<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Srl no</th>
                          <th>Name</th>
                          <th>Age</th>
                          <th>Blood group</th>
                          <th>Gender</th>
                          <th>Phone</th>
                         
                        </tr>
                      </thead>
 <?php
$sre="select * from  tbl_user_register where status='0' and user_role='0'";
$res=mysqli_query($con,$sre);
$i=1;
while($row=mysqli_fetch_array($res))
{
$id =  $row['reg_id'];
$uid=  $row['user_id'];
?>			 <tbody>
                        <tr>
                          <td><?php echo $i++;?></td>
                          <td><?php echo $row['f_name'];?></td>
                          <td><?php echo $row['age'];?></td>
                          <td><?php echo $row['b_group'];?></td>
                          <td><?php if($row['gender']==0) echo "female"; else echo "male";?></td>
                          <td><?php echo $row['ph'];?></td>
						  
        </tr>
<?php } ?>				
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              </div>
              </div>
<?php include 'footer.php';?>
<?php
}
else{
header('location:index.php');	
}
?>