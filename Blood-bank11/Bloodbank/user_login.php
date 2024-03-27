<?php 
ob_start();
session_start();
include("connect.php"); 

$uname=$_POST['usname'];
$pass=$_POST['pass'];

if ($uname==""  or $pass=="")
{
echo "All fields must be entered, hit back button and re-enter information";
}
else
{

	$sql="SELECT * FROM tbl_login WHERE username='".$uname."' and password='".$pass."'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	$count=mysqli_num_rows($result);
	if ($count == 1) {
		$id=$row['id'];
		$sql1="SELECT * FROM tbl_user_register where user_id=$id  ";
		$res=mysqli_query($con,$sql1);
		$r=mysqli_fetch_array($res);
	
	
	
	
		if($count == 1 && $row['password']==$pass && $row['role']=='2') {
						$_SESSION['user_id'] = $row['id'];
						$_SESSION['don'] = $r['user_role'];
						header("Location: userhome.php");
					}
		elseif($count == 1 && $row['password']==$pass && $row['role']=='1') {
						$_SESSION['user_id'] = $row['id'];
						$_SESSION['user'] = $row['id'];
						$_SESSION['don'] = $row['role'];
						header("Location: admin/home.php");
					}
  elseif($count == 1 && $row['password']==$pass && $row['role']=='3') {
						$_SESSION['user_id'] = $row['id'];
						$_SESSION['user'] = $row['id'];
						$_SESSION['don'] = $row['role'];
						header("Location: staff/home.php");
					}					
	elseif($count == 1 && $row['password']==$pass && $row['role']=='4') {
						$_SESSION['user_id'] = $row['id'];
						$_SESSION['user'] = $row['id'];
						$_SESSION['don'] = $row['role'];
						header("Location: bank/home.php");
					}						
					
					else{
						
					echo "<script> alert('Something went wrong, try again later...');</script>";	
					}

	
				}					else{
						
					// echo "<script> alert('Something went wrong, try again later...');</script>";
					header("Location: index.php");	
					}

					
	
}

?>