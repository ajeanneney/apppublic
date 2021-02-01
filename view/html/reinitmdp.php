<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../view/pictures/logoSH.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../../view/css/main.css">
    <link rel="stylesheet" href="../../view/css/connexion.css">
    <script type="text/javascript" src="../../view/js/unhide.js"></script>

    <title>Réinitialiser votre MDP</title>
</head>

<body>
<header>

    <a href="../../index.php"><img id="logoheader" src="../../view/pictures/logoSH.png" alt="Logo Senior Healthcare"></a>
    <h1> Réinitialisation de votre mot de passe </h1>

</header>

<main>
    <form method="post" action="../../controller/requeteReinitialisation.php">
        <div class="formulaire">
            <label class="titre_champ" for="Adresse_email">Entrez votre adresse mail :<br>
                <input class="champ" type="text" name="reinit_user_mail" autofocus id="Adresse_email"
                       placeholder="Adresse email de votre compte">
            </label>
        </div>

        <div class="div_submit formulaire">
            <input type="submit" name="submit_requete_reinit" value="Envoyer" class="bouton_submit">
        </div>
    </form>

    <?php
    if (isset($_GET["reset"])) {
        if ($_GET["reset"] == "success") {
            echo '<p class="confirmation">Vérifiez votre boite mail !</p>';
        }
    }
    ?>

</main>
<footer>
    <?php
    include("footer.php");
    ?>
</footer>


</body>

</html>