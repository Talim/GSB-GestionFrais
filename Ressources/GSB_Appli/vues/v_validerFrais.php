<h2>Validation des frais par visiteur</h2>
<div class="row">
    <div class="col-md-4">
        <form action="index.php?uc=etatFrais&action=voirEtatFrais" method="post" role="form">
            <div class="form-group">
                <h4>Choisir un visiteur : </h4>
                <select id="lstVisiteurs" name="lstVisiteurs" class="form-control">

                <?php

                // On récupère tous les visiteurs dans la base de données

                foreach ($lesVisiteurs as $unVisiteur) {
                    $idVisiteur = $unVisiteur["id"];
                    $nom = $unVisiteur["nom"];
                    $prenom = $unVisiteur["prenom"];
                    ?>
                    <option value="<?php echo $idVisiteur ?>"><?php echo $nom . " - " . $prenom ?></option>
                <?php
                }
                ?>
                </select>
                <div id="containerMois" style="visibility: hidden">
                    <h4>Sélectionner un mois : </h4>
                    <select id="lstMois" name="lstMois" class="form-control">
                        <?php

                        foreach ($lesMois as $unMois) {
                            $mois = $unMois['mois'];
                            $numAnnee = $unMois['numAnnee'];
                            $numMois = $unMois['numMois'];
                            if ($mois == $moisASelectionner) {
                                ?>
                                <option selected value="<?php echo $mois ?>"><?php echo $numMois . "/" . $numAnnee ?> </option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $mois ?>"><?php echo $numMois . "/" . $numAnnee ?> </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>


            </div>
            <input id="ok" type="submit" value="Valider" class="btn btn-success" role="button" />
            <input id="annuler" type="reset" value="Effacer" class="btn btn-danger" role="button" />
        </form>
    </div>
</div>
<script type='text/javascript' src='./vues/v_validerFrais.js'></script>
