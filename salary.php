<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[salary_id])
	{
		$SQL="SELECT * FROM salary WHERE salary_id = $_REQUEST[salary_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
?> 
<style>
ul.forms li.txt {
	width:150px;
}
</style>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Add Employee Salary</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<form action="lib/salary.php" enctype="multipart/form-data" method="post" name="frm_salary">
					<ul class="forms">
						<li class="txt">Employee Code</li>
						<li class="inputfield">
							<select name="salary_user_id" class="bar" required/>
								<?php echo get_new_optionlist("user","user_id","user_id",$data[salary_user_id],"user_level_id = 2"); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Salary Month</li>
						<li class="inputfield">
							<select name="salary_month" class="bar" required/>
								<?php echo get_new_optionlist("month","month_id","month_name",$data[salary_month]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Number of Working Days</li>
						<li class="inputfield"><input name="salary_working_days" id="salary_working_days" type="text" class="bar" required value="<?=$data[salary_working_days]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Basic Pay</li>
						<li class="inputfield"><input name="salary_basic" id="salary_basic" type="text" class="bar" required value="<?=$data[salary_basic]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">HRA</li>
						<li class="inputfield"><input name="salary_hra" id="salary_hra" type="text" class="bar" required value="<?=$data[salary_hra]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Mediclaim</li>
						<li class="inputfield"><input name="salary_mediclaim" id="salary_mediclaim" type="text" class="bar" required value="<?=$data[salary_mediclaim]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Travel Allowance</li>
						<li class="inputfield"><input name="salary_ta" id="salary_ta" type="text" class="bar" required value="<?=$data[salary_ta]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Dearness Allowance</li>
						<li class="inputfield"><input name="salary_da" id="salary_da" type="text" class="bar" required value="<?=$data[salary_da]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Conveyance Allowance</li>
						<li class="inputfield"><input name="salary_ca" id="salary_ca" type="text" class="bar" required value="<?=$data[salary_ca]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Mediclaim</li>
						<li class="inputfield"><input name="salary_mediclaim" id="salary_mediclaim" type="text" class="bar" required value="<?=$data[salary_mediclaim]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Reimbursement</li>
						<li class="inputfield"><input name="salary_reimbursement" id="salary_reimbursement" type="text" class="bar" required value="<?=$data[salary_reimbursement]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Others</li>
						<li class="inputfield"><input name="salary_others" id="salary_others" type="text" class="bar" required value="<?=$data[salary_others]?>"/></li>
					</ul>
					<div style="clear:both"></div>
					<h4 class="heading colr">Salary Deductions</h4>
					<ul class="forms">
						<li class="txt">Provident Fund</li>
						<li class="inputfield"><input name="salary_dpf" id="salary_dpf" type="text" class="bar" required value="<?=$data[salary_dpf]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Tax for month</li>
						<li class="inputfield"><input name="salary_dtax" id="salary_dtax" type="text" class="bar" required value="<?=$data[salary_dtax]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Salary Notes</li>
						<li class="inputfield">
							<textarea name="salary_desc" class="bar" required style="height:100px; width:250px;"><?=$data[salary_desc]?></textarea>
						</li>
					</ul>
					<div style="clear:both"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_salary">
					<input type="hidden" name="salary_id" value="<?=$data[salary_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
