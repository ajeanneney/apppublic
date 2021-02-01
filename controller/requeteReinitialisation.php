<?php

require '../model/fonctionsBdd.php';
require '../model/fonctionsMail.php';

//$bdd = mysqli_connect("localhost:3307", "root", '', "app");
if (isset($_POST['submit_requete_reinit'])) {


    $selecteur = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "localhost/appisep/view/html/creationmdp.php?selecteur=" . $selecteur . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    $userEmail = $_POST["reinit_user_mail"];

    deleteResetMdpByMail($userEmail);
    /*$sql = "DELETE FROM reset_mdp WHERE email=?";
    $stmt = mysqli_stmt_init($bdd);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }*/

    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    addResetMdp($userEmail, $selecteur, $hashedToken, $expires);
    /*$sql = "INSERT INTO reset_mdp (email, selecteur, token, expiration) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($bdd);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {

        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selecteur, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($bdd);*/

    $to = $userEmail;

    $subject = 'Reinitialisez votre mot de passe pour Senior Heatlhcare';

    $message = "<p>Nous avons recu une demande de reinitialisation de mot de passe. Le lien pour cette procedure se trouve juste en dessous. ";
    $message .= "Ignorez ce message si vous n'etes pas a l'origine de cette requete.</p>";
    $message .= "<p>Lien de reinitialisation : </br>";
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    /*$headers = "From: SeniorHealthcare <resetpassword@seniorhealthcare.com>\r\n";
    $headers .= "Reply-To: resetpassword@seniorhealthcare.com\r\n";
    $headers .= "Content-type: text/html\r\n";*/

    sendMail($to, $subject, $message);

    header("Location: ../view/html/reinitmdp.php?reset=success");
} else {
    header("Location: ../index.php");
    exit();
}
