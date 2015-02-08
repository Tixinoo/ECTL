<?php

include_once 'Model/Utilisateur.php';
include_once 'Model/TypeU.php';

class UtilisateursView {   

    function __construct() {
    }
 
    public function coordView() {
        $utilisateurs = Utilisateur::findAll();
        print_r($utilisateurs);
    }
    
}