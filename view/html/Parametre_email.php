<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../view/pictures/logoSH.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../view/css/main.css">
    <link rel="stylesheet" href="../view/css/Parametre_mdp.css">
    <script src="../view/js/validationemail"></script>



    <title>Connexion</title>
</head>

<body>
<header>

    <a href="Parametre.php?id=0"><img id="logoheader" src="../view/pictures/logoSH.png" alt="Logo Senior Healthcare"></a>
    <h1> Modifier votre Email </h1>
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
            <label class="titre_champ" for="reinitialisation_Email">Nouveau Mail<br>
                <input class="champ" type="text" name="reinitialisation_Email" autofocus id="reinitialisation_Email"
                       placeholder="Nouveau Mail">
            </label>
        </div>

        <div class="formulaire">
            <label class="titre_champ" for="confirmation_Email">Confirmer votre Mail<br>
                <input class="champ" type="text" name="confirmation_Email" autofocus id="confirmation_Email"
                       placeholder="Confirmer le Mail">
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