<?php

session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../pictures/logoSH.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/faq.css">
    <script type="text/javascript" src="../../view/js/fonctionsFaq.js"></script>
    <script type="text/javascript" src="../../view/js/searchBarFaq.js"></script>

    <title>Foire aux questions</title>
</head>


<?php
include("../../model/fonctionsBdd.php");

$faq = getTable("faq");
?>
<body>
<header>

    <a href="../../index.php"><img id="logoheader" src="../pictures/logoSH.png" alt="Logo Senior Healthcare"></a>
    <h1> Foire aux questions </h1>
    <div class="block_center"> </div>

</header>



<main>

    <?php


    if(isset($_SESSION['role']) ){ ?>
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
                <li class="message"><a href="../html/messagerie.php"> Consulter mes messages</a> </li>

            </ul>
        </nav>
    <?php
    }
    ?>

<div class="container">
    <ul id="faq">
    <?php
    $numerodequestion=0;

    while($element = $faq->fetch()){
        $numerodequestion+=1;
        $idquestion="idquestion".$numerodequestion;
        $idreponse="reponse".$idquestion;
        $idfleche="fleche".$idquestion;
        ?>

        <li class="cadre_faq" >
            <div class="cadre_question" id="<?=$idquestion?>" onclick="afficheMenu(this)" >
                <img id="<?=$idfleche?>" class="deroulement" src="../pictures/play.png" alt="Derouler la question">
                <h2 class="question"> <?= $element['question'] ?> </h2>
            </div>

            <div class="cadre_reponse" id="<?=$idreponse?>" style="display:none">
                <h3 class="reponse"> <?= $element['reponse'] ?> </h3>
            </div>
        </li>
    <?php
    }
    ?>
    </ul>


    <div class="boutonsbloc">
        <div class="bouton">

            <div class="padding_bouton">
                <input type="text" id="bar_recherche" onkeyup="SearchFunction()" placeholder="Recherche.." title="Chercher une question" autofocus>
            </div>

            <div class="padding_bouton"> <a class="bouton_classique" href="contactForm.php?dest=gest"> Contacter le gestionnaire </a> </div>

        </div>
    </div>

</div>
</main>

<footer>
    <?php
    include("footer.php");
    ?>
</footer>


</body>
</html>

