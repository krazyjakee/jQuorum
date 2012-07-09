<?php
	function dialog_buttonset($textarea){
		return @"<div class=\"buttonset\">
					<button id=\"".$textarea."-boldbtn\" onclick=\"BBCode.wrapSelectedText('#".$textarea."-text','[b]','[/b]')\"><span class=\"ui-button-icon-primary icon-bold\"></span></button>
			
					<button id=\"".$textarea."-italicbtn\" onclick=\"BBCode.wrapSelectedText('#".$textarea."-text','[i]','[/i]')\"><span class=\"ui-button-icon-primary icon-italic\"></span></button>
					
					<button id=\"".$textarea."-underlinebtn\" onclick=\"BBCode.wrapSelectedText('#".$textarea."-text','[u]','[/u]')\"><span class=\"ui-button-icon-primary icon-underline\"></span></button>
				</div>
				
				<div class=\"buttonset\">
					<button id=\"".$textarea."-alignleft\" onclick=\"BBCode.wrapSelectedText('#".$textarea."-text','[left]','[/left]')\"><span class=\"ui-button-icon-primary icon-align-left\"></span></button>
					
					<button id=\"".$textarea."-aligncenter\" onclick=\"BBCode.wrapSelectedText('#".$textarea."-text','[center]','[/center]')\"><span class=\"ui-button-icon-primary icon-align-center\"></span></button>
					
					<button id=\"".$textarea."-alignright\" onclick=\"BBCode.wrapSelectedText('#".$textarea."-text','[right]','[/right]')\"><span class=\"ui-button-icon-primary icon-align-right\"></span></button>
				</div>
				
				<div class=\"buttonset\">
					<button id=\"".$textarea."-list\" onclick=\"BBCode.wrapSelectedText('#".$textarea."-text','[list]','[/list]')\"><span class=\"ui-button-icon-primary icon-list-ul\"></span></button>
					
					<button id=\"".$textarea."-item\" onclick=\"BBCode.wrapSelectedText('#".$textarea."-text','[item]','[/item]')\"><span class=\"ui-button-icon-primary icon-certificate\"></span></button>
				</div>
				";
	}
?>
<div class="dialogs-container">
	<div id="register-dialog" title="Register">
		<small>In order to register we need a few details from you. Please fill in the form below and we will email you instructions on how to activate your account.<br />Hover over anything you don't understand for more information.</small><br /><hr />
		<form id="register-form" action="" method="post">
			<label for="register_username">Username: </label>
			<input type="text" id="register_username" name="register_username" /><hr />
			
			<label for="register_password1">Password: </label>
			<input type="password" id="register_password1" name="register_password1" /><br />
			<label for="register_password2">Password Confirm: </label>
			<input type="password" id="register_password2" name="register_password2" /><hr />
			
			<label for="register_email1">Email: </label>
			<input type="text" id="register_email1" name="register_email1" /><br />
			<label for="register_email2">Email Confirm: </label>
			<input type="text" id="register_email2" name="register_email2" /><hr />
			
			<label for="register_referrer">Referrer: </label>
			<input type="text" id="register_referrer" name="register_referrer" /><br /><hr />
			
			<label for="register_rulebox">Rules: </label>
			<textarea rows="6" id="register_rulebox"></textarea><br />
			<label for="register_rules" class="checkbox_label"><input type="checkbox" name="register_rules" id="register_rules">Do you agree to abide by these rules?</label><hr />
			
			<b>Captcha:</b>
			 <script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6Le4AdISAAAAAAJxxu5XUqBol_rDCm5lyhwPNys4"></script>
			  <noscript>
			     <iframe src="http://www.google.com/recaptcha/api/noscript?k=6Le4AdISAAAAAAJxxu5XUqBol_rDCm5lyhwPNys4"
			         height="300" width="500" frameborder="0"></iframe><br>
			     <textarea name="recaptcha_challenge_field" rows="3" cols="40">
			     </textarea>
			     <input type="hidden" name="recaptcha_response_field" value="manual_challenge">
			  </noscript><hr />
			  <input type="button" value="Reset Form" />
			  <input type="submit" value="Register" />
	  
		</form>
	</div>
	
	<div id="newthread-dialog" title="New Thread">
		<div id="newthread-tabs">
			<ul>
				<li><a href="#newthread-tabs-1">Write</a></li>
				<li><a href="#newthread-tabs-2">Advanced</a></li>
			</ul>
			<div id="newthread-tabs-1">
				<div class="writethread">
					Title: <input id="newthread-title" type="text" class="text ui-corner-all jquorum-text-input newthread-title" />
					<div class="ui-widget-header ui-corner-all">
						<? echo dialog_buttonset("newthread"); ?>
					</div>
					<textarea id="newthread-text" class="text ui-corner-all jquorum-bbcode-input"></textarea>
				</div>
				<button onclick="Threads.newThread()" style="float:right"><span class="ui-button-icon-primary icon-file"></span> Post</button>
				<button onclick="" style="float:right"><span class="ui-button-icon-primary icon-save"></span> Save</button>
				<button onclick="Interface.hideNewThreadDialog()" style="float:right"><span class="ui-button-icon-primary icon-remove"></span> Cancel</button>
			</div>
			<div id="newthread-tabs-2"></div>
		</div>
	</div>
	
	<div id="newpost-dialog" title="New Post">
		<div id="newpost-tabs">
			<ul>
				<li><a href="#newpost-tabs-1">Write</a></li>
				<li><a href="#newpost-tabs-2">Reference</a></li>
				<li><a href="#newpost-tabs-3">Advanced</a></li>
			</ul>
			<div id="newpost-tabs-1">
				<div class="writethread">
					Title:<b id="newpost-title"></b>
					<div class="ui-widget-header ui-corner-all">
						<? echo dialog_buttonset("newpost"); ?>
					</div>
					<textarea id="newpost-text" class="text ui-corner-all jquorum-bbcode-input"></textarea>
				</div>
				<button onclick="Posts.newPost()" style="float:right"><span class="ui-button-icon-primary icon-file"></span> Post</button>
				<button onclick="" style="float:right"><span class="ui-button-icon-primary icon-save"></span> Save</button>
				<button onclick="Interface.hideNewPostDialog()" style="float:right"><span class="ui-button-icon-primary icon-remove"></span> Cancel</button>
			</div>
			<div id="newpost-tabs-2"></div>
			<div id="newpost-tabs-3"></div>
		</div>
	</div>
	
	<div id="editpost-dialog" title="Edit Post">
		<div id="editpost-tabs">
			<ul>
				<li><a href="#editpost-tabs-1">Write</a></li>
				<li><a href="#editpost-tabs-2">Reference</a></li>
				<li><a href="#editpost-tabs-3">Advanced</a></li>
			</ul>
			<div id="editpost-tabs-1">
				<div class="writethread">
					Title:<b id="editpost-title"></b><input id="editpost-title-input" type="text" class="text ui-corner-all jquorum-text-input newthread-title" />
					<div class="ui-widget-header ui-corner-all">
						<? echo dialog_buttonset("editpost"); ?>
					</div>
					<textarea id="editpost-text" class="text ui-corner-all jquorum-bbcode-input"></textarea>
				</div>
				<button onclick="Posts.editPost()" style="float:right"><span class="ui-button-icon-primary icon-save"></span> Update</button>
				<button onclick="Interface.hideEditPostDialog()" style="float:right"><span class="ui-button-icon-primary icon-remove"></span> Cancel</button>
			</div>
			<div id="editpost-tabs-2"></div>
			<div id="editpost-tabs-3"></div>
		</div>
	</div>
</div>