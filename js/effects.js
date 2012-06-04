var Effects = {
	Transitions: {
		
		basic: function(a,b,callback){
			$(a).hide();
			$(b).show();
			if(callback){ callback(); }
		},
		
		fade: function(a,b,speed,callback){
			$(a).fadeOut(speed, function(){
				$(b).fadeIn(speed, function(){
					if(callback){ callback(); }
				});
			});
		},
		
		iShuffle: function(a,b,callback){
			$(a).resetKeyframe(function(){
				$(b).resetKeyframe(function(){
					$(a).playKeyframe('transition-iShuffleA 1000 ease 0 1 normal forwards');
					$(b).show();
					if($(b).position().top > $(a).position().top){
						$(b).css('margin-top','-'+$(a).height()+'px');
					}else{
						$(a).css('margin-top','-'+$(b).height()+'px');
					}
					$(b).playKeyframe('transition-iShuffleB 1000 ease 0 1 normal forwards',function(){
						$(a).hide();
						$(b).css('margin-top','0px');
						$(a).css('margin-top','0px');
						if(callback){ callback(); }
					});
				});
			});
		},
		
		zoom: function(a,b,callback){
			$(a).resetKeyframe(function(){
				$(b).resetKeyframe(function(){
					$(a).playKeyframe('transition-zoomA 400 ease 0 1 normal forwards',function(){
						$(a).hide(); $(b).show();
						$(b).playKeyframe('transition-zoomB 400 ease 0 1 normal forwards',function(){
							if(callback){ callback(); }
						});
					});
				});
			});
		},
		
		morphSpin: function(a,b,callback){
			$(a).resetKeyframe(function(){
				$(b).resetKeyframe(function(){
					$(a).playKeyframe('transition-morphSpinA 1000 ease 0 1 normal forwards',function(){
						$(a).hide();
					});
					$(b).show();
					if($(b).position().top > $(a).position().top){
						$(b).css('margin-top','-'+$(a).height()+'px');
					}else{
						$(a).css('margin-top','-'+$(b).height()+'px');
					}
					$(b).playKeyframe('transition-morphSpinB 1000 ease 0 1 normal forwards',function(){
						$(b).css('margin-top','0px');
						$(a).css('margin-top','0px');
						if(callback){ callback(); }
					});
				});
			});
		}
		
	}
}

$(window).load(function(){
	var browser = $.keyframe.browserCode();
	$.fn.addKeyframe([{
	    name: "transition-iShuffleA",
	    "0%": browser+"transform:scale(1.0);margin-left:0px",
	    "50%": "transform:scale(0.5);margin-left:-200px",
	    "100%": browser+"transform:scale(0.0);margin-left:0px"
	},{
	    name: "transition-iShuffleB",
	    "0%": browser+"transform:scale(0.0);margin-left:0px",
	    "50%": browser+"transform:scale(0.5);margin-left:200px",
	    "100%": browser+"transform:scale(1.0);margin-left:0px"
	},{
		name: "transition-zoomA",
	    "from": browser+"transform:scale(1.0)",
	    "to": browser+"transform:scale(0.0)"
	},{
		name: "transition-zoomB",
	    "from": browser+"transform:scale(0.0)",
	    "to": browser+"transform:scale(1.0)"
	},{
		name: "transition-morphSpinA",
	    "from": browser+"transform:rotate(0deg);opacity:1.0",
	    "to": browser+"transform:rotate(360deg);opacity:0.0"
	},{
		name: "transition-morphSpinB",
	    "from": browser+"transform:rotate(-360deg);opacity:0.0",
	    "to": browser+"transform:rotate(0deg);opacity:1.0"
	}]);
});