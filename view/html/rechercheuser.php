<?php

session_start();
include("../../model/fonctionsBdd.php");
$tablefamille = getTable("famille");
$tablegestionnaire = getTable("gestionnaire ");
$tablemedecin = getTable("medecin");
$tablepatient = getTable("patient");


?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../pictures/logoSH.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/rechercheuser.css">
    <script type="text/javascript" src="../js/searchuser.js"></script>


    <title>Recherche d'un utilisateur</title>

</head>

<body>
<header>

    <a href="../../index.php"><img id="logoheader" src="../pictures/logoSH.png" alt="Logo Senior Healthcare"></a>
    <h1> Recherche d'un utilisateur </h1>
    <div class="block_center"> </div>

</header>

<main>


    <nav class="menu">
        <ul>
            <li class="menu_bilan"> <a class="bouton_classique" href="../../index.php"> Accueil </a></li>
            <li class="faq"> <a class="bouton_classique" href="../html/faq.php"> F.A.Q </a></li>
            <li class="compte"><a class="bouton_classique" href="../../controller/Parametre.php?id=0"> Mon Compte </a>
                <ul class="subcompte">
                    <li> <a href="../../controller/Parametre.php?id=1">Mot de passe </a> </li>
                    <li> <a href="../../controller/Parametre.php?id=2">Adresse mail</a> </li>
                    <li> <a href="../html/contactForm.php?dest=gest">Contact </a> </li>
                    <li> <a href="../../controller/Parametre.php?id=4">Déconnexion</a> </li>
                </ul>
            </li>
            <li class="message"><a href="../view/html/messagerie.php"> Consulter mes messages</a> </li>

        </ul>
    </nav>

    <div class="container">

        <div id="liste_de_barre">
            <?php
            while ($element = $tablefamille->fetch()){
                $iduser=$element['iduser'];
                $id=$element['id'];
                $nom=$element['nom'];
                $prenom=$element['prenom'];
                ?>

                <div class="div_barre">
                    <div class="barre_patients">
                        <?php $lien = '../../controller/supprimerUser.php?id='.urlencode($iduser).'&role=famille&nom='.urlencode($nom)."&prenom=".urlencode($prenom) ?>
                        <div class="suppresion"><a href=<?=$lien ?>>X</a></div>
                        <div class="numéro"> n°<?=$id?> </div>
                        <div class="prénom"> <?=$prenom?> </div>
                        <div class="nom"> <?=$nom?> </div>
                        <div class="role"> Famille </div>


                    </div>



                </div>
                <?php
            }
            ?>

            <?php
            while ($element = $tablegestionnaire->fetch()){
                $iduser=$element['iduser'];
                $id=$element['id'];
                $nom=$element['nom'];
                $prenom=$element['prenom'];
                ?>

                <div class="div_barre">
                    <div class="barre_patients">
                        <?php $lien = '../../controller/supprimerUser.php?id='.$iduser.'&role=gestionnaire&nom='.$nom."&prenom=".$prenom ?>
                        <div class="suppresion"><a href=<?=$lien ?>>X</a></div>
                        <div class="numéro"> n°<?=$id?> </div>
                        <div class="prénom"> <?=$prenom?> </div>
                        <div class="nom"> <?=$nom?> </div>
                        <div class="role"> Gestionnaire </div>

                    </div>



                </div>
                <?php
            }
            ?>

            <?php
            while ($element = $tablemedecin->fetch()){
                $iduser=$element['iduser'];
                $id=$element['id'];
                $nom=$element['nom'];
                $prenom=$element['prenom'];
                ?>

                <div class="div_barre">
                    <div class="barre_patients">
                        <?php $lien = '../../controller/supprimerUser.php?id='.urlencode($iduser).'&role=medecin&nom='.urlencode($nom)."&prenom=".urlencode($prenom) ?>
                        <div class="suppresion"><a href=<?=$lien ?>>X</a></div>
                        <div class="numéro"> n°<?=$id?> </div>
                        <div class="prénom"> <?=$prenom?> </div>
                        <div class="nom"> <?=$nom?> </div>
                        <div class="role"> Medecin </div>


                    </div>

                </div>
                <?php
            }
            ?>

            <?php
            while ($element = $tablepatient->fetch()){
                $iduser=$element['id'];
                $nom=$element['nom'];
                $prenom=$element['prenom'];
                ?>

                <div class="div_barre">
                    <div class="barre_patients">
                        <?php $lien = '../../controller/supprimerUser.php?id='.urlencode($iduser).'&role=patient&nom='.urlencode($nom)."&prenom=".urlencode($prenom) ?>
                        <div class="suppresion"><a href=<?=$lien ?>>X</a></div>
                        <div class="numéro"> n°<?=$iduser?> </div>
                        <div class="prénom"> <?=$prenom?> </div>
                        <div class="nom"> <?=$nom?> </div>
                        <div class="role"> Patient </div>


                    </div>

                </div>
                <?php
            }
            ?>





        </div>

        <div class="espace_contact">

            <div class="padding_bouton">
                <input type="text" id="bar_recherche" onkeyup="SearchFunction()" placeholder="Recherche.." title="Chercher une question" autofocus>
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

