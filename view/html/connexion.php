<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="view/pictures/logoSH.ico" type="image/x-icon" />
    <link rel="stylesheet" href="view/css/main.css">
    <link rel="stylesheet" href="view/css/connexion.css">
    <script type="text/javascript" src="view/js/unhide.js"></script>

    <title>Connexion</title>
</head>

<body>
<header>

    <a href="./"><img id="logoheader" src="view/pictures/logoSH.png" alt="Logo Senior Healthcare"></a>
    <h1> Connexion à votre Espace </h1>

</header>

<main>

    <?php
    if (isset($_GET["newpwd"])) {
        if ($_GET["newpwd"] == "passwordupdated") {
            echo '<p class="confirmation">Votre mot de passe a été configuré !</p>';
        }
    }
    ?>

    <form method="post" action="">
        <div class="formulaire">
            <label class="titre_champ" for="Adresse_email">Adresse email :<br>
                <input class="champ" type="text" name="login_user_mail" autofocus id="Adresse_email"
                       placeholder="Adresse email">
            </label>
        </div>

        <div class="formulaire">
            <label class="titre_champ" for="mdp">Mot de passe : <br>
                <input class="champ" type="password" name="login_user_mdp" id="mdp" placeholder="Mot de passe">
            </label>
        </div>

        <div class="formulaire_check">
            <label class="titre_champ" for="hide" id="label_checkbox">Montrer le mot de passe
                <input type="checkbox" onclick="cacher()" id="hide">
                <span class="checkmark"></span>
            </label>
        </div>

        <div class="div_submit formulaire">
            <input type="submit" value="Connexion" class="bouton_submit">
        </div>

    </form>

    <p class="div_faq"><a class="bouton_classique" href="view/html/reinitmdp.php">Mot de passe oublié</a></p>

    <p class="div_faq"><a class="bouton_classique" href="view/html/faq.php">Consulter la F.A.Q</a></p>

</main>
<footer>
    <div class="information">
        <nav class="nav_footer"> <a href="view/html/CGU.php"> Mentions légales </a> </nav>
    </div>

    <div class="information">
        <nav class="nav_footer"> <a href=""> Site de l'EPHAD</a> </nav>
    </div>

    <div class="information">
        <nav class="nav_footer"> Par Senior Healthcare pour Infinite Measures :
               <p><a href='mailto:contact.senior.health.care@gmail.com'>Contacter le gestionnaire</a></p>

        </nav>
    </div>
</footer>


</body>

</html>