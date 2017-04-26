<?php

require_once("includes/fct.inc.php");
require_once ("includes/class.pdogsb.inc.php");
session_start();
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
include("vues/v_entete.php");
if (!isset($_REQUEST['uc']) && !$estConnecte) {
    $_REQUEST['uc'] = 'connexion';
} else if (empty($_REQUEST['uc'])) {
    $_REQUEST['uc'] = 'accueil';
}
$uc = $_REQUEST['uc'];
//$uc='test';
switch ($uc) {
    case 'connexion': {
            include("controleurs/c_connexion.php");
            break;
        }
    case 'accueil': {
            include("controleurs/c_accueil.php");
            break;
        }
    case 'gererFrais' : {
            include("controleurs/c_gererFrais.php");
            break;
        }
    case 'etatFrais' : {
            include("controleurs/c_etatFrais.php");
            break;
        }
    case 'deconnexion' : {
            include("controleurs/c_deconnexion.php");
            break;
        }
    case 'validerFrais' : {
        include("controleurs/c_validerFrais.php");
        break;
    }
    case 'suivreFrais' : {
        include("controleurs/c_suivreFrais.php");
        break;
    }
    /*
    case 'test' : {
        include("controleurs/c_suiviPaiementFiche.php");
        break;
    }*/
}
include("vues/v_pied.php");
