var Interface = {
	
	loginInputClick: function(elem){
		$(elem).val('');
	},
	
	showHome: function(){
		
	},
	
	showPage: function(id){
	
	},
	
	showSettings: function(id){
	
	},
	
	showRegisterForm: function(){
		$("#register-dialog").dialog('open');
	},
	
	showHelpPage: function(){
	
	},
	
	doLogin: function(userData){
		$('.header-prelogin').hide();
		$('.header-postlogin').show();
		$('#header-username').html(userData.username);
	},
	
	doLogout: function(){
		$('.header-postlogin').hide();
		$('.header-prelogin').show();
		AJAX.logout();
	}
	
}