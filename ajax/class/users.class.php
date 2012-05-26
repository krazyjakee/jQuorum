<?php

	Class Users{
		
		function login($username,$password){
			$result = mysql_query("select username,email,referrer,regdate,lastlogin from users where username = '$username' and password = '$password'");
			if(mysql_num_rows($result) > 0){
				$ssid = sha1(date('Uu').$username.'fubar');
				setcookie('username',$username);
				setcookie('ssid',$ssid);
				mysql_query("update users set lastlogin = now() and ssid = '$ssid' where username = '$username'");
				$userdata = mysql_fetch_assoc($result);
				$userdata['ssid'] = $ssid;
				return $userdata;
			}else{
				return false;
			}
		}
		
	}

?>