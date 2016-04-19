<?php

$out = store_device_info();
return $out;

function store_device_info()
{
include("config_db.php");

$company_name = $_POST['cmp_name'];
$company_logo = $_POST['cmp_logo'];
$user_name = $_POST['user_name'];
$admin_pass = $_POST['admin_pass'];

$admin_email = $_POST['admin_email'];

$query = "SELECT * from company_details where company_name = '$company_name'";
$exec = mysqli_query($db,$query);
$result = mysqli_fetch_array($exec);
if($result)
{
	$query = "update company_details set company_logo='$company_logo' , admin_username='$user_name', 
	admin_password='$admin_pass',report_mail ='$admin_email' where company_name='$company_name'";
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


	$query = "insert into company_details(company_id,company_name,company_logo,admin_username,admin_password,report_mail) 
	values('$row_cnt','$company_name','$company_logo','$user_name','$admin_pass','$admin_email')";
	
	$result2 = mysqli_query($db,$query) or die('cannot show columns from monitor');
	$msg = "Successfully Created";
	header('Location: admin_login.php?msg='.$msg);
	return;
}

}
?>