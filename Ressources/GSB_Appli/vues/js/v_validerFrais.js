9/**
 * Created by laot.r on 27/03/2017.
 */

function getVal(idElement){
    return document.getElementById(idElement).value;
}

function getElem(idElement){
    return document.getElementById(idElement);
}

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
var input = getVal("lstVisiteurs").value;

document.getElementById("lstVisiteurs").addEventListener("onChange", function() { devoilerElements(input); }, false);


function devoilerElements(element){
    console.log('test');
    switch(element) {
        case 'lstVisiteurs':
            console.log('test');
            getElem('lstMois').style.property = "visibility: visible";
            document.write('<div>Print this after the script tag</div>');
            break;
        case 'lstMois':
            // appel methode ajax
            break;
        default:
            console.log('test');
    }
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