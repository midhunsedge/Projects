<?php
ob_start();
session_start();
 include 'connect.php'; 
If(isset($_SESSION["user_id"])){
	$userid=$_SESSION['user_id'];
	$don=$_SESSION['don'];
include_once 'innerhead.php';
$sql="SELECT * FROM  user_notification WHERE user_id='$userid'and status='0'";
//$result = mysql_query($sql);
//$count=mysql_num_rows($result);

// if(isset($_REQUEST['reg'])) {
// 		$a = $_POST['t1'];	
// 		$b = $_POST['t2'];
// 		$c = $_POST['t3'];
// 		$d = $_POST['t4'];
// 		$e = $_POST['t5'];
		
// 	$query = "Update tbl_user_register set weight='$a',pulse='$b',Hb='$c',BP='$d',Temprature='$e' where user_id='$userid'";
// 	$res = mysql_query($query);
// 			if ($res>0) {
// 				 echo '<script language="javascript">';
// 				 echo 'alert("Successfully updated"); location.href="userhome.php"';
//         echo '</script>';} 
// 		else {
// 				echo "<script> alert('Something went wrong, try again later...');</script>";	
// 			}
		
// 	}


?>
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


<section id="service" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<h2 class="ser-title">Our Service</h2>
					<hr class="botm-line">
					<img src="img/donation.jpg" class="img-responsive" >
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-stethoscope"></i>
						</div>
						<div class="icon-info">
							<h4>24 Hour Support</h4>
							<p>For inquiries or assistance, you may consider getting in touch with us</p>
						</div>
					</div>
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-ambulance"></i>
						</div>
						<div class="icon-info">
							<h4>Emergency Services</h4>
							<p>Emergency Medical Technician (EMT) and ambulance are avalilable </p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-user-md"></i>
						</div>
						<div class="icon-info">
							<h4>Medical Counseling</h4>
							<p>Assistance for organ and blood donation,you may consider getting in touch with us</p>
						</div>
					</div>
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-medkit"></i>
						</div>
						<div class="icon-info">
							<h4>Premium Healthcare</h4>
							<p>We are dedicated to providing quality healthcare services to the community we serve.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ service-->
	<!--cta-->
	<section id="cta-1" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="schedule-tab">
    			<div class="col-md-4 col-sm-4 bor-left">
    				<div class="mt-boxy-color"></div>
	    			<div class="medi-info">
		    			<h3><i class="fa fa-tint" aria-hidden="true"> &nbsp;Blood</i></h3>
						<p>Donating blood saves lives, so they can thrive Tears of a mother cannot save her child, but your blood can Rich or poor, you have the most precious natural resource of all </p>
							    	
					</div>
    			</div>
				<div class="col-md-4 col-sm-4">
					<div class="medi-info">
		    			<h3><i class="fa fa-eye" aria-hidden="true">&nbsp;Eye</i></h3>
						<p>Eyes are a precious gift to mankind.A wise
						man utilizes the gift while alive,and after death
						too.So they can be the light.donate your sight and live after you death.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 mt-boxy-3">
					<div class="mt-boxy-color"></div>
					<div class="time-info">
			    			<h3><i class="fa fa-heartbeat" aria-hidden="true">&nbsp;Organ</i></h3>
							<p>The value of life is not in its duration, but in its donation. You are not important because of how long you live, you are important because of how effective you live.</p>
			    		
					</div>
				</div>
				</div>
			</div>
		</div>
	</section>
	<!--cta-->
	<!--about-->
	<section id="about" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-4 col-xs-12">
			        <div class="section-title">
			          <h2 class="head-title lg-line">The Bloodbank <br>Ultimate Dream</h2>
			          <hr class="botm-line">
			          <p class="sec-para">Donating Dreams and Gifts of Life: Organ Donation</p>
					  <p class="sec-para">One person's Organ Donation could save 30 people or more</p> 
					  <p class="sec-para">Age is not a factor for organ donation</p>
			          <!--a href="" style="color: #0cb8b6; padding-top:10px;">Know more..</a-->
			        </div>
			    </div>
			    <div class="col-md-9 col-sm-8 col-xs-12">
			       <div style="visibility: visible;" class="col-sm-9 more-features-box">
			          <div class="more-features-box-text">
			            <div class="more-features-box-text-icon"> <i class="fa fa-angle-right" aria-hidden="true"></i> </div>
			            <div class="more-features-box-text-description">
				            <h3>It's something important you want to know.</h3>
				            <p>Donation can be the most self-less thing you can do foer someone.</p>
				        </div>
			          </div>
			          <div class="more-features-box-text">
			            <div class="more-features-box-text-icon"> <i class="fa fa-angle-right" aria-hidden="true"></i> </div>
			            <div class="more-features-box-text-description">
				            <h3>It's something important you want to know.</h3>
				            <p>Organ and Tissue Donation can offer another  person a second chance at life.</p>
				        </div>
                        </div><div class="more-features-box-text">
			            <div class="more-features-box-text-icon"> <i class="fa fa-angle-right" aria-hidden="true"></i> </div>
			            <div class="more-features-box-text-description">
				            <h3>It's something important you want to know.</h3>
				            <p>In India around 6000 people die every day waiting for organ transplant.</p>
				        </div>
                        </div>
			        </div>
			    </div>
			</div>
		</div>
	</section>
	<!--/ about-->
	<!--doctor team-->
	<section id="doctor-team" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="ser-title">Meet Our Doctors!</h2>
					<hr class="botm-line">
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6">
			      <div class="thumbnail"> 
			      	<img src="img/doctor1.jpg" alt="..." class="team-img">
			        <div class="caption">
			          <h3>Jessica Wally</h3>
			          <p>Doctor</p>
			          <ul class="list-inline">
			            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
			            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
			            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			          </ul>
			        </div>
			      </div>
			    </div>
			    <div class="col-md-3 col-sm-3 col-xs-6">
			      <div class="thumbnail"> 
			      	<img src="img/doctor2.jpg" alt="..." class="team-img">
			        <div class="caption">
			          <h3>Iai Donas</h3>
			          <p>Doctor</p>
			          <ul class="list-inline">
			            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
			            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
			            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			          </ul>
			        </div>
			      </div>
			    </div>
			    <div class="col-md-3 col-sm-3 col-xs-6">
			      <div class="thumbnail"> 
			      	<img src="img/doctor3.jpg" alt="..." class="team-img">
			        <div class="caption">
			          <h3>Amanda Denyl</h3>
			          <p>Doctor</p>
			          <ul class="list-inline">
			            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
			            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
			            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			          </ul>
			        </div>
			      </div>
			    </div>
			    <div class="col-md-3 col-sm-3 col-xs-6">
			      <div class="thumbnail"> 
			      	<img src="img/doctor4.jpg" alt="..." class="team-img">
			        <div class="caption">
			          <h3>Jason Davis</h3>
			          <p>Doctor</p>
			          <ul class="list-inline">
			            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
			            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
			            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			          </ul>
			        </div>
			      </div>
			    </div>
			</div>
		</div>
	</section>
	<!--/ doctor team-->
	<!--cta 2-->
	<section id="cta-2" class="section-padding">
		<div class="container">
			<div class=" row">
				<div class="col-md-2"></div>
	            <div class="text-right-md col-md-4 col-sm-4">
	              <h2 class="section-title white lg-line">« A few words<br> about us »</h2>
	            </div>
	            <div class="col-md-4 col-sm-5">
	             In 2012, when Kerala government first launched Mritasanjeevani, a deceased donor organ transplant programme, coordinated by the Kerala Network for Organ Sharing (KNOS), the state had witnessed only 18 kidney and 4 liver transplants.As on 2016, this has gone up to 376 kidney, 168 liver, 36 heart, two lung.
	              <p class="text-right text-primary"><i>— Kerala sees spurt in organ donation</i></p>
	            </div>
	            <div class="col-md-2"></div>
	        </div>
		</div>
	</section>
	<!--cta--> <div class="space"></div>
		
	<!--contact-->
	<section id="contact" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="ser-title">Contact us</h2>
					<hr class="botm-line">
				</div>
				<div class="col-md-6 col-sm-6">
			      <h3>Contact Info</h3>
			      <div class="space"></div>
			      <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>321 Awesome Street<br>
			        Kollam, North 17022</p>
			      <div class="space"></div>
			      <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>Bloodbank@red.com</p>
			      <div class="space"></div>
			      <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+1 800 123 1234</p>
			    </div>
				<div class="col-md-6 col-sm-6 marb20">
					 <img src="img/blood.jpg" class="img-responsive" >
				</div>
			</div>
		</div>
	</section>
	<!--/ contact-->
<?php include_once 'footer.php';}  
else{
	header("Location: index.php");
}
?>
	