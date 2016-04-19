<?php


$id=$_POST['id'];

$out = get_data($id);
return $out;

function get_data($id)
{
	
include("../db/config_db.php");
$query = "SELECT * from pms where device_id = '$id'";
$exec = mysqli_query($db,$query);
$result = mysqli_fetch_array($exec);
echo $result['count'];  

}

?>