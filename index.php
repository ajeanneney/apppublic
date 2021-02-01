<?php
//on ajoute les fonctions de la base de donnée
include("model/fonctionsBdd.php");

//on demarre les variables de session qui permettent de stocker l'id chez le client
session_start();


//rooter --> affiche la bonne page en fonction de l'utilisateur

//si l'utilisateur est connecté
if(isset($_SESSION['id'])){
	include("controller/connected.php");
}
//si il n'est pas connecté, on affiche la page de connexion
else {
    include("controller/connexion.php");
}