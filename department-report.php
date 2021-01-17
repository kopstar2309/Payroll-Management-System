<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `department`";
	$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
function delete_department(department_id)
{
	if(confirm("Do you want to delete the department?"))
	{
		this.frm_department.department_id.value=department_id;
		this.frm_department.act.value="delete_department";
		this.frm_department.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Department Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_department" action="lib/department.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">ID</td>
						<td scope="col">Name</td>
						<td scope="col">Description</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysql_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[department_id]?></td>
						<td><?=$data[department_title]?></td>
						<td><?=$data[department_description]?></td>
						<td style="text-align:center">
							<a href="department.php?department_id=<?php echo $data[department_id] ?>">Edit</a> | <a href="Javascript:delete_department(<?=$data[department_id]?>)">Delete</a> 
						</td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="department_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
