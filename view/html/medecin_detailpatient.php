<?php


$idpatient=$_GET['id'];
$_SESSION['idpatient']=$idpatient;
$bilan = getTableByIdPatient("bilan",$idpatient);
$patient =getTableById("patient",$idpatient);

$timestamp=0;
$text='';

while ($element = $bilan->fetch()) {
    if($element['timestamp'] > $timestamp){
        $timestamp = $element['timestamp'];
        $text = $element['text'];

    }

}

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../view/pictures/logoSH.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../view/css/main.css">
    <link rel="stylesheet" href="../view/css/detailPatient.css">


    <title>Consulter un patient</title>

</head>

<body>
<header>

    <a href="../index.php"><img id="logoheader" src="../view/pictures/logoSH.png" alt="Logo Senior Healthcare"></a>
    <h1> Consulter un Patient </h1>
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

<div id="liste_de_barre">
    <?php
    while ($element = $patient->fetch()){
        $idpatient=$element['id'];
        $nom=$element['nom'];
        $prenom=$element['prenom'];
        $naissance=$element['naissance'];
        $lien="espaceMedecin.php?id=".$idpatient;
        $couleur_pastille="background:".$element['pastille'].";";
        $couleur_bordure="border-color:".$element['pastille'].";";
        $age=age(substr($element['naissance'],0,10))

        ?>

        <div class="div_barre">

            <div class="barre_patients" >
                <div class="numéro"> n°<?=$idpatient?> </div>
                <div class="prénom"> <?=$prenom?></div>
                <div class="nom"> <?=$nom?> </div>
                <div class="age"> <?=$age?> ans</div>
                <div class="indicateur" style=<?= $couleur_pastille?>> </div>
            </div>
        </div>
        <?php
    }
    ?>





</div>

<div class="container">

    <div class="espace_bilan">

        <h2> Dernier Bilan Redigé</h2>
        <h3> à : <?= substr($timestamp,0,16) ?> </h3>


        <p class="bilan">  <?= $text?> </p>

    </div>

    <form method="post" action="espaceMedecin.php?id=0" class="formulaire_bilan">

        <label for="redaction_bilan"> <h2> Rediger un bilan</h2> </label>
        <textarea name="Redaction_de_Bilan" id="redaction_bilan" rows="15" cols="25"> </textarea>

        <input type="submit" value="Envoyer le bilan" class="bouton_submit">


    </form>

    <div class="espace_contact">

        <div class=""> <a class="bouton_classique" href="espaceMedecin.php?id=0" style=<?=$couleur_bordure?>> Retour </a> </div><br><br><br>
        <div class=""> <a class="bouton_classique" href="<?='../view/html/gestion_capteurs.php?idpatient='.$idpatient?>" style="border-color: #4C79A7;"> Capteur </a> </div>


    </div>


</div>

<div class="graph">

    <div id="chartContainer0" style=""></div>

    <div id="chartContainer1" style=""></div>

    <div id="chartContainer2" style=""></div>


</div>
</main>
<footer>
<?php
include("footer.php");
?>
</footer>
</body>
<script src="../view/js/bibliothequeGraphique.js"></script>
<script src="JSaffichagegraphique.php"></script>
</html>

