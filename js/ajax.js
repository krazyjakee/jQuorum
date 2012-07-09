var AJAX = {
	
	login: function(username,password){
		$.ajax({
			url: forum_config['url']+'ajax/users.php',
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
	},
	
	qlogin: function(){
		$.ajax({
			url: forum_config['url']+'ajax/users.php',
			data: 'do=qlogin',
			type: 'post',
			success: function(json){
				if(json != ''){
					json = eval('('+json+')');
					Interface.doLogin(json);
				}else{
					AJAX.loadBoards(function(){ Boards.populateBoardPanels(0); });
				}
			}
		});
	},
	
	logout: function(){
		$.ajax({
			url: forum_config['url']+'ajax/users.php',
			data: 'do=logout',
			type: 'post',
			success: function(){ AJAX.loadBoards(function(){ Boards.populateBoardPanels(0); }); }
		});
	},
	
	register: function(username,password,email,referrer){
		$.ajax({
			url: forum_config['url']+'ajax/users.php',
			data: 'do=register&username='+username+'&password='+password+'&email='+email+'&referrer='+referrer,
			type: 'post',
			success: function(json){
				if(json){
					switch(json){
						case 'email': alert('The email is invalid.'); break;
						case 'username': alert('The username is taken.'); break;
						default: json = eval('('+json+')');
						Interface.doLogin(json); $("#register-dialog").dialog('close'); break;
					}
				}else{
					alert('Register error!');
				}
			}
		});
	},
	
	loadBoards: function(callback){
		Boards.loadedBoards = [];
		$.ajax({
			url: forum_config['url']+'ajax/boards.php',
			data: 'do=loadboards',
			type: 'post',
			success: function(json){
				json = eval('('+json+')');
				$.each(json, function(index, board){
					Boards.loadedBoards.push(board);
				});
				if(callback){ callback(); }
			}
		});
		
	},
	
	loadThreads: function(board,offset){
		$.ajax({
			url: forum_config['url']+'ajax/posts.php',
			data: 'do=getthreads&board='+board+'&offset='+offset,
			type: 'post',
			success: function(json){
				json = eval('('+json+')');
				Threads.populateThreads(json);
			}
		});
	},
	
	newThread: function(board,title,content){
		$.ajax({
			url: forum_config['url']+'ajax/posts.php',
			data: 'do=newthread&board='+board+'&title='+title+'&content='+content,
			type: 'post',
			success: function(json){
				$('#threads-container').remove();
				Threads.loadThreads();
				$('#newthread-dialog').dialog('close');
			}
		});
	},
	
	newPost: function(thread,board,content){
		$.ajax({
			url: forum_config['url']+'ajax/posts.php',
			data: 'do=newpost&board='+board+'&thread='+thread+'&content='+content,
			type: 'post',
			success: function(json){
				Posts.showThread(thread);
				$('#newpost-dialog').dialog('close');
			}
		});	
	},
	
	getPosts: function(id,offset,callback){
		$.ajax({
			url: forum_config['url']+'ajax/posts.php',
			type: 'post',
			data: 'do=getposts&parent='+id+'&offset='+offset,
			success: function(json){
				json = eval('('+json+')');
				if(callback){ callback(json); }
			}
		});
	},
	
	hasPermission: function(board,flag){
		if(forum_userpermissions != "admin"){
			var hasperms = false;
			$.each(forum_userpermissions[board], function(index, perms){
				if(perms == flag){
					hasperms = true;
					return false;
				}
			});
			return hasperms;
		}else{
			return true;
		}
	}
	
}