var AJAX = {
	
	login: function(username,password){
		$.ajax({
			url: '/ajax/users.php',
			data: 'do=login&username='+username+'&password='+password,
			type: 'post',
			success: function(json){
				if(json){
					json = eval('('+json+')');
					Interface.doLogin(json);
				}else{
					alert('Login error');
				}
			}
		});
	},
	
	qlogin: function(){
		$.ajax({
			url: '/ajax/users.php',
			data: 'do=qlogin',
			type: 'post',
			success: function(json){
				if(json != ''){
					json = eval('('+json+')');
					Interface.doLogin(json);
				}
			}
		});
	},
	
	logout: function(){
		$.ajax({
			url: '/ajax/users.php',
			data: 'do=logout',
			type: 'post'
		});
	},
	
	register: function(username,password,email,referrer){
		$.ajax({
			url: '/ajax/users.php',
			data: 'do=register&username='+username+'&password='+password+'&email='+email+'&referrer='+referrer,
			type: 'post',
			success: function(json){
				if(json){
					switch(json){
						case 'email': alert('The email is invalid.'); break;
						case 'username': alert('The username is taken.'); break;
						default: json = eval('('+json+')');
						Interface.doLogin(json); break;
					}
				}else{
					alert('Register error!');
				}
			}
		});
	}
	
}