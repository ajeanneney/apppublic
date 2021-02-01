<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../view/pictures/logoSH.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../view/css/main.css">
    <link rel="stylesheet" href="../view/css/parametre_principale.css">


    <title>Mon Compte</title>

</head>

<body>
<header>

    <a href="../index.php"> <img id="logoheader" src="../view/pictures/logoSH.png" alt="Logo Senior Healthcare"> </a>
    <h1> Gérer votre compte </h1>
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

    <div class="container">
        <div class="espace_boutons">

            <div class="fond"> <a class="bouton" href="Parametre.php?id=1">Modifier votre mot de passe</a> </div>

            <div class="fond"> <a class="bouton" href="Parametre.php?id=2">Modifier votre adresse mail</a> </div>

            <div class="fond"> <a class="bouton" href="Parametre.php?id=3">Contacter le gestionnaire</a> </div>

            <div class="fond"> <a class="bouton" href="Parametre.php?id=4">Se déconnecter</a> </div>


        </div>

        <div class="espace">
            <div class=""><a class="bouton_classique" href="../">Retour</a></div>

        </div>


    </div>





</main>
<footer>
    <?php
    include("../view/html/footer.php")
    ?>
</footer>
</body>
</html>
