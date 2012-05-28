<?php

	include '../config.php';
	include 'class/users.class.php';
	$users = new Users();
	
	if(isset($_POST['do'])){
		switch($_POST['do']){
			case "login":
				$username = mysql_escape_string($_POST['username']);
				$password = sha1($salt . $_POST['password']);
				$userdata = $users->login($username,$password);
				if($userdata){
					echo json_encode($userdata);
				}
				break;
			case "qlogin":
				$userdata = $users->qlogin();
				if($userdata){
					echo json_encode(array("username"=>$userdata['username'],"email"=>$userdata['email'],"referrer"=>$userdata['referrer'],"regdate"=>$userdata['regdate'],"lastlogin"=>$userdata['lastlogin']));
				}
				break;
			case "logout":
				$users->logout();
				break;
			case "register":
				$username = mysql_escape_string($_POST['username']);
				$password = sha1($salt . $_POST['password']);
				$email = mysql_escape_string($_POST['email']);
				$referrer = mysql_escape_string($_POST['referrer']);
				$userdata = $users->register($username,$password,$email,$referrer);
				if($userdata){
					echo json_encode(array("username"=>$userdata['username'],"email"=>$userdata['email'],"referrer"=>$userdata['referrer'],"regdate"=>$userdata['regdate'],"lastlogin"=>$userdata['lastlogin']));
				}
				break;
		}
	}
?>