<?php

header("Content-Type: text/plain");

require_once ("../includes/class.pdogsb.inc.php");
// session_start();
$pdo = PdoGsb::getPdoGsb();

$numVisiteur = (isset($_POST["numV"])) ? $_POST["numV"] : NULL;
$lesMois = $pdo->getLesMoisDisponibles($numVisiteur);

$lst = "";

foreach ($lesMois as $unMois) {
  $mois = $unMois['mois'];
  $numAnnee = $unMois['numAnnee'];
  $numMois = $unMois['numMois'];
  $lst .= "<option value=" . $mois . ">" . $numMois . "/" . $numAnnee . "</option>";
 }


if ($lst != ""){
  echo $lst;
}
else{
  $lst = "erreur";
  echo $lst;
}
?>
