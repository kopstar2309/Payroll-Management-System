<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `record`, `user` WHERE record_user_id = user_id";
	$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
function delete_record(record_id)
{
	if(confirm("Do you want to delete the record?"))
	{
		this.frm_record.record_id.value=record_id;
		this.frm_record.act.value="delete_record";
		this.frm_record.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Assignment Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_record" action="lib/record.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">ID</td>
						<td scope="col">Name</td>
						<td scope="col">Joining Date</td>
						<td scope="col">PF Account</td>
						<td scope="col">Salary Account</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysql_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[user_id]?></td>
						<td><?=$data[user_name]?></td>
						<td><?=$data[record_doj]?></td>
						<td><?=$data[record_pf_account_no]?></td>
						<td><?=$data[record_salary_account_no]?></td>
						<td style="text-align:center">
							<a href="record.php?record_id=<?php echo $data[record_id] ?>">Edit</a> | <a href="Javascript:delete_record(<?=$data[record_id]?>)">Delete</a> 
						</td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="record_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
