var Posts = {
	currentThreadOffset: 0,
	loadPosts: function(id){
		AJAX.getPosts(id,this.currentThreadOffset,function(posts){
			
			// Insert thread controls
			var postControls = '<div style="float:right;font-size:11px;margin-top:-3px;">';
			if(posts[0].locked == 0){ postControls += '<button id="posts-new" onclick="Interface.showNewPostForm()"><span class="ui-button-icon-primary icon-share-alt"></span> Reply</button>'; }
			postControls += ['<button id="thread-subscribe" onclick=""><span class="ui-button-icon-primary icon-bookmark"></span> Subscribe to this Thread</button>',
			'</div>'].join('\n');			
			$('#contentpanel-2-header').html(posts[0].title + postControls);
			$.each(posts, function(index,post){
				// "[{"id":"1","created":"2012-06-20 20:44:03","lastedited":"2012-06-20 20:44:03","title":"test","content":"test","author":"1","board":"15","parent":"0","attribute":"","enabled":"1","replies":"0","views":"0","locked":"0","username":"sub7","regdate":"2012-06-19 15:28:25","usergroup":"0"}]"
				var usergroup = post.usergroup;
				$.each(forum_groups, function(index, group){
					if(group.id == usergroup){
						usergroup = group;
					}
				});
				
				var postdata = ['<li>',
				'<table width="100%" height="50" class="user-post-header"><tr>',
				'<td width="50"><img src="'+post.picture+'" width="50" height="50" /></td>',
				'<td><a href="#" onclick="Interface.showProfile('+post.author+')">'+post.username+'</a><br /><small style="color:#'+usergroup.color+';">'+usergroup.name+'</small></td>',
				'<td width="200"></td>',
				'</tr></table><hr />',
				'<div id="postcontent-'+post.id+'" class="postcontent">'+post.content+'</div>',			
				'</li>'].join('\n');
				$('#posts-container ul').append(postdata);
				$('#posts-new').button();
				$('#thread-subscribe').button();
			});
		});
	},
	showThread: function(tid){
		Interface.contentPanelTransition(2,function(){
			$('#contentpanel-2-content').append('<div id="posts-container" class="boardpanel-content"><div class="loader"></div><ul></ul></div>');
			Posts.loadPosts(tid);
		});
	}
}