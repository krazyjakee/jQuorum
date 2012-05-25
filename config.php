<?php

	$host = "localhost";
	$user = "root";
	$pass = "root";
	$daba = "jquorum";
	
	$conn = mysql_connect($host,$user,$pass);
	mysql_select_db($daba);
	
	$result = mysql_query("select * from settings");
	$forum_settings = mysql_fetch_assoc($result);
?>