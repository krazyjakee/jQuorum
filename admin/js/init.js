$(function() {
	$( "#tabs" ).tabs({
		select: function(event, ui) { $(ui.tab.hash).find('td li:first-child').click(); }
	});
});

$(window).load(function(){
	$('#tabs-1 li:first-child').click();
	Admin.loadBoard(0);
});

function redraw(){
	$('input[type="button"], input[type="submit"], button').button();	
}

var Admin = {
	loadedBoards: [],
	currentParent: 0,
	
	showPage: function(elem, page){
		
		$.get('pages/'+page+'.php', '', function(response){
			$(elem).parent().parent().parent().find('td:last-child').html(response);
			redraw();
		});
		
	},
	
	addForumSection: function(){
		var name = $('#new-section-name').val();
		var description = $('#new-section-description').val();
		$('#forums-loader').show();
		$.ajax({
			url: 'ajax/boards.php',
			data: 'do=addboard&name='+name+'&description='+description+'&parent='+Admin.currentParent,
			type: 'post',
			success: function(board){
				board = eval('('+board+')');
				$('#admin-forum-sections').append('<li class="ui-state-default ui-corner-all" onclick="Admin.loadBoard('+board.id+');Admin.setTitle(\''+board.name+'\');"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'+board.name+'</li>');
				$('#add-section-dialog').dialog('close');
				$('#forums-loader').hide();
			}
		});
	},
	
	loadBoards: function(callback){
		Admin.loadedBoards = [];
		$.ajax({
			url: 'ajax/boards.php',
			data: 'do=loadboards',
			type: 'post',
			success: function(json){
				json = eval('('+json+')');
				$.each(json, function(index, board){
					Admin.loadedBoards.push(board);
				});
				if(callback){ callback(); }
			}
		});
		
	},
	
	loadBoard: function(parent){
		$('#admin-forum-sections').html('');
		$('#forums-loader').show();
		Admin.currentParent = parent;
		if(parent > 0){
			$('#forums-show-parentbtn').show();
		}else{
			$('#forums-show-parentbtn').hide();
		}
		Admin.loadBoards(function(){
			$.each(Admin.loadedBoards, function(index, board){
				if(board.parent == parent){
					$('#admin-forum-sections').append('<li class="ui-state-default ui-corner-all" onclick="Admin.loadBoard('+board.id+');Admin.setTitle(\''+board.name+'\');"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'+board.name+'</li>');
				}
				
			});
			$('#forums-loader').hide();
		});
	},
	
	setTitle: function(title){
		$('#forums-current-section').html('Now viewing '+title);	
	},
	
	loadParent: function(){
		$.each(Admin.loadedBoards, function(index, board){
			if(board.id == Admin.currentParent){
				Admin.loadBoard(board.parent);
			}
		});
	}
	
}