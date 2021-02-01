<?php

require '../model/fonctionsBdd.php';
$bdd = mysqli_connect("localhost", "root", '', "app");

if (isset($_POST['reset-password-submit'])) {

    $selecteur = $_POST['selecteur'];
    $validator = $_POST['validator'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    /*if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?newpwd=empty");
        exit();
    } else if ($password != $passwordRepeat) {
        header("Location: ../signup.php?newpwd=pwdnotsame");
        exit();
    }*/

    $currentDate = date('U');

    $sql = "SELECT * FROM reset_mdp WHERE selecteur=? AND expiration >= $currentDate";
    $stmt = mysqli_stmt_init($bdd);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $selecteur);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        //echo "result vaut $result";
        //$result = getResetMdpBySelAndExp($selecteur, $currentDate);
        //if (!$row = $req->fetch(PDO::FETCH_ASSOC)) {
        if (!$row = mysqli_fetch_assoc($result)) {
            echo "You need to re-submit your reset request.";
            exit();
        } else {
            /*$long = count($row);
            echo "longueur : $long et row0 vaut $row[0]";
            for ($i = 0; $i < count($row); $i++)
            {
                echo "row vaut $row[$i]";
            }*/

            $tokenBin = hex2bin($validator);

            $tokenCheck = password_verify($tokenBin, $row['token']);

            if ($tokenCheck === false) {
                echo "There was an error!";
            } elseif ($tokenCheck === true) {

                $tokenEmail = $row['email'];

                $sql = "SELECT * FROM user WHERE mail=?";
                $stmt = mysqli_stmt_init($bdd);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an error!";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    //$result = getResetMdpByMail($tokenEmail);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "There was an error!";
                        exit();
                    } else {

                        $sql = "UPDATE user SET password=? WHERE mail=?";
                        $stmt = mysqli_stmt_init($bdd);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error!";
                            exit();
                        } else {
                            $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                            //modifyMotdePasseByMail($newPwdHash, $tokenEmail);
                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE FROM reset_mdp WHERE email=?";
                            $stmt = mysqli_stmt_init($bdd);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "There was an error!";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                //deleteResetMdpByMail($tokenEmail);
                                header("Location: ../index.php?newpwd=passwordupdated");

                                //header("Location: ../view/html/connexion.php?newpwd=passwordupdated");
                            }

                        }

                    }
                }

            }

        }
    }

} else {
    header("Location: ../index.php");
    exit();
}

/*
require '../model/fonctionsBdd.php';

if (isset($_POST['reset-password-submit'])) {

    $selecteur = $_POST['selecteur'];
    $validator = $_POST['validator'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    $currentDate = date('U');
    list($result, $row) = getResetMdpBySelAndExp($selecteur, $currentDate);
    //$result = getResetMdpBySelAndExp($selecteur, $currentDate);
    //$row = $req->fetch(PDO::FETCH_ASSOC);
    echo "result de getResetMdpBySelAndExp : $result et $row";
    /*$tokenBin = hex2bin($validator);
    echo "result de tokenBin : $tokenBin";
    $tokenCheck = password_verify($tokenBin, $row['token']);
    echo "result de tokenCheck : $tokenCheck";
    $tokenEmail = $row['email'];
    echo "result de tokenEmail : $tokenEmail";
    $result = getResetMdpByMail($tokenEmail);
    $row = $req->fetch(PDO::FETCH_ASSOC);
    echo "result de getResetMdpByMail : $result";
    $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
    echo "result de newPwdHash : $newPwdHash";
    modifyMotdePasseByMail($newPwdHash, $tokenEmail);
    deleteResetMdpByMail($tokenEmail); //fin de com ici
    //header("Location: ../index.php?newpwd=passwordupdated");
} else {
    header("Location: ../index.php");
    exit();
}*/