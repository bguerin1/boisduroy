function validationMotDePasse(mdpAVerifier)
{
	let reponse=false;	
	if (mdpAVerifier.match( /[0-9]/g) &&                // Il y a un chiffre
			mdpAVerifier.match( /[A-Z]/g) &&            // Il y a une majuscule
			mdpAVerifier.match(/[a-z]/g) &&             // il y a une minuscule 
			mdpAVerifier.match( /[^a-zA-Z\d]/g))        // il y a un caractère spécial
	{
		reponse=true;
	}
	return(reponse);
}

// Ecouteur permettant de valider complètement le formulaire de connexion au moment du submit
// Si au moins un des champs n'est pas correctement renseigné, le formulaire n'est pas soumis

document.addEventListener('DOMContentLoaded', function() {
	let formInsc  = document.getElementById('formConnexion');
	// on ajoute une écoute sur l'évennement submit du formulaire
	formInsc.addEventListener("submit", function (event) {
		let inscriptionValide = true;
		// On vide les messages d'erreurs
		document.getElementById("form1LoginError").className="";
		document.getElementById("form1MdpError").className = "";
		document.getElementById("form1LoginError").innerHTML="";
		document.getElementById("form1MdpError").innerHTML = "";
		// A On vérifie si un mot de passe est saisi
		if (document.getElementById("form1Mdp").value=="")
		{
			errorHTML="Vous devez saisir un mot de passe !";
			document.getElementById("form1MdpError").innerHTML = errorHTML
			document.getElementById("form1MdpError").className="formErrorMsg";
			inscriptionValide=false;
		}
		// Si un des champs n'est pas valide on prévient la soumission du formulaire
		// On reste sur la page d'accueil
		if (!inscriptionValide) {
			event.preventDefault();
		}
	}, false);
});


