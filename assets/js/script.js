$( document ).ready(function() {
	console.log( "ready!" );
	$('ul').hide(400); // On masque tous les div	
	$('.span4').hover(function(){
		if($('ul').is(':visible')){
			$('ul').hide(400);
		}else{
			$('ul').slideUp(800).fadeIn(1000);
		}
	});

});