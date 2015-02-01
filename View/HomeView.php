<?php

class HomeView {
    

    function __construct() {
    }

    public function defaultView() {
        include 'Content/header.php';
        include 'Content/home.html';
        include 'Content/footer.html';
    }

}
