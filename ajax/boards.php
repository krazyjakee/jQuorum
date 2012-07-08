<?php

	include "../config.php";
	include 'class/users.class.php';
	$users = new Users();
	
	if(isset($_POST['do'])){
		$userdata = $users->qlogin();
		switch($_POST['do']){
			case "loadboards":
				$result = mysql_query("select id,name,description,parent,locked,threads,views,posts from boards order by sortorder asc");
				$boards = array();
				while(($line = mysql_fetch_assoc($result))){
					array_push($boards,$line);
				}
				
				if($userdata){
					$group = $userdata['usergroup'];
				}else{
					$group = 1;
				}
				
				$allowedboards = array();
				foreach($boards as $b){
					if($users->hasPermission($group,$b['id'],"read")){
						array_push($allowedboards,$b);
					}
				}
				
				echo json_encode($allowedboards);
				
				break;
		}
	}

?>