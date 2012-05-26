<!-- Dialogs -->

<div id="register-dialog" title="Register">
	<small>In order to register we need a few details from you. Please fill in the form below and we will email you details on how to activate your account.</small><br /><br />
	<form action="" method="post">
		<label for="register_username">Username: </label>
		<input type="text" id="register_username" name="register_username" /><br />
		<label for="register_password1">Password: </label>
		<input type="password" id="register_password1" name="register_password1" /><br />
		<label for="register_password2">Password Confirm: </label>
		<input type="password" id="register_password2" name="register_password2" />
	</form>
</div>

<style>
.bodycss{
	<?php echo $forum_settings['bodycss']; ?>
}
</style>
<script type="text/javascript">
	var hasBodyStyle = <?php if($forum_settings['bodycss']){ echo 'true'; }else{ echo 'false'; } ?>;
</script>
</body>
</html>
<?php

	mysql_close();

?>