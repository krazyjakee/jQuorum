var Threads = {
	currentThread: false,
	
	showThreads: function(id){
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
		
		if(children.length > 0){
			$('#contentpanel-1-content').append('<div class="ui-widget-header ui-corner-top overall-header">Sub Sections</div><div id="threadview-subsections" class="ui-widget ui-widget-content ui-corner-bottom boardpanel-content"><ul></ul></div>');
			$.each(children, function(index, b){
				$('#threadview-subsections ul').append('<li class="ui-widget-content subboard-title" data="'+b.id+'"><div class="subboard-right">Threads: '+b.threads+' | Posts: '+b.posts+' | Views: '+board.views+'</div><span class="ui-icon ui-icon-document"></span>'+b.name+'<div id="subboard-li-'+b.id+'"></div></li>');
			});
			$('#threadview-subsections ul').selectable({
				selected: function(event, ui) {
					Threads.showThreads($(ui.selected).attr('data'));
				}
			});
		}
		
		// Apply interface styling.
		$('#threadview-subsections ul li:first-child').addClass('ui-corner-top');
		$('#threadview-subsections ul li:last-child').addClass('ui-corner-bottom');
		$('#threadview-subsections li').mouseover(function(){
			$(this).addClass('ui-state-hover');
		});
		$('#threadview-subsections li').mouseleave(function(){
			$(this).removeClass('ui-state-hover');
		});
		
		$('#contentpanel-1-header').html(board.name);
		
		Interface.contentPanelTransition(1);
	}
}