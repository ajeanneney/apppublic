<?php

function connectBdd(){
    $DB_HOST = 'localhost';
    $DB_NAME = 'app';
    $DB_USER = 'root';
    $DB_PASSWORD = '';
    try {
        $bdd = new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_NAME.';charset=utf8', ''.$DB_USER.'', ''.$DB_PASSWORD.'');
    } 
    catch (PDOException $e) {
        echo "Erreur!: " . $e->getMessage() . "<br/>";
    die();
    }
    return($bdd);
}

function getTable($table){
    $bdd = connectBdd();
    $sql = "SELECT * FROM $table";
    return($bdd->query($sql));
}

function getUserById($table, $id){
    $bdd = connectBdd();
    $sql = "SELECT * FROM $table WHERE id = $id";
    return($bdd->query($sql));
}

function delete($table, $id){
    $bdd = connectBdd();
    $sql = "DELETE FROM $table WHERE id = $id";
    $bdd->exec($sql);
}

function deleteRow($idMessage){
    $bdd = connectBdd();
    $sql = "DELETE FROM inbox WHERE id = $idMessage";
    $bdd->exec($sql);
}


function addElementFaq($question, $reponse){
    $bdd = connectBdd();
    $req = $bdd->prepare('INSERT INTO faq(question, reponse) VALUES(:question, :reponse)');
    $req->execute(array(
        'question' => $question,
        'reponse' => $reponse,
    ));
}

function addUser($mail, $role){
    // genere un mdp aléatoire
    $str_result = '23456789ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $mdp = substr(str_shuffle($str_result), 0, 8);
    $hashedMdp = password_hash($mdp, PASSWORD_DEFAULT); //on hash le mdp
    //veifier que le mail est unique ici
    $bdd = connectBdd();

    // on seed la table user
    $req = $bdd->prepare('INSERT INTO user(mail, password, role) VALUES(:mail, :password, :role)'); //verifier que le mail est unique !!
    $req->execute(array(
        'mail' => $mail,
        'password' => $hashedMdp,
        'role' => $role,
    ));
    return([getLastId($bdd)]);
}

function addGest($idUser, $nom, $prenom){
    $bdd = connectBdd();
    $req = $bdd->prepare('INSERT INTO gestionnaire(iduser, nom, prenom) VALUES(:iduser, :nom, :prenom)');
    $req->execute(array(
        'iduser' => $idUser,
        'nom' => $nom,
        'prenom' => $prenom,
    ));
}

function addMedecin($idUser, $nom, $prenom){
    $bdd = connectBdd();
    $req = $bdd->prepare('INSERT INTO medecin(iduser, nom, prenom) VALUES(:iduser, :nom, :prenom)');
    $req->execute(array(
        'iduser' => $idUser,
        'nom' => $nom,
        'prenom' => $prenom,
    ));
}

function addFamille($idUser, $idPatient, $nom, $prenom){
    $bdd = connectBdd();
    $req = $bdd->prepare('INSERT INTO famille(iduser, idpatient, nom, prenom) VALUES(:iduser, :idpatient, :nom, :prenom)');
    $req->execute(array(
        'iduser' => $idUser,
        'idpatient' => $idPatient,
        'nom' => $nom,
        'prenom' => $prenom,
    ));
}

function addPatient($idMedecin, $nom, $prenom, $naissance){
    $bdd = connectBdd();
    $req = $bdd->prepare('INSERT INTO patient(idmedecin, nom, prenom, naissance, pastille) VALUES(:idmedecin, :nom, :prenom, :naissance, :pastille)');
    $req->execute(array(
        'idmedecin' => $idMedecin,
        'nom' => $nom,
        'prenom' => $prenom,
        'naissance' => $naissance,
        'pastille' => 'green',
    ));
}

// permet de recuperer le dernier id inséré pour gerer les FK
function getLastId($bdd){
    $latestId = $bdd->lastInsertId();
    return($latestId);
}

function getTableByIdPatient($table, $id){
    $bdd = connectBdd();
    $sql = "SELECT * FROM $table WHERE idpatient = $id";
    return($bdd->query($sql));
}

function getTableByIduser($table, $id){
    $bdd = connectBdd();
    $sql = "SELECT * FROM $table WHERE iduser = $id";
    return ($bdd->query($sql));
}

function getTableByIdmedecin($table, $id){
    $bdd = connectBdd();
    $sql = "SELECT * FROM $table WHERE idmedecin = $id";
    return ($bdd->query($sql));
}

function getTableById($table, $id){
    $bdd = connectBdd();
    $sql = "SELECT * FROM $table WHERE id = $id";
    return ($bdd->query($sql));
}

