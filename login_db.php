<?php
	session_start();
		
	if($_POST['username'] == NULL)
	{
		$msg ='Invalid username';
		header('Location: index.php?error='.$msg);
		return;
	}
    
	if($_POST['password'] == NULL)
	{
		$msg ='Invalid password';
		header('Location: index.php?error='.$msg);
		return;
	}
	
	if(is_null($_POST['user_level']) )
	{
		$msg ='Select user level';
		header('Location: index.php?error='.$msg);
		return;
	}
	
	
	
	include("config_db.php");
		
	if($_POST['user_level'] == 'admin')
	{
		$_SESSION['admin'] = true;
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$table = "pms";
		$query = "select * from company_details WHERE `admin_username`= '$username' and `admin_password`= '$password'";
		$exec = mysqli_query($db,$query) or die('Invalid username or password');
		$result = mysqli_fetch_array($exec);
		if($result)
			header('Location: admin_login.php');
		else
		{
			$msg ='Invalid username/password';
			header('Location: index.php?error='.$msg);
			return;
		}
	}
	else if($_POST['user_level'] == 'supervisor')
	{
		$_SESSION['supervisor'] = true;
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$table = "pms";
		$query = "select * from company_details WHERE `supervisor_username`= '$username' and `supervisor_password`= '$password'";
		$exec = mysqli_query($db,$query) or die('Invalid username or password');
		$result = mysqli_fetch_array($exec);
		if($result)
			header('Location: supervisor	_monitor.php');
		else
		{
			$msg ='Invalid username/password sup';
			header('Location: index.php?error='.$msg);
			return;
		}
	}
	else
	{
		$_SESSION['monitor'] = true;
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$table = "pms";
		$query = "select * from company_details WHERE `monitor_username`= '$username' and `monitor_password`= '$password'";
		$exec = mysqli_query($db,$query) or die('Invalid username or password');
		$result = mysqli_fetch_array($exec);
		if($result)
			header('Location: monitor_login.php');
		else
		{
			$msg ='Invalid username/password monitor';
			header('Location: index.php?error='.$msg);
			return;
		}	
	}
	
?>