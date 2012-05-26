<?php

	include '../config.php';
	include 'class/users.class.php';
	$users = new Users();
	
	if(isset($_POST['do'])){
		switch($_POST['do']){
			case "login":
				$username = mysql_escape_string($_POST['username']);
				$password = sha1($salt . mysql_escape_string($_POST['password']));
				$userdata = $users->login($username,$password);
				if($userdata){
					echo json_encode($userdata);
				}
				break;
		}
	}
?>