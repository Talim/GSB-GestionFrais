<?php
$action = $_REQUEST['action'];
switch ($action) {
  case 'selectionnerVisiteur': {
    $lesVisiteurs = $pdo->getLesVisiteurs();

    include('vues/v_validerFrais.php');
    break;
  }
  case 'selectionnerMois': {
    break;
  }
  case 'suivrePaiementFrais': {
    break;
  }
}
?>
