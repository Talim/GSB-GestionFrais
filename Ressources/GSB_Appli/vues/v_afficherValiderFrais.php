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
            <div class="panel-heading">Descriptif des éléments hors forfait</div>


            <!-- FOR EACH DB -->
            <table class="table table-bordered table-responsive">


              <th class="libelle">Supprimer</th>
            </tr>
            <tbody>
              <?php 
              



              ?>


              <tr>
                <td><label for="">Your vanity URL</label></td>
                <td><input id="inp_horsDate" type="label" min="0" class="form-control"></td>
                <td><input id="inp_horsLibelle" type="label" min="0" class="form-control"> </td>
                <td><input id="inp_horsMontant" type="label" min="0" class="form-control"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="container">
        <div class="form-groupModif form-group">

          <div class="form-groupModif row">
            <label for="" class="col-sm-2 controlTextModif control-label">Nb Justificatifs:</label>
            <div class="col-sm-2">
              <input id="inp_nbJustificatif" type="number" min="0" class="form-control">
            </div>
          </div>

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