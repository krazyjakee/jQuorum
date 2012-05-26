$(function(){
	$("#register-dialog").dialog({modal: true, autoOpen: false, width: 600, draggable: false, resizable: false, show: { effect: 'drop', direction: 'up' }});
});


$(window).load(function(){
	
	var coreFontColor = $('.ui-widget-content:first').css('color');
	if(hasBodyStyle){
		$('html,body').addClass('.bodycss');
	}else{
		coreBackColor = $('.ui-widget-content:first').css('background-color');
		$('html,body').css('background-color',coreBackColor);
	}
	
	$('#header-links a, header-username').css('color',coreFontColor);
	
	$('#register-dialog input').addClass('text ui-corner-all');
	
	$('#login-form').submit(function(){
		var username = $('#login-form input[name="username"]').val();
		var password = $('#login-form input[name="password"]').val();
		$.ajax({
			url: 'ajax/users.php',
			data: 'do=login&username='+username+'&password='+password,
			type: 'post',
			success: function(json){
				if(json){
					json = eval('('+json+')');
					Interface.doLogin(json);
				}else{
					alert('Login error');
				}
			}
		});
		return false;
	});

});