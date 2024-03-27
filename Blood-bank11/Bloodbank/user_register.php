<?php
session_start();
ob_start(); 
include("connect.php"); 

$uname=$_POST['username'];
$pass=$_POST['password'];
$fname=$_POST['name'];
$_SESSION['name']=$fname;
$lname=$_POST['lname'];
$ph=$_POST['ph'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$b_group=$_POST['b_group'];
$age=$_POST['age'];
// $userrole=$_POST['role'];
$hospital=$_POST['hospital'];


if ($uname==""  or $pass=="" or $fname=="" or $lname=="" or $ph=="" or $email==""or $gender==""or $address==""or $b_group==""or $age==""or  $hospital=="")
{
?>
	<script>
	 alert('All fields must be entered, hit back button and re-enter information');
	 location.href="index.php";
	 </script>
	 <?php	

}

elseif($_POST['password'] != $_POST['cpwd']) {
?>
	<script>
	 alert('Your passwords did not match.');
	 location.href="index.php";
	 </script>
	 <?php	
 	

 	}

else{

		$qury="INSERT INTO tbl_login(username,password,role) VALUES('$uname','$pass','2')";
		$res = mysqli_query($con,$qury);
		$id=mysqli_insert_id($con);

	$sql="INSERT INTO tbl_user_register (user_id,f_name,l_name,address,b_group,age,ph,email,gender,user_role,district,status)
	VALUES
	('$id','$fname','$lname','$address','$b_group','$age','$ph','$email','$gender',0,'$hospital','0')";
	$res=mysqli_query($con,$sql);
	//var_dump($sql);die();
	
	
	if($res){ ?>
	<script>
	 alert('Registered Successfully');
	 location.href="index.php";
	 </script>
	 <?php } else{?>
		 <script>
		 alert('User Already Present');
		 location.href="index.php";
		 </script>
	<?php
	//echo "Your message has been received";
	
	}
	
}

?>
