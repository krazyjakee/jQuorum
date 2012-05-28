<!doctype html>
<html>
<head>
	<title><?php echo $forum_settings['title']; ?></title>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/cupertino/jquery-ui.css" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/jquorum.css" type="text/css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
	<script type="text/javascript" src="js/interface.js"></script>
	<script type="text/javascript" src="js/ajax.js"></script>
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
	<div id="header-pages" class="ui-widget ui-widget-content ui-corner-bottom header-pages">
		<ul class="ui-widget ui-helper-clearfix">
			<li onclick="Interface.showHome()">Home</li>
			<li onclick="">Rules</li>
		</ul>
		<form action="#" method="post" class="ui-widget ui-corner-all header-search">
			<input type="text" name="q" size="35" />
			<div class="ui-icon ui-icon-search"></div>
		</form>
	</div>
	
	<ul id="header-breadcrumbs" class="header-breadcrumbs body-links">
		<li><a href="#"><div class="ui-icon ui-icon-home"></div></a></li>
		<li><div class="ui-icon ui-icon-arrow-1-e"></div><a href="">Announcements</a></li>
		<li><div class="ui-icon ui-icon-arrow-1-e"></div><a href="">Project News</a></li>
	</ul>
	
	<ul id="header-links" class="header-links body-links">
		<li><a href="#">New threads</a></li>
		<li><a href="#">Announcements</a></li>
		<li><a href="#">Staff</a></li>
	</ul>