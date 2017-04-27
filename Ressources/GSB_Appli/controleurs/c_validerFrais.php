<?php
$action = $_REQUEST['action'];
switch ($action) {
  case 'selectionnerVisiteur': {
    $lesVisiteurs = $pdo->getLesVisiteurs();

    include('vues/v_choixVisiteurFicheFrais.php');
    break;
  }
  case 'voirFrais': {
    include('vues/v_validerFraisFront.php');
    break;
  }
}
?>
