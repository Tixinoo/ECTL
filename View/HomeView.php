<?php

include_once 'Model/Document.php';
include_once 'Model/TypeD.php';

class HomeView {   

    function __construct() {
    }

    public function defaultView() {
        include 'Content/header.php';
        include 'Content/home.html';
        include 'Content/footer.html';
    }
    
    

    
/* *************** MÉTHODES DE TEST *************** */
    
    /**
     * Affiche tous les documents
     */
    public function documentsAllView() {
        $documents = Document::findAll();
        $typeds = TypeD::findAll();
        foreach ($documents as $document) {
            Self::documentView($document);
        }
        foreach ($typeds as $typed) {
            echo $typed->nomTypeD; 
        }
    }
    
    /**
     * Affiche un document donné en paramètre
     * @param Document $document Document à afficher
     */
    public function documentView($document) {
        echo "<div id=\"document\">";
        echo "Titre : " . $document->nomD . "<br>";
        echo "Description : " . $document->descD . "<br>";
        echo "Lien : <a href=\"" . $document->urlD . "\">ici</a><br>";
        echo "</div>";
    }
    
}
