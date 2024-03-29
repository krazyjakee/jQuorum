var Interface = {
	
	// A variable to hold all created panels.
	contentPanels: [],
	
	// The current showing content panel id.
	currentContentPanel: 0,
	
	// The animation to change content panels.
	contentPanelTransition: function(changeto,changes){
		if(this.currentContentPanel != changeto || changeto == 1){
			this.contentPanelTransitionEffect('#contentpanel-'+this.currentContentPanel,'#contentpanel-'+changeto,changes);
			this.currentContentPanel = changeto;
		}else{
			changes();
		}
	},
	
	contentPanelTransitionEffect: function(a,b,changes){
		// $('.powered-by').fadeOut();
		Effects.Transitions.fade(a,b,500,changes, function(){
			// $('.powered-by').fadeIn();
		});
	},
	
	// Used to clear the text of the login text boxes on click.
	loginInputClick: function(elem){
		$(elem).val('');
	},
	
	// Show the main index.
	showHome: function(){
		this.contentPanelTransition(0)
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
	
	// Show the new thread dialog
	showNewThreadForm: function(){
		$("#newthread-dialog").dialog('open');
	},
	
	// Show the new post dialog
	showNewPostForm: function(){
		$("#newpost-dialog").dialog('open');
	},
	
	showEditPostForm: function(title,id){
		if(title == ''){
			$('#editpost-title-input').hide();
			$('#editpost-title').show();
		}else{
			$('#editpost-title-input').show();
			$('#editpost-title').hide();
		}
		var content = '';
		$.each(Posts.currentPosts, function(index, post){
			if(post.id == id){
				content = post.content;
				return false;
			}
		});
		$('#editpost-text').val(content);
		$("#editpost-dialog").dialog('open');
	},
	
	hideNewThreadDialog: function(){
		$('#newthread-dialog').dialog('close');
	},
	
	hideNewPostDialog: function(){
		$('#newpost-dialog').dialog('close');
	},
	
	hideEditPostDialog: function(){
		$('#editpost-dialog').dialog('close');
	},
	
	// Show the help page.
	showHelpPage: function(){
	
	},
	
	// After login, update the interface with the user data argument.
	doLogin: function(userData){
		forum_userdata = userData;
		$('.header-prelogin').hide();
		$('.header-postlogin').show();
		$('#header-username').html(userData.username);
		AJAX.loadBoards(function(){ Boards.populateBoardPanels(0); });
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