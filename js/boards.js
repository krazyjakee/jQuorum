var Boards = {
	
	loadedBoards: [],
	
	populateBoardPanels: function(parent){
		$('.loader').hide();
		var subBoards = [];
		
		// Load index sections.
		$.each(Boards.loadedBoards, function(index, board){
			if(board.parent == parent){
				$('#contentpanel-'+parent+'-content').append('<div id="boardpanel-'+board.id+'-header" class="ui-widget-header ui-corner-top overall-header">'+board.name+'</div><div id="boardpanel-'+board.id+'-content" class="ui-widget ui-widget-content ui-corner-bottom boardpanel-content"></div>');
			}
		});
		
		// Load sub boards
		$.each(Boards.loadedBoards, function(index, board){
			if(board.parent != parent){
				var listexists = false;
				$.each(subBoards, function(index, list){
					if(list == board.parent){
						listexists = true;
					}
				});
				
				if(listexists == false){
					if($('#boardpanel-'+board.parent+'-content').exists()){
						$('#boardpanel-'+board.parent+'-content').append('<ul></ul>');
						subBoards.push(board.parent);
					}
				}
				
				$('#boardpanel-'+board.parent+'-content ul').append('<li class="ui-widget-content subboard-title"><div class="subboard-right">Threads: '+board.threads+' | Posts: '+board.posts+' | Views: '+board.views+'</div><span class="ui-icon ui-icon-document"></span>'+board.name+'<div id="subboard-li-'+board.id+'"></div></li>');
			}
		});
		
		$.each(subBoards, function(index, board){
			$('#boardpanel-'+board+'-content ul').selectable();
		});
		
		$('.boardpanel-content ul li:first-child').addClass('ui-corner-top');
		$('.boardpanel-content ul li:last-child').addClass('ui-corner-bottom');
		
		// Load sub sub boards.
		$.each(Boards.loadedBoards, function(index, board){
			if(board.parent != parent){
				isSubBoard = false;
				$.each(subBoards, function(index, b){
					if(board.id == b.id){
						notSubBoard = true;
					}
				});
				
				if(isSubBoard == false){
					$('#subboard-li-'+board.parent).append('<a href="#">'+board.name+'</a> ');
				}
			}
		});
		
		// Apply interface styling.
		$('.boardpanel-content li').mouseover(function(){
			$(this).addClass('ui-state-hover');
		});
		$('.boardpanel-content li').mouseleave(function(){
			$(this).removeClass('ui-state-hover');
		});
	}
	
}