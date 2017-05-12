<?php 
require_once ("../includes/class.pdogsb.inc.php");
$pdo = PdoGsb::getPdoGsb();
session_start();
// include("../vues/v_entete.php");
/*
 * Finalisation de la validation de frais
*/


$lesFraisHorsForfait_A_Maj = $_POST;

if (isset($lesFraisHorsForfait_A_Maj)){


var_dump($lesFraisHorsForfait_A_Maj);
// foreach ($lesFraisHorsForfait_A_Maj as $unFraisHorsForfait) {
// 	// Editer la fiche de frais hors forfait
// 	//$pdo->majFraisHorsForfait($unFraisHorsForfait);
// 	print($unFraisHorsForfait);
// }



}
else{
	header_remove("Location"); 
}
?>

<div class="alert alert-success" role="alert"> <strong>Super !</strong> La fiche de frais à correctement été validé ! Une autre validation ? </div>
<?php 

//include '../vues/v_choixVisiteurFicheFrais.php';
include("../vues/v_pied.php");


?>
