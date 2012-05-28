<?php

	$host = "localhost";
	$user = "root";
	$pass = "root";
	$daba = "jquorum";
	
	$salt = "fdhjskl89u9898fldssss";
	
	$conn = mysql_connect($host,$user,$pass);
	mysql_select_db($daba);
	
	$result = mysql_query("select * from settings");
	$forum_settings = array();
	while(($line = mysql_fetch_assoc($result)) != null){
		$forum_settings[$line['setting']] = $line['value'];
	}
	
?>