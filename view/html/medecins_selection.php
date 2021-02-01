<?php


$table=getTableByIdmedecin("patient",$_SESSION['idmedecin']);


?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../view/pictures/logoSH.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../view/css/main.css">
    <link rel="stylesheet" href="../view/css/selectionMedecin.css">
    <script type="text/javascript" src="../view/js/searchBarMedecin.js"></script>


    <title>Espace Medecin</title>

</head>

<body>
<header>

    <a href="../index.php"><img id="logoheader" src="../view/pictures/logoSH.png" alt="Logo Senior Healthcare"></a>
    <h1> Votre Espace Medecin </h1>
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
                    <li> <a href="../view/html/contactForm.php?dest=gest">Contact </a> </li>
                    <li> <a href="Parametre.php?id=4">Déconnexion</a> </li>
                </ul>
            </li>
            <li class="message"><a href="../view/html/messagerie.php"> Consulter mes messages</a> </li>

        </ul>
    </nav>

<div class="container">

    <div id="liste_de_barre">
        <?php
        while ($element = $table->fetch()){
            $idpatient=$element['id'];
            $nom=$element['nom'];
            $prenom=$element['prenom'];
            $naissance=$element['naissance'];
            $lien="espaceMedecin.php?id=".$idpatient;
            $couleur_pastille="background-color:".$element['pastille'].";";
            $age=age(substr($element['naissance'],0,10))
            ?>

            <div class="div_barre">

                <a class="barre_patients" href=<?=$lien?> >
                    <div class="numéro"> n°<?=$idpatient?> </div>
                    <div class="prénom"> <?=$prenom?> </div>
                    <div class="nom"> <?=$nom?> </div>
                    <div class="age"> <?=$age?> ans</div>
                    <div class="indicateur" style=<?= $couleur_pastille?>> </div>
                </a>
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

