<?php

include_once 'Model/Document.php';
include_once 'Model/TypeD.php';

class DocumentsView {   

    function __construct() {
    }
 
    public function typedView($idTypeD) {
        include 'Content/header.php';
        $documents = Document::findByIdTypeD($idTypeD);
        foreach ($documents as $document) {
            Self::DocumentView($document);
        }
        include 'Content/footer.html';
    }
    
    /**
     * Affiche un document donné en paramètre
     * @param Document $document Document à afficher
     */
    public function documentView($document) {
        echo "<div id=\"document\">";
        echo "Titre : " . $document->nomD . "<br>";
        echo "Description : " . $document->descD . "<br>";
        echo "Lien : <a href=\"" . $document->urlD . "\"><img src=\"Image/icon-pdf.png\"></a><br>";
        echo "</div>";
    }
    
}