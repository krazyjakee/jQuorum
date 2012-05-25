<!doctype html>
<html>
<head>
	<title><?php echo $forum_settings['title']; ?></title>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/cupertino/jquery-ui.css" type="text/css" />
	<link rel="stylesheet" href="css/jquorum.css" type="text/css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/interface.js"></script>
</head>
<body>
		<div id="header" class="ui-widget-header ui-corner-top overall-header">
			<div id="header-logo" class="header-logo" onclick="Interface.showHome()">jQuorum</div>
			<form action="#" method="post" id="header-right" class="header-right">
				<input onclick="Interface.loginInputClick(this)" type="text" name="username" value="User Name" class="text ui-corner-all" />
				<input onclick="Interface.loginInputClick(this)" type="password" name="password" value="Password" class="text ui-corner-all" />
				<button type="submit" class="ui-button-text-only ui-widget ui-state-default ui-corner-all">Login</button> | 
				<button type="button" class="ui-button-text-only ui-widget ui-state-default ui-corner-all" onclick="Interface.showRegisterForm()">Register</button>
				<button type="button" class="ui-button-text-only ui-widget ui-state-default ui-corner-all" onclick="Interface.showHelpPage()">Help</button>
			</form>
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