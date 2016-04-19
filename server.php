<?php
// server.php
	//include("config_db.php");
	session_start();
	
	$mac_id = 1;
	$value = 0;
	
	if(isset($_GET['mac_id']))
	{
       $mac_id = $_GET['mac_id'];
	}
    
	if(isset($_GET['value']))
	{
      $value = $_GET['value'];
	}
	$_SESSION['mac_id'] = $mac_id;
	$_SESSION['mac_value'] = $value;
	
	//echo json_encode(array("mac_id" => $mac_id, "value" => $value)); 
	
	//$table = "machine_value";	
	//$result2 = mysqli_query($db,"insert into machine_value (machine_id,machine_value)value('$mac_id' ,'$value')") or die('cannot show columns from '.$table);
	
?>

