9/**
 * Created by laot.r on 27/03/2017.
 */

function getVal(idElement){
    return document.getElementById(idElement).value;
}

function getElem(idElement){
    return document.getElementById(idElement);
}



var input = getVal("lstVisiteurs").value;
document.getElementById("lstVisiteurs").addEventListener("onchange", function() { devoilerElements(input); }, false);


function devoilerElements(element){
    switch(element) {
        case 'lstVisiteurs':
            getElem('lstVisiteurs').style.property = "visibility: visible";
            break;
        case 'lstMois':
            // ...
            break;
        default:
            // ...
    }


}

