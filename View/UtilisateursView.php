<?php

include_once 'Model/Utilisateur.php';
include_once 'Model/Inscription.php';
include_once 'Model/TypeU.php';

class UtilisateursView {   

    function __construct() {
    }
 
    public function coordView() {
        include 'Content/header.php';
        echo "<h1 class=\"page-header\"><img src=\"Image/icon-details.png\"/> Coordonnées des Employés</h1>";
        $utilisateurs = Utilisateur::findAllActifs();
        echo "<div class=\"table-responsive\">";
        echo "<table class=\"table table-striped table-hover\">";
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
                echo "<th>";
                echo "</th>";
                echo "<th class=\"text-center\">";
                echo "Action";
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
                echo "<a href=\"mailto:#\">" . $utilisateur->emailU . "</a>";
                echo "</td>"; 
                echo "<td>";
                echo $utilisateur->telU;
                echo "</td>";  
                echo "<td>";
                echo "<img height=\"20\" src=\"" . $utilisateur->urlAvatarU . "\"/>";
                echo "</td>";
                echo "<td class=\"text-center\">";
                echo "<form action=\"index.php\" method=\"GET\">";
                echo "<input type=\"hidden\" name=\"a\" value=\"deleteU\">";
                echo "<input type=\"hidden\" name=\"idU\" value=\"" . $utilisateur->idU . "\">";
                echo "<button type=\"submit\" class=\"btn btn-danger\">Désactiver</button>";
                echo "</form>";
                echo "</td>";                
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        include 'Content/footer.php';
    }

    public function futurUsersView() {
        $inscriptions = Inscription::findAll();
        echo "<div class=\"table-responsive\">";
        echo "<table class=\"table table-hover\">";
        echo "<thead>";
            echo "<tr>";
                echo "<th>";
                echo "Code";
                echo "</th>";
                echo "<th>";
                echo "Validité";
                echo "</th>";
                echo "<th>";
                echo "Type d'Utilisateur";
                echo "</th>";
                echo "<th class=\"text-center\">";
                echo "<img src=\"Image/icon-delete.png\" width=\"25\"/>";
                echo "</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($inscriptions as $inscription) {
            echo "<tr>";
                echo "<td>";
                echo $inscription->codeI;
                echo "</td>";
                echo "<td>";
                echo $inscription->validiteI;
                echo "</td>";
                echo "<td>";
                echo TypeU::findById($inscription->idTypeU)->nomTypeU;
                echo "</td>";
                echo "<td class=\"text-center\">";
                echo "<form action=\"index.php\" method=\"GET\">";
                echo "<input type=\"hidden\" name=\"a\" value=\"deleteI\">";
                echo "<input type=\"hidden\" name=\"idI\" value=\"" . $inscription->idI . "\">";
                echo "<button type=\"submit\" class=\"btn btn-danger\">Supprimer</button>";
                echo "</form>";
                echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    
    public function addUserView() {
        include 'Content/header.php';
        include 'Content/add_user.php';
        include 'Content/footer.php';
    }
    
}