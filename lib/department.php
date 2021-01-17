<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_department")
	{
		save_department();
		exit;
	}
	if($_REQUEST[act]=="delete_department")
	{
		delete_department();
		exit;
	}
	
	###Code for save department#####
	function save_department()
	{
		$R=$_REQUEST;						
		if($R[department_id])
		{
			$statement = "UPDATE `department` SET";
			$cond = "WHERE `department_id` = '$R[department_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `department` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		
		$SQL=   $statement." 
				`department_title` = '$R[department_title]', 
				`department_description` = '$R[department_description]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../department-report.php?msg=$msg");
	}
#########Function for delete department##########3
function delete_department()
{	
	/////////Delete the record//////////
	$SQL="DELETE FROM department WHERE department_id = $_REQUEST[department_id]";
	mysql_query($SQL) or die(mysql_error());
	header("Location:../department-report.php?msg=Deleted Successfully.");
}
?>