function getAllStaffUser(){
    $bdd = connectBdd();
    $sql = "SELECT * FROM user WHERE role =\"gestionnaire\" OR  role =\"medecin\"";
    return ($bdd->query($sql));
}

function getAllGestUser(){
    $bdd = connectBdd();
    $sql = "SELECT * FROM user WHERE role =\"gestionnaire\"";
    return ($bdd->query($sql));
}

function getTableByIdDest($idDest){
    $bdd = connectBdd();
    $sql = "SELECT * FROM inbox WHERE idDest = $idDest";
    return ($bdd->query($sql));
}



function ModifiePastilleById($id,$value){
    $bdd = connectBdd();
    $req = $bdd->prepare('UPDATE patient SET Pastille="'.$value.'" WHERE id="'.$id.'"');

    $req->bindParam( $id, $value);

    $req->execute();

}

function AddBilan($id,$textebilan){
    $bdd = connectBdd();
    $req= $bdd->prepare('INSERT INTO bilan (id,idpatient,timestamp,text) VALUES (NULL,:id,NULL,:texebilan)');

    return($req->execute(array(
        'id' => $id,
        'texebilan' => $textebilan,
    )));


}

function AddMessage($idDest,$idExpd,$Message){
    $bdd = connectBdd();
    $req = $bdd->prepare('INSERT INTO inbox (idDest,idExpd,Message) VALUES (:Destinataire,:Expediteur,:Mesg)');

    return($req->execute(array(
        'Destinataire' => $idDest,
        'Expediteur' => $idExpd,
        'Mesg' => $Message,
    )));
}


function ModifieMotdePassebyId($value,$id){
    $bdd = connectBdd();
    $req = $bdd->prepare('UPDATE user SET password="'.$value.'" WHERE id="'.$id.'"');

    $req->bindParam( $id, $value);

    $req->execute();
}

function ModifieMailbyId($value,$id){
    $bdd = connectBdd();
    $req = $bdd->prepare('UPDATE user SET mail="'.$value.'" WHERE id="'.$id.'"');

    $req->bindParam( $id, $value);

    $req->execute();
}

function Addgestioncapteur($fonction,$msg,$idcapteur,$idpatient){
    $bdd = connectBdd();
    $req = $bdd->prepare('INSERT INTO gestion_capteur (id,fonction,idcapteur,idpatient,msg) VALUES (NULL,:fonction,:idcapteur,:idpatient,:msg)');

    return($req->execute(array(
        'fonction' => $fonction,
        'msg' => $msg,
        'idcapteur' => $idcapteur,
        'idpatient' => $idpatient,
    )));
}

function addResetMdp($email,$selecteur,$token,$expiration){
    $bdd = connectBdd();
    $req = $bdd->prepare('INSERT INTO reset_mdp (id,email,selecteur,token,expiration) VALUES (NULL,:email,:selecteur,:token,:expiration)');

    return($req->execute(array(
        'email' => $email,
        'selecteur' => $selecteur,
        'token' => $token,
        'expiration' => $expiration,
    )));
}

function deleteResetMdpByMail($email){
    $bdd = connectBdd();
    $sql = "DELETE FROM reset_mdp WHERE email = $email";
    $bdd->exec($sql);
}

/*function getResetMdpBySelAndExp($selecteur, $currentDate){
    $bdd = connectBdd();
    $sql = "SELECT * FROM reset_mdp WHERE selecteur=$selecteur AND expiration >= $currentDate";
    return ($bdd->query($sql));
}*/

function getResetMdpBySelAndExp($selecteur, $currentDate){
    $bdd = connectBdd();
    $req = $bdd->prepare('SELECT * FROM reset_mdp WHERE selecteur = :selecteur AND expiration >= :currentDate');
    //return($req->execute(array('selecteur' => $selecteur, 'currentDate' => $currentDate)));
    return array($req->execute(array('selecteur' => $selecteur, 'currentDate' => $currentDate)), $req->fetch(PDO::FETCH_ASSOC));
    //$data=$req->fetch(PDO::FETCH_ASSOC);
}

function getResetMdpByMail($mail){
    $bdd = connectBdd();
    $sql = "SELECT * FROM user WHERE mail = $mail";
    return ($bdd->query($sql));
}

function modifyMotdePasseByMail($password,$mail){
    $bdd = connectBdd();
    $req = $bdd->prepare('UPDATE user SET password="'.$password.'" WHERE mail="'.$mail.'"');

    $req->bindParam( $mail, $password);

    $req->execute();
}
