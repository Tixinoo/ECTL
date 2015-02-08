<?php

include_once 'Model/Utilisateur.php';
include_once 'Model/TypeU.php';

class UtilisateursView {   

    function __construct() {
    }
 
    public function coordView() {
        include 'Content/header.php';
        echo "Coordonnées Utilisateurs";
        $utilisateurs = Utilisateur::findAll();
        echo "<table border=\"1px\">";
        foreach ($utilisateurs as $utilisateur) {
            echo "<tr>";
                echo "<td>";
                echo $utilisateur->nomU;
                echo "</td>";
                echo "<td>";
                echo $utilisateur->prenomU;
                echo "</td>";
                echo "<td>";
                echo $utilisateur->emailU;
                echo "</td>"; 
                echo "<td>";
                echo $utilisateur->telU;
                echo "</td>";                
            echo "<tr>";
        }
        echo"</table>";
        include 'Content/footer.html';
    }
    
}