<?php
$action = $_REQUEST['action'];
switch ($action) {
  case 'selectionnerFiche': {
    $lesFiches = $pdo->getLesFichesFraisVa();

    include('vues/v_suiviPaiementFiche.php');
   break;
  }
  case 'miseEnPaiement': {
    foreach ($_POST['id'] as $idVisiteur) {
      $id = substr($idVisiteur, 0, strpos($idVisiteur, '-'));
      $mois = substr(strstr($idVisiteur, '-'), strlen('-'));
      $pdo->majEtatFicheFrais($id,$mois,'RB');
    }
    //header('location:index.php?uc=suivreFrais&action=selectionnerFiche');    
   break;
  }
  case 'genererPDF': {

      if(isset($_GET['i'])){
        $leMois = $_GET['m'];
        $idVisiteur = $_GET['i'];
      }
      else{

      $leMois = $_SESSION['lstMois'];
    }

    echo("XAAWXAXAX");

      $leVisiteur = $pdo->getLeVisiteur($idVisiteur);

      $urlf = "pdf_documents/". $idVisiteur . "_" . $leMois . ".pdf" ;
      if(!file_exists($urlf))
      {

          $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
          $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);

          $lesFrais = null;
          $lesAutresFrais = null;

          for($row = 0; $row < count($lesFraisForfait); $row++)
          {
              $lesFrais[$row][0] = $lesFraisForfait[$row][1];
              $lesFrais[$row][1] = $lesFraisForfait[$row][2];
              $lesFrais[$row][2] = $pdo->getLeFraisForfait($lesFraisForfait[$row][0])['montant'];
          }

          for($row = 0; $row < count($lesFraisHorsForfait); $row++)
          {
              $lesAutresFrais[$row][0] = $lesFraisHorsForfait[$row][4];
              $lesAutresFrais[$row][1] = $lesFraisHorsForfait[$row][3];
              $lesAutresFrais[$row][2] = $lesFraisHorsForfait[$row][5];
          }


          $pdf = new PDFGenerator($leVisiteur['nom'], $leVisiteur['prenom'], $leVisiteur['id'], $leMois, $lesFrais, $lesAutresFrais);
          $pdf->generate();
      }
      header('location:' . $urlf);

      break;

  }

}
?>
