<div id="forums" class="adminpage">
	<h3 id="forums-current-section">Now viewing Main Index</h2>
	<div id="forums-loader" class="loader"><img src="../img/loader.gif" alt="loading..." /></div>
	<ul id="admin-forum-sections">
		
	</ul>
	<hr />
	<button class="forum-section-button" onclick="$('#add-section-dialog').dialog('open')"><span class="ui-icon ui-icon-plusthick"></span>Add section</button>
	<button class="forum-section-button" id="forums-show-parentbtn" onclick="Admin.loadParent()"><span class="ui-icon ui-icon-arrowreturnthick-1-n"></span>Show Parent</button>
</div>

<div id="add-section-dialog" title="Add a new section">
	<form action="#" id="add-section-form">
		<label for="new-section-name">Section Name: </label>
		<input type="text" id="new-section-name" name="new-section-name" class="jquorum-text-input ui-corner-all" /><br />
		<label for="new-section-description">Section Description: </label>
		<input type="text" id="new-section-description" name="new-section-description" class="jquorum-text-input ui-corner-all" /><br />
		<input type="button" value="Add" style="width:100px" onclick="Admin.addForumSection()" />
	</form>
</div>

<div id="add-board-dialog" title="Add a new board">
	<form action="#" id="add-board-form">
		<label for="new-board-name">Section Name: </label>
		<input type="text" id="new-board-name" name="new-board-name" class="jquorum-text-input ui-corner-all" /><br />
		<label for="new-board-description">Section Description: </label>
		<input type="text" id="new-board-description" name="new-board-description" class="jquorum-text-input ui-corner-all" /><br />
		<input type="button" value="Add" style="width:100px" />
	</form>
</div>

<script type="text/javascript">
	
	$("#add-board-dialog, #add-section-dialog").dialog({modal: true, autoOpen: false, width: 500, draggable: false, resizable: false, show: { effect: 'drop', direction: 'up' }, hide: { effect: 'drop', direction: 'up' }});
	$( "#admin-forum-sections" ).sortable();
	$( "#admin-forum-sections" ).disableSelection();
	
</script>