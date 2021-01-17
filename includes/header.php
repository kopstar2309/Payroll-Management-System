<?php
	ini_set("display_errors",1);
	error_reporting(E_ALL);
	session_start();
	include_once("db_connect.php");
	include_once("functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payroll Management System</title>
<!-- // Stylesheets // -->
<link rel="stylesheet" type="text/css" href="./css/style.css" />
<link rel="stylesheet" type="text/css" href="./css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="./css/contentslider.css" />
<link rel="stylesheet" type="text/css" href="./css/jquery.fancybox-1.3.1.css" />
<link rel="stylesheet" type="text/css" href="./css/slider.css" />
<link rel="stylesheet" type="text/css" href="./css/jquery-ui.css">

<!-- // Javascripts // -->
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="./js/validation.js"></script>
<script type="text/javascript" src="./js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="./js/jquery.anythingslider.js"></script>
<script type="text/javascript" src="./js/anythingslider.js"></script>
<script type="text/javascript" src="./js/animatedcollapse.js"></script>
<script type="text/javascript" src="./js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="./js/menu.js"></script>
<script type="text/javascript" src="./js/contentslider.js"></script>
<script type="text/javascript" src="./js/ddaccordion.js"></script>
<script type="text/javascript" src="./js/acrodin.js"></script>
<script type="text/javascript" src="./js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="./js/lightbox.js"></script>
<script type="text/javascript" src="./js/menu-collapsed.js"></script>
<script type="text/javascript" src="./js/cufon-yui.js"></script>
<script type="text/javascript" src="./js/trebuchet_ms_400-trebuchet_ms_700-trebuchet_ms_italic_700-trebuchet_ms_italic_400.font.js"></script>
<script type="text/javascript" src="./js/cufon.js"></script>
<script type="text/javascript" src="./js/jquery.validate.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<meta charset='utf-8' />
<link href='fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='fullcalendar/lib/moment.min.js'></script>
<script src='fullcalendar/fullcalendar.min.js'></script>
</head>

<body>
<div id="wrapper_sec">
	<div id="masthead">
    	<div class="logo">
        	<a href="./index.php" class="logo-custom">Payroll Management System</a>
        </div>
		<?php if($_SESSION['login']) { ?> 
        <div class="slogan" style="color:#ffffff; font-weight:bold; font-size:14px;">Welcome <?=$_SESSION['user_details']['user_name']?></div>
		<?php } else { ?>
		<div class="slogan"></div>
		<?php } ?>
        <div class="clear"></div>
            <div class="navigation">
            	<div id="smoothmenu1" class="ddsmoothmenu">
                    <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./about.php">About Us</a></li>
					<?php if($_SESSION['user_details']['user_level_id'] == 1) {?>
					<li><a href="#">Adminstration</a>
						<ul>
						  <li><a href="user.php?type=1">Add New Admin User</a></li>
						  <li><a href="user.php?type=2">Add New Employee</a></li>
						  <li><a href="salary.php">Add Employee Salary</a></li>
						  <li><a href="designation.php?type=2">Add Designation</a></li>
						  <li><a href="department.php">Add Department</a></li>
						</ul>
					</li>
					<li><a href="#">Reports</a>
						<ul>
						  <li><a href="user-report.php?type=1">Admin User Report</a></li>
						  <li><a href="user-report.php?type=2">Employee User Report</a></li>
						  <li><a href="salary-report.php?type=2">Salary Report</a></li>
						  <li><a href="designation-report.php?type=2">Designation Report</a></li>
						  <li><a href="department-report.php?type=2">Department Report</a></li>
						</ul>
					</li>
					<?php } if($_SESSION['user_details']['user_level_id'] == 2) {?>
						<li><a href="salary-report.php">Salary Report</a></li>					
					<?php } if($_SESSION['user_details']['user_level_id'] == 3) {?>
						<li><a href="./document-report.php?user_id=<?=$_SESSION['user_details']['user_id']?>">My Documents</a></li>
					<?php } if($_SESSION['login'] == 1) {?>
						<li><a href="./user.php?user_id=<?php echo $_SESSION['user_details']['user_id']; ?>">My Account</a></li>
						<li><a href="change-password.php">Change Password</a></li>
						<li><a href="./lib/login.php?act=logout">Logout</a></li>
					<?php } else { ?>
						<li><a href="./login.php">Login</a></li>
						<li><a href="./contact.php">Contact Us</a></li>
					<?php }?>
                    </ul>
                    <br style="clear: left" />
                    </div>
                    <ul class="searchsec" style="display:none">
						<li><input type="text" value="Search" id="searchBox" name="s" onblur="if(this.value == '') { this.value = 'Search'; }" onfocus="if(this.value == 'Search') { this.value = ''; }" class="bar" /></li>
						<li><input type="image" src="./images/go.gif" alt="" class="go" /></li>
					</ul>
            </div>
    </div>
