<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_designation")
	{
		save_designation();
		exit;
	}
	if($_REQUEST[act]=="delete_designation")
	{
		delete_designation();
		exit;
	}
	
	###Code for save designation#####
	function save_designation()
	{
		$R=$_REQUEST;						
		if($R[designation_id])
		{
			$statement = "UPDATE `designation` SET";
			$cond = "WHERE `designation_id` = '$R[designation_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `designation` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		
		$SQL=   $statement." 
				`designation_title` = '$R[designation_title]', 
				`designation_description` = '$R[designation_description]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../designation-report.php?msg=$msg");
	}
#########Function for delete designation##########3
function delete_designation()
{	
	/////////Delete the record//////////
	$SQL="DELETE FROM designation WHERE designation_id = $_REQUEST[designation_id]";
	mysql_query($SQL) or die(mysql_error());
	header("Location:../designation-report.php?msg=Deleted Successfully.");
}
?>
