<?php

	Class Users{
		
		function login($username,$password){
			$result = mysql_query("select username,email,referrer,regdate,lastlogin from users where username = '$username' and password = '$password' limit 1");
			if(mysql_num_rows($result) > 0){
				$ssid = sha1(date('Uu').$username.rand(0,10000));
				setcookie("username", $username, false, "/", false);
				setcookie('ssid',$ssid, false, "/", false);
				mysql_query("update users set ssid = '$ssid' where username = '$username'");
				$userdata = mysql_fetch_assoc($result);
				$userdata['ssid'] = $ssid;
				return $userdata;
			}else{
				return false;
			}
		}
		
		function qlogin(){
			if(isset($_COOKIE['username']) && isset($_COOKIE['ssid'])){
				$username = mysql_escape_string($_COOKIE['username']);
				$ssid = mysql_escape_string($_COOKIE['ssid']);
				$result = mysql_query("select * from users where username = '$username' and ssid = '$ssid' limit 1");
				if(mysql_num_rows($result) > 0){
					$userdata = mysql_fetch_assoc($result);
					return $userdata;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		
		function register($username,$password,$email,$referrer){
			if($this->checkUsername($username) == false){
				if($this->checkEmail($email)){
					$date = date('Y-m-d H:i:s');
					mysql_query("insert into users (username,password,email,referrer, regdate)values('$username','$password','$email','$referrer','$date')");
					return $this->login($username,$password);
				}else{
					return "email";
				}
			}else{
				return "username";
			}
		}
		
		function checkUsername($username){
			$result = mysql_query("select * from users where username = '$username'");
			if(mysql_num_rows($result) > 0){
				return true;
			}else{
				return false;
			}
		}
		
		function checkEmail($email){
		    return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email);
		}
		
		function logout(){
			setcookie('username','', false, "/", false);
			setcookie('ssid','', false, "/", false);
		}
		
	}

?>