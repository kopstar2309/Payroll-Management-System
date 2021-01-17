<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `designation`";
	$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
function delete_designation(designation_id)
{
	if(confirm("Do you want to delete the designation?"))
	{
		this.frm_designation.designation_id.value=designation_id;
		this.frm_designation.act.value="delete_designation";
		this.frm_designation.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Designation Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_designation" action="lib/designation.php" method="post">
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
						<td><?=$data[designation_id]?></td>
						<td><?=$data[designation_title]?></td>
						<td><?=$data[designation_description]?></td>
						<td style="text-align:center">
							<a href="designation.php?designation_id=<?php echo $data[designation_id] ?>">Edit</a> | <a href="Javascript:delete_designation(<?=$data[designation_id]?>)">Delete</a> 
						</td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="designation_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
