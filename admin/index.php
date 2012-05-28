<?php

	include '../config.php';
	include '../ajax/class/users.class.php';
	$users = new Users();
	if(($userdata = $users->qlogin()) != false){
		if(strpos($userdata['userflags'],"a")){
?>
<!doctype html>
<html>
<head>
	<title>Administration Panel</title>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-darkness/jquery-ui.css" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../css/jquorum.css" type="text/css" />
	<link rel="stylesheet" href="admin.css" type="text/css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
	<script type="text/javascript" src="../js/interface.js"></script>
	<script type="text/javascript" src="../js/ajax.js"></script>
</head>
<body>
	<div id="header" class="ui-widget-header ui-corner-top overall-header">
		<a id="header-logo" class="header-logo" onclick="Interface.showHome()">jQuorum</a>
		<form action="" id="login-form" method="post" class="header-right header-prelogin">
			<input onclick="Interface.loginInputClick(this)" type="text" name="username" value="User Name" class="text ui-corner-all" />
			<input onclick="Interface.loginInputClick(this)" type="password" name="password" value="Password" class="text ui-corner-all" />
			<button type="submit" class="ui-button-text-only ui-widget ui-state-default ui-corner-all">Login</button> | 
			<button type="button" class="ui-button-text-only ui-widget ui-state-default ui-corner-all" onclick="Interface.showRegisterForm()">Register</button>
			<button type="button" class="ui-button-text-only ui-widget ui-state-default ui-corner-all" onclick="Interface.showHelpPage()">Help</button>
		</form>
		<div class="header-right header-postlogin">
			Welcome <b><a href="#" id="header-username" class="body-link"></a></b>
			<button type="button" class="ui-button-text-only ui-widget ui-state-default ui-corner-all" onclick="Interface.showSettings()">Settings</button>
			<button type="button" class="ui-button-text-only ui-widget ui-state-default ui-corner-all" onclick="Interface.doLogout()">Log out</button>
		</div>
	</div>
	<div id="header-pages" class="ui-widget ui-widget-content ui-corner-bottom">
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Overview</a></li>
				<li><a href="#tabs-2">Forums</a></li>
				<li><a href="#tabs-3">Users</a></li>
				<li><a href="#tabs-4">Content</a></li>
				<li><a href="#tabs-5">Logs</a></li>
			</ul>
			<div id="tabs-1" class="tab-content">
				<table width="100%">
					<tr>
						<td>
							<ul>
								<li onclick="Admin.showPage(this,'coreconfig')">Core configuration</li>
							</ul>
						</td>
						<td>
							
						</td>
					</tr>
				</table>
			</div>
			<div id="tabs-2">
				<table width="100%">
					<tr>
						<td>
							
						</td>
						<td>
							
						</td>
					</tr>
				</table>
			</div>
			<div id="tabs-3">
				<table width="100%">
					<tr>
						<td>
							
						</td>
						<td>
							
						</td>
					</tr>
				</table>
			</div>
			<div id="tabs-4">
				<table width="100%">
					<tr>
						<td>
							
						</td>
						<td>
							
						</td>
					</tr>
				</table>
			</div>
			<div id="tabs-5">
				<table width="100%">
					<tr>
						<td>
							
						</td>
						<td>
							
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
<script type="text/javascript">
	AJAX.qlogin();
</script>
</body>
</html>
<?php
	}}
	mysql_close();

?>