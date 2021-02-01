<?php

include("../../model/fonctionsBdd.php");

$idMessage = htmlspecialchars($_POST['idMessage']);

deleteRow($idMessage);

?>