var Interface = {
	
	// A variable to hold all created panels.
	contentPanels: [],
	
	// Used to clear the text of the login text boxes on click.
	loginInputClick: function(elem){
		$(elem).val('');
	},
	
	// Show the main index.
	showHome: function(){
		
	},
	
	// Show a pages content.
	showPage: function(id){
	
	},
	
	// Show the user settings panel.
	showSettings: function(id){
	
	},
	
	// Show the register form dialog.
	showRegisterForm: function(){
		$("#register-dialog").dialog('open');
	},
	
	// Show the help page.
	showHelpPage: function(){
	
	},
	
	// After login, update the interface with the user data argument.
	doLogin: function(userData){
		$('.header-prelogin').hide();
		$('.header-postlogin').show();
		$('#header-username').html(userData.username);
	},
	
	// Update the interface and perform a logout request.
	doLogout: function(){
		$('.header-postlogin').hide();
		$('.header-prelogin').show();
		AJAX.logout();
	},
	
	// Create a new content panel in the content container.
	newContentPanel: function(panelData){
		this.contentPanels.push(panelData);
		$('#content-container').append('<div id="contentpanel-'+panelData.id+'" class="contentpanel-container"><div id="contentpanel-'+panelData.id+'-header" class="ui-widget-header ui-corner-top overall-header">'+panelData.name+'</div><div id="contentpanel-'+panelData.id+'-content" class="ui-widget ui-widget-content ui-corner-bottom contentpanel-content"></div></div>');
	}
	
}