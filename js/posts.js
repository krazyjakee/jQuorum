var Posts = {
	currentThread: 0,
	currentThreadOffset: 0,
	currentPosts: 0,
	loadPosts: function(id){
		AJAX.getPosts(id,this.currentThreadOffset,function(posts){
			
			Posts.currentPosts = posts;
			
			// Insert thread controls
			var postControls = '<div style="float:right;font-size:11px;margin-top:-3px;">';
			if(posts[0].locked == 0){ postControls += '<button id="posts-new" onclick="Interface.showNewPostForm()"><span class="ui-button-icon-primary icon-share-alt"></span> Reply</button>'; }
			postControls += ['<button id="thread-subscribe" onclick=""><span class="ui-button-icon-primary icon-bookmark"></span> Subscribe to this Thread</button>',
			'</div>'].join('\n');			
			$('#editpost-title, #newpost-title').html(' '+posts[0].title);
			$('#editpost-title-input').val(posts[0].title);
			$('#contentpanel-2-header').html(posts[0].title + postControls);
			$.each(posts, function(index,post){
				var usergroup = post.usergroup;
				$.each(forum_groups, function(index, group){
					if(group.id == usergroup){
						usergroup = group;
					}
				});
				
				var postdata = ['<li>',
				'<table width="100%" height="50" class="user-post-header ui-widget-header ui-corner-all"><tr>',
				'<td width="50"><img src="'+post.picture+'" width="50" height="50" /></td>',
				'<td><a href="#" onclick="Interface.showProfile('+post.author+')">'+post.username+'</a><br /><small style="color:#'+usergroup.color+';">'+usergroup.name+'</small></td>',
				'<td width="200" style="text-align:right;padding-right:5px;">'].join('\n');
				if(post.author == forum_userdata.id && AJAX.hasPermission(post.board,'edit')){
					postdata += '<button id="posts-edit" onclick="Interface.showEditPostForm(\''+post.title+'\','+post.id+')"><span class="ui-button-icon-primary icon-edit"></span>Edit</button>';
				}
				postdata += ['</tr></table>',
				'<div id="postcontent-'+post.id+'" class="postcontent">'+bbcodeParser.bbcodeToHtml(post.content)+'</div>',			
				'</li>'].join('\n');
				$('#posts-container ul').append(postdata);
				$('#posts-new, #posts-edit, #thread-subscribe').button();
			});
		});
	},
	showThread: function(tid){
		this.currentThread = tid;
		$('#posts-container').remove();
		Interface.contentPanelTransition(2,function(){
			$('#contentpanel-2-content').append('<div id="posts-container" class="boardpanel-content"><div class="loader"></div><ul></ul></div>');
			Posts.loadPosts(tid);
		});
	},
	newPost: function(){
		var thread = this.currentThread;
		var content = $('#newpost-text').val();
		var board = Boards.currentBoard;
		AJAX.newPost(thread,board,content);
	}
}