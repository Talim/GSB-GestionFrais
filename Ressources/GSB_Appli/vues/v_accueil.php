<?php
$compta;
if (estComptable()){
  $compta = true;
}
else {
  $compta = false;
}
?>

﻿<div id="accueil">
    <h2>Gestion des frais<small> - <?php echo ($compta ? "Comptable" : "Visiteur") . " : " . $_SESSION['prenom'] . " " . $_SESSION['nom'] ?></small></h2>
</div>
<div class="row">
    <div class="col-md-12">
        <?php
        if ($compta){
        ?>
        <div class="panel panel-primary color-compta-border">
            <div class="panel-heading color-compta-back color-compta-border">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-bookmark"></span> Navigation</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12 text-center">
                        <a href="index.php?uc=validerFrais&action=selectionnerVisiteur" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-pencil"></span> <br/>Valider fiche de frais</a>
                        <a href="index.php?uc=suivreFrais&action=selectionnerFiche" class="btn btn-primary btn-lg color-compta-back color-compta-border" role="button"><span class="glyphicon glyphicon-list-alt "></span> <br/>Suivre paiement fiches de frais</a>
        <?php }
            else {?>
            <div class="panel panel-primary">
                <div class="panel-heading ">
                      <h3 class="panel-title">
                          <span class="glyphicon glyphicon-bookmark"></span> Navigation</h3>
                </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12 text-center">
                        <a href="index.php?uc=gererFrais&action=saisirFrais" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-pencil"></span> <br/>Renseigner la fiche de frais</a>
                        <a href="index.php?uc=etatFrais&action=selectionnerMois" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Afficher mes fiches de frais</a>
                <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
