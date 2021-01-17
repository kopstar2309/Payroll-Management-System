<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `month`,`salary`, `user` WHERE salary_user_id = user_id AND month_id = salary_month";
	if($_SESSION['user_details']['user_level_id'] == 2)
	$SQL="SELECT * FROM `month`,`salary`, `user` WHERE salary_user_id = user_id AND month_id = salary_month AND user_id = ".$_SESSION['user_details']['user_id'];
	$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
function delete_salary(salary_id)
{
	if(confirm("Do you want to delete the salary?"))
	{
		this.frm_salary.salary_id.value=salary_id;
		this.frm_salary.act.value="delete_salary";
		this.frm_salary.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Salary Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_salary" action="lib/salary.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">Employee Code</td>
						<td scope="col">Name</td>
						<td scope="col">Month</td>
						<td scope="col">Total Pay</td>
						<td scope="col">Total Deduction</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysql_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td style="text-align:center"><?=$data[user_id]?></td>
						<td><?=$data[user_name]?></td>
						<td><?=$data[month_name]?></td>
						<td><?=$data[salary_total]?></td>
						<td><?=$data[salary_dedc]?></td>
						<td style="text-align:center">
							<a href="payslip.php?salary_id=<?php echo $data[salary_id] ?>">Payslip</a> 
							<?php if($_SESSION['user_details']['user_level_id'] == 1) { ?>
							| <a href="salary.php?salary_id=<?php echo $data[salary_id] ?>">Edit</a> | <a href="Javascript:delete_salary(<?=$data[salary_id]?>)">Delete</a> 
							<?php } ?>
						</td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="salary_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
