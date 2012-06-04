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
				<li><a href="#newthread-tabs-2">Reference</a></li>
				<li><a href="#newthread-tabs-3">Advanced</a></li>
			</ul>
			<div id="newthread-tabs-1">
				<div class="writethread">
					Title: <input id="newthread-title" type="text" class="text ui-corner-all jquorum-text-input newthread-title" />
					<div class="ui-widget-header ui-corner-all">
						<div class="buttonset">
							<button id="newthread-boldbtn" /><span class="ui-button-icon-primary icon-bold"></span></button>
							<button id="newthread-italicbtn" /><span class="ui-button-icon-primary icon-italic"></span></button>
							<button id="newthread-underlinebtn" /><span class="ui-button-icon-primary icon-underline"></span></button>
						</div>
					</div>
					<textarea id="newthread-text" class="text ui-corner-all jquorum-text-input"></textarea>
				</div>
				<button onclick="Threads.newThread()" style="float:right"><span class="ui-button-icon-primary icon-file"></span> Post</button>
				<button onclick="" style="float:right"><span class="ui-button-icon-primary icon-save"></span> Save</button>
				<button onclick="" style="float:right"><span class="ui-button-icon-primary icon-remove"></span> Cancel</button>
			</div>
			<div id="newthread-tabs-2"></div>
			<div id="newthread-tabs-3"></div>
		</div>
	</div>
</div>