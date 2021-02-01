<?php

session_start();

//include les fonctions utilisés
include("../model/fonctionsBdd.php");

$id=$_GET['id'];
$iduser=$_SESSION['id'];



if ($id==0){
    //Regarder s'il y a eu un changement de mdp ou de mail
    if (isset($_POST["reinitialisation_Email"]) and isset($_POST["reinitialisation_Email"])){
        // regarder la ressemblance

        if ($_POST["reinitialisation_Email"]===$_POST["reinitialisation_Email"]){
            ModifieMailbyId($_POST["reinitialisation_Email"],$iduser);

        }

    }elseif(isset($_POST["confirmation_mdp"]) and isset($_POST["reinitialisation_mdp"])){
        // regarder la ressemblance
        if ($_POST["confirmation_mdp"]===$_POST["reinitialisation_mdp"]){
                ModifieMotdePassebyId($_POST["reinitialisation_mdp"],$iduser);

        }

    }

    //include page principale des paramètres
    include("../view/html/Parametre_principale.php");

}elseif($id==1){
    //include modifier mot de passe
    include("../view/html/Parametre_mdp.php");
}elseif($id==2){
    //include modifier l'adresse mail
    include("../view/html/Parametre_email.php");
}elseif($id==3){
    //include contact du support
    header("Location:../view/html/contactForm.php?dest=gest");
}elseif($id==4){
    //Se deconnecter
    header("Location: deconnexion.php");

}else{
    //include page principale des paramètres
    include("../view/html/Parametre_principale.php");
}
