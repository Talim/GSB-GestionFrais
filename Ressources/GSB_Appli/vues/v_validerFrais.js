/**
 * Created by laot.r on 27/03/2017.
 */

/*
    Méthode Asynchrone XML Pure
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


var xhr = getXMLHttpRequest();

var leVisiteur = document.getElementById("lstVisiteurs").value;

document.getElementById("lstVisiteurs").addEventListener("change", function(){ choixVisiteur(leVisiteur); }, false);


function choixVisiteur(input){
  if (input)
    document.getElementById('containerMois').style.visibility = "visible";
}


function pseudochange() {
    var pseudo = document.getElementById("pseudo").value;
    var Var1 = encodeURIComponent(pseudo);
    var lien = "test.php?pseudo=" + Var1;
    xhr.open("GET", lien, true);
    xhr.send(null);
}

xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
        if (xhr.responseText == "Vide") {
            document.getElementById("messagepseudo").innerHTML = "<font color=\"red\">Vous devez spécifier un pseudo!</font>";
        } else {
            document.getElementById("messagepseudo").innerHTML = "";
        }
    }
}

/*
                je change de selection
                au changement j'invoke la methode 'devoilerElements' via le listener
 */
