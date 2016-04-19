<?php

session_start();
$id=$_POST['id'];

$out = get_data($id);
return $out;

function get_data($id)
{
echo json_encode(array("mac_id" => $_SESSION['mac_id'], "value" => $_SESSION['mac_value'], "color" => 'green'));  
/*
include("config_db.php");
$query = "SELECT * from machine_value ";
$exec = mysqli_query($db,$query);
$result = mysqli_fetch_array($exec);

$mac_id = $result['machine_id'];
$value = $result['machine_value'];
$_SESSION['mac_id'] = $mac_id;
$_SESSION['mac_value'] = $mac_value;


if($result)
	echo json_encode(array("mac_id" => $mac_id, "value" => $value, "color" => 'green'));  

$query = "delete from machine_value ";
$exec = mysqli_query($db,$query);

*/

}

?>