<?php
require_once ('pdf/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
require_once('pdf/template.php');

class PDFGenerator{

    private $html;

    private $imma = '';
    private $nom = '';
    private $prenom = '';

    private $date = '';

    private $frais = '';
    private $autreFrais = '';

    function __construct($nom_p, $prenom_p, $imma_p, $date_p,  $frais_p, $autresFrais_p) {

        $this->date = $date_p;
        $this->imma = $imma_p;
        $this->nom = $nom_p;
        $this->prenom = $prenom_p;

        $this->frais = $frais_p;
        $this->autreFrais = $autresFrais_p;

    }

    public function generate() {
        $dompdf = new Dompdf();

        $html = returnTemplate($this->nom, $this->prenom, $this->imma, $this->date, $this->frais, $this->autreFrais);

        $dompdf->loadHtml($html);


        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        //$dompdf->stream();
        file_put_contents("document.pdf", $dompdf->output());


    }

}
/*
$frais = array(array("Nuité", 9, 80.00), array("Repas Midi", 12, 29.00), array("Véhicule", 750, 0.67));
$autreFrais = array(array("18/12/2016", "Repas Représentation", 156.00), array("22/12/2016", "Achat Fleuriste Soirée \"MediLog\"", 120.30));

$pdg = new PDFGenerator("CASCALES", "Arthur", "EE-614-QF", "2016-12-02", $frais, $autreFrais);

$pdg->generate();*/