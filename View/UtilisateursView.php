<?php

include_once 'Model/Utilisateur.php';
include_once 'Model/TypeU.php';

class UtilisateursView {   

    function __construct() {
    }
 
    public function coordView() {
        include 'Content/header.php';
        echo "<h1 class=\"page-header\"><img src=\"Image/icon-details2.png\"/> Coordonnées Utilisateurs</h1>";
        $utilisateurs = Utilisateur::findAll();
        echo "<div class=\"table-responsive\">";
        echo "<table class=\"table table-striped\">";
        echo "<thead>";
            echo "<tr>";
                echo "<th>";
                echo "Nom";
                echo "</th>";
                echo "<th>";
                echo "Prénom";
                echo "</th>";
                echo "<th>";
                echo "<img src=\"Image/icon-email.png\" width=\"25\"/>";
                echo "</th>";
                echo "<th>";
                echo "<img src=\"Image/icon-telephone.png\" width=\"25\"/>";
                echo "</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
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
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        include 'Content/footer.html';
    }
    
}