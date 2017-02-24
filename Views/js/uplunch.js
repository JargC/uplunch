$(document).ready(function(){

	$( ".logo-parameter" ).click(function() {
		if($( ".list-parameter" ).css("display")=="none"){
			$( ".list-parameter" ).css("display","block");
		}
		else{
			$( ".list-parameter" ).css("display","none");
		}
	});

});