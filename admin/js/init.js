$(function() {
	$( "#tabs" ).tabs();
});

$(window).load(function(){
	$('#tabs-1 li:first-child').click();
});

var Admin = {
	
	showPage: function(elem, page){
		
		$.get('pages/'+page+'.php', '', function(response){
			$(elem).parent().parent().parent().find('td:last-child').html(response);
		});
		
	}
	
}