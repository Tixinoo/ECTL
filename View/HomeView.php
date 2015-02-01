<?php

include_once 'Model/Document.php';

class HomeView {   

    function __construct() {
    }

    public function defaultView() {
        include 'Content/header.php';
        include 'Content/home.html';
        Self::documentsView();
        include 'Content/footer.html';
    }

    public function documentsView() {
        $documents = Document::findAll();
        print_r($documents);
    }
    
}
