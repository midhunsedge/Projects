<?php 
ob_start();
session_cache_limiter(false);
session_start();
If(isset($_SESSION["user"])){
include_once 'header.php';
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

            </div>
          </div>
        </div>

        <?php 
include_once 'footer.php';
	}
	else{
		header("Location: index.php");
	}
?>