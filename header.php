 <!doctype html>
<html>
<head>
	<title><?php echo $forum_settings['title']; ?></title>
	<?php
		if(strpos($forum_settings['style'],"/")){
			echo "<link rel=\"stylesheet\" href=\"".$forum_settings['style']."\" type=\"text/css\" />";
		}else{
			echo "<link rel=\"stylesheet\" href=\"http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/".$forum_settings['style']."/jquery-ui.css\" type=\"text/css\" />";
		}
		
	?>
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/jquorum.css" type="text/css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery.keyframes.js"></script>
	<script type="text/javascript" src="js/interface.js"></script>
	<script type="text/javascript" src="js/boards.js"></script>
	<script type="text/javascript" src="js/threads.js"></script>
	<script type="text/javascript" src="js/posts.js"></script>
	<script type="text/javascript" src="js/bbcode.js"></script>
	<script type="text/javascript" src="js/caret.js"></script>
	<script type="text/javascript" src="js/effects.js"></script>
	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
<?php
	if($handle1 = opendir('plugins')){
		while (false !== ($folder = readdir($handle1))) {
			if(is_dir("plugins/".$folder) && $folder != "." && $folder != ".."){
				if($handle2 = opendir("plugins/".$folder)){
			        while (false !== ($plugin = readdir($handle2))) {
			      		if(substr($plugin,strlen($plugin) - 2) == "js"){
				      		echo '<script type="text/javascript" src="plugins/'.$folder.'/'.$plugin.'"></script>';
			      		}
			        }
		        }
	        }
	    }
    }
?>
	<script type="text/javascript">
		var forum_config = <?php echo json_encode($forum_settings); ?>;
		var forum_groups = <?php echo json_encode($forum_groups); ?>;
<?php
include 'ajax/class/users.class.php';
$user = Users::qlogin();
$forum_usergroup_permissions = "admin";
if($user['usergroup'] != 0){
	foreach($forum_groups as $fg){
		if($user){
			if($fg['id'] == $user['usergroup']){
				$forum_usergroup_permissions = $fg['permissions'];
			}
		}else{
			if($fg['id'] == 0){
				$forum_usergroup_permissions = $fg['permissions'];
			}
		}
	}
}
?>
		var forum_userpermissions = <?php echo $forum_usergroup_permissions; ?>;
	</script>
	<style>
	.bodycss{ <?php echo $forum_settings['bodycss']; ?>	}
	</style>
</head>
<body>
	<div id="header" class="ui-widget-header ui-corner-top overall-header">
		<a id="header-logo" class="header-logo" onclick="Interface.showHome()">jQuorum</a>
		<form action="" id="login-form" method="post" class="header-right header-prelogin">
			<input onclick="Interface.loginInputClick(this)" type="text" name="username" value="User Name" class="text ui-corner-all jquorum-text-input" />
			<input onclick="Interface.loginInputClick(this)" type="password" name="password" value="Password" class="text ui-corner-all jquorum-text-input" />
			<button type="submit"><span class="ui-button-icon-primary icon-signin"></span> Login</button> | 
			<button type="button" onclick="Interface.showRegisterForm()">Register</button>
			<button type="button" onclick="Interface.showHelpPage()"><span class="ui-button-icon-primary icon-question-sign"></span> Help</button>
		</form>
		<div class="header-right header-postlogin">
			Welcome <b><a href="#" id="header-username" class="body-link"></a></b>
			<button type="button" onclick="Interface.showSettings()"><span class="ui-button-icon-primary icon-cog"></span> Settings</button>
			<button type="button" onclick="Interface.doLogout()"><span class="ui-button-icon-primary icon-signout"></span> Log out</button>
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
		<li><a href="#"><div class="icon-home" onclick="Interface.showHome()"></div></a></li>
	</ul>
	
	<ul id="header-links" class="header-links body-links">
		<li><a href="#">New threads</a></li>
		<li><a href="#">Announcements</a></li>
		<li><a href="#">Staff</a></li>
	</ul>