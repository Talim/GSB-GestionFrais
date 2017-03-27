<div class="row">

  <div class="col-8">
    <div class="container">
    <h2>Validation des frais par visiteur</h2>
    <form class="form-horizontal">
      <div class="container">
      <div class="form-groupModif form-group">
        <div class="form-groupModif row">
        <label for="dp_choixVisiteur" class="col-sm-2 controlTextModif control-label">Choisir le visiteur:</label>
        <div class="col-sm-2">
        <select id="dp_choixVisiteur" class="btn btndefaultModif">
          <option>Mustard</option>
          <option>Ketchup</option>
          <option>Relish</option>
        </select>
        </div>
        </div>
      </div>

      <div class="form-groupModif form-group">
        <div class="form-groupModif row">
        <label for="dp_choixMois" class="col-sm-2 controlTextModif control-label">Choisir le mois:</label>
        <div class="col-sm-2">
        <select id="dp_choixMois" class="btn btndefaultModif">
          <option>Mustard</option>
          <option>Ketchup</option>
          <option>Relish</option>
        </select>
        </div>
        </div>
      </div>
      </div>
    <div class="container">
    <h2>Frais au forfait</h2>
    <div class="panel panel-info">
      <div class="panel-heading">Descriptif des éléments forfait</div>

      <table class="table table-bordered table-responsive">
        <tr>
          <th class="libelle">Repas Midi</th>
          <th class="libelle">Nuitée</th>
          <th class="libelle">Etape</th>
          <th class="libelle">Km</th>
          <th class="libelle">Situation</th>
        </tr>
        <tbody>

          <tr>
            <td><input id="inp_repasMidi" type="number" min="0" class="form-control"></td>
            <td><input id="inp_nuite" type="number" min="0" class="form-control"> </td>
            <td><input id="inp_etape"type="number" min="0" class="form-control"></td>
            <td><input id="inp_km" type="number" min="0" class="form-control"></td>
            <td>
              <div class="text-center">
                <select id="dp_situationForfait" class="btn btnDefaultModif">
                  <option>Mustard</option>
                  <option>Ketchup</option>
                  <option>Relish</option>
                </select>
              </div>


          </tr>
        </tbody>
      </table>
      </div>
      </div>

      <div class="container">
      <h2>Frais Hors forfait</h2>
      <div class="panel panel-info">
        <div class="panel-heading">Descriptif des éléments hors forfait</div>

        <table class="table table-bordered table-responsive">
          <tr>
            <th class="libelle">Date</th>
            <th class="libelle">Libellé</th>
            <th class="libelle">Montant</th>
            <th class="libelle">Situation</th>
          </tr>
          <tbody>

            <tr>
              <td><input id="inp_horsDate" type="number" min="0" class="form-control"></td>
              <td><input id="inp_horsLibelle" type="number" min="0" class="form-control"> </td>
              <td><input id="inp_horsMontant" type="number" min="0" class="form-control"></td>
              <td>
                <div class="text-center">
                  <select id="dp_situationHorsForfait" class="btn btnDefaultModif">
                    <option>Mustard</option>
                    <option>Ketchup</option>
                    <option>Relish</option>
                  </select>
                </div>


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
        <button type="reset" class="btn btn-default">Réinitialiser</button>
        <button type="submit" class="btn btn-default">Valider</button>
      </div>
      </form>
    </div>
    </div>
  </div>
</div>
