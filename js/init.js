jQuery.fn.exists = function(){return this.length>0;}

$(function(){
	$("#register-dialog").dialog({modal: true, autoOpen: false, width: 600, draggable: false, resizable: false, show: { effect: 'drop', direction: 'up' }, hide: { effect: 'drop', direction: 'up' }});
	$("#newthread-dialog").dialog({modal: true, autoOpen: false, width: 750, draggable: false, resizable: false, show: { effect: 'drop', direction: 'up' }, hide: { effect: 'drop', direction: 'up' }});
});

var loaderHTML = '<div class="loader"><img src="img/loader.gif" alt="loading..." /></div>';

$(window).load(function(){
	
	// Get style data and update the elements that jqueryui themes fail to style such as the body background.
	var coreFontColor = $('.ui-widget-content:first').css('color');
	if(forum_config['bodycss']){
		$('html').addClass('bodycss');
		coreFontColor = $('body').css('color');
	}else{
		coreBackColor = $('.ui-widget-content:first').css('background-color');
		$('html').css('background-color',coreBackColor);
	}
	$('.body-links, .body-links li, .body-links a').css('color',coreFontColor);
	$('#register-dialog input, #register-dialog textarea').addClass('text ui-corner-all');
	
	// Style all buttons as they should be.
	$('input[type="button"], input[type="submit"], button').button();
	$('.checkbutton').button(); $('.buttonset').buttonset();
	
	// Perform a login request.
	$('#login-form').submit(function(){
		var username = $('#login-form input[name="username"]').val();
		var password = $('#login-form input[name="password"]').val();
		AJAX.login(username,password);
		return false;
	});
	
	// Perform a register request.
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
	
	// After the page has loaded for the first time, perform a quick login.
	AJAX.qlogin();
	
	Interface.newContentPanel({	name: 'Main Index',	id: 0 });
	Interface.newContentPanel({	name: '',	id: 1 });
	Interface.newContentPanel({	name: '',	id: 2 });
	$('.contentpanel-container').hide();
	$('#contentpanel-0').show();
	$('#contentpanel-0-content').html(loaderHTML);
	
	// Load boards and populate main index.
	AJAX.loadBoards(function(){ Boards.populateBoardPanels(0); });
	
	$('#newthread-tabs').tabs();

});