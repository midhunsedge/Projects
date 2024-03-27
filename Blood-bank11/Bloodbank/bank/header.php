<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BLOODBANK| </title>

    <!-- Bootstrap -->
    <link href="../admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="../admin/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="../admin/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">

    <!-- Custom styling plus plugins -->
    <link href="../admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><span>BLOOD BANK</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="../admin/production/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome to your</span>
                <h2>Dashboard</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                 <ul class="nav side-menu">
                  <li><a href="home.php"><i class="fa fa-home"></i> Home </a></li>
			 <li><a href="add_bloodstock.php"><i class="fa fa-eye"></i>Add Blood Stock  </a></li>
			  <li><a href="view_bloodstock.php"><i class="fa fa-eye"></i>List Blood Stock  </a></li> 		  
                        
               <li><a href="list_reuests.php"><i class="fa fa-eye"></i>Blood Requests  </a></li> 

 <li><a href="donation_request.php"><i class="fa fa-eye"></i>Donation Request  </a></li> 
<li><a href="view_donationRequest.php"><i class="fa fa-eye"></i>View Donation Request  </a></li> 



 <!-- <li><a href="branchTransfor.php"><i class="fa fa-eye"></i>Branch Transfer Request </a></li> 

 <li><a href="listTransfor.php"><i class="fa fa-eye"></i>List Our Transfer Request  </a></li> 
<li><a href="listotherTransfor.php"><i class="fa fa-eye"></i>View Other Transfer Request  </a></li>  -->
<li><a href="donation_list.php"><i class="fa fa-eye"></i>View Donated List  </a></li> 
<!-- <li><a href="upcertificate.php"><i class="fa fa-eye"></i>Certificate</a></li>  -->

			   
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!--<div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>-->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                   <!-- <img src="images/img.jpg" alt="">-->BANK
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                  
                    <li><a href="changepassword.php">ChangePassword</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->