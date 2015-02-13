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
        echo "<div id=\"document\" class=\"col-xs-6 col-sm-3 placeholder\">";
        echo "<a class=\"view-pdf\" href=\"" . $document->urlD . "\"><h1><span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\"></span></h1>";
        /*echo "<img src=\"Image/icon-pdf.png\" class=\"img-responsive\">";*/
        echo "<h4>" . $document->nomD . "</h4></a>";
        echo "<span class=\"text-muted\"><i>" . $document->descD . "</i></span>";
        /*echo "Lien : <a href=\"" . $document->urlD . "\"><img src=\"Image/icon-pdf.png\"></a><br>";*/
        echo "</div>";
    }
    
    public static function singleNewsView($singleNews) {
        echo "<div class=\"col-xs-24 col-sm-12 singleNews\">";
        echo "<div class=\"col-xs-4 col-sm-2\">";
        echo "<img src=\"Image/icon-attention.png\" width=\"25\"/><h4>" . date("d/m/Y", strtotime($singleNews->findPublication()["dateP"])) . "</h4>";
        echo "</div>";
        echo "<div class=\"col-xs-20 col-sm-10 left\">";
        echo "<h3 class=\"page-header\">" . $singleNews->nomD . "</h3>";
        echo $singleNews->contenuD;
        echo "</div>";
        echo "</div>";
        echo "<div class=\"col-xs-24 col-sm-12 left\">";
        echo "<br>";
        echo "</div>";        
    }
                  
}