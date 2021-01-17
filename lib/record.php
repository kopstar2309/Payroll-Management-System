<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_record")
	{
		save_record();
		exit;
	}
	if($_REQUEST[act]=="delete_record")
	{
		delete_record();
		exit;
	}
	
	###Code for save record#####
	function save_record()
	{
		$R=$_REQUEST;						
		if($R[record_id])
		{
			$statement = "UPDATE `record` SET";
			$cond = "WHERE `record_id` = '$R[record_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `record` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
				
		$SQL=   $statement." 
				`record_user_id` = '$R[record_user_id]', 
				`record_department` = '$R[record_department]', 
				`record_designation` = '$R[record_designation]', 
				`record_doj` = '$R[record_doj]', 
				`record_pf_account_no` = '$R[record_pf_account_no]', 
				`record_salary_account_no` = '$R[record_salary_account_no]', 
				`record_insurance` = '$R[record_insurance]'
				". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../user-report.php?type=2&msg=$msg");
	}
#########Function for delete record##########3
function delete_record()
{	
	/////////Delete the record//////////
	$SQL="DELETE FROM record WHERE record_id = $_REQUEST[record_id]";
	mysql_query($SQL) or die(mysql_error());
	header("Location:../record-report.php?msg=Deleted Successfully.");
}
?>
