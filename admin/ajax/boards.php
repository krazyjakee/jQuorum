<?php

	include "../../config.php";
	include '../ajax/class/users.class.php';
	$users = new Users();
	if(($userdata = $users->qlogin()) != false){
		if(strpos($userdata['userflags'],"a")){
			if(isset($_POST['do'])){
				switch($_POST['do']){
					case "loadboards":
						$result = mysql_query("select id,name,description,parent,locked from boards order by sortorder asc");
						$boards = array();
						while(($line = mysql_fetch_assoc($result))){
							array_push($boards,$line);
						}
						echo json_encode($boards);
						break;
					case "addboard":
						$name = mysql_escape_string($_POST['name']);
						$description = mysql_escape_string($_POST['description']);
						$parent = mysql_escape_string($_POST['parent']);
						$result = mysql_query("select sortorder from boards where parent = $parent order by sortorder desc limit 1");
						$neworder = mysql_fetch_assoc($result);
						$neworder = $neworder['sortorder'];	$neworder++;
						mysql_query("insert into boards (name,description,parent,sortorder)values('$name','$description',$parent,$neworder)");
						$id = mysql_insert_id();
						echo json_encode(array("id"=>$id,"name"=>$name,"description"=>$description));
						break;
				}
			}
		}
	}

?>