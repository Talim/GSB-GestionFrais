<?php
require_once('./controleurs/c_pdf.php');
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
$leMois = null;
switch ($action) {
    case 'selectionnerMois': {
            $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
            // Afin de sélectionner par défaut le dernier mois dans la zone de liste
            // on demande toutes les clés, et on prend la première,
            // les mois étant triés décroissants
            $lesCles = array_keys($lesMois);
            $moisASelectionner = $lesCles[0];
            include("vues/v_listeMois.php");
            break;
        }
    case 'voirEtatFrais': {
            $leMois = $_REQUEST['lstMois'];
            $_SESSION['lstMois'] = $leMois;
            $leVisiteur = $idVisiteur;
            $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
            $moisASelectionner = $leMois;
            include("vues/v_listeMois.php");
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
            $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
            $numAnnee = substr($leMois, 0, 4);
            $numMois = substr($leMois, 4, 2);
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $idEtat = $lesInfosFicheFrais['idEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif = $lesInfosFicheFrais['dateModif'];
            $dateModif = dateAnglaisVersFrancais($dateModif);
            include("vues/v_etatFrais.php");
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
                $lesFrais[$row][2] = $pdo->getLeFraisForfait($lesFraisForfait[$row][0])['montant']; //KM

            }

            for($row = 0; $row < count($lesFraisHorsForfait); $row++)
            {
                $lesAutresFrais[$row][0] = $lesFraisHorsForfait[$row][4];
                $lesAutresFrais[$row][1] = $lesFraisHorsForfait[$row][3];
                $lesAutresFrais[$row][2] = $lesFraisHorsForfait[$row][5];
            }

            //$frais = array(array("Nuité", 9, 80.00), array("Repas Midi", 12, 29.00), array("Véhicule", 750, 0.67));

            $pdf = new PDFGenerator($leVisiteur['nom'], $leVisiteur['prenom'], $leVisiteur['id'], $leMois, $lesFrais, $lesAutresFrais);
            $pdf->generate();
        }
        header('location:' . $urlf);

        break;

    }
}
?>
