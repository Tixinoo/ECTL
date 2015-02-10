<?php

include_once 'Model/Document.php';
include_once 'Model/TypeD.php';
include_once 'View/DocumentsView.php';

class HomeView {

    function __construct() {
        
    }

    public function defaultView() {
        include 'Content/header.php';
        include 'Content/home.html';
        include 'Content/footer.html';
    }

    public function searchView($keywords) {
        include 'Content/header.php';
        include 'Content/search.html';
        if ($keywords != "") {
            echo "<br>";
            echo "<div id=\"zoneResultats\">";
            echo "<h3 class=\"page-header\"><img src=\"Image/icon-results.png\" width=\"40\"/>Résultats de la recherche</h3>";
            echo "<div class=\"row placeholders\">";
            $documents = Document::findByNom($keywords);
            foreach ($documents as $document) {
                DocumentsView::DocumentView($document);
            }
            echo "</div>";
            echo "</div>";
        }
        include 'Content/footer.html';
    }

    public function facebookView() {
        include 'Content/header.php';
        include 'Content/facebook.html';
        include 'Content/footer.html';
    }

    /*     * ************** MÉTHODES DE TEST *************** */

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
