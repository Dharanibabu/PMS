<?php

$out = store_device_info();
return $out;

function store_device_info()
{
include("config_db.php");

$company_name = $_POST['cmp_name'];
$user_type = $_POST['user_type'];
$select_user = $_POST['select_user'];
$select_user_type = $_POST['select_user_type'];
$sup_login_name = "";
$user_login_name = "";

$sup_login_pass = "";
$user_login_pass = "";

$user_email = $_POST['user_email'];


echo $select_user_type;
if($select_user_type == 'supervisor')
{
	$sup_login_name = $_POST['user_login_name'];
	$sup_login_pass = $_POST['user_login_pass'];
	
}
else
{
	$user_login_name = $_POST['user_login_name'];
	$user_login_pass = $_POST['user_login_pass'];
}

$query = "SELECT * from company_details where company_name = '$company_name'";
$exec = mysqli_query($db,$query);
$result = mysqli_fetch_array($exec);
if($result)
{
	$query = "update company_details set supervisor_username='$sup_login_name',supervisor_password='$sup_login_pass'
	,monitor_username='$user_login_name',monitor_password='$user_login_pass',report_mail ='$user_email' where company_name='$company_name'";
	$result2 = mysqli_query($db,$query) or die('cannot show columns from monitor');
	$msg = "Successfully Updated";
	header('Location: admin_login.php?msg='.$msg);
	return;
	
}
else
{
	$result = mysqli_query($db, "SELECT * from company_details");
    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result) + 1;
	echo "'$sup_login_name','$sup_login_pass','$user_login_name','$user_login_pass','$user_email'";
	$query = "insert into company_details(company_id,company_name,supervisor_username,supervisor_password,monitor_username,monitor_password,report_mail)values('$row_cnt','$company_name','$sup_login_name','$sup_login_pass','$user_login_name','$user_login_pass','$user_email')";
	echo $query;
	$result2 = mysqli_query($db,$query) or die('cannot show columns from company_details');
	$msg = "Successfully Created";
	header('Location: admin_login.php?msg='.$msg);
	return;
}

}
?>