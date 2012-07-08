<?php

	include "../../config.php";
	include '../../ajax/class/users.class.php';
	$users = new Users();
	if(($userdata = $users->qlogin()) != false){
		if($userdata['usergroup'] == 0){
			if(isset($_POST['do'])){
				switch($_POST['do']){
					case "setpermissions":
							$group = mysql_escape_string($_POST['group']);
							$perms = $_POST['perms'];
							mysql_query("update groups set permissions = '$perms' where id = $group");
						break;
				}
			}
		}
	}

?>