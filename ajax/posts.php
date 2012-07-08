<?php

	include '../config.php';
	include 'class/users.class.php';
	$users = new Users();
	$user = $users->qlogin();
	
	if(isset($_POST['do'])){
		switch($_POST['do']){
			case "newthread":
				if($user){ $group = $user['group']; $id = $user['id']; }else{ $group = 1; $id = $REMOTE_ADDR; }
				$board = mysql_escape_string($_POST['board']);
				$title = mysql_escape_string($_POST['title']);
				$content = mysql_escape_string($_POST['content']);
				if($users->hasPermission($group,$board,"write")){
					$now = date("Y-m-d H:i:s");
					mysql_query("insert into posts (created,lastedited,title,content,author,board)values('$now','$now','$title','$content',$id,$board)");
				}
				break;
			case "newpost": break;
			case "getposts":
				include "class/bbcode.class.php";
				$parent = mysql_escape_string($_POST['parent']);
				$offset = mysql_escape_string($_POST['offset']);
				$result = mysql_query("select * from posts where parent = $parent or id = $parent and enabled = 1 order by created desc limit 10 offset $offset") or die(mysql_error());
				$posts = array();
				while(($line = mysql_fetch_assoc($result))){
					$line['content'] = bbcodeParser($line['content']);
					array_push($posts,$line);
				}
				$uposts = array();
				foreach($posts as $post){
					$udata = $users->getUserData($post['author'],"username,regdate,usergroup,picture");
					$post = array_merge($post,$udata);
					array_push($uposts,$post);
				}
				
				echo json_encode($uposts);
				break;
			case "getthreads": 
				$board = mysql_escape_string($_POST['board']);
				$offset = mysql_escape_string($_POST['offset']);
				if($user){ $group = $user['usergroup']; }else{ $group = 1; }
				if($users->hasPermission($group,$board,"read")){
					$result = mysql_query("select id,created,lastedited,title,author,attribute,replies,views,locked from posts where board = $board && enabled = 1 order by lastedited desc limit 50 offset $offset");
					$threads = array();
					while(($line = mysql_fetch_assoc($result))){
						$author = $users->getUserData($line['author'],"id,username");
						$line['author'] = array("id"=>$author['id'],"username"=>$author['username']);
						array_push($threads,$line);
					}
					echo json_encode($threads);
				}
				break;
			case "getgroupdata":
				echo json_encode($user->getGroupData());
				break;
		}
	}
		
?>