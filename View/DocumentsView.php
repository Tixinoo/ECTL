<?php

include_once 'Model/Document.php';
include_once 'Model/TypeD.php';

class DocumentsView {

    function __construct() {
        
    }

    public function typedView($idTypeD) {
        include 'Content/header.php';
        $typed = TypeD::findById($idTypeD);
        echo "<h1 class=\"page-header\"><img src=\"Image/icon-documents.png\"/>" . $typed->nomTypeD . "<small> - " . $typed->descTypeD . "</small></h1>";
        $documents = Document::findByIdTypeD($idTypeD);
        echo "<div class=\"row placeholders\"><br>";
        foreach ($documents as $document) {
            Self::DocumentView($document);
        }
        echo "</div>";
        include 'Content/footer.php';
    }

    public static function documentView($document) {
        echo "<div id=\"document\" class=\"col-xs-6 col-sm-3 placeholder test\">";
        echo "<a class=\"view-pdf\" href=\"" . $document->urlD . "\" nom=\"" . $document->nomD . "\">";
        echo "<h1 style=\"display:inline;\">";
        //echo "<img src=\"Image/icon-pdf.png\" width=\"35\"/></a>";
        echo "<span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\">";
        echo "</span>";
        echo "</h1></a>";
        if (in_array("1", $_SESSION['typeUs'])) {
            $typeCorbeille = TypeD::findByNom("Corbeille");
            $corbeille_id = $typeCorbeille->idTypeD;
            echo "<form style=\"margin-left:5px; margin-top: -15px; display:inline;\" action=\"index.php\" method=\"GET\">";
            if (!in_array($corbeille_id, $document->idTypeDs())) {
                echo "<input type=\"hidden\" name=\"a\" value=\"deleteD\">";
                echo "<input type=\"hidden\" name=\"idC\" value=\"" . $corbeille_id . "\">";
                echo "<input type=\"hidden\" name=\"idD\" value=\"" . $document->idD . "\">";
                echo "<button type=\"submit\" class=\"btn btn-danger btn-xs\">Supprimer</button>";
            } else {
                echo "<input type=\"hidden\" name=\"a\" value=\"deleteDefinitlyD\">";
                echo "<input type=\"hidden\" name=\"idD\" value=\"" . $document->idD . "\">";
                echo "<button type=\"submit\" class=\"btn btn-danger btn-xs\">Détruire</button>";
            }
            echo "</form>";
        }
        echo "<a class=\"view-pdf\" href=\"" . $document->urlD . "\" nom=\"" . $document->nomD . "\"><h4>" . $document->nomD . "</h4></a>";
        echo "<div class=\"descDocument\"><p>" . $document->descD . "</p></div>";
        echo "</div>";
    }

    public static function singleNewsView($singleNews) {
        echo "<div class=\"col-xs-24 col-sm-12 singleNews\">";
        echo "<div class=\"col-xs-4 col-sm-2\">";
        echo "<img src=\"Image/icon-attention.png\" width=\"25\"/><h4>" . date("d/m/Y", strtotime($singleNews->findPublication()["dateP"])) . "</h4>";
        echo "</div>";
        echo "<div class=\"col-xs-20 col-sm-10 left\">";
        echo "<h3 class=\"page-header\">" . $singleNews->nomD;
        if (in_array("1", $_SESSION['typeUs'])) {
            $typeCorbeille = TypeD::findByNom("Corbeille");
            $corbeille_id = $typeCorbeille->idTypeD;
            echo "<form style=\"display:inline; position: absolute; right: 0;\" action=\"index.php\" method=\"GET\">";
            echo "<input type=\"hidden\" name=\"a\" value=\"deleteD\">";
            echo "<input type=\"hidden\" name=\"idC\" value=\"" . $corbeille_id . "\">";            
            echo "<input type=\"hidden\" name=\"idD\" value=\"" . $singleNews->idD . "\">";
            echo "<button type=\"submit\" class=\"btn btn-danger btn-xs\">Supprimer</button>";

            echo "</form>";
        }
        echo "</h3>";
        echo $singleNews->contenuD;
        echo "</div>";
        echo "</div>";
        echo "<div class=\"col-xs-24 col-sm-12 left\">";
        echo "<br>";
        echo "</div>";
    }

}
