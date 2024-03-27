<?php
 ob_start();
 //session_start();
 include 'connect.php'; 
If(isset($_SESSION["user_id"])){
	$userid=$_SESSION['user_id'];
include_once 'innerhead.php';
$sql="SELECT * FROM  user_notification WHERE user_id='$userid' and status='0'";
//$result = mysql_query($sql);
//$count=mysql_num_rows($result);
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Globalized Medi Care and Organ Transplantation</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <!--link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal"-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- =======================================================
        Theme Name: Medicare
        Theme URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
        Author: BootstrapMade.com
        Author URL: https://bootstrapmade.com
    ======================================================= -->
	 <script src="js/jquery.min.js"></script>
	   <style>
.button__badge {
  background-color: #fa3e3e;
  border-radius: 2px;
  color: white;
 
  padding: 1px 3px;
  font-size: 10px;
  
  position: absolute;
  top: 4px;
  right:5px;
}
</style>
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
	<div class="bg-logcolor">
<nav class="navbar-default ">
  <a class="navbar-brand" href="#">BLOODBANK</a>		
<div class="collapse navbar-collapse navbar-right">
<ul class="nav navbar-nav">
<li><a href="userhome.php">Home</a></li>
<?php // if($_SESSION['don']=="receiver") { ?>

<li><a href="bloodRequest.php">Blood Request </a></li>
<?php// } ?>

<?php // if($_SESSION['don']=="doner") { ?>

<li><a href="viewDonation.php">View Donation Request </a></li>
<?php // } ?>
<li><a href="complaints.php">Complaints</a></li>
<li><a href="changepassword.php">ChangePassword</a></li>
<li><a href="certificate.php">certificate</a></li>
<li><a href="profile.php?user_id=<?php echo $_SESSION['user_id'];?>">Profile</a></li>


<li><a href="logout.php">Logout</a></li>

</ul>
  </div>

			</div>
	<?php }  
else{
	header("Location: index.php");
}
?>