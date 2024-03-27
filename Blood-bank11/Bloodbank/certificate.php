<?php
session_start();
include_once "connect.php";
$name=$_SESSION['name'];
?>
<html>
    <head>
    <link href="css/certificate.css" rel="stylesheet">
    </head>
<body>
  <div class="container pm-certificate-container">
    <div class="outer-border"></div>
    <div class="inner-border"></div>
    
    <div class="pm-certificate-border col-xs-12">
      <div class="row pm-certificate-header">
        <div class="pm-certificate-title cursive col-xs-12 text-center" style="display:flex;justify-content: center;">
          <h2 style="align-items: center;">BLOOD DONATION</h2>
        </div>
      </div>
<?php
 echo $_SESSION['name'];
?>
      <div class="row pm-certificate-body">
        
        <div class="pm-certificate-block">
            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                <div class="pm-certificate-name underline margin-0 col-xs-8 text-center">
                  <span class="pm-name-text bold">Sri/Smt <?php $name; ?></span>
                </div>
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
              </div>
            </div>          

            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                <div class="pm-earned col-xs-8 text-center">
                  <span class="pm-earned-text padding-0 block cursive">In Recognition to his/her Excellency towards contribution safe blood donation  movement</span>
                  <!-- <span class="pm-credits-text block bold sans">PD175: 1.0 Credit Hours</span> -->
                </div>
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                <div class="col-xs-12"></div>
              </div>
            </div>
            
            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                <div class="pm-course-title col-xs-8 text-center">
                  <!-- <span class="pm-earned-text block cursive">while completing the training course entitled</span> -->
                </div>
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
              </div>
            </div>

            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                <div class="pm-course-title underline col-xs-8 text-center">
                  <!-- <span class="pm-credits-text block bold sans">BPS PGS Initial PLO for Principals at Cluster Meetings</span> -->
                </div>
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
              </div>
            </div>
        </div>       
        
        <div class="col-xs-12">
          <div class="row">
            <div class="pm-certificate-footer">
                <div class="col-xs-4 pm-certified col-xs-4 text-center">
                  <span class="pm-credits-text block sans">By BLOOD DONATION MANAGEMENT SYSTEM</span>
                  <span class="pm-empty-space block underline"></span>
                  <span class="bold block">Medical Officer</span>
                </div>
                <div class="col-xs-4">
                  <!-- LEAVE EMPTY -->
                </div>
                <div class="col-xs-4 pm-certified col-xs-4 text-center">
                  <span class="pm-credits-text block sans">Date Completed</span>
                  <span class="pm-empty-space block underline"></span>
                  <!-- <span class="bold block">DOB: </span>
                  <span class="bold block">Social Security # (last 4 digits)</span> -->
                </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</body>
</html>