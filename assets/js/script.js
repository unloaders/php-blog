

$( document ).ready(function() {
	$("#button").click(function(){
		$.ajax({
			type: 'POST',
			url: 'action.php',
			data: 'email='+$("input#email").val(),
		}).success(function(response){
		
				$("#div1").text("Inscription validé");
			
		});
	});

	console.log( "ready!" );
	$('.menu').hide(400); // On masque tous les div	
	$('.span4').mouseover(function(){
			$('.menu').slideDown(800);
	});
	$('.span4').mouseleave(function(){
			$('.menu').slideUp(800);
	});
	
          
	  $('#banner-slide').bjqs({
	    animtype      : 'slide',
	    height        : 320,
	    width         : 620,
	    responsive    : true,
	    randomstart   : true
	  });


	 function ajout(id,nb)
	 {
		$.ajax({
			type: 'POST',
			url: 'actionlike.php',
			data: 'id='+id+'&nb='+nb,
		}).success(function(response){
		
				$("#div1").text("Inscription validé");
			
		});
	 } 
});