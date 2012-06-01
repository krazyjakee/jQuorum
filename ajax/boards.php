<?php

	include "../config.php";
	
	if(isset($_POST['do'])){
		switch($_POST['do']){
			case "loadboards":
				$result = mysql_query("select id,name,description,parent,locked,threads,views,posts from boards order by sortorder asc");
				$boards = array();
				while(($line = mysql_fetch_assoc($result))){
					array_push($boards,$line);
				}
				echo json_encode($boards);
				break;
		}
	}

?>