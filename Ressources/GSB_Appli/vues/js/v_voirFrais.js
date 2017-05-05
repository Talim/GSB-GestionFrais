/*
    Methode de test unitaire (valeur d'un obj)
 */
function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    alert(out);

}

/*
    Listener des boutons de refus
 */

var lesBoutonsRefuser = document.getElementsByClassName("refuserHorsFrais");
//dump(lesBoutonsRefuser);
for (var i = 0; i < lesBoutonsRefuser.length; i++) {
  lesBoutonsRefuser[i].addEventListener("click", function(){
    if (!this.disabled){
      màjLibelle(this.id);
    }
  }, false);
}


/*
    Mise a jour de(s) libéllé(s)
 */
function màjLibelle(idCourant){
  // Vérification de l'argument
  if (typeof idCourant !== 'undefined' && idCourant.endsWith("btn")){

    idCourant = idCourant.substring(0, idCourant.length - 3);
    var idCourantTD =  idCourant + 'td';

    var leBouton = document.getElementById(idCourant + 'btn');
    var elementLibelle = document.getElementById(idCourantTD);

    if (leBouton.innerHTML === "Annuler"){
      document.getElementById(idCourant + 'lib').remove();
      leBouton.className = "btn btn-danger refuserHorsFrais";
      leBouton.innerHTML = "Refuser";
    }
    else if(leBouton.innerHTML === "Refuser"){
      elementLibelle.innerHTML = '<span id="' + idCourant + 'lib" class="refuser">[Refusé] </span>' + elementLibelle.innerHTML;
      leBouton.className = "btn btn-warning accepterHorsFrais";
      leBouton.innerHTML = "Annuler";
    }
  }
}
