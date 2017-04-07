<?php
//$action = $_REQUEST['action'];
//switch ($action) {
//  case 'recupeFicheVa': {
    $lesFiches = $pdo->getLesFichesFraisVa();

    include('vues/v_suiviPaiementFiche.php');
//    break;
//  }

//}
?>
