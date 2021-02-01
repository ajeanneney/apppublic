<?php
session_start();

include("../../model/fonctionsBdd.php");

$bilan = getTableByIdPatient("bilan",$_SESSION['idpatient']);

$timestamp=0;
$text='';

while ($element = $bilan->fetch()) {
    if($element['timestamp'] > $timestamp){
        $timestamp = $element['timestamp'];
        $text = $element['text'];

    }

}


?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../pictures/logoSH.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/espaceFamille.css">


    <title>Espace Famille</title>

</head>

<body>
<header>

    <a href="espaceFamille.php"><img id="logoheader" src="../pictures/logoSH.png" alt="Logo Senior Healthcare"></a>
    <h1> Votre Espace Famille </h1>
    <div class="block_center"> </div>

</header>

<nav class="menu">
    <ul>
        <li class="menu_bilan"> <a class="bouton_classique" href="../../index.php"> Accueil </a></li>
        <li class="faq"> <a class="bouton_classique" href="faq.php"> F.A.Q </a></li>
        <li class="compte"><a class="bouton_classique" href="../../controller/Parametre.php?id=0"> Mon Compte </a>
            <ul class="subcompte">
                <li> <a href="../../controller/Parametre.php?id=1">Mot de passe </a> </li>
                <li> <a href="../../controller/Parametre.php?id=2">Adresse mail</a> </li>
                <li> <a href="../../controller/Parametre.php?id=3">Contact </a> </li>
                <li> <a href="../../controller/Parametre.php?id=4">Déconnexion</a> </li>
            </ul>
        </li>
        <li class="message"><a href="../view/html/messagerie.php"> Consulter mes messages</a> </li>
    </ul>
</nav>


<main>
<div class="container">
    <div class="espace_bilan">

        <h2> Dernier Bilan du Médecin</h2>


        <p class="bilan"> <?= $text?> </p>

        <p class="divbouton">  <a class="bouton_classique" href="contactForm.php?dest=med">  Contacter le médecin  </a> </p>

    </div>

    <div class="espace_graphique" id="espacegraph">

        <label for="selection_chart"></label>
        <select id="selection_chart">
            <option value="Vue"> Stimulus Visuel</option>
            <option value="Sonore"> Stimulus Sonore</option>
            <option value="Cardiaque"> Fréquence Cardiaque</option>

        </select>



        <div id="chartContainer0" style=""></div>

        <div id="chartContainer1" style=""></div>

        <div id="chartContainer2" style=""></div>

    </div>



</div>
</main>

<footer>
    <?php
    include("footer.php");
    ?>
</footer>

</body>
<script src="../../view/js/bibliothequeGraphique.js"></script>
<script src="../../controller/JSaffichagegraphique.php"></script>
<script src="../../view/js/gestionGraphique.js"></script>


</html>


