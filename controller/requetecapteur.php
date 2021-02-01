<?php
require '../model/fonctionsBdd.php';


if (isset($_POST['Fonctioncapteur']) && isset($_POST['idcapteur']) && isset($_POST['msgcapteur']) ) {

    $fonction = $_POST["Fonctioncapteur"];
    $id = $_POST['idcapteur'];
    $msg = $_POST['msgcapteur'];
    $idpatient =$_GET['idpatient'];

    //ajouter le bilan
    Addgestioncapteur($fonction,$msg,$id,$idpatient);

    header("Location: EspaceMedecin.php?id=". $idpatient);
}

