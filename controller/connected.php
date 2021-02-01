<?php

echo "<br><a href='controller/deconnexion.php'>deconnexion</a><br>";

if($_SESSION['role'] == 'medecin'){
    $_SESSION['idpatient']=0;
	header("Location: controller/espaceMedecin.php?id=0");
}
elseif ($_SESSION['role'] == 'famille') {
    header("Location: view/html/espaceFamille.php");

}
elseif ($_SESSION['role'] == 'administrateur') {
    echo "connecté admin";
}

elseif ($_SESSION['role'] == 'gestionnaire') {
    header("Location: controller/gestionnaire.php");
}

