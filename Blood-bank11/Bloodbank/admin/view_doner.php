<?php 
ob_start();
session_start();
If(isset($_SESSION["user"])){
include_once 'header.php';
include_once 'connect.php';
  $hid = $_SESSION["user"]; 
 $sl = "SELECT * FROM tbl_user_register WHERE user_role='doner'and status='0'"; 
 $ex=mysqli_query($con,$sl);
 

?>
<div class="right_col" role="main">
          <div class="row">
            <div class="page-title">
              <div class="title_left">
                <h3>View Doner List</h3>
              </div>

              <div class="title_right">
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
           
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Doner List</h2>
                  
                    <div class="clearfix"></div>
                  </div>

                    <div class="clearfix"></div>
                  <div class="x_content">
                    <br />
                  <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr><th>Sl No</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Address</th>
                          <th>Blood Group</th>
						  <th>Age</th>
						  <th>Phone</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php $i=1; while($row=mysqli_fetch_array($ex)){ ?>
                        <tr><td><?php echo $i++;?></td>
                          <td><?php echo $row['f_name']; ?></td>
                          <td><?php echo $row['l_name']; ?></td>
                          <td><?php echo $row['address']; ?></td>
                          <td><?php echo $row['b_group']; ?></td>
						  <td><?php echo $row['age']; ?></td>
						  <td><?php echo $row['ph']; ?></td>
                        </tr>
              <?php  } ?>          
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
           <!-- Datatables -->
    
    <!-- /Datatables -->
<?php 
include_once 'footer.php';
  }
  else{
    header("Location: index.php");
  }
?>