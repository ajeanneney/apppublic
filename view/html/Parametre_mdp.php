<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../view/pictures/logoSH.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../view/css/main.css">
    <link rel="stylesheet" href="../view/css/Parametre_mdp.css">
    <script src="../view/js/validationmdp.js"></script>
    <script type="text/javascript" src="../view/js/unhide_Parametre_mdp.js"></script>



    <title>Connexion</title>
</head>

<body>
<header>

    <a href="Parametre.php?id=0"><img id="logoheader" src="../view/pictures/logoSH.png" alt="Logo Senior Healthcare"></a>
    <h1> Modifier votre mot de passe </h1>
    <div class="block_center"> </div>

</header>

<main>
    <nav class="menu">
        <ul>
            <li class="menu_bilan"> <a class="bouton_classique" href="../index.php"> Accueil </a></li>
            <li class="faq"> <a class="bouton_classique" href="../view/html/faq.php"> F.A.Q </a></li>
            <li class="compte"><a class="bouton_classique" href="Parametre.php?id=0"> Mon Compte </a>
                <ul class="subcompte">
                    <li> <a href="Parametre.php?id=1">Mot de passe </a> </li>
                    <li> <a href="Parametre.php?id=2">Adresse mail</a> </li>
                    <li> <a href="Parametre.php?id=3">Contact </a> </li>
                    <li> <a href="Parametre.php?id=4">Déconnexion</a> </li>
                </ul>
            </li>
            <li class="message"><a href="../view/html/messagerie.php"> Consulter mes messages</a> </li>

        </ul>
    </nav>


    <form method="post" action="">
        <div class="formulaire">
            <label class="titre_champ" for="reinitialisation_mdp">Nouveau Mot de Passe<br>
                <input class="champ" type="password" name="reinitialisation_mdp" autofocus id="reinitialisation_mdp"
                       placeholder="Nouveau Mot de Passe" onkeyup="validate()">
            </label>
        </div>

        <div class="formulaire">
            <label class="titre_champ" for="confirmation_mdp">Confirmer votre Mot de Passe<br>
                <input class="champ" type="password" name="confirmation_mdp" autofocus id="confirmation_mdp"
                       placeholder="Confirmer le Mot de Passe">
            </label>
        </div>

        <div class="formulaire_check">
            <label class="titre_champ" for="hide" id="label_checkbox">Montrer le mot de passe
                <input type="checkbox" onclick="cacher()" id="hide">
                <span class="checkmark"></span>
            </label>
        </div>



        <div class="div_submit formulaire">
            <input type="submit" value="Envoyer" class="bouton_submit" onclick="submitfonction()">
            <span id="msg"></span>
        </div>



    </form>
    <div class="margin"><a class="bouton_classique" href="Parametre.php?id=5">Retour</a></div>


</main>
<footer>
<?php
include("../view/html/footer.php");
?>
</footer>


</body>

</html>