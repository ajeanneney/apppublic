<?php
include('../model/fonctionsBdd.php');
include('../model/fonctionsMail.php');

function sendLink($userMail, $userPrenom, $userNom){
	$selecteur = bin2hex(random_bytes(8));
	$token = random_bytes(32);
	$url = "localhost/appisep/view/html/creationmdp.php?selecteur=" . $selecteur . "&validator=" . bin2hex($token);
	$expires = date("U") + 1800;
	$hashedToken = password_hash($token, PASSWORD_DEFAULT);

	deleteResetMdpByMail($userMail);
    addResetMdp($userMail, $selecteur, $hashedToken, $expires);

    $subject = 'Configurez votre mot de passe pour Senior Heatlhcare';

    $message = "<p>Bonjour ".$userPrenom." ".$userNom.",</p>";
    $message .= "<p>Un compte à été créé pour vous sur Senior Heatlhcare, cliquez sur le lien ci dessous pour créer votre mot de passe :</p>";
    $message .= '<p><a href="' . $url . '">' . $url . '</a></p>';
    $message .= '<p>Merci de votre confiance et à bientôt !</p>';
    sendMail($userMail, $subject, $message);
}

// form d'ajout question
if(isset($_POST['question']) && isset($_POST['reponse'])){
	addElementFaq($_POST['question'], $_POST['reponse']);
}

// form ajout user
else if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['role'])){
	$listeRoles  = array('medecin', 'patient', 'gestionnaire', 'famille');
	if(in_array($_POST['role'], $listeRoles)){
		// on separe en fonction des roles
		// la fonction addUser() renvoi l'id inséré
		if($_POST['role'] == 'gestionnaire' && isset($_POST['mail'])){
			$infoUser = addUser($_POST['mail'], $_POST['role']);
			addGest($infoUser[0], $_POST['nom'], $_POST['prenom']);
			// sendMail($_POST['mail'], "Bienvenue sur Senior Health Care !", "Votre mot de passe est : " . $infoUser[1]);
			sendLink($_POST['mail'], $_POST['prenom'], $_POST['nom']);
		}
		else if($_POST['role'] == 'medecin' && isset($_POST['mail'])){
			$infoUser = addUser($_POST['mail'], $_POST['role']);
			addMedecin($infoUser[0], $_POST['nom'], $_POST['prenom']);
			// sendMail($_POST['mail'], "Bienvenue sur Senior Health Care !", "Votre mot de passe est : " . $infoUser[1]);
			sendLink($_POST['mail'], $_POST['prenom'], $_POST['nom']);
		}
		else if($_POST['role'] == 'famille' && isset($_POST['mail'])){
			if(isset($_POST['patient'])){ //on verifie que la FK existe
				$infoUser = addUser($_POST['mail'], $_POST['role']);
				addFamille($infoUser[0], $_POST['patient'], $_POST['nom'], $_POST['prenom']);
				// sendMail($_POST['mail'], "Bienvenue sur Senior Health Care !", "Votre mot de passe est : " . $infoUser[1]);
				sendLink($_POST['mail'], $_POST['prenom'], $_POST['nom']);
			}
		}
		else if($_POST['role'] == 'patient'){
			// gerer format date naissance
			if(isset($_POST['medecin']) && isset($_POST['naissance'])){ //on recupere la fk et la date de naissance
				addPatient($_POST['medecin'], $_POST['nom'], $_POST['prenom'], $_POST['naissance']);
			}
		}
		else{
			echo('error');
		}
	}
}

include("../view/html/gestionnaire.php");