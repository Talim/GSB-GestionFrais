<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-warning">
    <div class="panel-heading">Fiche de frais en attente de paiement </div>
    <table class="table table-bordered table-responsive">
      <thead>
        <th><input type="checkbox" name="chk[]"  onchange="checkAll(this)"  id="checkall" /></th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date</th>
        <th>Montant</th>
        <th>Fiche de frais</th>
      </thead>
      <tbody>
        <?php
          foreach ($lesFiches as $uneFiche) {
            $nom = $uneFiche['nom'];
            $prenom = $uneFiche['prenom'];
            $mois = $uneFiche['mois'];
            $montant = $uneFiche['montantValide'];
            $idVisiteur = $uneFiche['idVisiteur']
            ?>
            <tr>
            <td><input type="checkbox" class="checkthis" id="<?php echo($idVisiteur."-".$mois) ?>" /></td>
            <td><?php echo($nom)?></td>
            <td><?php echo($prenom)?></td>
            <td><?php echo conversionDate($mois)?></td>
            <td><?php echo($montant)?></td>
             <td><button class="btn"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button></td>
          </tr>
            <?php
          }
          ?>
       </tbody>
     </table>
   </div>
   <button class="btn btn-success" type="submit">Mise en Paiement</button>
</div>
