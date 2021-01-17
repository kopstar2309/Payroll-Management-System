<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[user_id])
	{
		$SQL="SELECT * FROM record WHERE record_user_id = $_REQUEST[user_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
?> 
<script>
jQuery(function() {
	jQuery( "#record_doj" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-10:+0",
	   dateFormat: 'd MM,yy'
	});
});
</script>
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
				<h4 class="heading colr">Employee Finance Records</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<form action="lib/record.php" enctype="multipart/form-data" method="post" name="frm_record">
					<ul class="forms">
						<li class="txt">Employee Code</li>
						<li class="inputfield">
							<select name="record_user_id" class="bar" required/>
								<?php echo get_new_optionlist("user","user_id","user_id",$_REQUEST['user_id'],"user_level_id = 2"); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Department</li>
						<li class="inputfield">
							<select name="record_department" class="bar" required/>
								<?php echo get_new_optionlist("department","department_id","department_title",$data[record_department]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Designation</li>
						<li class="inputfield">
							<select name="record_designation" class="bar" required/>
								<?php echo get_new_optionlist("designation","designation_id","designation_title",$data[record_designation]); ?>
							</select>
						</li>
					</ul>
					
					<ul class="forms">
						<li class="txt">Date of Joining</li>
						<li class="inputfield"><input name="record_doj" id="record_doj" type="text" class="bar" required value="<?=$data[record_doj]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">PF Account No.</li>
						<li class="inputfield"><input name="record_pf_account_no" id="record_pf_account_no" type="text" class="bar" required value="<?=$data[record_pf_account_no]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Account No. </li>
						<li class="inputfield"><input name="record_salary_account_no" id="record_salary_account_no" type="text" class="bar" required value="<?=$data[record_salary_account_no]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Insurance Per Month</li>
						<li class="inputfield"><input name="record_insurance" id="record_insurance" type="text" class="bar" required value="<?=$data[record_insurance]?>"/></li>
					</ul>
					<div style="clear:both"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_record">
					<input type="hidden" name="record_id" value="<?=$data[record_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
