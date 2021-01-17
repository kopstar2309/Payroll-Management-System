<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[designation_id])
	{
		$SQL="SELECT * FROM designation WHERE designation_id = $_REQUEST[designation_id]";
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
				<h4 class="heading colr">Add Employee Designation</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<form action="lib/designation.php" enctype="multipart/form-data" method="post" name="frm_designation">
					<ul class="forms">
						<li class="txt">Title</li>
						<li class="inputfield"><input name="designation_title" id="designation_title" type="text" class="bar" required value="<?=$data[designation_title]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="inputfield">
							<textarea name="designation_description" class="bar" required style="height:100px; width:250px;"><?=$data[designation_description]?></textarea>
						</li>
					</ul>
					<div style="clear:both"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_designation">
					<input type="hidden" name="designation_id" value="<?=$data[designation_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
