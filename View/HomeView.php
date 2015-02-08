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
    
}
