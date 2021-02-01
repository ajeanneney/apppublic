<?php
session_start();

header("Content-type: text/javascript; charset=UTF-8");
include("../model/fonctionsBdd.php");

// recuprer l'id du compte
$id=$_SESSION['idpatient'];
?>

window.onload = function() {

    CanvasJS.addCultureInfo("fr",
        {
            decimalSeparator: ".",
            digitGroupSeparator: ",",
            days: ["Lundi", "Mardi", "Mercredi"," Jeudi"," Vendredi"," Samedi", "Dimanche"],
            months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
            shortMonths: ["Jan", "Fév", "Mar", "Avr", "Mai", "Jui", "Juil", "Aoû", "Sept", "Oct", "Nov", "Déc"],

    });

    var chart0 = new CanvasJS.Chart("chartContainer0", {
        animationEnabled: true,
        culture :"fr",

        title: {
            text: "Stimulus Visuel"
        },
        axisX: { // formatter les axes
            title: "Jour du test",

            labelFormatter: function (e) {
            return CanvasJS.formatDate( e.value, "DD/MM");
            },
        },
        axisY: {
            title: "Temps",
            suffix: "ms",

            includeZero: true
        },
        data: [{ //formatter le pointeur
            type: "line",
            name: "stimulus visuel",
            connectNullData: true,
            nullDataLineDashType: "solid",
            xValueType: "dateTime",
            xValueFormatString: "DD-MM-YYYY hh:mm",
            yValueFormatString: "#,##0.##\"ms\"",

            <?php
            $data='';
            $typechart='visuel';
            $table=getTableByIdPatient('mesure',$id);

            while($element = $table->fetch()){
                if($element['type']== $typechart){
                    $data=$data.'{x: '.($element['date']*1000).', y: '.$element['donnee'].' },' ;
                }
            }

            ?>


            dataPoints: [
                <?= $data?>
            ]
        }]
    });
    chart0.render();




/* graphique son*/


    var chart1 = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        culture:"fr",

        title: {
            text: "Stimulus Sonore"
        },
        axisX: {
            title: "Jour du test",
            labelFormatter: function (e) {
            return CanvasJS.formatDate( e.value, "DD/MM");
            },

        },
        axisY: {
            title: "Temps",
            suffix: "ms",
            includeZero: true
        },
        data: [{
            type: "line",
            name: "Stimulus Sonore",
            connectNullData: true,
            nullDataLineDashType: "solid",
            xValueType: "dateTime",
            xValueFormatString: "DD-MM-YYYY hh:mm",
            yValueFormatString: "#,##0.##\"ms\"",

            <?php
                $data='';
                $typechart='sonore';
                $table=getTableByIdPatient('mesure',$id);

                while($element = $table->fetch()){
                    if($element['type']== $typechart){
                    $data=$data.'{x: '.($element['date']*1000).', y: '.$element['donnee']. ' },' ;

                    }

                }


                ?>
            dataPoints: [
                <?= $data?>
            ]
        }]
    });
    chart1.render();





/* graphique autre*/



    var chart2 = new CanvasJS.Chart("chartContainer2", {
        animationEnabled: true,
        culture:"fr",

        title: {
            text: "Rythme Cardiaque"
        },
        axisX: {
            title: "Jour du test",
            labelFormatter: function (e) {
            return CanvasJS.formatDate( e.value, "DD/MM");
            },

        },
        axisY: {
            title: "Fréquence en BPM",
            suffix: "BPM",
            includeZero: true
        },
        data: [{
            type: "line",
            name: "Rythme Cardiaque",
            connectNullData: true,
            nullDataLineDashType: "solid",
            xValueType: "dateTime",
            xValueFormatString: "DD-MM-YYYY hh:mm",
            yValueFormatString: "#,##0.##\"ms\"",
            <?php
            $data='';
            $typechart='cardiaque';
            $table=getTableByIdPatient('mesure',$id);

            while($element = $table->fetch()){
                if($element['type']== $typechart){
                    $data=$data.'{x: '.($element['date']*1000).', y: '.$element['donnee']. ' },' ;

                }

            }


            ?>
            dataPoints: [
                <?= $data?>
            ]
        }]
    });
    chart2.render();

}


