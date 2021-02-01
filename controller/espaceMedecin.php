<?php

session_start();

//include les fonctions utilisés
include("../model/fonctionsBdd.php");
include('../model/fonctionsDeDate.php');


//récupération de la table utile
$table=getTableByIduser("medecin",$_SESSION['id']);


// création des variables utiles
while ($element = $table->fetch()){
    $_SESSION['idmedecin']= $element['id'];
}

$idpatient=$_SESSION['idpatient'];



//Si un nouveau bilan a été ecrit
if($idpatient>0){
    if (isset($_POST["Redaction_de_Bilan"])){
        $text=$_POST["Redaction_de_Bilan"];

        //ajouter le bilan
        AddBilan($idpatient,$text);

    }

}


//modifier les pastilles
couleurpastille($_SESSION['idmedecin']);

//Sélection de la page a rediriger l apage de choix de patients ou de détail de patient

if ($_GET['id']>0){
	include('../view/html/medecin_detailPatient.php');

}else{
	include('../view/html/medecins_selection.php');
}











