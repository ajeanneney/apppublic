<?php
	include('../model/fonctionsBdd.php');
	if(isset($_GET['id']) && isset($_GET['role']) && isset($_GET['prenom']) && isset($_GET['nom'])){

		if($_GET['role'] == 'patient'){
			delete('patient', intval($_GET['id']));
		}
		else if($_GET['role'] =='medecin'){
			delete('user', intval($_GET['id']));
		}
		else if($_GET['role'] == 'gestionnaire'){
			delete('user', intval($_GET['id']));
		}
		else if($_GET['role'] == 'famille'){
			delete('user', intval($_GET['id']));
		}
		else{
			echo "erreur dans l'url";
		}
	}

	header('Location: ../view/html/rechercheuser.php');
	// mettre une alert au début de la page
?>