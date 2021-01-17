<?php 
include_once("includes/header.php"); 
include_once("includes/db_connect.php"); 
global $SERVER_PATH;
?> 
	<div id="banner">
    	<div class="left">
        	<div class="anythingSlider">
        
          <div class="wrapper">
            <ul>
               <li><a href="#"><img src="./images/b5.jpg" alt="" /></a></li>
               <li><a href="#"><img src="./images/b6.jpg" alt="" /></a></li>
               <li><a href="#"><img src="./images/b3.jpg" alt="" /></a></li>
            </ul>        
          </div>
          
        </div>
        </div>
    </div>
    <div class="clear"></div>
  <script type="text/javascript" src="./js/cont_slide.js"></script>
  <div id="content_sec">
     <div class="col1">
		<h4 class="heading colr">Payroll Management System</h4>
			<div class="news">
            <ul>
				<li>
                	<h6 class="last">Manage Employees</h6>
                    <a href="#" class="thumb"><img src="images/add2.jpg" alt="" style="height:163px; width:266px;"/></a>
                    <p>Help employees do their best work each day in order to achieve the larger goals of the organization.</p>
                    <div class="news_links">
                    	<a href="#" class="readmore left">Read More</a>
                    </div>
                </li>
				<li class="last">
                	<h6 class="last">Manage System Users</h6>
                    <a href="#" class="thumb"><img src="images/systemuser.jpg" alt="" style="height:163px; width:266px;"/></a>
                    <p>
                    	2 levels of users (Administrators,Employees), each with their own different permissions.
                    	you can manage both type of users using this payroll managment system
                    </p>
                    <div class="news_links">
                    	<a href="#" class="readmore left">Read More</a>
                    </div>
                </li>
				<li>
                	<h6 class="last">Manage Payroll Services</h6>
                    <a href="#" class="thumb"><img src="images/save_1.jpg" alt="" style="height:163px; width:266px;"/></a>
                    <p>
                    	A payroll company is a service provider that automatically processes payroll calculations, payroll tax statements, year-end taxes and more for your company. 
                    <div class="news_links">
                    	<a href="#" class="readmore left">Read More</a>
                    </div>
                </li>
				<li class="last">
                	<h6 class="last">Manage Salary Slips</h6>
                    <a href="#" class="thumb"><img src="images/payslip.jfif" alt="" style="height:163px; width:266px;"/></a>
                    <p>
                    	Once you confirm payroll details, salary slips can be  generated in payroll system and employees can view them by logging into their account
                    </p>
                    <div class="news_links">
                    	<a href="#" class="readmore left">Read More</a>
                    </div>
                </li>
			</ul>
			</div>
    </div>
	<div class="col2">
		<?php include_once("includes/sidebar.php"); ?>
		<div><img src="images/payrollm.png" style="width: 250px"></div>
	</div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<?php include_once("includes/footer.php"); ?> 
