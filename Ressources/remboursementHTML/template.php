<?php
//AAAA-MM-JJ
/*
$frais = array(array("Nuité", 9, 80.00), array("Repas Midi", 12, 29.00), array("Véhicule", 750, 0.67));
$autreFrais = array(array("18/12/2016", "Repas Représentation", 156.00), array("22/12/2016", "Achat Fleuriste Soirée \"MediLog\"", 120.30));

echo(returnTemplate("CASCALES", "Arthur", "EE-614-QF", "2016-12-02", $frais, $autreFrais));
*/

function returnTemplate($nom, $prenom, $imma, $date, $frais, $autreFrais){


    $fraisHTML = "";
    $autreFraisHTML = "";

    $total = 0;

    //FRAIS
    for ($i = 0; $i < count($frais); $i++) {
    $fraisHTML .= "<tr>";
    $fraisHTML .= "<td>". $frais[$i][0] ."</td>";
    $fraisHTML .= "<td>". $frais[$i][1] ."</td>";
    $fraisHTML .= "<td>". $frais[$i][2] ."</td>";
    $fraisHTML .= "<td>". ($frais[$i][1] * $frais[$i][2]) ."</td>";
    $total += ($frais[$i][1] * $frais[$i][2]);
    $fraisHTML .= "</tr>";

    }

    //AUTRE FRAIS
    for ($i = 0; $i < count($autreFrais); $i++) {
    $autreFraisHTML .= "<tr>";
    $autreFraisHTML .= "<td>". $autreFrais[$i][0] ."</td>";
    $autreFraisHTML .= "<td>". $autreFrais[$i][1] ."</td>";
    $autreFraisHTML .= "<td>". $autreFrais[$i][2] ."</td>";
        $total += $autreFrais[$i][2];
    $autreFraisHTML .= "</tr>";

    }




    $html = "
    

<html>

<head>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\"/>
</head>

<header>
    <div style=\"margin-top: 30px;\">
        <center><img src=\"logo.png\" /></center>
    </div>
</header>

<body>
<center>
    <div id=\"entete\" style=\"margin-left: 50px;\">
        REMBOURSEMENT DE FRAIS ENGAGES
    </div>

    <div id=\"tableau\">
    <div id=\"body\" style=\"margin-left: 50px;\">
        <p style=\"text-align: left; margin-left: 20px; margin-top: 40px;\"><b>Visiteur : </b>".$imma." ".$nom." ".$prenom."</p>
        <p style=\"text-align: left; margin-left: 20px; margin-bottom: 40px;\"><b>Mois : </b>".date('M Y', strtotime($date))."</p>

<!--DIV TABLEAU-->

        <!-- TABLEAU -->
        <table border=\"1\" style=\"margin-left: 25px;\">
            <thead>
                <tr>
                    <th>Frais Forfaitaires</th>
                    <th>Quantité</th>
                    <th>Montant unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>

                ".$fraisHTML."

            </tbody>
        </table>



        <p style=\"color: darkblue; margin-top: 30px;\">Autres Frais</p>

        <table border=\"1\" style=\"margin-bottom: 25px; margin-left: 25px;\">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Libellé</th>
                    <th>Montant</th>
                </tr>
            </thead>

            <tbody>
".$autreFraisHTML."

            </tbody>

        </table>


<!--margin-left: 300px-->
        <!--<table style=\"width: auto; margin-left: auto; margin-top: 25px; margin-bottom: 25px; margin-right: 5px;\">-->
            <table border=\"1\" style=\"width: auto; margin-left: auto; margin-top: 25px; margin-bottom: 25px; margin-right: 5px;\">
            <tr>
                <td>Total ".date('m/Y', strtotime($date))."</td>
                <td>".$total."</td>
            </tr>
        </table>
</div>
    </div>
        <div style=\"margin-left: 400px; margin-top: 50px;\">
        <p>Fait à Paris, le ".date("j F Y")."</p> <p style=\"margin-right: 50px;\"> Vu l'agent comptable</p>

        <img src=\"signature.png\">
    </div>
</center>
</body>


</html>
    
    
    ";


return $html;


}