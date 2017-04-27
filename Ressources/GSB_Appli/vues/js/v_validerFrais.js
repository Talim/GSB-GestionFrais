/*
    Défi -_-
 */
function getXMLHttpRequest() {
    var xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        return null;
    }

    return xhr;
}


/*
    Listener de la liste des Visiteurs
 */
document.getElementById("lstVisiteurs").addEventListener("change", function(){
  var leVisiteur = document.getElementById("lstVisiteurs").value;
  choixVisiteur(leVisiteur);

}, false);

document.getElementById("ok").addEventListener("click", function() {

}, false);


/*
    Traiement de la liste des Visiteurs
 */
function choixVisiteur(input){
  // Vérification du visiteur
  if (input && input !== "nothing"){
    // Instanciation d'un objet XMLHttpRequest
    var xhr = getXMLHttpRequest();
    // Au changement d'état...
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
          // On dévoile la liste des mois disponibles
          document.getElementById('containerMois').style.visibility = "visible";
          // On hydrate la liste des mois selon la réponse AJAX
          document.getElementById("lstMois").innerHTML = xhr.responseText;
        }
        else {
          // Check valeur modifié côté client
          if (xhr.responseText === "erreur"){
            document.getElementById("erreur").innerHTML = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>Attention !</strong> Une erreur est survenue dû à une modification de valeur (côté client). Veuillez ne pas changer les valeurs</div>";
            document.getElementById('containerMois').style.visibility = "hidden";
          }
        }
    };
    var numVisiteur = encodeURIComponent(document.getElementById("lstVisiteurs").value);

    xhr.open("POST", "controleurs/c_getMois.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("numV=" + numVisiteur);
  }
  else {
    document.getElementById('containerMois').style.visibility = "hidden";
  }
}


/*
    Appel de la méthode AJAX
 */
