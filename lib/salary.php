<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_salary")
	{
		save_salary();
		exit;
	}
	if($_REQUEST[act]=="delete_salary")
	{
		delete_salary();
		exit;
	}
	
	###Code for save salary#####
	function save_salary()
	{
		$R=$_REQUEST;						
		if($R[salary_id])
		{
			$statement = "UPDATE `salary` SET";
			$cond = "WHERE `salary_id` = '$R[salary_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `salary` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$totalPay = $R[salary_basic] + $R[salary_hra] + $R[salary_mediclaim] + $R[salary_ta] + $R[salary_da] + $R[salary_reimbursement] + $R[salary_ca] + $R[salary_others];
		$totalDedc = $R[salary_dpf] + $R[salary_dtax];
		
		$SQL=   $statement." 
				`salary_user_id` = '$R[salary_user_id]', 
				`salary_month` = '$R[salary_month]', 
				`salary_working_days` = '$R[salary_working_days]', 
				`salary_basic` = '$R[salary_basic]', 
				`salary_hra` = '$R[salary_hra]', 
				`salary_mediclaim` = '$R[salary_mediclaim]', 
				`salary_ta` = '$R[salary_ta]', 
				`salary_da` = '$R[salary_da]', 
				`salary_reimbursement` = '$R[salary_reimbursement]', 
				`salary_ca` = '$R[salary_ca]', 
				`salary_others` = '$R[salary_others]', 
				`salary_dpf` = '$R[salary_dpf]', 
				`salary_desc` = '$R[salary_desc]',
				`salary_total` = '$totalPay', 
				`salary_dedc` = '$totalDedc',
				`salary_dtax` = '$R[salary_dtax]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../salary-report.php?msg=$msg");
	}
#########Function for delete salary##########3
function delete_salary()
{	
	/////////Delete the record//////////
	$SQL="DELETE FROM salary WHERE salary_id = $_REQUEST[salary_id]";
	mysql_query($SQL) or die(mysql_error());
	header("Location:../salary-report.php?msg=Deleted Successfully.");
}
?>
