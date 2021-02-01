<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../view/pictures/logoSH.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../../view/css/main.css">
    <link rel="stylesheet" href="../../view/css/connexion.css">
    <script type="text/javascript" src="../../view/js/unhide.js"></script>

    <title>Nouveau mot de passe</title>
</head>

<body>
<header>

    <a href="../../index.php"><img id="logoheader" src="../../view/pictures/logoSH.png" alt="Logo Senior Healthcare"></a>
    <h1> Choisissez votre nouveau mot de passe </h1>

</header>

<main>
    <?php
    $selecteur = $_GET['selecteur'];
    $validator = $_GET['validator'];

    if (empty($selecteur) || empty($validator)) {
        echo "Could not validate your request!";
    } else {

    if (ctype_xdigit( $selecteur ) !== false && ctype_xdigit( $validator ) !== false) {
    ?>

    <form action="../../controller/requeteCreation.php" method="post">
        <div class="formulaire">
            <label class="titre_champ" for="mdp">Nouveau mot de passe :<br>
                <input type="hidden" name="selecteur" value="<?php echo $selecteur ?>">
                <input type="hidden" name="validator" value="<?php echo $validator ?>">

                <input class="champ" type="password" name="pwd" id="mdp" placeholder="Entrez le nouveau MDP">
                <br>
                <input class="champ" type="password" name="pwd-repeat" id="mdp" placeholder="Répétez le nouveau MDP">
            </label>

        </div>
        <div class="div_submit formulaire">
            <input type="submit" name="reset-password-submit" value="Valider" class="bouton_submit">
        </div>
    </form>

    <?php
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