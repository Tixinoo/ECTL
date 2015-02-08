<?php

include_once 'Model/Document.php';
include_once 'Model/TypeD.php';

class DocumentsView {   

    function __construct() {
    }
 
    public function typedView($idTypeD) {
        include 'Content/header.php';
        $typed = TypeD::findById($idTypeD);
        echo "<h1 class=\"page-header\">" . $typed->nomTypeD . "</h1>";
        $documents = Document::findByIdTypeD($idTypeD);
        echo "<div class=\"row placeholders\"><br>";
        foreach ($documents as $document) {
            Self::DocumentView($document);
        }
        echo "</div>";
        include 'Content/footer.html';
    }
    
    public function documentView($document) {
        echo "<div id=\"document\">";
        echo "<div class=\"col-xs-6 col-sm-3 placeholder\">";
        echo "<img src=\"Image/icon-pdf.png\" class=\"img-responsive\">";
        echo "<h4>" . $document->nomD . "</h4>";
        echo "<span class=\"text-muted\"><i>" . $document->descD . "</i></span>";
        /*echo "Titre : " . $document->nomD . "<br>";
        echo "Description : " . $document->descD . "<br>";
        echo "Lien : <a href=\"" . $document->urlD . "\"><img src=\"Image/icon-pdf.png\"></a><br>";*/
        echo "</div>";
        echo "</div>";
    }              
                  
    /**
     * Affiche un document donné en paramètre
     * @param Document $document Document à afficher
     */
    public function olddocumentView($document) {
        echo "<div id=\"document\">";
        echo "Titre : " . $document->nomD . "<br>";
        echo "Description : " . $document->descD . "<br>";
        echo "Lien : <a href=\"" . $document->urlD . "\"><img src=\"Image/icon-pdf.png\"></a><br>";
        echo "</div>";
    }
    
}