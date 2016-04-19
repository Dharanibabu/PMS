<?php

echo $_POST['location'];


$out = store_device_info();
return $out;

function store_device_info()
{
include("config_db.php");

$location = $_POST['location'];
$mac_id = $_POST['mac_id'];
$mac_name = $_POST['mac_name'];
$opt_name = $_POST['opt_name'];

$target = $_POST['target'];
$actual = $_POST['actual'];
$balance = $_POST['balance'];

$performance = $_POST['performance'];

$total_h_d = $_POST['total_h_d'];

$report_to = $_POST['report_to'];
$cycle = $_POST['cycle'];

$rejection = $_POST['rejection'];

$query = "SELECT * from monitor where machine_id = '$mac_id'";
$exec = mysqli_query($db,$query);
$result = mysqli_fetch_array($exec);
$total_h =0;
$total_d =0;

if(empty($location))
{
	$msg = "Enter location";
	header('Location: supervisor_monitor.php?location_error='.$msg);
	return;
}	
elseif($mac_id == 0)
{
	$msg = "Enter machine id";
	header('Location: supervisor_monitor.php?macid_err='.$msg);
	return;
}
elseif(empty($mac_name))
{
	$msg = "Enter machine name";
	header('Location: supervisor_monitor.php?machine_name_error='.$msg);
	return;
}
elseif(empty($opt_name))
{
	$msg = "Enter operator name";
	header('Location: supervisor_monitor.php?operator_name_error='.$msg);
	return;
}
elseif($target == 0)
{
	$msg = "Enter target";
	header('Location: supervisor_monitor.php?target_error='.$msg);
	return;
}

elseif(empty($report_to))
{
	$msg = "Enter report to mail id";
	header('Location: supervisor_monitor.php?report_to_error='.$msg);
	return;
}

if($performance == "Hour")
{
	$total_h = $total_h_d;
	$total_d = 0;
}
else 
{
	$total_d = $total_h_d;
	$total_h = 0;
}


if($result)
{
	
	$update_query = "UPDATE `monitor` SET `machine_location`='$location',`machine_name` ='$mac_name',`machine_operator`= '$opt_name',`machine_target`= '$target',
	`machine_actual`='actual', `machine_target_hour`='$total_h', `machine_target_days` = '$total_d',`report_to`='$report_to' ,`machine_cycle` = '1',`machine_rejection_set`='0'  WHERE `machine_id`= '$mac_id'";
	$result2 = mysqli_query($db,$update_query) or die('cannot show columns from monitor');
	$msg = "Successfully Updated";
	header('Location: supervisor_monitor.php?msg='.$msg);
	return;
}





	$query = "INSERT INTO `monitor` (`machine_id`, `machine_name`, `machine_ip`, `machine_location`, `machine_operator`, `report_to`,`machine_target`,
	`machine_actual`,	`machine_target_hour`, `machine_target_days`,	 `machine_cycle`) VALUES ('$mac_id', '$mac_name', '192.168.43.10', '$location', 
	'$opt_name','$report_to', '$target', '$actual', '$total_h', '$total_d', '1');";
	
		if (!mysqli_query($db,$query))
		{
			$msg = "Enter proper values";
			header('Location: supervisor_monitor.php?error='.$msg);
			return;
		}
		$msg = "Successfully Created";
		header('Location: supervisor_monitor.php?msg='.$msg);

		
}
?>