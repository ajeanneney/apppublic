
<?php

    session_start();

    include("../model/fonctionsBdd.php");

    $firstName = htmlspecialchars($_POST['Prenom']);
    $lastName = htmlspecialchars($_POST['Nom']);
    $message = htmlspecialchars($_POST['message']);


    $sender = $firstName." ";
    $sender .= $lastName;
    $fullMessage .= $message ."\n Cordialement ". $sender;

    $receiver = $_POST['Destinataire'] | $_GET['Dest'];
    
    AddMessage($receiver,$_SESSION['id'],$fullMessage);

    header("Location: ../index.php");

    

?>



