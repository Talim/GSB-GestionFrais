<?php
$action = $_REQUEST['action'];
switch ($action) {
	case 'selectionnerVisiteur': {
		// Appel de la méthode nécessaire
		$lesVisiteurs = $pdo->getLesVisiteurs();

		// Importation de la vue associé
		include('vues/v_choixVisiteurFicheFrais.php');
		break;
	}
	case 'voirFrais': {
		// Récupération des variables POST
		$moisConcerne = (isset($_POST["lstMois"])) ? $_POST["lstMois"] : NULL;
		$numVisiteur = (isset($_POST["lstVisiteurs"])) ? $_POST["lstVisiteurs"] : NULL;

		if ($moisConcerne == null || $numVisiteur == null){
			header("Location: index.php");
		}

		// Appel des méthodes nécessaires
		$leVisiteur = $pdo->getLeVisiteur($numVisiteur);
		$lesFraisForfait = $pdo->getLesFraisForfait($numVisiteur, $moisConcerne);
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($numVisiteur, $moisConcerne);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($numVisiteur, $moisConcerne);
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];

		

		// Importation de la vue associé
		include('vues/v_afficherValiderFrais.php');
		break;
	}
}
?>
