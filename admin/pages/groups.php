<?php include "../../config.php"; ?>
<div id="groups" class="adminpage">
	<div id="groups-accordion">
		<h3><a href="#">Groups</a></h3>
		<div>
			<p>
				<small>Choose a group to edit the permissions for.</small>
				<ul id="admin-editpermissions-groups" class="ui-selectable">
					<?php
						$result = mysql_query("select * from groups") or die(mysql_error());
						$groups = array();
						while(($line = mysql_fetch_assoc($result)) != null){
							array_push($groups,$line);
							echo "<li class=\"ui-widget-content\" data=\"".$line['id']."\">".$line['name']."</li>";
						}
					?>
				</ul>
			</p>
		</div>
		<h3><a href="#">Permissions</a></h3>
		<div>
			<p>
				<small>Select a permission to apply to selected boards.</small>
				<ul id="admin-editpermissions-permissions">
					<li class="ui-widget-content" data="read" title="Be able to read the contents of a board include thread titles.">Read</li>
					<li class="ui-widget-content" data="write" title="Be able to create and reply to threads.">Write</li>
					<li class="ui-widget-content" data="edit" title="Be able to edit their own posts.">Edit</li>
					<li class="ui-widget-content" data="delete" title="Be able to edit their own posts and threads">Delete</li>
					<li class="ui-widget-content" data="editall" title="Be able to edit other peoples posts">Edit All</li>
					<li class="ui-widget-content" data="deleteall" title="Be able to delete other peoples posts">Delete All</li>
				</ul>
			</p>
			<p><small>When you're done, click "Applies to" below to select boards.</small></p>
		</div>
		<h3><a href="#">Applies to</a></h3>
		<div>
			<p>
				<small>The permissions you chose above will be enabled for the group on the boards you select below.</small>
				<ul id="admin-editpermissions-boards">
					<?php
						// TOFIX: Needs to be ordered correctly.
						$result = mysql_query("select * from boards order by sortorder");
						$boards = array();
						while(($line = mysql_fetch_assoc($result)) != null){
							array_push($boards,$line);
							if($line['parent'] == 0){
								echo "<li class=\"ui-widget-content\" data=\"".$line['id']."\">".$line['name']."</li>";
							}else{
								echo "<li class=\"ui-widget-content\" data=\"".$line['id']."\">--> ".$line['name']."</li>";
							}
						}
					?>
				</ul>
			</p>
			<p><button onclick="">Save Permissions</button></p>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#groups-accordion').accordion({
		disabled:true,
		autoHeight:false
	});
	$('#admin-editpermissions-groups li').click(function(){
		$('#admin-editpermissions-groups li').removeClass('ui-state-hover');
		$(this).addClass('ui-state-hover');
		var adminSelectedGroupId = $(this).attr('data');
		$('#groups-accordion h3:eq(1)').find('a').html('Permissions for ' + $(this).html());
		$('#groups-accordion').accordion('enable');
		$('#groups-accordion').accordion('activate',1);
	});
	$('#admin-editpermissions-permissions').selectable({
		selecting: function(event,ui){
			$(ui.selecting).addClass('ui-state-hover');
		},
		selected: function(event,ui){
			$(ui.selected).addClass('ui-state-hover');
		},
		unselecting: function(event,ui){
			$(ui.unselecting).removeClass('ui-state-hover');
		}
	});
	$('#admin-editpermissions-boards').selectable({
		selecting: function(event,ui){
			$(ui.selecting).addClass('ui-state-hover');
		},
		selected: function(event,ui){
			$(ui.selected).addClass('ui-state-hover');
		},
		unselecting: function(event,ui){
			$(ui.unselecting).removeClass('ui-state-hover');
		}
	});
	
	var admin_forum_groups = <?php echo json_encode($groups); ?>;
	var admin_forum_boards = <?php echo json_encode($boards); ?>;
</script>