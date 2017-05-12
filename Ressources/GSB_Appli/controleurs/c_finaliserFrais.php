<head>
    <link href="../styles/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../styles/stylePerso.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../js/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/checkGroup.js"></script>
</head>
<?php 
require_once("../includes/fct.inc.php");
require_once ("../includes/class.pdogsb.inc.php");
session_start();
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();

// include("../vues/v_entete.php");

/*
 * Finalisation de la validation de frais
*/
try {
	

	if (isset($_POST['leVisiteur']) && isset($_POST['leMois']) && isset($_POST['FraisForfait'])){
	// Mise à jour des forfaits
		$leMois = $_POST['leMois'];
		$leVisiteur = $_POST['leVisiteur'];
		$nbJ = intval($_POST['nbJustif']);
		$lesFrais = $_POST['FraisForfait'];
		$pdo->majFraisForfait($leVisiteur, $leMois, $lesFrais);
		$pdo->majNbJustificatifs($leVisiteur, $leMois, $nbJ);
	}

	if (isset($_POST['horsFRefusee'])){
	// Mise à jour des forfaits
		foreach ($lesFraisForfait_A_Maj as $unFraisHorsForfait) {
		// Editer la fiche de frais hors forfait
			$pdo->majFraisHorsForfait($unFraisHorsForfait);
		// Supprimer hors forfait ????
		// $pdo->supprimerFraisHorsForfait($unFraisHorsForfait);
		}
	}
} catch (Exception $e) {
	echo $e->getMessage();
}
?>

<div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Validation de fiche de frais</h4>
      </div>
      <div class="modal-body">
        <p>La fiche de frais à été validé et mise à jour avec succès !&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" href="index.php" class="btn btn-primary">Continuer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

