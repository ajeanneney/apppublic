<?php
 // prendre l'id du patient + nom prénom en post
    $idpatient = $_GET['idpatient']
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../view/pictures/logoSH.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../../view/css/main.css">
    <link rel="stylesheet" href="../../view/css/capteur.css">

    <title>Gestion des capteurs</title>

</head>

<body>
<header>

    <a href="../../index.php"><img id="logoheader" src="../../view/pictures/logoSH.png" alt="Logo Senior Healthcare"></a>
    <h1> Gestion des capteurs du patient</h1>
    <div class="block_center"> </div>

</header>

<main>


    <nav class="menu">
        <ul>
            <li class="menu_bilan"> <a class="bouton_classique" href="../../index.php"> Bilans </a></li>
            <li class="faq"> <a class="bouton_classique" href="../../view/html/faq.php"> F.A.Q </a></li>
            <li class="compte"><a class="bouton_classique" href="../../controller/Parametre.php?id=0"> Mon Compte </a>
                <ul class="subcompte">
                    <li> <a href="../../controller/Parametre.php?id=1">Mot de passe </a> </li>
                    <li> <a href="../../controller/Parametre.php?id=2">Adresse mail</a> </li>
                    <li> <a href="../../view/html/contactForm.php?dest=gest">Contact </a> </li>
                    <li> <a href="../../controller/Parametre.php?id=4">Déconnexion</a> </li>
                </ul>
            </li>
            <li class="message"><a href="../view/html/messagerie.php"> Consulter mes messages</a> </li>
        </ul>
    </nav>

<div class="container">

    <div class="espace_saisie">
        <form action="<?= '../../controller/requetecapteur.php?idpatient='.$idpatient?>" method="post">
            <h2>Gérer un capteur</h2>
            <div class="formulaire">
                <label class="titre_champ" for="Fonctioncapteur">Fonction du capteur</label> <br>
                <select name="Fonctioncapteur" id="Fonctioncapteur">
                    <option value="visuel">Visuel</option>
                    <option value="cardiaque">Cardiaque</option>
                    <option value="sonore">Sonore</option>
                </select><br>

                <label class="titre_champ" for="idcapteur">Id du capteur</label> <br>
                <input type="text" id="idcapteur" name="idcapteur" required><br><br>
                <label class="titre_champ" for="msgcapteur">Message au capteur</label> <br>
                <input type="text" id="msgcapteur" name="msgcapteur" required>
            </div>
            <div class="div_submit formulaire">
                <input class="bouton_submit" type="submit" name="ajouter" value="Ajouter">
            </div>
        </form>
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

