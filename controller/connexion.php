<?php
//Si on recoit les donnees du formulaire de connexion
if(isset($_POST['login_user_mail']) && isset($_POST['login_user_mdp'])){
	$identifiant = $_POST['login_user_mail'];
	$mdp = $_POST['login_user_mdp'];
	$users = getTable('user');
	while($user = $users->fetch()){
		if($identifiant == $user['mail']){
			if(password_verify($mdp, $user['password'])){
				//on met en variable de session l'id de l'utilisateur
				$_SESSION['id'] = $user['id'];
				$_SESSION['role'] = $user['role'];

				// recuperer l'id patient si c'est une famille
				if($user['role'] == 'famille'){
					$familles = getTable('famille');
					while($famille = $familles->fetch()){
						if($user['id'] == $famille['iduser']){
							$_SESSION['idpatient'] = $famille['idpatient'];
						}
					}
				}
				break;
			}
			else{
				// mauvais mot de passe
				$connection = false;
				$codeErreur = 0;
				// gerer les erreurs
				break;
			}
		}
		else{
			// mauvais identifiant
			$connection = false;
			$codeErreur = 1;
			// gerer les erreurs
		}
	}
}

if(isset($_SESSION['id'])){
	include("controller/connected.php");
}

else{
	include("view/html/connexion.php");
}