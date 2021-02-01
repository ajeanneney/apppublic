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
    <link rel="stylesheet" href="../css/messagerie.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="../../view/js/messagerie.js"></script>
    
    <title>Messages</title>
</head>


<body class="messagerie">
<header>

    <a href="espaceFamille.php"><img id="logoheader" src="../pictures/logoSH.png" alt="Logo Senior Healthcare"></a>
    <h1> Vos messages </h1>
    <div class="block_center"> </div>

</header>
<main>


    <nav class="menu">
        <ul>
            <li class="menu_bilan"> <a class="bouton_classique" href="../../index.php"> Bilans </a></li>
            <li class="faq"> <a class="bouton_classique" href="faq.php"> F.A.Q </a></li>
            <li class="message"><a href="../html/messagerie.php"> Consulter mes messages</a> </li>
            <li class="compte"><a class="bouton_classique" href="../../controller/Parametre.php?id=0"> Mon Compte </a>
                <ul class="subcompte">
                    <li> <a href="../../controller/Parametre.php?id=1">Mot de passe </a> </li>
                    <li> <a href="../../controller/Parametre.php?id=2">Adresse mail</a> </li>
                    <li> <a href="../../controller/Parametre.php?id=3">Contact </a> </li>
                    <li> <a href="../../controller/Parametre.php?id=4">Déconnexion</a> </li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="table_block">
        <table class="boite_message" id = "messageTable">
            <tr>
                <th>De</th>
                <th>À</th>
                <th class = "messageArea">Message</th>
            </tr>            
    <?php
    
    $idDest=$_SESSION['id'];
    $table = getTableByIdDest($idDest);
    
    $tableUser;

    while ($row = $table->fetch()) {
        echo "<tr>";
        
        $tableUser = getUserById("user",$row[2]);
        $rowBis = $tableUser -> fetch();

        echo "<td>".$rowBis[1]."</td>";

        $tableUser = getUserById("user",$row[1]);
        $rowBis = $tableUser -> fetch();

        echo "<td>".$rowBis[1]."</td>";

        echo "<td>".$row[3]."</td>";

        echo "<td><input id=\"answerButton\" class=\"answerButton\" type=\"button\"  onclick=\"location.href='NouveauMessage.php'\" value=\"Répondre\"> </td>";
        echo "<td><input id=\"deleteButton\" class=\"deleteButton\" type=\"button\" value=\"Supprimer\" onclick=\"DeleteRow(".$row[0];
        echo ")\" /> </td>";
        echo "</tr>". PHP_EOL;
    }
    
    ?>

            
        </table>
        <input id="answerButton" class="answerButton" type="button"  onclick="location.href='NouveauMessage.php'" value="Nouveau Message">
    
    </div>    
   
</main>

<footer>
    <?php
    include("footer.php");
    ?>
</footer>


</body>
</html>

