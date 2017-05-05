
<div class="row">

  <div class="col-8">
    <div class="container">
      <h2>Validation des frais pour le visiteur: </h2>
      <form class="form-horizontal">

        <div class="container">
          <h2>Frais au forfait</h2>
          <div class="panel panel-warning">
            <div class="panel-heading">Descriptif des éléments forfait</div>

            <table class="table table-bordered table-responsive">
              <tr>
                <?php
                // Récupération des libéllés des frais au forfait
                foreach ($lesFraisForfait as $unFraisForfait) {
                  $libelle = $unFraisForfait['libelle'];
                  ?>
                  <th> <?php echo htmlspecialchars($libelle) ?></th>
                  <?php
                }
                ?>
              </tr>

              <tbody>
                <tr>
                <?php
                // Récupération des valeurs des frais
                foreach ($lesFraisForfait as $unFraisForfait) {
                  echo "<td><input id=\"inp_repasMidi\" type=\"number\" min=\"0\" value=" . intval($unFraisForfait['quantite']) . " class=\"form-control\"></td>";
                }
                 ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="container">
          <h2>Frais Hors forfait</h2>

          <div class="panel panel-warning">
              <div class="panel-heading">Descriptif des éléments hors forfait - <span class="badge"><?php echo $nbJustificatifs ?></span> justificatifs reçus (avant ré-édition)</div>
              <table class="table table-bordered table-responsive">
                  <tr>
                      <th class="date">Date</th>
                      <th class="libelle">Libellé</th>
                      <th class='montant'>Montant</th>
                      <th class='text-center'>Choix</th>
                  </tr>
                  <?php
                  foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                      $idHorsFrais = $unFraisHorsForfait['id'];
                      $date = $unFraisHorsForfait['date'];
                      $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                      $montant = $unFraisHorsForfait['montant'];
                      ?>
                      <tr>
                          <td><?php echo $date ?></td>
                          <td id="<?php echo $idHorsFrais . 'td'?>"><?php echo $libelle ?></td>
                          <td><?php echo $montant ?></td>
                          <td class="text-center">
                            <?php

                             ?>
                            <button id="<?php echo $idHorsFrais . 'btn'?>" type="button" class="btn btn-danger refuserHorsFrais">Refuser</button>
                          </td>
                      </tr>
                      <?php
                  }
                  ?>
              </table>
          </div>
      </div>

      <div class="container">
        <div class="form-groupModif form-group">

          <div class="form-groupModif has-warning row">
            <label for="" class="col-sm-2 controlTextModif control-label">Nombre de Justificatifs:</label>
            <div class="col-sm-2">
              <input id="inp_nbJustificatif" type="number" value="<?php echo intval($nbJustificatifs) ?>" min="0" class="form-control">
            </div>
          </div>
          <div class="espace"></div>
          <div class="form-groupModif form-group">
            <button type="submit" class="btn btn-success">Valider</button>
            <button type="reset" class="btn btn-danger">Réinitialiser</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<script type='text/javascript' src='./vues/js/v_voirFrais.js'></script>
