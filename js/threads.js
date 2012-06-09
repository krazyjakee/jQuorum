var Threads = {
	currentThread: false,
	threadOffset: 0,
	
	showThreads: function(id){
		Boards.currentBoard = id;
		Interface.contentPanelTransition(1,function(){
			$('#contentpanel-1-content').html('');
			var board = false;
			var children = [];
			
			$.each(Boards.loadedBoards, function(index, b){
				if(b.id == id){
					board = b;
				}
				
				if(b.parent == id){
					children.push(b);
				}
			});
			
			$('#contentpanel-1-header').html(board.name);
			
			// Insert sub boards
			if(children.length > 0){
				$('#contentpanel-1-content').append('<div class="ui-widget-header ui-corner-top overall-header">Sub Sections</div><div id="threadview-subsections" class="ui-widget ui-widget-content ui-corner-bottom boardpanel-content"><ul></ul></div>');
				$.each(children, function(index, b){
					$('#threadview-subsections ul').append('<li class="ui-widget-content subboard-title" data="'+b.id+'"><div class="subboard-right">Threads: '+b.threads+' | Posts: '+b.posts+' | Views: '+board.views+'</div><span class="icon-file"></span> '+b.name+'<div id="subboard-li-'+b.id+'"></div></li>');
				});
				$('#threadview-subsections ul').selectable({
					selected: function(event, ui) {
						Threads.showThreads($(ui.selected).attr('data'));
					},
					cancel: 'a'
				});
			}
			
			// Insert thread controls
			var threadControls = '<div class="ui-widget-header ui-corner-all toolbar">';
			if(board.locked == 0){ threadControls += '<button id="threads-new" onclick="Interface.showNewThreadForm()">New Thread</button>'; }
			threadControls += '<button id="board-markread" onclick="">Mark Read</button>';
			threadControls += '</div>';
			
			$('#contentpanel-1-content').append(threadControls);
			
			// Apply interface styling so far.
			$('#threadview-subsections ul li:first-child').addClass('ui-corner-top');
			$('#threadview-subsections ul li:last-child').addClass('ui-corner-bottom');
			$('#threadview-subsections li').mouseover(function(){
				$(this).addClass('ui-state-hover');
			});
			$('#threadview-subsections li').mouseleave(function(){
				$(this).removeClass('ui-state-hover');
			});
			$('#threads-new').button({ icons: { primary: 'ui-icon-plusthick' } });
			$('#board-markread').button({ icons: { primary: 'ui-icon-check' } });
			
			// Insert threads container and populate.
			Threads.loadThreads();
		});
	},
	
	newThread: function(){
		var board = Boards.currentBoard;
		var title = $('#newthread-title').val();
		var content = $('#newthread-text').val();
		AJAX.newThread(board,title,content);
	},
	
	loadThreads: function(){
		$('#contentpanel-1-content').append('<div id="threads-container" class="boardpanel-content"><div class="loader"></div><ul></ul></div>');
		var board = Boards.currentBoard;
		var offset = Threads.threadOffset;
		AJAX.loadThreads(board,offset);
	},
	
	populateThreads: function(json){
		$('.loader').hide();
		$.each(json, function(index, thread){
			$('#threads-container ul').append('<li class="ui-widget-content thread-title" data="'+thread.id+'"><div class="thread-title-right">Replies: '+thread.replies+' | Views: '+thread.views+' | By: <a href="#">'+thread.author.username+'</a></div><span class="icon-file"></span> '+thread.title+'<div><small>by <a href="#">'+thread.author.username+'</a> on '+thread.lastedited+'</small></div></li>');
		});
		$('#threads-container ul').selectable({
			selected: function(event, ui){
				Posts.showThread($(ui.selected).attr('data'));
			},
			cancel: 'a'
		});
		
		// Apply interface styling.
		$('#threads-container ul li:first-child').addClass('ui-corner-top');
		$('#threads-container ul li:last-child').addClass('ui-corner-bottom');
		$('#threads-container li').mouseover(function(){
			$(this).addClass('ui-state-hover');
		});
		$('#threads-container li').mouseleave(function(){
			$(this).removeClass('ui-state-hover');
		});
	}
}