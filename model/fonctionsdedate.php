<?php
function age($date) {
    $age = date('Y') - date('Y', strtotime($date));
    if (date('md') < date('md', strtotime($date))) {
        return $age - 1;
    }
    return $age;
}



function couleurpastille($idmedecin){

    $patient =getTableByIdmedecin("patient",$idmedecin);
    while($element = $patient-> fetch()){
        $bilan = getTableByIdPatient("bilan",$element['id']);
        $timestamp=0;

        while ($elementbilan = $bilan -> fetch()){
            if($elementbilan['timestamp'] > $timestamp){
                $timestamp = $elementbilan['timestamp'];
            }
        }

        $nombredejour= dateDiff(time(),strtotime(date('Y-m-d H:i:s',strtotime($timestamp))))['day'];

        if($nombredejour<4){
            // couleur = vert
            ModifiePastilleById($element['id'],'green');

        } elseif($nombredejour>=4 and $nombredejour<6){
            // couleur = orange
            ModifiePastilleById($element['id'],'orange');

        }else {
            // couleur = red
            ModifiePastilleById($element['id'],'red');

        }
    }
}

function dateDiff($date1, $date2){
    $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
    $retour = array();

    $tmp = $diff;
    $retour['second'] = $tmp % 60;

    $tmp = floor( ($tmp - $retour['second']) /60 );
    $retour['minute'] = $tmp % 60;

    $tmp = floor( ($tmp - $retour['minute'])/60 );
    $retour['hour'] = $tmp % 24;

    $tmp = floor( ($tmp - $retour['hour'])  /24 );
    $retour['day'] = $tmp;

    return $retour;
}