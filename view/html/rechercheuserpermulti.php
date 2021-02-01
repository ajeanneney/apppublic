<?php

session_start();
include("../../model/fonctionsBdd.php");


?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../pictures/logoSH.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/rechercheusermulti.css">



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

        <div class="formulaire">
            <form action="" method="post">

                <h2> Rechercher un utilsateur par des attributs</h2>
                <label class="titre_champ" for="prenom">Prénom :</label><br>
                <input class="champ" type="text" name="prenom" id="prenom"><br><br>

                <label class="titre_champ" for="nom">Nom :</label><br>
                <input class="champ" type="text" name="nom" id="nom"><br><br>

                <label class="titre_champ" for="mail">Adresse mail :</label><br>
                <input class="champ" type="email" name="mail" id="mail"><br><br>

                <label class="titre_champ" for="id">Id :</label><br>
                <input class="champ" type="id" name="mail" id="id"><br>

            </form>
        </div>

        <div id="liste_de_barre">
            <?php

            if(isset($POST['prenom']) || isset($POST['nom']) || isset($POST['mail']) || isset($POST['id'])){
                while ($element = $tablerecherche->fetch()){
                    $iduser=$element['id'];
                    $nom=$element['nom'];
                    $prenom=$element['prenom'];
                    ?>

                    <div class="div_barre">
                        <div class="barre_patients">

                            <div class="numéro"> n°<?=$iduser?> </div>
                            <div class="prénom"> <?=$prenom?> </div>
                            <div class="nom"> <?=$nom?> </div>
                            <div class="role"> Famille </div>


                        </div>



                    </div>
                    <?php
                }
            }
            ?>






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

