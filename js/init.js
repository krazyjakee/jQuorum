$(function(){
	$("#register-dialog").dialog({modal: true, autoOpen: false, width: 600, draggable: false, resizable: false, show: { effect: 'drop', direction: 'up' }, hide: { effect: 'drop', direction: 'up' }});
});


$(window).load(function(){
	
	var coreFontColor = $('.ui-widget-content:first').css('color');
	if(hasBodyStyle){
		$('html,body').addClass('.bodycss');
	}else{
		coreBackColor = $('.ui-widget-content:first').css('background-color');
		$('html,body').css('background-color',coreBackColor);
	}
	
	$('.body-links, .body-links li, .body-links a').css('color',coreFontColor);
	
	$('#register-dialog input, #register-dialog textarea').addClass('text ui-corner-all');
	
	$('#login-form').submit(function(){
		var username = $('#login-form input[name="username"]').val();
		var password = $('#login-form input[name="password"]').val();
		AJAX.login(username,password);
		return false;
	});
	
	$('#register-form').submit(function(){
		var username = $('#register-form input[name="register_username"]').val();
		var password = $('#register-form input[name="register_password1"]').val();
		var password2 = $('#register-form input[name="register_password2"]').val();
		var email = $('#register-form input[name="register_email1"]').val();
		var email2 = $('#register-form input[name="register_email2"]').val();
		var referrer = $('#register-form input[name="register_referrer"]').val();
		var rules = $('#register-form input[name="register_rules"]').is(':checked');
		
		if(password != password2){
			alert('Passwords do not match!');
		}else if(email != email2){
			alert('Emails do not match!');
		}else if(rules == false){
			alert('You must agree to the rules before registering!');
		}else{
			AJAX.register(username,password,email,referrer);
		}
		return false;
	});
	
	AJAX.qlogin();

});