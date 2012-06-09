<?php

	include '../config.php';
	include 'class/users.class.php';
	$users = new Users();
	$user = $users->qlogin();
	
	if(isset($_POST['do'])){
		switch($_POST['do']){
			case "newthread":
				$board = mysql_escape_string($_POST['board']);
				$title = mysql_escape_string($_POST['title']);
				$content = mysql_escape_string($_POST['content']);
				$id = $user['id'];
				$now = date("Y-m-d H:i:s");
				mysql_query("insert into posts (created,lastedited,title,content,author,board)values('$now','$now','$title','$content',$id,$board)");
				break;
			case "newpost": break;
			case "getposts": break;
				$parent = mysql_escape_string($_POST['parent']);
				$offset = mysql_escape_string($_POST['offset']);
				
				$result = mysql_query("select * from posts where parent = $parent || id = $parent && enabled = 1 order by created desc limit 10 offset $offset");
				$posts = array();
				while(($line = mysql_fetch_assoc($result))){
					array_push($posts,$line);
				}
				echo json_encode($posts);
				break;
			case "getthreads": 
				$board = mysql_escape_string($_POST['board']);
				$offset = mysql_escape_string($_POST['offset']);
				$result = mysql_query("select id,created,lastedited,title,author,attribute,replies,views from posts where board = $board && enabled = 1 order by lastedited desc limit 50 offset $offset");
				$threads = array();
				while(($line = mysql_fetch_assoc($result))){
					$author = $users->getUserData($line['author']);
					$line['author'] = array("id"=>$author['id'],"username"=>$author['username']);
					array_push($threads,$line);
				}
				echo json_encode($threads);
				break;
		}
	}
		
?>