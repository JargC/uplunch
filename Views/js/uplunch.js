/**
*
*@brief Fonction attachée au bouton de connexion pour faire apparaître/disparaître la div correspondante suivant les actions de l'utilisateur
**/
function showLoginPanel(){
	var panel = document.getElementById('loginPanel');
	if(panel.style.display == "block") // Si le panel est déjà affiché on le cache lors d'un clic sur le bouton de connexion
		panel.style.display = "none";
	else
		panel.style.display = "block"; // Autrement on l'affiche

	panel = document.getElementById('inscriptionPanel');
	if(panel.style.display == "block") // On fait disparaître l'affichage du panel d'inscription lors du clic sur le bouton de connexion
		panel.style.display = "none";
}


/**
*
*@brief Fonction attachée au bouton d'inscription du panel de connexion pour faire apparaître le panel du formulaire d'inscription
**/
function showInscriptionPanel(){
	document.getElementById('inscriptionPanel').style.display = "block";
}

/**
*
*@brief JQuery gérant la disparition des panels de connexion et d'inscription si l'utilisateur clique sur autre part sur la page
**/
$(document).ready(function(){

   $(document).on('click', function() {
      $('#loginPanel').css("display","none");
      $('#inscriptionPanel').css("display","none");
   });
 
  $("#loginButton").click(function(event){
    event.stopPropagation();
  }); 

  $("#loginPanel").click(function(event){
    event.stopPropagation();
  }); 

  $("#inscriptionPanel").click(function(event){
    event.stopPropagation();
  }); 
 

 $( ".logo-parameter" ).click(function() {
		if($( ".list-parameter" ).css("display")=="none"){
			$( ".list-parameter" ).css("display","block");
		}
		else{
			$( ".list-parameter" ).css("display","none");
		}
	});
});